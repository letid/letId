<?php
namespace app
{
  class logController extends \letId\request\log
  {
    protected $table = 'visits';
    public function counter()
  	{
      // $this->requestVisitsUser();
  		$this->requestVisits();
  	}
    /**
    * @param select(locale, lang, hit, modified, created)
    */
    private function requestVisitsUser()
    {
      $visits = avail::$database->select('locale, lang, view, modified, created')->from($this->table)->where($this->rowSelector)->execute()->rowsCount()->toArray();
      if ($visits->rowsCount) {
        avail::configuration($visits->rows[0])->merge();
      } else {
        // avail::configuration(array('lang'=>'en','locale'=>'en'))->merge();
      }
    }
  }
}
