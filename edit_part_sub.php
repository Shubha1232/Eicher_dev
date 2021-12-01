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
    $query   = "SELECT * FROM part_number WHERE id='" . $part_id . "'";
    $rs      = $crud->getSingleRow($query);
	$query1   = "SELECT * FROM forging_drawing WHERE part_no='" . $rs['part_no'] . "'";
    $rs1      = $crud->getSingleRow($query1);
     $q2 = "SELECT * FROM part_number_images_name WHERE part_id = ".$part_id;
  $res2 = $crud->getSingleRow($q2);
    if ($rs) {
        if ($rs['id'] != $part_id) {
            $_SESSION['msg_session'] = 'Part number already exist';
            header('Location:edit_part?part_id=' . $part_id);
        } else {
            $control_plan_image_name = '';
        $customer_drawing_image_name = '';
        $part_image_name = '';
        $forging_drawing_image_name = '';
            $table = "part_number";
            
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
                'part_id' => $_POST['part_id'],
                'customer_name' => $_POST['customer_name'],
                'steel_grade' => $_POST['steel_grade'],
                'part_name' => $_POST['part_name'],
                'surface_hardness_1' => str_replace('"', ' ', $_POST['surface_hardness_1']),
                'surface_hardness_2' => str_replace('"', ' ', $_POST['surface_hardness_2']),
                'surface_hardness2_value' => str_replace('"', ' ', $_POST['surface_hardness2_value']),
                'surface_hardness_loc1' => str_replace('"', ' ', $_POST['surface_hardness_loc1']),
                
                'surface_hardness_loc2' => str_replace('"', ' ', $_POST['surface_hardness_loc2']),
                'surface_hardnessloc2_value' => str_replace('"', ' ', $_POST['surface_hardnessloc2_value']),
                
                
                
                
                'cut_off' => str_replace('"', ' ', $_POST['cut_off']),
                'cut_off_value' => str_replace('"', ' ', $_POST['cut_off_value']),
                
                
                
                'burn_test' => str_replace('"', ' ', $_POST['burn_test']),
                'shot_peeming' => str_replace('"', ' ', $_POST['shot_peeming']),
                'effective_case_depth_location' => str_replace('"', ' ', $_POST['effective_case_depth_location']),
                'effective_case_depth_requirement' => str_replace('"', ' ', $_POST['effective_case_depth_requirement']),
                'effective_case_depth_location2' => str_replace('"', ' ', $_POST['effective_case_depth_location2']),
                'effective_case_depth_requirement2' => str_replace('"', ' ', $_POST['effective_case_depth_requirement2']),
                
                'effective_case_depth_location3' => str_replace('"', ' ', $_POST['effective_case_depth_location3']),
                'effective_case_depth_requirement3' => str_replace('"', ' ', $_POST['effective_case_depth_requirement3']),
                
                'thread_hardness_location' => str_replace('"', ' ', $_POST['thread_hardness_location']),
                'thread_hardness_requirement' => str_replace('"', ' ', $_POST['thread_hardness_requirement']),
                
                
                
                'core_hardness_location' => str_replace('"', ' ', $_POST['core_hardness_location']),
                'core_hardness_requirement' => str_replace('"', ' ', $_POST['core_hardness_requirement']),
                'core_hardness_value' => str_replace('"', ' ', $_POST['core_hardness_value']),
                'core_hardness_location1' => str_replace('"', ' ', $_POST['core_hardness_location1']),
                'core_hardness_requirement1' => str_replace('"', ' ', $_POST['core_hardness_requirement1']),
                'core_hardness_value1' => str_replace('"', ' ', $_POST['core_hardness_value1']),
                'core_hardness_location2' => str_replace('"', ' ', $_POST['core_hardness_location2']),
                'core_hardness_requirement2' => str_replace('"', ' ', $_POST['core_hardness_requirement2']),
                'core_hardness_value2' => str_replace('"', ' ', $_POST['core_hardness_value2']),
                
                'micro_structure_location' => str_replace('"', ' ', $_POST['micro_structure_location']),
                'micro_structure_requirement' => str_replace('"', ' ', $_POST['micro_structure_requirement']),
                'micro_structure_location1' => str_replace('"', ' ', $_POST['micro_structure_location1']),
                'micro_structure_requirement1' => str_replace('"', ' ', $_POST['micro_structure_requirement1']),
                'grain_boundary_location' => str_replace('"', ' ', $_POST['grain_boundary_location']),
                'grain_boundary_requirement' => str_replace('"', ' ', $_POST['grain_boundary_requirement']),
                'grain_boundary_location1' => str_replace('"', ' ', $_POST['grain_boundary_location1']),
                'grain_boundary_requirement1' => str_replace('"', ' ', $_POST['grain_boundary_requirement1']),
                'surface_baimite_location' => str_replace('"', ' ', $_POST['surface_baimite_location']),
                'surface_baimite_requirement' => str_replace('"', ' ', $_POST['surface_baimite_requirement']),
                'surface_baimite_location1' => str_replace('"', ' ', $_POST['surface_baimite_location1']),
                'surface_baimite_requirement1' => str_replace('"', ' ', $_POST['surface_baimite_requirement1']),
                'sub_surface_baimite_location' => str_replace('"', ' ', $_POST['sub_surface_baimite_location']),
                'sub_surface_baimite_requirement' => str_replace('"', ' ', $_POST['sub_surface_baimite_requirement']),
                'sub_surface_baimite_location1' => str_replace('"', ' ', $_POST['sub_surface_baimite_location1']),
                'sub_surface_baimite_requirement1' => str_replace('"', ' ', $_POST['sub_surface_baimite_requirement1']),
                'after_grind_case_depth_location' => str_replace('"', ' ', $_POST['after_grind_case_depth_location']),
                'after_grind_case_depth_requirement' => str_replace('"', ' ', $_POST['after_grind_case_depth_requirement']),
                'after_grind_case_depth_location_2' => str_replace('"', ' ', $_POST['after_grind_case_depth_location_2']),
                'after_grind_case_depth_requirement_2' => str_replace('"', ' ', $_POST['after_grind_case_depth_requirement_2']),
                'surface_hardness_location' => str_replace('"', ' ', $_POST['surface_hardness_location']),
                'surface_hardness_requirement' => str_replace('"', ' ', $_POST['surface_hardness_requirement']),
                'burn_test_location' => str_replace('"', ' ', $_POST['burn_test_location']),
                'burn_test_requirement' => str_replace('"', ' ', $_POST['burn_test_requirement']),
                'shot_peeming_location' => str_replace('"', ' ', $_POST['shot_peeming_location']),
                'shot_peeming_requirement' => str_replace('"', ' ', $_POST['shot_peeming_requirement']),
                'surface_hardness_value_after_grind' => str_replace('"', ' ', $_POST['surface_hardness_value_after_grind']),
                'part_image' => $error1,
                'part_image2' => $file_name2,
                'part_image3' => $file_name3,
				'part_weight' => $_POST['part_weight'],
				'is_checked'=>$_POST['is_checked'],
                'user_id' => $_SESSION['user_id']
            );
          // echo "<pre>";print_r($data);die; 
            $crud->update($table, $data, $where);
            $data_forging   = array(
                
                'part_no' => $_POST['part_no'],
                'part_weight' => $_POST['part_weight'],
                'customer_name' => $_POST['customer_name'],
                'material_grade' => $_POST['steel_grade'],
                'forging_image' => $error,
                'user_id' => $_SESSION['user_id']
            );
			//echo "<pre>";print_r($data_forging);die; 
             $forging_id     = $_POST['forging_id'];
            $result_forging = '';
            if ($forging_id == 0) {
				//echo 'test';
                 $result_forging = $crud->insert('forging_drawing', $data_forging);
            } else {
                 $crud->update('forging_drawing', $data_forging, 'id=' . $forging_id);
            }

            $images_name = array(
            'part_id' => $part_id,
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
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
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
                $mail->Subject = 'New Control plan';
                $mail->Body    = 'control plan updated for part NO '.$_POST['part_no'].'  by '.$_SESSION['user_name'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
            } catch (Exception $e) {
               
               // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }

            $_SESSION['msg_success'] = 'Record Update Successfully';
            header('Location:part_list.php');
        }
    }
} else {
    header('Location:edit_part.php');
}
?>