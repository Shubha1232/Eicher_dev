<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
	$id = $_POST['id'];
	$where = "id=$id";
	$fi = $_FILES["file"]["name"];
	
	if($fi!=""){
	
	 $fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder

 $file_ext=explode('.',$fileName);
       
	  $var = $file_ext[1];
	 $mk = time(). ".". $var;
 
$moveResult = move_uploaded_file($fileTmpLoc, "img/".$mk);


	$data = array(
		'grn_no' => $_POST['grn_no'],
		'part_no' => $_POST['part_no'],
		'quantity'=> $_POST['quantity'],
		'forging_quantity'=> $_POST['forging_quantity'],
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
		'file'=> $mk,
		'remark'=> $_POST['remark'],
		'check_by'=> $_POST['checked_by'],
		'approve_by'=> $_POST['approved_by'],		
		'disposition'  => $_POST['disposition'],
		'user_id' => $_SESSION['user_id'],
		'status' => 1,
	);
 		$result = $crud->update('forging_clear',$data,$where);
	
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:update_forging_clear?id='.$id);
	
	}
else {
	
	$data = array(
		'grn_no' => $_POST['grn_no'],
		'part_no' => $_POST['part_no'],
		'quantity'=> $_POST['quantity'],
		'forging_quantity'=> $_POST['forging_quantity'],
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
		'file'=> $_POST['update_file'],
		'remark'=> $_POST['remark'],
		'check_by'=> $_POST['checked_by'],
		'approve_by'=> $_POST['approved_by'],
		'user_id' => $_SESSION['user_id'],
		'status' => 1,
	);
 		$result = $crud->update('forging_clear',$data,$where);
	
		 $_SESSION['msg_success'] = 'Record Added Successfully';
		header('Location:update_forging_clear?id='.$id);
	
}	
}