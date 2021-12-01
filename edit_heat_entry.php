<?php include_once("header.php"); ?>
<style type="text/css">
   .bg-color{
    background-color: #006dcc;
    color: #fff; 
   }
    .table-bordered td{
    border-left:2px solid #fff !important;
  }
   .table-bordered th{
    border-left:2px solid #fff !important;
  }
  .table-bordered{
    border:none !important;
  }
  td{
    border-top:2px solid #fff !important;
  }
  th{
    border-top:2px solid #fff !important;
  }
  /*td{
    border-top: none !important;

  }*/

     /*td input{
        width:150px !important;
     } */
     .span1{
        width:100px !important;
     }    
 .innerBoxes{
        width:35px !important;
        }
        .div-scroll
{
width:1270px;
overflow-x:scroll;
}
.error1{
	border-color:red !important;
	color:red !important;
}
.div-scroll-metallographic{
    width:900px;
    /*overflow-x:scroll;*/
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 122%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 25%; /* Could be more or less, depending on screen size */
  margin-left:45%;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
        </style>
 <script src="js/jquery.min.js"></script>

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                    <li><a href="#">RAW MATERIAL REPORT</a></li>

                   

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <!-- <div class="w-box-header">

                                <h4>Control Plan</h4>

                            </div> -->

                            <div class="w-box-content cnt_a">

                                <?php 



                                  if($_SESSION['msg_success'] != ''){ ?>

                                   <script>

                                       window.onload = function(){

                                        $.sticky('<?php echo $_SESSION['msg_success'];?>', {autoclose : 3000, position: "top-center", type: "st-success" });

                                        

                                       }

                                   </script>

                                  <?php 

                                  $_SESSION['msg_success'] = '';

                                  }

                                  if($_SESSION['msg_session'] != ''){ ?>

                                   <script>

                                       window.onload = function(){

                                        $.sticky('<?php echo $_SESSION['msg_session'];?>', {autoclose : 3000, position: "top-center", type: "st-error" });

                                        

                                       }

                                   </script>

                                  <?php 

                                  $_SESSION['msg_session'] = '';

                                  }
									
                                  $stid = $_GET['stid'];
                                 
								  $qry = "SELECT id FROM `metallurgical_report` WHERE steel_code ='$stid'";
								  $re = $crud->getSingleRow($qry);
								   $id = $re['id'];
                                  $query = "SELECT * FROM metallurgical_report WHERE id=".$id;
                                  $response = $crud->getSingleRow($query);
                                   $chemical_composition_min = explode('*',$response['chemical_composition_min']);
                                   $chemical_composition_max = explode('*',$response['chemical_composition_max']);
                                   $chemical_composition_milltc = explode('*',$response['chemical_composition_milltc']);
                                   $chemical_composition_forgertc = explode('*',$response['chemical_composition_forgertc']);
                                   $chemical_composition_partyremark = explode('*',$response['chemical_composition_partyremark']);
                                   $chemical_composition = explode('*',$response['chemical_composition']);
                                   $chemical_composition2 = explode('*',$response['chemical_composition2']);
                                   $chemical_composition_avg = explode('*',$response['chemical_composition_avg']);
                                   $hardness_test_milltc = explode('*',$response['hardness_test_milltc']);
                                   $hardness_test_forgertc = explode('*',$response['hardness_test_forgertc']);
                                   $hardness_test_vec = explode('*',$response['hardness_test_vec']);
                                   $hardness_test = explode('*',$response['hardness_test']);
                                   $hardness_test2 = explode('*',$response['hardness_test2']);
                                   $hardness_test_calculatedvalue = explode('*',$response['hardness_test_calculatedvalue']);
								   ///////
                                   $hardness_test_calculatedvalue_vecv = explode('*',$response['hardness_test_calculatedvalue_vecv']);
                                   $inclusion_rating_req_tn = explode('*', $response['inclusion_rating_req_tn']);
                                   $inclusion_rating_req_tk = explode('*', $response['inclusion_rating_req_tk']);
                                   $inclusion_rating_act_tn = explode('*', $response['inclusion_rating_act_tn']);
                                   $inclusion_rating_act_tk = explode('*', $response['inclusion_rating_act_tk']);
                                   $gas_content_req = explode('*', $response['gas_content_req']);
                                   $gas_content_act = explode('*', $response['gas_content_act']);
                                   $part_no = explode('*', $response['part_no']);
                                   
                                   $jommy_requirement = explode('*', $response['jommy_requirement']);
                                   $jommy_value = explode('*', $response['jommy_value']);
                                   $observed = explode('*', $response['observed']);
                                   $accept = explode('*', $response['accept']);
                                   $remark = explode('*', $response['remark']);
                                   $part_date = explode('*', $response['part_date']);
                                   $hardness_test_min_spec = explode('*', $response['hardness_test_min_spec']);
                                   $hardness_test_max_spec = explode('*', $response['hardness_test_max_spec']);
                                   $part_grade = explode('*',$response['part_grade']);
                                ?>
								<?php

                                                           $q5 = 'SELECT full_name FROM users WHERE id='.$response['user_id'];

                                                           $rs5 = $crud->getSingleRow($q5);

                                                     if($response['updated_time'] != ''){ echo 'Last updated at '.$response['updated_time'].' by '.$rs5['full_name'].''; }else{ echo 'Last updated at '.$response['date'].' by '.$rs5['full_name'].''; } ?></td>

                                                    
                     <button class="btn btn-beoro-1" onclick="pdffun();" style="float: right; margin-right: 9px;">Customer Report</button>
<!--								<button class="btn btn-info" onclick="printfun();" style="float: right; margin-right: 5px;">Word</button>-->
                                <form class="form-horizontal" action="edit_metallurgical_report_sub.php" id="control_plan_form" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="bg-color"><!-- CUSTOMER -->MILL TC SUPPLIER NAME</td>
                                                <td><!-- <select name="customer" id="customer">
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM customer';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select> --> <select name="mill_tc_supplier" id="mill_tc_supplier" required="">
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM steel_mill';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$response['mill_tc_supplier']){ ?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select></td>
                                                <td class="bg-color">HEAT NO.</td>
                                                <td><input type="text" id="heat_no" name="heat_no" value="<?php echo $response['heat_no']; ?>" required=""/></td>
                                                <td class="bg-color">REPORT NO.</td>
                                                <td><?php $id = $_GET['id'];
                                                             $query = 'SELECT furnace_no FROM furnace WHERE id='.$id;
                                                             $rs = $crud->getSingleRow($query);
                                                             $q2 = 'SELECT max(id) as id FROM metallurgical_report';
                                                             $rs2 = $crud->getSingleRow($q2);
                                                             $rs2 = $rs2['id']+1;
                                                             $date = time();
                                                             $date = date('Ymd',$date);
                                                             $rpt = $rs['furnace_no'].$date.$rs2;
                                                              ?><input type="text" id="report_no" name="report_no" value="<?php echo $response['report_no']; ?>" readOnly/></td>

                                            </tr>
                                            <tr>
                                                <td class="bg-color">FORGER TC SUPPLIER NAME</td>
                                                <td><select name="forger_tc_supplier" id="forger_tc_supplier" required="">
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM forger_company';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($response['forger_tc_supplier']==$value['id']){ ?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select></td>
                                                <td class="bg-color">MATERIAL GRADE</td>
                                                <td><select id="grade" name="grade" onchange="getChemicalComposition()" required="">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $response['grade']){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select></td>
                                                <td class="bg-color">DATE</td>
                                               <!--  <td><input type="text" id="date" name="date" class="datepicker" readOnly="" value="<?php //echo $response['date']; ?>" required=""/></td> -->
                                                <td><input type="text" id="date" name="date"  readOnly="" value="<?php echo $response['date']; ?>" required=""/></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-color">MILL TC</td>
                                                <td><?php if($response['mill_tc_file']){
                                                  echo '<a href="img/part_image/'.$response['mill_tc_file'].'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a>';
                                                } ?><input type="file" id="mill_tc_file" name="mill_tc_file"><input type="hidden" name="mill_tc_filename" value="<?php echo $response['mill_tc_file'] ?>" /></td>																								<td class="bg-color">CONDITION</td>                                                <td><input type="text" id="condition" name="condition" value="<?php echo $response['condition']; ?>" required=""/></td>
                                         
												<td class="bg-color"><!-- SPEC --> BLOOM SIZE</td>
                                                <td><!-- <input type="text" id="spec" name="spec" /> --><input type="text" id="bloom_size" name="bloom_size" value="<?php echo $response['bloom_size']; ?>" onkeyup="calculatebloom()" style="width: 39%;" required="" /><input id="bloom_size2" name="bloom_size2" value="<?php echo $response['bloom_size2']; ?>" required="" onkeyup="calculatebloom()" style="width: 39%;" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-color">FORGER TC</td>
                                                <td><?php if($response['forger_tc_file']){
                                                  echo '<a href="img/part_image/'.$response['forger_tc_file'].'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a>';
                                                } ?><input type="file" id="forger_tc_file" name="forger_tc_file"><input type="hidden" name="forger_tc_filename" value="<?php echo $response['forger_tc_file'] ?>" /></td>																								<td class="bg-color">Steel Code</td>                                                <td><input type="text" id="steel_code" name="steel_code" value="<?php echo $response['steel_code']; ?>" required=""/></td>																								
												<td class="bg-color">SECTION SIZE MM/RCS</td>   
												<td><input type="text" id="section" name="section" onkeyup="calculatebloom()" value="<?php echo $response['section']; ?>"></td>
                                            </tr>
                                            <tr>
                                               <td rowspan="3" class="bg-color">THIRD PARTY</td>
                                                <td rowspan="3"><?php if($response['third_party_file']){
                                                  echo '<a href="img/part_image/'.$response['third_party_file'].'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a>';
                                                } ?><input type="file" id="third_party_file" name="third_party_file"><input type="hidden" name="third_party_filename" value="<?php echo $response['third_party_file'] ?>" /></td>
                                                <td rowspan="3" class="bg-color">WEIGHT</td>
                                                <td><input type="text" id="weight" name="weight" value="<?php echo $response['weight']; ?>" required=""/>
                                                <br/><br/>
                                                <button id="myBtn" type="button">Add More Weight</button>
                                                <!-- The Modal -->
                                                <div id="myModal" class="modal">
                                                
                                                  <!-- Modal content -->
                                                  <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p style="font-size:20px;height:25px;">Add More Weight</p>
                                                    <input type="text" id="rd_weight" name="rd_weight" style="width:90%;height:25px;" />
                                                    <button type="button" id="rd_add_weight_btn" style="margin-top: 20px;background-color: cornflowerblue;height: 40px;width:100px;color: whitesmoke;font-size: 15px;">Add Weight</button>
                                                  </div>
                                                
                                                </div>
                                                </td>
                                                 <td class="bg-color">SECTION SIZE DIA</td>                                                <td><input type="text" id="reduction_ratio" onkeyup="calculatebloom()" name="reduction_ratio" value="<?php echo $response['reduction_ratio']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <!-- <td rowspan="2" class="bg-color">PROCESS ROUTE</td>
												 <td rowspan="2"><input type="text" id="process_route" name="process_route" value="<?php echo $response['process_route']; ?>" required=""/></td>
                                               --><td></td>
											   <td class="bg-color">RE. RATIO AS PER MILL TC</td>
                                                <td><input type="text" id="rr_tc" name="rr_tc" value="<?php echo $response['rr_tc']; ?>" required=""/></td>
                                            </tr>	
											<tr>  
											<td></td>
											<td class="bg-color">RE. RATIO AS PER CALCULATOR</td>                                                <td><input type="text" id="rr_for_tc" name="rr_for_tc" value="<?php $res = $response['rr_for_tc']; echo round($res,2); ?>" required=""/></td>                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td><!-- CONDITION --></td>
                                                <td><!-- <input type="text" id="condition" name="condition" /> --></td>
                                            </tr>
                                            <!-- style="background:#A2A2A2; color:#FFF;" -->
                                            <tr  class="bg-color">
                                                                        <td colspan="6" style="text-align:center">% CHEMICAL COMPOSTION</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                            <div id="div1" class="div-scroll">
                                                                <table class="table">
                                                                    <tr class="bg-color">
                                                                       <td colspan="2" class="bg-color">PARAMETER</td>
                                                                       
                                                                       <td >C%</td>
                                                                       <td>Mn%</td>
                                                                       <td>S%</td>
                                                                       <td>P%</td>
                                                                       <td>Si%</td>
                                                                       <td>Ni%</td>
                                                                       <td>Cr%</td>
                                                                       <td>Mo%</td>
                                                                       <td>V%</td>
                                                                       <td>AI%</td>
                                                                       <td>B%</td>
                                                                       <td>Cu%</td>
                                                                       <td>Ca%</td>
                                                                       <td>Sn%</td>
                                                                       <td><input class="innerBoxes" type="text" id="parameter1" name="parameter1" value="<?php echo $response['parameter1']; ?>" /></td>
                                                                       <td><input class="innerBoxes" type="text" id="parameter2" name="parameter2" value="<?php echo $response['parameter2']; ?>"/></td>
                                                                       <td><input class="innerBoxes" type="text" id="parameter3" name="parameter3" value="<?php echo $response['parameter3']; ?>"/></td>
                                                                       <td><input class="innerBoxes" type="text" id="parameter4" name="parameter4" value="<?php echo $response['parameter4']; ?>"/></td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">MIN SPEC</td>
                                                                       <td id="min">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition_min'.$i.'" name="chemical_composition_min[]" value="'.$chemical_composition_min[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>

                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">MAX SPEC</td>
                                                                       <td id="max" style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition_max'.$i.'" name="chemical_composition_max[]" value="'.$chemical_composition_max[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                     
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">MILL TC VALUE</td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
																	   ?>
                                                                    <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition_milltc<?php echo $i; ?>" name="chemical_composition_milltc[]" onkeyup="calculateAverage(<?php echo $i; ?>,this)" value="<?php echo $chemical_composition_milltc[$i]?>"/></td>
																		<script>
																		 $(document).ready(function(){
																	   calculateAverage(<?php echo $i; ?>,chemical_composition_milltc<?php echo $i; ?>)
																		 });
																	  </script>
																	   <?php  }
                                                                       ?>
                                                                   </td>
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">FORGER TC VALUE</td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
																			 ?>
                                                                     <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition_forgertc<?php echo $i; ?>" name="chemical_composition_forgertc[]" onkeyup="calculateAverage(<?php echo $i; ?>,this)" value="<?php echo $chemical_composition_forgertc[$i]?>"/></td>
																	<script>
																		 $(document).ready(function(){
																	   calculateAverage(<?php echo $i; ?>,chemical_composition_forgertc<?php echo $i; ?>)
																		 });
																	  </script>
																	 <?php   }
                                                                       ?>
                                                                   </td>
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">THIRD PARTY VALUE</td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) { ?>
                                                                    <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition_partyremark<?php echo $i; ?>" name="chemical_composition_partyremark[]" onkeyup="calculateAverage(<?php echo $i; ?>,this)" value="<?php echo $chemical_composition_partyremark[$i]?>"/></td>
                                                                      <script>
																		 $(document).ready(function(){
																	   calculateAverage(<?php echo $i; ?>,chemical_composition_partyremark<?php echo $i; ?>)
																		 });
																	  </script>
																	  <?php   }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td><input type="text" id="chenical_composition_value1" name="chenical_composition_value1" value="<?php echo $response['chenical_composition_value1'] ?>" style="width:100px;"></td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                        for($i=0; $i<18; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition'.$i.'" name="chemical_composition[]" onkeyup="calculateAverageVecv('.$i.')" value="'.$chemical_composition[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td><input type="text" id="chenical_composition_value2" name="chenical_composition_value2" value="<?php echo $response['chenical_composition_value2'] ?>" style="width:100px;"></td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes chemical_composition_field" type="text" id="chemical_composition2'.$i.'" name="chemical_composition2[]" onkeyup="calculateAverage('.$i.')" value="'.$chemical_composition2[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr style="display:none;">
                                                                       <td class="bg-color">AVG VALUE</td>
                                                                         <td style="padding-left:0px;padding-right:0px;">
                                                                       <?php
                                                                         for($i=0; $i<18; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="chemical_composition_avg'.$i.'" name="chemical_composition_avg[]" value="'.$chemical_composition_avg[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>


                                                                </table>
                                                            </div>
                                                </td>
                                            </tr>
                                            <tr  class="bg-color">
                                                                        <td colspan="6" style="text-align:center">JOMINY HARDENABILITY BAND (IS : 3848)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="div-scroll">
                                                    <table class="table">
                                                                    <tr class="bg-color">
                                                                       <td>DISTANCE (in inches)</td>
                                                                       <td></td>
                                                                       <td>J1/16''</td>
                                                                       <td>2/16''</td>
                                                                       <td>3/16''</td>
                                                                       <td>4/16''</td>
                                                                       <td>5/16''</td>
                                                                       <td>6/16''</td>
                                                                       <td>7/16''</td>
                                                                       <td>8/16''</td>
                                                                       <td>9/16''</td>
                                                                       <td>10/16''</td>
                                                                       <td>11/16''</td>
                                                                       <td>12/16''</td>
                                                                       <td>13/16''</td>
                                                                       <td>14/16''</td>
                                                                       <td>15/16''</td>
                                                                       <td>16/16''</td>
                                                                       <td>17/16''</td>
                                                                       <td>18/16''</td>
                                                                       <td>19/16''</td>
                                                                       <td>20/16''</td>
                                                                    </tr>
                                                                    <tr class="bg-color">
                                                                       <td>DISTANCE (in mm)</td>
                                                                       <td></td>
                                                                       <td>1.59</td>
                                                                       <td>3.175</td>
                                                                       <td>4.77</td>
                                                                       <td>6.35</td>
                                                                       <td>7.94</td>
                                                                       <td>9.525</td>
                                                                       <td>11.1125</td>
                                                                       <td>12.7</td>
                                                                       <td>14.29</td>
                                                                       <td>15.875</td>
                                                                       <td>17.47</td>
                                                                       <td>19.05</td>
                                                                       <td>20.64</td>
                                                                       <td>22.225</td>
                                                                       <td>23.82</td>
                                                                       <td>25.4</td>
                                                                       <td>26.99</td>
                                                                       <td>28.58</td>
                                                                       <td>30.17</td>
                                                                       <td>31.75</td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td class="bg-color">MIN SPEC</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_min_spec'.$i.'" name="hardness_test_min_spec[]" value="'.$hardness_test_min_spec[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td class="bg-color">MAX SPEC</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_max_spec'.$i.'" name="hardness_test_max_spec[]" value="'.$hardness_test_max_spec[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   
                                                                   </tr>
                                                                    <tr>
                                                                       <td class="bg-color">MILL TC VALUE</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_milltc<?php echo $i; ?>" name="hardness_test_milltc[]" onkeyup="check_mid(<?php echo $i; ?>,this)" value="<?php echo $hardness_test_milltc[$i]?>"/></td>
                                                                         <script>
																		 $(document).ready(function(){
																	   check_mid(<?php echo $i; ?>,hardness_test_milltc<?php echo $i; ?>)
																		 });
																	  </script>
																		<?php }
                                                                       ?>
                                                                   </td>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td class="bg-color">FORGER TC VALUE</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_forgertc<?php echo $i; ?>" name="hardness_test_forgertc[]" onkeyup="check_mid(<?php echo $i; ?>,this)" value="<?php echo $hardness_test_forgertc[$i]?>"/></td>
                                                                       <script>
																		 $(document).ready(function(){
																	   check_mid(<?php echo $i; ?>,hardness_test_forgertc<?php echo $i; ?>)
																		 });
																	  </script>
																	   <?php  }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td class="bg-color">VECV VALUE</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                       <td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_vec<?php echo $i; ?>" name="hardness_test_vec[]" onkeyup="check_mid(<?php echo $i; ?>,this)" value="<?php echo $hardness_test_vec[$i]?>"/></td>
                                                                       <script>
																		 $(document).ready(function(){
																	   check_mid(<?php echo $i; ?>,hardness_test_vec<?php echo $i; ?>)
																		 });
																	  </script>
																	   <?php  }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td><input type="text" id="jominy_value1" name="jominy_value1" value="<?php echo $response['jominy_value2'] ?>" style="width:100px;"></td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test[]" name="hardness_test[]" value="'.$hardness_test[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td><input type="text" id="jominy_value2" name="jominy_value2" value="<?php echo $response['jominy_value2'] ?>" style="width:100px;"></td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test2[]" name="hardness_test2[]" value="'.$hardness_test2[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td class="bg-color">CALCULATED VALUE AS PER MILLTC</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_calculatedvalue'.$i.'" name="hardness_test_calculatedvalue[]" value="'.$hardness_test_calculatedvalue[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
																   <tr>
                                                                       <td class="bg-color">CALCULATED VALUE AS PER VECV</td>
                                                                         <td>
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) {
                                                                    echo  '<td style="padding-left:0px;padding-right:0px;"><input class="innerBoxes" type="text" id="hardness_test_calculatedvalue_vecv'.$i.'" name="hardness_test_calculatedvalue_vecv[]" value="'.$hardness_test_calculatedvalue_vecv[$i].'"/></td>';
                                                                         }
                                                                       ?>
                                                                   </td>
                                                                   </tr>
																   

                                                    </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr  class="bg-color">
                                                <td colspan="4" style="text-align:center;">METALLOGRAPHIC CHARACTERSITICS</td>
                                                <td colspan="2" style="text-align:center;">GAS CONTENT(PPM)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="div-scroll-metallographic">
                                                        <table class="table table-bordered">
                                                            <tr class="bg-color">
                                                                <td colspan="4" style="text-align:center;">INCLUSION RATING IS:4163</td>
                                                                <td colspan="2" style="text-align:center;display: none;">DECARB IS:6396</td>
                                                                <td colspan="2" style="text-align:center;">GRAIN SIZE IS:4748</td>
																
																<td colspan="1" style="text-align:center;">MPI</td>
																<td colspan="1" style="text-align:center;">UT</td>
																<td colspan="1" style="text-align:center;">Radio active ELement</td>
																
                                                                <td style="display: none;">MICRO STRUCT.</td>
                                                                <td colspan="2" style="text-align:center;display: none;">INTERNAL SOUNDNESS ASTM, E381</td>
                                                            </tr>
                                                            <tr class="bg-color">
                                                                <td></td>
                                                                <td colspan="2" style="display: none;">REQ</td>
                                                                <td colspan="4" style="text-align: center;">ACT</td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="display: none;">ACT</td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="text-align: center;">ACT</td>
                                                                <td rowspan="2" style="display: none;"></td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="display: none;">ACT</td>
																
																<td rowspan="2" style="text-align: center;"></td>
                                                              <td rowspan="2" style="text-align: center;"></td>
                                                              <td  rowspan="2" style="text-align: center;"></td>
                                                            </tr>
                                                            <tr class="bg-color">
                                                                <td></td>
                                                                <td style="display: none;">Tn</td>
                                                                <td style="display: none;">Tk</td>
                                                                <td colspan="2">Tn</td>
                                                                <td colspan="2">Tk</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-color">A</td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tn[]" name="inclusion_rating_req_tn[]" class="innerBoxes" /></td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tk[]" name="inclusion_rating_req_tk[]" class="innerBoxes" /></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tn[]" name="inclusion_rating_act_tn[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tn[0] ?>" /></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tk[]" name="inclusion_rating_act_tk[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tk[0] ?>"/></td>
                                                                <td rowspan="4" style="display: none;"><input type="text" id="decarb_req" name="decarb_req" class="innerBoxes" /></td>
                                                                <td rowspan="4" style="display: none;"><input type="text" id="decarb_act" name="decarb_act" class="innerBoxes" /></td>
                                                                <td rowspan="4" style="display: none;" ><input type="text" id="grain_size_req" name="grain_size_req" class="innerBoxes" /></td>
                                                                <td rowspan="4" style="text-align: center;"><input type="text" id="grain_size_act" name="grain_size_act" class="" value="<?php echo $response['grain_size_act'] ?>"/></td>
                                                                
																<!-------MPI--->
																
                                                                <td colspan="1" style="text-align:center"><input type="text" id="mip_act" name="mip_act" style="width:60px;" autocomplete="off"  value="<?php echo $response['mip_act'] ?>"></td>
															
																
																<td colspan="1" style="text-align:center"><input type="text" id="ut_act" name="ut_act" style="width:60px;" autocomplete="off"  value="<?php echo $response['ut_act'] ?>"></td>
											 					<td colspan="1" style="text-align:center"><input type="text" id="radio_active_eLement_act" name="radio_active_eLement_act" style="width:100px;" autocomplete="off" value="<?php echo $response['radio_active_eLement_act'] ?>"></td>
																
                                                                <td rowspan="4" style="display: none;"><input type="text" id="micro_struct" name="micro_struct" class="innerBoxes" /></td>
                                                                <td rowspan="4" style="display: none;"><input type="text" id="internal_soundness_req" name="internal_soundness_req" class="innerBoxes" /></td>
                                                                <td rowspan="4" style="display: none;"><input type="text" id="internal_soundness_act" name="internal_soundness_act" class="innerBoxes" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-color">B</td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tn[]" name="inclusion_rating_req_tn[]" class="innerBoxes" /></td>
                                                                <td style="display: none;"<input type="text" id="inclusion_rating_req_tk[]" name="inclusion_rating_req_tk[]" class="innerBoxes" /></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tn[]" name="inclusion_rating_act_tn[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tn[1] ?>"/></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tk[]" name="inclusion_rating_act_tk[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tk[1] ?>"/></td>
                                                            </tr>
                                                            <tr>
                                                            <td class="bg-color">C</td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tn[]" name="inclusion_rating_req_tn[]" class="innerBoxes" /></td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tk[]" name="inclusion_rating_req_tk[]" class="innerBoxes" /></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tn[]" name="inclusion_rating_act_tn[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tn[2] ?>"/></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tk[]" name="inclusion_rating_act_tk[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tk[2] ?>"/></td>
                                                             </tr>
                                                             <tr>
                                                                <td class="bg-color">D</td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tn[]" name="inclusion_rating_req_tn[]" class="innerBoxes" /></td>
                                                                <td style="display: none;"><input type="text" id="inclusion_rating_req_tk[]" name="inclusion_rating_req_tk[]" class="innerBoxes" /></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tn[]" name="inclusion_rating_act_tn[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tn[3] ?>"/></td>
                                                                <td colspan="2"><input type="text" id="inclusion_rating_act_tk[]" name="inclusion_rating_act_tk[]" class="innerBoxes" value="<?php echo $inclusion_rating_act_tk[3] ?>"/></td>
                                                             </tr>   
                                                        </table>
                                                    </div>    
                                                </td>
                                                <td colspan="2">
                                                    <table class="table table-bordered">
                                                                                                               
                                                    <tr style="margin-top:20px" class="bg-color">
                                                        <td>GAS</td>
                                                        <td>REQ</td>
                                                        <td>ACT</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-color">O2</td>
                                                        <td><input type="text" id="gas_content_req[]" name="gas_content_req[]" class="innerBoxes" value="<?php if($gas_content_req[0]=='' ){ echo "20"; } else { echo $gas_content_req[0]; } ?>"/></td>
                                                        <td><input type="text" id="gas_content_act[]" name="gas_content_act[]" class="innerBoxes" value="<?php echo $gas_content_act[0] ?>"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-color">N2</td>
                                                        <td><input type="text" id="gas_content_req[]" name="gas_content_req[]" class="innerBoxes" value="<?php if ($gas_content_req[1]==''){echo "100"; } else {echo $gas_content_req[1];} ?>"/></td>
                                                        <td><input type="text" id="gas_content_act[]" name="gas_content_act[]" class="innerBoxes" value="<?php echo $gas_content_act[1] ?>"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-color">H2</td>
                                                        <td><input type="text" id="gas_content_req[]" name="gas_content_req[]" class="innerBoxes" value="<?php if($gas_content_req[2]==''){ echo "2"; } else {echo $gas_content_req[2];} ?>"/></td>
                                                        <td><input type="text" id="gas_content_act[]" name="gas_content_act[]" class="innerBoxes" value="<?php echo $gas_content_act[2] ?>"/></td>
                                                    </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="bg-color">
                                              <td>PART NO.</td>
                                              <td>OBSERVATION</td>
										    
                                              <td>MATERIAL GRADE</td>
                                              <td>ACCEPTED/REJECTED</td>
											    <td colspan="1">REMARK</td>
											    <td colspan="1">Date</td>
                                            </tr>
                                            <?php $part_count=count($part_no);
											for($i=0; $i<$part_count; $i++){ ?>
                                            <tr>
                                              <td><input onkeyup="part_check(<?php echo $i; ?>),part_show_date(<?php echo $i; ?>)" type="text" id="part_no<?php echo $i; ?>" value="<?php echo $part_no[$i] ?>" name="part_no[]" onkeyup="getForgingImage('forging_image<?php echo $i ?>','part_no<?php echo $i ?>')"><p id="forging_image<?php echo $i ?>" style="margin:5px 0px 0px;">
                                               <?php $q2 = "SELECT forging_image FROM forging_drawing WHERE part_number='$part_no[$i]'";
                                               
                                               $rs = $crud->getSingleRow($q2);
											   if($part_no[$i]!=''){
                                                 if($rs){
                                                echo '<a href="img/part_image/'.$rs['forging_image'].'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a>';
                                               } }?></p>
                                              </td>
                                              
                                              <td><input type="text" id="observed" name="observed[]" value="<?php echo $observed[$i] ?>"></td>
                                              <td id="verified_by_td<?php echo $i; ?>"><select id="part_grade<?php echo $i; ?>" name="part_grade[]" style="width:140px;">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $part_grade[$i]){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select><span class="showError<?php echo $i; ?>" style="color:red;display: none;">This field is required</span></td>
                                              <td><select style="width:140px !important" id="accept" name="accept[]">
                                                <option value="">Select</option>
											  <option value="ACCEPTED" <?php if($accept[$i]=="ACCEPTED"){ ?> selected="selected" <?php } ?>>ACCEPTED</option>
											  <option value="REJECTED" <?php if($accept[$i]=='REJECTED'){ ?> selected="selected" <?php } ?>>REJECTED</option>
											  <option value="ACCEPT UNDER DEVIATION" <?php if($accept[$i]=='ACCEPT UNDER DEVIATION'){ ?> selected="selected" <?php } ?>>ACCEPT UNDER DEVIATION</option>
											  </select></td>
											  <!--<?php $qo = "SELECT * FROM steel_code WHERE part_no='$part_no[$i]'";
                                               
                                               $rso = $crud->getSingleRow($qo);?>
											  <td><?php echo $rso['steel_code']; ?></td>-->
                                              <td colspan="1"><textarea id="remark" name="remark[]" class="span12" value="<?php echo $remark[$i]; ?>"><?php echo $remark[$i];?></textarea></td>
											 
											  
											  <td><input type="text" id="part_date<?php echo $i; ?>" name="part_date[]" required="" autocomplete="off"  value="<?php 
											  
												 
 /* if($part_date[$i] =='0' or $part_date[$i] == '' or $part_no[$i]!=''){
		echo date('Y-m-d')
}else{
	echo $part_date[$i];
}	 */
if($part_date[$i] =='0' or $part_date[$i] == '' or $part_no[$i]!=''){
if($part_date[$i] =='0' or $part_date[$i] == '' and $part_no[$i] !='' ){
	echo date('Y-m-d');
	//	echo $part_date[$i];
	}else if($part_date[$i] == '' and $part_no[$i] ==''){
		//echo $part_date[$i];
	}else{
		echo $part_date[$i];
		//echo date('Y-m-d');
	}
}	
		 									  ?>" readOnly="" ></td>

<td><input type="hidden" id="part_current_date" style="width: 39%;" name="part_current_date" value="<?php echo date('Y-m-d',time()); ?>" readOnly=""/></td>
                                            </tr> 
                                            <?php } $p=$part_count; ?>
											<input type="hidden" name="filed_id" id="filed_id" value="<?php echo $p; ?>">
                                            							 
											<tbody class="controls input_fields_wrap">
											<tr>
                                              <td><input onkeyup="part_check(<?php echo $p; ?>),part_show_date(<?php echo $i; ?>)" type="text" id="part_no<?php echo $p; ?>" name="part_no[]" onkeyup="getForgingImage('forging_image<?php echo $p ?>','part_no<?php echo $p; ?>')"><p id="forging_image<?php echo $p ?>" style="margin:5px 0px 0px;"></p></td>
                                              
                                              <td><input type="text" id="observed" name="observed[]"></td>
                                              <td id="verified_by_td<?php echo $p; ?>"><select id="part_grade<?php echo $p; ?>" name="part_grade[]" style="width:140px;">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>" ><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select><span class="showError<?php echo $p; ?>" style="color:red;display: none;">This field is required</span></td>
                                              <td><select style="width:140px !important" id="accept" name="accept[]"><option value="">Select</option><option value="ACCEPTED">ACCEPTED</option><option value="REJECTED">REJECTED</option><option value="ACCEPT UNDER DEVIATION">ACCEPT UNDER DEVIATION</option></select></td>
											 
                                              <td ><textarea id="remark" name="remark[]" class="span12"></textarea></td>
											  
											
											    <td><input type="text" id="part_date<?php echo $i; ?>" name="part_date[]" required="" autocomplete="off" readOnly=""></td>
                                            </tr>
												</tbody>
												<tr><td><button class="add_field_button">+</button>
                                           </td> </tr>

                                            <tr>
                                                  <td class="bg-color">CHECKED BY</td>
                                                    <td colspan="1"><select id="checked_by" name="checked_by" required="">
                                                            <option value="">SELECT</option>
                                                            <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                 if($value['id'] == $response['checked_by']){
                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';
                                                          }else{
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                          }
                                                              
                                                          }
                                                        ?>
                                                        </select></td>
														<td class="bg-color">Prepared BY</td>
                                                    <td colspan="1"><select id="verified_by" name="verified_by" required="">
                                                            <option value="">SELECT</option>
                                                            <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("15",custom_field)';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                 if($value['id'] == $response['verified_by']){
                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';
                                                          }else{
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                          }
                                                              
                                                          }
                                                        ?>
                                                        </select></td>
                                                    <td class="bg-color">APPROVED BY</td>
                                                    <td colspan="1"><select id="approved_by" name="approved_by" required="">
                                                            <option value="">SELECT</option>
                                                            <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("16",custom_field)';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                if($value['id'] == $response['approved_by']) {
                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';
                                                              }else{
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                              }
                                                          }
                                                        ?>
                                                        </selecty"></td>
                                                    
                                                </tr>
                                            
                                        </table>
                                        
                                        <div class="">
                                            <div class="">
												<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Save</button>
                                            </div>
                                        </div>

                                </form>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>
<script>
$('.chemical_composition_field').on('keyup', function() {
    if (this.value[0] === '.') {
        this.value = '0'+this.value;
    }
});
</script>
        <script type="text/javascript">
		$(document).ready(function(){
				part_check();

        	});
			
			function part_show_date(part_new){
				var partno = 'part_no'+part_new;
	var part_no= $('#'+partno).val();
	 console.log(part_no);
	if(part_no != ''){
					
				var part_new_date= $('#part_current_date').val();
				
	$('#part_date'+part_new).val(part_new_date); 
	}else{
		
		var part_new_date ='';
		$('#part_date'+part_new).val(part_new_date); 
	}
}
		
			function part_check(grade){
				var p= grade;
				var part = 'part_grade'+p;
	            console.log(part);
				if($('#'+part).val()==''){
					$('#'+part).attr('required', 'required');
                 $('.showError'+p).css('display','block');
			$('#verified_by_td'+p).addClass('f-error');
			return false;
				}
			}
function calculatebloom(){
                var blo = $('#bloom_size').val();
				var bloom = $('#bloom_size2').val();
				var mm= $('#section').val();
				var dia= $('#reduction_ratio').val();
				 if(isNaN(blo)){
                  blo = 0;
                 }
                 else{
                  blo = blo;
                 }
				  if(isNaN(bloom)){
                  bloom = 0;
                 }
                 else{
                  bloom = bloom;
                 }
				  if(isNaN(mm)){
                  mm = 0;
                 }
                 else{
                  mm = mm;
                 }
				 if(isNaN(dia)){
                  dia = 0;
                 }
                 else{
                  dia = dia;
                 }
				 if(mm != ''){
					 dia='';
					 $('#reduction_ratio').val(dia);
				var cal= (blo*bloom)/(mm * mm);
				cal = cal.toFixed(2);
				$('#rr_for_tc').val(cal);
				 } if(dia !=''){
					mm='';
					 $('#section').val(mm);
				var cal_new= (blo*bloom)/((3.143)*(dia/2*dia/2));
				cal_new = cal_new.toFixed(2);
				 $('#rr_for_tc').val(cal_new);}
				 if(mm != '' || dia != '')
				 {
					 $d='';
					 $('#reduction_ratio').val(d);
					 $('#section').val(d);
					 $('#rr_for_tc').val(d);
				 }
}
            $(function(){

                 $('.datepicker').datepicker({

                    format : 'yyyy-mm-dd'

                 })

            });

            function pdffun(){    
          var id='<?php echo $id; ?>';
        window.location = 'customize_metallurgical_report.php?id='+id;
       } 
			
			 /*function pdffun(){		
			 if($('#verified_by option:selected').val()  == '' || $('#checked_by option:selected').val()  == '' || $('#approved_by option:selected').val()  == ''){
			$.sticky('Checked by , Verified by, Approved by must be selected', {autoclose : 3000, position: "top-center", type: "st-success" });			
			return false;
		}
			var r = 1;
		var x = '';
			$('input[name^="chemical_composition_min"]').each(function() {
                     if(r==1){
						 x+=$(this).val();
					 }
					 else {
						 x+='*'+$(this).val();
					 }
					 r++;
                });
				
			    var r1 =1;
				var sae_max = '';
			$('input[name^="chemical_composition_max"]').each(function() {
                     if(r1==1){
						 sae_max+=$(this).val();
					 }
					 else {
						 sae_max+='*'+$(this).val();
					 }
					 r1++;
                });
				
				var r2 =1;
				var che_obs = '';
			$('input[name^="chemical_composition_milltc"]').each(function() {
                     if(r2==1){
						 che_obs+=$(this).val();
					 }
					 else {
						 che_obs+='*'+$(this).val();
					 }
					 r2++;
                });
				

			 
		   $.ajax({				
		   type : 'POST',				
		   url : 'metallurgical_print_save.php',               
		   
data:$('#control_plan_form').serialize(),		   
		   dataType : 'JSON',			  
		   success : function(res){				
		   console.log(res.data);
	
			window.location = 'metallurgical_pdf.php?id='+res.data;	
		
		   },          
		   });		   }*/
		   
		/*    function printfun(){
			if($('#verified_by option:selected').val()  == '' || $('#checked_by option:selected').val()  == '' || $('#approved_by option:selected').val()  == ''){
			$.sticky('Checked by , Verified by, Approved by must be selected', {autoclose : 3000, position: "top-center", type: "st-success" });			
			return false;
		}
			var r = 1;
		var x = '';
			$('input[name^="chemical_composition_min"]').each(function() {
                     if(r==1){
						 x+=$(this).val();
					 }
					 else {
						 x+='*'+$(this).val();
					 }
					 r++;
                });
				
			    var r1 =1;
				var sae_max = '';
			$('input[name^="chemical_composition_max"]').each(function() {
                     if(r1==1){
						 sae_max+=$(this).val();
					 }
					 else {
						 sae_max+='*'+$(this).val();
					 }
					 r1++;
                });
				
				var r2 =1;
				var che_obs = '';
			$('input[name^="chemical_composition_milltc"]').each(function() {
                     if(r2==1){
						 che_obs+=$(this).val();
					 }
					 else {
						 che_obs+='*'+$(this).val();
					 }
					 r2++;
                });
				

			 
		   $.ajax({				
		   type : 'POST',				
		   url : 'metallurgical_print_save.php',               
		   
data:$('#control_plan_form').serialize(),		   
		   dataType : 'JSON',			  
		   success : function(res){				
		   console.log(res.data);
			
		   window.location = 'metallurgical_print.php?id='+res.data;	
			
		   },          
		   });		   }*/
			
           function getChemicalComposition(){
            $.ajax({
                url : 'get_chemical_composition.php',
                type : "POST",
                data : {
                   grade : $('#grade').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status ==1){
                    

                    var min = response.data.min.split(',');
                    var max = response.data.max.split(',');
                   var hardness_test_min_spec = response.data.hardness_test_min.split(',');
                   var hardness_test_max_spec = response.data.hardness_test_max.split(','); 
                    

                    $.each(min,function(i,val){
                       $('#chemical_composition_min'+i).val(val);
                    });
                    $.each(max,function(i,val){
                       $('#chemical_composition_max'+i).val(val);
                       
                    });
                    $.each(hardness_test_min_spec,function(i,val){
                       $('#hardness_test_min_spec'+i).val(val);
                    });
                    $.each(hardness_test_max_spec,function(i,val){
                       $('#hardness_test_max_spec'+i).val(val);
                       
                    });
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
           function getForgingImage(id,part_id){
                
              $.ajax({
                url : 'get_forging_drawing.php',
                type : "POST",
                data : {
                   part_number : $('#'+part_id).val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status ==1){
                    
                    $('#'+id).html('');
                    $('#'+id).append('<a href="img/part_image/'+response.data.forging_image+'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a>');

                    
                  }
                  else{
                    $('#'+id).html('');

                  }
                }
            });
           }
		   
		   	function check_mid(id,arg)
			{
				var j_min = $('#hardness_test_min_spec'+id).val();
				var j_max = $('#hardness_test_max_spec'+id).val();
				if(isNaN(j_min)){
                  j_min = 0;
                 }
                 else{
                  j_min = j_min;
                 }
                 if(isNaN(j_max)){
                  j_max = 0;
                 }
                 else{
                  j_max = j_max;
                 } 
			     var sid = arg.getAttribute('id');
				 var j_mil = arg.value;
				 if(isNaN(j_mil)){
                  j_mil = 0;
                 }
                 else{
                  j_mil = j_mil;
                 }
				 j_min = parseFloat(j_min);
				 j_max = parseFloat(j_max);
				 j_mil = parseFloat(j_mil);
				 if(j_mil<j_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(j_mil<j_max){
					  $('#'+sid).removeClass('error1');
				 }
			}	

           function calculateAverage(id,arg){
			    var c_min = $('#chemical_composition_min'+id).val();
				var c_max = $('#chemical_composition_max'+id).val();
                var one = $('#chemical_composition_milltc'+id).val();
                var two = $('#chemical_composition_forgertc'+id).val();
                var three = $('#chemical_composition_partyremark'+id).val();
                var four = $('#chemical_composition'+id).val();
                var five = $('#chemical_composition2'+id).val();
				 if(isNaN(c_min)){
                  c_min = 0;
                 }
                 else{
                  c_min = c_min;
                 }
                 if(isNaN(c_max)){
                  c_max = 0;
                 }
                 else{
                  c_max = c_max;
                 } 
                 if(isNaN(one)){
                  one = 0;
                 }
                 else{
                  one = one;
                 }
                 if(isNaN(two)){
                  two = 0;
                 }
                 else{
                  two = two;
                 } 
                 if(isNaN(three)){
                  three = 0;
                 }
                 else{
                  three = three;
                 }
                 if(isNaN(four)){
                  four = 0;
                 }
                 else{
                  four = four;
                 }
                 if(isNaN(five)){
                  five = 0;
                 }
                 else{
                  five = five;
                 } 
                  var total = Number(one)+Number(two)+Number(three)+Number(four)+Number(five);
                  $('#chemical_composition_avg'+id).val(total);
                  var c_perc,mn_perc,cr_perc,ni_perc,mo_perc;
                  
                     var c_perc = $('#chemical_composition_milltc'+0).val();
                  
                  
                     var mn_perc = $('#chemical_composition_milltc'+1).val();
                  
                  
                     var cr_perc = $('#chemical_composition_milltc'+6).val();
                  
                  
                     var ni_perc = $('#chemical_composition_milltc'+5).val();
                  
                  
                     var mo_perc = $('#chemical_composition_milltc'+7).val();


                    
                    if(c_perc && mn_perc && cr_perc && ni_perc && mo_perc){
                      var x =5;
                        j4 = (87*(c_perc)+16*mn_perc+13.25*cr_perc+5.3*ni_perc+28.5*mo_perc+22-(21.2*(Math.sqrt(4))-2.21*4));
                        j4 = Math.round(j4 * 10) / 10;
                        $('#hardness_test_calculatedvalue'+3).html('');
                        $('#hardness_test_calculatedvalue'+3).val(j4);
                      for(i=4; i<=20; i++){
                      var j5 =(87*(c_perc)+16*mn_perc+14*cr_perc+5.3*ni_perc+29*mo_perc+22-(21.2*(Math.sqrt(x))-2.21*x));
                      j5 = Math.round( j5 * 10 ) / 10;
                      $('#hardness_test_calculatedvalue'+i).html('');
                      $('#hardness_test_calculatedvalue'+i).val(j5);
                        x++;
                      }
                      j1=37+((c_perc)-0.08)*60;
                      j1 = Math.round(j1 * 10) / 10;
                      $('#hardness_test_calculatedvalue'+0).html('');
                      $('#hardness_test_calculatedvalue'+0).val(j1);
                      j2=((j1)-((j1)-(j4))*0.1);
                      j2 = Math.round(j2 * 10) / 10;
                      $('#hardness_test_calculatedvalue'+1).html('');
                      $('#hardness_test_calculatedvalue'+1).val(j2);
                      j3 = ((j1-((j1)-(j4))*0.5));
                      j3 = Math.round(j3 * 10) / 10;
                      $('#hardness_test_calculatedvalue'+2).html('');
                      $('#hardness_test_calculatedvalue'+2).val(j3);
                                
                    }
                 

         var sid = arg.getAttribute('id');
				 var c_mil = arg.value;
				 if(isNaN(c_mil)){
                  c_mil = 0;
                 }
                 else{
                  c_mil = c_mil;
                 }
				 c_min = parseFloat(c_min);
				 c_max = parseFloat(c_max);
				 c_mil = parseFloat(c_mil);
				 if(c_mil<c_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(c_mil>c_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(c_mil>c_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(c_mil<c_max){
					  $('#'+sid).removeClass('error1');
				 }
           }
         
		   ////calculateAverage_vecv
		   
		    function calculateAverageVecv(id,arg){
			    var c_min = $('#chemical_composition_min'+id).val();
				var c_max = $('#chemical_composition_max'+id).val();
                var one = $('#chemical_composition_milltc'+id).val();
                var two = $('#chemical_composition_forgertc'+id).val();
                var three = $('#chemical_composition_partyremark'+id).val();
                var four = $('#chemical_composition'+id).val();
                var five = $('#chemical_composition2'+id).val();
				 if(isNaN(c_min)){
                  c_min = 0;
                 }
                 else{
                  c_min = c_min;
                 }
                 if(isNaN(c_max)){
                  c_max = 0;
                 }
                 else{
                  c_max = c_max;
                 } 
                 if(isNaN(one)){
                  one = 0;
                 }
                 else{
                  one = one;
                 }
                 if(isNaN(two)){
                  two = 0;
                 }
                 else{
                  two = two;
                 } 
                 if(isNaN(three)){
                  three = 0;
                 }
                 else{
                  three = three;
                 }
                 if(isNaN(four)){
                  four = 0;
                 }
                 else{
                  four = four;
                 }
                 if(isNaN(five)){
                  five = 0;
                 }
                 else{
                  five = five;
                 } 
                  var total = (Number(one)+Number(two)+Number(three)+Number(four)+Number(five))/5;
                  $('#chemical_composition_avg'+id).val(total);
                  var c_perc,mn_perc,cr_perc,ni_perc,mo_perc;
                  
                     var c_perc = $('#chemical_composition'+0).val();
                  
                  
                     var mn_perc = $('#chemical_composition'+1).val();
                  
                  
                     var cr_perc = $('#chemical_composition'+6).val();
                  
                  
                     var ni_perc = $('#chemical_composition'+5).val();
                  
                  
                     var mo_perc = $('#chemical_composition'+7).val();


              
                    if(c_perc && mn_perc && cr_perc && ni_perc && mo_perc){
                      var x =5;
                        j4 = (87*(c_perc)+16*mn_perc+13.25*cr_perc+5.3*ni_perc+28.5*mo_perc+22-(21.2*(Math.sqrt(4))-2.21*4));
                        j4 = Math.round(j4 * 10) / 10;
                       $('#hardness_test_calculatedvalue_vecv'+3).html('');
                      $('#hardness_test_calculatedvalue_vecv'+3).val(j4);
                      for(i=4; i<=20; i++){
                      var j5 =(87*(c_perc)+16*mn_perc+14*cr_perc+5.3*ni_perc+29*mo_perc+22-(21.2*(Math.sqrt(x))-2.21*x));
                      j5 = Math.round( j5 * 10 ) / 10;
                      $('#hardness_test_calculatedvalue_vecv'+i).html('');
                      $('#hardness_test_calculatedvalue_vecv'+i).val(j5);
                        x++;
                      }
                      j1=37+((c_perc)-0.08)*60;
                      j1 = Math.round(j1 * 10) / 10;
                      $('#hardness_test_calculatedvalue_vecv'+0).html('');
                      $('#hardness_test_calculatedvalue_vecv'+0).val(j1);
                      j2=((j1)-((j1)-(j4))*0.1);
                      j2 = Math.round(j2 * 10) / 10;
                      $('#hardness_test_calculatedvalue_vecv'+1).html('');
                      $('#hardness_test_calculatedvalue_vecv'+1).val(j2);
                      j3 = ((j1-((j1)-(j4))*0.5));
                      j3 = Math.round(j3 * 10) / 10;
                      $('#hardness_test_calculatedvalue_vecv'+2).html('');
                      $('#hardness_test_calculatedvalue_vecv'+2).val(j3);
                                
                    }
             			  
			     var sid = arg.getAttribute('id');
				 var c_mil = arg.value;
				 if(isNaN(c_mil)){
                  c_mil = 0;
                 }
                 else{
                  c_mil = c_mil;
                 }
				 c_min = parseFloat(c_min);
				 c_max = parseFloat(c_max);
				 c_mil = parseFloat(c_mil);
				 if(c_mil<c_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(c_mil>c_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(c_mil>c_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(c_mil<c_max){
					  $('#'+sid).removeClass('error1');
				 }
           }

        </script>
<script>
		  $(document).ready(function() {
    var max_fields      = 1000; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = $('#filed_id').val(); //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<tr><td><input onkeyup="part_check('+x+'),part_show_date('+x+')" type="text" id="part_no'+x+'" name="part_no[]" ></td><td><input type="text" id="observed" name="observed[]"></td><td id="verified_by_td'+x+'"><select id="part_grade'+x+'" name="part_grade[]" style="width:140px;"><option value="">Select</option><?php $query = 'SELECT * FROM grade';$result = $crud->getAllData($query);foreach ($result as $key => $value) {?><option value="<?php echo $value['id']; ?>" ><?php echo $value['grade']; ?></option><?php } ?></select></td><td><select style="width:140px !important" id="accept" name="accept[]"><option value="">Select</option><option value="ACCEPTED">ACCEPTED</option><option value="REJECTED">REJECTED</option><option value="ACCEPT UNDER DEVIATION">ACCEPT UNDER DEVIATION</option></select></td><td ><td><input type="text" id="part_date'+x+'" name="part_date[]" required="" autocomplete="off" readOnly=""></td></tr>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('tr').remove(); x--;
    })
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$("#rd_add_weight_btn").click(function(){
              $.ajax({
                url : 'add_additional_weight.php',
                type : "POST",
                data : {
                   heat_no : $("#heat_no").val(),
                   weight : $("#weight").val(),
                   additional_weight : $("#rd_weight").val(),
                   user_id : '<?php echo $response['user_id']; ?>'
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status ==1){
                      new_weight=response.new_weight;
                      modal.style.display = "none";
                      alert(new_weight);
                      $("#weight").val(new_weight);
                  }
                  else{

                  }
                }
            });
});
	</script>
        