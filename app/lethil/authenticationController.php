<?php
namespace app;
class authenticationController extends \letId\request\authentication
{
  protected $table = array(
    'user' => 'users'
  );
}