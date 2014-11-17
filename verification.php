<?php
session_start();
include_once('Database/user.php');
$capcha=addslashes($_POST["capcha"]);
$name=addslashes($_POST["name"]);
$pass=md5($_POST["pass"]);
$DB_object=new Database\Users();
$user=$DB_object->get_user('name',$name);

if ($capcha==$_SESSION["capcha"]){

	if ($name==!$user["name"]){
		$DB_object2=$DB_object->add_user('name,pass',"'$name','$pass'");
		echo"User ".htmlentities($name)." succsesfuly aded";
	}
	else {
		echo "Select other name. User with the same name already exist.";
	}
}
else {
	echo "Capcha input wrong";
}
echo '<center><a href="index.php">Authorizatoin page</a></center>';
?>