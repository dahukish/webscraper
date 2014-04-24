<?php namespace WebScrape\Tests;

use WebScrape\WebScrape;

class WebScrapeTest extends WebScrapeTestCase 
{
	public function setUp()
	{
		$this->webScraper = new WebScrape;
		
		$this->singleArgsArray = [
			'http://www.stephen-hukish.com/portfolio',
		];
		
		$this->multiArgsArray = [
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
		];
		
		$this->emptyArgsArray = [];
	}

	public function tearDown()
	{
		
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

	public function testCanScrapeContentsOfLinksSetInLinkCollection()
	{

	}

}