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
    // app\versoController::menu()->request();
    app\verseController::menu()->request();
    app\versoController::menu()->requestOne('page');
    app\versoController::menu()->requestOne('privacy');
    app\versoController::menu()->requestOne('user');
    app\versoController::menu()->requestOne('password');
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
              'Heading'=>'Todo',
              'home.loop'=>array(
                array(
                  'loop.one'=>'first',
                  'loop.two'=>'class',
                ),
                array(
                  'loop.one'=>'second',
                  // 'loop.two'=>app\avail::language('already a member'),
                  'loop.two'=>'already a member',
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
