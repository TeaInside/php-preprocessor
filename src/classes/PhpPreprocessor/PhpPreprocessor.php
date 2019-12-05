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
     * @var string
     */
    private $beforeStr = "";

    /**
     * @var string
     */
    private $afterStr = "";

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
     * @param string $str
     * @return void
     */
    public function setBeforeStr(string $str): void
    {
        $this->beforeStr = $str;
    }

    /**
     * @param string $str
     * @return void
     */
    public function setAfterStr(string $str): void
    {
        $this->afterStr = $str;
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
		fwrite($handle, "<?php ".$this->beforeStr);
		foreach ($this->nodes as $v) {
			fwrite($handle, $v->getPrint());
		}
		fwrite($handle, "\n".$this->afterStr);
	}

	/**
	 * @param resource $handle
	 * @return void
	 */
	private function buildNormal($handle): void
	{
		fwrite($handle, "<?php\n\n".$this->beforeStr);
		foreach ($this->nodes as $v) {
			fwrite($handle, $v->getPrint()."\n");
		}
		fwrite($handle, "\n".$this->afterStr);
	}
}
