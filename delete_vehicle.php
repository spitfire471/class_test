<?php
namespace Database;
include '\Database\Abstract.php';
$table="vehicle_info";
$del=new DB();
$del->delete_data($table,$_GET["id"]);
echo "Vehicle deleted";
echo "</br>";
echo '<center><a href="index.php">Main page</a></center>';
?>