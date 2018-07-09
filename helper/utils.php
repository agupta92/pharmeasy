<?php



function returnSuccess($msg,$data = array()){
	$successArray = array('m'=> $msg,
							's'=> true,
							'data'=> $data);
	header('Content-Type: application/json');
	echo json_encode($successArray);
}

function returnFailure($msg,$data=array()){
	$successArray = array('m'=> $msg,
							's'=> false,
							'data'=> $data);
	header('Content-Type: application/json');
	echo json_encode($successArray);
}

function createUserSession($user){
	session_start();
	$_SESSION = $user;
}

function startSession(){
	session_start();
}

function checkSession($user_id){
	var_dump($_SESSION);
}


?>