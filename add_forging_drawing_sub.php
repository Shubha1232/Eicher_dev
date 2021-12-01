<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	 
	$target_dir1 = 'img/part_image/';
     $file_name1 = ($_FILES['forging_image']['name']);
     $file1 = explode('.',$file_name1);
     if($file_name1 == ''){
        $file_name1 = '';
     }
     else{
        
     $file_name1 = $file1[0].time().'.'.$file1[1];
     }
     $target_file1 = $target_dir1.basename($file_name1);
     if (move_uploaded_file($_FILES["forging_image"]["tmp_name"], $target_file1)) {
       
       
    }
	$data = array(
		
		'part_number' => $_POST['part_no'],
		'part_weight' => $_POST['part_weight'],
		'customer' => $_POST['customer'],
		'material_grade' => $_POST['material_grade'],
		'forging_image' => $file_name1,
		'user_id' => $_SESSION['user_id']
	);
	$result = $crud->insert('forging_drawing',$data);
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:forging_drawing');
	
	
}