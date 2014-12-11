<?php
define ('ADMIN_PERMISSION_ALLOWED', 1);
include_once('Database/user.php');
include_once('Database/vehicle.php');
include_once('Database/comments.php');
session_start();
$id=$_GET["id"];
$DB_object= new Database\Vehicle();
$vehicle=$DB_object->get_vehicle('id',$id);	
$page_id="vehicle_".$id;
echo "</br>";
while (list($key, $val) = each($vehicle)) {
    echo "$key : $val\n";
	echo "</br>";
}
$DB_object2= new Database\Comments();
$comments=$DB_object2->get_few_comments('page_id',$page_id);	
$count_comments=count($comments);
$name=htmlentities($_SESSION["name"]);
include_once('templates/vehicle_info.html');
?>
