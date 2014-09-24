<?php
namespace Database;
include 'Abstract.php';
class Users extends DB{
const table_name="users";
const table_column="id";

function get_users(){
$users=$this->select_all_data(self::table_name);
return $users;
}
function get_user($id){
$user=$this->select_data(self::table_name,self::table_column,$id);
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


}
$a= new Users();
$data=$a->get_user(2);
var_dump ($data);
?>