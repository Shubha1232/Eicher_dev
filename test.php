<?php
include_once("classes/Database.php");
$crud = new Database();
$sql="select * from control_plan where report_no like 'IF11802%'";
echo $sql;

$res = $crud->getAllData($sql);
$i="001";
foreach($res as $val){
	$id=$val['id'];
	$where="id=$id";
	$rep="IF11802".$i;
$data = array(
		'report_code' => $i,
		'report_no' => $rep,
	);
	$crud->update('control_plan',$data,$where);
	$i = sprintf('%03d', $i + 1);
}
?>