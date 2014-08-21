<?php
include 'classes.php';
if (isset($_POST["id"])){
$a=new DB();
$a->update_row_method($_POST["id"],$_POST["marka"],$_POST["model"],$_POST["rik"]);
}
else{
$a= new DB();
$a->add_record_method($_POST["marka"],$_POST["model"],$_POST["rik"]);
}
echo "all OK";
?>