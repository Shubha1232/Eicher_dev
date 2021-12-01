<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	
	$id = $_POST["id"];

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
	$crud->update('customer_standard',$data,'id='.$id);

		
	    $_SESSION['msg_success'] = 'Record Update Successfully';
		header('Location:customer_standard');
		
	
	
	}
	else {
		$data = array(
		'customer_id' => $_POST['customer'],
		'standard_no' => $_POST['standard_no'],
		'file' => $_POST['old_file']
	
	);
      $crud->update('customer_standard',$data,'id='.$id);
	
		
	    $_SESSION['msg_success'] = 'Record Update Successfully';
		header('Location:customer_standard');
		
	
	
		
	}
}