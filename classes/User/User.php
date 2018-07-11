<?php
namespace pharmeasy\classes\User;
/**
 * User Class
 *
 * @category  User Model
 * @package   User
 * @author    Ankit Gupta <agupta_92@yahoo.co.in>
 */

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