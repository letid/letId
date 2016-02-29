<?php
namespace App;
use Letid\Http;
class Routine extends Http\Application
{
    /*
        $map: Application (folder) -> hostname (regex without slashs)
    */
    protected $map = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>"localhost",
        'example'=>array(
            "example.com",".example.com",".example."
        ),
        'storage-example'=>"storage.example",
        'storage'=>array()
    );
    /*
        If AMP has value, this will return when hostname has no match in $map.
        Otherwise $responsive workout.
    */
    // const AMP = '';
    /*
        $directory: Core will modify this directory!
    */
    protected $directory = array(
        "template"=>'template',
        "css"=>'css',
        "js"=>'js'
    );
    /*
        ARO: the application directory where the Applications are live in! the root directory of the Applications.
        If you prefer full Path prepend {__DIR__}, as {__DIR__.'/../app/'};
        const ARO = '../app/';
    */
    /*
    	ARN: Errors and Notification responsive directory
        const ARN = '../app/notification/';
    */
    /*
        ANS: the Application Namespace, this can not be modified!
    */
    const ANS = __NAMESPACE__;
    /*
        ADR: Application Directory, this can not be modified! Not in used (at the moment)!
    */
    const ADR = __DIR__;
}
