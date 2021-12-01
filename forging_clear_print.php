<?php 
include_once("classes/Database.php");

$crud = new Database();

$id = $_POST['id'];
$where = "id=$id";
$data = array(

		'grn_no' => $_POST['grn_no'],
		'part_no' => $_POST['part_no'],
		'quantity'=> $_POST['quantity'],
		'forger_tc_supplier'=> $_POST['forger_tc_supplier'],
		'part_weight'=> $_POST['part_weight'],
		'date' => $_POST['date'],
		'mill_tc_supplier' => $_POST['mill_tc_supplier'],
		'material_grade'=> $_POST['grade'],
		'weight'=> $_POST['weight'],
		'steelcode'=> $_POST['steelcode'],
		'heat_no'=> $_POST['heat_no'],
		'balance_weight' => $_POST['balance_weight'],
		'requirement'=> $_POST['requirement'],
		'observation'=> $_POST['observation'],
		'micro_location' => $_POST['micro_location'],
		'micro_remark' => $_POST['micro_remark'],
		'microstructure'=> $_POST['microstructure'],
		'remark'=> $_POST['remark'],
		'check_by'=> $_POST['checked_by'],
		'approve_by'=> $_POST['approved_by'],
		'disposition'=> $_POST['disposition'],
		'remark_mt'=> $_POST['remark_mt'],
		'user_id' => $_SESSION['user_id']
	);  
 		$result = $crud->update('forging_clear',$data,$where);
echo json_encode(array('status' => 1, 'data' => $id));