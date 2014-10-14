<?php
namespace Database;
include 'Abstract.php';
class Users extends DB{
const table_name="users";

function get_users(){
$users=$this->select_all_data(self::table_name);
return $users;
}
function get_user($column,$value){
$user=$this->select_data(self::table_name,$column,$value);
return $user;
}
function delete_user($id){
$user=$this->delete_data(self::table_name,$id);
return $user;
}
function add_user($rows,$values){
$user=$this->add_data(self::table_name,$rows,$values);
return $user;
}

function update_user($id,$rows,$values){
$user=$this->update_data($id,self::table_name,$rows,$values);
}

}
$a= new Users();
$data=$a->get_user(3);
var_dump ($data);
?>