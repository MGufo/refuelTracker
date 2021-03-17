<?php
require_once("databaseConfiguration.php");

//variabili di SESSION: userId

session_start();

function login($mail,$password,$userDataManager){
	if($mail==='admin' && $password==='admin'){
		$_SESSION['userId']='admin';
		return TRUE;
	}

	$id = $userDataManager->getUserIdForAuth($mail,$password);
	if($id){
		$_SESSION['userId'] = $id;
		return TRUE;
	}else return FALSE;
}
function getUserId(){
	return isset($_SESSION['userId'])? $_SESSION['userId'] : NULL;
}

function isLogged(){
	return isset($_SESSION['userId']);
}

function isLoggedAsAdmin(){
	return isset($_SESSION['userId']) && $_SESSION['userId']=='admin'; 	
}


?>
