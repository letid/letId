<?php
namespace App\Pages;
class music extends \App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        Service\Application::menu()->page();
        Service\Application::menu()->language();
    }
    public function home()
    {
        return array(
            'layout'=>array(
                'page.id'=>'music',
                'page.class'=>'music',
                'Title'=>'Music',
                'Description'=>'Music',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'music'=>array(
                            'Heading'=>'Music',
                            'timer_finish'=>$this->timer_finish
                        )
                    )
                )
            )
        );
    }
    public function album()
    {
        return array(
            'layout'=>array(
                'page.id'=>'album',
                'page.class'=>'album',
                'Title'=>'Album',
                'Description'=>'Album',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'album'=>array(
                            'Heading'=>'Album',
                            'timer_finish'=>$this->timer_finish
                        )
                    )
                )
            )
        );
    }
    public function artist()
    {
        return array(
            'layout'=>array(
                'page.id'=>'artist',
                'page.class'=>'artist',
                'Title'=>'Artist',
                'Description'=>'Artist',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'artist'=>array(
                            'Heading'=>'Artist',
                            'timer_finish'=>$this->timer_finish
                        )
                    )
                )
            )
        );
    }
}
