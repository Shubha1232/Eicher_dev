<?php

include_once("classes/Database.php");

$crud = new Database();



if(isset($_POST)){

	$email = $_POST['email'];

	

    

    $query = "select * from users where email = '$email' and user_status = 1"; /*Query for checking correct email or not */

	$result = $crud->getSingleRow($query);

	if(!empty($result)){

		

		

		

		$password = mt_rand(100000, 999999);

		$emailto=$result["email"]; 

         $id = $result['id'];                   /*Admin id*/

		 

		 

$subject="ewayits.com - Password Request";

$header = 'MIME-Version: 1.0'."\r\n";

$header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

$header.="From:info@link4.in"; 

$site_info = "link4.in/eicher";

 

 $message='<html><body>';

 $message.='Dear '.$result["full_name"].',';

 $message.="<br><br>";

 $message.='Your Password has been successfully changed. your new password is <b>'.$password.'</b>';

 $message.="<br>";

 $message.='If you have any questions or encounter any problems to login ,please contact to site administrator.';



 $message.="<br><br>";

 $message.='Thank you';

 $message.="<br>";

$message.='Team Eicher';

$message.='</html></body>';





mail($emailto, $subject, $message, $header);



$pass = md5($crud->escape_string($password));

 

 $table = "users";

 $where = "id=$id";

 $data = array(

           'password'=> $pass,

		   

 

 

 );

 $crud->update($table,$data,$where);

 

 

 $_SESSION['msg_success'] = '';
 
 echo json_encode(array('status' => 1 , 'message' => 'Your password has been successfully sent on your email'));

		

	}

	else{

		$_SESSION['msg_session'] = '';

 echo json_encode(array('status' => 0 , 'message' => 'Invalid Email Address'));

	}		

}





?>