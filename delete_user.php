<?php
session_start();
include_once ('Database/user.php');
if ($_SESSION["autehtification_success"]){
	$message="user deleted";
	$link="users.php";
	$link_name="User administration";
	$del=new Database\Users();
	$del->delete_user($_GET["id"]);
	include_once('templates/confirm_page.html');
	exit();
}
else{
header ('Location: index.php');
}
?>