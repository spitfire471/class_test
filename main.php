<?php
define ('ADMIN_PERMISSION_ALLOWED', 1);

include_once('Database/user.php');
include_once('Database/vehicle.php');
include_once('Database/authentification.php');
session_start();

if (isset($_POST["name"])){	
	$DB_object= new Database\Authentification();
	$DB_object->start_session();
}

$DB_object= new Database\Authentification();
$user=$DB_object->user_verification();	

$DB_object= new Database\Vehicle();
$vehicle=$DB_object->get_vehicles();	
$c=count($vehicle);
header('Content-Type: text/html; charset=utf-8');
if ($_SESSION["autehtification_success"]){
include_once('templates/main.html');
}
else{
header ('Location: index.php');
}
?>
