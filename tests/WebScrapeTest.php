<?php namespace WebScrape\Tests;

use WebScrape\WebScrape;
use WebScrape\Tests\Helpers\WebScrapeSampleProvider;
use Mockery as mock;

class WebScrapeTest extends WebScrapeTestCase 
{
	public function setUp()
	{
		$this->singleArgsArray = [
			'http://www.stephen-hukish.com/portfolio',
		];
		
		$this->multiArgsArray = [
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/about',
			'http://www.stephen-hukish.com/contact',
		];
		
		$this->emptyArgsArray = [];

		$this->mockedClient = mock::mock('GuzzleHttp\Client');
		$this->mockedResponse = mock::mock('Guzzle\Http\Message\Response');
		$this->webScraper = new WebScrape($this->mockedClient);

	}

	public function tearDown()
	{
		mock::close();
	}

	public function testCanPassSetLinksListOfPagesAsAnArrayWithOneItem()
	{
		$this->webScraper->setLinks($this->singleArgsArray);
		$this->assertEquals(count($this->singleArgsArray), count($this->webScraper));
	}

	public function testCanPassSetLinksListOfPagesAsAnArrayWithMutlipleItems()
	{
		$this->webScraper->setLinks($this->multiArgsArray);
		$this->assertEquals(count($this->multiArgsArray), count($this->webScraper));
	}

	/**
	 * @expectedException \WebScrape\Exception\EmptyConstructorArrayException
	 */
	public function testThatWhenGivenAnEmptyArraySetLinkTheClassThrowsAnError()
	{
		$this->webScraper->setLinks($this->emptyArgsArray);
	}

	public function testCanScrapeContentsOfLinksSetInLinkCollectionWithOneItemInCollection()
	{
		$this->mockedResponse->shouldReceive('getBody')->once()->andReturn($this->getSampleHtml());
		$this->mockedResponse->shouldReceive('getStatusCode')->once()->andReturn(200);
		$this->mockedClient->shouldReceive('get')->once()->andReturn($this->mockedResponse);
		$this->webScraper->setLinks($this->singleArgsArray);
		$expectedHtml = $this->getSampleHtml();
		
		$responseBody = $this->webScraper->scrape();
		
		$this->assertEquals($expectedHtml, $responseBody[0]);
	}

	
	public function testCanScrapeContentsOfLinksSetInLinkCollectionWithMultipleItemsInCollection200()
	{
		$this->mockedResponse->shouldReceive('getBody')->times(3)
		->andReturn($this->getSampleHtml(), 
			$this->getSampleHtml('about'), 
			$this->getSampleHtml('contact'));

		$this->mockedResponse->shouldReceive('getStatusCode')->times(3)
		->andReturn(200, 200, 200);
		
		$this->mockedClient->shouldReceive('get')->times(3)->andReturn($this->mockedResponse);
		$this->webScraper->setLinks($this->multiArgsArray);
		
		$expectedHtml = [ 	$this->getSampleHtml('portfolio'),
							$this->getSampleHtml('about'),
							$this->getSampleHtml('contact')	];
		
		$responseBodyMulti = $this->webScraper->scrape();

		$this->assertEquals($expectedHtml[0], $responseBodyMulti[0]);
		$this->assertEquals($expectedHtml[1], $responseBodyMulti[1]);
		$this->assertEquals($expectedHtml[2], $responseBodyMulti[2]);
	}

	/**
	 * @expectedException \WebScrape\Exception\NoOperableItemsInCollectionException
	 */
	public function testScrapeLinkCollectionWithNoItemsInCollectionThrowsNoOperableItemsInCollectionException()
	{
		$this->mockedResponse->shouldReceive('getBody');
		$this->mockedResponse->shouldReceive('getStatusCode');
		$this->mockedClient->shouldReceive('get');
		$responseBody = $this->webScraper->scrape();
	}

	public function testCanScrapeContentsOfLinksSetInLinkCollectionWithMultipleItemsInCollectionSatusCode404()
	{
		$this->mockedResponse->shouldReceive('getBody')->times(2)
		->andReturn($this->getSampleHtml(), 
			$this->getSampleHtml('contact'));

		$this->mockedResponse->shouldReceive('getStatusCode')->times(3)
		->andReturn(200, 404, 200);
		
		$this->mockedClient->shouldReceive('get')->times(3)->andReturn($this->mockedResponse);
		$this->webScraper->setLinks($this->multiArgsArray);
		
		$expectedHtml = [ 	$this->getSampleHtml('portfolio'),
							$this->getSampleHtml('about'),
							$this->getSampleHtml('contact')	];
		
		$responseBodyMulti = $this->webScraper->scrape();

		$this->assertEquals($expectedHtml[0], $responseBodyMulti[0]);
		// $this->assertEquals($expectedHtml[1], $responseBodyMulti[1]);
		$this->assertEquals($expectedHtml[2], $responseBodyMulti[2]);
	}

	public function testCanParseHtmlBodyWithStrippedTags()
	{
		$this->mockedResponse->shouldReceive('getBody')->once()
		->andReturn($this->getSampleHtml());

		$this->mockedResponse->shouldReceive('getStatusCode')->once()
		->andReturn(200);
		
		$this->mockedClient->shouldReceive('get')->once()
		->andReturn($this->mockedResponse);
		
		$this->webScraper->setLinks($this->singleArgsArray);

		preg_match_all('#<\s*?body\s*?>(.*)<\/\s*?body\s*?>#is', $this->getSampleHtml(), $expectedHtmlMatches);
		$sampleBodyNoTags = strip_tags($expectedHtmlMatches[1][0]);

		$responseBodyNoTags = $this->webScraper->scrape(['filter' => 'noTags']);

		$this->assertEquals($sampleBodyNoTags, $responseBodyNoTags[0]);
	}
	
	public function testCanUseOnlyToSelectCertainUrlsBeScraped()
	{
		$samples = [
			['url' => 'http://www.stephen-hukish.com/portfolio', 'body' => $this->getSampleHtml(), 'statusCode' => 200],
			['url' => 'http://www.stephen-hukish.com/about', 'body' => '', 'statusCode' => 404],
			['url' => 'http://www.stephen-hukish.com/contact', 'body' => $this->getSampleHtml(), 'statusCode' => 200],
		];


		$this->mockedResponse->shouldReceive('getBody')->once()
		->andReturn($samples[0]['body']);

		$this->mockedResponse->shouldReceive('getStatusCode')->once()
		->andReturn($samples[0]['statusCode']);
		
		$this->mockedClient->shouldReceive('get')->once()
		->andReturn($this->mockedResponse);
		 
		$this->webScraper->setLinks([
				$samples[0]['url'],
				$samples[1]['url'],
				$samples[2]['url']
		]);
		
		$responseBodyNoTags = $this->webScraper
		                      ->only([$samples[1]['url']])
		                      ->scrape(['filter' => 'noTags']);
	}
	
	public function getSampleHtml($page="portfolio") 
	{
		return WebScrapeSampleProvider::getSampleHtml($page);
	}

}