<?php
namespace Database;
include_once ('Abstract.php');
class Authentification extends DB{
const table_name="user_activation";

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
	if ($user["activated"]==1){
		if ($_SESSION["name"]==$user["name"] && $_SESSION["pass"]==$user["pass"]){
			$_SESSION["autehtification_success"]='1';
		}
	return $user;
	}
	else {
	$_SESSION["message"]='User did not activated';
	header ('Location: authorization.php');
	}
}
}
function add_user_activation($rows,$values){
$user_activation=$this->add_data(self::table_name,$rows,$values);
}
function get_user_activation($column,$value){
$user_activation=$this->select_list(self::table_name,$column,$value);
return $user_activation;
}
}
?>