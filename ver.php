<?php
$name=$_POST["name"];
$pass=md5($_POST["pass"]);
include 'DB.php';
$table="users";
$DB_object=new DB();
$user=$DB_object->select_data($table,'name',$name);
if ($name==$user["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $user;
}
else{
	$DB_object2=$DB_object->add_data($table,'name,pass',"'$name','$pass'");
	echo "User ".$name." succsesfuly aded";
}
echo '<center><a href="auth.php">Authorizatoin page</a></center>';
?>