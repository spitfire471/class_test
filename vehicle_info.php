<?php
define ('ADMIN_PERMISSION_ALLOWED', 1);
include_once('Database/user.php');
include_once('Database/vehicle.php');
include_once('Database/comments.php');
session_start();
$name="";
if (isset($_SESSION["name"])){
$name=htmlentities($_SESSION["name"]);
}

$DB_object= new Database\Users();
$users=$DB_object->get_user('name',$name);
$id=$_GET["id"];
$DB_object= new Database\Vehicle();
$vehicle=$DB_object->get_vehicle('id',$id);	
if (isset ($vehicle["id"])){
var_dump ($vehicle);
$page_id="vehicle_".$id;
echo "</br>";
while (list($key, $val) = each($vehicle)) {
    echo "$key : $val\n";
	echo "</br>";
}
$DB_object2= new Database\Comments();
$comments=$DB_object2->get_few_comments('page_id',$page_id);	
$count_comments=count($comments);

include_once('templates/vehicle_info.html');
}
else {
echo "Something wrong";
echo $vehicle;
}
?>
