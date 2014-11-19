<?php
namespace Database;

class DB{
public $dblocation_var = "127.0.0.1";
public $dbname_var = "web";
public $dbuser_var = "root";
public $dbpasswd_var = "slava";

function connect_DB(){
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
function select_all_data($table){
	self::connect_DB();
	$query = mysql_query("SELECT * FROM $table");
	while($data = mysql_fetch_assoc($query)){
		$result[] = $data;
	}
	return $result;
}
function select_data($table,$column,$value){
	self::connect_DB();
	$query=mysql_query("SELECT * FROM  $table WHERE $column='$value'");
	$data=mysql_fetch_assoc($query);
	return $data;
}
function delete_data($table,$id){
	self::connect_DB();
	$query=mysql_query(" DELETE FROM $table WHERE id='$id'");
}
function add_data($table,$rows,$values){
	self::connect_DB();
	$query=mysql_query("INSERT INTO $table ($rows) VALUES ($values)");
}

function update_data($id,$table,$rows,$values){
	self::connect_DB();
	$text="";
	$count_rows=count($rows);
	for ($rowindex=0;$rowindex<$count_rows;$rowindex++){
		$text=$text."$rows[$rowindex]='$values[$rowindex]',";
	}
	$string=substr($text,0,-1);
	$query=mysql_query("UPDATE  $table SET $string WHERE id='$id'");
	$error=mysql_error();
	return $string;
}

function change_permission($id){
self::connect_DB();
	$query1 = mysql_query("SELECT * FROM users WHERE id='$id'");
	$data = mysql_fetch_assoc($query1);
	if ($data["permission"]==1){
		$query2 = mysql_query("UPDATE users SET permission='0' WHERE id='$id'");
	}
	if ($data["permission"]==0){
		$query3 = mysql_query("UPDATE users SET permission='1' WHERE id='$id'");
	}
}
}
?>