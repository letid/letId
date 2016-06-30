<?php
namespace App\Pages;
use Letid\Service;
class home extends \App\Page
{
    public function __construct()
    {
        // Service\Application::content('Home')->set('Ok');
        Service\Application::menu()->page();
        Service\Application::menu()->language();
        Service\Visitor::request('visits')->visit();
        // AppAssist
        // Appcliam
        // Appency, assist, aystem lesystem, asisystem, lesist
    }
    public function home()
    {
        // $db = \Letid\Database\Request::query("SELECT SQL_CALC_FOUND_ROWS id FROM tableName WHERE username LIKE 'K%' LIMIT 3, 1")->build();
        // $db = Service\Database::query("SELECT SQL_CALC_FOUND_ROWS id FROM tableName WHERE username LIKE 'K%' LIMIT 3, 1;")->build();
        // $db = Service\Application::$database->query("SELECT SQL_CALC_FOUND_ROWS userid FROM users WHERE username LIKE 'w%'")->execute();
        // $this->connect = \Letid\Database\Request;
        // $db = self::$let->database();
        // $db = self::$let->database->select('userid')
        //     ->rowsCalc()
        //     ->from('users')
        //     ->where('username','K%')
        //     ->limit(3,1)
        //     ->execute()
        //     ->rowsTotal();
        print_r($db);
        // print_r(self::$let);
        // $this->test = array();
        // if (isset($this->test)) {
        //     echo 'yes';
        // } else {
        //     echo 'no';
        // }
        // echo $lasd;
        // print_r(Service\Application::$content);
        // $this->error_get_last();
        // print_r($this);
        // echo $this->content('test');
        // echo $this->test;
        // print_r(get_class_methods($this));
        // Service\Navigation::request()->response();
        // new Service\Template
        // Service\Application::$template->request()
        /*
        # Template
        new Service\Template()
        Service\Template::request()
        Service\Template::request()->response()
        Service\Application::$template->request()
        Service\Application::$template->request()->response()
        */
        // print_r(Service\Application::$asset->validate('khens@gmail.com')->email());
        /*
        Application::$asset->content()
        Application::$asset->request()->content()
        */
        // print_r(Service\Application::$asset->content());
        // print_r(Service\Application::$asset->content('test'));
        // echo $fee;
        // echo Service\Application::$asset->array_sentence(array('a','b','c','d'));
        // echo Service\Application::$asset->array_key_join_value(array('a','b','c','d'));
        // Service\Application::$asset->error_get_last();
        // return 'Ok';
        // $template = array(
		// 	'home'=>array(
		// 		'page.id'=>'home',
		// 	)
		// );
        // echo Service\Application::template($template);
        // return array(
        //     'layout'=>array(
        //         'Title'=>'Home',
        //         'Description'=>'Description',
        //         'Keywords'=>'PHP framework',
        //         'page.id'=>'home',
        //         'page.class'=>'home',
        //         'page.content'=>'abc'
        //     )
        // );
        // echo Service\Application::html('div')->text('love')->response();
        return array(
            'layout'=>array(
                'Title'=>'Home',
                'Description'=>'Description',
                'Keywords'=>'PHP framework',
                'page.id'=>'home',
                'page.class'=>'home',
                'page.content'=>Service\Application::template(
                    array(
                        'home'=>array(
                            'Heading'=>'Todo',
                            'home.loop'=>array(
                                array(
                                    'loop.one'=>'Form',
                                    'loop.two'=>'class',
                                ),
                                array(
                                    'loop.one'=>'first',
                                    'loop.two'=>Service\Application::language('already a member'),
                                    // 'loop.two'=>'Loop One of Two',
                                ),
                                array(
                                    'loop.one'=>'Loop Two of One',
                                    'loop.two'=>'Loop Two of Two',
                                ),
                                array(
                                    'loop.one'=>'Loop Two of One',
                                    'loop.two'=>'last',
                                )
                            ),
                            'home.li'=>array(
                                'home.li.one'=>'One of One',
                                'home.li.two'=>'One of Two',
                                'home.li.li'=>array(
                                    'home.li.li.one'=>'Two of One',
                                    'home.li.li.two'=>'Two of Two',
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
                'Title'=>'About Us',
                'Description'=>'About Us',
                'Keywords'=>'PHP framework',
                'page.id'=>'about-us',
                'page.class'=>'about-us',
                'page.content'=>Service\Application::template(
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
                'Title'=>'Terms',
                'Description'=>'Terms of service, User license, Content, Proprietary Rights, Fees',
                'Keywords'=>'using the {name} service',
                'page.id'=>'terms',
                'page.class'=>'terms',
                'page.content'=>Service\Application::template(
                    array(
                        'terms'=>array(
                            'Heading'=>'Terms of service'
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
                'Title'=>'Privacy',
                'Description'=>'Privacy',
                'Keywords'=>'PHP framework, privacy, policy',
                'page.id'=>'privacy',
                'page.class'=>'privacy',
                'page.content'=>Service\Application::template(
                    array(
                        'privacy'=>array(
                            'Heading'=>'Privacy Policy',
                            // 'app.name'=>Service\Application::$name,
                            // 'app.http'=>Service\Application::$http
                        )
                    )
                )
            )
        );
    }
}
