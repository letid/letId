<?php
namespace app
{
    class configuration extends \letId\support\configuration
    {
        /**
        * application's directory rewrite!
        */
        protected $rewrite = array(
            'src'=>'resource'
        );
        /**
        * application's directory
        */
        protected $directory = array(
            'template'=>'template',
            'language'=>'language'
        );
        /**
        * application's setting
        */
        protected $setting = array(
            'build' => '07.09.16.15.00',
			'version' => '1.0.7',
			'name' => 'letId',
			'description' => 'letId PHP Framework'
        );
    }
}
