<?php
session_start();
if ($_SESSION["id"]=='1'){
include_once('Database/user.php');
$DB_object= new Database\Users();
$users=$DB_object->get_users();	
$c=count($users);
include_once('templates/users.html');
}
else{
header ('Location: index.php');
}
?>
