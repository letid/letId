<?php
namespace App;
use Lethil;
class Configuration extends Lethil\Config\Project
{
    protected $Application = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>".localhost",
        'zaideih'=>array(
            "zaideih.com",".zaideih.com",".zaideih."
        ),
        'storage.zaideih'=>"abc",
        'storage'=>array()
    );
    // protected $Available = array('zaideih');
    protected $Default = null;
    /*
    this Method tells the root directory of the application to Core!
    */
    protected function Root()
    {
        return '../apps/';
        // return __DIR__.'/../apps/';
    }
    /*
    this Method tells the errors directory of the application to Core!
    */
    protected function Error()
    {
        return '../app/errors/';
        // return __DIR__.'/../app/errors/';
    }
    /*
    this Method tells the Application namespace to Core!
    */
    protected function Name()
    {
        return __NAMESPACE__;
    }
}
