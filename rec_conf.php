<?php

include ('Database/Abstract.php');
$table_name="vehicle_info";
$DB_object=new Database\DB();
if (isset($_POST["id"])){
	$rows=array("marka","model","rik");
	$values=array($_POST["marka"],$_POST["model"],$_POST["rik"]);
	$DB_object->update_data($_POST["id"],$table_name,$rows,$values);
}
else{
	$rows="marka,model,rik";
	$marka=$_POST["marka"];
	$model=$_POST["model"];
	$rik=$_POST["rik"];
	$values="'$marka','$model','$rik'";
	$DB_object->add_data($table_name,$rows,$values);
}
echo "all OK";
echo "</br>";
echo '<center><a href="main.php">Main page</a></center>';
?>