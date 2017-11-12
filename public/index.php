<?php
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
