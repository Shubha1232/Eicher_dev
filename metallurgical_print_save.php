<?php
include_once("classes/Database.php");
$crud = new Database();

    $table = "metallurgical_report";
    $id = $_POST['id'];
    $where = "id=$id";
    
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
    $inclusion_rating_req_tn .= implode("*",$_POST['inclusion_rating_req_tn']);
    $inclusion_rating_req_tk .= implode("*",$_POST['inclusion_rating_req_tk']);
    $inclusion_rating_act_tn .= implode("*",$_POST['inclusion_rating_act_tn']);
    $inclusion_rating_act_tk .= implode("*",$_POST['inclusion_rating_act_tk']);
    $gas_content_req .= implode("*",$_POST['gas_content_req']);
    $gas_content_act .= implode("*",$_POST['gas_content_act']);
    $part_no .= implode('*', $_POST['part_no']);
    $part_grade .= implode('*', $_POST['part_grade']);

    //$jommy_requirement .= implode('*', $_POST['jommy_requirement']);
    //$jommy_value .= implode('*', $_POST['jommy_value']);
    $observed .= implode('*', $_POST['observed']);
    $accept .= implode('*', $_POST['accept']);
    $remark .= implode('*',$_POST['remark']);
    $hardness_test_min_spec .= implode('*',$_POST['hardness_test_min_spec']);
    $hardness_test_max_spec .= implode('*',$_POST['hardness_test_max_spec']); 
    
    $data = array(
        'customer' => '',
        'heat_no' => $_POST['heat_no'],
        'report_no' => $_POST['report_no'],
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
        'decarb_req' => $_POST['decarb_req'],
        'decarb_act' => $_POST['decarb_act'],
        'grain_size_req' => $_POST['grain_size_req'],
        'grain_size_act' => $_POST['grain_size_act'],
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
        'inclusion_rating_req_tn' => $inclusion_rating_req_tn,
        'inclusion_rating_req_tk' => $inclusion_rating_req_tk,
        'inclusion_rating_act_tn' => $inclusion_rating_act_tn,
        'inclusion_rating_act_tk' => $inclusion_rating_act_tk,
        'gas_content_req' => $gas_content_req,
        'gas_content_act' => $gas_content_act,
        'checked_by' => $_POST['checked_by'],
        'approved_by' => $_POST['approved_by'],
        'mill_tc_supplier' => $_POST['mill_tc_supplier'],
        'forger_tc_supplier' => $_POST['forger_tc_supplier'],
        'process_route' => $_POST['process_route'],
        'remark' => $remark,
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
        'part_grade' => $part_grade,				'status' => 1,
    
    ); 
//    $result = $crud->update($table,$data,$where);
   /* $q2 = "SELECT * FROM steel_code WHERE heat_no='".$_POST['heat_no']."'";

    $rst = $crud->getAllData($q2);
    $parts  = $_POST['part_no'];
    $accept1 =  $_POST['accept'];
    $part_grade = $_POST['part_grade'];
    if($rst){
        $steel_code_parts=array();
        foreach($rst as $key => $value) {
            $steel_code_parts[$key] = $value['part_no'];
        }
        foreach ($parts as $key => $value) {
            if(in_array($value,$steel_code_parts)){
               if($accept1[$key] == 'REJECTED'){
                $q3 = "DELETE FROM steel_code WHERE part_no='$value'";
                $r3 = $crud->deleteByColumn($q3);

               }
            }
            else{
                if($value != '' && $accept1[$key]!= 'REJECTED' ){
                    $q4 = "SELECT company_code FROM forger_company WHERE id=".$rst[0]['forger_tc_supplier'];
                  $rs4 = $crud->getSingleRow($q4);
               $data1 = array(
                     'part_no' => $value,
                     'steel_code' => $rs4['company_code'].''.$rst[0]['code_value'].''.$part_grade[$key],
                     'material_grade' => $part_grade[$key],
                     'forger_tc_supplier' => $rst[0]['forger_tc_supplier'],
                     'code_value' => $rst[0]['code_value'],
                     'heat_no' => $rst[0]['heat_no'],
                     'date' => $rst[0]['date'],
                     'mill_tc_supplier' => $rst[0]['mill_tc_supplier'],
                     'user_id' => $rst[0]['user_id'],
                  ); 
               $result = $crud->insert('steel_code',$data1);
                }
            }
        }
        
    }    */
echo json_encode(array('status' => 1, 'data' => $id));