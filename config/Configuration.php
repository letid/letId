<?php
namespace App;
use Lethil;
class Configuration extends Lethil\Config\Project
{
    /*
    Application -> hostname
    */
    protected $application = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>".localhost",
        'zaideih'=>array(
            "zaideih.com",".zaideih.com",".zaideih."
        ),
        'storage.zaideih'=>"abc",
        'storage'=>array()
    );
    /*
    MySQL Connection!
    */
    protected $database = array(
        'username'=>"root",
        'password'=>"search",
        'host'=>'localhost',
        'port'=>3066,
    );
    /*
    If default has value, this will return when hostname has not match!
    */
    protected $default = null;
    /*
    Core will modify this directory!
    */
    protected $directory=array(
        "template"=>'template',
        "css"=>'css',
        "js"=>'js'
    );
    protected function Root()
    {
        /*
        this Method tells the root directory of the application to Core!
        If you prefer full Path prepend {__DIR__}, as {__DIR__.'/../apps/'};
        */
        return '../app/';
    }
    protected function Error()
    {
        /*
        this Method tells the errors directory of the application to Core!
        If you prefer full Path prepend {__DIR__}!
        */
        return '../app/errors/';
    }
    protected function Name()
    {
        /*
        this Method tells the Application namespace to Core!
        Current namespace must be match to your app Initiate's namespace!
        */
        return __NAMESPACE__;
    }
}
