<?php
namespace Database;
?>
<html>
<title>main</title>
<body>

<?php
session_start();
include '\Database\Abstract.php';
header('Content-Type: text/html; charset=utf-8');
define ('ADMIN_PERMISSION_ALLOWED', 1);
if (isset($_POST["name"])){	
	$_SESSION["name"]=$_POST["name"];
	$_SESSION["pass"]=md5($_POST["pass"]);
	unset ($_POST["name"]);
	unset ($_POST["pass"]);
}
$name=$_SESSION["name"];
$table="users";
$column="name";
$DB_object= new DB();
$user=$DB_object->select_data('users','name',$name);
if ($_SESSION["name"]==$user["name"] && $_SESSION["pass"]==$user["pass"]){
	echo "hello user ".$_SESSION["name"];
	echo "</br>";
	echo "</br>";
	if ($user["permission"]==ADMIN_PERMISSION_ALLOWED){
		echo '<a href="users.php">Users administration</a>';
		echo "</br>";
		echo "</br>";
	}
	echo '<a href="add_record.php">Add record</a>';
	$vehicle=$DB_object->select_all_data("vehicle_info");	
	$c=count($vehicle);
?>
<table border=1>
<tr>
<th>Marka</th>
<th>Model</th>
<th>Rik</th>
<?php
if ($user["permission"]==ADMIN_PERMISSION_ALLOWED){
?>
<th></th>
<th></th>
<?php
}
?>
</tr>
<?php
	for ($rowIndex=0;$rowIndex<$c;$rowIndex++){
		
?>
<td><?php echo ($vehicle[$rowIndex]["marka"]); ?></td>
<td><?php echo ($vehicle[$rowIndex]["model"]); ?></td>
<td><?php echo ($vehicle[$rowIndex]["rik"]); ?></td>
<?php
if ($user["permission"]==ADMIN_PERMISSION_ALLOWED){
?>
<td><a href="add_record.php?id=<?php echo ($vehicle[$rowIndex]["id"]) ?>">edit</a></td>
<td><a href="delete_vehicle.php?id=<?php echo ($vehicle[$rowIndex]["id"]);?>">delete</a></td>
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
	echo '<center><a href="logout.php">Sign out</a></center>';

}
else{
	echo "Login or password incorect\n";
	echo '<center><a href="auth.php">Back to authorization</a></center>';
}
?>
</body>
</html>
