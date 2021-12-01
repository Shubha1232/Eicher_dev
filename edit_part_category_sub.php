<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
$name = $_POST['name'];
$table = "part_category";
    $id = $_POST['id'];
    $where = "id=$id";
     $data = array(
		 'name' => $name
         );
      $crud->update($table,$data,$where);
	 $_SESSION['msg_success'] = 'Record Update Successfully';
	 header('Location:part_category.php');
}
