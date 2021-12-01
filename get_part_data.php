<?php

include_once("classes/Database.php");

$crud = new Database();

$query = "SELECT * FROM part_number WHERE part_no='".$_POST['part_no']."'";

$result = $crud->getAllData($query);


$q1= 'SELECT name FROM customer WHERE id='.$result[0]['customer_name'];

$rs = $crud->getSingleRow($q1);

$result[0]['customer_name'] = $rs['name'];



if($result[0]['customer_name']!=''){

echo json_encode(array('status' => 1, 'data' => $result));

}

else{

echo json_encode(array('status' => 1,'data' => $result,'query'=>$query));

}