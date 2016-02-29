<?php
namespace App\Pages;
class music extends Page
{
    public function __construct()
    {
        /*
        constructor
        */
    }
    public function home()
    {
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

/*
namespace App;
class home extends Page
namespace App\Page;
use App;
class home extends App\Page
*/
