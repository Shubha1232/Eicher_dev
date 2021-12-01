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

}
header('Location:dashboard');
?>