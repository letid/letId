<?php
namespace App\Pages;
use Letid\Request\Database;
// use Letid\Request\Validate;
use Letid\Request\Form;
// use Letid\Request\Timer;
class user extends \App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $this->menu();
        $this->registration_table ='users';
    }
    public function register()
    {
        $this->registration_method = 'POST';
        $this->registration_message = 'this is message';
        $this->registration_setting = array(
            'username'=>array(
                'value'=>'defaultUsernameFromValue',
                'require'=>array(
                    'mask'=>'Required',
                    'status'=>'Username'
                ),
                'custom'=>array(
                    'duplicate_check'=>array(
                        // 'task'=>array('a','b','c'),
                        'mask'=>'Exists',
                        'status'=>'Username is not available.'
                    )
                )
            ),
            'password'=>array(
                'value'=>'test',
                'require'=>array(
                    'mask'=>'Required',
                    'status'=>'Password'
                ),
                'custom'=>array(
                    'password_encrypt'=>array(
                        'modify'=>true
                    )
                )
            ),
            'email'=>array(
                'value'=>'test@test.',
                'require'=>array(
                    'mask'=>'Required',
                    'status'=>'Email'
                ),
                'validate'=>array(
                    'task'=>'email',
                    'mask'=>'Invalid',
                    'status'=>'a valid Email'
                ),
                'custom'=>array(
                    'duplicate_check'=>array(
                        // 'task'=>'existsCheck',
                        'mask'=>'Exists',
                        'status'=>'Email is already exists.'
                    )
                )
            )
            // 'created'=>array(
            //     'value'=>'NOW()'
            // ),
            // 'modified'=>array(
            //     'value'=>'NOW()'
            // )
        );
        $data=Form::name('registration')->setting($this)->response();
        $this->error_get_last();
        return array(
            'layout'=>array(
                'page.id'=>'register',
                'page.class'=>'register',
                'Title'=>'Register',
                'Description'=>'Registration',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'register'=>array(
                        )
                    )
                )
            )
        );

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
                    array(
                        'login'=>array()
                    )
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
                    array(
                        'forgotpassword'=>array()
                    )
                )
            )
        );
    }
    // public function duplicate_check($value,$name)
    // {
    //     return !Database::select('id')->from($this->registration_table)->where($name,$value)->execute()->rowsCount()->rowsCount;
    // }
    public function registerUser($d)
    {
        // $rows=array();
        // foreach ($d as $key => $value) {
        //     // ${$key}=$value;
        //     $rows[$key]='\''.$value.'\'';
        // }
        // $rowsData = implode(',',$rows);
        // $rowsData = implode(', ', array_map(
        //     function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
        //     $d, array_keys($d)
        // ));
        // // print_r($rowsData);
        // $db=Database::load("INSERT INTO {$this->registration_table} SET $rowsData, created = NOW(), modified = NOW()");
        // print_r($db);
        // username='$username', password='$password', email='$email'
        // $register_user = new sql("INSERT INTO {$this->users_table} SET
        //   username ='$xusername', password = '$newpassword', huaipi = '$xpassword',
        //   khua = '$xzogam', gender = '$xgender', fullname = '$newfullname',
        //   dob = '$xdob',  email = '$xemail', profile = '$newprofile',
        //   beh = '$xbeh', title = '$xtitle', country = '$xcountry',
        //   state = '$xstateorprovince', address = '$newaddress', postcode = '$xpostcode', city = '$newcity',
        //   status = '1', code = '{$this->CODE}', ip='$this->ip', dreg = NOW()");
    }
}
