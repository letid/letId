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
    // app\versoController::menu()->request();
    app\versoController::menu()->requestOne('page');
    app\versoController::menu()->requestOne('privacy');
    app\versoController::menu()->requestOne('user');
    app\versoController::menu()->requestOne('definition');
    app\versoController::menu()->requestOne('password');
    app\versoController::menu(array(
			'menu'=>'ol', 'class'=>'MyOrdbok', 'attr'=>array( 'id'=>'MyOrdbok-logo', 'data-name'=>app\avail::$config['lang'] ), 'list'=>'li', 'activeClass'=>'active', 'type'=>'dictionary'
		))->requestOne('dictionary');
    app\verseController::menu()->request();
    $this->timerfinish = $this->timeCounter->finish();
    // app\avail::assist()->error_get_last();
  }
  public function home()
  {
    // print_r(app\avail::$user);
    // print_r(app\avail::cookie()->user()->get());
    return array(
      'layout'=>array(
        'Title'=>'Home',
        'Description'=>'Description',
        'Keywords'=>'PHP framework',
        'page.id'=>'home',
        'page.class'=>'home',
        'page.content'=>array(
          'layout.bar'=>array(),
          'layout.header'=>array(),
          'layout.board'=>array(),
          'home'=>array(),
          'layout.footer'=>array(),
        )
      )
    );
  }
  public function aboutUs()
  {
    // app\versoController::requestTotal();
    app\verseController::requestTotal();
    app\dictionary::requestTotal();
    return array(
      'layout'=>array(
        'Title'=>'About {name}, Free online Myanmar dictionaries',
        'Description'=>'{lang.name} - Myanmar dictionary.',
        'Keywords'=>'Myanmar dictionary, Burmesisk ordbok, Myanmar definition, Burmese, norsk ordbok, burmissk',
        'page.id'=>'about-us',
        'page.class'=>'about-us',
        'page.content'=>array(
          'layout.bar'=>array(),
          'aboutus'=>array(
            
            // 'locale.total'=>'3',
            // 'dictionaries.total'=>'24',
            'dictionaries'=>app\avail::html(
              array(
                'ol'=>array(
                  // 'text'=>app\componentService::dictionaries(),
                  'text'=>app\dictionary::requestMenu(),
                  'attr'=>array(
                    'class'=>array(
                      'dictionary'
                    )
                  )
                )
              )
            )
          ),
          'layout.footer'=>array()
        )
      )
    );
  }
  public function dictionary()
  {
    return array(
      'layout'=>array(
        'Title'=>'ddd',
        'Description'=>'ddd',
        'Keywords'=>'PHP framework',
        'page.id'=>'dd',
        'page.class'=>'dd',
        'page.content'=>array(
          'layout.bar'=>array(),
          'layout.header'=>array(),
          'layout.board'=>array(),
          'dictionary'=>array(
            'dictionaries'=>app\avail::html(
              array(
                'ol'=>array(
                  'text'=>app\dictionary::requestMenu(),
                  'attr'=>array(
                    'class'=>array(
                      'dictionary'
                    )
                  )
                )
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
          'layout.bar'=>array(),
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
          'layout.bar'=>array(),
          'privacy'=>array(
            'Heading'=>'Privacy Policy'
          ),
          'layout.footer'=>array()
        )
      )
    );
  }
}
