<?php
namespace app\dictionary
{
  trait traitHtml
  {
    static private function link_pos($d)
    {
    }
    static private function link_with($d)
    {
    }
    static private function link_list($d)
    {
      return self::linkHtml($d);
    }
    static private function link_abbr($d)
    {
    }
    static private function link_also($d)
    {
    }
    static private function link_brit($d)
    {
    }
    static private function link_US($d)
    {
    }
    static private function link_asin($d)
    {
      return 'As in: '. self::linkHtml($d);
    }
    static private function linkHref($word)
    {
      return '?q='.strtolower($word);
    }
    static private function linkHtml($word)
    {
      return implode('/', array_map(
          function ($v) {
              return sprintf('<a href="?q=%1$s">%2$s</a>',static::linkHref($v),$v);
          }, $word
      ));
    }
    static private function linkMakeup($example)
    {
      return preg_replace('/\s+/', ' ',trim(preg_replace_callback('/\[(.*?)\]/',
        function ($e){
          $k = explode(':',$e[1]);
          if (count($k) > 1) {
            $name = $k[0];
            $word = explode(',',$k[1]);
            if ($name) {
              return self::{"link_$name"}($word);
            } elseif ($word) {
              return implode(', ',$word);
            }

          } else {
            return $e[1];
          }
        }, trim($example)
      )));
    }
    static public function html($row)
    {
      $dl=array();
      foreach($row as $rowName => $rowValue) {
        // NOTE: $rowName => Noun, Verb etc...
        $rowNameClass = strtolower(str_replace(' ', '-', $rowName));
        $dd = array();
        if(is_array($rowValue)) {
          foreach($rowValue as $id => $raw) {
            $rowContent=array();
            /*
            if (is_array($raw)) {
              foreach($raw as $rawName => $rawValue) {
                // NOTE: $rawName => de, eg etc...
                if (is_string($rawName)) {
                  // NOTE: definitions
                  $rawAttr = array('class'=>$rawName);
                  if (is_array($rawValue)) {
                    $li=array();
                    foreach($rawValue as $examName => $examValue) {
                      $li[]=array(
                        'li'=>array(
                          'text'=>static::linkMakeup($examValue)
                        )
                      );
                    }
                    $dd[] = array(
                      'ul'=>array(
                        'text'=>$li, 'attr'=>$rawAttr
                      )
                    );
                  } else {
                    // NOTE: number
                    if($id>0)$rawAttr['id']=$id;
                    $dd[] = array(
                      'p'=>array(
                        'text'=>static::linkMakeup($rawValue), 'attr'=>$rawAttr
                      )
                    );
                  }
                } elseif (is_array($rawValue)) {
                  // NOTE: ?
                } else {
                  // NOTE: derived-forms, parts-of-speech
                  $dd['p']['text'][]=array(
                    'a'=>array(
                      'text'=>array(
                        $id,
                        'em'=>array(
                          'text'=>$rawValue,
                          'attr'=>array(
                            'title'=>'what?'
                          )
                        )
                      ),
                      'attr'=>array(
                        'href'=>static::linkHref($id)
                      )
                    )
                  );
                }
              }
            } elseif(is_numeric($id)) {
              // NOTE: antonym, thesaurus
              $dd['p']['text'][]=array(
                'a'=>array(
                  'text'=>$raw,
                  'attr'=>array(
                    'href'=>static::linkHref($raw)
                  )
                )
              );
            } else {
              // NOTE: form?
            }
            */
            $dd[]=$rowContent;
          }
          $dl[] = array(
            'dl'=>array(
              'text'=>array(
                'dt'=>array(
                  'text'=>array(
                    'span'=>array(
                      'text'=>$rowName
                    )
                  )
                ),
                'dd'=>array(
                  'text'=>$dd
                )
              ),
              'attr'=>array(
                'class'=>strtolower(str_replace(' ', '-', $rowName))
              )
            )
          );
        } else {
          // TODO: form, total, etc...
        }
      }
      return \app\avail::html($dl);
    }
    /*
    app\dictionary::requestMenu();
    */
    static function requestMenu($menu=array())
    {
      $dictionaries = \app\avail::configuration()->dictionaries;
      foreach ($dictionaries as $k => $v) {
        $menu[]=array(
          'li'=> array(
            'text' => array(
              'h3'=>array(
                'text' =>$k
              ),
              'ol'=>array(
                'text'=>self::requestMenuChild($v)
              )
            ),
            'attr' => array(
              'class'=>strtolower($k)
            )
          )
        );
      }
      return $menu;
    }
    static private function requestMenuChild($d,$menu=array())
    {
      foreach ($d as $k => $v) {
        $attrClass = array($k);
        if ($k == \app\avail::$config['lang']) $attrClass[]='active';
        $menu[]=array(
          'li'=> array(
            'text' => array(
              'a'=>array(
                'text' =>$v,
                'attr' =>array(
                  'data-lang'=>$k,
                  'href'=>array(
                    '/dictionary',strtolower($v)
                  )
                )
              )
            ),
            'attr' => array(
              'class'=>$attrClass
            )
          )
        );
      }
      return $menu;
    }
    /*
    app\dictionary::requestTotal();
    */
    static function requestTotal($Id='dictionaries.total')
    {
      \app\avail::content($Id)->set(array_sum(array_map("count", \app\avail::configuration()->dictionaries)));
    }
  }
}
