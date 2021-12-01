<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'classes/PHPMailer/src/Exception.php';
require 'classes/PHPMailer/src/PHPMailer.php';
require 'classes/PHPMailer/src/SMTP.php';
include_once("classes/Database.php");
$crud = new Database();
  $id = $_POST["id"];
  $qs = 'SELECT steel_code FROM steel_code WHERE id='.$id;
  $rss = $crud->getSingleRow($qs);
 $qs = 'SELECT `email` FROM email ';
        $emails = $crud->getAllData($qs);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
                foreach($emails as $key=>$value){
                    $mail->addAddress($value['email'], '');
                }
                     // Add a recipient
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Delete Steel code';
                $mail->Body    = 'Steel code '.$rss['steel_code'].' is deleted by"'.$_SESSION['user_name'].'"';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
$table="steel_code";
 $res = $crud->delete($id,$table);
 $_SESSION['msg_success'] = 'Record Deleted Successfully';
 //header('Location:part_list.php');
echo json_encode(array('status' => 1 , 'msg_success' => 'Record Deleted Successfully'));

?>