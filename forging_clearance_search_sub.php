<?php
include_once("classes/Database.php");
$crud = new Database();
$mill_tc_supplier = $_POST['mill_tc_supplier'];
$report_no = $_POST['report_no'];
$material_grade = $_POST['material_grade'];
$from = $_POST['from'];
$to = $_POST['to'];
$heat_no = $_POST['heat_no'];$grn_no = $_POST['grn_no'];
$forger_tc_supplier = $_POST['forger_tc_supplier'];
$steel_code = $_POST['steel_code'];
$report_no = $_POST['report_no'];
$quantity = $_POST['quantity'];
$query = '';


   $query = "SELECT * FROM forging_clear WHERE id != ''";
   $where = '';
   if($from != ''){
      $where.=" AND date BETWEEN '$from'";
   }
   if($to != ''){
      $where.=" AND '$to'";
   }
   if($forger_tc_supplier != ''){
      $where.=" AND forger_tc_supplier = '$forger_tc_supplier'";
   }
   if($mill_tc_supplier != ''){
   	$where.=" AND mill_tc_supplier = '$mill_tc_supplier'";
   }
   if($report_no != ''){
   	$where.=" AND part_no = '$report_no'";
   }
   if($material_grade != ''){
   	$where.=" AND material_grade = '$material_grade'";
   }       if($grn_no != ''){   	$where.=" AND grn_no = '$grn_no'";   }
   if($heat_no != ''){
      $where.=" AND heat_no ='$heat_no'";
   }
   if($steel_code != ''){
      $where.="AND steelcode='$steel_code'";
   } 
    if($quantity != ''){
      $where.="AND quantity='$quantity'";
   }  
   $query = $query.$where;   $add.="ORDER BY id DESC";   $query= $query.$add;


$rs = $crud->getAllData($query);
if($rs){
   foreach ($rs as $key => $value) {
      $q1 = 'SELECT name FROM steel_mill WHERE id='.$value['mill_tc_supplier'];
      $rs1 = $crud->getSingleRow($q1);
      $rs[$key]['mill_tc_supplier'] = $rs1['name'];
      $q2= 'SELECT grade FROM grade WHERE id='.$value['material_grade'];
      $rs2 = $crud->getSingleRow($q2);
      $rs[$key]['material_grade'] = $rs2['grade'];
      $q3= 'SELECT name FROM forger_company WHERE id='.$value['forger_tc_supplier'];
      $rs3 = $crud->getSingleRow($q3);
      $rs[$key]['forger_tc_supplier'] = $rs3['name'];
      $q4 = "SELECT steel_code FROM steel_code WHERE heat_no=".$value['heat_no']." AND material_grade=".$value['grade']." AND forger_tc_supplier=".$value['forger_tc_supplier']."";
         $rs4 = $crud->getSingleRow($q4);
      $rs[$key]['steel_code'] = $rs4['steel_code'];
   }

echo json_encode(array('status' => 1, 'data' => $rs));
}
else{
echo json_encode(array('status' => 0));

  }
