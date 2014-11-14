<?php
session_start();
include_once('Database/vehicle.php');
if ($_SESSION["autehtification_success"]){
	if (isset($_GET["id"])){
		$DB_object=new Database\Vehicle();
		$vehicle=$DB_object->get_vehicle('id',$_GET["id"]);
		include_once('templates/add_vehicle.html');
		exit ();
	}
	else {
		include_once('templates/add_vehicle2.html');
		exit();
	}
}
else{
header ('Location: index.php');
}
?>
