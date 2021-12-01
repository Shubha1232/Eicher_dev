<?php
include_once("classes/Database.php");
$crud = new Database();

if(isset($_POST)){
	$unit_id = '';
	if($_POST['unit_id']){
  $unit_id = implode(',', $_POST['unit_id']);
  $custom_field = implode(',',$_POST['custom_field']);
  	}
	$email_address = $_POST["email_address"];
	$full_name = $_POST["full_name"];
	$contact_no = $_POST["contact_no"];
	$user_type = $_POST["user_type"];
	$user_id = $_POST["user_id"];
	$password = $_POST["password1"];
	

    $query = "select * from users where id='$user_id'";  
	$result = $crud->getSingleRow($query);
	$old_email = $result["email"];

	if($old_email!=$email_address){                              
		$query = "select * from users where email='$email_address'";
	    $result = $crud->getSingleRow($query);

		if(!empty($result)){                                     

			$_SESSION['msg_session'] = 'Email Address is Already Exist!';
	        header('Location:edit_user?user_id='.$user_id);
			exit();
		}

	}

	$table = "users";
    $where = "id=$user_id";
     $data = array(

           'email'=> $email_address,
		   'full_name'=>$full_name,
		   'user_type'=>$user_type,
		   'contact_no'=>$contact_no,
		   "unit_id" => $unit_id,
		   "custom_field" => $custom_field

	);
	if($password!=''){
		$data['password'] = md5($password);
	}
	
 $crud->update($table,$data,$where);

	$_SESSION['msg_success'] = 'Record Update Successfully';
	header('Location:user_list');

}

?>