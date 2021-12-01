<?php
session_start();
include_once("classes/Database.php");
$crud = new Database();

if(isset($_POST)){
	
	$old_password = md5($crud->escape_string($_POST['old_password']));
	$new_password = md5($crud->escape_string($_POST['new_password']));
	$confirm_password = md5($crud->escape_string($_POST['confirm_password']));
    
	   $id = $_SESSION['user_id']; 
	
	if($new_password!=$confirm_password){  /* checking New and confirm password */
		
		$_SESSION['msg_session'] = 'New and Confirm Password Not Match';
		header('Location:change_password');
		exit();
		
	}
	
	
	
	
    $query = "select * from users where password = '$old_password' and user_status = 1 and id = '$id'"; /* checking old password */
	$result = $crud->getSingleRow($query);
	
	if(!empty($result)){
		
		
		$table = "users";
        $where = "id=$id";
        $data = array(
           'password'=> $confirm_password,
		   
 
 
 );
 $crud->update($table,$data,$where);
		
		$_SESSION['msg_success'] = 'Your password has been successfully Changed.';
		header('Location:change_password');
		
	} 
	else {
		$_SESSION['msg_session'] = 'Old Password Not Match';
		header('Location:change_password');
	
		
	}
	
}


?>