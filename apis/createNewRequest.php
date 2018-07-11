<?php
namespace pharmeasy\classes\User;
error_reporting(E_ALL);
/**
 * Create new Request for Approval API
 *
 * @category  Login
 * @author    Ankit Gupta <agupta_92@yahoo.co.in>
 * @param RecordId, UserID od Patient
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
$record_id = $_GET['recordId'];
$for_user = $_GET['userId'];
$userFactory = new UserFactory($userType);
$user = $userFactory->getInstance($userId);
$user->createNewRequest($record_id, $for_user);

?>