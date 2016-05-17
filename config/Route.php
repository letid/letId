<?php
namespace App;
class Route extends \Letid\Http\Request
{
    /*
        $host: Application (folder) => hostname (regex without slashs)
    */
    protected $terminal = array(
        'lethil'=>"lethil.localhost",
        'localhost'=>"localhost",
        'example'=>array(
            "example.com",".example.com",".example."
        ),
        'storage-example'=>"storage.example",
        'storage'=>array()
    );
    protected $directory = array(
		'template'=>'template',
		'language'=>'language'
	);
    protected $configuration = array(
        'language'=>'en'
    );
    /*
        ANS: the Application's Namespace, this can not be modified!
    */
    const ANS = __NAMESPACE__;
    /*
        ADR: the Application's Directory, this can not be modified! Not in used (at the moment)!
    */
    const ADR = __DIR__;
}
