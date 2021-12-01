<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	
	$min = $_POST["min"];
	$max = $_POST["max"];
	
	/*foreach($min as $min_item){	
		if($min_item){
			$main[] = $min_item;
		}
		
	}*/
	
    $minimum = implode("," ,$min);
 
	$maximum = implode("," , $max);
	
	$hardness_test_min = implode(',',$_POST['hardness_test_min']);
	$hardness_test_max = implode(',',$_POST['hardness_test_max']);
	
	$data = array(
		
		'grade' => $_POST['grade'],
		'min' => $minimum,
		'max' => $maximum,
		'vecv_code' => $_POST['vecv_code'],
		'description' => $_POST['description'],
		'hardness_test_max' => $hardness_test_max,
		'hardness_test_min' => $hardness_test_min,
		'user_id' => $_SESSION['user_id']
	);
	$result = $crud->insert('grade',$data);
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:grade_list');
	
	
}