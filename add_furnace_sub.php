<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$data = array(
	   'unit' => $_POST['unit'],
	   'furnace_no'=> $_POST['furnace_no'],
       'capacity' => $_POST['capacity'],
       'oil_grade' => $_POST['oil_grade'],
       'tank_capacity' => $_POST['tank_capacity'],
       'description' => $_POST['description']
	);
   $result = $crud->insert('furnace',$data);
   if($result){
    		 $_SESSION['msg_success'] = 'Record Added Successfully';
    		 header('Location:furnace_list');
    	}
    	else{
    		$_SESSION['msg_session'] = 'Internal Server Error';
    			header('Location:add_furnace');
    	}
         
	
}