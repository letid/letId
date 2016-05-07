<?php
namespace App;
class Authorization extends \Letid\Http\Initiate
{
    public function age($v)
	{
        if ($v >= 10) return true;
	}
}
