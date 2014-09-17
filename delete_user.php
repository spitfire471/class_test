<?php
include 'DB.php';
$del=new DB();
$del->delete_data('users',$_GET["id"]);
echo "user deleted";

?>