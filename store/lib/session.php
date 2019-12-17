<?php 

//Starting Session
$session_status = session_status();
if ($session_status == 1) {
	session_start();
}

//set a session variable: set_ses( 'name of the variable', 'value either string or variable')
//associative array can be set into session like array key as session name and value as value:
//set session value on variable: set_ses([ 'name of the variable'=>'value either string or variable'])
function set_ses($name,$value=null){

	if (is_array($name) && $value == null) {
		foreach ($name as $key => $val) {
			$_SESSION[$key]=$val;
		}
	}
	else{
		$_SESSION[$name]=$value;
	}
	
}

//get session value get('variable name passing through string')
function get_ses($name){

	return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
}

//destroy session value del_ses('variable name passing through string')
function del_ses($name){

	if (is_array($name)) {
		foreach ($name as $key => $value) {
			$_SESSION[$value]=null;
			unset($_SESSION[$value]);
		}
	}
	else{
		$_SESSION[$name]=null;
		unset($_SESSION[$name]);
	}
	
}

function des_ses(){

	$session_status = session_status();
	if ($session_status == 2) {
		// remove all session variables
		session_unset(); 
		// destroy the session 
		session_destroy(); 
	}
}

function ses_id($val=null){

	return $val == null ? session_id() : session_id($val);
}

function csrf($val=null){
    
	return trim($val) == null ? session_id() : session_id($val);
}