<?php
session_start();
if ($_SESSION["id"]=='1'){
	include_once('Database/vehicle.php');
	if (isset($_GET["id"])){
		$DB_object=new Database\Vehicle();
		$vehicle=$DB_object->get_vehicle('id',$_GET["id"]);
		include_once('templates/add_vehicle.html');
	}
	else {
		include_once('templates/add_vehicle2.html');
	}

}
else{
header ('Location: index.php');
}
?>
