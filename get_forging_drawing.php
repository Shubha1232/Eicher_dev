<?php
include_once("classes/Database.php");
$crud = new Database();
$part_number = $_POST['part_number'];

$query = "SELECT forging_image FROM forging_drawing WHERE part_number='$part_number'";
$result = $crud->getSingleRow($query);
if($result){
	echo json_encode(array('status' => 1, 'data'=> $result));
}
else{
	echo json_encode(array('status' => 0, 'data' =>''));
}

