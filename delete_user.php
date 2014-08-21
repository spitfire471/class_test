<?php
include 'classes.php';
$table="users";
$del=new DB();
$del->delete_record_method($table,$_GET["id"]);
echo "user deleted";

?>