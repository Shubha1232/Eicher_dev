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

if (isset($_POST)) {
    $query = "SELECT * FROM `new_part_number` WHERE part_no='" . $_POST['part_no'] . "'";
    $rs    = $crud->getSingleRow($query);
    if ($rs) {
        $_SESSION['msg_session'] = 'Part number already exist';
        header('Location:new_add_part');
    } else {
        $error1    = array();
        $control_plan_image_name = '';
        $customer_drawing_image_name = '';
        $part_image_name = '';
        $forging_drawing_image_name = '';
        $extension = array(
            "pdf"
        );
        foreach ($_FILES["part_image"]["tmp_name"] as $key => $tmp_name) {
			//echo "hello";die;
             $file_name = $_FILES["part_image"]["name"][$key];
            $file_tmp  = $_FILES["part_image"]["tmp_name"][$key];
             $ext       = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                 $filename  = basename($file_name, $ext);
                $file_name = time() . "." . $ext;
                move_uploaded_file($_FILES["part_image"]["tmp_name"][$key], "img/test1/" . $file_name);
                array_push($error1, "$file_name,");
				
                $control_plan_image_name .= $filename.',';
				
				//echo "<pre>";print_r($control_plan_image_name);die;
            } else {
                $error1 = '';
            }
        }
        $error1     = implode("", $error1);
        $error1     = rtrim($error1, ',');
        $file_name2 = '';
        
        
        $target_dir2 = 'img/part_image/';
        $file_name2  = ($_FILES['part_image2']['name']);
        $file2       = explode('.', $file_name2);
        if ($file_name2 == '') {
            $file_name2 = '';
        } else {
            
            $file_name2 = time() . '.' . $file2[1];
            $customer_drawing_image_name = $file2[0].',';
        }
        $target_file2 = $target_dir2 . basename($file_name2);
        if (move_uploaded_file($_FILES["part_image2"]["tmp_name"], $target_file2)) {
            
            
        }
        $file_name3  = '';
        $target_dir3 = 'img/part_image/';
        $file_name3  = ($_FILES['part_image3']['name']);
        $file3       = explode('.', $file_name3);
        if ($file_name3 == '') {
            $file_name3 = '';
        } else {
            $file_name3 = time() . '.' . $file3[1];
            $part_image_name = $file3[0].',';
        }
        $target_file3 = $target_dir3 . basename($file_name3);
        if (move_uploaded_file($_FILES["part_image3"]["tmp_name"], $target_file3)) {
            
            
        }
        $file_name1  = '';
        $target_dir1 = 'img/part_image/';
        $error       = array();
        $extension   = array(
            "pdf"
        );
        foreach ($_FILES["forging_image"]["tmp_name"] as $key => $tmp_name) {
            $file_name1 = $_FILES["forging_image"]["name"][$key];
            $file_tmp   = $_FILES["forging_image"]["tmp_name"][$key];
            $ext        = pathinfo($file_name1, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                $filename   = basename($file_name1, $ext);
                $file_name1 = time() . "." . $ext;
                move_uploaded_file($_FILES["forging_image"]["tmp_name"][$key], "img/test1/" . $file_name1);
                array_push($error, "$file_name1,");
                $forging_drawing_image_name .= $filename.',';
				
            } else {
                $error = '';
            }
        }
        $error          = implode("", $error);
        $error          = rtrim($error, ',');
        $data           = array(
            'part_no' => $_POST['part_no'],
            'customer_name' => $_POST['customer_name1'],
            'part_image' => $error1,
            'part_image2' => $file_name2,
            'part_image3' => $file_name3,
            'user_id' => $_SESSION['user_id']
        );
		
		//echo "<pre>";print_r($data);die;
        $result         = $crud->insert('new_part_number', $data);
		$new_query = "select max(id) as id from `part_number` ";
		$new_result = $crud->getSingleRow($new_query);
		//echo "<pre>";print_r($new_result);die;
        $data_forging   = array(
			'new_part_id'=>$result,
            'part_no' => $_POST['part_no'],
            'forging_image' => $error,
            'user_id' => $_SESSION['user_id']
        );
        $result_forging = $crud->insert('forging_drawing', $data_forging);
        $images_name = array(
			'new_part_id'=>$result,
			'part_no' => $_POST['part_no'],
            'control_plan_image_name' => $control_plan_image_name,
            'customer_drawing_image_name' => $customer_drawing_image_name,
            'part_image_name' => $part_image_name,
            'forging_drawing_image_name' => $forging_drawing_image_name
        );
        $result_images_name = $crud->insert('part_number_images_name',$images_name);
        if ($result ) {

            $qs = 'SELECT `email` FROM email';
        $emails = $crud->getAllData($qs);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
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
                $mail->Subject = 'New Control plan';
                $mail->Body    = 'New control plan added for part NO '.$_POST['part_no'].'  by '.$_SESSION['user_name'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
            
            $_SESSION['msg_success'] = 'Record Added Successfully';
            header('Location:new_part_list.php');
        } else {
            $_SESSION['msg_session'] = 'Server Error';
            header('Location:new_add_part.php');
        }
    }
} else {
    header('Location:new_add_part.php');
}

?>