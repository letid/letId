<?php
namespace app
{
    class mail extends \letId\support\mail
    {
        public function test()
        {
    		echo 'app\mail('.$this->Id.')';
    	}
    }
}
