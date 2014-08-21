<?php
class DB{
public $dblocation_var = "127.0.0.1";
public $dbname_var = "web";
public $dbuser_var = "root";
public $dbpasswd_var = "slava";

function connect_DB_method(){
	$con = mysql_connect($this->dblocation_var, $this->dbuser_var, $this->dbpasswd_var);
	if (!$con){
		echo "MySQL server not connected";
		exit();
	}
	$sel = mysql_select_db($this->dbname_var,$con);
	if (!$sel){
		echo "Database not reached";
		exit();
	}	
}
function select_user_DB_method($name){
	self::connect_DB_method();
	$query = mysql_query("SELECT * FROM users WHERE name='$name'");
	$row = mysql_fetch_assoc($query);	
	return $row;
}
function select_rows_method(){
	self::connect_DB_method();
	$query = mysql_query("SELECT * FROM data");
	$nn=0;
	while($row = mysql_fetch_assoc($query)){
		$array[$nn][0] = $row["id"];
		$array[$nn][1] = $row["marka"];
		$array[$nn][2] = $row["model"];
		$array[$nn][3] = $row["rik"];
		$nn++;
	}
	return $array;
}
function select_users_method(){
	self::connect_DB_method();
	$query = mysql_query("SELECT * FROM users");
	$nn=0;
	while($row = mysql_fetch_assoc($query)){
		$array[$nn][0] = $row["id"];
		$array[$nn][1] = $row["name"];
		$array[$nn][2] = $row["pass"];
		$array[$nn][3] = $row["permission"];
		$nn++;
	}
	return $array;
}
function add_record_method($marka,$model,$rik){
	self::connect_DB_method();
	$query = mysql_query(" INSERT INTO data (marka,model,rik) VALUES ('$marka','$model','$rik')");
}
function delete_record_method($table,$id){
	self::connect_DB_method();
	$query=mysql_query(" DELETE FROM $table WHERE id='$id'");
}
function select_row_method($id){
	self::connect_DB_method();
	$query=mysql_query("SELECT * FROM data WHERE id='$id'");
	$row=mysql_fetch_assoc($query);
	return $row;
}
function update_row_method($id,$marka,$model,$rik){
	self::connect_DB_method();
	$query=mysql_query("UPDATE data SET marka='$marka',model='$model',rik='$rik' WHERE id='$id'");
}
function change_permission_method($id){
self::connect_DB_method();
	$query1 = mysql_query("SELECT * FROM users WHERE id='$id'");
	$row = mysql_fetch_assoc($query1);
	if ($row["permission"]==1){
		$query2 = mysql_query("UPDATE users SET permission='0' WHERE id='$id'");
	}
	if ($row["permission"]==0){
		$query3 = mysql_query("UPDATE users SET permission='1' WHERE id='$id'");
	}
}
function add_user_method($name,$pass){
	self::connect_DB_method();
	$query=mysql_query("INSERT INTO users (name, pass) VALUES ('$name', '$pass')");
}
}
?>