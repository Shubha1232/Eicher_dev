<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'classes/PHPMailer/src/Exception.php';
require 'classes/PHPMailer/src/PHPMailer.php';
require 'classes/PHPMailer/src/SMTP.php';
include_once("classes/Database.php");
$crud = new Database();
$user_id = $_POST["id"];
$qss = 'SELECT name FROM customer WHERE id='.$user_id;
 $rss = $crud->getSingleRow($qss);
$qs = 'SELECT `email` FROM email';
        $emails = $crud->getAllData($qs);
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
               // $mail->Mailer = "smtp";
                $mail->Port = 587;                                    // TCP port to connect to // 465
             $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

                //Recipients
                $mail->setFrom('info@link4.in', '');
                 foreach($emails as $key=>$value){
                   $mail->addAddress($value['email'], '');
                } 
                
                     // Add a recipient
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Customer Entery Deleted';
                $mail->Body    = 'Customer deleted with Customer name '.$rss['name'].'  by '.$_SESSION['user_name'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             
               $mail->send();
                //echo 'Message has been sent';
                  
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
				
$table="customer";
$id = "$user_id";
$crud->delete($id,$table);
// $_SESSION['msg_success'] = 'Record Deleted Successfully';

echo json_encode(array('status' => 1 , 'message' => 'Record Deleted Successfully'));

/* include_once("classes/Database.php");
$crud = new Database();
$user_id = $_POST["id"];
$table="customer";
$id = "$user_id";
$crud->delete($id,$table);
// $_SESSION['msg_success'] = 'Record Deleted Successfully';
echo json_encode(array('status' => 1 , 'message' => 'Record Deleted Successfully')); */

?>