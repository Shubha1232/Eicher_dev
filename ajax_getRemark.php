<?php
include 'classes/Database.php';
$crud = new Database();
$id = $_POST['id'];
$query = "select * from `control_plan` where `id`='".$id."' ";
$result = $crud->getSingleRow($query);
if($result){
	echo $result['remark'];
	 }
?>