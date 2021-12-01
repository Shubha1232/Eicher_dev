<?php
include_once("classes/Database.php");
$crud = new Database();
$mill_tc_supplier = $_POST['mill_tc_supplier'];
$report_no = $_POST['report_no'];
$material_grade = $_POST['material_grade'];
$from = $_POST['from'];
$to = $_POST['to'];
$heat_no = $_POST['heat_no'];
$forger_tc_supplier = $_POST['forger_tc_supplier'];
$steel_code = $_POST['steel_code'];
if($steel_code != ''){
   $q = 'SELECT heat_no FROM steel_code WHERE steel_code="'.$steel_code.'"';
   $res = $crud->getSingleRow($q);
    if($res['heat_no']){
	   
   $heat_no = $res['heat_no'];
   }else{
	   echo json_encode(array('status' => 0));
	   exit();
   }
}
$query = '';


   $query = "SELECT part_no,heat_no,grade,hardness_test_min_spec,hardness_test_max_spec,hardness_test_milltc,hardness_test_forgertc,hardness_test_vec,hardness_test,hardness_test2,hardness_test_calculatedvalue,jominy_value1,jominy_value2,mill_tc_supplier FROM metallurgical_report WHERE id != ''";
   $where = '';
   if($from != ''){
      $where.=" AND date BETWEEN '$from'";
   }
   if($to != ''){
      $where.=" AND '$to'";
   }
   if($forger_tc_supplier != ''){
      $where.=" AND forger_tc_supplier = '$forger_tc_supplier'";
   }
   if($mill_tc_supplier != ''){
   	$where.=" AND mill_tc_supplier = '$mill_tc_supplier'";
   }
   if($material_grade != ''){
   	$where.=" AND grade = '$material_grade'";
   }
   if($heat_no != ''){
      $where.=" AND heat_no ='$heat_no'";
   }
   if($report_no != ''){
    	$where.=" AND part_no like '%$report_no%'";
   }
   
   $query = $query.$where;
   



$rs = $crud->getAllData($query);
if($rs){   foreach ($rs as $key => $value) {  
    $q1 = 'SELECT name FROM steel_mill WHERE id='.$value['mill_tc_supplier'];     
	$rs1 = $crud->getSingleRow($q1);	
	$rs[$key]['mill_tc_supplier'] = $rs1['name'];	 
	$q4 = "SELECT steel_code FROM steel_code WHERE heat_no='".$value['heat_no']."'";    
	$rs4 = $crud->getSingleRow($q4);    
  
  $rs[$key]['steel_code'] = $rs4['steel_code']; 
    $q2= 'SELECT grade FROM grade WHERE id='.$value['grade'];
    $rs2 = $crud->getSingleRow($q2);
    $rs[$key]['grade'] = $rs2['grade'];  }
   // print_r($rs); die;
echo json_encode(array('status' => 1, 'data' => $rs));
}
else{
echo json_encode(array('status' => 0));

  }
