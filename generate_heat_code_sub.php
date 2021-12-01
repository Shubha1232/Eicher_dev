<?php
include_once("classes/Database.php");
$crud = new Database();
$forger_tc_supplier = $_POST['forger_tc_supplier'];
$mill_tc_supplier = $_POST['mill_tc_supplier'];
$part_no = $_POST['part_no'];
$material_grade = $_POST['material_grade'];
$heat_no = $_POST['heat_no'];
$from = $_POST['from'];
$to = $_POST['to'];
$query = '';


   $query = "SELECT * FROM `steel_code` WHERE id != ''";
   $where = '';
   if($from != ''){
      $where.=" AND `date` BETWEEN '$from'";
   }
   if($to != ''){
      $where.=" AND '$to'";
   }
   if($mill_tc_supplier != ''){
      $where.=" AND `mill_tc_supplier` = '$mill_tc_supplier'";
   }
   if($forger_tc_supplier != ''){
      $where.=" AND `forger_tc_supplier` = '$forger_tc_supplier'";
   }
   if($material_grade != ''){
      $where.=" AND `material_grade` = '$material_grade'";
   }
   if($heat_no != ''){
      $where.=" AND `heat_no` ='$heat_no'";
   }
   if($part_no != ''){
      $where.=" AND `part_no` LIKE '%$part_no%'";
   }
   
   $query = $query.$where;
   



$rs = $crud->getAllData($query);
foreach ($rs as $key => $value) {
   $q1 = 'SELECT name FROM steel_mill WHERE id='.$value['mill_tc_supplier'];
   $rs1 = $crud->getSingleRow($q1);
   $rs[$key]['mill_tc_supplier'] = $rs1['name'];
  $q2= 'SELECT grade FROM grade WHERE id='.$value['material_grade'];
      $rs2 = $crud->getSingleRow($q2);
      $rs[$key]['material_grade'] = $rs2['grade'];
      $q3= 'SELECT name FROM forger_company WHERE id='.$value['forger_tc_supplier'];
      $rs3 = $crud->getSingleRow($q3);
      $rs[$key]['forger_tc_supplier'] = $rs3['name'];	  	   $q4= 'SELECT * FROM metallurgical_report WHERE heat_no="'.$value['heat_no'].'"';      $rs4 = $crud->getSingleRow($q4);      $rs[$key]['link'] = $rs4['id'];
}

if($rs){
   // print_r($rs); die;
echo json_encode(array('status' => 1, 'data' => $rs));
}
else{
echo json_encode(array('status' => 0));

  }
