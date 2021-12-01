 <?php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'classes/PHPMailer/src/Exception.php';
require 'classes/PHPMailer/src/PHPMailer.php';
require 'classes/PHPMailer/src/SMTP.php';
include_once("classes/Database.php");
$crud = new Database();
if (isset($_POST)) {
    $part_id = $_POST['id'];
    $query   = "SELECT * FROM new_part_number WHERE id='" . $part_id . "'";
    $rs      = $crud->getSingleRow($query);
	$query1   = "SELECT * FROM forging_drawing WHERE part_number='" . $_POST['part_no'] . "'";
    $rs1      = $crud->getSingleRow($query1);
     $q2 = "SELECT * FROM part_number_images_name WHERE part_no = ".$_POST['part_no'];
  $res2 = $crud->getSingleRow($q2);
    if ($rs) {
        if ($rs['id'] != $part_id) {
            $_SESSION['msg_session'] = 'Part number already exist';
            header('Location:new_edit_part?part_id=' . $part_id);
        } else {
            $control_plan_image_name = '';
        $customer_drawing_image_name = '';
        $part_image_name = '';
        $forging_drawing_image_name = '';
            $table = "new_part_number";
            
            $where = "id=$part_id";
            $f   = $_FILES['part_image']['name'];
            $er1 = implode(",", $_FILES['part_image']['name']);
            if ($er1) {
             $error1=array();
    $extension=array("pdf");
    foreach($_FILES["part_image"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["part_image"]["name"][$key];
                $file_tmp=$_FILES["part_image"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                        $filename=basename($file_name,$ext);
                        $file_name=time().".".$ext;
                        move_uploaded_file($_FILES["part_image"]["tmp_name"][$key],"img/test1/".$file_name);
					    array_push($error1,"$file_name,");
                        $control_plan_image_name .= $filename.',';

                }
                else
                {
                        $error1= $rs['part_image'];
                        

                }
            }
		 $error1 = implode("", $error1);
         $error1 = rtrim($error1,',');
            } else {
                $error1 = $rs['part_image'];
                $control_plan_image_name = $res2['control_plan_image_name'];
            }
            $file_name2 = '';
            
            
            $target_dir2 = 'img/part_image/';
            $file_name2  = ($_FILES['part_image2']['name']);
            $file2       = explode('.', $file_name2);
            if ($file_name2 == '') {
                $file_name2 = $rs['part_image2'];
                $customer_drawing_image_name = $res2['customer_drawing_image_name'];
                
            } else { 
                
                $file_name2 = time() . '.' . $file2[1];
                $customer_drawing_image_name = $file2[0];

            }
            $target_file2 = $target_dir2 . basename($file_name2);
            if (move_uploaded_file($_FILES["part_image2"]["tmp_name"], $target_file2)) {
                
                
            }
            $file_name3  = '';
            $target_dir3 = 'img/part_image/';
            $file_name3  = ($_FILES['part_image3']['name']);
            $file3       = explode('.', $file_name3);
            if ($file_name3 == '') {
                $file_name3 = $rs['part_image3'];
                $part_image_name = $res2['part_image_name'];

            } else {
                
                $file_name3 = time() . '.' . $file3[1];
                $part_image_name = $file3[0];
               

            }
            $target_file3 = $target_dir3 . basename($file_name3);
            if (move_uploaded_file($_FILES["part_image3"]["tmp_name"], $target_file3)) {
                
                
            }
            $eee   = $_FILES['forging_image']['name'];
            $ggg = implode(",", $_FILES['forging_image']['name']);
            if ($ggg) {
               $error=array();
    $extension=array("pdf");
    foreach($_FILES["forging_image"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name1=$_FILES["forging_image"]["name"][$key];
                $file_tmp=$_FILES["forging_image"]["tmp_name"][$key];
                $ext=pathinfo($file_name1,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                        $filename=basename($file_name1,$ext);
                        $file_name1=time().".".$ext;
                        move_uploaded_file($_FILES["forging_image"]["tmp_name"][$key],"img/test1/".$file_name1);
					    array_push($error,"$file_name1,");
                $forging_drawing_image_name .= $filename.',';

                }
                else
                {
                       $error = $rs1['forging_image'];
                

                }
            }
		 $error = implode("", $error);
		 $error = rtrim($error,',');
            } else {
				
                $error = $rs1['forging_image'];
                $forging_drawing_image_name = $res2['forging_drawing_image_name'];
            }
            $data = array(
                'part_no' => $_POST['part_no'],
                'customer_name' => $_POST['customer_name'],
                'part_image' => $error1,
                'part_image2' => $file_name2,
                'part_image3' => $file_name3,
                'user_id' => $_SESSION['user_id']
            );
            
            $crud->update($table, $data, $where);
            $data_forging   = array(
                
                'part_no' => $_POST['part_no'],
                'customer' => $_POST['customer_name'],
                'forging_image' => $error,
                'user_id' => $_SESSION['user_id']
            );
            $forging_id     = $_POST['forging_id'];
            $result_forging = '';
            if ($forging_id == 0) {
                $result_forging = $crud->insert('forging_drawing', $data_forging);
            } else {
                $crud->update('forging_drawing', $data_forging, 'id=' . $forging_id);
            }
            $images_name = array(
            'part_no' => $_POST['part_no'],
            'control_plan_image_name' => $control_plan_image_name,
            'customer_drawing_image_name' => $customer_drawing_image_name,
            'part_image_name' => $part_image_name,
            'forging_drawing_image_name' => $forging_drawing_image_name
        );
            $image_id = $res2['id'];
        $result_images_name = $crud->update('part_number_images_name',$images_name,'id=' . $image_id);
          
             $qs = 'SELECT `email` FROM email';
        $emails = $crud->getAllData($qs);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
                $mail->Subject = 'New Control plan';
                $mail->Body    = 'control plan updated for part NO '.$_POST['part_no'].'  by '.$_SESSION['user_name'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }

            $_SESSION['msg_success'] = 'Record Update Successfully';
            header('Location:new_part_list.php');
        }
    }
} else {
    header('Location:new_edit_part.php');
}
?> 