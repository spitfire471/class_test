<?php
include 'DB.php';
$table="vehicle_info";
$del=new DB();
$del->delete_record($table,$_GET["id"]);
echo "Vehicle deleted";
?>