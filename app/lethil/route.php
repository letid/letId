<?php
namespace app;
class route
{
  public $page = array(
    array(
      'Page'=>'',
      'Class'=>'home',
      'Method'=>'home',
      'Menu'=>'Home'
    ),
    array(
      'Page'=>'about',
      'Method'=>'aboutUs',
      'Menu'=>'About us'
    ),
    // NOTE: api
    array(
      'Page'=>'api',
      'Class'=>'api',
      'Menu'=>'API',
      // 'Type'=>'api',
      array(
        'Page'=>'json',
        'Method'=>'json',
        'Menu'=>'JSON'
      )
    ),
    array(
      'Page'=>'form',
      'Class'=>'form',
      'Method'=>'home',
      'Menu'=>'Form',
      array(
        'Page'=>'update',
        'Method'=>'update',
        'Menu'=>'Update'
      )
    ),
    array(
      'Page'=>'privacy',
      'Method'=>'privacy',
      'Menu'=>'Privacy',
      'Type'=>'privacy'
    ),
    array(
      'Page'=>'terms',
      'Method'=>'terms',
      'Menu'=>'Terms',
      'Type'=>'privacy'
    ),
    array(
      'Page'=>'signin',
      'Class'=>'sign',
      'Method'=>'signin',
      'Menu'=>'Signin',
      'Type'=>'user',
      'Auth'=>'guest'
    ),
    array(
      'Page'=>'signup',
      'Class'=>'sign',
      'Method'=>'signup',
      'Menu'=>'Signup',
      'Type'=>'user',
      'Auth'=>'guest'
    ),
    array(
      'Page'=>'forgot-password',
      'Class'=>'sign',
      'Method'=>'forgotPassword',
      'Menu'=>'Forgot password',
      'Type'=>'password',
      'Auth'=>'guest'
    ),
    array(
      'Page'=>'reset-password',
      'Class'=>'sign',
      'Method'=>'resetPassword',
      'Menu'=>'Reset password',
      'Type'=>'password',
      'Auth'=>'guest'
    ),
    // NOTE: auth
    array(
      'Page'=>'auth',
      'Class'=>'sign',
      'Menu'=>'user.displayname',
      'Type'=>'user',
      'Auth'=>array(
        'user'
      ),
      array(
        'Page'=>'update',
        'Method'=>'update',
        'Menu'=>'Update'
      ),
      array(
        'Page'=>'update?cheml',
        'Method'=>'update',
        'Menu'=>'Change email'
      ),
      array(
        'Page'=>'update?chpwd',
        'Method'=>'update',
        'Menu'=>'Change password'
      ),
      array(
        'Page'=>'update?chdis',
        'Method'=>'update',
        'Menu'=>'Change displayname'
      ),
      array(
        'Page'=>'signout',
        'Menu'=>'Signout',
        'Method'=>'signout',
        'Link'=>'?signout'
      )
    )
  );
  public function __construct()
  {
    // avail::session()->delete();
    // $this->page['myordbokorgange'] = array(
    //       'Method'=>'aboutUs',
    //       'Menu'=>'MyOrdboks d',
    //       'burglish'=>array(
    //         'Method'=>'burglish',
    //         'Menu'=>'Burglish'
    //       )
    //     );
    // return $this->page;
  }
}
