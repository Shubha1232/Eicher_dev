<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$data = array(
		'name' => $_POST['name'],
		'parent_id' => $_POST['parent_id']
	);
	$result = $crud->insert('part_category',$data);
	if($result){
		if($_POST['parent_id'] == 0){
		$_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:part_category');
		}
	    else{
			$_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:part_subcategory_list');
		}
	}
	else{
		$_SESSION['msg_session'] = 'Server Error';
		header('Location:add_part_category');
	}
}