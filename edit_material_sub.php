<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	
	$data = array(
		'name' => $_POST['name'],
		'min_stock' => $_POST['min_stock'],
		'item_code' => $_POST['item_code'],
		'supplier_name' => $_POST['supplier_name'],
		'lead_time' => $_POST['lead_time'],
		'quantity' => $_POST['quantity'],
		'price' => $_POST['price']
	);
	$crud->update('material',$data,'id='.$id);
    $_SESSION['msg_success'] = 'Record Added Successfully';
    header('Location:material_listing');
		
	
}