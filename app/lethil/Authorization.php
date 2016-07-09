<?php
namespace app;
class authorization extends \letId\support\authorization
{
    public $table = array(
        'user' => 'users'
    );
    public function test()
    {
        echo 'app\authorization::test';
    }
    public function age($v)
	{
        if ($v >= 10) {
            return true;
        }
	}
    public function user()
	{
        return self::$user;
	}
    public function confirm_user()
	{
        return self::$user;
	}
    public function confirm_guest()
	{
        return !self::$user;
	}
    public function confirm_age()
	{
        if ($v >= 10) return true;
	}
    public function confirm_email()
	{
        if ($v >= 10) return true;
	}
    // public function user_email()
	// {
    //     if ($this->user()) {
    //         return self::$user->email;
    //     }
	// }
    public function guest()
	{
        return !self::$user;
	}
}