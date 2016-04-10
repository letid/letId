<?php
namespace App;
use Letid\Http;
class Application extends Http\Request
{
    protected $page = array(
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
        'redirect'=>array(
            'Menu'=>'Redirect',
            'Link'=>'http://www.google.com',
            'Type'=>false
        ),
        'login'=>array(
            'Class'=>'user',
            'Method'=>'login',
            'Menu'=>'Login',
            'Type'=>'user',
            'Auth'=>array('age'=>12)
        ),
        'forgot-password'=>array(
            'Class'=>'user',
            'Method'=>'forgotPassword',
            'Menu'=>'Forgot Password',
            'Type'=>'user'
        ),
        'register'=>array(
            'Class'=>'user',
            'Method'=>'register',
            'Menu'=>'Register',
            'Type'=>'user'
        ),
        'music'=>array(
            'Class'=>'music',
            'Auth'=>array('age'=>30),
            'album'=>array(
                'Method'=>'album'
            ),
            'artist'=>array(
                'Method'=>'artist'
            )
        )
    );
    /*
    protected $page = array(
        'login'=>array(
            'Class'=>'login',
            'Method'=>'login',
            'Menu'=>'Login',
            'Type'=>'user', // Navi, Navigator boolval(disable:false/true), string(enable:type), default:page
            'Auth'=>array('age'=>18) // Auth, Authority, Authorization
        ),
        'music'=>array(
            'Class'=>'music',
            'album'=>array(
                'Method'=>'album',
                'title'=>array(
                    'Method'=>'title',
                    'sort'=>array(
                        'Method'=>'sort',
                    )
                ),
                'name'=>array(
                    'Method'=>'name',
                )
            ),
            'artist'=>array(
                'Method'=>'artist'
            )
        )
    );
    */
    protected $config = array(
        'version'=>'1.0.1.2',
    );
}
