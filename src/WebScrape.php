<?php namespace WebScrape;

use Countable;
use WebScrape\Exception\EmptyConstructorArrayException;

class WebScrape implements Countable
{
	protected $linkCollection;

	public function __construct(array $args)
	{
		if(empty($args)) {
			throw new EmptyConstructorArrayException;
		} 

		$this->linkCollection = $args;
	}

	public function count()
	{
		return count($this->linkCollection);
	}

}