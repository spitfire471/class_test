<?php
session_start();
include ('Database/vehicle.php');
if ($_SESSION["autehtification_success"]){
	$DB_object=new Database\Vehicle();
	$link="index.php";
	$link_name="Main page";
	$del=new Database\Vehicle()
	if (isset($_POST["id"])){
		$rows=array("marka","model","rik");
		$values=array(addslashes($_POST["marka"]),addslashes($_POST["model"]),addslashes($_POST["rik"]));
		$DB_object->update_vehicle($_POST["id"],$rows,$values);
		$message="Vehicle updated";
	}
	else{
		$rows="marka,model,rik";
		$marka=addslashes($_POST["marka"]);
		$model=addslashes($_POST["model"]);
		$rik=addslashes($_POST["rik"]);
		$values="'$marka','$model','$rik'";
		$DB_object->add_vehicle($rows,$values);
		$message="Vehicle added";
	}
	include_once('templates/confirm_page.html');
	exit();
}
else{
header ('Location: index.php');
}
?>