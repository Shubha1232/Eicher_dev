<?php
include_once("classes/Database.php");
$crud = new Database();
$heat_no = $_POST["heat_no"];
	
	$query = "SELECT * FROM metallurgical_report WHERE heat_no='$heat_no'";
	
	$rs = $crud->getSingleRow($query);

	$q2 = "SELECT steel_code FROM steel_code WHERE heat_no='$heat_no'";
	$rs2 = $crud->getSingleRow($q2);
	$rs['steel_code'] = $rs2['steel_code'];

    $q3 = "SELECT balance_weight as weight FROM forging_clear WHERE heat_no='$heat_no' ORDER by id DESC limit 1";
    $rs3 = $crud->getSingleRow($q3);
    // print_r($rs3); die;
    if($rs3['weight'] != ''){
      $rs['weight'] = $rs3['weight'];
    }
   if($rs){
		echo json_encode(array('status' => 1, 'data' => $rs));
	}
	else{
		echo json_encode(array('status' => 0, 'data' => ''));

	}
	
