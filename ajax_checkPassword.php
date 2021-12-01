<?php 
include_once("classes/Database.php");
$crud = new Database();
$password = $_POST['password'];
$pass_query = "select * from `password`";
$pass_result = $crud->getSingleRow($pass_query);
//print_r($pass_result);
if($pass_result['pass'] == $password){
echo $_SESSION['pass_popup']=$pass_result['pass'];
	}
?>