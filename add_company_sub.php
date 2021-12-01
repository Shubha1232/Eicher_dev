<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$data = array(
		'name' => $_POST['name'],
		'company_code' => $_POST['company_code'],
		'email'=> $_POST['email'],
		'phone'=> $_POST['phone'],
		'address'=> $_POST['address']
	);
	$result = $crud->insert('forger_company',$data);
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:forger_company_list');
	
	
}