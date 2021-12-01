<?php

include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	if($_POST['checked_by'] == "" && $_POST['approved_by'] == ""){
        header("Location: add_part.php");
        exit; 
	}else{
     $table = "control_plan";
    $id = $_POST['id'];
    $where = "id=$id";
    $user_id = $_SESSION['user_id'];
     $hardness_traverse_pcd .= implode("*",$_POST['Hardness_traverse_pcd']);
    $hardness_traverse_rcd .= implode('*',$_POST['hardness_traverse_rcd']);
    $hardness_traverse_od .= implode('*',$_POST['hardness_traverse_od']);
    $hardness_traverse_ag .= implode('*',$_POST['hardness_traverse_ag']);
    $hardness_traverse_extra .= implode('*',$_POST['hardness_traverse_extra']);
    $other_clubbed_steel_code .= implode('*',$_POST['other_clubbed_steel_code']);

    $file_name = '';
    $target_dir = 'img/part_image/';
     $file_name = ($_FILES['part_image']['name']);
     $file = explode('.',$file_name);
     if($file_name == ''){
        $file_name = $_POST['hidden_file_name'];
     }
     else{
      $file_name = $file[0].time().'.'.$file[1];
     }
     $target_file = $target_dir.basename($file_name);
     if (move_uploaded_file($_FILES["part_image"]["tmp_name"], $target_file)) {
       
       
    }
    $data = array(
		'supplier' => str_replace('"',' ',$_POST['supplier_name']),
    	'furnace_no' => str_replace('"',' ',$_POST['furnace_no']),
        'report_no' => str_replace('"',' ',$_POST['report_no']),
        'part_no'  => str_replace('"',' ',$_POST['part_no']),
        'batch_code'  => str_replace('"',' ',$_POST['batch_code']),
        'charge_number'  => str_replace('"',' ',$_POST['charge_number']),
        'customer'  => str_replace('"',' ',$_POST['customer']),
        'part_name'  => str_replace('"',' ',$_POST['part_name']),

        
        'control_plan_id'  => str_replace('"',' ',$_POST['control_plan_id']),
        'steel_code'  => str_replace('"',' ',$_POST['steel_code']),
        'steel_code2'  => str_replace('"',' ',$_POST['steel_code2']),
        'steel_code3'  => str_replace('"',' ',$_POST['steel_code3']),
        'qty'  => str_replace('"',' ',$_POST['qty']),
        'cut_part' => str_replace('"',' ',$_POST['cut_part']),
        'segment_off_extra' => str_replace('"',' ',$_POST['segment_off_extra']),
         'date'  => str_replace('"',' ',$_POST['date']),
        'other_clubbed_part_no'  => str_replace('"',' ',$_POST['other_clubbed_part_no']),
        'other_clubbed_part_no2'  => str_replace('"',' ',$_POST['other_clubbed_part_no2']),
        'other_clubbed_part_no3'  => str_replace('"',' ',$_POST['other_clubbed_part_no3']),
        'other_clubbed_part_no4'  => str_replace('"',' ',$_POST['other_clubbed_part_no4']),
        'other_clubbed_part_no5'  => str_replace('"',' ',$_POST['other_clubbed_part_no5']),
        'other_clubbed_part_no6'  => str_replace('"',' ',$_POST['other_clubbed_part_no6']),
        'other_clubbed_id'  => str_replace('"',' ',$_POST['other_clubbed_id']),
        'other_clubbed_id2'  => str_replace('"',' ',$_POST['other_clubbed_id2']),
        'other_clubbed_id3'  => str_replace('"',' ',$_POST['other_clubbed_id3']),
        'other_clubbed_id4'  => str_replace('"',' ',$_POST['other_clubbed_id4']),
        'other_clubbed_id5'  => str_replace('"',' ',$_POST['other_clubbed_id5']),
        'other_clubbed_id6'  => str_replace('"',' ',$_POST['other_clubbed_id6']),
        'other_clubbed_qty'  => str_replace('"',' ',$_POST['other_clubbed_qty']),
        'other_clubbed_qty2'  => str_replace('"',' ',$_POST['other_clubbed_qty2']),
        'other_clubbed_qty3'  => str_replace('"',' ',$_POST['other_clubbed_qty3']),
        'other_clubbed_qty4'  => str_replace('"',' ',$_POST['other_clubbed_qty4']),
        'other_clubbed_qty5' => str_replace('"',' ',$_POST['other_clubbed_qty5']),
        'other_clubbed_qty6' => str_replace('"',' ',$_POST['other_clubbed_qty6']),
        'curbeizing_temp'  => str_replace('"',' ',$_POST['curbeizing_temp']),
		'curbeizing_temp1'  => str_replace('"',' ',$_POST['curbeizing_temp1']),
        'diffusion_temp'  => str_replace('"',' ',$_POST['diffusion_temp']),
		'diffusion_temp1'  => str_replace('"',' ',$_POST['diffusion_temp1']),
        'hardening_temp'  => str_replace('"',' ',$_POST['hardening_temp']),
		'hardening_temp1'  => str_replace('"',' ',$_POST['hardening_temp1']),
        'quench_oil_temp'  => str_replace('"',' ',$_POST['quench_oil_temp']),
		'quench_oil_temp1'  => str_replace('"',' ',$_POST['quench_oil_temp1']),
        'curbeizing_time'  => str_replace('"',' ',$_POST['curbeizing_time']),
        'diffusion_time'  => str_replace('"',' ',$_POST['diffusion_time']),
        'hardening_time'  => str_replace('"',' ',$_POST['hardening_time']),
        'quench_oil_time'  => str_replace('"',' ',$_POST['quench_oil_time']),
		'curbeizing_time1'  => str_replace('"',' ',$_POST['curbeizing_time1']),
        'diffusion_time1'  => str_replace('"',' ',$_POST['diffusion_time1']),
        'hardening_time1'  => str_replace('"',' ',$_POST['hardening_time1']),
        'quench_oil_time1'  => str_replace('"',' ',$_POST['quench_oil_time1']),
        'curbeizing_cp'  => str_replace('"',' ',$_POST['curbeizing_cp']),
        'diffusion_cp'  => str_replace('"',' ',$_POST['diffusion_cp']),
        'hardening_cp'  => str_replace('"',' ',$_POST['hardening_cp']),
        'quench_oil_cp'  => str_replace('"',' ',$_POST['quench_oil_cp']),
		'curbeizing_cp1'  => str_replace('"',' ',$_POST['curbeizing_cp1']),
        'diffusion_cp1'  => str_replace('"',' ',$_POST['diffusion_cp1']),
        'hardening_cp1'  => str_replace('"',' ',$_POST['hardening_cp1']),
        'quench_oil_cp1'  => str_replace('"',' ',$_POST['quench_oil_cp1']),
        'temp_tempering' => str_replace('"',' ',$_POST['temp_tempering']),
        'temp_tempering1' => str_replace('"',' ',$_POST['temp_tempering1']),
        'time_tempering' => str_replace('"',' ',$_POST['time_tempering']),
        'time_tempering1' => str_replace('"',' ',$_POST['time_tempering1']),
        'cp_tempering' => str_replace('"',' ',$_POST['cp_tempering']),
        'cp_tempering1' => str_replace('"',' ',$_POST['cp_tempering1']),
        'in_time'  => str_replace('"',' ',$_POST['in_time']),
        'out_time'  => str_replace('"',' ',$_POST['out_time']),
        'process_remark'  => str_replace('"',' ',$_POST['process_remark']),
        'metallurgical_test_surface_hard1_location'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard1_location']),
        'metallurgical_test_surface_hard1_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard1_requirement']),
        'metallurgical_test_surface_hard1_observation'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard1_observation']),
        'metallurgical_test_surface_hard2_location'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard2_location']),
        'metallurgical_test_surface_hard2_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard2_requirement']),
        'metallurgical_test_surface_hard2_observation'  => str_replace('"',' ',$_POST['metallurgical_test_surface_hard2_observation']),
        'surface_hardnessloc_value'  => str_replace('"',' ',$_POST['surface_hardnessloc_value']),
        'remark1'  => str_replace('"',' ',$_POST['remark1']),
        'surface_hardnessloc1_value'  => str_replace('"',' ',$_POST['surface_hardnessloc1_value']),
        'remark2'  => str_replace('"',' ',$_POST['remark2']),
        'remark3'  => str_replace('"',' ',$_POST['remark3']),
        'metallurgical_test_case_depth_location'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_location']),
        'metallurgical_test_case_depth_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_requirement']),
        'metallurgical_test_case_depth_observation'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_observation']),
        'remark4'  => str_replace('"',' ',$_POST['remark4']),

        'metallurgical_test_case_depth_location1'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_location1']),
        'metallurgical_test_case_depth_requirement1'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_requirement1']),
        'metallurgical_test_case_depth_observation1'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_observation1']),
        'remark5'  => str_replace('"',' ',$_POST['remark5']),
        
        
        'metallurgical_test_case_depth_pcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_pcd_requirement']),
        'metallurgical_test_case_depth_pcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_pcd_observation']),
        'metallurgical_test_case_depth_rcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_rcd_requirement']),
        'metallurgical_test_case_depth_rcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_rcd_observation']),
        'metallurgical_test_case_depth_ID_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_ID_requirement']),
        'metallurgical_test_case_depth_ID_observation'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_ID_observation']),
        'metallurgical_test_case_depth_OD_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_OD_requirement']),
        'metallurgical_test_case_depth_OD_observation'  => str_replace('"',' ',$_POST['metallurgical_test_case_depth_OD_observation']),
        'cut_off'  => str_replace('"',' ',$_POST['cut_off']),
        'cut_off_value'  => str_replace('"',' ',$_POST['cut_off_value']),
        'remark6'  => str_replace('"',' ',$_POST['remark6']),
        'remark7'  => str_replace('"',' ',$_POST['remark7']),
        'metallurgical_test_core_hardness_rcd_location'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_rcd_location']),
        'remark9'  => str_replace('"',' ',$_POST['remark9']),
        'core_hardness_value1'  => str_replace('"',' ',$_POST['core_hardness_value1']),
        'core_hardness_value2'  => str_replace('"',' ',$_POST['core_hardness_value2']),

        'metallurgical_test_core_hardness_ID_location'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_ID_location']),
        'remark8'  => str_replace('"',' ',$_POST['remark8']),
        'core_hardness_value3'  => str_replace('"',' ',$_POST['core_hardness_value3']),
        
        'metallurgical_test_core_hardness_pcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_pcd_requirement']),
        'metallurgical_test_core_hardness_pcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_pcd_observation']),
        'metallurgical_test_core_hardness_rcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_rcd_requirement']),
        'metallurgical_test_core_hardness_rcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_rcd_observation']),
        'metallurgical_test_micro_core_location'  => str_replace('"',' ',$_POST['metallurgical_test_micro_core_location']),
        'metallurgical_test_gbo_igo_rcd_location'  => str_replace('"',' ',$_POST['metallurgical_test_gbo_igo_rcd_location']),
         'remark_micro_case' => str_replace('"',' ',$_POST['remark_micro_case']),
        'remark_micro_core' => str_replace('"',' ',$_POST['remark_micro_core']),
        'metallurgical_test_nmtp_surface_rcd_location'  => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_rcd_location']),
        'metallurgical_test_itp_sub_surface_rcd_location'  => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_rcd_location']),

        
        
        'metallurgical_test_nmtp_surface_pcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_pcd_requirement']),
        'metallurgical_test_nmtp_surface_pcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_pcd_observation']),
        'metallurgical_test_nmtp_surface_rcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_rcd_requirement']),
        'metallurgical_test_nmtp_surface_rcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_rcd_observation']),
        'metallurgical_test_itp_sub_surface_pcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_pcd_requirement']),
        'metallurgical_test_itp_sub_surface_pcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_pcd_observation']),
        'metallurgical_test_itp_sub_surface_rcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_rcd_requirement']),
        'metallurgical_test_itp_sub_surface_rcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_rcd_observation']),
        'burn_test1'  => str_replace('"',' ',$_POST['burn_test1']),
        'burn_test2'  => str_replace('"',' ',$_POST['burn_test2']),
        'burn_test3'  => str_replace('"',' ',$_POST['burn_test3']),
        'shop_peenign_arc_initencity1'  => str_replace('"',' ',$_POST['shop_peenign_arc_initencity1']),
        'shop_peenign_arc_initencity2'  => str_replace('"',' ',$_POST['shop_peenign_arc_initencity2']),
        'shop_peenign_arc_initencity3'  => str_replace('"',' ',$_POST['shop_peenign_arc_initencity3']),
        'remark'  => str_replace('"',' ',$_POST['remark']),
        'checked_by'  => str_replace('"',' ',$_POST['checked_by']),
        'approved_by'  => str_replace('"',' ',$_POST['approved_by']),
        'disposition'  => str_replace('"',' ',$_POST['disposition']),
        'metallurgical_test_core_hardness_ID_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_ID_requirement']),
        'metallurgical_test_core_hardness_ID_observation'  => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_ID_observation']),
        'metallurgical_test_micro_case_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_micro_case_requirement']),
        'metallurgical_test_micro_case_observation'  => str_replace('"',' ',$_POST['metallurgical_test_micro_case_observation']),
        'metallurgical_test_micro_core_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_micro_core_requirement']),
        'metallurgical_test_micro_core_observation'  => str_replace('"',' ',$_POST['metallurgical_test_micro_core_observation']),
        'metallurgical_test_gbo_igo_pcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_gbo_igo_pcd_requirement']),
        'metallurgical_test_gbo_igo_pcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_gbo_igo_pcd_observation']),
        'metallurgical_test_gbo_igo_rcd_requirement'  => str_replace('"',' ',$_POST['metallurgical_test_gbo_igo_rcd_requirement']),
        'metallurgical_test_gbo_igo_rcd_observation'  => str_replace('"',' ',$_POST['metallurgical_test_gbo_igo_rcd_observation']),
        'hardness_traverse_pcd' => $hardness_traverse_pcd,
        'hardness_traverse_rcd' => $hardness_traverse_rcd,
        'hardness_traverse_od' => $hardness_traverse_od,
        'hardness_traverse_ag' => $hardness_traverse_ag,
        'metallurgical_test_case_depth_pcd_location' => str_replace('"',' ',$_POST['metallurgical_test_case_depth_pcd_location']),
        'metallurgical_test_core_hardness_pcd_location' => str_replace('"',' ',$_POST['metallurgical_test_core_hardness_pcd_location']),
        'metallurgical_test_micro_case_location' => str_replace('"',' ',$_POST['metallurgical_test_micro_case_location']),
        'metallurgical_test_gbo_igo_pcd_location' =>str_replace('"',' ', $_POST['metallurgical_test_gbo_igo_pcd_location']),
        'metallurgical_test_nmtp_surface_pcd_location' => str_replace('"',' ',$_POST['metallurgical_test_nmtp_surface_pcd_location']),
        'metallurgical_test_itp_sub_surface_pcd_location' => str_replace('"',' ',$_POST['metallurgical_test_itp_sub_surface_pcd_location']),
        'grade' => str_replace('"',' ',$_POST['material_grade']),
        'hardness_traverse_extra' => $hardness_traverse_extra,
        'hardness_traverse_extra_value' => str_replace('"',' ',$_POST['hardness_traverse_extra_value']),
        'hardness_traverse_value' => str_replace('"',' ',$_POST['hardness_traverse_value']),
        'hardness_traverse_value2' => str_replace('"',' ',$_POST['hardness_traverse_value2']),
        'thread_hardness_location' => str_replace('"',' ',$_POST['thread_hardness_location']),
        'thread_hardness_requirement' => str_replace('"',' ',$_POST['thread_hardness_requirement']),
        'thread_hardness_observation' => str_replace('"',' ',$_POST['thread_hardness_observation']),
        'eff_after_grinding_location1' => str_replace('"',' ',$_POST['eff_after_grinding_location1']),
        'eff_after_grinding_requirement1' => str_replace('"',' ',$_POST['eff_after_grinding_requirement1']),
        'eff_after_grinding_location2' => str_replace('"',' ',$_POST['eff_after_grinding_location2']),
        'eff_after_grinding_requirement2' => str_replace('"',' ',$_POST['eff_after_grinding_requirement2']),
        'surface_hardness_location_after_grind' => str_replace('"',' ',$_POST['surface_hardness_location_after_grind']),
        'surface_hardness_requirement_after_grind' => str_replace('"',' ',$_POST['surface_hardness_requirement_after_grind']),
        'surface_hardness_value_after_grind' => str_replace('"',' ',$_POST['surface_hardness_value_after_grind']),
        'remark_observe1' => str_replace('"',' ',$_POST['remark_observe1']),
        'remark_observe2' => str_replace('"',' ',$_POST['remark_observe2']),
        'remark_observe3' => str_replace('"',' ',$_POST['remark_observe3']),
        'remark_ag' => str_replace('"',' ',$_POST['remark_ag']),
        'remark_ag2' => str_replace('"',' ',$_POST['remark_ag2']),
        'remark_ag3' => str_replace('"',' ',$_POST['remark_ag3']),
        'part_image' => $file_name,
        'user_id' => $user_id,
        'other_clubbed_steel_code' =>$other_clubbed_steel_code,
        'current_date' => str_replace('"',' ',$_POST['current_date']),
        'report_code' => str_replace('"',' ',$_POST['report_code']),
        'remark_shot_peening' => str_replace('"',' ',$_POST['remark_shot_peening']),
        'remark_burn_test' => str_replace('"',' ',$_POST['remark_burn_test']),
        'remark_itp2' => str_replace('"',' ',$_POST['remark_itp2']),
        'remark_itp' => str_replace('"',' ',$_POST['remark_itp']),
        'remark_nmtp2' => str_replace('"',' ',$_POST['remark_nmtp2']),
        'remark_nmtp' => str_replace('"',' ',$_POST['remark_nmtp']),
        'remark_gbo2' => str_replace('"',' ',$_POST['remark_gbo2']),
        'remark_gbo' => str_replace('"',' ',$_POST['remark_gbo']),
        'remark_thread_hardness' =>str_replace('"',' ', $_POST['remark_thread_hardness']),
        'updated_time' => date('Y-m-d H:i:s')

     );
    $result = $crud->update($table,$data,$where);
        if($result){
			    
				 
	    }
        $_SESSION['msg_success'] = 'Record updated Successfully';
    	header('Location:update_control_plan?id='.$id);
    }
    
}
else{
	header('Location:add_part.php');
}
