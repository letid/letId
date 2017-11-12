<?php
namespace app\dictionary
{
  trait traitMeaningPre1
  {
    private function requestMeaning($i,$q)
    {
      $en=self::$langDefault;
      if($math=self::requestMathematic($q)):
        return array('mathematic',$q,$math);
      elseif(self::requestChecker($i,$q,0,0,$en)):
        return array('meaning',$q,self::requestMyanmar($i,$q));
      elseif($numb=self::isNumeric($q)):
        return array('numeric',$numb,self::requestNumeric($numb));
      elseif($roma=self::requestRoman($q)):
        return array('roman',$q,$roma);
      elseif($deri=self::requestDerive($i,$q) and $q!=$deri[2][0] and self::requestChecker($i,$deri[2][0],NULL,0,$en)):
        return array('derive',$q,self::requestMyanmar($i,$deri[2][0],$deri));
      elseif($deri):
        $tempOne = 'We currently have no definition of <b>%s</b>, please feel free to post and distribute...';
        $tempTwo = 'click here to post %s definition!';
        return array('derive',$q,
          array($deri[0]=>$deri[1],
            "Oop..."=>array(
              array('not'=>sprintf($tempOne, $deri[2][0])),
              array('x add'=>sprintf($tempTwo, $deri[2][0]))
            )
          )
        );
      // elseif(self::requestChecker(5,$q,'exam',3,$en)):
      //   return array('meaning',$q,self::requestMyanmar(5,$q));
      endif;
    }
    private function requestMeanings($query)
    {
      $r=array();
      self::$fileMobyThesaurus = false;
      self::$fileMobyPartsofspeech = false;
      foreach($query as $i => $q) if($m=self::requestMeaning($i,$q)) $r[$m[1]] = $m[2];
      return $r;
    }
    private function requestMyanmar($i,$q,$derive=true)
    {
      $r = array();
      // $className = ($this->isAuthorization('detable') !== false)?' zA':NULL;
      $className = '';
      foreach (self::$row[$i] as $tmp) {
        $id=$tmp['id'];
        $db = $this->myanmarQuery($id);
        // $db->rowsCount;
        foreach ($db->rows as $my) {
          $id=$my['id'];
          $tid=$my['tid'];
          $grammar=self::$rowGrammar[$tid];
          $r[$grammar][$id]["det{$className}"] = $my['define'];
          $describe = $my['describe'];
          if($describe !='') {
            // $r[$grammar][$id]['ex'] = array();
            $describes = explode("\r\n",$describe);
            foreach ($describes as $example) {
              // $r[$grammar][$id]['ex'][]=trim($example);
              $r[$grammar][$id][] =  preg_replace_callback('/\[(.*?)\]/',
            		function ($e){
                  $k = explode(":",$e[1]);
                  $name = $k[0];
                  $words = explode(",",$k[1]);
                  $words = explode(",",$k[1]);
                  if ($name) {
                    return $this->{"describe_$name"}($words);
                  } else {
                    return implode(', ',$words);
                  }
                }, trim($example)
              );
            }
            // $r[$grammar][$id]['ex'] = $describe;
            // /[{](.*?)[}]/
            // $r[$grammar][$id]['ex'] =  preg_replace_callback('/\[(.*?)\]/',
          	// 	function ($e){
            //     // print_r($e);
            //     $k = explode(":",$e[1]);
            //     $words = explode(",",$k[1]);
            //     // return 'ab';
            //     return implode(', ',$words);
            //   }, $describe
            // );
          }
        }
      }
      // if (is_array($derive)) $r[$derive[0]] = $derive[1]; elseif($derive===true and $d=self::requestDerive($i,$q)) $r[$d[0]] = $d[1];
      // if ($An=self::requestAntonym($i,$q)) {
      //   if (count($An) == 2) $r[$An[0]] = $An[1];
      // }
      // if ($Mt=self::requestMobyThesaurus($q)) {
      //   if (count($Mt) == 2) $r[$Mt[0]]=$Mt[1];
      // }
      // if ($Mb=self::requestMobyPartsOfSpeech($q)) {
      //   if (count($Mb) == 2) $r[$Mb[0]]=$Mb[1];
      //   // if (count($Mb) == 2)$r=array_merge($r,$Mb);
      //   // if (count($Mb) == 2) array_push($r, $Mb);
      //   // if (count($Mb) == 2) array_push($r, array_values($Mb));
      // }
      // $r['Total'] = self::$total[$i];
      return $r;
    }
    private function requestTranslate($i,$q)
    {
      if (self::requestChecker($i,$q)) {
        if (self::$total[$i] > 1) {
          /*
          $words ='';
          foreach (self::$row[$i] as $value) {
            $words .=$value[self::$columnEnglish].',';
            // self::rowDelete($value['id']);
          }
          // TODO: not sure? need to test
          $keywords = self::isUnique($words);
          // self::rowInsert($q,implode(',',$keywords));
          */
          $keywords = self::isUnique(implode(',',array_column(self::$row[$i],self::$columnEnglish)));
        } else {
          $keywords = self::isUnique(implode(',',array_column(self::$row[$i],self::$columnEnglish)));
        }
        if ($keywords and $d=self::requestMeanings($keywords)) return $d;
      } elseif ($d=self::requestMeaning(1,$q)){
        return array($d[1]=>$d[2]);
        // return $d;
      }
      // elseif(here google come):
    }
    private function requestTranslates($query)
    {
      foreach($query as $i => $q) if($m=self::requestTranslate($i,$q)) $r[$q]=$m;
      return $r;
    }
    private function requestTranslator($q)
    {
      // TODO: working...
      // $source=self::$langCurrent;
      // $target=self::$langDefault;
      // if(self::$ruleTranslateAPI == true) {
      //   $google = new \app\component\translator(self::$ruleTranslateAccess);
      //   if($google->requestTranslate($q,self::$langDefault,self::$langCurrent)) {
      //     $g = str_replace("% 20"," ",$google->text);
      //     if($q != $g) {
      //       self::rowAdd($q,$g);
      //       if($r=self::requestMeaning(1,$g)) return array($q => array($r[1]=>$r[2]));
      //     }
      //   }
      // }
    }
  }
}
