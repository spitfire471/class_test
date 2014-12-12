<?php
namespace Database;
include_once ('Abstract.php');
class Comments extends DB{
const table_name="comment";

function get_comments(){
$comments=$this->select_list(self::table_name);
return $comments;
}
function get_few_comments($column,$value){
$comments=$this->select_list(self::table_name,$column,$value);
return $comments;
}
function add_comment($rows,$values){
$comment=$this->add_data(self::table_name,$rows,$values);
}

}
?>