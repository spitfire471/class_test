<?php
session_start();
if ($_SESSION["id"]=='1'){
include_once ('Database/vehicle.php');
$del=new Database\Vehicle();
$del->delete_vehicle($_GET["id"]);
echo "Vehicle deleted";
echo "</br>";
echo '<center><a href="main.php">Main page</a></center>';
}
else{
header ('Location: index.php');
}
?>