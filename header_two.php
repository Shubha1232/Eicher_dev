<?php
session_start();
include_once("classes/Database.php");
$crud = new Database();
$base_url  = basename($_SERVER['PHP_SELF']);
 if(!isset($_SESSION['user_id'])){
    header('Location:index');
   
    }
date_default_timezone_set("Asia/Kolkata");
$url = explode('.', $base_url);
$query = 'select * from menus where parent_id = 0 order by menu_order ASC';
$result  = $crud->getAllData($query);
$inc =0;
foreach ($result as $key => $value) {
 if($value['link'] == $url[0]){
    $inc = 1;
    }
}
if($inc ==1){
$qry = 'SELECT * FROM menus WHERE link = "'.$url[0].'"';
$rs1= $crud->getSingleRow($qry);
$qry2 = 'select * from user_access where user_type = '.$_SESSION['user_type'].' AND menus_id = '.$rs1['id'].'';
$rs2 = $crud->getSingleRow($qry2);
if($rs2['permission'] == 0 || empty($rs2)){
    // print_r('in');
    header('Location:dashboard');
  }  
}
 ?>

<!DOCTYPE HTML>
<html lang="en-US">
    
<!-- Mirrored from beoro-admin.tzdthemes.com/index.php by HTTrack Website Copier/3.x [XR&CO'2005], Wed, 27 Sep 2017 08:40:42 GMT -->
<head>

        <meta charset="UTF-8">
        <title>VE Commercial</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="icon" type="image/ico" href="favicon.png">
        
    <!-- common stylesheets-->
        <!-- bootstrap framework css -->
            <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css"> -->
     

    

        <!-- main stylesheet -->
            
            <!-- <link rel="stylesheet" href="css/beoro.css"> -->
            
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css"><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" href="css/ie9.css"><![endif]-->
            
        <!--[if lt IE 9]>
            <script src="js/ie/html5shiv.min.js"></script>
            <script src="js/ie/respond.min.js"></script>
            <script src="js/lib/flot-charts/excanvas.min.js"></script>
        <![endif]-->

    </head>
    <body class="">
    <!-- main wrapper (without footer) -->    
        <div class="main-wrapper">
        <!-- top bar -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid"">
                        
                        <div id="fade-menu" class="pull-left">
                            <?php
                            //  $query = 'select * from menus where parent_id = 0 order by menu_order ASC ';
                            // $result  = $crud->getAllData($query);
                              ?>
                            <ul class="clearfix" id="mobile-nav">
                                <?php foreach($result as $key=>$value) { 
                                    $q = 'select * from user_access where user_type = '.$_SESSION['user_type'].' AND menus_id = '.$value['id'].'';
                                    $rs = $crud->getSingleRow($q);
                                    if($rs['permission'] == 1){?>
                                <li>
                                    <a href="<?php echo $value['link'] ?>"><?php echo $value['name'] ?></a>
                                    
                                    <?php $query = 'select * from menus where parent_id ='.$value['id'].' order by menu_order ASC';
                                    $submenus  = $crud->getAllData($query);
                                    if(!empty($submenus)){ 
                                       
                                       echo '<ul>';
                                    foreach($submenus as $key1 => $value1){?>
                                       <li>
                                            <a href="<?php echo $value1['link'] ?>"><?php echo $value1['name'] ?></a>
                                        </li>
                                    <?php } echo '</ul>'; } ?>
                                    
                                </li>
                                <?php } }?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <!-- header -->
            <header>
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="main-logo"><a href="dashboard.php"><img src="img/eicher-logo.png" alt="Beoro Admin"></a></div>
                        </div>
                        <div class="span5">
                            
                        </div>
                        <div class="span4">
                            <div class="user-box">
                                <div class="user-box-inner" style="padding-top:10px;">
                                    <img src="img/avatars/avatar.png" alt="" class="user-avatar img-avatar">
                                    <div class="user-info">
                                        Welcome, <strong><?php echo  $_SESSION['user_name']; ?></strong>
                                        <ul class="unstyled">
                                            <li><a href="change_password">Change Password</a></li>
                                            <li>&middot;</li>
                                            <li><a href="logout">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

        <style type="text/css">
            @media (min-width:480px)  { 
                 .main-logo{
                    width:300px !important;
                 }
             }
             @media (min-width:1025px) { 
                   .main-logo{
                    width:400px !important;
                   }
              }
        </style>