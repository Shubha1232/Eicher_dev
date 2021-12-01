<?php

include_once("classes/Database.php");

$crud = new Database();

if(isset($_POST)){

$data = $_POST['data'];

$customer = $_POST['customer'];

$report_no = $_POST['report_no'];

$date = $_POST['date'];

$batch_code = $_POST['batch_code'];

$part_no = $_POST['part_no'];

$control_plan_id = $_POST['control_plan_id'];

$qty = $_POST['qty'];

$part_name = $_POST['part_name'];

$grade = $_POST['grade'];

$remark = $_POST['remark'];

$heat_no = $_POST['heat_no'];

$checked_by = $_POST['checked_by'];

$approved_by = $_POST['approved_by'];

$verified_by = $_POST['verified_by'];

// requires php5
	define('UPLOAD_DIR', 'image/');
	$image_graph = $_POST['image_graph'];
	$image = str_replace('data:image/png;base64,', '', $image_graph);
	$image = str_replace(' ', '+', $image);
	$img_data = base64_decode($image);
	$name=uniqid() . '.png';
	$file = UPLOAD_DIR . $name;
	
	$success = file_put_contents($file, $img_data);
	//print_r($success);die;
	//print $success ? $file : 'Unable to save the file.';
	
$status =1;
$setData = array(

      "customer" => $customer,
	  
	  "report_no" => $report_no,

      "date" => $date,

      "batch_code" => $batch_code,

      "part_no" => $part_no,
	  
	  "control_plan_id" => $control_plan_id,

      "qty" => $qty,

      "part_name" => $part_name,

      "grade" => $grade,

      "remark" => $remark,

      'data' => $data,
	  
	  'heat_no' => $heat_no,

      'report_id' => $_POST['report_id'],
	  
	   'checked_by' => $checked_by,

      'approved_by' => $approved_by,
	  
	  'verified_by' => $verified_by,
	  
	   'image_graph' => $name,

    );

    $query = 'SELECT * FROM catepillar_report WHERE report_id ='.$_POST['report_id'];

    $rs = $crud->getSingleRow($query);

    $result;
	
	$query1 = 'SELECT * FROM control_plan WHERE id ='.$_POST['report_id'];

    $rs1 = $crud->getSingleRow($query1);

    $result1;
	$setData1=array("status"=> 1,
		"verified_by"=> $verified_by,
		);
	$where1 = 'id='.$rs1['id'];

      $result1 = $crud->update('control_plan',$setData1,$where1);

      $result1 = $rs1['id'];

    if($rs){
	 
	  $path='image/'.$rs['image_graph'];
	 // unlink($path);
      $where = 'id='.$rs['id'];

      $result = $crud->update('catepillar_report',$setData,$where);

      $result = $rs['id'];

    }

    else{

    	$result = $crud->insert('catepillar_report',$setData);
		//print_r($result);

    }

    

   echo json_encode(array('status' => 1, 'data' => $result));

}

?>