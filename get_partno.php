<?php

include_once("classes/Database.php");

$crud = new Database();

$heat_no = $_POST["heat_no"];

$steelCode=$_POST["steel_code"];
	

	$query = "SELECT `id`,`part_no` FROM `steel_code` WHERE `heat_no`='$heat_no'  or steel_code='".$steelCode."'";

	

	$rs = $crud->getAllData($query);


   

   if($rs){

		echo json_encode(array('status' => 1, 'data' => $rs));

	}

	else{

		echo json_encode(array('status' => 0, 'data' => ''));



	}

	

