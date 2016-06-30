<?php
namespace App;
class Authorization extends \Letid\Http\Initiate
{
    /*
    Since we used isset($this->user), user property can not defined by default
    */
    public $table = array(
        'user' => 'users'
    );
    public function age($v)
	{
        // print_r($database::select('id')->from('love')->build()->query);
        // print_r(self::select('id')->from('love')->build()->query);
        // print_r(self::database()::select('id')->from('love')->build()->query);
        // print_r(\Letid\Database\Request::select('id')->from('love')->build()->query);
        // print_r($this->db->select('id')->from('love')->build()->query);
        // print_r($this);
        // print_r($this->UserInfo());
        if ($v >= 10) return true;
	}
    public function user($a)
	{
        if (isset($this->user)) {
            return true;
        }
	}
    public function user_email()
	{
        if (isset($this->user)) {
            return $this->user->email;
        }
	}
    public function guest()
	{
        if (!isset($this->user)) {
            // echo isset($this->user).'-yes';
            return true;
        }
        // return !$this->user;
	}
    // public function ages($v)
	// {
    //     if ($v >= 10) return true;
	// }
    // Database::select('id')->from($this->formTable)->where($name,$value)->execute()->rowsCount()->rowsCount;
}
