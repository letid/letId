<?php
// exit(PHP_SAPI);
// error_reporting(E_ALL);
// error_reporting(-1);
// ini_set('error_reporting', E_ALL);
error_reporting(E_ALL); ini_set('display_errors', '1');
/**
* Initiate autoload
*/
require_once '..'.$_SERVER['PHP_SELF'];
/**
* Initiate HTTP_HOST, REQUEST_URI according to the Application's Routine!
*/
$application->request();
/**
* Initiate: configurate, Configuration
*/
$application->initiate();
/**
* Response: Html, termination execute
*/
$application->response();