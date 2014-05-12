<?php namespace WebScrape;

use Countable;
use GuzzleHttp\Client;
use Guzzle\Http\Message\Response;
use WebScrape\Exception\EmptyConstructorArrayException;
use WebScrape\Exception\InvalidBodyStringException;
use WebScrape\Exception\NoOperableItemsInCollectionException;

class WebScrape implements Countable
{
	protected $linkCollection;
	protected $currentLinkItem = 0;
	protected $scraperItems = [];
	protected $whitelistedUrls = [];
	protected $filterPrefix = "_filter";

	public function __construct (Client $client, array $args = array())
	{
		$this->client = $client;
		
		if (! empty($args)) {
			$this->setLinks($args);
		}
	}

	public function count ()
	{
		return count($this->linkCollection);
	}

	public function setLinks (array $args) 
	{
		if (empty($args)) {
			throw new EmptyConstructorArrayException;
		}
		
		$this->linkCollection = $args;
	}

	public function only(array $urls)
	{	
		if (! empty($urls)) {
			$this->whitelistedUrls = $urls;
		}
		
		return $this;
	}

	public function scrape (array $options = array())
	{
		// can't scrape what isn't there
		if (! $this->hasScrapedItems() && $this->isLastItem()) {
			throw new NoOperableItemsInCollectionException;
		}

		// return what we have scraped
		if ($this->hasScrapedItems() && $this->isLastItem()) {
			return $this->scraperItems;
		}

		if ($responseObj = $this->getValidResponse()) {
			$this->processCurrentItem($responseObj, $options); 
		}
		
		$this->currentLinkItem++;	
		
		return $this->scrape();
	}

	private function getCurrentLinkUrl()
	{
		return $this->linkCollection[$this->currentLinkItem];
	}

	private function processCurrentItem(Response $responseObj, array $options) 
	{
		// apply white listing of set
		if ((! empty($this->whitelistedUrls))
		 && $this->isWhiteListed($this->getCurrentLinkUrl())) {
			$this->scraperItems[$this->currentLinkItem] = $this->applyItemOptions($responseObj->getBody(), $options);	
			return; // prevent calling of default
		}

		// default functionality
		$this->scraperItems[$this->currentLinkItem] = $this->applyItemOptions($responseObj->getBody(), $options);
	}

	private function hasScrapedItems() {
		return ! empty($this->scraperItems);
	}

	private function isLastItem() 
	{
		if (! empty($this->whitelistedUrls)) {
			return ($this->currentLinkItem === count($this->whitelistedUrls));
		}

		return ($this->currentLinkItem === count($this->linkCollection));
	}

	private function isWhiteListed($needle) 
	{
		return in_array($needle, $this->whitelistedUrls);
	}

	private function getValidResponse() 
	{
		$responseObj = $this->client
						->get($this->linkCollection[$this->currentLinkItem]);
		
		if ($this->validateCurrentLink() && ($responseObj->getStatusCode() === 200)) {
			return $responseObj;
		}

		return false;
	}

	protected function applyItemOptions($bodyString, array $options = array()) 
	{
		if (! empty($options)) {
			$this->validateBodyString($bodyString);
			$this->applyFilters($bodyString, $options);
		}
		return $bodyString;
	}

	private function validateCurrentLink() 
	{
		return (isset($this->linkCollection[$this->currentLinkItem]) 
			&& ! empty($this->linkCollection[$this->currentLinkItem]));
	}

	private function validateBodyString($bodyString) 
	{
		if (! is_string($bodyString) || strlen($bodyString) === 0) {
			throw new InvalidBodyStringException;
		}
	}

	private function hasValidFilter(array $options) 
	{
		if ($this->filterKeyExists($options) 
			&& $this->filterMethodExists($options)) {
			return true;
		}
		return false;
	}

	private function filterKeyExists(array $options) 
	{
		if (isset($options['filter']) && ! empty($options['filter'])) {
			return true;
		}
		
		throw new NoFilterKeyInOptionsException;
	}

	private function filterMethodExists(array $options) 
	{
		if (method_exists($this, $this->filterize($options['filter']))) {
			return true;
		}

		throw new NoValidFilterMethodException;	
	}

	private function applyFilters(&$item, array $options) 
	{
		if ($this->hasValidFilter($options)) {
			$item = call_user_func([$this, $this->filterize($options['filter'])], $item);
		}
	}

	private function filterize($filterName)
	{
		return $this->filterPrefix.ucfirst($filterName);
	}

	private function _filterNoTags ($item) 
	{
		preg_match_all('#<\s*?body\s*?>(.*)<\/\s*?body\s*?>#is', $item, $htmlMatches);
		
		if (isset($htmlMatches[1][0]) && ! empty($htmlMatches[1][0])) {
			return strip_tags($htmlMatches[1][0]);
		}
		
		return $item;
	}

}