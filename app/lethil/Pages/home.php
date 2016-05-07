<?php
namespace App\Pages;
class home extends \App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $this->menu();

    }
    public function home()
    {
        $this->error_get_last();
        $this->pageHeader='this is header!';
        $this->pageFooter='this is footer!';

        // $this->Test_Template = ''
        return array(
            'layout'=>array(
                'page.id'=>'home',
                'page.class'=>'home',
                'Title'=>'Home',
                'Description'=>'Description',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'home'=>array(
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
                    )
                )
            )
        );
    }
    public function aboutUs()
    {
        return array(
            'layout'=>array(
                'page.id'=>'about-us',
                'page.class'=>'about-us',
                'Title'=>'About Us',
                'Description'=>'About Us',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'aboutUs'=>array(
                            'Heading'=>'About us'
                        )
                    )
                )
            )
        );
    }
    public function terms()
    {
        return array(
            'layout'=>array(
                'page.id'=>'terms',
                'page.class'=>'terms',
                'Title'=>'Terms',
                'Description'=>'Terms',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'terms'=>array(
                            'Heading'=>'Terms'
                        )
                    )
                )
            )
        );
    }
    public function privacy()
    {
        return array(
            'layout'=>array(
                'page.id'=>'privacy',
                'page.class'=>'privacy',
                'Title'=>'Privacy',
                'Description'=>'Privacy',
                'Keywords'=>'PHP framework',
                'page.content'=>$this->template(
                    array(
                        'privacy'=>array(
                            'Heading'=>'Privacy'
                        )
                    )
                )
            )
        );
    }
}
