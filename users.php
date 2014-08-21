<html>
<body>
<?php
include 'classes.php';
$array=$a->select_users_method();	
$c=count($array);
?>
<table border=1>
<tr>
<th>ID</th>
<th>Name</th>
<th></th>
<th></th>
</tr>
<?php
	for ($x=0;$x<$c;$x++){
		for ($y=0; $y<2;$y++){
?>
<td><?php echo ($array[$x][$y]); ?></td>
<?php
}
if ($array[$x][3]==1 ){
$link="Delete rights";
}
if ($array[$x][3]==0 ){
$link="Add rights";
}
?>
<td><a href="permission.php?id=<?php echo ($array[$x][0]) ?>"><?php echo $link; ?></a></td>
<td><a href="delete_user.php?id=<?php echo ($array[$x][0]);?>">delete</a></td>
</tr>
<?php
}
?>
</table>	
</body>
</html>
