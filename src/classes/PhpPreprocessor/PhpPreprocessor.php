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
	 * @var array
	 */	
	private $nodes = [];

	/**
	 * @var bool
	 */
	public $minify = false;

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
		$this->nodes[] = $node;
	}

	/**
	 * @return void
	 */
	public function build(): void
	{
		$handle = fopen($this->file, "w");
		if ($this->minify) {
			$this->buildMinify($handle);
		} else {
			$this->buildNormal($handle);
		}
		fclose($handle);
	}

	/**
	 * @param resource $handle
	 * @return void
	 */
	private function buildMinify($handle): void
	{
		fwrite($handle, "<?php ");
		foreach ($this->nodes as $v) {
			fwrite($handle, $v->getPrint());
		}
		fwrite($handle, "\n");
	}

	/**
	 * @param resource $handle
	 * @return void
	 */
	private function buildNormal($handle): void
	{
		fwrite($handle, "<?php\n\n");
		foreach ($this->nodes as $v) {
			fwrite($handle, $v->getPrint()."\n");
		}
		fwrite($handle, "\n");
	}
}
