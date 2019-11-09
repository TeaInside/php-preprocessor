<?php

namespace PhpPreprocessor\Components;

use PhpPreprocessor\Helpers;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 * @package \PhpPreprocessor\Components
 */
class DefConst
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var mixed
	 */
	private $value;

	/**
	 * @param string $name
	 * @param mixed  $value
	 *
	 * Constructor.
	 */
	public function __construct(string $name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @return string
	 */
	public function getPrint(): string
	{
		$r = "define(\"".Helpers::escapeString($this->name)."\", ";

		switch (gettype($this->value)) {
			case "string":
				$r .= "\"".Helpers::escapeString($this->value)."\"";
				break;
			
			default:
				break;
		}

		$r .= ");";

		return $r;
	}
}
