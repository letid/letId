<?php
namespace app
{
    class log extends \letId\support\log
    {
        static function hits()
    	{
    		return new self('visits');
    	}
        public function counter()
    	{
    		$this->requestVisits();
    	}
    }
}
