<html>
<title>main</title>
<body>

<?php
session_start();
include 'classes.php';
header('Content-Type: text/html; charset=utf-8');

if (isset($_POST["name"])){	
	$_SESSION["name"]=$_POST["name"];
	$_SESSION["pass"]=md5($_POST["pass"]);
	unset ($_POST["name"]);
	unset ($_POST["pass"]);
}
$name=$_SESSION["name"];
$a= new DB();
$row=$a->select_user_DB_method($name);
if ($_SESSION["name"]==$row["name"] && $_SESSION["pass"]==$row["pass"]){
	echo "hello user ".$_SESSION["name"];
	echo "</br>";
	echo "</br>";
	if ($row["permission"]==1 ){
		echo '<a href="users.php">Users administration</a>';
		echo "</br>";
		echo "</br>";
	}
	echo '<a href="add_record.php">Add record</a>';
	$array=$a->select_rows_method();	
	$c=count($array);
?>
<table border=1>
<tr>
<th>Marka</th>
<th>Model</th>
<th>Rik</th>
<?php
if ($row["permission"]==1 ){
?>
<th></th>
<th></th>
<?php
}
?>
</tr>
<?php
	for ($x=0;$x<$c;$x++){
		for ($y=1; $y<4;$y++){
?>
<td><?php echo ($array[$x][$y]); ?></td>
<?php
}
if ($row["permission"]==1 ){
?>
<td><a href="add_record.php?id=<?php echo ($array[$x][0]) ?>">edit</a></td>
<td><a href="delete_record.php?id=<?php echo ($array[$x][0]);?>">delete</a></td>
<?php
}
?>
</tr>
<?php
}
?>
</table>	
<?php
	echo "</br>";
	echo '<center><a href="out.php">Sign out</a></center>';

}
else{
	echo "Login or password incorect\n";
	echo '<center><a href="auth.php">Back to authorization</a></center>';
}
?>
</body>
</html>
