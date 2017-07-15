<?php
namespace app
{
  class componentService
  {
    static function evalMath()
    {
      return new \letId\service\evalMath;
    }
    static function mobyThesaurus($Path)
    {
      return new \letId\service\mobyThesaurus($Path);
    }
    static function numericToMyanmar($Id)
    {
      return new \letId\service\numericToMyanmar($Id);
    }
    static function numericToEnglish($Id)
    {
      return new \letId\service\numericToEnglish($Id);
    }
    static function googleTranslate($Id)
    {
      return new \letId\service\googleTranslate($Id);
    }
  }
}