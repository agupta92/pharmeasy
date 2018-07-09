<?php
namespace pharmeasy\classes\User;
error_reporting(E_ALL);


class UserFactory {
	private $userFactory ;

	public function __construct($user){
		$this->userFactory = $user;
	}

	public function getUserType(){
		return $this->userFactory;
	}

	public function getInstance($userId){
		$className = 'pharmeasy\\classes\\User\\User'.$this->userFactory;

		return new $className($userId);
	}
}


?>