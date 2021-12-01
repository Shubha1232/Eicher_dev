<?php
include_once("classes/Database.php");
$crud = new Database();
$user_id = $_SESSION['user_id'];
if(isset($_POST['notifications']) && $_POST['notifications'] != ''){
	$data = array(
		'message' => $_POST['notifications'],
		'user_id' => $user_id,
		'date' => time()
	);
	$result = $crud->insert('logout_notifications',$data);
	$qs = 'SELECT id,notifications FROM users';
	$rs = $crud->getAllData($qs);
	foreach ($rs as $key => $value) {
		$where = 'id='.$value['id'];
		$data = array(
			'notifications' => $value['notifications']+1
		);
		$crud->update('users',$data,$where); 
	}
	session_destroy();
	header('Location:index');
}
else{

session_destroy();
header('Location:index');
}
?>