<?php

namespace PhpPreprocessor\Components;

use PhpPreprocessor\Helpers;
use PhpPreprocessor\NodeFoundation;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 * @package \PhpPreprocessor\Components
 */
class DefConst extends NodeFoundation
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


	public static function buildValue($val)
	{
		switch (gettype($val)) {
			case "string":
				$r = "\"".Helpers::escapeString($val)."\"";
				break;

			case "array":
				$r = "[";
				$i = 0;
				foreach ($val as $k => $v) {
					if (is_int($i) && ($k === $i)) {
						$r .= self::buildValue($v).",";
						$i++;
					} else {
						$i = null;
						$r .= self::buildValue($k)."=>".self::buildValue($v).",";
					}
				}
				$r = rtrim($r, ",")."]";
				break;

			case "integer":
			case "double":
				$r = $val;
				break;

			case "NULL":
				$r = "null";
				break;

			default:
				break;
		}
		return $r;
	}

	/**
	 * @return string
	 */
	public function getPrint(): string
	{
		return "define(\"".Helpers::escapeString($this->name)."\", ".self::buildValue($this->value).");";
	}
}
