<?php

include_once("classes/Database.php");

$crud = new Database();

$grade = $_POST['grade'];



$query = "SELECT * FROM grade WHERE grade='$grade'";

$result = $crud->getSingleRow($query);

if($result){

	echo json_encode(array('status' => 1, 'data'=> $result));

}

else{

	echo json_encode(array('status' => 0, 'data' =>''));

}


