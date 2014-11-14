<?php
session_start();
include_once ('Database/Abstract.php');
if ($_SESSION["autehtification_success"]){
	$message="permission changed";
	$link="users.php";
	$link_name="ser administration";	
	$DB_object= new Database\DB();
	$DB_object->change_permission($_GET["id"]);
	include_once('templates/confirm_page.html');
	exit();
}
else{
header ('Location: index.php');
}
?>