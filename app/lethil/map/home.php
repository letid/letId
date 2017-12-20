<?php
namespace app\map;
use app;
class home extends mapController
{
  public function __construct()
  {
    $this->timeCounter = app\avail::timer();
    // app\avail::log('visits')->counter();
    app\avail::log()->counter();
  }
  public function classConcluded()
  {
    app\verso::request('page')->menu();
    app\verso::request('privacy')->menu();
    app\verso::request('user')->menu();
    app\verso::request('password')->menu();
    app\verse::request()->menu();
    $this->timerfinish = $this->timeCounter->finish();
    // app\avail::assist()->error_get_last();
  }
  public function home()
  {
    return array(
      'layout'=>array(
          'Title'=>'Home',
          'Description'=>'Description',
          'Keywords'=>'PHP framework',
          'page.id'=>'home',
          'page.class'=>'home',
          'page.content'=>array(
            'layout.header'=>array(),
            'home'=>array(
              'Heading'=>'Home'
            ),
            'layout.footer'=>array()
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
        'page.content'=>array(
          'layout.header'=>array(),
          'aboutus'=>array(
            'Heading'=>'About us'
          ),
          'layout.footer'=>array()
        )
      )
    );
  }
  public function template()
  {
    return array(
      'layout'=>array(
        'Title'=>'Template',
        'Description'=>'Template',
        'Keywords'=>'using the {name} service',
        'page.id'=>'template',
        'page.class'=>'template',
        'page.content'=>array(
          'layout.header'=>array(),
          'sub/page'=>array(
            'dynamic.template'=>array(
              'sub/header'=>array(),
              'sub/section'=>array()
            )
          ),
          'layout.footer'=>array()
        )
      )
    );
  }
  public function looping()
  {
    return array(
      'layout'=>array(
        'Title'=>'Looping',
        'Description'=>'Looping',
        'Keywords'=>'using the {name} service',
        'page.id'=>'loop',
        'page.class'=>'loop',
        'page.content'=>array(
          'layout.header'=>array(),
          'loop/page'=>array(
            'loop/loop'=>array(
              array(
                'loop.one'=>'Start looping'
              ),
              array(
                'loop.one'=>'End looping'
              )
            ),
            'loop/li'=>array(
              'loop.one'=>'Another loop',
              'loop/li.li'=>array(
                'loop.one'=>'nested loop'
              )
            )
          ),
          'layout.footer'=>array()
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
        'page.content'=>array(
          'layout.header'=>array(),
          'terms'=>array(
            'Heading'=>'Terms of service'
          ),
          'layout.footer'=>array()
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
        'page.content'=>array(
          'layout.header'=>array(),
          'privacy'=>array(
            'Heading'=>'Privacy Policy',
            // 'app.name'=>app\avail::$name,
            // 'app.http'=>app\avail::$http
          ),
          'layout.footer'=>array()
        )
      )
    );
  }
}
