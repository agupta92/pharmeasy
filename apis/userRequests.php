<?php
namespace pharmeasy\classes\User;
error_reporting(E_ALL);
/**
 * User Request Show API
 *
 * @category  User
 * @author    Ankit Gupta <agupta_92@yahoo.co.in>
 * @param  Void
 */
include_once(__DIR__.'/../config.php');
include_once(__DIR__.'/../helper/utils.php');
include_once(__DIR__.'/../classes/User/UserFactory.php');
include_once(__DIR__.'/../classes/User/UserPatient.php');
include_once(__DIR__.'/../classes/User/UserDoctor.php');
include_once(__DIR__.'/../classes/User/UserPharmacist.php');



startSession();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];
$userFactory = new UserFactory($userType);
$user = $userFactory->getInstance($userId);
$user->getAllUserRequest()

?>