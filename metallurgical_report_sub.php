<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){

    if(report_no==''){
		$_SESSION['msg_session'] = 'Blank Data';
    	header('Location:metallurgical_report');
	}
	
	else{
		
	$pp='select heat_no from metallurgical_report where heat_no="'.$_POST['heat_no'].'"';
    $ult = $crud->getSingleRow($pp);	
	if($ult){
		 $_SESSION['msg_session'] = 'Heat No already inserted';
    	header('Location:metallurgical_report');
		
	}	else{
    $file_name1 = '';
    $target_dir1 = 'img/part_image/';
     $file_name1 = ($_FILES['mill_tc_file']['name']);
     $file1 = explode('.',$file_name1);
     if($file_name1 == ''){
        $file_name1 = '';
     }
     else{
        
     $file_name1 = $file1[0].time().'.'.$file1[1];
     }
     $target_file1 = $target_dir1.basename($file_name1);
     if (move_uploaded_file($_FILES["mill_tc_file"]["tmp_name"], $target_file1)) {
       
       
    }
    $file_name2 = '';
    $target_dir2 = 'img/part_image/';
     $file_name2 = ($_FILES['forger_tc_file']['name']);
     $file2 = explode('.',$file_name2);
     if($file_name2 == ''){
        $file_name2 = '';
     }
     else{
        
     $file_name2 = $file2[0].time().'.'.$file2[1];
     }
     $target_file2 = $target_dir2.basename($file_name2);
     if (move_uploaded_file($_FILES["forger_tc_file"]["tmp_name"], $target_file2)) {
       
       
    }
    $file_name3 = '';
    $target_dir3 = 'img/part_image/';
     $file_name3 = ($_FILES['third_party_file']['name']);
     $file3 = explode('.',$file_name3);
     if($file_name3 == ''){
        $file_name3 = '';
     }
     else{
        
     $file_name3 = $file3[0].time().'.'.$file3[1];
     }
     $target_file3 = $target_dir3.basename($file_name3);
     if (move_uploaded_file($_FILES["third_party_file"]["tmp_name"], $target_file3)) {
       
       
    }
    
    $chemical_composition_max .= implode("*",$_POST['chemical_composition_max']);
    $chemical_composition_min .= implode("*",$_POST['chemical_composition_min']);
	$chemical_composition_milltc .= implode("*",$_POST['chemical_composition_milltc']);
    $chemical_composition_forgertc .= implode("*",$_POST['chemical_composition_forgertc']);
    $chemical_composition_partyremark .= implode("*",$_POST['chemical_composition_partyremark']);
    $chemical_composition .= implode("*",$_POST['chemical_composition']);
    $chemical_composition2 .= implode("*",$_POST['chemical_composition2']);
    $chemical_composition_avg .= implode("*",$_POST['chemical_composition_avg']);
    $hardness_test_milltc .= implode("*",$_POST['hardness_test_milltc']);
    $hardness_test_forgertc .= implode("*",$_POST['hardness_test_forgertc']);
    $hardness_test_vec .= implode("*",$_POST['hardness_test_vec']);
    $hardness_test .= implode("*",$_POST['hardness_test']);
    $hardness_test2 .= implode("*",$_POST['hardness_test2']);
    $hardness_test_calculatedvalue .= implode("*",$_POST['hardness_test_calculatedvalue']);
    $hardness_test_calculatedvalue_vecv .= implode("*",$_POST['hardness_test_calculatedvalue_vecv']);
    $inclusion_rating_req_tn .= implode("*",$_POST['inclusion_rating_req_tn']);
    $inclusion_rating_req_tk .= implode("*",$_POST['inclusion_rating_req_tk']);
    $inclusion_rating_act_tn .= implode("*",$_POST['inclusion_rating_act_tn']);
    $inclusion_rating_act_tk .= implode("*",$_POST['inclusion_rating_act_tk']);
    $gas_content_req .= implode("*",$_POST['gas_content_req']);
    $gas_content_act .= implode("*",$_POST['gas_content_act']);
    $part_no .= implode('*', $_POST['part_no']);
    $part_grade .= implode('*', $_POST['part_grade']);
    //$jommy_value .= implode('*', $_POST['jommy_value']);
    $observed .= implode('*', $_POST['observed']);
    $accept .= implode('*', $_POST['accept']);
    $remark .= implode('*',$_POST['remark']);
    $part_date .= implode('*',$_POST['part_date']);
    $hardness_test_min_spec .= implode('*',$_POST['hardness_test_min_spec']);
    $hardness_test_max_spec .= implode('*',$_POST['hardness_test_max_spec']);
    
    $data = array(
		'customer' => '',
		'heat_no' => $_POST['heat_no'],
		'report_code' => $_POST['report_code'],
		'report_no' => $_POST['report_no'],
		'report_year' => $_POST['report_year'],
		'grade' => $_POST['grade'],
		'date' => $_POST['date'],
		
		'section' => $_POST['section'],
		'spec' => '',
		'total_pcs' => $_POST['total_pcs'],
		'length' => $_POST['length'],
		'weight' => $_POST['weight'],
		'bloom_size' => $_POST['bloom_size'],
		'bloom_size2' => $_POST['bloom_size2'],
		'reduction_ratio' => $_POST['reduction_ratio'],
		'rr_tc' => $_POST['rr_tc'],				
		'rr_for_tc' => $_POST['rr_for_tc'],
		'condition' => $_POST['condition'],
		'bloom_size' => $_POST['bloom_size'],
		'bloom_size' => $_POST['bloom_size'],
		'decarb_req' => $_POST['decarb_req'],
		'decarb_act' => $_POST['decarb_act'],
		'grain_size_req' => $_POST['grain_size_req'],
		'grain_size_act' => $_POST['grain_size_act'],
		'mip_act' => $_POST['mip_act'], 
        'ut_act' => $_POST['ut_act'], 
        'radio_active_eLement_act' => $_POST['radio_active_eLement_act'],
		'micro_struct' => $_POST['micro_struct'],
		'internal_soundness_req' => $_POST['internal_soundness_req'],
		'internal_soundness_act' => $_POST['internal_soundness_act'],
        'chemical_composition_max' => $chemical_composition_max,
        'chemical_composition_min' => $chemical_composition_min,
        'chemical_composition_milltc' => $chemical_composition_milltc,
        'chemical_composition_forgertc' => $chemical_composition_forgertc,
        'chemical_composition_partyremark' => $chemical_composition_partyremark,
        'chemical_composition' => $chemical_composition,
        'chemical_composition2' => $chemical_composition2,
        'chemical_composition_avg' => $chemical_composition_avg,
        'hardness_test_milltc' => $hardness_test_milltc,
        'hardness_test_forgertc' => $hardness_test_forgertc,
        'hardness_test_vec' => $hardness_test_vec,
        'hardness_test' => $hardness_test,
        'hardness_test2' => $hardness_test2,
        'hardness_test_calculatedvalue' => $hardness_test_calculatedvalue,
        'hardness_test_calculatedvalue_vecv' => $hardness_test_calculatedvalue_vecv,
        'inclusion_rating_req_tn' => $inclusion_rating_req_tn,
        'inclusion_rating_req_tk' => $inclusion_rating_req_tk,
        'inclusion_rating_act_tn' => $inclusion_rating_act_tn,
        'inclusion_rating_act_tk' => $inclusion_rating_act_tk,
        'gas_content_req' => $gas_content_req,
        'gas_content_act' => $gas_content_act,
        'checked_by' => $_POST['checked_by'],
        'approved_by' => $_POST['approved_by'],
		'verified_by' => $_POST['verified_by'],
        'mill_tc_supplier' => $_POST['mill_tc_supplier'],
        'forger_tc_supplier' => $_POST['forger_tc_supplier'],
        'process_route' => $_POST['process_route'],
        'remark' => $remark,
        'part_date' => $part_date,
        'part_no' => $part_no,
        // 'jommy_requirement' => $jommy_requirement,
        // 'jommy_value' => $jommy_value,
        'observed' => $observed,
        'accept' => $accept,
        'user_id' => $_SESSION['user_id'],
        'mill_tc_file' => $file_name1,
        'forger_tc_file' => $file_name2,
        'third_party_file' => $file_name3,
        'hardness_test_min_spec' => $hardness_test_min_spec,
        'hardness_test_max_spec' => $hardness_test_max_spec,
        'chenical_composition_value1' => $_POST['chenical_composition_value1'],
        'chenical_composition_value2' => $_POST['chenical_composition_value2'],
        'jominy_value1' => $_POST['jominy_value1'],
        'jominy_value2' => $_POST['jominy_value2'],
        'parameter1' => $_POST['parameter1'],
        'parameter2' => $_POST['parameter2'],
        'parameter3' => $_POST['parameter3'],
        'parameter4' => $_POST['parameter4'],
        'part_grade' => $part_grade,
        'is_report_generated' => 0
    ); 

	$result = $crud->insert('metallurgical_report',$data);
    if($result){
        $_SESSION['msg_success'] = 'Record Added Successfully';
    	header('Location:edit_metallurgical_report?id='.$result);
    } }
    // else{
    // 	$_SESSION['msg_session'] = 'Server Error';
    // 	header('Location:control_plan?id='.$_POST['furnace_id']);
    // }
	}
} 