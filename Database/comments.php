<?php
namespace Database;
include_once ('Abstract.php');
class Comments extends DB{
const table_name="comment";

function get_comments(){
$comments=$this->select_all_data(self::table_name);
return $comments;
}
function get_few_comments($column,$value){
$comments=$this->select_few_data(self::table_name,$column,$value);
return $comments;
}
function add_comment($rows,$values){
$comment=$this->add_data(self::table_name,$rows,$values);
}

function get_comment($column,$value){
$comment=$this->select_data(self::table_name,$column,$value);
return $comment;
}

function delete_user($id){
$user=$this->delete_data(self::table_name,$id);
}

function update_user($id,$rows,$values){
$user=$this->update_data($id,self::table_name,$rows,$values);

}
}
?>