<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	$min = $_POST["min"];
	$max = $_POST["max"];
	
	$minimum = implode(',' , $min);
	$maximum = implode(',' , $max);
	$hardness_test_min = implode(',',$_POST['hardness_test_min']);

	$hardness_test_max = implode(',',$_POST['hardness_test_max']);
	
	
	$data = array(
		
		'grade' => $_POST['grade'],
		'min' => $minimum,
		'max' => $maximum,
		'vecv_code' => $_POST['vecv_code'],
		'description' => $_POST['description'],
		'hardness_test_min' => $hardness_test_min,
		'hardness_test_max' => $hardness_test_max
		
	);
	$crud->update('grade',$data,'id='.$id);
    $_SESSION['msg_success'] = 'Record Update Successfully';
    header('Location:grade_list');
		
	
}