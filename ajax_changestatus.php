<?php 
include_once("classes/Database.php");
$crud = new Database();

$query = "select * from `part_number` where `id`='".$_POST['id']."' ";
$result = $crud->getSingleRow($query);

//echo "<pre>";print_r($result);die;
if($result['is_checked'] == $_POST['status']){
	$data = array('is_checked'=>$_POST['status1']);
	
	//echo "<pre>";print_r($data);
	}else{
		$data = array('is_checked'=>$_POST['status']);
		//echo "<pre>";print_r($data);
		}
 $id = $_POST['id'];

 $res = $crud->update('part_number',$data,'id='.$id);
//echo "<pre>";print_r($data);die;
if($res){
	
	$_SESSION['s_msg'] = "Record updated successfully";
	echo $data['is_checked'];
	//echo $data;
	}
?>