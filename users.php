<?php
session_start();
include_once('Database/user.php');
if ($_SESSION["autehtification_success"]){
	$DB_object= new Database\Users();
	$users=$DB_object->get_users();	
	$c=count($users);
	include_once('templates/users.html');
	exit();
}
else{
header ('Location: index.php');
}
?>
