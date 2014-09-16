<?php
include 'DB.php';
if (isset($_POST["id"])){
$DB_object=new DB();
$DB_object->update_data($_POST["id"],$_POST["marka"],$_POST["model"],$_POST["rik"]);
}
else{
$DB_object= new DB();
$DB_object->add_data($_POST["marka"],$_POST["model"],$_POST["rik"]);
}
echo "all OK";
?>