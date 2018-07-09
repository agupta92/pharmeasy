<?php
namespace pharmeasy\classes\User;
use pharmeasy\classes\User\User;

error_reporting(E_ALL);

include_once(__DIR__.'/../../config.php');
include_once(__DIR__.'/../../helper/utils.php');
require('User.php');

class UserDoctor extends User{

	public function __construct($userId=1){
		parent::__construct($userID);
		$this->userType = 'doctor';
	}
}


?>