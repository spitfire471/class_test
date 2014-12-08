<?php
define ('ADMIN_PERMISSION_ALLOWED', 1);
include_once('Database/user.php');
include_once('Database/vehicle.php');
include_once('Database/authentification.php');
include_once('Database/comments.php');
session_start();
$_SESSION["autehtification_success"]='0';
if (isset($_POST["name"])){	
	$DB_object= new Database\Authentification();
	$DB_object->start_session();
}

$DB_object= new Database\Authentification();
$user=$DB_object->user_verification();	

$DB_object= new Database\Vehicle();
$vehicle=$DB_object->get_vehicles();	
$count_vehicle=count($vehicle);


$DB_object2= new Database\Comments();
$comments=$DB_object2->get_few_comments('page_id',"index");	
$count_comments=count($comments);


header('Content-Type: text/html; charset=utf-8');

include_once('templates/index.html');

?>
