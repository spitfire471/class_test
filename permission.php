<?php
include_once ('Database/Abstract.php');
$DB_object= new Database\DB();
$DB_object->change_permission($_GET["id"]);
echo "permission changed";
echo "</br>";
echo '<center><a href="users.php">User administration</a></center>';
?>