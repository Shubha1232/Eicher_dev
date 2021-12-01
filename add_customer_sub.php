<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$data = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'mobile' => $_POST['mobile'],
		'address' => $_POST['address']
	);
	$result = $crud->insert('customer',$data);
	$_SESSION['msg_success'] = 'Record Added Successfully';
	header('Location:customer_list');	
}