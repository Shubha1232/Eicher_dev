<?php
include_once("classes/Database.php");
$crud = new Database();
$forger_tc_supplier = $_POST['generate_forger_tc_supplier'];

// $material_grade = $_POST['generate_material_grade'];
$heat_no = $_POST['generate_heat_no'];
$query = "SELECT part_no,accept,mill_tc_supplier,forger_tc_supplier,heat_no,grade,part_grade FROM `metallurgical_report` WHERE heat_no = '$heat_no'";

$rs = $crud->getAllData($query);
$response = array();
$req = "SELECT *  FROM steel_code WHERE heat_no='$heat_no'  AND forger_tc_supplier='$forger_tc_supplier'";
$rst = $crud->getSingleRow($req);
if($rst){
echo json_encode(array('status' => 0, 'data' => 'Steel Code Already Generated'));
}
else{
foreach ($rs as $key => $value) {
   $q1 = "SELECT max(code_value) as code_value FROM steel_code WHERE  forger_tc_supplier='$forger_tc_supplier'";
  
                  $rsone = $crud->getSingleRow($q1);
                  $number = $rsone['code_value']+1;
                  
   $part_no_array = explode('*',$value['part_no']);
   $accept_array = explode('*',$value['accept']);
   $part_grade_array = explode('*',$value['part_grade']);
   foreach ($part_no_array as $key1 => $value1) {
                if($value1 != '' && $accept_array[$key1] !='REJECTED'){
                  $q2 = "SELECT * FROM grade WHERE id='".$part_grade_array[$key1]."'";
                  $rs2 = $crud->getSingleRow($q2);
                  $q3 = "SELECT company_code FROM forger_company WHERE id=".$forger_tc_supplier;
                  $rs3 = $crud->getSingleRow($q3);
                  $code = $rs3['company_code'].''.$number.''.$rs2['vecv_code'];
                  $data = array(
                     'part_no' => $value1,
                     'steel_code' => $code,
                     'material_grade' => $rs2['id'],
                     'forger_tc_supplier' => $forger_tc_supplier,
                     'code_value' => $number,
                     'heat_no' => $heat_no,
                     'date' => date('Y-m-d'),
                     'mill_tc_supplier' => $value['mill_tc_supplier'],
                     'user_id' => $_SESSION['user_id']
                  );
                  $result = $crud->insert('steel_code',$data);
                  $response[$key1]['part_no'] = $value1;
                  $response[$key1]['steel_code'] = $code;
               }
         
   }
}

if($response){
   // print_r($rs); die;
	$up_data = array('is_report_generated' => 1);
	$where = "heat_no = '$heat_no'";
	$crud->update("metallurgical_report", $up_data, $where); 
	echo json_encode(array('status' => 1, 'data' => $response));
}
else{
echo json_encode(array('status' => 0,'data' => 'No Availaible Part No. For This Heat No.'));

  }
}
