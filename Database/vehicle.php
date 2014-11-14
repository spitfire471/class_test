<?php
namespace Database;
include_once ('Abstract.php');
class Vehicle extends DB{
const table_name="vehicle_info";

function get_vehicles(){
$vehicles=$this->select_all_data(self::table_name);
return $vehicles;
}
function get_vehicle($column,$value){
$vehicle=$this->select_data(self::table_name,$column,$value);
return $vehicle;
}
function delete_vehicle($id){
$vehicle=$this->delete_data(self::table_name,$id);
}
function add_vehicle($rows,$values){
$vehicle=$this->add_data(self::table_name,$rows,$values);
}
function update_vehicle($id,$rows,$values){
$vehicle=$this->update_data($id,self::table_name,$rows,$values);
}

}
?>