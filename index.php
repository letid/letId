<?php
/*
Keywords Reserved!
*/
// exit(PHP_SAPI);
define('app_initiated', microtime(true));
$loader=require __DIR__ . '/vendor/autoload.php';
// print_r($loader);die();
/*
Initiate HTTP_HOST, REQUEST_URI
*/
$Application = new App\Configuration();
// $Application->loader=$loader;
/*
Request PROCESSOR
*/
$Application->Request();
/*
Response the Request
*/
$Application->Response();
