<?php
include 'DB.php';
$DB_object=new DB();
if (isset($_POST["id"])){
$DB_object->update_data($_POST["id"],$_POST["marka"],$_POST["model"],$_POST["rik"]);
}
else{
$table="vehicle_info";
$rows="marka,model,rik";
$marka=$_POST["marka"];
$model=$_POST["model"];
$rik=$_POST["rik"];
$values="'$marka','$model','$rik'";
$DB_object->add_data($table,$rows,$values);
}
echo "all OK";
?>