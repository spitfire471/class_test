<?php
$name=$_POST["name"];
$pass=md5($_POST["pass"]);
include 'DB.php';
$table="users";
$column="name";
$DB_object=new DB();
$user=$DB_object->select_data($table,$column,$name);
if ($name==$user["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $user;
}
else{
	$rows="name,pass";
	$values="'$name','$pass'";
	$DB_object2=$DB_object->add_data($table,$rows,$values);
	echo "User ".$name." succsesfuly aded";
}
echo '<center><a href="auth.php">Authorizatoin page</a></center>';
?>