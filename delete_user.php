<?php
namespace Database;
include '\Database\user.php';
$del=new Users();
$del->delete_user($_GET["id"]);
echo "user deleted";
echo "</br>";
echo '<center><a href="users.php">User administration</a></center>';

?>