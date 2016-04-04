<?php
namespace App\Pages;
use App;
use Letid\Request\DbQuery;
class music extends App\Page
{
    public function __construct()
    {
        /*
        constructor
        */
        $this->menu = $this->menu();
        echo $this->menu;
    }
    public function home()
    {
        // print_r($this);
        return 'this came from music::home()';
    }
    public function album()
    {
        return 'this came from music::album()';
    }
    public function title()
    {
        return 'this came from music::title()';
    }
    public function name()
    {
        return 'this came from music::name()';
    }
    public function sort()
    {
        return 'this came from music::sort()';
    }
}
