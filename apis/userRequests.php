<?php
namespace pharmeasy\classes\User;
error_reporting(E_ALL);

include_once(__DIR__.'/../config.php');
include_once(__DIR__.'/../helper/utils.php');
include_once(__DIR__.'/../classes/User/UserFactory.php');
include_once(__DIR__.'/../classes/User/UserPatient.php');


startSession();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];
$userFactory = new UserFactory($userType);
$user = $userFactory->getInstance($userId);
$user->getAllUserRequest()

?>