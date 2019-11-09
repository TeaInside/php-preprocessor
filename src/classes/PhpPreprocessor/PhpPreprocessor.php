<?php

namespace PhpPreprocessor;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 * @package \PhpPreprocessor
 */
class PhpPreprocessor
{
	/**
	 * @var string
	 */
	private $file;

	/**
	 * @var string
	 */
	private $print = "";

	/**
	 * Constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @param string $file
	 */
	public function setFile(string $file): void
	{
		$this->file = $file;
	}

	/**
	 * @param \PhpPreprocessor\NodeFoundation
	 * @return void
	 */
	public function addNode(NodeFoundation $node): void
	{

	}
}
