<?php
session_start();
include_once ('Database/vehicle.php');
if ($_SESSION["autehtification_success"]){
	$message="Vehicle deleted";
	$link="main.php";
	$link_name="Main page";
	$del=new Database\Vehicle();
	$del->delete_vehicle($_GET["id"]);
	include_once('templates/confirm_page.html');
	exit();
}
else{
header ('Location: index.php');
}
?>