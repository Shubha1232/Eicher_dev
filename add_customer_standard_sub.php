<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	
	$fi = $_FILES["file"]["name"];

	if($fi!="")
	{

$fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder

 $file_ext=explode('.',$fileName);
       
	  $var = $file_ext[1];
	 $mk = time(). ".". $var;
 
$moveResult = move_uploaded_file($fileTmpLoc, "img/customer/".$mk); 
	
	$data = array(
		'customer_id' => $_POST['customer'],
		'standard_no' => $_POST['standard_no'],
	     'file' => $mk
	);
	$result = $crud->insert('customer_standard',$data);
	if($result){
		
	    $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:customer_standard');
		
	}
	else{
		$_SESSION['msg_session'] = 'Server Error';
		header('Location:add_customer_standard');
	}
	}
	else {
		$data = array(
		'customer_id' => $_POST['customer'],
		'standard_no' => $_POST['standard_no'],
		'file' => $_FILES["file"]["name"]
	
	);
	$result = $crud->insert('customer_standard',$data);
	if($result){
		
	    $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:customer_standard');
		
	}
	else{
		$_SESSION['msg_session'] = 'Server Error';
		header('Location:add_customer_standard');
	}
		
	}
}