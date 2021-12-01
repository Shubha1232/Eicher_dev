<?php

include_once("classes/Database.php");

$crud = new Database();

$part_id = $_POST["id"];

$table="new_part_number";

$id = "$part_id";

$crud->delete($id,$table);

// $_SESSION['msg_success'] = 'Record Deleted Successfully';

echo json_encode(array('status' => 1 , 'message' => 'Record Deleted Successfully'));



?>