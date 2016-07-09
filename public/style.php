<?php
/**
* __DIR__
* __DIR__.'/..'.$_SERVER['PHP_SELF'];
*/
// header('Content-type: text/css');
// print_r($_GET);
// $query_str = parse_url($url, PHP_URL_QUERY);
// parse_str($query_str, $query_params);
// print_r($query_params);
/*
$requestDirectory = '../app/';
// $requestDirectory = realname(dirname(__FILE__) . '../app/';
if (!isset($_GET['sheet'])) {
  // header('HTTP/1.1 404 Not Found');
  exit(1);
}
$file = $requestDirectory.$_GET['sheet'];
// $file = realpath($requestDirectory.$_GET['sheet']);
if (!$file) {
  // header('HTTP/1.1 404 Not Found');
  exit(2);
}
if (substr($file, 0, strlen($requestDirectory) != $requestDirectory)) {
  // because we've sanitized using realpath - this must match
  // header('HTTP/1.1 404 Not Found'); // or 403 if you really want to - maybe log it in errors as an attack?
  // print_r($_GET);
  exit(3);
}
header('Content-type: text/css');
// echo file_get_contents($file);
exit(4);
*/
$requestDirectory = '../app/';
if (isset($_GET['sheet'])) {
    $file = $requestDirectory.$_GET['sheet'];
    if (file_exists($file)) {
        header('Content-type: text/css');
        // file_get_contents($file);
        readfile($file);
        exit;
    } else {
        header('HTTP/1.1 404 Not Found');
    }
}