<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	$data = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'mobile' => $_POST['mobile'],
		'address' => $_POST['address']
	);
	$crud->update('customer',$data,'id='.$id);
    $_SESSION['msg_success'] = 'Record Update Successfully';
    header('Location:customer_list');
		
	
}