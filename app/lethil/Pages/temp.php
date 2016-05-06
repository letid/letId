<?php
namespace App\Pages;
use App;
use Letid\Request\Database;
// use Letid\Request\Validate;
use Letid\Request\Form;
// use Letid\Request\Timer;
class temp extends App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $this->menu();
        $this->users_table ='users';
    }
    public function register()
    {
        /*
        $uniq_tmp = uniqid();
        $UserSelect = Database::select(
            'column'
            )->from(
                'tableName'
            )->limit(12,6)->build();
            print_r($UserSelect);
        $UserTruncate = Database::truncate(
            'TABLE'
            )->from(
                'tableName5'
            )->build();
            print_r($UserTruncate);
        $UserDropIndex = Database::drop(
            'INDEX'
            )->from(
                'indexName'
            )->alter(
                'tableName'
            )->build();
            print_r($UserDropIndex);
            // ALTER TABLE tableName DROP INDEX indexName
        $UserDrop = Database::drop(
            'DATABASE'
            )->from(
                'databaseName'
            )->build();
            print_r($UserDrop);
        return header('Content-type: application/json');
        */
        $this->registration_table = 'users';
        $this->registration_method = 'POST';
        $this->registration_setting = array(
            'username'=>array(
                'value'=>'default username from array',
                'require'=>array(
                    'mask'=>'Required',
                    'status'=>'Username'
                ),
                'custom'=>array(
                    'customUsername'=>array(
                        'task'=>array('a','b','c'),
                        'mask'=>'Exists',
                        'status'=>'Username is not available.'
                    )
                )
            ),
            'password'=>array(
                'require'=>array(
                    'mask'=>'Required',
                    'status'=>'Password'
                ),
                'custom'=>array(
                    'customPasswordEncrypt'=>array(
                        'modify'=>true
                    )
                )
            ),
            'email'=>array(
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
                    'customEmail'=>array(
                        'task'=>'existsCheck',
                        'mask'=>'Exists',
                        'status'=>'Email is already exists.'
                    )
                )
            ),
            'created'=>array(
                'value'=>'NOW()'
            ),
            'modified'=>array(
                'value'=>'NOW()'
            )
        );
        $data=Form::name('registration')->setting($this)->response();
        // print_r($data);
        // $this->pageHeader='this is header!';
        // $this->pageFooter='this is footer!';
        // header('Content-type: application/json');
        // $uniq_tmp = uniqid();
        // $UserSelect = Database::select(
        //
        //     )->rowsCalc(
        //
        //     )->from(
        //         $this->users_table
        //     )->limit(7)->execute()->toObject('loveme')->rowsCount()->rowsTotal();
        //     print_r($UserSelect);
        // $UserInsert = Database::insert(
        //         array('username'=>$uniq_tmp, 'password'=>'password', 'email'=>"$uniq_tmp@email.com")
        //     )->to(
        //         'tableName'
        //     )->build();
        //     print_r($UserInsert);
        // $UserInsertValue = Database::insert(
        //         array('username', 'password', 'email', 'created')
        //         // 'username', 'password', 'email', 'created'
        //     )->value(
        //         array($uniq_tmp, 'password', "$uniq_tmp@email.com",date('Y-m-d G:i:s')),
        //         array($uniq_tmp, 'password', "$uniq_tmp@email.com",date('Y-m-d G:i:s')),
        //         array($uniq_tmp, 'password', "$uniq_tmp@email.com",date('Y-m-d G:i:s'))
        //     )->to(
        //         'tableName'
        //     )->build();
        //     print_r($UserInsertValue);
        //     // INSERT INTO tableName (a,b) VALUES (1,2), (2,3), (3,4);
        //     // INSERT INTO tableName SET created = NOW(), modified = NOW(), date('Y-m-d G:i:s')
        // $UserUpdate = Database::update(
        //         array('username'=>$uniq_tmp, 'password'=>'password', 'email'=>"$uniq_tmp@em'ail.com")
        //     )->to(
        //         'tableName'
        //     )->where(
        //         'id','=',0
        //     )->build();
        //     print_r($UserUpdate);
        // $UserUpdateValue = Database::update(
        //         array('username', 'password', 'email', 'created')
        //     )->value(
        //         array($uniq_tmp, 'password', "$uniq_tmp@emailKhen's.com",date('Y-m-d G:i:s'))
        //     )->to(
        //         'tableName'
        //     )->build();
        //     print_r($UserUpdateValue);
        //
        // return '';
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
    public function customUsername()
    {
        return 1;
    }
    public function customEmail()
    {
        return true;
    }
    public function customPasswordEncrypt($value)
    {
        return sha1($value);
    }
    private function customDuplicateCheck($value,$name)
    {
        // return Database::load("SELECT id FROM {$this->users_table} WHERE $name = '$value'")->rowsCount()->rowsCount;
    }
    public function existsCheck($value,$name)
    {
        /*
        Database::select('*')->table('tableName')->where($column,$row);
        */
    }
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
        // $db=Database::load("INSERT INTO {$this->users_table} SET $rowsData, created = NOW(), modified = NOW()");
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
