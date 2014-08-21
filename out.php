<?php
session_start();
unset($_SESSION["name"],$_SESSION["pass"]);
setcookie("PHPSESSID", null, 1);
header ('Location: auth.php');
?>