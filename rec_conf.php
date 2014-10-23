<?php

include ('Database/vehicle.php');
$DB_object=new Database\Vehicle();
if (isset($_POST["id"])){
	$rows=array("marka","model","rik");
	$values=array(addslashes($_POST["marka"]),addslashes($_POST["model"]),addslashes($_POST["rik"]));
	$DB_object->update_vehicle($_POST["id"],$rows,$values);
}
else{
	$rows="marka,model,rik";
	$marka=addslashes($_POST["marka"]);
	$model=addslashes($_POST["model"]);
	$rik=addslashes($_POST["rik"]);
	$values="'$marka','$model','$rik'";
	$DB_object->add_vehicle($rows,$values);
}
echo "all OK";
echo "</br>";
echo '<center><a href="main.php">Main page</a></center>';
?>