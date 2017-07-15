<?php
namespace app
{
  /**
  * app\dictionary('love')->search('love')
  * app\dictionary::search('love')->definition();
  * app\dictionary::search('love')->suggestion();

  * app\search::definition('love')->result();
  * app\search::suggestion('love')->result();
  */
  /*
  Moby
  Noun 			N
  Plural			p
  Noun Phrase		h
  Verb (usu participle)	V
  Verb (transitive)	t
  Verb (intransitive)  	i
  Adjective		A
  Adverb			v
  Conjunction		C
  Preposition		P
  Interjection		!
  Pronoun			r
  Definite Article	D
  Indefinite Article	I
  Nominative		o
  */
  
  class dictionary
  {
    public $q;
  	static private $fileMobyThesaurus = 'DATABASE/MOBY/thesaurus.txt';
  	static private $fileMobyPartsofspeech = 'DATABASE/MOBY/partofspeech.txt';

  	static private $ruleTranslateAPI = false;
  	static private $ruleTranslateAccess = 'AIzaSyCXDAPSNcVG40pN7VfCjEW-r93VWbfnSHA';
  	static private $ruleTranslateInputData = false;
  	static private $ruleImageAPI =false;
  	static private $ruleImageAccess = 'ABQIAAAAk0-qzrfhcMoXzVpLqNNZghQFSQtheH-ugMmNUC1exYiAINr_mhQm2LEy4BlTLh51QWPBB9ckI2M0pg';
  
  	static private $ruleAntonmy = false;
  	static private $ruleDerivation = false;
  
  	static private $ruleCriteria = array(0=>'q',1=>'q%',2=>'%q',3=>'%q%');
  	static private $ruleRestrictedKeywords = array('gangbang','incest','femdom');
  
  	static private $langCurrent ='en';
  	static private $langDefault = 'en';
  	static private $total = array();
  	static private $row = array();
    static private $rowGrammar  = array(
    	1=>'Noun', #0
    	16=>'Verb', #1
    	4=>'Intransitive verb',
    	5=>'Transitive verb',
    	12=>'Auxiliary verb',
    	3=>'Adjective', #2
    	6=>'Adverb', #3
    	14=>'Abbreviation', #8
    	8=>'Conjunction', #5
    	22=>'Determiner',
    	24=>'Predeterminer',
    	23=>'Contraction of', #12
    	10=>'Exclamation',
    	11=>'Indefinite article',
    	9=>'Interjection',
    	20=>'Comb Form', #10
    	7=>'Preposition', #4
    	15=>'Prefix',
    	2=>'Pronoun', #6
    	13=>'Symbol',
    	18=>'Adjective & Adverb',
    	19=>'Adjective & Noun',
    	21=>'Adjective & Pronoun',
    	26=>'Conjunction & Adverb',
    	27=>'Preposition & Conjunction',
    	28=>'Noun & Pronoun',
    	44=>'Exclamation & Noun',
    	25=>'Verb & Noun',
    	29=>'Cardinal number',
    	30=>'Ordinal number',
    	31=>'Interrogative adjective',
    	32=>'Interrogative adverb',
    	33=>'Interrogative pronoun',
    	34=>'Relative adverb',
    	35=>'Relative adjective',
    	36=>'Relative pronoun',
    	37=>'Relative conjunction',
    	38=>'Adverb & Preposition',
    	39=>'Adverb, Adjective & Preposition',
    	40=>'Modal verb',
    	41=>'Possessive adjective',
    	42=>'Possessive pronoun',
    	43=>'Infinitive marker',
    	17=>'Suffix',
    	100=>'Idiom',
    	101=>'Synonym',
    	102=>'Antonym',
    	113=>'Country',
    	104=>'Capital city',
    	105=>'Plural Noun',
    	106=>'Phrase', #11
    	107=>'Prefix',
    	108=>'Slang',
    	109=>'Verb present tense',
    	110=>'Verb past tense'
    );

    static private $rowStatus = array(
    	0=>'Draft',
    	1=>'Active',
    	2=>'Okey',
    	100=>'American History',
    	101=>'Mathematic Glossary (Intermediate School Level)',
    	102=>'Mathematic Glossary (Elementary School Level)',
    	103=>'Medical Glossary (Medical Terms (2nd edition))'
    );

  	static private $columnSource = 'source';
  	static private $columnExam = 'exam';
  	static private $columnState = 'state';
  	static private $columnEnglish = 'state';
    
    public function __construct($Id = '')
    {
      // $dictionaries = avail::configuration()->dictionaries;
      // $VersoURI = avail::$uri;
      if($Id) {
        $this->q = $Id;
      } elseif (isset($_GET['q'])) {
        $this->q = $_GET['q'];
      } elseif (isset(avail::$uri[1])) {
        if (avail::$uri[0] == 'definition') {
          $this->q = avail::$uri[1];
        } elseif (isset(avail::$uri[2])) {
          $this->q = avail::$uri[2];
        }
      } else {
        $this->q = '';
      }
    }
    /*
    app\dictionary::search()->definition()
    */
    static function search($Id=null)
    {
      return new self($Id);
    }
    public function definition()
    {
      $q=$this->q;
      $r = array($q); // remove
      // if($q && in_array(strtolower($q), self::$ruleRestrictedKeywords))
      self::$langCurrent = avail::$config['lang']; //avail::session('lang')->version()->get();
      // self::$langDefault = 'en';
      $r = array('language'=>self::$langCurrent,'page'=>'definition','result'=>array());
      if ($q) {
        $q = avail::content('q')->set(trim(rawurldecode($q)));
        $r['query']=$q;
        if (self::$langCurrent == self::$langDefault) {
          if($d=self::requestMeaning(1,$q)) {
            $r['result'][$q]=array($d[1]=>$d[2]);
          } elseif ($str=self::isSentence($q)) {
            $r['result'][$q]=self::requestMeanings($str);
          } else {
            $r['page']='notfound';
          }
        } else {
          if($d=self::requestTranslate(1,$q)) {
            $r['result']=array($q=>$d);
          } elseif ($str=self::isSentence($q)) {
            $r['result']=self::requestTranslates($str);
          } elseif ($g=self::requestTranslator($q)) {
            $r['result']=$g;
          } else {
            $r['page']='notfound';
          }
        }
      } else {
        $r['page']='pleaseenter';
      }
      return $r;
    }
    /*
    self::search()->suggestion()
    app\definition::search()->suggestion()
    */
    public function suggestion()
    {
      if ($this->q) {
        $table = self::tableName(self::$langCurrent);
        $source = self::$columnSource;
        $q = $this->q.'%';
        $result = avail::$database->select($source)->from($table)->where($source,$q)->group_by($source)->limit(10)->execute()->toJson();
        // return array_filter(array_reduce($result->rows, 'array_merge', array()), 'strlen');
        // return array_filter(array_reduce($result->rows, 'array_merge', array()), 'strlen');
        return array_reduce($result->rows, 'array_merge', array());
        // $result = avail::$database->select($source)->from($table)->where($source,$q)->group_by($source)->limit(10)->execute()->toArray();
        // return array_column($result->rows, $source);
      }
      return array();
    }
    private function engineUnique($s,$e=',',$i=NULL,$r=NULL)
    {
      if(is_array($s)) $str = $s; else $str = explode($e,preg_replace('/\s+/',' ',$s));
      $str_unique = array_unique(array_filter($str));
      if ($i) {
        return ($r)? implode($r,$str_unique) : implode($str_unique);
      } else {
        return $str_unique;
      }
    }
    private function isSentence($q)
    {
      if($str = self::engineUnique($q,' ') and count($str) > 1) return $str;
    }
    private function requestMobyThesaurus($q)
    {
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyThesaurus)->synonyms($this->q);
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyPartsofspeech)->partsOfSpeech($this->q);
      $r=array('Thesaurus');
      if (self::$fileMobyThesaurus && !self::isSentence($q)) {
        if ($x=componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyThesaurus)->synonyms($q) and count($x)) $r[]=array_unique($x);
      } else {
        $r[] = array(
          array(
            'service thesaurus zA'=>sprintf('...see Thesaurus for <em>%s</em>', $q)
          )
        );
      }
      return $r;
    }
    private function requestMobyPartsOfSpeech($q)
    {
      // $fileMobyPartsofspeech
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyThesaurus)->synonyms($this->q);
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyPartsofspeech)->partsOfSpeech($this->q);
      $r=array('Parts of speech');
      if (self::$fileMobyPartsofspeech && !self::isSentence($q)) {
        if ($x=componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyPartsofspeech)->partsOfSpeech($q)) {
          $r[] = array_unique(array_keys($x));
          // $r[] = $x;
          // $r[] = array(
          //   // 'a'=>'what',
          //   array(
          //     // 'keys'=>'values'
          //     'a'=>array(
          //       'class'=>'love'
          //     )
          //   ),
          //   // array(
          //   //   'a'=>'bbc'
          //   // )
          // );
        }
      } else {
        $r[] = array(
          array(
            'service partsOfSpeech zA'=>sprintf('...see Parts of speech for <em>%s</em>', $q)
          )
        );
      }
      return $r;
    }
    private function requestNumberMath($q)
    {
      $em = componentService::evalMath();
      if($e= $em->evaluate($q) and $q != $e){
        if($v=$em->vars()):
          foreach($v as $key=>$val) $r['Equation'][]=array(
            'math equat'=>sprintf('<em>%s</em> is <b>%d</b>', $key,$val)
          );
        else:
          $r['Equation'][]=array(
            'math equat'=>sprintf('<em>%d</em> is equal to <b>%s</b>', $q,number_format($e))
          );
        endif;
        $r['Evaluation'][]= array('math eval'=>$e);
        if($e !=$em->e($q))$r['Synonym'][]=array('synonym'=>$em->e($q));
        if($f=$em->funcs())$r['EvalMath'][]=$f;
        return $r;
      }
    }
    private function requestNumeric($q)
    {
      if(is_numeric($q)) return number_format($q, 0, '', '');
        elseif(is_numeric(preg_replace("([^a-zA-Z0-9]|^\s)", '', $q)) and $f=(float)preg_replace('/[^0-9.]*/','',$q)) return number_format($f, 0, '', '');
    }
    private function requestNumberToWord($q)
    {
      // $n2en= componentService::numericToEnglish(4355)->request();
      // print_r($n2en);
      // $n2my= componentService::numericToMyanmar(4355)->request();
      // print_r($n2my);
      $r=array();
      $r['en'] = array('english'=>componentService::numericToEnglish($q)->request());
      $r['my'] = array_filter(componentService::numericToMyanmar($q)->request());
      print_r($r);
      return array('Numeric' => $r);
    }
    private function requestDerive($i,$q)
    {
      // TODO: working...
      if (self::$ruleDerivation){
        $db = self::requestDeriveQuery($q);
        if($x=$db->result->num_rows){
          foreach($db->rows as $w => $d){
            $id[]=$d['id'];
            $word[]=$d['word'];
            $derive[]=$d['derive'];
            $wame[]=$d['wame'];
            $dame[]=$d['dame'];
            if($d['derive']==$q or $d['word']!=$q){
              // $r[1][$w]['grammar']="{$d['wame']} {{$d['derive']}}:  {$d['dame']} form of {{$d['word']}}.";
              $r[1][$w][$d['dame']]=str_replace(array_filter(array_keys($d),function($v){return $v;}),array_values($d),'wame derive: <em>dame</em> form of word.');
            }else{
              // $r[1][$w]['grammar']="...as {$d['wame']} {{$d['derive']}} is <em>{$d['dame']}</em> form of {$d['word']}.";
              $r[1][$w][$d['dame']]=str_replace(array_filter(array_keys($d),function($v){return $v;}),array_values($d),'...as wame derive is <em>dame</em> form of word.');
            }
            // array_map(function($s){  return ':'.$s}, array_keys($d))
            // array_filter($array1, "odd")
            // array_filter(array_keys($d),function($v){return ':'.$v;}, ARRAY_FILTER_USE_BOTH)
          }
          if($x==1){
            $r[0] = 'in '.self::engineUnique($dame,null,1,', ').' form';
          }elseif($x==2){
            $r[0] = 'in '.self::engineUnique($wame,null,1,' and ').' form';
          }else{
            $r[0] ='Grammar';
          }
          $r[2] = self::engineUnique($word);
          return $r;
        }
      }
    }
    private function requestDeriveQuery($q)
    {
      $g=addslashes($q);
      return avail::$database->query(
        "SELECT
          w.word_id AS id, w.word AS word, de.word AS derive, de.derived_type AS d_type, de.word_type AS w_type, wt.name AS wame, dt.derivation AS dame
        FROM en_derive de
          INNER JOIN en_word w ON w.word_id=de.root_id
          INNER JOIN en_derive_type dt ON dt.derived_type=de.derived_type
          INNER JOIN en_word_type wt ON wt.word_type=de.word_type
          WHERE (de.word='$q' OR w.word='$q') and (de.derived_type <> 0 OR de.word_type = 0);"
      )->execute()->rowsCount()->toArray();
    }
    private function requestRoman($q)
    {
      // TODO: working...
    }
    private function requestAntonym($i,$q)
    {
      // TODO: working...
      if(self::$ruleAntonmy == true):
        $r=array('Antonym');
        $r[] = array(
          array(
            'service antonym zA'=>sprintf('...see Antonym for <em>%s</em>', $q)
          )
        );
        return $r;
      endif;
    }
    
    private function requestChecker($i,$q,$r=NULL,$c=0,$l=NULL,$s='*')
    {
      if(!$r)$r=self::$columnSource;
      if(!$l)$l=self::$langCurrent;
      if($q=addslashes($q) and $c and $criteria=self::$ruleCriteria[$c]) $q=str_replace('q',$q,$criteria);
      $select = is_array($s)?implode($s):$s;
      $db = avail::$database->select($select)->from(self::tableName($l))->where($r,'LIKE',$q)->execute()->rowsCount()->toArray();
      self::$row[$i] = $db->rows;
      if (isset($db->rowsCount)) {
        
        return self::$total[$i] = $db->rowsCount;
      } else {
        print_r($db);
      }
    }
    private function requestMeaning($i,$q)
    {
      $en=self::$langDefault;
      if($math=self::requestNumberMath($q)):
        return array('evalmath',$q,$math);
      elseif(self::requestChecker($i,$q,NULL,0,$en)):
        // return array(1,3);
        return array('meaning',$q,self::requestMyanmar($i,$q));
        // return array('meaning',$q,self::requestMyanmar($i,$q));
      elseif($numb=self::requestNumeric($q)):
        return array('number',$numb,self::requestNumberToWord($numb));
      elseif($roma=self::requestRoman($q)):
        return array('roman',$q,$roma);
      elseif($deri=self::requestDerive($i,$q) and $q!=$deri[2][0] and self::requestChecker($i,$deri[2][0],NULL,0,$en)):
        // echo 'abc';
        return array('meaning',$q,self::requestMyanmar($i,$deri[2][0],$deri));
      elseif($deri):
        return array('derive',$q,
          array($deri[0]=>$deri[1],
            "Oop..."=>array(
              array('not'=>"We currently have no definition of <b>{$deri[2][0]}</b>, please feel free to post and distribute..."),
              array('x add'=>"click here to post '{{$deri[2][0]}}' definition!")
            )
          )
        );
      /*
      elseif(self::requestChecker(5,$q,self::$columnExam,3,$en)):
        return array('meaning',$q,self::requestMyanmar(5,$q));
      */
      endif;
    }
    private function requestMeanings($query)
    {
      $r=array();
      self::$fileMobyThesaurus = false;
      self::$fileMobyPartsofspeech = false;
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyThesaurus)->synonyms($this->q);
      // return componentService::mobyThesaurus(avail::$config['storage.root'].self::$fileMobyPartsofspeech)->partsOfSpeech($this->q);
      foreach($query as $i => $q) if($m=self::requestMeaning($i,$q)) $r[$m[1]] = $m[2];
      return $r;
    }
    private function requestMyanmar($i,$q,$derive=true)
    {
      $r = array();
      // $className = ($this->isAuthorization('detable') !== false)?' zA':NULL;
      $className = '';
      foreach (self::$row[$i] as $row) {
        $id=$row['id']; $state=$row['state']; $grammar=self::$rowGrammar[$state];
        // $r[$grammar][$id] = array("det{$className}"=>$row['def'],'x'=>$row['exam']);
        $r[$grammar][$id]["det{$className}"] =$row['def'];
        if($row['exam'])$r[$grammar][$id]['ex'] =$row['exam'];
      }
      // while($m =self::$row[$i]->fetch_assoc()):
      //   $id=$m['id']; $state=$m['state']; $grammar=self::$rowGrammar[$state];
      //   //$r[$grammar][$id] = array("det{$className}"=>$m['def'],'x'=>$m['exam']);
      //   $r[$grammar][$id]["det{$className}"] =$m['def'];
      //   if($m['exam'])$r[$grammar][$id]['x'] =$m['exam'];
      // endwhile;
      $r['Total'] = self::$total[$i];
      if (is_array($derive)) $r[$derive[0]] = $derive[1]; elseif($derive===true and $d=self::requestDerive($i,$q)) $r[$d[0]] = $d[1];
      if ($An=self::requestAntonym($i,$q)) {
        if (count($An) == 2) $r[$An[0]] = $An[1];
      }
      if ($Mt=self::requestMobyThesaurus($q)) {
        if (count($Mt) == 2) $r[$Mt[0]]=$Mt[1];
      }
      if ($Mb=self::requestMobyPartsOfSpeech($q)) {
        if (count($Mb) == 2) $r[$Mb[0]]=$Mb[1];
        // if (count($Mb) == 2)$r=array_merge($r,$Mb);
        // if (count($Mb) == 2) array_push($r, $Mb);
        // if (count($Mb) == 2) array_push($r, array_values($Mb));
      }
      return $r;
      // $className = ($this->isAuthorization('detable') !== false)?' zA':NULL;
      // while($m =self::$row[$i]->fetch_assoc()):
      //   $id=$m['id']; $state=$m['state']; $grammar=self::$rowGrammar[$state];
      //   //$r[$grammar][$id] = array("det{$className}"=>$m['def'],'x'=>$m['exam']);
      //   $r[$grammar][$id]["det{$className}"] =$m['def'];
      //   if($m['exam'])$r[$grammar][$id]['x'] =$m['exam'];
      // endwhile;
      // $r['Total']		= self::$total[$i];
      // if(is_array($derive)) $r[$derive[0]] = $derive[1]; elseif($derive===true and $d=self::requestDerive($i,$q)) $r[$d[0]] = $d[1];
      // if($antonym=self::requestAntonym($i,$q))$r[$antonym[0]] = $antonym[1];
      // if($moby=self::requestMobyThesaurus($q))$r[$moby[0]] =$moby[1];
      // return $r;
    }
    private function requestTranslate($i,$q)
    {
      if (self::requestChecker($i,$q)) {
        if (self::$total[$i] > 1) {
          $this->table=self::tableName(self::$langCurrent);
          foreach (self::$row[$i] as $value) {
            $words .=$value[self::$columnEnglish].','; self::rowDelete($value['id']);
            // $definition .=$value[self::$columnEnglish].','; self::rowDelete($value['id']);
          }
          // TODO: not sure? need to test
          $keywords = self::engineUnique($words);
          self::rowInsert($q,implode(',',$keywords));
        } else {
          $keywords = self::engineUnique(implode(',',array_column(self::$row[$i],self::$columnEnglish)));
        }
        if ($keywords and $d=self::requestMeanings($keywords)) return $d;
      } elseif ($d=self::requestMeaning(1,$q)){
        return array($d[1]=>$d[2]);
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
      if(self::$ruleTranslateAPI == true) {
        $google = new google_translate_api(self::$ruleTranslateAccess);
        if($google->requestTranslate($q,self::$langDefault,self::$langCurrent)) {
          $g = str_replace("% 20"," ",$google->text);
          if($q != $g) {
            self::rowAdd($q,$g);
            if($r=self::requestMeaning(1,$g)) return array($q => array($r[1]=>$r[2]));
          }
        }
      }
    }
    private function rowAdd($q,$keywords)
    {
      // TODO: working...
      if(self::$ruleTranslateInputData == true and self::$langCurrent != parent::$langDefault) {
        $this->table=self::tableName(self::$langCurrent);
        // $this->table=self::$temp[self::$langCurrent];
        if(self::requestChecker(1001,$q)) {
          foreach (self::$row[1001] as $value) {
            $keywords .=','.$value[self::$columnEnglish]; self::rowDelete($value['id']);
          }
          $keywords = self::engineUnique($keywords);
        }
        self::rowInsert($q,$keywords);
      }
    }
    private function rowDelete($id)
    {
      // new sql("DELETE FROM {$this->table} WHERE id='{$id}'");
      avail::$database->delete()->from($this->table)->where('id',$id)->execute();
    }
    private function rowInsert($q,$g)
    {
      // new sql("INSERT INTO {$this->table} SET source='{$source}',{self::$columnEnglish}='{$definition}'");
      avail::$database->insert(array(
          'source'=>addslashes($q), self::$columnEnglish=>addslashes($g)
      ))->to($this->table)->execute();

    }
    private function tableName($Id)
    {
      return 'db_'.$Id;
    }
    static public function requestHtmlEngine($d)
    {
      /*
      html::request('div')->response('Ok',array('class'=>'active'));
      html::request('div')->text('Ok')->attr(array('class'=>'active'))->response();
      html::request('div')->text('Ok')->response(array('class'=>'active'));
      html::request('div')->response('Ok');
      */
      //$dl = array();
      $dl=null;
      $is_thesaurus = false;
      foreach($d as $k => $v):
        if(is_array($v)):
          $dd = NULL;
          foreach($v as $dk => $dv):
            if(is_array($dv)):
              foreach($dv as $tag => $dvv)://dvk
                if(is_array($dvv)):
                  $dd .= avail::html($tag)->text($dvv)->response();
                // elseif(is_numeric($tag)):
                  // $dd .= avail::html('a')->text($dk)->attr(array('href'=>"?q=$tag",'data-name'=>$dvv))->response();
                // elseif($dk == 'a'):
                  // NOTE: for Parts of speech
                  // $dd .= avail::html('a')->text($tag)->attr(array('href'=>"?q=$tag",'data-name'=>implode(' ',$dvv)))->response();
                else:
                  $attr = ($tag=='ex' or $dk < 1)?array('class'=>$tag):array('id'=>$dk,'class'=>$tag);
                  // $dd .= new html('p',parent::zln($dvv), $attr);
                  $dd .= avail::html('p')->text($dvv)->attr($attr)->response();
                  // $dd .= avail::html('p')->attr($attr)->response($dvv);
                endif;
              endforeach;
            elseif(is_numeric($dk)):
              $dd .= avail::html('a')->text($dv)->attr(array('href'=>"?q=".$dv))->response();
            else:
              // $is_thesaurus = true;
              // $dd .= new html('a',$dv, array('href'=>"?q=$dv"));
              $dd .= avail::html($dk)->text($dv)->response();
            endif;
          endforeach;
          //$dd_ = is_array($dd_)?implode($dd_):$dd_;
          if($is_thesaurus):
            // $dd = new html('p',$dd);
            // $dd = avail::html('p')->text($dd)->response();
            $dd = avail::html('p')->text($dd)->response();
          endif;
  
          // $dl .= new html('div', new html('h4', $k).$dd,array('class'=>$k));
          
          // new html('h4', $k).$dd
          // avail::html('h4')->response($k).$dd
          
          // $dl .= avail::html('div')->attr(array('class'=>$k))->response(avail::html('h4')->response($k).$dd);
          $dl .= avail::html('div')->text(avail::html('h4')->text($k)->response().$dd)->attr(array('class'=>strtolower($k)))->response();
        endif;
      endforeach;
      return $dl;
    }
    /*
    app\dictionary::requestMenu();
    */
    static function requestMenu($menu=array())
    {
      $dictionaries = avail::configuration()->dictionaries;
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
        if ($k == avail::$config['lang']) $attrClass[]='active';
        $menu[]=array(
          'li'=> array(
            'text' => array(
              'a'=>array(
                'text' =>$v,
                'attr' =>array(
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
      avail::content($Id)->set(array_sum(array_map("count", avail::configuration()->dictionaries)));
    }
  }
}
