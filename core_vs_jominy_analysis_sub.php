<?php

include_once("classes/Database.php");

$crud = new Database();

$batch_code = $_POST['batch_code'];
$charge_number = $_POST['charge_number'];
$steel_code = $_POST['steel_code'];
$customer = $_POST['customer'];
$furnace_name = $_POST['furnace_name'];
$quantity = $_POST['quantity'];
$supplier = $_POST['supplier'];

$from = $_POST['from'];

$to = $_POST['to'];

$disposition = $_POST['disposition'];

$part_no = $_POST['part_no'];
$f_unit  = $_POST['f_unit'];
$cut_part  = $_POST['cut_part'];
$query = '';

if($cut_part == '' && $batch_code == '' && $charge_number == '' && $steel_code == '' && $customer == '' && $furnace_name == '' && $from == '' && $to == '' && $disposition == '' && $part_no == '' && $quantity == '' &&  $supplier == ''){

   $query = 'SELECT s.heat_no, c.id, c.part_no, c.date, c.metallurgical_test_case_depth_pcd_observation, c.metallurgical_test_surface_hard1_observation, c.furnace_no,c.steel_code,c.metallurgical_test_core_hardness_rcd_observation, c.metallurgical_test_case_depth_observation, c.metallurgical_test_core_hardness_pcd_observation, c.report_no,c.other_clubbed_part_no, c.other_clubbed_part_no2, c.other_clubbed_part_no3, c.other_clubbed_part_no4, c.other_clubbed_part_no5, c.other_clubbed_part_no6, c.cut_part, c.batch_code, c.charge_number, c.disposition, c.status,c.qty, c.supplier,c.hardness_traverse_extra_value, metallurgical_report.hardness_test_milltc  FROM `control_plan`  as c join steel_code as s on c.part_no=s.part_no JOIN metallurgical_report on s.heat_no = metallurgical_report.heat_no WHERE  c.steel_code=s.steel_code';

}

else{

 $query = "SELECT s.heat_no, c.id, c.part_no, c.date, c.metallurgical_test_case_depth_pcd_observation, c.metallurgical_test_surface_hard1_observation, c.furnace_no,c.steel_code,c.metallurgical_test_core_hardness_rcd_observation, c.metallurgical_test_case_depth_observation, c.metallurgical_test_core_hardness_pcd_observation, c.report_no,c.other_clubbed_part_no, c.other_clubbed_part_no2, c.other_clubbed_part_no3, c.other_clubbed_part_no4, c.other_clubbed_part_no5, c.other_clubbed_part_no6, c.cut_part, c.batch_code, c.charge_number, c.disposition, c.status,c.qty, c.supplier,c.hardness_traverse_extra_value, metallurgical_report.hardness_test_milltc  FROM `control_plan`  as c join steel_code as s on c.part_no=s.part_no JOIN metallurgical_report on s.heat_no = metallurgical_report.heat_no WHERE  c.steel_code=s.steel_code and c.record_status = '0'";



   $where = '';

   if($from != ''){

      $where.=" AND `current_date` BETWEEN '$from'";

   }

   if($to != ''){

      $where.=" AND '$to'";

   }

   if($batch_code != ''){

   	$where.=" AND `batch_code` = '$batch_code'";

   }
   if($charge_number != ''){

   	$where.=" AND `charge_number` = '$charge_number'";

   }
   if($cut_part != ''){

   	$where.=" AND `cut_part` = '$cut_part'";

   }

   if($steel_code != ''){

   	$where.=" AND c.steel_code = '$steel_code'";

   }
   if($customer != ''){

      $where.=" AND `customer` ='$customer'";

   }
   if($furnace_name != ''){

   	$where.=" AND `furnace_no` = '$furnace_name'";

   }

   if($disposition != ''){

      $where.=" AND `disposition` ='$disposition'";

   }
     if($quantity != ''){

      $where.=" AND `qty` ='$quantity'";

   }
    if($supplier != ''){

      $where.=" AND `supplier` ='$supplier'";

   }

   if($part_no != ''){
		if($_POST['other_clubbed'] == 1){
			      $where.=" AND (`part_no` ='$part_no' || `other_clubbed_part_no` ='$part_no' || `other_clubbed_part_no2` ='$part_no' || `other_clubbed_part_no3` = '$part_no' || `other_clubbed_part_no4` = '$part_no' || `other_clubbed_part_no5` = '$part_no' || `other_clubbed_part_no6` = '$part_no')";
				 
			}else{
				      $where.=" AND (c.part_no ='$part_no' && c.other_clubbed_part_no !='$part_no' && c.other_clubbed_part_no2 !='$part_no' && c.other_clubbed_part_no3 != '$part_no' && c.other_clubbed_part_no4 != '$part_no' && c.other_clubbed_part_no5 != '$part_no' && c.other_clubbed_part_no6 != '$part_no' )";
					 
				}


   }
   if($f_unit != ''){
      $q1 = 'SELECT furnace_no FROM furnace WHERE unit='.$f_unit;
      $r1 = $crud->getAllData($q1);
      $furnaces = '';
      foreach ($r1 as $key => $value){
         $furnaces.='"'.$value['furnace_no'].'",';
      }
      $furnaces=rtrim($furnaces,", ");
      $where.=" AND `furnace_no` IN ($furnaces)";
   }
	if($supplier!=''){
		$query = $query.$where." ";
		}else{
			$query = $query.$where;
			}
   
//print_r($query); die;
   




}


$rs = $crud->getAllData($query);
//echo ($rs[0]['supplier']);die;


if($rs){
	foreach($rs as $kk=>$vv){
		if($vv['furnace_no'] == 'OT' || $vv['furnace_no'] == 'TA'){
			$supp_query = "select * from `supplier` where `id`='".$vv['supplier']."' ";
			$supp_result = $crud->getSingleRow($supp_query);
			$rs[$kk]['supplier_name'] = $supp_result['name'];
			}else{
				$rs[$kk]['supplier_name'] = '';
				}
		
		}
	
	
	
		echo json_encode(array('status' => 1, 'data' => $rs,'query'=>$query));



}

else{

echo json_encode(array('status' => 0));



  }

