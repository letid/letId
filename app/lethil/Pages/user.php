<?php
namespace App\Pages;
use App;
// use Letid\Request\DbQuery;
class user extends App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $this->menu();
    }
    public function login()
    {
        return array(
            'layout'=>array(
                'page.id'=>'login',
                'page.class'=>'login',
                'Title'=>'Login',
                'Description'=>'Login',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array('login'=>array())
                )
            )
        );
    }
    public function forgotPassword()
    {
        return array(
            'layout'=>array(
                'page.id'=>'forgotpassword',
                'page.class'=>'forgotpassword',
                'Title'=>'Forgot password',
                'Description'=>'Forgot password',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array('forgotpassword'=>array())
                )
            )
        );
    }
    public function register()
    {
        return array(
            'layout'=>array(
                'page.id'=>'register',
                'page.class'=>'register',
                'Title'=>'Register',
                'Description'=>'Registration',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array('register'=>array())
                )
            )
        );
    }
}
