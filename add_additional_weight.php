<?php 
include_once("classes/Database.php");
$crud = new Database();
$userId=$_POST['user_id'];
$heatNo=$_POST['heat_no'];
$weight=$_POST['weight'];
$additionalWeight=$_POST['additional_weight'];
$totalWeight=$weight+$additionalWeight;
$table = "weight_info";
$data = array(
        'user_id' => $userId,
        'heat_no' => $heatNo,
        'weight' =>  $weight,
        'additional_weight' => $additionalWeight,
		'added_at' => date('Y-m-d H:i:s'),
);
$result = $crud->insert($table,$data);
$qry='select * from metallurgical_report where heat_no="'.$heatNo.'"';
$result=$crud->getAllData($qry);
if($result) {
    foreach($result as $key=>$value) {
        $previousWeight=$value['weight'];
        $newWeight=$previousWeight+$additionalWeight;
        $data=array(
                'weight' => $newWeight,
            );
        $id=$value['id'];
        $where = "id=$id";
        $crud->update("metallurgical_report",$data,$where);
    }
}

$qry="select * from forging_clear where heat_no='".$heatNo."'";
$result=$crud->getAllData($qry);
if($result) {
    foreach($result as $key=>$value) {
        $previousWeight=$value['balance_weight'];
        $newWeight=$previousWeight+$additionalWeight;
        $data=array(
                'balance_weight' => $newWeight,
            );
        $id=$value['id'];
        $where = "id=$id";
        $crud->update("forging_clear",$data,$where);
    }
}
echo json_encode(array('status' => 1, 'new_weight' => $totalWeight));

?>