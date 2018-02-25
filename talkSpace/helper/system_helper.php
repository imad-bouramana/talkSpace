<?php
// redirect page
function redirect($page = FALSE, $message = NULL, $message_type = NULL){
	if(is_string($page)){
		$location = $page;
	}else{
		$location = $_SERVER['SCRIPT_NAME'];
	}
	//check for message
	if($message != NULL){
		$_SESSION['message'] = $message;
	}
	// check for type
	if($message_type != NULL){
		$_SESSION['message_type'] = $message_type;
	}
	// rederdect
	header('LOCATION: ' . $location);
	exit();
}
// desplay message
function displayMessage(){
    if(!empty($_SESSION['message'])){
    	// assign message var
    	$message = $_SESSION['message'];

    	if(!empty($_SESSION['message_type'])){
               // assign type var
    		$message_type = $_SESSION['message_type'];
    		if($message_type == 'error'){
    			echo '<div class="alert alert-danger">' . $message . '</div>';
    		}else{
    			echo '<div class="alert alert-success">' . $message . '</div>';
    		}
    	}
    	// unset message
    	unset($_SESSION['message']);
    	unset($_SESSION['message_type']);
    }else{
    	echo '';
    }
}
/*
* check if user login_in
*/
function is_loggin(){
    if(isset($_SESSION['is_loggin_in'])){
        return true;
    }else{
        return false;
    }
}
/*
* get user 
*/
function getUser(){
    $userArray = array();
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['username'];
    $userArray['name'] = $_SESSION['name'];
    return $userArray;

}