<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'classes/PHPMailer/src/Exception.php';
require 'classes/PHPMailer/src/PHPMailer.php';
require 'classes/PHPMailer/src/SMTP.php';
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	
	$fi = $_FILES["file"]["name"];
	
	if($fi!=""){
	
	 $fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder

 $file_ext=explode('.',$fileName);
       
	  $var = $file_ext[1];
	 $mk = time(). ".". $var;
 
$moveResult = move_uploaded_file($fileTmpLoc, "img/".$mk);


	$data = array(
		'grn_no' => $_POST['grn_no'],
		'part_no' => $_POST['part_no'],
		'quantity'=> $_POST['quantity'],
		'forging_quantity'=> $_POST['forging_quantity'],
		'forger_tc_supplier'=> $_POST['forger_tc_supplier'],
		'part_weight'=> $_POST['part_weight'],
		'date' => $_POST['date'],
		'mill_tc_supplier' => $_POST['mill_tc_supplier'],
		'material_grade'=> $_POST['grade'],
		'weight'=> $_POST['weight'],
		'steelcode'=> $_POST['steelcode'],
		'heat_no'=> $_POST['heat_no'],
		'balance_weight' => $_POST['balance_weight'],
		'requirement'=> $_POST['requirement'],
		'observation'=> $_POST['observation'],
		'micro_location' => $_POST['micro_location'],
		'micro_remark' => $_POST['micro_remark'],
		'microstructure'=> $_POST['microstructure'],
		'file'=> $mk,
		'remark'=> $_POST['remark'],
		'check_by'=> $_POST['checked_by'],
		'approve_by'=> $_POST['approved_by'],
		'user_id' => $_SESSION['user_id']
	);
	$result = $crud->insert('forging_clear',$data);
	    
	            if ($result && $_POST['balance_weight']<0) {

            $qs = 'SELECT `email` FROM email';
        $emails = $crud->getAllData($qs);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                //Server settings
                $mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.ewayits.com';  // Specify main and backup SMTP servers
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
                $mail->Subject = 'Forging Clear';
                $mail->Body    = 'Balance Weight for heat NO '.$_POST['heat_no'].'  is '.$_POST['balance_weight'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
        }
	    
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:update_forging_clear?id='.$result);
	
	}
else {
	
	$data = array(
		'grn_no' => $_POST['grn_no'],
		'part_no' => $_POST['part_no'],
		'quantity'=> $_POST['quantity'],
		'forging_quantity'=> $_POST['forging_quantity'],
		
		'forger_tc_supplier'=> $_POST['forger_tc_supplier'],
		'part_weight'=> $_POST['part_weight'],
		'date' => $_POST['date'],
		'mill_tc_supplier' => $_POST['mill_tc_supplier'],
		'material_grade'=> $_POST['grade'],
		'weight'=> $_POST['weight'],
		'steelcode'=> $_POST['steelcode'],
		'heat_no'=> $_POST['heat_no'],
		'balance_weight' => $_POST['balance_weight'],
		'requirement'=> $_POST['requirement'],
		'observation'=> $_POST['observation'],
		'micro_location' => $_POST['micro_location'],
		'micro_remark' => $_POST['micro_remark'],
		'microstructure'=> $_POST['microstructure'],
		'file'=> $mk,
		'remark'=> $_POST['remark'],
		'check_by'=> $_POST['checked_by'],
		'approve_by'=> $_POST['approved_by'],
		'user_id' => $_SESSION['user_id']
	);
	$result = $crud->insert('forging_clear',$data);
	            if ($result && $_POST['balance_weight']<0) {

            $qs = 'SELECT `email` FROM email';
        $emails = $crud->getAllData($qs);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                //Server settings
                $mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.ewayits.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'info@ewayits.com';                 // SMTP username
                $mail->Password = 'My@@shiv9044';                           // SMTP password
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
                $mail->setFrom('info@ewayits.com', '');
                foreach($emails as $key=>$value){
                    $mail->addAddress($value['email'], '');
                }
                     // Add a recipient
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Forging Clear';
                $mail->Body    = 'Balance Weight for heat NO '.$_POST['heat_no'].'  is '.$_POST['balance_weight'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
        }	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:update_forging_clear?id='.$result);
	
}	
}