<?php
namespace App;
class Initiate extends Configuration
{
    protected $database = array(
        'database'=>'test',
        'password'=>"search"
    );
    public function Application()
    {
        print_r($this);
        return '...TestCase...';// self::$databases['password'];
    }
    public function Database()
    {

    }
}
