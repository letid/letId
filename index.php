<?php
/*
letId PHP Framework
*/
define('app_initiated', microtime(true));
require_once 'vendor/autoload.php';
$application = new app\routeController();
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) require_once 'public/index.php';