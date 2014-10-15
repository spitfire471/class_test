<?php
include_once ('Database/Abstract.php');
$table="vehicle_info";
$del=new Database\DB();
$del->delete_data($table,$_GET["id"]);
echo "Vehicle deleted";
echo "</br>";
echo '<center><a href="main.php">Main page</a></center>';
?>