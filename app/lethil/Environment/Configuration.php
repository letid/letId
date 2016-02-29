<?php
namespace App\Environment;
/*
    NOTE: in order to use MySQL
    1. this filename has to be renamed (Configuration.example.php) to (Configuration.php)
    2. Config $database
*/
class Configuration_NOTINUSE extends \App\Initiate
{
    /*
        $database: ARRAY Database Connection!
    */
    protected $database = array(
        'host'=>'localhost',
        'port'=>3306,
        'username'=>'root',
        'password'=>'search',
        'database'=>'test'
    );
}
