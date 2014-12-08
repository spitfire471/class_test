<?php
session_start();
include_once('Database/user.php');
include_once('Database/authentification.php');
$capcha=addslashes($_POST["capcha"]);

if ($capcha==$_SESSION["capcha"]){
	$name=addslashes($_POST["name"]);
	$email=addslashes($_POST["email"]);
	$pass=md5($_POST["pass"]);
	$DB_object=new Database\Users();
	$DB_object2=new Database\Authentification();
	$users=$DB_object->get_users();
	$user=$DB_object->get_user('name',$name);
	$mail_chek=$DB_object->get_user('email',$email);
	$hash=md5(microtime());	
	if (isset($users[0]["id"])){
		$permission=0;
	}
	else{
		$permission=1;
	}
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		if ($name==!$user["name"]){
			if ($email==!$mail_chek["email"]){
				$add_user=$DB_object->add_user('name,pass,email,permission',"'$name','$pass','$email','$permission'");
				$user=$DB_object->get_user('name',$name);
				$id=$user["id"];
				$add_user_verification=$DB_object2->add_user_activation('id,hash',"'$id','$hash'");
				$message = "to confirm registration click link\n http://localhost/2/mail_check.php?checksum=$hash \n";
				$message = wordwrap($message, 200);
				mail("spitfire.ukr@gmail.com", 'Registration', $message,'From: spitfire.ukr@gmail.com');
				echo "User ".htmlentities($name)." succsesfuly aded";
			}
			else {
				echo "This E-mail already registred";
			}
		}
		else {
			echo "Select other name. User with the same name already exist.";
		}
	}
	else {
		echo "E-mail format wrong";
	}
}
else {
	echo "Capcha input wrong";
}
echo '<center><a href="authorization.php">Authorizatoin page</a></center>';
?>