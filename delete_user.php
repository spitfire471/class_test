<?php
include 'DB.php';
$table="users";
$del=new DB();
$del->delete_data($table,$_GET["id"]);
echo "user deleted";

?>