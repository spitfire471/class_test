<?php
include_once('Database/user.php');
$DB_object= new Database\Users();
$users=$DB_object->get_users();	
$c=count($users);
?>
<html>
<body>
<table border=1>
<tr>
<th>ID</th>
<th>Name</th>
<th></th>
<th></th>
</tr>
<?php

	for ($rowIndex=0;$rowIndex<$c;$rowIndex++){
		
?>
<td><?php echo ($users[$rowIndex]["id"]); ?></td>
<td><?php echo ($users[$rowIndex]["name"]); ?></td>
<?php
if ($users[$rowIndex]["permission"]==1 ){
	$link="Delete rights";
}

if ($users[$rowIndex]["permission"]==0 ){
	$link="Add rights";
}
?>
<td><a href="permission.php?id=<?php echo ($users[$rowIndex]["id"]) ?>"><?php echo $link; ?></a></td>
<td><a href="delete_user.php?id=<?php echo ($users[$rowIndex]["id"]);?>">delete</a></td>
</tr>
<?php
}
?>
</table>	
<?php

echo "</br>";
echo '<center><a href="main.php">Main page</a></center>';
?>
</body>
</html>
