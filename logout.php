<?php
session_start();
unset($_SESSION["name"],$_SESSION["pass"],$_SESSION["id"]);
session_destroy();
header ('Location: index.php');

?>