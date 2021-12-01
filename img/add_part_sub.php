<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
    $query = "SELECT * FROM part_number WHERE part_no='".$_POST['part_no']."'";
    $rs = $crud->getSingleRow($query);
    if($rs){
      $_SESSION['msg_session'] = 'Part number already exist';
        header('Location:add_part');
    }
    else{
$error1=array();    $extension=array("jpeg","jpg","png","gif");	    foreach($_FILES["part_image"]["tmp_name"] as $key=>$tmp_name)            {                $file_name=$_FILES["part_image"]["name"][$key];                $file_tmp=$_FILES["part_image"]["tmp_name"][$key];                $ext=pathinfo($file_name,PATHINFO_EXTENSION);                if(in_array($ext,$extension))                {                    if(!file_exists("img/test1/".$txtGalleryName."/".$file_name))                    {						$filename=basename($file_name,$ext);                        $newFileName=$filename.time().".".$ext;                        move_uploaded_file($file_tmp=$_FILES["part_image"]["tmp_name"][$key],"img/test1/".$txtGalleryName."/".$newFileName);                    }                    else                    {                        $filename=basename($file_name,$ext);                        $newFileName=$filename.time().".".$ext;                        move_uploaded_file($file_tmp=$_FILES["part_image"]["tmp_name"][$key],"img/test1/".$txtGalleryName."/".$newFileName);                    }					array_push($error1,"$newFileName,");                }                else                {                    array_push($error1,"$newFileName,");                }            }		 $error1 = implode("", $error1);         $error1 = rtrim($error1,',');
    $file_name2 = '';
        
        
     $target_dir2 = 'img/part_image/';
     $file_name2 = ($_FILES['part_image2']['name']);
     $file2 = explode('.',$file_name2);
     if($file_name2 == ''){
        $file_name2 = '';
     }
     else{

     $file_name2 = $file2[0].time().'.'.$file2[1];
     }
     $target_file2 = $target_dir2.basename($file_name2);
     if (move_uploaded_file($_FILES["part_image2"]["tmp_name"], $target_file2)) {
       
       
    }
    $file_name3 = '';
    $target_dir3 = 'img/part_image/';
     $file_name3 = ($_FILES['part_image3']['name']);
     $file3 = explode('.',$file_name3);
     if($file_name3 == ''){
        $file_name3 = '';
     }
     else{
     $file_name3 = $file3[0].time().'.'.$file3[1];
        
     }
     $target_file3 = $target_dir3.basename($file_name3);
     if (move_uploaded_file($_FILES["part_image3"]["tmp_name"], $target_file3)) {
       
       
    }    $file_name1 = '';
    $target_dir1 = 'img/part_image/';
    $error=array();    $extension=array("jpeg","jpg","png","gif");    foreach($_FILES["forging_image"]["tmp_name"] as $key=>$tmp_name)            {                $file_name1=$_FILES["forging_image"]["name"][$key];                $file_tmp=$_FILES["forging_image"]["tmp_name"][$key];                $ext=pathinfo($file_name1,PATHINFO_EXTENSION);                if(in_array($ext,$extension))                {                    if(!file_exists("img/test1/".$txtGalleryName."/".$file_name1))                    {						$filename=basename($file_name1,$ext);                        $newFileName1=$filename.time().".".$ext;                        move_uploaded_file($file_tmp=$_FILES["forging_image"]["tmp_name"][$key],"img/test1/".$txtGalleryName."/".$newFileName1);                    }                    else                    {                        $filename=basename($file_name1,$ext);                        $newFileName1=$filename.time().".".$ext;                        move_uploaded_file($file_tmp=$_FILES["forging_image"]["tmp_name"][$key],"img/test1/".$txtGalleryName."/".$newFileName1);                    }					array_push($error,"$newFileName1,");                }                else                {                    array_push($error,"$newFileName1,");                }            }		 $error = implode("", $error);		 $error = rtrim($error,',');         $data = array(
         'part_no' => $_POST['part_no'],
         'part_id' => $_POST['part_id'],
         'customer_name' => $_POST['customer_name'],
         'steel_grade' => $_POST['steel_grade'],
         'part_name' => $_POST['part_name'],
         'surface_hardness_1' => str_replace('"',' ',$_POST['surface_hardness_1']),
         'surface_hardness_2' => str_replace('"',' ',$_POST['surface_hardness_2']),
         'surface_hardness2_value' => str_replace('"',' ',$_POST['surface_hardness2_value']),
         'surface_hardness_loc1' => str_replace('"',' ',$_POST['surface_hardness_loc1']),

         'surface_hardness_loc2' => str_replace('"',' ',$_POST['surface_hardness_loc2']),
         'surface_hardnessloc2_value' => str_replace('"',' ',$_POST['surface_hardnessloc2_value']),

         
         
         
         'cut_off' => str_replace('"',' ',$_POST['cut_off']),
         'cut_off_value' => str_replace('"',' ',$_POST['cut_off_value']),

         
         
         'burn_test' => str_replace('"',' ',$_POST['burn_test']),
         'shot_peeming' => str_replace('"',' ',$_POST['shot_peeming']),
         'effective_case_depth_location' => str_replace('"',' ',$_POST['effective_case_depth_location']),
         'effective_case_depth_requirement' => str_replace('"',' ',$_POST['effective_case_depth_requirement']),
         'effective_case_depth_location2' => str_replace('"',' ',$_POST['effective_case_depth_location2']),
         'effective_case_depth_requirement2' => str_replace('"',' ',$_POST['effective_case_depth_requirement2']),

         'effective_case_depth_location3' => str_replace('"',' ',$_POST['effective_case_depth_location3']),
         'effective_case_depth_requirement3' => str_replace('"',' ',$_POST['effective_case_depth_requirement3']),
         
         'thread_hardness_location' => str_replace('"',' ',$_POST['thread_hardness_location']),
         'thread_hardness_requirement' => str_replace('"',' ',$_POST['thread_hardness_requirement']),
         
         
         
         'core_hardness_location' => str_replace('"',' ',$_POST['core_hardness_location']),
         'core_hardness_requirement' => str_replace('"',' ',$_POST['core_hardness_requirement']),
         'core_hardness_value' => str_replace('"',' ',$_POST['core_hardness_value']),
         'core_hardness_location1' => str_replace('"',' ',$_POST['core_hardness_location1']),
         'core_hardness_requirement1' => str_replace('"',' ',$_POST['core_hardness_requirement1']),
         'core_hardness_value1' => str_replace('"',' ',$_POST['core_hardness_value1']),
         'core_hardness_location2' => str_replace('"',' ',$_POST['core_hardness_location2']),
         'core_hardness_requirement2' => str_replace('"',' ',$_POST['core_hardness_requirement2']),
         'core_hardness_value2' => str_replace('"',' ',$_POST['core_hardness_value2']),
         
         'micro_structure_location' => str_replace('"',' ',$_POST['micro_structure_location']),
         'micro_structure_requirement' => str_replace('"',' ',$_POST['micro_structure_requirement']),
         'micro_structure_location1' => str_replace('"',' ',$_POST['micro_structure_location1']),
         'micro_structure_requirement1' => str_replace('"',' ',$_POST['micro_structure_requirement1']),
         'grain_boundary_location' => str_replace('"',' ',$_POST['grain_boundary_location']),
         'grain_boundary_requirement' => str_replace('"',' ',$_POST['grain_boundary_requirement']),
         'grain_boundary_location1' => str_replace('"',' ',$_POST['grain_boundary_location1']),
         'grain_boundary_requirement1' => str_replace('"',' ',$_POST['grain_boundary_requirement1']),
         'surface_baimite_location' => str_replace('"',' ',$_POST['surface_baimite_location']),
         'surface_baimite_requirement' => str_replace('"',' ',$_POST['surface_baimite_requirement']),
         'surface_baimite_location1' => str_replace('"',' ',$_POST['surface_baimite_location1']),
         'surface_baimite_requirement1' => str_replace('"',' ',$_POST['surface_baimite_requirement1']),
         'sub_surface_baimite_location' => str_replace('"',' ',$_POST['sub_surface_baimite_location']),
         'sub_surface_baimite_requirement' => str_replace('"',' ',$_POST['sub_surface_baimite_requirement']),
         'sub_surface_baimite_location1' => str_replace('"',' ',$_POST['sub_surface_baimite_location1']),
         'sub_surface_baimite_requirement1' => str_replace('"',' ',$_POST['sub_surface_baimite_requirement1']),
         'after_grind_case_depth_location' => str_replace('"',' ',$_POST['after_grind_case_depth_location']),
         'after_grind_case_depth_requirement' => str_replace('"',' ',$_POST['after_grind_case_depth_requirement']),
         'after_grind_case_depth_location_2' => str_replace('"',' ',$_POST['after_grind_case_depth_location_2']),
         'after_grind_case_depth_requirement_2' => str_replace('"',' ',$_POST['after_grind_case_depth_requirement_2']),
         'surface_hardness_location' => str_replace('"',' ',$_POST['surface_hardness_location']),
         'surface_hardness_requirement' => str_replace('"',' ',$_POST['surface_hardness_requirement']),
         'burn_test_location' => str_replace('"',' ',$_POST['burn_test_location']),
         'burn_test_requirement' => str_replace('"',' ',$_POST['burn_test_requirement']),
         'shot_peeming_location' => str_replace('"',' ',$_POST['shot_peeming_location']),
         'shot_peeming_requirement' => str_replace('"',' ',$_POST['shot_peeming_requirement']),
         'surface_hardness_value_after_grind' => str_replace('"',' ',$_POST['surface_hardness_value_after_grind']),
         'part_image' => $error1,
         'part_image2' => $file_name2,
         'part_image3' => $file_name3,
         'user_id' => $_SESSION['user_id']
     );
    $result = $crud->insert('part_number',$data);
    $data_forging = array(
        
        'part_number' => $_POST['part_no'],
        'part_weight' => $_POST['part_weight'],
        'customer' => $_POST['customer_name'],
        'material_grade' => $_POST['steel_grade'],
        'forging_image' => $error,
        'user_id' => $_SESSION['user_id']
    );
    $result_forging = $crud->insert('forging_drawing',$data_forging);
        if($result && $result_forging){
        	$_SESSION['msg_success'] = 'Record Added Successfully';
        	header('Location:part_list.php');
        }
        else{
        	$_SESSION['msg_session'] = 'Server Error';
        	header('Location:add_part.php');
        }
    }
}
else{
	header('Location:add_part.php');
}

?>