<?php
session_start();
include ('Database/vehicle.php');
if ($_SESSION["autehtification_success"]){
	$DB_object=new Database\Vehicle();
	$link="index.php";
	$link_name="Main page";
	$del=new Database\Vehicle();
	if (isset($_POST["id"])){
		$rows=array("marka","model","rik");
		$values=array(addslashes($_POST["marka"]),addslashes($_POST["model"]),addslashes($_POST["rik"]));
		$DB_object->update_vehicle($_POST["id"],$rows,$values);
		$message="Vehicle updated";
	}
	else{
		$rows="marka,model,rik,color,registration_number,owner,owner_phone,owner_address,user";
		$user=$_SESSION["name"];
		$marka=addslashes($_POST["marka"]);
		$model=addslashes($_POST["model"]);
		$rik=addslashes($_POST["rik"]);
		$color=addslashes($_POST["color"]);
		$registration_number=addslashes($_POST["registration_number"]);
		$owner=addslashes($_POST["owner"]);
		$owner_phone=addslashes($_POST["owner_phone"]);
		$owner_address=addslashes($_POST["owner_address"]);
		$values="'$marka','$model','$rik','$color','$registration_number','$owner','$owner_phone','$owner_address','$user'";
		$ter=$DB_object->add_vehicle($rows,$values);
		$message="Vehicle added";
	}
	echo $ter;
	include_once('templates/confirm_page.html');
	exit();
}
else{
header ('Location: index.php');
}
?>