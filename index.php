<?php
/*
letId PHP Framework
*/
// exit(PHP_SAPI);
// error_reporting(E_ALL);
// error_reporting(-1);
// ini_set('error_reporting', E_ALL);
define('app_initiated', microtime(true));
require_once 'vendor/autoload.php';
$application = new app\routeController();
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) require_once 'public/index.php';
