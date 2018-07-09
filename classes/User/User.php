<?php
namespace pharmeasy\classes\User;

class User{
	protected $userId;
	protected $userName;
	protected $userEmail;
	protected $userType;

	public function __construct($userID){
		$this->userId = $userID;
	}
}


?>