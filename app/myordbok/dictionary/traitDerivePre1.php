<?php
namespace app\dictionary
{
  trait traitDerivePre1
  {
    private function requestDerive($i,$q)
    {
      // TODO: working...
      if (self::$ruleDerivation){
        $db = self::deriveQuery($q);
        if($x=$db->result->num_rows){
          foreach($db->rows as $w => $d){
            $id[]=$d['id'];
            $word[]=$d['word'];
            $derive[]=$d['derive'];
            $wame[]=$d['wame'];
            $dame[]=$d['dame'];
            if($d['derive']==$q or $d['word']!=$q){
              // $r[1][$w][$d['dame']]=str_replace(array_filter(array_keys($d),function($v){return $v;}),array_values($d),'...derive (<span>wame, <em>dame</em></span>) forms of <a href="?q=word">word</a>');
              $r[1][$w][$d['dame']]=str_replace(array_filter(array_keys($d),function($v){return $v;}),array_values($d),'...derive (<span>dame</span>) forms of <a href="?q=word">word</a>');
            }else{
              $r[1][$w][$d['dame']]=str_replace(array_filter(array_keys($d),function($v){return $v;}),array_values($d),'...<a href="?q=derive">derive</a> (<span>dame</span>)');
            }
            // array_map(function($s){  return ':'.$s}, array_keys($d))
            // array_filter($array1, "odd")
            // array_filter(array_keys($d),function($v){return ':'.$v;}, ARRAY_FILTER_USE_BOTH)
          }
          // if($x==1){
          //   // $r[0] = 'in '.self::isUnique($dame,null,1,', ').' form';
          //   $r[0] = sprintf('as in %s',self::isUnique($dame,null,1));
          // }elseif($x==2){
          //   // $r[0] = 'in '.self::isUnique($wame,null,1,' and ').' form';
          //   $r[0] = sprintf('as in %s',self::isUnique($wame,null,1,' and '));
          // }else{
          //   $r[0] ='Derived forms';
          // }
          // $abc = \app\avail::arrays($db->rows)->search_key('wame')->get_value();
          // print_r($db->rows);
          if ($x >=3 ) {
            $r[0] ='Derived forms';
          } elseif($x==2) {
            $r[0] = sprintf('as in %s',self::isUnique($wame,null,1,' and '));
          } else {
            $r[0] = sprintf('as in %s',self::isUnique($dame,null,1));
          }
          $r[2] = self::isUnique($word);
          return $r;
        }
      }
    }
  }
}
