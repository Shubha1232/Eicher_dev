<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
 
    $data = [
      "email" => $_POST['email_address'],
      "date" => time()
    ];
    $email = $data['email'];
    $query = "SELECT email FROM email where email = '$email'";
    $result = $crud->getSingleRow($query);
    if($result){
    	$_SESSION['msg_session'] = 'Email address Already exists';
    	header('Location:add_email');
    }
    else{
	    $result = $crud->insert('email',$data);
	    if($result){
	       $_SESSION['msg_success'] = 'Record Added Successfully';
	       header('Location:add_email');
	    }
	    else{
            $_SESSION['msg_session'] = 'Server Error';
    			header('Location:add_email');
	    }
	}
}
else
{
	header('Location:add_email');
}
?>