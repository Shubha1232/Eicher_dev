<?php

include_once("classes/Database.php");

$crud = new Database();

$part_no = $_POST["part_no"];

	

	$query = "SELECT part_weight FROM forging_drawing WHERE part_no='$part_no'";

	

	$rs = $crud->getSingleRow($query);

	

   if($rs){

		echo json_encode(array('status' => 1, 'data' => $rs,'query'=>$query));

	}

	else{

		echo json_encode(array('status' => 0, 'data' => '','query'=>$query));



	}

	

