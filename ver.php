<?php
include_once('Database/user.php');
$name=addslashes($_POST["name"]);
$pass=md5($_POST["pass"]);
$DB_object=new Database\Users();
$user=$DB_object->get_user('name',$name);

if ($name==$user["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $user;
}
else{
	$DB_object2=$DB_object->add_user('name,pass',"'$name','$pass'");
	echo "User ".$name." succsesfuly aded";
}
echo '<center><a href="index.php">Authorizatoin page</a></center>';
?>