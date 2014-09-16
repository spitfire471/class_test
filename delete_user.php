<?php
include 'DB.php';
$table="users";
$del=new DB();
$del->delete_record($table,$_GET["id"]);
echo "user deleted";

?>