<?php
include_once("classes/Database.php");
$crud = new Database();
$part_number = $_POST['part_number'];

$query = "SELECT jominy_value FROM jominy_master_list WHERE part_no='$part_number'";
$result = $crud->getSingleRow($query);
if($result){
	echo json_encode(array('status' => 1, 'data'=> $result));
}
else{
	echo json_encode(array('status' => 0, 'data' =>''));
}

