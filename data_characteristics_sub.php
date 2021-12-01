<?php
include_once("classes/Database.php");
$crud = new Database();
$part_no = $_POST['part_no'];
$furnace_name = $_POST['furnace_name'];
$steel_code = $_POST['steel_code'];
$from = $_POST['from'];
$to = $_POST['to'];
$query = '';


   $query = "SELECT metallurgical_test_case_depth_pcd_observation,metallurgical_test_core_hardness_rcd_observation,batch_code,core_hardness_value1 FROM `control_plan` WHERE id != ''";
   $where = '';
   if($from != ''){
      $where.=" AND `current_date` BETWEEN '$from'";
   }
   if($to != ''){
      $where.=" AND '$to'";
   }
   if($part_no != ''){
      $where.=" AND `part_no` = '$part_no'";
   }
   // if($mill_tc_supplier != ''){
   // 	$where.=" AND `mill_tc_supplier = '$mill_tc_supplier'";
   // }
   // if($report_no != ''){
   // 	$where.=" AND part_no = '$report_no'";
   // }
   if($furnace_name != ''){
   	$where.=" AND `furnace_no` = '$furnace_name'";
   }
   if($steel_code != ''){
      $where.=" AND `steel_code` ='$steel_code'";
   }
   
   $query = $query.$where;
   



$rs = $crud->getAllData($query);
if($rs){
   // print_r($rs); die;
echo json_encode(array('status' => 1, 'data' => $rs));
}
else{
echo json_encode(array('status' => 0));

  }
