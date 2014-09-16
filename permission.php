<?php
include 'DB.php';
$DB_object= new DB();
$DB_object->change_permission($_GET["id"]);
echo "permission changed";
?>