<?php include_once("header.php"); 
if($_SESSION['user_type'] == 21){?>
	<script>
  window.location.href = 'new_part_list';
</script>
	<?php }
 $c = 'SELECT notifications  FROM users WHERE id='.$_SESSION['user_id'];
 $rs = $crud->getSingleRow($c);
 $unreadmsg = $rs['notifications'];
 $modal = $_GET['modal'] ? 1 : 0;
 

if($_SESSION['user_type'] == 20){

   
?>
<script>
  window.location.href = 'ht_search';
</script>
<?php } ?>
<link href="css/jquery.smartmarquee.css" rel="stylesheet">

<style type="text/css">

   .circle{

  height: 90px;

  width: 90px;

  text-align: center;

  line-height: 87px;

  color: #000;

  border-radius: 50%;

  /*border: 4px solid #3E628E;*/

  /*background: radial-gradient(circle at center, brown 66.5%, transparent 68%);*/
  float: left;

  margin : 10px;
      font-family: cursive;
    font-size: 14px;
    font-weight: bold;
}
.circlebig{

  height: 130px;

  width: 130px;

  text-align: center;

  line-height: 20px;

  color: #000;

  border-radius: 50%;

 /* border: 4px solid #f6b817;

  background: radial-gradient(circle at center, #25461b 66.5%, transparent 68%);*/

  float: left;

  margin : 10px;
  font-family: cursive;
  font-size: 15px;
  font-weight:bolder;

}
.circlebig span{
  position: relative;
  top:40px;
}
.circlebig.white{
 background-image: url("img/icon_2.png"); 
/* background: radial-gradient(circle at center, #25461b  66.5%, white 68%);*/
  
}
.circle.white{
   background-image: url("js/logo.jpg"); 
 
  /*background: radial-gradient(circle at center, #D56D15  66.5%, white 68%);*/
  
}
.circle.unit2{

  /*background: radial-gradient(circle at center, #72847A   66.5%, white 68%);*/
  /*border: 4px solid #8f8585;*/
   background-image: url("js/logo.jpg"); 
  
}
.circle.unit3{
   background-image: url("js/logo.jpg"); 

  /*background: radial-gradient(circle at center, #b03436  66.5%, white 68%);*/
  /*border: 4px solid #542828;*/
  
}
.circle.unit4{

  /*background: radial-gradient(circle at center, #323232  66.5%, white 68%);*/
  /*border: 4px solid #cb840a;*/
   background-image: url("js/logo.jpg"); 
  
}

/* Just for demo */



/*div{

  float: left;

  margin-right: 10px;

  transition: all 1s;

}*/

</style>
<style>
#btnTrigger
{
display:none;
}
</style>
<!-- breadcrumbs -->
<input type="hidden" id="test" name="test" value="0">
<button class="btn btn-primary btn-lg" id="btnTrigger" data-toggle="modal" data-target="#myModal1">
</button>
            <div class="container-fluid">

                <!-- <ul id="breadcrumbs">

                    <li><a href="javascript:void(0)"><i class="icon-home"></i></a></li>

                    

                </ul> -->

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    <div class="span9" style="margin-top: 14px;">

                        <div class="w-box">

                            <input type="hidden" id="modal" value="<?php echo $modal; ?>" />
                              

                        

                        <div class="tabbable tabbable-bordered">
                                            <ul class="nav nav-tabs">
                                                <li class="active" style="width:34%;margin-right: 0px;"><a data-toggle="tab" href="#tb1_a">HEAT TREATMENT RESULT</a></li>
                                                <li style="width:33%;margin-right: 0px;"><a data-toggle="tab" href="#tb1_b">RAW MATERIAL RESULT</a></li>
                                                <li style="width:33%;margin-right: 0px;"><a data-toggle="tab" href="#tb1_c" onclick="changeStatus()">SHIFT NOTIFICATION&nbsp;<?php if($unreadmsg){ ?><span class="badge badge-info" id="not"><?php echo $unreadmsg; ?></span><?php }?></a></li>
                                            </ul>
                                            <div class="tab-content" style="background-color: #fff;">
                                                <div id="tb1_a" class="tab-pane active">
                                                   <?php
                                                   $query;
                                                  
                                                    if($_SESSION['unit_id'] != 0){
                               $query = 'SELECT * FROM furnace WHERE unit in ('.$_SESSION['unit_id'].') ORDER BY unit,furnace_no ASC';
                                  }
                                  else{

                                    $query = 'SELECT * FROM furnace  ORDER BY unit,furnace_no ASC';
                                  }
                                  
                               $result = $crud->getAllData($query);
                             
                               foreach ($result as $key => $value) {

                 if($value['unit'] ==1){
   
                  echo '<a href="control_plan?id='.$value['id'].'"><div class="circle white">'. $value['furnace_no'].'</div></a>';
                 
                } else if($value['unit'] == 2){
  
                  echo '<a href="control_plan?id='.$value['id'].'"><div class="circle unit2">'. $value['furnace_no'].'</div></a>';
  
                } else if($value['unit'] ==  3){
  
                  echo '<a href="control_plan?id='.$value['id'].'"><div class="circle unit3">'. $value['furnace_no'].'</div></a>';
  
                } else {
  
                  echo '<a href="control_plan?id='.$value['id'].'"><div class="circle unit4">'. $value['furnace_no'].'</div></a>';

                              }}

                             ?>
                                                </div>
                                                <div id="tb1_b" class="tab-pane">
 
                                                  <?php

                                                   $query = 'select * from menus where parent_id = 100 order by menu_order ASC';
                                                  

                                                  $result  = $crud->getAllData($query);
                                                  
                                                  if($_SESSION['user_type'] == 16){
                                                      foreach ($result as $key => $value) {
                                                       $qry2 = 'select permission from user_access where user_type = '.$_SESSION['user_type'].' AND menus_id = '.$value['id'].'';
                                                       $rs2 = $crud->getSingleRow($qry2);
                                                       
                                                       $name = explode(' ', $value['name']);
                                                       if($rs2['permission'] == 1){
                                                       echo '<a href="'.$value['link'].'"><div class="circlebig white"><span>'.$name[0].'<br>'.$name[1].'</span></div></a>';
                                                            }
                                                      }
                                                  }
                                                  else{
                                                  echo '<a href="metallurgical_report"><div class="circlebig white"><span>Heat<br>Entry</span></div></a>';
                                                  echo '<a href="raw_material_search"><div class="circlebig white"><span>Heat<br>Search</span></div></a>';  
                                                  echo '<a href="forging_clear"><div class="circlebig white"><span>Forging<br>Clearance</span></div></a>';
												  echo '<a href="forging_clearance_search"><div class="circlebig white"><span>Forging<br>Search</span></div></a>';
                                                  echo '<a href="generate_heat_code"><div class="circlebig white"><span>Generate<br>Steel<br>Code</span></div></a>';
                                                  echo '<a href="material_grade_analysis"><div class="circlebig white"><span>Grade<br>Analysis</span></div></a>';
                                                  echo '<a href="jominy_analysis"><div class="circlebig white"><span>Jominy<br>Analysis</span></div></a>';
												  
												   echo '<a href="core_vs_jominy_analysis"><div class="circlebig white"><span style="top:35px;">Core <br>vs<br>Jominy</span></div></a>';
                                                }


                              ?>  
                                                </div>

                                                <div id="tb1_c" class="tab-pane" style="height: 450px;">
                                                    <?php
                                                    $date = date('Y-m-d');
                                                    $previous = strtotime($date .' -1 month');
                                                    
                                                    $q = 'SELECT * FROM logout_notifications WHERE read_status != 1 OR date >= '.$previous.' order by id DESC';
                                                    $rs = $crud->getAllData($q);
                                                    
                                                    foreach ($rs as $key => $value) {
                                                      $q2 = 'SELECT full_name from users WHERE id='.$value['user_id'];
                                                      $rs2 = $crud->getSingleRow($q2);
											          $da=date("Y-m-d H:ia",$value['date']);
                                                      echo '<div class="w-box"><div class="w-box-content cnt_a" style="color:red;">'.$value['message'].'<p style="margin:0px;padding:0px;font-size:10px;color:#000;">Posted by :- '.$rs2['full_name'].' ('.$da.')</p></div></div>';
                                                    }
                                                    ?>
                                                   
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </div>

                    </div>
					
                    
                    <div class="span3" style="margin-top: 50px;">
						<marquee behavior="alternate" direction="up" height="430"  onMouseOver="this.stop();" onMouseOut="this.start();"  scrollamount="5"> 
                        	 <ul class="container">
                                <li style="margin-bottom:10px;">                              
                                	<img src="img/customer/caterpillar.jpg"  /> 
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/CNH.jpg"  />
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                <img src="img/customer/CLAAS.jpg"  />
                                </li> 
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/John_deere.jpg" />
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/Mahindra.png"/>           
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/MERITOR.jpg"/>
                                </li> 
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/royal.jpg" />
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/TAFE.jpg"/>
                                </li>
                                <li style="margin-bottom:10px;">
                                  <img src="img/customer/DANA.png"/>
                                </li>
                                <li style="margin-bottom:10px;">
                                  <img src="img/customer/DOVER.png"/>
                                </li>
                                 <li style="margin-bottom:10px;">
                                  <img src="img/customer/FORCE.png"/>
                                </li>
                                <li style="margin-bottom:10px;">
                               		<img src="img/customer/volvo-eicher-logo.jpg" />
                                </li>
                                
                                <li style="margin-bottom:10px;">
                                  <img src="img/customer/hyster_yale.png"/>
                                </li>
                                <li style="margin-bottom:10px;">
                                	<img src="img/customer/warn.jpg" />
                                </li>
                                <li style="margin-bottom:10px;">
                                  <img src="img/customer/Atul_Logo.jpg" />
                                </li>
                                
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/eicher.jpg" />
                                </li>  
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/ESCORTS.png" />
                                </li>  
                                
                                <li style="margin-bottom:10px;" >
                                	<img src="img/customer/zf.jpg" />
                                </li> 
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/spicer.jpg" />
                                </li>
                                 <li style="margin-bottom:10px;" >
                                  <img src="img/customer/godrej.jpg" />
                                </li>
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/vst.png" />
                                </li>   
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/KION.png" />
                                </li>  
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/MIDWEST.jpg" />
                                </li> 
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/Logo_SDF.jpg" />
                                </li> 
                                <li style="margin-bottom:10px;" >
                                  <img src="img/customer/VST_SHAKTI.jpg" />
                                </li> 
                                 <li style="margin-bottom:10px;" >
                                  <img src="img/customer/IT.jpg" />
                                </li> 
                                 <li style="margin-bottom:10px;" >
                                  <img src="img/customer/TMA.jpg" />
                                </li> 
                           </ul>
                             
                             
                        </marquee>
                       

                    </div>  

                </div>


            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>

        <script src="js/jquery.smartmarquee.js"></script>

        <script language="javascript">

    $(document).ready(function () {
      var filename = $('#test').val();
	  if(filename==1){
		  $('#btnTrigger').click();
	  }
      $(".smartmarquee").smartmarquee();
        
    });

  </script>

  <style type="text/css">

   

    a { cursor: pointer }

    .example {

      height: 400px;

      width: 300px;

      -moz-box-shadow: 1px 1px 5px #999;

      -webkit-box-shadow: 1px 1px 5px #999;

      box-shadow: 1px 1px 5px #999;

    }

    .example .container {

      margin: 0;

      padding: 0;

    }

    .example .container li {

      width: 285px;

      margin: 0 0 0 5px;

      padding: 5px 0 5px 0;

      border-bottom: 1px dotted #999

    }

  </style>