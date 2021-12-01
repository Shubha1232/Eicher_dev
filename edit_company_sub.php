<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	$data = array(
		'name' => $_POST['name'],
		'company_code' => $_POST['company_code'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'address' => $_POST['address'],
		'last_audit_date' => $_POST['last_audit_date'],
		'due_audit_date' => $_POST['due_audit_date'],
		'audit_person' => $_POST['audit_person']
		
	);
	$crud->update('forger_company',$data,'id='.$id);
    $_SESSION['msg_success'] = 'Record Update Successfully';
    header('Location:forger_company_list');
		
	
}