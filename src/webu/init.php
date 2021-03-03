<?php


//set some default values
define('ROOT', dirname(dirname(__DIR__)) );
define('CACHE_DIR', '/var/cache');


//load config
require(ROOT . DIRECTORY_SEPARATOR . "config.php");
if(!defined('MODE')) {
    echo "Please create the config.php file with the sample pattern";
    die();
}

//load custom elements
require(ROOT . "/dev/main.php");


//load autoloader
require(ROOT . "/src/webu/.autoloader/AutoloadInit.php");
//load twig autoloader
require_once(ROOT . "/vendor/autoload.php");