<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
$name = $_POST['name'];
$path = 'javascript:void(0)';

if($_POST['path'] != ''){
$path = $_POST['path'];
} 
else{
   $path = 'javascript:void(0)'; 
}
$parent_id = $_POST['parent_id'];
$query = "SELECT * FROM menus where name='$name' AND parent_id ='$parent_id'";
$result = $crud->getSingleRow($query);
    if($result){
    	$_SESSION['msg_session'] = 'Menu Already Exits';
    	header('Location:add_menus?id='.$parent_id);
    }
    else{
        $q2 = "SELECT max(menu_order) as maximum FROM menus WHERE parent_id='$parent_id'";
        $rs = $crud->getSingleRow($q2);
        $count = $rs['maximum']+1; 
        $data = [
    		'name' => $name,
    		'link' => $path,
    		'parent_id' => $parent_id,
            'menu_order' => $count
    	];
    	$result1 = $crud->insert('menus',$data);
    	if($result1){
    		 $_SESSION['msg_success'] = 'Record Added Successfully';
    		 header('Location:menus');
    	}
    	else{
    		$_SESSION['msg_session'] = 'Internal Server Error';
    			header('Location:add_menus?id='.$parent_id);
    	}
    }

}