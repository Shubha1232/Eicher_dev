<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
 
    $data = [
      "name" => $_POST['unit_name'],
    ];
    $name = $data['name'];
    $query = "SELECT name FROM unit where name = '$name'";
    $result = $crud->getSingleRow($query);
    if($result){
    	$_SESSION['msg_session'] = 'Unit Already exists';
    	header('Location:add_unit');
    }
    else{
	    $result = $crud->insert('unit',$data);
	    if($result){
	       $_SESSION['msg_success'] = 'Unit Added Successfully';
	       header('Location:add_unit');
	    }
	    else{
            $_SESSION['msg_session'] = 'Server Error';
    			header('Location:add_unit');
	    }
	}
}
else
{
	header('Location:add_unit');
}
?>