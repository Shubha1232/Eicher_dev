<?php
include_once("classes/Database.php");
$crud = new Database();
$id = $_POST["id"];
$table=$_POST['table'];
$query = 'UPDATE '.$table.' SET `record_status`=1 WHERE id='.$id;

$result = $crud->updateStatus($query);

// $_SESSION['msg_success'] = 'Record Deleted Successfully';
echo json_encode(array('status' => 1 , 'message' => 'Record Deleted Successfully'));

?>