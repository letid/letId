<?php
namespace App;
use Letid\Http;
class Authorization extends Http\Initiate
{
    public function age($v)
	{
        // echo 'abc';
        // print_r($this);
        // print_r($var);
        // echo "\n";
        if ($v >= 10) return true;
	}
}
