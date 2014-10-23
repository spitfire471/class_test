<?php
include_once('Database/vehicle.php');
if (isset($_GET["id"])){
	$DB_object=new Database\Vehicle();
	$vehicle=$DB_object->get_vehicle('id',$_GET["id"]);
?>
<html>
<body>

<form action="rec_conf.php" method="post">
<input type="hidden" name="id" value="<?php echo $vehicle["id"];?>">
Marka: <input type="text" name="marka" value="<?php echo (htmlentities($vehicle["marka"]));?>" >
Model: <input type="text" name="model" value="<?php echo (htmlentities($vehicle["model"]));?>" >
Rik: <input type="text" name="rik" value="<?php echo (htmlentities($vehicle["rik"]));?>" >
<input type="submit" value="Change record">
</form>
<?php
}
else {
?>
<form action="rec_conf.php" method="post">
Marka: <input type="text" name="marka" >
Model: <input type="text" name="model" >
Rik: <input type="text" name="rik" >
<input type="submit" value="Add record">
</form>
</br>
<?php
}
?>
</body>
</html>
