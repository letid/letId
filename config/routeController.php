<?php
namespace app;
class routeController extends \letId\support\http
{
    /**
    * NOTE: application (folder) => hostname (regex without slashs)
    */
    protected $application = array(
        // 'lethil'=>'lethil.localhost',
        // 'localhost'=>'localhost',
        // 'example'=>array(
        //     'example.com','.example.com','.example.'
        // ),
        'lethil'=>''
    );
    protected $rewrite = array(
        'src'=>'resource'
    );
    protected $directory = array(
        'template'=>'template',
        'language'=>'language'
    );
    protected $configuration = array(
        /**
        * NOTE: application's Root
        */
        'ARO' => '../app/',
        /**
        * NOTE: application's Root error output
        */
        'ARD' => 'errors/',
        /**
        * NOTE: application's default language
        */
        // 'language'=>'en',
        /**
        * NOTE: application's Namespace, ANS can not be modified!
        */
        'ANS'=>__NAMESPACE__,
        /**
        * NOTE: application's Directory, ADR can not be modified! Not in used (at the moment)!
        */
        // 'ADR'=>__DIR__
    );
}
