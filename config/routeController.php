<?php
namespace app
{
  class routeController extends \letId\request\http
  {
    /**
    * Application (folder) => hostname (regex without slashs)
    * @var array/string
    */
    protected $application = array(
      'myordbok'=>'myordbok.',
      'zaideih'=>'zaideih.',
      'lethil'=>'lethil.'
    );
    /**
    * Common directory rewrite!
    * @var array
    */
    // protected $rewrite = array();
    /**
    * Setting!
    * @var array
    */
    // protected $setting = array();
    /**
    * Common directory
    * @var array
    */
    // protected $directory = array(
    //   'template'=>'template',
    //   'language'=>'language'
    // );
    /**
    * Common configurations
    * @var array
    * NOTE: application's namespace, ANS can not be modified!
    */
    protected $configuration = array(
      // 'storage.root'=>'/storage',
      // Ini file
      // 'environment'=>'environment',
      'ANS'=>__NAMESPACE__
    );
  }
}