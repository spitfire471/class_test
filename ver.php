<?php
$name=$_POST["name"];
$pass=md5($_POST["pass"]);
include 'classes.php';
$a=new DB();
$row=$a->select_user_DB_method($name);
if ($name==$row["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $row;
}
else{
	$b=$a->add_user_method($name,$pass);
	echo "User ".$name." succsesfuly aded";
}
echo '<center><a href="auth.php">Authorizatoin page</a></center>';
?>