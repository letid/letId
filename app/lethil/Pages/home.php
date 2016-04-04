<?php
namespace App\Pages;
use App;
use Letid\Request\DbQuery;
class home extends App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $num = '12';
        $Option=array(
			'type'=>'user'
		);
        // $num,123,'love',
        $this->menu_page = $this->menu();
        $this->menu_user = $this->menu($Option);
        // echo $num;
        // echo $this->menu;
    }
    public function home()
    {
        /*
            $this->setConfig(key,value);
            $this->getConfig(key);
            $this->rowConfig();
            $this->template(array);
            $this->database();
        */
        // print_r(DbQuery::load("SELECT id FROM tables WHERE name LIKE 'Jo%'")->toArray()->hasCount());
        // print_r($this->database());
        // print_r(self::$scoreVar);
        // print_r($this->hostname);
        // print_r($this->uri);
        // print_r(get_declared_traits());
        // print_r(class_uses('not_loaded', true));
        // $this->setConfig('setConfigFromHome','Okey');
        // Config::set('Config::setFromHome','Okey');
        // print_r($this->rowConfig());
        // print_r(Config::$list);
        // print_r($this);
        // print_r(Config::$letid);
        // echo $this->config->verso;
        // print_r(self::$config);
        // echo $this->root->hostname;
        // echo $this->ANC();
        //setIt, getIt
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
        /*
        $content = $this->template(
            array(
                'home.li'=>array(
                    'home.li.one'=>'One of One',
                    'home.li.two'=>'One of Two',
                    'home.li.li'=>array(
                        'home.li.li.one'=>'Two of One',
                        'home.li.li.two'=>'Two of Two',
                    )
                )
            )
        );
        */
        // echo $this->menu_user;
        return array(
            'home'=>array(
                'page.id'=>'home',
                'page.class'=>'home',
                'Title'=>'Title is replaced',
                'Description'=>'Description is replaced',
                'Keywords'=>'PHP framework',
                'menu.page'=>$this->menu_page,
                'menu.user'=>$this->menu_user,
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
        // echo "\n";
        // return 'this came from home::home()';
    }
}
