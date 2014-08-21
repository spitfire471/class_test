<html>
<body>
<?php
include 'classes.php';
if (isset($_GET["id"])){
$a=new DB();
$row=$a->select_row_method($_GET["id"]);
?>
<form action="rec_conf.php" method="post">
<input type="hidden" name="id" value="<?php echo $row["id"];?>">
Marka: <input type="text" name="marka" value="<?php echo $row["marka"];?>" >
Model: <input type="text" name="model" value="<?php echo $row["model"];?>" >
Rik: <input type="text" name="rik" value="<?php echo $row["rik"];?>" >
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
