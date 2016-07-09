<?php
namespace app\map;
use app;
class api extends mapController
{
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
                'Title'=>'API',
                'Description'=>'Description',
                'Keywords'=>'PHP framework',
                'page.id'=>'api',
                'page.class'=>'api',
                'page.content'=>array(
                    'api.home'=>array(
                        'Heading'=>'API',
                        'api.home.loop'=>array(
                            array(
                                'api.home.loop.one'=>'first',
                                'api.home.loop.two'=>'class',
                            ),
                            array(
                                'api.home.loop.one'=>'second',
                                'api.home.loop.two'=>'already a member'
                            ),
                            array(
                                'api.home.loop.one'=>'Loop Two of One',
                                'api.home.loop.two'=>'Loop Two of Two',
                            ),
                            array(
                                'api.home.loop.one'=>'Loop Two of One',
                                'api.home.loop.two'=>'last',
                            )
                        ),
                        'api.home.li'=>array(
                            'api.home.li.one'=>'One of One',
                            'api.home.li.two'=>'One of Two',
                            'api.home.li.child'=>array(
                                'api.home.li.child.one'=>'Two of One',
                                'api.home.li.child.two'=>'Two of Two',
                            )
                        )
                    )
                )
            )
        );
    }
    public function json()
    {
        app\avail::$contextType='json';
        return array(
            'key'=>'value'
        );
    }
}
