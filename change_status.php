<?php
include_once("classes/Database.php");
$crud = new Database();
$where = 'id='.$_SESSION['user_id'];
$data = array(
	'notifications' => 0
);
$result = $crud->update('users',$data,$where);
echo $result;
