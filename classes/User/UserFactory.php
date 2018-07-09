<?php
namespace pharmeasy\classes\User;
// include_once('UserPatient.php');
// include_once('UserDoctor.php');
// include_once('UserPharmacist.php');
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