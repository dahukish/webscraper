<?php namespace WebScrape\Tests;

use WebScrape\WebScrape;

class WebScrapeTest extends WebScrapeTestCase 
{
	public function testCanInstantiateClass() 
	{
		$webScraper = new WebScrape(['http:://www.google.com']);
		$this->assertTrue($webScraper instanceof WebScrape);
	}

	public function testCanPassContructorListOfPagesAsAnArrayWithOneItem()
	{
		$args = [
			'http://www.stephen-hukish.com/portfolio',
		];
		
		$webScraper = new WebScrape($args);
		$this->assertEquals(count($args), count($webScraper));

	}

	public function testCanPassContructorListOfPagesAsAnArrayWithMutlipleItems()
	{
		$args = [
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
			'http://www.stephen-hukish.com/portfolio',
		];
		
		$webScraper = new WebScrape($args);
		$this->assertEquals(count($args), count($webScraper));

	}

	/**
	 * @expectedException \WebScrape\Exception\EmptyConstructorArrayException
	 */
	public function testThatWhenGivenAnEmptyErrorTheClassThrowsAnError()
	{
		$webScraper = new WebScrape([]);
	}
}