<?php
include 'DB.php';
$DB_object=new DB();
if (isset($_POST["id"])){
$DB_object->update_data($_POST["id"],$_POST["marka"],$_POST["model"],$_POST["rik"]);
}
else{
$marka=$_POST["marka"];
$model=$_POST["model"];
$rik=$_POST["rik"];
$DB_object->add_data('vehicle_info','marka,model,rik',"'$marka','$model','$rik'");
}
echo "all OK";
?>