<?php
/*
Default document
*/
require __DIR__.'/..'.$_SERVER['PHP_SELF'];
/*
    Initiate HTTP_HOST, REQUEST_URI according to the Application's Routine!
*/
$Application = new App\Routine;
/*
    Request: Http
*/
$Application->Request();
/*
    Initiate: Config
*/
$Application->Initiate();
/*
    Response: Html
*/
$Application->Response();
