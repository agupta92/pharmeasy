<?php

error_reporting(E_ALL);
include_once(__DIR__.'/../helper/utils.php');

try{
	startSession();
	//var_dump($user_id);exit;
	if(destroySesssion()){
		//checkSession(1);
		returnSuccess('User Successfully Logout');

	} else {
		returnSuccess('Error while logging out');
	}
} catch (Exception $e){
	returnFailure('Some Error Occured: ' . $e->getMessage());
}

?>