<?php

include_once("classes/Database.php");

$crud = new Database();

if(isset($_POST)){

	$id = $_POST['id'];

	$data = array(

		'name' => $_POST['unit_name']	

	);

	$crud->update('unit',$data,'id='.$id);

    $_SESSION['msg_success'] = 'Record Update Successfully';

    header('Location:unit_list');

		

	

}