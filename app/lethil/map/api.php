<?php
namespace app\map;
use app;
class api extends mapController
{
  public $responseType = 'json';
  public function __construct()
  {
    $this->timeCounter = app\avail::timer();
    app\avail::log()->counter();
    $this->timerfinish = $this->timeCounter->finish();
  }
  public function classConcluded()
  {
  }
  public function home()
  {
    $this->responseType='text';
    return array(
      'time'=>$this->timerfinish,
      'responseType'=>$this->responseType
    );
  }
  public function json()
  {
    return array(
        'time'=>$this->timerfinish,
        'responseType'=>$this->responseType
    );
  }
}
