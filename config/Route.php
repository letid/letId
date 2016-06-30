<?php
namespace App;
class Route extends \Letid\Http\Request
// class Route extends \letId\httpRequest
{
    /**
    * NOTE: application (folder) => hostname (regex without slashs)
    */
    protected $application = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>"localhost",
        'example'=>array(
            "example.com",".example.com",".example."
        ),
        'storage-example'=>"storage.example",
        'storage'=>array()
    );
    /**
    * NOTE: custom configuration is okey!
    */
    // protected $root = '../app/';
    // protected $directory = array(
	// 	'template'=>'template',
	// 	'language'=>'language'
	// );
    // protected $configuration = array(
    //     'language'=>'en'
    // );
    /**
    * NOTE: the Application's Namespace, ANS can not be modified!
    */
    const ANS = __NAMESPACE__;
    /**
    * NOTE: the Application's Directory, ADR can not be modified! Not in used (at the moment)!
    */
    const ADR = __DIR__;
}
