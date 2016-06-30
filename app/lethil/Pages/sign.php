<?php
namespace App\Pages;
use Letid\Service;
class sign extends \App\Page
{
    public function __construct()
    {
        Service\Application::menu()->page();
        Service\Application::menu()->language();
        Service\Application::assist()->error_get_last();
        $this->signup_table ='users';
    }
    public function _delete_or_try() {
        Service\Application::menu()->page();
        Service\Application::menu()->language();
        Service\Application::assist()->error_get_last();
        // Service\Application::content('display.name')->set('kkkkkkkkk');
    }
    public function home()
    {
        // return 'home';
        /*
        lessist

        <div class="info">
            <h4>Info</h4>
            <ul>
                <li class="name">Username <span>khensolomon@gmail.com</span></li>
                <li class="log">Log <span>664</span> --- {testing}</li>
                <li class="role">Role <span>7</span></li>
                <li class="dreg">Registered since <span>2010-01-01 21:56:26</span></li>
                <li class="dlog">Last login <span>2016-06-25 07:02:53</span></li>
            </ul>
        </div>
        Application::html(Id)->response(Text,Attr);
        Application::html(Id)->text(Text)->attr(Attr)->response(Text,Attr);
        */
        // $this->testing = 'love';
        // print_r(Service\Application::$user);
        // print_r($this->user);
        // $testing = Service\Application::html('div')->text('loving')->attr(array('class'=>'info'))->response();
        /*
        $ul = array(
            'div'=>array(
                'text'=>array(
                    'h4'=>'love',
                    'ul'=>array(
                        'text'=>array(
                            array(
                                'li'=>array(
                                    'text' => array(
                                        'Username', 'span'=>'khensolomon@gmail.com'
                                    )
                                )
                            ),
                            array(
                                'li'=>array(
                                    'text' => 'one'
                                )
                            )
                        )
                    )
                ),
                'attr'=>array(
                    'class'=>'info'
                )
            )
        );
        $testing = Service\Application::html($ul);
        // $testing = Service\Application::html($ul)->attr(array('class'=>'info'))->response();

        Service\Application::content('user.home.info')->set($testing);
        */
        return array(
            'layout'=>array(
                'Title'=>'Account',
                'Description'=>'Account',
                'Keywords'=>'PHP framework',
                'page.id'=>'account',
                'page.class'=>'account',
                'page.content'=>Service\Application::template(
                    array(
                        'user.home'=>array(
                            'user.home.info'=>array(
                                'email'=>Service\Application::$user->email,
                                'log'=>Service\Application::$user->logs,
                                'role'=>Service\Application::$user->role,
                                'dreg'=>Service\Application::$user->created,
                                'dlog'=>Service\Application::$user->modified
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
                'page.content'=>Service\Application::template(
                    array(
                        'user.update'=>$this->user_update_selected()
                    )
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
            $update["user.update.$selected"] = Service\Application::template($Name);
        }
        return $update;
    }
    private function cheml()
    {
        return Service\Form::request(
            'cheml'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
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
                                    array('userid','!=',Service\Application::$user->userid)
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
                            'Encrypt'=>array(
                                'modify'=>true
                            ),
                            'Exists'=>array(
                                'task'=>array(
                                    array('userid',Service\Application::$user->userid)
                                ),
                                'mask'=>'!',
                                'status'=>'Password is not correct.'
                            )
                        ),
                        'id'=>true
                    ),
                    'userid'=>array(
                        'value'=>Service\Application::$user->userid,
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
        return Service\Form::request(
            'chpwd'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
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
                                    array('userid',Service\Application::$user->userid)
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
                        'value'=>Service\Application::$user->userid,
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
        return Service\Form::request(
            'chdis'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
                    'displayname'=>array(
                        'value'=>Service\Application::$user->displayname,
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'display name'
                        )
                    ),
                    'userid'=>array(
                        'value'=>Service\Application::$user->userid,
                        'id'=>true
                    )
                )
            )
        )->update(
            function (){
                // Service\Application::content('kkkkkkkkk')->set('display.name');
                Service\Application::content('display.name')->set('kkkkkkkkk');
                return 'Ok...';
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
                'value'=>Service\Application::$user->userid,
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
            // 'setting'=>array(),
            // 'data'=>array(),
            // 'temp'=>array(
            //     'require'=>array(
            //         'mask'=>'Required',
            //         'class'=>'require',
            //         'status'=>'first name'
            //     )
            // )
        );

        // $db = Service\Application::$database->select()->from('users_desc')->where('userid',Service\Application::$user->userid)->execute()->toArray();
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
        return Service\Form::request(
            'chpro'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users_desc',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>$setting,
                'settingValue'=>array('userid',Service\Application::$user->userid)
                // 'settingValue'=>$db->rows[0]
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
        // Service\Application::assist()->error_get_last();
        return Service\Form::request(
            'signup'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
                    // 'username'=>array(
                    //     'value'=>'default Username',
                    //     'require'=>array(
                    //         'mask'=>'Required',
                    //         'class'=>'require',
                    //         'status'=>'Username'
                    //     ),
                    //     'custom'=>array(
                    //         'Duplicate'=>array(
                    //             // 'task'=>array('a','b','c'),
                    //             'mask'=>'!',
                    //             'status'=>'Username already exists.'
                    //         )
                    //     )
                    // ),
                    'email'=>array(
                        'value'=>'defaults@email.com',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'email'
                        ),
                        'validate'=>array(
                            'filter'=>FILTER_VALIDATE_EMAIL,
                            // 'task'=>FILTER_FLAG_PATH_REQUIRED,
                            // 'task'=>array(
                            //     'flags' => FILTER_NULL_ON_FAILURE
                            // ),
                            // 'task'=>array(
                            //     'flags'=>FILTER_FLAG_ALLOW_OCTAL
                            //     'options' => array(
                            //         'default' => 3,
                            //         'min_range' => 0
                            //     )
                            // ),
                            'mask'=>'Invalid',
                            'class'=>'invalid',
                            'status'=>'a valid E-mail'
                        ),
                        'custom'=>array(
                            'Duplicate'=>array(
                                // 'task'=>'existsCheck',
                                // 'task'=>function($q){
                                //     return array('userid','!=',Service\Application::$user->userid);
                                // },
                                // 'task'=>array(
                                //     array('userid','!=',Service\Application::$user->userid)
                                // ),
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
        )->redirectIfsuccess(
            '/'
        )->done(
            array(
                'layout'=>array(
                    'Title'=>'Signup',
                    'Description'=>'Signup',
                    'Keywords'=>'PHP framework',
                    'page.id'=>'signup',
                    'page.class'=>'signup',
                    'page.content'=>Service\Application::template(
                        array(
                            'user.signup'=>array()
                        )
                    )
                )
            )
        );
    }
    public function signin()
    {
        /*
        $rowsArray = array(
            'userid'=>1,
            'logs'=>2,
            'password'=>3
        );
        $rowsFun = array(
            'userid'=>'default',
            'logs'=>function($log2,$log){
                return $logs2 + 1;
            }
        );
        // $signCookieValue = array_intersect_key($rowsArray, $rowsFun);
        // $signCookieValue = array_intersect_ukey($rowsArray, $rowsFun);
        // $signCookieValue = array_intersect_uassoc($rowsArray, $rowsFun);
        $signCookieValue = array_intersect_uassoc($rowsArray, $rowsFun,function($k,$v){
            return $v;
        },function($k,$v){
            return $v;
        });
        print_r($signCookieValue);
        // $signCookieValue = array_intersect_key($rowsArray, array_flip(array('userid','password')));
        */
        return Service\Form::request(
            'signin'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
                    'email'=>array(
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
                    // 'gender'=>array(
                    //     'value'=>array('Male','Female'),
                    //     'require'=>array(
                    //         'mask'=>'Required',
                    //         'class'=>'require',
                    //         'status'=>'Gender'
                    //     )
                    // ),
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
        )->signin(
        )->redirectIfsuccess(
            '/'
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'signin',
                    'page.class'=>'signin',
                    'Title'=>'Signin',
                    'Description'=>'Signin',
                    'Keywords'=>'PHP framework',
                    'page.content'=>Service\Application::template(
                        array(
                            'user.signin'=>array(
                                // 'forgot-password'=>Service\Application::assist('forgot-password')->link('Forgot password'),
                                // 'forgotpassword'=>'forgotpassword testing',
                            )
                        )
                    )
                )
            )
        );
        // Application::assist()->link();
        // Application::assist('forgotpassword')->link();
    }
    public function signout()
    {
        // TODO: to be continued
        // Cookie::sign()->out();
        // return Form::request(
        //     'signout'
        // )->signout(
        // )->redirectIfsuccess(
        //     '/'
        // );
    }
    public function forgotPassword()
    {
        return Service\Form::request(
            'forgotpassword'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
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
        )->redirectIfsuccess( '/reset-password'
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'forgotpassword',
                    'page.class'=>'forgotpassword',
                    'Title'=>'Forgot password',
                    'Description'=>'Forgot password',
                    'Keywords'=>'PHP framework',
                    'page.content'=>Service\Application::template(
                        array(
                            'user.forgot.password'=>array()
                        )
                    )
                )
            )
        );
    }
    public function resetPassword()
    {
        return Service\Form::request(
            'resetpassword'
        )->initiate(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'message'=>'default message',
                'setting'=>array(
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
        )->redirectIfsuccess( '/signin'
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'resetpassword',
                    'page.class'=>'resetpassword',
                    'Title'=>'Reset password',
                    'Description'=>'Reset password',
                    'Keywords'=>'PHP framework',
                    'page.content'=>Service\Application::template(
                        array(
                            'user.reset.password'=>array()
                        )
                    )
                )
            )
        );
    }
}
