<?php
include_once("classes/Database.php");
$crud = new Database();

if(isset($_POST)){
	
	$user_type = $_POST["user_type"];
	$user_type_id = $_POST["user_type_id"];
    
    $query = "select * from user_type where id='$user_type_id'";  /*fetching old type name*/
	$result = $crud->getSingleRow($query);
	$old_type_name = $result["type_name"];
	
	if($old_type_name!=$user_type){                              /*compare old and new type*/
		
		$query = "select * from user_type where type_name='$user_type'";
	    $result = $crud->getSingleRow($query);
		
		if(!empty($result)){                                     /*check new type repeat or not*/
			
			$_SESSION['msg_session'] = 'User Type is Already Exist!';
	        header('Location:edit_user_type?user_type_id='.$user_type_id);
			exit();
		}
		
	}
	
	$table = "user_type";
    $where = "id=$user_type_id";
     $data = array(
           'type_name'=> $user_type,
		   
 
 
 );
 $crud->update($table,$data,$where);
 
	$_SESSION['msg_success'] = 'Update Successfully';
	header('Location:user_type');
	
}

?>