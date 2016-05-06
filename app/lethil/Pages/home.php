<?php
namespace App\Pages;
use App;
// use Letid\Request\Config;
// use Letid\Request\Database;
class home extends App\Page
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
        /*
            $this->config();
            $this->template(array);
            $this->lang();
        */
        // print_r(Database::load("SELECT id FROM tables WHERE name LIKE 'Jo%'")->toArray()->hasCount());
        // print_r(get_declared_traits());
        // print_r(class_uses('not_loaded', true));
        // $this->setConfig('setConfigFromHome','Okey');
        // Config::set('Config::setFromHome','Okey');
        // print_r(Config::$list);
        // print_r($this);
        // print_r(Config::$letid);
        // print_r(class_parents($this));
        // print_r(get_class_methods($this));
        // echo $this->menu;
        // echo $this->html($html);
        // echo $this->menu();
        // print_r(get_class($this));  // Returns the name of the class of an object
        // print_r(get_class_vars($this));  // Get the default properties of the class
        // print_r(get_object_vars($this));  // Gets the properties of the given object
        // try {
        //     // echo $this->inverse(5) . "\n";
        //     // echo $this->ANC();
        //     throw new \Exception('Cannot connect do mysql');
        // } catch (\Exception $e) {
        //     echo 'Caught exception: ',  $e->getMessage(), "\n";
        // } finally {
        //     echo "First finally.\n";
        // }
        $this->pageHeader='this is header!';
        $this->pageFooter='this is footer!';
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
