<?php
/**
* Default document
*/
require __DIR__.'/..'.$_SERVER['PHP_SELF'];
/**
* Initiate HTTP_HOST, REQUEST_URI according to the Application's Routine!
*/
$Application = new App\Route;
/**
* Request: Http
*/
$Application->Request();
/**
* Initiate: Configuration
*/
$Application->Initiate();
/**
* Response: Html
*/
$Application->Response();
