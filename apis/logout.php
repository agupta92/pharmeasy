<?php
/**
 * Logout API
 *
 * @category  Logout
 * @author    Ankit Gupta <agupta_92@yahoo.co.in>
 * @param No Patameters[\Session Id]
 */
error_reporting(E_ALL);
include_once(__DIR__.'/../helper/utils.php');

try{
	startSession();
	if(destroySesssion()){
		returnSuccess('User Successfully Logout');
	} else {
		returnSuccess('Error while logging out');
	}
} catch (Exception $e){
	returnFailure('Some Error Occured: ' . $e->getMessage());
}

?>