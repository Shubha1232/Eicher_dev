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


   $query = "SELECT id,report_no,heat_no,grade,weight,mill_tc_supplier,forger_tc_supplier,status FROM metallurgical_report WHERE id != ''";
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
   // if($report_no != ''){
   // 	$where.=" AND part_no = '$report_no'";
   // }
   if($material_grade != ''){
   	$where.=" AND grade = '$material_grade'";
   }
   if($heat_no != ''){
      $where.=" AND heat_no ='$heat_no'";
   }
   
   $query = $query.$where;
   
console.log($query);


$rs = $crud->getAllData($query);
if($rs){
   foreach ($rs as $key => $value) {
      $q1 = 'SELECT name FROM steel_mill WHERE id='.$value['mill_tc_supplier'];
      $rs1 = $crud->getSingleRow($q1);
      $rs[$key]['mill_tc_supplier'] = $rs1['name'];
      $q2= 'SELECT grade FROM grade WHERE id='.$value['grade'];
      $rs2 = $crud->getSingleRow($q2);
      $rs[$key]['grade'] = $rs2['grade'];
      $q3= 'SELECT name FROM forger_company WHERE id='.$value['forger_tc_supplier'];
      $rs3 = $crud->getSingleRow($q3);
      $rs[$key]['forger_tc_supplier'] = $rs3['name'];
      $q4 = "SELECT steel_code FROM steel_code WHERE heat_no='".$value['heat_no']."'  AND forger_tc_supplier=".$value['forger_tc_supplier']."";
      $rs4 = $crud->getSingleRow($q4);
      $rs[$key]['steel_code'] = $rs4['steel_code'];
      $q5 = "SELECT is_report_generated FROM metallurgical_report WHERE heat_no='".$value['heat_no']."'";
      $rs5 = $crud->getSingleRow($q5);
      $rs[$key]['is_report_generated'] = $rs5['is_report_generated'];
	  
	  $q6 = "SELECT date FROM metallurgical_report WHERE heat_no ='".$value['heat_no']."'";
      $rs6 = $crud->getSingleRow($q6);
      $rs[$key]['date'] = $rs6['date'];
   }

echo json_encode(array('status' => 1, 'data' => $rs));
}
else{
echo json_encode(array('status' => 0));

  }
