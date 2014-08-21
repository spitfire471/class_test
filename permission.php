<?php
include 'classes.php';
$a= new DB();
$a->change_permission_method($_GET["id"]);
echo "permission changed";
?>