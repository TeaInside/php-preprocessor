<?php

/**
 * @param string $class
 * @return void
 */
function phpPreprocessorAutoloader(string $class)
{
	if (file_exists($f = __DIR__."/src/classes/PhpPreprocessor/".str_replace("\\", "/", $class).".php")) {
		require $f;
	}
}

spl_autoload_register("phpPreprocessorAutoloader");
