<?php
session_start();
include_once('Database/user.php');
include_once('Database/authentification.php');
$DB_object=new Database\Users();
$DB_object2=new Database\Authentification();
$hash_check=$DB_object2->get_user_activation('hash',$_GET["checksum"]);
var_dump($hash_check);
if (isset ($hash_check)){
$rows=array("activated");
$values=array("1");
$id=$hash_check["id"];
$add_activated=$DB_object->update_user($id,$rows,$values);
}

echo "profile activated";
echo "</br>";
echo '<center><a href="index.php">Authorizatoin page</a></center>';
?>