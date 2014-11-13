<?php
session_start();
if ($_SESSION["id"]=='1'){
include_once ('Database/user.php');
$del=new Database\Users();
$del->delete_user($_GET["id"]);
echo "user deleted";
echo "</br>";
echo '<center><a href="users.php">User administration</a></center>';
}
else{
header ('Location: index.php');
}
?>