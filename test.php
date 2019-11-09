<?php

require __DIR__."/src/autoload.php";

use PhpPreprocessor\PhpPreprocessor;
use PhpPreprocessor\Components\DefConst;

$st = new PhpPreprocessor;
$st->minify = false;
$st->setFile("/dev/stdout");
$st->addNode(new DefConst("API_TOKEN", "this is an API TOKEN"));
$st->addNode(new DefConst("ADMINS", [1,2,3,4,5]));
$st->addNode(new DefConst("SOMETHING", null));
$st->build();
