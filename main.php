<?php
define ('ADMIN_PERMISSION_ALLOWED', 1);

include_once('Database/user.php');
include_once('Database/vehicle.php');
session_start();

if (!isset($_SESSION["name"])) $_SESSION["name"] = '';

if (isset($_POST["name"])){	
	$_SESSION["name"]=$_POST["name"];
	$_SESSION["pass"]=md5($_POST["pass"]);
	unset ($_POST["name"]);
	unset ($_POST["pass"]);
}
$name=addslashes($_SESSION["name"]);
$table="users";
$column="name";
$DB_object= new Database\Users();
$user=$DB_object->get_user('name',$name);

$DB_object= new Database\Vehicle();
$vehicle=$DB_object->get_vehicles();	
$c=count($vehicle);
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<title>main</title>
<body>
<?php
if ($_SESSION["name"]==$user["name"] && $_SESSION["pass"]==$user["pass"]){
?>
	hello user <? echo htmlentities($_SESSION["name"]);?>;
	</br>
	</br>
<?php
	if ($user["permission"]==ADMIN_PERMISSION_ALLOWED) {
?>
		<a href="users.php">Users administration</a>
		</br>
		</br>
<?php
	}
?>
	<a href="add_record.php">Add record</a>
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
<td><?php echo (htmlentities($vehicle[$rowIndex]["marka"])); ?></td>
<td><?php echo (htmlentities($vehicle[$rowIndex]["model"])); ?></td>
<td><?php echo (htmlentities($vehicle[$rowIndex]["rik"])); ?></td>
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
</br>
<center><a href="logout.php">Sign out</a></center>
<?php
}
else{
?>
Login or password incorect
<center><a href="index.php">Back to authorization</a></center>
<?php
}
?>
</body>
</html>
