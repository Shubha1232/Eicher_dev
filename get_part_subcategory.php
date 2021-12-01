<?php
 include_once("classes/Database.php");
 $crud = new Database();
$parent_id = $_POST['id'];
$query = "SELECT id,name FROM part_category WHERE parent_id= '$parent_id'";
$rs = $crud->getAllData($query);
echo json_encode(array('status' => 1, 'data' => $rs));

