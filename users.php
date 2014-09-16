<html>
<body>
<?php
include 'DB.php';
$DB_object= new DB();
$users=$DB_object->select_all_data("users");	
$c=count($users);
?>
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
</body>
</html>
