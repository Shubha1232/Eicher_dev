<?php
include_once("classes/Database.php");
$crud = new Database();

if(isset($_POST)){
	
	$user_type = $_POST["user_type"];
	
	
	$query = "select * from user_type where type_name = '$user_type'"; /*check type repeat or not*/
	$result = $crud->getSingleRow($query);
	
	if(!empty($result)){
		
		$_SESSION['msg_session'] = 'Type Name is Already Exist!';
	    header('Location:add_user_type');
		exit();
		
		
	}
	else {
		$table="user_type";
		$data = array(
		
		 'type_name'=>$user_type,
		
		);
		
		$insert_id=$crud->insert($table,$data);    /*record added in user_type*/
		
		$table="user_access";
		$data = array(
		         
				 'user_type'=>$insert_id,
				 
		);
		$crud->insert($table,$data);              /*record added in user_access*/
		
		$_SESSION['msg_success'] = 'User Type Added Successfully!';
		header('Location:user_type');
                   		
	}
		
	}
	


?>