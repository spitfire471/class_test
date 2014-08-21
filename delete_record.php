<?php
include 'classes.php';
$table="data";
$del=new DB();
$del->delete_record_method($table,$_GET["id"]);
echo "Record deleted";
?>