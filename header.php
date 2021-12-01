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
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">
        <!-- iconSweet2 icon pack (16x16) -->
            <link rel="stylesheet" href="img/icsw2_16/icsw2_16.css">
            <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <!-- splashy icon pack -->
            <link rel="stylesheet" href="img/splashy/splashy.css">
        <!-- flag icons -->
            <link rel="stylesheet" href="img/flags/flags.css">
        <!-- power tooltips -->
            <link rel="stylesheet" href="js/lib/powertip/jquery.powertip.css">
        <!-- google web fonts -->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">

    <!-- aditional stylesheets -->
        <!-- colorbox -->
            <link rel="stylesheet" href="js/lib/colorbox/colorbox.css">
        <!--fullcalendar -->
            <link rel="stylesheet" href="js/lib/fullcalendar/fullcalendar_beoro.css">
             <!-- aditional stylesheets -->
        <!-- sticky notifications -->
            <link rel="stylesheet" href="js/lib/sticky/sticky.css">

        <!-- main stylesheet -->
            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="css/buttons.dataTables.min.css">
            <link rel="stylesheet" href="js/lib/select2/select2.css">
           
      <link rel="stylesheet" href="css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="css/responsive.dataTables.min.css">
            <link rel="stylesheet" href="css/beoro.css">
            <!-- datepicker -->
            <link rel="stylesheet" href="js/lib/bootstrap-datepicker/css/datepicker.css">
            <!-- tree plugin -->
            <link rel="stylesheet" href="js/lib/dynatree/skin/ui.dynatree.css">
			
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css"><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" href="css/ie9.css"><![endif]-->
            
        <!--[if lt IE 9]>
            <script src="js/ie/html5shiv.min.js"></script>
            <script src="js/ie/respond.min.js"></script>
            <script src="js/lib/flot-charts/excanvas.min.js"></script>
        <![endif]-->
       
        

    </head>
    <style>
    .emp_span:hover{
		cursor:pointer;
		}
	.emp_span {

    border-top: 1px solid #363a3a;

}
#fade-menu ul li ul li span {

    margin: 0;
    border-width: 0 1px 1px 0;
        border-top-width: 0px;
    border-style: solid;
        border-top-style: solid;
    border-color: #363a3a;
        border-top-color: rgb(54, 58, 58);
    background: #000;
    background: rgba(0,0,0,.88);
    line-height: 26px;

}
#fade-menu ul li span {

    color: #eee;
    display: block;
    text-decoration: none;
    padding: 0 10px;
    line-height: 34px;
    border-left: 1px solid #4d5354;
    border-left: 1px solid rgba(255, 255, 255, 0.06);
    border-right: 1px solid #353939;
    border-right: 1px solid rgba(0, 0, 0, 0.2);

}
#myModal2{
	z-index: 100;
	}
    </style>
    <?php
	$pass_query = "select * from `password`";
	$pass_result = $crud->getSingleRow($pass_query);
	
	 ?>
    <input type="hidden" id="flash" name="flash" value="<?php echo $pass_result['pass']; ?>" > 
    <input type="hidden" id="new_flash" name="new_flash" value="<?php echo $_SESSION['pass_popup']; ?>" >
    <div id="myModal2" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <input type="password" style="width:98%" placeholder="Enter Password First"  id="pass" name="pass" />
        
      </div>
      <div class="modal-footer">
        <button type="button" id="sub_btn" onClick="newPopup()" class="btn btn-primary" >Enter</button>
      </div>
    </div>

  </div>
</div>
    
    <body class="">
    <!-- main wrapper (without footer) -->    
        <div class="main-wrapper">
        <!-- top bar -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        
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
                                    <a href="<?php echo $value['link'] ?>" id="link_<?php echo $value['id']; ?>" onclick="openPopup(<?php echo $value['id']; ?>)"  ><?php echo $value['name'] ?></a>
                                    
                                    <?php $query = 'select * from menus where parent_id ='.$value['id'].' order by menu_order ASC';
                                    $submenus  = $crud->getAllData($query);
                                    if(!empty($submenus)){ 
                                       
                                       echo '<ul>';
                                    foreach($submenus as $key1 => $value1){
										if($value['name'] == 'Employee Master'){?>
											<li>
                                            <a  id="link_<?php echo $value1['id']; ?>"  href="<?php echo $value1['link'] ?>" onclick="openPopup(<?php echo $value1['id']; ?>)" class="emp_span" style="width:100% !important;" ><?php echo $value1['name'] ?></a>
                                        </li>
											<?php }else{?>
												<li>
                                            		<a href="<?php echo $value1['link'] ?>" id="link_<?php echo $value1['id']; ?>" onclick="openPopup(<?php echo $value1['id']; ?>)"  ><?php echo $value1['name'] ?></a>
                                        		</li>
												<?php }
										?>
                                       
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

                            <div class="main-logo"><a href="<?php if($_SESSION['user_type'] == 21){?>#<?php }else{?>dashboard.php<?php } ?>"><img src="img/eicher-logo.png" alt="Beoro Admin" width="400px;"></a></div>
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
                                            <li><a href="#" data-toggle="modal" data-target="#myModal">Logout</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                            
                                        
                        </div>

                    </div>
                </div>
                <div class="loader" style="position: absolute;top:400px;left:600px;display: none;z-index: 999"></div>
                
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
              li.paginate_button.active {
                    background: #000;
                    color:#fff;
                }



                .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}      
.dt-buttons{
    float:right !important;
}.bg-color1{    background-color: #006dcc;    color: #fff; 	padding: 8px;line-height: 20px;text-align: left;vertical-align: top;text-align: left !important;}

.fade{
z-index : 9;
}
.modal-backdrop.fade.in {
    z-index: 1;
}

</style>
