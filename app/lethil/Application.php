<?php
namespace App;
class Application
{
    public $page = array(
        'home'=>array(
            'Class'=>'home',
            'Method'=>'home',
            'Menu'=>'Home'
        ),
        'about-us'=>array(
        	'Method'=>'aboutUs',
        	'Menu'=>'About us'
        ),
        'terms'=>array(
        	'Method'=>'terms',
        	'Menu'=>'Terms'
        ),
        'privacy'=>array(
        	'Method'=>'privacy',
        	'Menu'=>'Privacy'
        ),
        'signin'=>array(
            'Class'=>'sign',
            'Method'=>'signin',
            'Menu'=>'Signin',
            'Type'=>'user',
            'Auth'=>'guest'
        ),
        'signup'=>array(
            'Class'=>'sign',
            'Method'=>'signup',
            'Menu'=>'Signup',
            'Type'=>'user',
            'Auth'=>'guest'
        ),
        'forgot-password'=>array(
            'Class'=>'sign',
            'Method'=>'forgotPassword',
            'Menu'=>'Forgot password',
            'Type'=>'user',
            'Auth'=>'guest'
        ),
        'reset-password'=>array(
            'Class'=>'sign',
            'Method'=>'resetPassword',
            'Menu'=>'Reset password',
            'Type'=>'user',
            'Auth'=>'guest'
        ),
        'auth'=>array(
            'Class'=>'sign',
            // 'Method'=>'home',
            // 'Menu'=>array(),
            'Menu'=>'display.name',
            'Type'=>'user',
            'Auth'=>array(
                'user'
            ),
            'update'=>array(
                'Method'=>'update',
                'Menu'=>'Update'
            ),
            'update?cheml'=>array(
                'Method'=>'update',
                'Menu'=>'Change email'
            ),
            'update?chpwd'=>array(
                'Method'=>'update',
                'Menu'=>'Change password'
            ),
            'update?chdis'=>array(
                'Method'=>'update',
                'Menu'=>'Change displayname'
            ),
            'signout'=>array(
                'Menu'=>'Signout',
                'Method'=>'signout',
                'Link'=>'?signout'
            )
        ),
        // 'signout'=>array(
        //     'Menu'=>'Signout',
        //     'Method'=>'signout',
        //     'Link'=>'?signout',
        //     'Type'=>'user',
        //     'Auth'=>array(
        //         'user'
        //     )
        // )
    );
    // public $directory = array(
    //     'love'=>'abc'
    // );
    public $configuration = array(
        'version'=>'1.1.0.1',
        'previousHits'=>0,
    );
}
