<?php

include_once("classes/Database.php");

$crud = new Database();

if(isset($_POST)){



	$data = array(

		'name' => $_POST['supplier'],

	);

	$result = $crud->insert('supplier',$data);

	

		 $_SESSION['msg_success'] = 'Record Added Successfully';

		header('Location:supplier_list');

	

	

}