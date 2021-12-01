<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	$data = array(
		'name' => $_POST['name'],
		'registration_no' => $_POST['reg_no'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'address' => $_POST['address']
		
	);
	$crud->update('steel_mill',$data,'id='.$id);
    $_SESSION['msg_success'] = 'Record Update Successfully';
    header('Location:still_mill_list');
		
	
}