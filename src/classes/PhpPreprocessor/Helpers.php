<?php

namespace PhpPreprocessor;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 * @package \PhpPreprocessor
 */
class Helpers
{
	/**
	 * @param string $str
	 * @return string
	 */
	public static function escapeString(string $str): string
	{
		return str_replace(
			["\\", "\"", "\$"],
			["\\\\", "\\\"", "\\\$"],
			$str
		);
	}
}
