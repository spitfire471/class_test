<?php 
session_start();
if (isset ($_SESSION["message"])){
	echo $_SESSION["message"];
	$_SESSION["message"]='';
}
include_once('templates/index.html');
?>

