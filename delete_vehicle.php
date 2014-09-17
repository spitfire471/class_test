<?php
include 'DB.php';
$table="vehicle_info";
$del=new DB();
$del->delete_data('vehicle_info',$_GET["id"]);
echo "Vehicle deleted";
?>