<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'classes/PHPMailer/src/Exception.php';
require 'classes/PHPMailer/src/PHPMailer.php';
require 'classes/PHPMailer/src/SMTP.php';
include_once("classes/Database.php");

$crud = new Database();
if(isset($_POST)){
  $unit_id = '';
  if($_POST['unit_id']){
  $unit_id = implode(',', $_POST['unit_id']);
    }
    $custom_field = implode(',',$_POST['custom_field']);
   
    $data = [
      "email" => $_POST['email_address'],
      "password" => md5($_POST['password']),
      "full_name" => $_POST['full_name'],
      "contact_no" => $_POST['contact_no'],
      "user_type" => $_POST['user_type'],
      "user_status" => 1,
      "unit_id" => $unit_id,
      "custom_field" => $custom_field,
      "date" => time(),
      "notifications" => 0
    ];
   $email = $data['email'];
    $query = "SELECT email FROM users where email = '$email'";
    $result = $crud->getSingleRow($query);
    if($result){
    	$_SESSION['msg_session'] = 'Email address Already exists';
    	header('Location:add_user');
    }
    else{
	    $result = $crud->insert('users',$data);
	    if($result){
	    	 $_SESSION['msg_success'] = 'Record Added Successfully';
                $subject="ewayits.com - New User";
                //  $header = 'MIME-Version: 1.0'."\r\n";
                //  $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                //  $header.="From:info@ewayits.com"; 
                //  $site_info = "ewayits.com/eicher";
                //  $message='<html><body>';
                 $message.='Welcome '.$data["full_name"].',';
                 $message.="<br><br>";
                 $message.='Your login information with eicher';
                 $message.="<br><br>";
                 $message.='Your username is : '.$data['email'];
                 $message.="<br><br>";
                 $message.='Password is : '.$_POST['password'];
                 $message.='<br><br>';
                 $message.='<a class="btn btn-primary" href="http://link4.in/eicher" target="_blank">Login</a>';
                 $message.="<br><br>";
                 $message.='Thank you';
                 $message.="<br>";
                 $message.='Team Eicher';
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.link4.in';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'info@link4.in';                 // SMTP username
                $mail->Password = 'Ujjain@0734';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
             $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
                //Recipients
                $mail->setFrom('info@link4.in', '');
                $mail->addAddress($email, '');     // Add a recipient
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
                
	       header('Location:user_list');
	    }
	    else{
            $_SESSION['msg_session'] = 'Server Error';
    			header('Location:add_user');
	    }
	}
}
else
{
	header('Location:add_user');
}
?>