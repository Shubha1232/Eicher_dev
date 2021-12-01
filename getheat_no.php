<?php

include_once("classes/Database.php");

$crud = new Database();

$steel_code = $_POST['steel_code'];



$query = "SELECT heat_no FROM steel_code WHERE steel_code='$steel_code'";

$resu = $crud->getSingleRow($query);


$re=$resu["heat_no"];

$que = "select * from metallurgical_report where heat_no='$re'";

$result = $crud->getSingleRow($que);

$que1 = "select grade from grade where id=".$result['grade'];

$result1 = $crud->getSingleRow($que1);
if($result1){
$result['grade']=$result1['grade'];
}
if($result){

	echo json_encode(array('status' => 1, 'data'=> $result));

}

else{

	echo json_encode(array('status' => 0, 'data' =>''));

}


