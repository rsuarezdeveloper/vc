<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
* @var $loader ClassLoader
*/
$loader = require __DIR__.'/../vendor/autoload.php';
//require_once  __DIR__.'/../vendor/mpdf/src/mpdf.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
