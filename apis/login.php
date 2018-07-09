<?php

error_reporting(E_ALL);
include_once(__DIR__.'/../config.php');
include_once(__DIR__.'/../helper/utils.php');


$user_name = $_GET['userName'];
$user_password = $_GET['password'];

$sql_query = "select user_id,user_type,user_email,user_name from pe_user_details where user_name = '$user_name' AND user_password = '$user_password'";
try{
	$user_details = $db->rawQueryOne($sql_query);
	//var_dump($user_id);exit;
	if(isset($user_details['user_id'])){
		createUserSession($user_details);
		//checkSession(1);
		returnSuccess('User Successfully Login',$user_details);

	} else {
		returnSuccess('Incorrect username/password');
	}
} catch (Exception $e){
	returnFailure('Some Error Occured: ' . $e->getMessage());
}

?>