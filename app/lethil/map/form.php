<?php
namespace app\map;
// use app;
use letId\service;
class form extends mapController
{
    public $signup_table = 'users';
    public function __construct()
    {
        $this->timer = service\avail::timer();
    }
    public function homeConcluded()
    {
    }
    public function classConcluded()
    {
        service\verso::nav()->request();
        service\verse::nav()->request();
        service\log::requestTable('visits')->requestVisits();
        service\avail::assist()->error_get_last();
        $this->timerfinish = $this->timer->finish();
    }
    public function home()
    {
        return service\form::name(
            'testing'
        )->setting(
            array(
                'method'=>'POST',
                'table'=>'users',
                'mask'=>'*',
                'class'=>'error',
                'msg'=>'default message',
                // 'val'=>'default message',
                'row'=>array(
                    'email'=>array(
                        'visibility'=>array(
                            'email'=>'readonly'
                        ),
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
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'Password'
                        ),
                        'custom'=>array(
                            'Encrypt'=>array(
                                'modify'=>true,
                                'mask'=>'error on encrypting',
                                'status'=>'what the hell encrypting...'
                            )
                        )
                    ),
                    'country'=>array(
                        'value'=>'MN',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'a country'
                        ),
                        'type'=>'option',
                        // 'select'=>array(
                        //     'option'=> array(
                        //
                        //     ),
                        //     'checkbox'=> array(
                        //
                        //     ),
                        //     'radio'=> array(
                        //
                        //     )
                        // ),
                        'select'=>array(
                            'NO'=>'Norway',
                            'MN'=>'Myanmar',
                            'US'=>'United States of America'
                        )
                    ),
                    'civil'=>array(
                        'value'=>'SG',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'civil'
                        ),
                        'type'=>'radio',
                        'select'=>array(
                            'SG'=>'Single',
                            'MA'=>'Married',
                            'DV'=>'Divorced'
                        )
                    ),
                    'gender'=>array(
                        'value'=>'Male',
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'gender'
                        ),
                        'type'=>'radio',
                        'select'=>array(
                            'Male'=>'Male',
                            'Female'=>'Female'
                        )
                    ),
                    'interestedsport'=>array(
                        'value'=>array('Sailing','Soccer'),
                        'require'=>array(
                            'mask'=>'Required',
                            'class'=>'require',
                            'status'=>'sport'
                        ),
                        'type'=>'checkbox',
                        'select'=>array(
                            'Tennis'=>'Tennis',
                            'Bowling'=>'Bowling',
                            'Sailing'=>'Sailing',
                            'Volleyball'=>'Volleyball',
                            'Soccer'=>'Soccer',
                            'Quidditch'=>'Quidditch',
                            'Basketball'=>'Basketball',
                            'Wrestling'=>'Wrestling',
                            'IceHockey'=>'Ice Hockey'
                        )
                    )
                )
            )
        )->response(
        )->done(
            array(
                'layout'=>array(
                    'page.id'=>'testing',
                    'page.class'=>'testing',
                    'Title'=>'form testing',
                    'Description'=>'form',
                    'Keywords'=>'PHP framework',
                    'page.content'=>array(
                        'form.home'=>array()
                    )
                )
            )
        );
    }
    public function update()
    {
        return 'form.update';
    }
}
