<?php
session_start();
include_once('Database/comments.php');
$DB_object=new Database\Comments();
$link="index.php";
$link_name="Main page";
$user = addslashes($_POST["name"]);
$page_id = $_POST["page_id"];
$comment_text = addslashes($_POST["comment_text"]);
if (strlen($_POST["name"]>"0")){
	$add_comment=$DB_object->add_comment('user,comment,page_id',"'$user','$comment_text','$page_id'");
	echo $add_comment;
	$message="Comment successfully added";
	include_once('templates/confirm_page.html');
	//exit();
}
else {
	
	$message="Name input wrong";
	include_once('templates/confirm_page.html');
	exit();
}

?>