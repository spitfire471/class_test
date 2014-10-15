<?php
include_once('Database/Abstract.php');
if (isset($_GET["id"])){
	$DB_object=new Database\DB();
	$vehicle=$DB_object->select_data('vehicle_info','id',$_GET["id"]);
?>
<html>
<body>

<form action="rec_conf.php" method="post">
<input type="hidden" name="id" value="<?php echo $vehicle["id"];?>">
Marka: <input type="text" name="marka" value="<?php echo $vehicle["marka"];?>" >
Model: <input type="text" name="model" value="<?php echo $vehicle["model"];?>" >
Rik: <input type="text" name="rik" value="<?php echo $vehicle["rik"];?>" >
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
