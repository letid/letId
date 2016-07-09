<?php
namespace app\map;
use app;
class sign extends mapController
{
    public $signup_table = 'users';
    public function __construct()
    {
        $this->timer = app\avail::timer();
    }
    public function homeConcluded()
    {
    }
    public function classConcluded()
    {
        app\verso::nav()->request();
        app\verse::nav()->request();
        app\log::hits()->counter();
        app\avail::assist()->error_get_last();
        $this->timerfinish = $this->timer->finish();
    }
    public function home()
    {
        return array(
            'layout'=>array(
                'Title'=>'Account',
                'Description'=>'Account',
                'Keywords'=>'PHP framework',
                'page.id'=>'account',
                'page.class'=>'account',
                'page.content'=>array(
                    'user.home'=>array(
                        'user.home.info'=>array(
                            'email'=>app\avail::$user->email,
                            'log'=>app\avail::$user->logs,
                            'role'=>app\avail::$user->role,
                            'dreg'=>app\avail::$user->created,
                            'dlog'=>app\avail::$user->modified
                        ),
                        'user.home.address'=>array(
                            'home.li.one'=>'One of One'
                        ),
                        'user.home.contact'=>array(
                            'home.li.one'=>'One of One'
                        ),
                        'user.home.profile'=>array(
                            'home.li.one'=>'One of One'
                        ),
                        'user.home.update'=>array(
                            'home.li.one'=>'One of One'
                        ),
                        'user.home.status'=>array(
                            'home.li.one'=>'One of One'
                        ),
                        'user.home.system'=>array(
                            'home.li.one'=>'One of One'
                        ),
                    )
                )
            )
        );
    }
    public function update()
    {
        return array(
            'layout'=>array(
                'Title'=>'Account',
                'Description'=>'Account',
                'Keywords'=>'PHP framework',
                'page.id'=>'account',
                'page.class'=>'account',
                'page.content'=>array(
                    'user.update'=>$this->user_update_selected()
                )
            )
        );
    }
    private function user_update_selected($update=array())
    {
        $form = array(
            'cheml'=>$this->cheml(),'chpwd'=>$this->chpwd(),'chdis'=>$this->chdis(),'chpro'=>$this->chpro()
        );
        foreach ($form as $Id => $Name) {
            $selected = isset($_GET[$Id])?'selected':$Id;
            $update["user.update.$selected"] = app\avail::template($Name);
        }
        return $update;
    }
    private function cheml()
    {
        return app\form::name(
            'cheml'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>array(
                    'email'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'email'
                        ),
                        'validate'=>array(
                            'filter'=>FILTER_VALIDATE_EMAIL,
                            'mask'=>'Invalid',
                            'class'=>'invalid',
                            'status'=>'a valid E-mail'
                        ),
                        'custom'=>array(
                            'Duplicate'=>array(
                                'task'=>array(
                                    array('userid','!=',app\avail::$user->userid)
                                ),
                                'mask'=>'!',
                                'status'=>'E-mail already exists.'
                            )
                        )
                    ),
                    'password'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'password'
                        ),
                        'custom'=>array(
                            'Exists'=>array(
                                'task'=>array(
                                    array('userid',app\avail::$user->userid)
                                ),
                                'mask'=>'!',
                                'status'=>'Password is not correct.'
                            ),
                            'Encrypt'=>array(
                                'modify'=>true
                            )
                        ),
                        'id'=>true
                    ),
                    'userid'=>array(
                        'value'=>app\avail::$user->userid,
                        'id'=>true
                    )
                )
            )
        )->update(
        )->done(
            array(
                'user.update.cheml'=>array(
                )
            )
        );
    }
    private function chpwd()
    {
        return app\form::name(
            'chpwd'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>array(
                    'password'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'current password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>true
                            ),
                            'Exists'=>array(
                                'task'=>array(
                                    array('userid',app\avail::$user->userid)
                                ),
                                'mask'=>'!',
                                'status'=>'Password is not correct.'
                            )
                        ),
                        'id'=>true
                    ),
                    'newpassword'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'new password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>'password'
                            )
                        )
                    ),
                    'userid'=>array(
                        'value'=>app\avail::$user->userid,
                        'id'=>true
                    )
                )
            )
        )->changepassword(
        )->done(
            array(
                'user.update.chpwd'=>array(
                )
            )
        );
    }
    private function chdis()
    {
        return app\form::name(
            'chdis'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>array(
                    'displayname'=>array(
                        'value'=>app\avail::$user->displayname,
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'display name'
                        )
                    ),
                    'userid'=>array(
                        'value'=>app\avail::$user->userid,
                        'id'=>true
                    )
                )
            )
        )->update(
            function ($status, $obj) {
                if ($status) {
                    app\avail::content('user.displayname')->set($obj->formPost['displayname']);
                    return 'Updated';
                } else {
                    return 'Sorry';
                }
            }
        )->done(
            array(
                'user.update.chdis'=>array(
                )
            )
        );
    }
    private function chpro()
    {
/*
        userid
        firstname
        lastname
        dob
        site
        address
        postcode
        city
        state
        country
        telephone
        mobile
        profile
        ip
        beh
        gender
        khua
        huaipi
        setting
        data

;

*/
        // $date = "01/02/2000";
        // $date = date_parse($date); // or
        // $date = "2020-1-2";
        // $date = date_parse_from_format("Y-m-d", $date);
        // if (checkdate($date['month'], $date['day'], $date['year'])) {
        //     // Valid Date
        //     if (date("Y") >= $date['year']) {
        //         echo 'Ok';
        //     }
        //     print_r($date);
        // }
        $setting = array(
            'userid'=>array(
                'value'=>app\avail::$user->userid,
                'id'=>true
            ),
            'firstname'=>array(
                'require'=>array(
                    'mask'=>'Required',
                    'class'=>'require',
                    'status'=>'first name'
                )
            ),
            'lastname'=>array(
                'require'=>array(
                    'mask'=>'Required',
                    'class'=>'require',
                    'status'=>'last name'
                )
            ),
            'dob'=>array(
                // 'require'=>array(
                //     'mask'=>'YYYY-mm-dd',
                //     'class'=>'require',
                //     'status'=>'date of birth'
                // ),
                'validate'=>array(
                    'filter'=>function($dob){
                        // $dob = "2020-1-2";
                        $date = date_parse_from_format("Y-m-d", $dob);
                        if (checkdate($date['month'], $date['day'], $date['year'])) {
                            if (date("Y") >= $date['year']) {
                                return true;
                            }
                        }
                    },
                    // 'task'=>date("Y"),
                    'mask'=>'YYYY-mm-dd',
                    'class'=>'invalid',
                    'status'=>'a valid date'
                ),
            ),
            'site'=>array(
                'validate'=>array(
                    'filter'=>FILTER_VALIDATE_URL,
                    'task'=>FILTER_FLAG_HOST_REQUIRED, //FILTER_FLAG_PATH_REQUIRED
                    'mask'=>'Invalid',
                    'class'=>'invalid',
                    'status'=>'a valid site'
                ),
            ),
            'address'=>array(),
            'postcode'=>array(
                'validate'=>array(
                    'filter'=>FILTER_VALIDATE_INT,
                    'mask'=>'Invalid',
                    'class'=>'invalid',
                    'status'=>'a valid postcode'
                )
            ),
            'city'=>array(),
            'state'=>array(),
            'country'=>array(),
            'telephone'=>array(
                'validate'=>array(
                    'filter'=>FILTER_VALIDATE_INT,
                    'mask'=>'Invalid',
                    'class'=>'invalid',
                    'status'=>'a valid telephone'
                )
            ),
            'mobile'=>array(
                'validate'=>array(
                    'filter'=>FILTER_VALIDATE_INT,
                    'mask'=>'Invalid',
                    'class'=>'invalid',
                    'status'=>'a valid mobile'
                )
            ),
            'profile'=>array(),
            // 'ip'=>array(),
            // 'beh'=>array(),
            // 'gender'=>array(),
            // 'khua'=>array(),
            // 'huaipi'=>array(),
            // 'row'=>array(),
            // 'data'=>array(),
            // 'temp'=>array(
            //     'require'=>array(
            //         'mask'=>'Required',
            //         'class'=>'require',
            //         'status'=>'first name'
            //     )
            // )
        );

        // $db = app\avail::$database->select()->from('users_desc')->where('userid',app\avail::$user->userid)->execute()->toArray();
        // // print_r($db);
        // if ($db->rows) {
        //     // print_r($db->rows);
        //     foreach ($db->rows[0] as $key => $value) {
        //         if (isset($setting[$key])) {
        //             $setting[$key]['value']=$value;
        //         }
        //
        //     }
        // }
        return app\form::name(
            'chpro'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users_desc',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>$setting,
                'val'=>array('userid',app\avail::$user->userid)
            )
        )->insertOrupdate(
        )->done(
            array(
                'user.update.chpro'=>array(
                )
            )
        );
    }
    public function signup()
    {
        return app\form::name(
            'signup'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>array(
                    'email'=>array(
                        'value'=>'defaults@email.com',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'email'
                        ),
                        'validate'=>array(
                            'filter'=>FILTER_VALIDATE_EMAIL,
                            'mask'=>'Invalid',
                            'class'=>'invalid',
                            'status'=>'a valid E-mail'
                        ),
                        'custom'=>array(
                            'Duplicate'=>array(
                                'mask'=>'!',
                                'status'=>'E-mail already exists.'
                            )
                        )
                    ),
                    'password'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>true
                            )
                        )
                    ),
                    'displayname'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'display name'
                        )
                    ),
                    'modified'=>array(
                        'value'=>date('Y-m-d G:i:s')
                    ),
                    'id'=>array(
                        'value'=>'25',
                        'id'=>true
                    )
                )
            )
        )->signup(
        )->redirectOnsuccess(
        )->done(
            array(
                'layout'=>array(
                    'Title'=>'Signup',
                    'Description'=>'Signup',
                    'Keywords'=>'PHP framework',
                    'page.id'=>'signup',
                    'page.class'=>'signup',
                    'page.content'=>array(
                        'user.signup'=>array()
                    )
                )
            )
        );
    }
    public function signin()
    {
        return app\form::name(
            'signin'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'enable many options and let you manage later using any computer.',
                'row'=>array(
                    'email'=>array(
                        'value'=>'abc@email.com',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'E-mail'
                        ),
                        'validate'=>array(
                            'filter'=>FILTER_VALIDATE_EMAIL,
                            'mask'=>'Invalid',
                            'class'=>'invalid',
                            'status'=>'a valid E-mail'
                        )
                    ),
                    'password'=>array(
                        'value'=>'test',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'Password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>true
                            )
                        )
                    )
                )
            )
        )->signin(
        )->redirectOnsuccess(
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'signin',
                    'page.class'=>'signin',
                    'Title'=>'Signin',
                    'Description'=>'Signin',
                    'Keywords'=>'PHP framework',
                    'page.content'=>array(
                        'user.signin'=>array()
                    )
                )
            )
        );
    }
    public function signout()
    {
    }
    public function forgotPassword()
    {
        return app\form::name(
            'forgotpassword'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'It happens to everyone... Enter your Username and E-mail, we will send you a new password!',
                'row'=>array(
                    'email'=>array(
                        'value'=>'abc@email.com',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'E-mail'
                        ),
                        'validate'=>array(
                            'filter'=>FILTER_VALIDATE_EMAIL,
                            'mask'=>'Invalid',
                            'class'=>'invalid',
                            'status'=>'a valid E-mail'
                        )
                    )
                )
            )
        )->forgotpassword(
        )->redirectOnsuccess(
            '/reset-password'
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'forgotpassword',
                    'page.class'=>'forgotpassword',
                    'Title'=>'Forgot password',
                    'Description'=>'Forgot password',
                    'Keywords'=>'PHP framework',
                    'page.content'=>array(
                        'user.forgot.password'=>array()
                    )
                )
            )
        );
    }
    public function resetPassword()
    {
        return app\form::name(
            'resetpassword'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                'row'=>array(
                    'code'=>array(
                        // 'value'=>$_GET['code'],
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'Code'
                        )
                    ),
                    'password'=>array(
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'Password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>true
                            )
                        )
                    )
                )
            )
        )->resetpassword(
        )->redirectOnsuccess(
            '/signin'
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'resetpassword',
                    'page.class'=>'resetpassword',
                    'Title'=>'Reset password',
                    'Description'=>'Reset password',
                    'Keywords'=>'PHP framework',
                    'page.content'=>array(
                        'user.reset.password'=>array()
                    )
                )
            )
        );
    }
}
