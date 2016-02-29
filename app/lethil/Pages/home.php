<?php
namespace App\Pages;
class home extends page
{
    public function __construct()
    {
        /*
        constructor
        */
    }
    public function home()
    {
        return array(
            'home'=>array(
                'page.id'=>'home',
                'page.class'=>'home',
                'Title'=>'Title is replaced',
                'Description'=>'Description is replaced',
                'Keywords'=>'PHP framework',
                'home.li'=>array(
                    'home.li.one'=>'One of One',
                    'home.li.two'=>'One of Two',
                    'home.li.li'=>array(
                        'home.li.li.one'=>'Two of One',
                        'home.li.li.two'=>'Two of Two',
                    )
                ),
                'home.loop'=>array(
                    array(
                        'loop.one'=>'Loop One of One',
                        'loop.two'=>'Loop One of Two',
                    ),
                    array(
                        'loop.one'=>'Loop Two of One',
                        'loop.two'=>'Loop Two of Two',
                    ),
                    array(
                        'loop.one'=>'Loop Two of One',
                        'loop.two'=>'last',
                    )
                )
            )
        );
        // return 'this came from home::home()';
    }
}
