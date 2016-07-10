<?php
namespace app;
class routeController extends \letId\support\http
{
    /**
    * application (folder) => hostname (regex without slashs)
    * * @var array/string
    */
    protected $application = array(
        // 'lethil'=>'lethil.localhost',
        // 'example'=>array(
        //     'example.com','.example.com','.example.'
        // ),
        'myordbok'=>'myordbok.',
        'lethil'=>''
    );
    /**
    * common directory rewrite!
    */
    protected $rewrite = array();
    /**
    * common directory
    */
    protected $directory = array(
        'template'=>'template',
        'language'=>'language'
    );
    /**
    * common configuration
    */
    protected $configuration = array(
        /**
        * NOTE: application's namespace, ANS can not be modified!
        */
        'ANS'=>__NAMESPACE__
    );
}
