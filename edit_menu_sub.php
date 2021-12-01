<?php
include_once("classes/Database.php");
$crud = new Database();
if(isset($_POST)){
$name = $_POST['name'];
$path = 'javascript:void(0)';
if(isset($_POST['path'])){
$path = $_POST['path'];
} 
$id = $_POST['id'];
$parent_id = $_POST['parent_id'];
$menu_order = $_POST['menu_order'];
$q1 = "SELECT menu_order FROM menus WHERE id ='$id'";
  $rs1 = $crud->getSingleRow($q1);
                if($rs1['menu_order'] == $menu_order){
                            	$table = "menus";
                            $where = "id=$id";
                             $data = array(
                                    'name'=> $name,
                                    'menu_order' => $menu_order
                               );
                        $result1 =  $crud->update($table,$data,$where);
                	
                	if($result1){
                		 $_SESSION['msg_success'] = 'Record Updated Successfully';
                		 header('Location:menus');
                	}
                	else{
                		 $_SESSION['msg_success'] = 'Record Updated Successfully';
                         header('Location:menus');
                	}
             }
             else{
               //  $q2 = "SELECT * FROM menus WHERE parent_id = '$parent_id' AND  menu_order = '$menu_order'";
               // $rs2 = $crud->getSingleRow($q2);
               // if($rs2){
               //  $_SESSION['msg_session'] = 'Menu order number already assign to other menus';
               //              header('Location:edit_menu?id='.$id);
               // }
               // else{
                    $table = "menus";
                            $where = "id=$id";
                             $data = array(
                                    'name'=> $name,
                                    'menu_order' => $menu_order
                               );
                        $result1 =  $crud->update($table,$data,$where);
                    
                    if($result1){
                         $_SESSION['msg_success'] = 'Record Updated Successfully';
                         header('Location:menus');
                    }
                    else{
                        $_SESSION['msg_success'] = 'Record Updated Successfully';
                         header('Location:menus');
                    }
               // }


             }
    

}