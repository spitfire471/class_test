<?php
namespace Database;
include_once ('Abstract.php');
class Authentication extends DB{

function start_session(){
if (!isset($_SESSION["name"])) $_SESSION["name"] = '';
$_SESSION["name"]=$_POST["name"];
$_SESSION["pass"]=md5($_POST["pass"]);
unset ($_POST["name"]);
unset ($_POST["pass"]);
}

function user_verification(){
if (isset ($_SESSION["name"])){
	$_SESSION["autehtification_success"]='';
	$name=addslashes($_SESSION["name"]);
	$DB_object= new Users();
	$user=$DB_object->get_user('name',$name);
	if ($_SESSION["name"]==$user["name"] && $_SESSION["pass"]==$user["pass"]){
		$_SESSION["autehtification_success"]='1';
	}
return $user;
}
$_SESSION["id"]='';
}

}
?>