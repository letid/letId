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
        'redirect'=>array(
            'Menu'=>'Redirect',
            'Link'=>'http://www.google.com',
            'Type'=>false
        ),
        'login'=>array(
            'Class'=>'login',
            'Method'=>'login',
            'Menu'=>'Login',
            'Type'=>'user',
            'Auth'=>array('age'=>12)
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
        'home'=>array(
            'Class'=>'home',
            'Method'=>'home',
            'Menu'=>'Home'
        ),
        'redirect'=>array(
            'Menu'=>'Redirect',
            'Link'=>'http://www.google.com',
            'Type'=>false
        ),
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
        'core'=>'changed',
        'application'=>'org'
    );
}
