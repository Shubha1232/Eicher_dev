<?php
include_once("classes/Database.php");
$crud = new Database();
$steel_code = $_POST["steel_code"];
$part_no = $_POST['part_no'];
	$query = "SELECT * FROM steel_code WHERE steel_code='$steel_code' AND part_no='$part_no'";
	
	$rs = $crud->getSingleRow($query);

   if($rs){
   	  $q1 = 'SELECT name FROM steel_mill WHERE id='.$rs['mill_tc_supplier'];
      $rs1 = $crud->getSingleRow($q1);
      $rs['mill_tc_supplier'] = $rs1['name'];
      $q2 = 'SELECT name FROM forger_company WHERE id='.$rs['forger_tc_supplier'];
      $rs2 = $crud->getSingleRow($q2);
      $rs['forger_tc_supplier'] = $rs2['name'];
		echo json_encode(array('status' => 1, 'data' => $rs));
	}
	else{
		echo json_encode(array('status' => 0, 'data' => ''));

	}