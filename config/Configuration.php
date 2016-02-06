<?php
namespace App;
class Configuration extends \Letid\Config\Application
{
    /*
    this Method tells the Application namespace to Core!
    Current namespace must be match to your app Initiate's namespace!
    */
    const ANS = __NAMESPACE__;
    /*
    Application (folder) -> hostname (regex without slash)
    */
    protected $application = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>".localhost",
        'example'=>array(
            "example.com",".example.com",".example."
        ),
        'storage-example'=>"storage.example",
        'storage'=>array()
    );
    /*
    If default has value, this will return when hostname has not match!
    */
    protected $default = null;
    /*
    MySQL Connection!
    */
    protected $database = array(
        'host'=>'localhost',
        'port'=>3306,
        'username'=>"root",
        // 'password'=>null,
        // 'database'=>null
    );
    /*
    Core will modify this directory!
    */
    protected $directory=array(
        "template"=>'template/fe',
        "css"=>'css',
        "js"=>'js'
    );
    /*
    this Method tells the root directory of the application to Core!
    If you prefer full Path prepend {__DIR__}, as {__DIR__.'/../apps/'};
    */
    protected function Root()
    {
        return '../app/';
    }
    /*
    this Method tells the errors directory of the application to Core!
    If you prefer full Path prepend {__DIR__}!
    */
    protected function Message()
    {
        return '../app/message/';
    }
}
