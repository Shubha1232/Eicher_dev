<?php

include_once("classes/Database.php");

$crud = new Database();

$furnace_no = $_POST['furnace_no'];
$query = "SELECT oil_grade FROM furnace WHERE furnace_no='$furnace_no'";
$result = $crud->getSingleRow($query);

if($result){

	echo json_encode(array('status' => 1, 'data'=> $result));

}

else{

	echo json_encode(array('status' => 0, 'data' =>''));

}


