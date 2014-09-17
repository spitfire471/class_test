<?php
include 'DB.php';
$table="vehicle_info";
$del=new DB();
$del->delete_data($table,$_GET["id"]);
echo "Vehicle deleted";
?>