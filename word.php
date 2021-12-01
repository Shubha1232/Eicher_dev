<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
$data = $_POST['data'];
$report_no = $_POST['report_no'];
$customer = $_POST['customer'];
$date = $_POST['date'];
$control_plan_id = $_POST['control_plan_id'];
$batch_code = $_POST['batch_code'];
$part_no = $_POST['part_no'];
$qty = $_POST['qty'];
$part_name = $_POST['part_name'];
$grade = $_POST['grade'];
$remark = $_POST['remark'];
$steel_mill = $_POST['steel_mill'];
$heat_no = $_POST['heat_no'];
$mill_tc = $_POST['mill_tc'];
$forger_tc = $_POST['forger_tc'];
$checked_by = $_POST['checked_by'];
$approved_by = $_POST['approved_by'];
$verified_by = $_POST['verified_by'];
$setData = [      "report_no" => $report_no,	  
      "customer" => $customer,
      "date" => $date,
      "control_plan_id" => $control_plan_id,
      "batch_code" => $batch_code,
      "part_no" => $part_no,
      "qty" => $qty,
      "part_name" => $part_name,
      "grade" => $grade,
      "remark" => $remark,
      'data' => $data,
      'report_id' => $_POST['report_id'],
      'steel_mill' => $steel_mill,
      'heat_no' => $heat_no,
      'mill_tc' => $mill_tc,
      'forger_tc' => $forger_tc,
      'checked_by' => $checked_by,
      'approved_by' => $approved_by,
	  'verified_by' => $verified_by
    ];
    $query = 'SELECT * FROM catepillar_report WHERE report_id ='.$_POST['report_id'];
    $rs = $crud->getSingleRow($query);
    $result;	
	$query1 = 'SELECT * FROM control_plan WHERE id ='.$_POST['report_id'];    
	$rs1 = $crud->getSingleRow($query1);    
	$result1;	
	$setData1=["status"=> 1,
			   "verified_by"=> $verified_by
	];	
	$where1 = 'id='.$rs1['id'];      
	$result1 = $crud->update('control_plan',$setData1,$where1);      
	$result1 = $rs1['id'];
    if($rs){
      $where = 'id='.$rs['id'];
      $result = $crud->update('catepillar_report',$setData,$where);
      $result = $rs['id'];
    }
    else{
    	$result = $crud->insert('catepillar_report',$setData);
    }
    
   echo json_encode(array('status' => 1, 'data' => $result));
}
?>