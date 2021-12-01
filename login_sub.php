<?php
include_once("classes/Database.php");
$crud = new Database();

if(isset($_POST)){
	$email = $_POST['email'];
	$password= $_POST['password'];
	$email = $crud->escape_string($email);
	$password = md5($crud->escape_string($password));
    
    $query = "select * from users where email = '$email' and password = '$password' and user_status = 1";
	$result = $crud->getSingleRow($query);
	if(empty($result)){
		$_SESSION['msg_session'] = 'Invalid username and password';
		header('Location:index');
	}
	else{
		$_SESSION['user_id'] = $result['id'];
		$_SESSION['user_name'] = $result['full_name'];
		$_SESSION['user_type'] = $result['user_type'];
		$_SESSION['unit_id'] = $result['unit_id'];
		
		 if($_SESSION['user_type'] == 21){
	 		header("Location:new_part_list.php");
	 }else{
		header('Location:dashboard?modal=1');
	 }
	}		
}
else{
	$_SESSION['msg_session'] = 'Invalid username and password';
	header('Location:index');
}

?>