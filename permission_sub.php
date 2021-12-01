<?php 
include_once("classes/Database.php");
$crud = new Database();
$user_type_id = $_POST["user_type_id"];
$menu_id = $_POST["menu_id"];
$permission_value = $_POST["permission_value"];
$query = "SELECT id FROM user_access WHERE user_type ='$user_type_id' AND menus_id ='$menu_id'";
$rs = $crud->getSingleRow($query);
$q1 = 'SELECT type_name FROM user_type WHERE id='.$user_type_id;
$rs1 = $crud->getSingleRow($q1);
$q2 = 'SELECT name FROM menus WHERE id='.$menu_id;
$rs2 = $crud->getSingleRow($q2);
if($rs != ""){
$table = "user_access";
$where = "user_type='$user_type_id' AND menus_id='$menu_id'";
$data = array(
'permission' => $permission_value,
);
$result = $crud->update($table,$data,$where);
$sendData = array(
    'menu' => $rs2['name'],
    'user' => $rs1['type_name']
 );
echo json_encode(array('status' => 1, 'data' => $sendData));
}
else{
$data = array(
  'user_type' => $user_type_id,
  'menus_id' => $menu_id,
  'permission' => $permission_value
);

$result = $crud->insert('user_access',$data);
	if($result){
		$sendData = array(
    'menu' => $rs2['name'],
    'user' => $rs1['type_name']
 );
	echo json_encode(array('status' => 1, 'data' => $sendData));
	}
	else
	{
	echo json_encode(array('status' => 0, 'data' => 'error'));	
	}
}
?>