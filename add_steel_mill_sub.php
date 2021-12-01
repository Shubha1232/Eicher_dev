<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$data = array(
		'name' => $_POST['name'],
		'registration_no' => $_POST['reg_no'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'address' => $_POST['address']
	);
	$result = $crud->insert('steel_mill',$data);
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:still_mill_list');
	
	
}