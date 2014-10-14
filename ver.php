<?php
namespace Database;
include '\Database\user.php';
$name=$_POST["name"];
$pass=md5($_POST["pass"]);
//$table="users";
$DB_object=new Users();
$user=$DB_object->get_user('name',$name);
if ($name==$user["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $user;
}
else{
	$DB_object2=$DB_object->add_user('name,pass',"'$name','$pass'");
	echo "User ".$name." succsesfuly aded";
}
echo '<center><a href="auth.php">Authorizatoin page</a></center>';
?>