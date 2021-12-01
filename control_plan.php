<?php include_once("header.php"); ?>

<style type="text/css">
.bg-color{
    background-color: #006dcc;
    color: #fff; 
   }
  /*td{
    border-top: none !important;

  }*/
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
     td input{
        width:140px !important;
     } 
     td select{
        width:140px !important;
     } 
     .span1{
        width:100px !important;
     }    
 .innerBoxes{
        width:25px !important;
        }
        .div-scroll
{
	width:1270px;
	overflow-x:scroll;
}
.input-color{
	background-color: #3db1fb33 !important;
}
.error{
	color:red;
}
.text_blue {
    color: blue !important;
}
.blueText{ color:blue; }
.grayText{ color:gray; }
.redText{ color:red; }

</style>
 

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                    <li><a href="#">Metallurgical Report</a></li>

                   

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <div class="w-box-header">

                                <p style="text-align: center;">METALLURGICAL REPORT</p>

                            </div>

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

                                ?>

                                

                                <form class="form-horizontal" action="control_plan_sub.php" id="control_plan_form" method="post" enctype="multipart/form-data">
                                        
                                        <div class="span12">
                                            <input type="hidden" name="furnace_id" id="furnace_id" value="<?php echo $_GET['id'];  ?>" />

                                        	<table class="table table-bordered" style="margin-top:20px;">
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="bg-color">REPORT NO.</td>
                                                    <td><?php $id = $_GET['id'];
                                                             $query = 'SELECT furnace_no FROM furnace WHERE id='.$id;
                                                             $rs = $crud->getSingleRow($query);
                                                             $q3 = 'SELECT current_date FROM control_plan ORDER BY id ASC limit 1';
                                                             $rs3 = $crud->getSingleRow($q3);
                                                             $curr_date = $rs3['current_date'];
                                                             $date = time();
                                                             $date3 = date('Y-m-d',$date);
                                                             $rs3 = explode('-', $curr_date);
                                                             $date3 = explode('-',$date3);
                                                             if($rs3[0] == $date3[0] && $rs3[1] == $date3[1]){
                                                              
                                                             $date4 = date('ym',$date);
                                                             $q2 = 'SELECT max(report_code) as report_code FROM control_plan WHERE furnace_no="'.$rs['furnace_no'].'" AND report_year="'.$date4.'"';
                                                             $rs2 = $crud->getSingleRow($q2);
                                                             $rs2 = sprintf('%03d', $rs2['report_code'] + 1);
                                                             $date2 = time();
                                                             $date2 = date('Y-m-d H:i:s',$date2);
                                                             $rpt = $rs['furnace_no'].$date4.$rs2;
                                                                }
                                                                else if($rs3[1] == $date3[1]){
                                                                  
                                                             $date4 = date('ym',$date);
                                                                   $q2 = 'SELECT max(report_code) as report_code FROM control_plan WHERE furnace_no="'.$rs['furnace_no'].'" AND report_year="'.$date4.'"';
                                                             $rs2 = $crud->getSingleRow($q2);
                                                             $rs2 = sprintf('%03d', $rs2['report_code'] + 1);
                                                             $date2 = time();
                                                             $date2 = date('Y-m-d H:i:s',$date2);
                                                             $rpt = $rs['furnace_no'].$date4.$rs2;
                                                                }
                                                                else{
                                                                  
                                                                  $rs2 = "001";
                                                                   $date4 = date('ym',$date);
                                                                   $date2 = time();
                                                                   $date2 = date('Y-m-d H:i:s',$date2);
                                                                   $rpt = $rs['furnace_no'].$date4.$rs2;
                                                                }
                                                              ?>
                                                                  <input type="text" id="report_no" name="report_no" value="<?php echo $rpt  ?>" readOnly=""/>
                                                                   <input type="hidden" name="furnace_no" id="furnace_no" value="<?php echo $rs['furnace_no']  ?>" />
                                                                   <input type="hidden" name="report_code" value="<?php echo $rs2; ?>">
                                                                   <input type="hidden" name="report_year" value="<?php echo $date4; ?>">
                                                              </td>
                                                </tr>
                                            	<tr>
                                                	<td class="bg-color">PART NO.</td>
                                                    <td><div class="input-append">
                                                    <input type="text" size="16" name="part_no" id="part_no" class="span10"><button type="button" onclick="checkPart()"  class="btn" id="go"  style="padding-bottom: 2px;">GO</button>
                                                </div></td>
                                                    <td></td>
                                                    <td class="bg-color"><!-- BATCH CODE --> DATE</td>
                                                    <td><!-- <input type="text" id="batch_code" name="batch_code"> --><input type="text" id="date" name="date" class="datepicker" value="<?php echo $date2; ?>" readOnly=""></td>
                                                    <td></td>
                                                    <td rowspan="1"><div id="image"></div><div><div id="part_image"></div><div id="part_image2" ></div><div id="part_image3"></div></td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-color">PART NAME</td>
                                                    <td><input type="text" id="part_name" name="part_name" class="input-color"></td>
                                                    <td></td>
                                                    <td class="bg-color">BATCH CODE</td>
                                                    <td><input type="text" id="batch_code" name="batch_code"></td>
													<td class="bg-color">CHARGE NUMBER</td>
                                                    <td><input type="text" id="charge_number" name="charge_number" maxlength="3"  pattern="\d{3}"></td>
                                                </tr>
                                                
                                                
                                                 <tr>
													<td class="bg-color">PART ID</td>
                                                    <td><input type="text" id="control_plan_id" name="control_plan_id" class="input-color"></td>
                                                    <td>
                                                        <input type="text" id="steel_code3" name="steel_code3" style="display: none;">
                                                    </td>
                                                    <td class="bg-color">STEEL CODE</td>
                                                    <td>
                                                        <input type="text" id="steel_code" name="steel_code">
                                                    </td>
                                                    <?php
													if($_GET['id'] == '35' || $_GET['id'] == 34){
														$supp_query = "select * from `supplier` order by id desc";
														$supp_result = $crud->getAllData($supp_query);
														//echo "<pre>";print_r($supp_result);die;
														$supp_data='';
														foreach($supp_result as $suppkey=>$suppvalue){
															$supp_data.='<option value="'.$suppvalue['id'].'">'.$suppvalue['name'].'</option>';
															}
														
														?>
														<td class="bg-color">Supplier Name</td>
                                                    <td>
                                                    	<select id="supplier_name" name="supplier_name" >
                                                        	<option value="">Select</option>
                                                            <?php echo $supp_data; ?>
                                                        </select>
                                                    </td>
														<?php }
													 ?>

													
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">MATERIAL GRADE</td>
                                                    <td><input type="text" id="material_grade" name="material_grade" class="input-color"></td>
                                                    <td></td>
                                                    <td class="bg-color">CUT PART</td>
                                                    <td><select id="cut_part" name="cut_part" style="width:150px;" onchange="showField()">
                                                        <option value="">Select</option>
														<option value="Ok">Ok</option>
                                                        <option value="Reject">Reject</option>
                                                         <!-- <option value="Actual Ok Full Part">Actual Ok Full Part</option>
                                                        <option value="Actual Ok Cut Part">Actual Ok Cut Part</option>
                                                        <!--<option value="Actual Rejected Full Part">Actual Rejected Full Part</option>
                                                        //<option value="Actual Rejected Cut Part">Actual Rejected Cut Part</option>
                                                        <option value="Segment Off">Segment Off</option>-->
                                                    </select></td>
                                                    <td><input type="text" style="display: none;" id="segment_off_extra" name="segment_off_extra"></td>
                                                    
                                                 </tr>
                                                <tr>
                                                    <td class="bg-color">CUSTOMER NAME</td>
                                                    <td><input type="text" id="customer" name="customer" class="input-color" onchange="customername()" readOnly></td>
                                                    <td></td>
                                                    <td class="bg-color">QTY</td>
                                                    <td><input type="text" id="qty" name="qty"></td>
                                                    <td colspan="2"><input style="width:186px !important" type="file" name="part_image" id="part_image"/></td>
                                                </tr>
                                                
                                                <tr  class="bg-color">
                                                	<th>OTHER CLUBBED PART</th>
                                                    <td style="text-align: center;">II</td>
                                                    <td style="text-align: center;">III</td>
                                                    <td style="text-align: center;">IV</td>
                                                    <td style="text-align: center;">V</td>
                                                    <td style="text-align: center;">VI</td>
                                                    <td style="text-align: center;">VII</td>

                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">PART NO.</td>
                                                    <td><input type="text" id="other_clubbed_part_no" name="other_clubbed_part_no"
                                                        onkeyup="getPartId('other_clubbed_part_no','other_clubbed_id')"></td>
                                                    <td><input type="text" id="other_clubbed_part_no2" name="other_clubbed_part_no2" onkeyup="getPartId('other_clubbed_part_no2','other_clubbed_id2')"></td>
                                                    <td><input type="text" id="other_clubbed_part_no3" name="other_clubbed_part_no3" onkeyup="getPartId('other_clubbed_part_no3','other_clubbed_id3')"></td>
                                                    <td><input type="text" id="other_clubbed_part_no4" name="other_clubbed_part_no4" onkeyup="getPartId('other_clubbed_part_no4','other_clubbed_id4')"></td>
                                                    <td><input type="text" id="other_clubbed_part_no5" name="other_clubbed_part_no5" onkeyup="getPartId('other_clubbed_part_no5','other_clubbed_id5')"/></td>
                                                    <td><input type="text" id="other_clubbed_part_no6" name="other_clubbed_part_no6" onkeyup="getPartId('other_clubbed_part_no6','other_clubbed_id6')"/></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">PART ID</td>
                                                    <td><input type="text" id="other_clubbed_id" name="other_clubbed_id"></td>
                                                    <td><input type="text" id="other_clubbed_id2" name="other_clubbed_id2"></td>
                                                    <td><input type="text" id="other_clubbed_id3" name="other_clubbed_id3"></td>
                                                    <td><input type="text" id="other_clubbed_id4" name="other_clubbed_id4"></td>
                                                    <td><input type="text" id="other_clubbed_id5" name="other_clubbed_id5"/></td>
                                                    <td><input type="text" id="other_clubbed_id6" name="other_clubbed_id6"/></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">QTY</td>
                                                    <td><input type="text" id="other_clubbed_qty" name="other_clubbed_qty"></td>
                                                    <td><input type="text" id="other_clubbed_qty2" name="other_clubbed_qty2"></td>
                                                    <td><input type="text" id="other_clubbed_qty3" name="other_clubbed_qty3"></td>
                                                    <td><input type="text" id="other_clubbed_qty4" name="other_clubbed_qty4"></td>
                                                    <td><input type="text" id="other_clubbed_qty5" name="other_clubbed_qty5"/></td>
                                                    <td><input type="text" id="other_clubbed_qty6" name="other_clubbed_qty6"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-color">STEEL CODE</td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"></td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"></td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"></td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"></td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"/></td>
                                                    <td><input type="text" id="other_clubbed_steel_code[]" name="other_clubbed_steel_code[]"/></td>
                                                </tr>
                                                
                                                <tr>
                                                	<th  colspan="7" class="bg-color" style="text-align: center;">PROCESS PARAMETERS</th>
                                                </tr>
                                                
                                                <tr>
                                                  <td colspan="7">
                                                    <table>
                                                     <tr class="bg-color">
                                                	<th>PARAMETRS</th>
                                                    <th>CARBURIZING</th>
                                                    <th>DIFFUSION 1/2</th>
                                                    <th>HARDENING</th>
                                                    <th>QUENCH OIL</th>
													<th id="p9">TEMPERING</th>
                                                    <th>CHARGE IN TIME</th>
                                                    <th>CHARGE OUT TIME</th>
                                                </tr>
                                                
                                                
                                                <tr>

                                                    <td class="bg-color">TEMP(°C)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_temp" name="curbeizing_temp">
                           <span id="p9"><input type="text" style="width:60px !important;" id="curbeizing_temp1" name="curbeizing_temp1" ></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_temp" name="diffusion_temp">
                           <span id="p9"><input type="text" style="width:60px !important;" id="diffusion_temp1" name="diffusion_temp1" ></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_temp" name="hardening_temp" >
                           <span id="p9"><input type="text" style="width:60px !important;" id="hardening_temp1" name="hardening_temp1"></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_temp" name="quench_oil_temp" >
                           <span id="p9"><input type="text" style="width:60px !important;"  id="quench_oil_temp1" name="quench_oil_temp1"></span></td>
                                                    <td id="p9"><input type="text" style="width:60px !important;" id="temp_tempering" name="temp_tempering" >
                           <span id="p9"><input type="text" style="width:60px !important;"  id="temp_tempering1" name="temp_tempering1" ></span></td>
                                                    <td><input type="text" id="in_time" name="in_time" style="width:60px !important;"></td>

                                                    <td><input type="text" id="out_time" name="out_time" style="width:60px !important;"></td>

                                                </tr>
												<tr>

                                                    <td class="bg-color">TIME1(Minute)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_time" name="curbeizing_time" >
                           <span id="p9"><input type="text" style="width:60px !important;" id="curbeizing_time1" name="curbeizing_time1"></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_time" name="diffusion_time" >
                           <span id="p9"><input type="text" style="width:60px !important;" id="diffusion_time1" name="diffusion_time1" ></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_time" name="hardening_time" >
                           <span id="p9"><input type="text" style="width:60px !important;" id="hardening_time1" name="hardening_time1"></span></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_time" name="quench_oil_time">
                           <span id="p9"><input type="text" style="width:60px !important;" id="quench_oil_time1" name="quench_oil_time1"></span></td>
                                                      <td id="p9"><input type="text" style="width:60px !important;" id="time_tempering" name="time_tempering" >
                           <span id="p9"><input type="text" style="width:60px !important;"  id="time_tempering1" name="time_tempering1" ></span></td>
                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 250px;height: 64px;" ></textarea></td>

                                                </tr>
												  <tr>

                                                    <td class="bg-color">C.P.</td>

                                                    <td><input type="text" style="width:60px !important;"  id="curbeizing_cp" name="curbeizing_cp">
                          <span id="p9"><input type="text" style="width:60px !important;"  id="curbeizing_cp1" name="curbeizing_cp1"></span></td>

                                                    <td><input type="text" style="width:60px !important;"  id="diffusion_cp" name="diffusion_cp" >
                          <span id="p9"><input type="text" style="width:60px !important;"  id="diffusion_cp1" name="diffusion_cp1"></span></td>

                                                    <td><input type="text" style="width:60px !important;"  id="hardening_cp" name="hardening_cp">
                           <span id="p9"><input type="text" style="width:60px !important;"  id="hardening_cp1" name="hardening_cp1" ></span></td>

                                                    <td> <span id="p9"><input type="text" style="width:40px !important;"  id="quench_oil_cp1" name="quench_oil_cp1" ></span>
                          <div class="input-append"><input type="text" style="width:60px !important;" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" ><span class="add-on">RPM</span>

                                                </div></td>

                                                <td id="p9"><input type="text" style="width:60px !important;" id="cp_tempering" name="cp_tempering" >
                          <input type="text" style="width:60px !important;"  id="cp_tempering1" name="cp_tempering1" ></td>

                                                </tr>
												</table>
                                                  </td>
                                                </tr>
                                                <tr class="bg-color">
                                                	<th  colspan="7" style="text-align: center;">METALLURGICAL TEST RESULT</th>
                                                </tr>
                                                
                                                 <tr class="bg-color">
                                                	<th>PARAMETRS</th>
                                                    <th>LOCATION</th>
                                                    <th>REQUIREMENT</th>
                                                    <th>OBSERVATION</th>
                                                    <th  colspan="3">REMARK</th>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">SURFACE HARDNESS1</td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard1_location" name="metallurgical_test_surface_hard1_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard1_requirement" name="metallurgical_test_surface_hard1_requirement" style="width:60px !important" class="input-color">
                                                    <select class="input-color" style="width:80px !important;" name="surface_hardnessloc_value" id="surface_hardnessloc_value">
                                                      <option value="">Select</option>
                                                  <option value="HRC">HRC</option>
                                                  <option value="HRA">HRA</option>
                                                  

                                                  <option value="HR15N">HR15N</option>
                                                  <option value="HR30N">HR30N</option>
                                                  <option value="HV">HV</option>
                                                </select></td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard1_observation" name="metallurgical_test_surface_hard1_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark1" name="remark1" style="width:510px !important;"></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">SURFACE HARDNESS2</td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard2_location" name="metallurgical_test_surface_hard2_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard2_requirement" name="metallurgical_test_surface_hard2_requirement" style="width:60px !important" class="input-color"><select class="input-color" style="width:80px !important;" name="surface_hardnessloc1_value" id="surface_hardnessloc1_value">
                                                      <option value="">Select</option>

                                                  <option value="HRC">HRC</option>
                                                  <option value="HRA">HRA</option>
                                                  

                                                  <option value="HR15N">HR15N</option>
                                                  <option value="HR30N">HR30N</option>
                                                  <option value="HV">HV</option>
                                                </select></td>
                                                    <td><input type="text" id="metallurgical_test_surface_hard2_observation" name="metallurgical_test_surface_hard2_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark2" name="remark2" style="width:510px !important;"></td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">EFFECTIVE CASE DEPTH</td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_pcd_location" name="metallurgical_test_case_depth_pcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_pcd_requirement" name="metallurgical_test_case_depth_pcd_requirement" class="input-color"><span class="add-on">mm</span>
                                                </div></td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_pcd_observation" name="metallurgical_test_case_depth_pcd_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark3" name="remark3" style="width:510px !important;"></td>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_location" name="metallurgical_test_case_depth_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_requirement" name="metallurgical_test_case_depth_requirement" class="input-color"><span class="add-on">mm</span>
                                                </div></td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_observation" name="metallurgical_test_case_depth_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark4" name="remark4" style="width:510px !important;"></td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_location1" name="metallurgical_test_case_depth_location1" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_requirement1" name="metallurgical_test_case_depth_requirement1" class="input-color"><span class="add-on">mm</span>
                                                </div></td>
                                                    <td><input type="text" id="metallurgical_test_case_depth_observation1" name="metallurgical_test_case_depth_observation1"></td>
                                                    <td colspan="3"><input type="text" id="remark5" name="remark5" style="width:510px !important;"></td>
                                                 </tr>
                                                
                                                
                                                
                                                <tr>
                                                	<td class="bg-color">CUT OFF POINTS</td>
                                                    <td colspan="3"><input type="text" id="cut_off" name="cut_off" class="span1 input-color" style="width:65px !important"><select  class="input-color" style="width:80px !important;" name="cut_off_value" id="cut_off_value">
                                                  <option value="HV1">HV1</option>
                                                  <option value="HV0.5">HV0.5</option>
                                                </select></td>
                                                 <td colspan="3"><input type="text" id="remark6" name="remark6" style="width:510px !important;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<td class="bg-color">CORE HARDNESS</td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_location" name="metallurgical_test_core_hardness_pcd_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_requirement" name="metallurgical_test_core_hardness_pcd_requirement" style="width:60px !important;" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value1" id="core_hardness_value1">
                                                      <option value="">Select</option>

                                                  <option value="HRC">HRC</option>
                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>

                                                  </select></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_observation" name="metallurgical_test_core_hardness_pcd_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark7" name="remark7" style="width:510px !important;"></td>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_location" name="metallurgical_test_core_hardness_rcd_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_requirement" name="metallurgical_test_core_hardness_rcd_requirement" style="width:60px !important;" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value2" id="core_hardness_value2" >
                                                      <option value="">Select</option>

                                                  <option value="HRC">HRC</option>
                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>

                                                  </select></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_observation" name="metallurgical_test_core_hardness_rcd_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark8" name="remark8" style="width:510px !important;"></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_location" name="metallurgical_test_core_hardness_ID_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_requirement" name="metallurgical_test_core_hardness_ID_requirement" style="width:60px !important;" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value3" id="core_hardness_value3">
                                                      <option value="">Select</option>

                                                  <option value="HRC">HRC</option>
                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>

                                                  </select></td>
                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_observation" name="metallurgical_test_core_hardness_ID_observation"></td>
                                                    <td colspan="3"><input type="text" id="remark9" name="remark9" style="width:510px !important;"></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td class="bg-color">MICRO STRUCTURE</td>
                                                    <td><input type="text" id="metallurgical_test_micro_case_location" name="metallurgical_test_micro_case_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_micro_case_requirement" name="metallurgical_test_micro_case_requirement" class="input-color"></td>
                                                    <td><select id="metallurgical_test_micro_case_observation" name="metallurgical_test_micro_case_observation" style="width:150px;">
                                                        <option value="">Select</option>
                                                        <option value="T.M+R.A.2%">T.M+R.A.2%</option>
                                                        <option value="T.M+R.A.5%">T.M+R.A.5%</option>
                                                        <option value="T.M+R.A.5-10%">T.M+R.A.5-10%</option>
                                                        <option value="T.M+R.A.10-15%">T.M+R.A.10-15%</option>
                                                        <option value="T.M+R.A.15-20%">T.M+R.A.15-20%</option>
                                                        <option value="T.M+R.A.20-25%">T.M+R.A.20-25%</option>
                                                        <option value="T.M+R.A.25-30%">T.M+R.A.25-30%</option>
                                                        <option value="T.M+R.A.30-35%">T.M+R.A.30-35%</option>
                                                        <option value="A1-A1">A1-A1</option>
                                                        <option value="A1-A2">A1-A2</option>
                                                        <option value="U.T.M">U.T.M</option>
                                                        <option value="Hard & Tempered">Hard & Tempered</option>

                                                    </select></td>
                                                    <td colspan="3"><input type="text" id="remark_micro_case" name="remark_micro_case" style="width:510px !important;"></td>
                                                 </tr>
                                                
                                                <tr>
                                                    <td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_micro_core_location" name="metallurgical_test_micro_core_location" class="input-color"></td>
                                                    <td><input type="text" id="metallurgical_test_micro_core_requirement" name="metallurgical_test_micro_core_requirement" class="input-color"></td>
                                                    <td><select id="metallurgical_test_micro_core_observation" name="metallurgical_test_micro_core_observation" style="width:150px;">
                                                        <option value="">Select</option>
                                                        <option value="L.C.M+Bainite">L.C.M+Bainite</option>
                                                        <option value="F1-F2">F1-F2</option>
                                                        <option value="F2-F3">F2-F3</option>
                                                        <option value="F3-F4">F3-F4</option>
                                                        <option value="F4-F5">F4-F5</option>
                                                        <option value="Hard & Tempered">Hard & Tempered</option>
                                                        
                                                     </select></td>
                                                    <td colspan="3"><input type="text" id="remark_micro_core" name="remark_micro_core" style="width:510px !important;"></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td class="bg-color">THREAD HARDNESS</td>
                                                    <td><input type="text" id="thread_hardness_location" name="thread_hardness_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="thread_hardness_requirement" name="thread_hardness_requirement" class="input-color"><span class="add-on">HV1</span>
                                                </div></td>
                                                    <td><input type="text" id="thread_hardness_observation" name="thread_hardness_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_thread_hardness" name="remark_thread_hardness" style="width:510px !important;">
                                                     </td>
                                                 </tr>
                                                
                                                
                                                
                                                <tr>
                                                	<td class="bg-color">GBO/IGO</td>
                                                    <td><input type="text" id="metallurgical_test_gbo_igo_pcd_location" name="metallurgical_test_gbo_igo_pcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_gbo_igo_pcd_requirement" name="metallurgical_test_gbo_igo_pcd_requirement" class="input-color"><span class="add-on">μm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_gbo_igo_pcd_observation" name="metallurgical_test_gbo_igo_pcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_gbo" name="remark_gbo" style="width:510px !important;">
                                                     </td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_gbo_igo_rcd_location" name="metallurgical_test_gbo_igo_rcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_gbo_igo_rcd_requirement" name="metallurgical_test_gbo_igo_rcd_requirement" class="input-color"><span class="add-on">μm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_gbo_igo_rcd_observation" name="metallurgical_test_gbo_igo_rcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_gbo2" name="remark_gbo2" style="width:510px !important;">
                                                     </td>
                                                   
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<td class="bg-color">NMTP/SURFACE BAINITE</td>
                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_pcd_location" name="metallurgical_test_nmtp_surface_pcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_nmtp_surface_pcd_requirement" name="metallurgical_test_nmtp_surface_pcd_requirement" class="input-color"><span class="add-on">μm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_pcd_observation" name="metallurgical_test_nmtp_surface_pcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_nmtp" name="remark_nmtp" style="width:510px !important;">
                                                     </td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_rcd_location" name="metallurgical_test_nmtp_surface_rcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_nmtp_surface_rcd_requirement" name="metallurgical_test_nmtp_surface_rcd_requirement" class="input-color"><span class="add-on">μm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_rcd_observation" name="metallurgical_test_nmtp_surface_rcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_nmtp2" name="remark_nmtp2" style="width:510px !important;">
                                                     </td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">ITP/SUB-SURFACE BAINITE</td>
                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_pcd_location" name="metallurgical_test_itp_sub_surface_pcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_itp_sub_surface_pcd_requirement" name="metallurgical_test_itp_sub_surface_pcd_requirement" class="input-color"><span class="add-on">mm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_pcd_observation" name="metallurgical_test_itp_sub_surface_pcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_itp" name="remark_itp" style="width:510px !important;">
                                                     </td>
                                                 </tr>
                                                
                                                <tr>
                                                	<td class="bg-color"></td>
                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_rcd_location" name="metallurgical_test_itp_sub_surface_rcd_location" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_itp_sub_surface_rcd_requirement" name="metallurgical_test_itp_sub_surface_rcd_requirement" class="input-color"><span class="add-on">mm</span></div></td>
                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_rcd_observation" name="metallurgical_test_itp_sub_surface_rcd_observation"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_itp2" name="remark_itp2" style="width:510px !important;">
                                                     </td>
                                                   
                                                </tr>
                                                <tr>
                                                    <th class="bg-color">AFTER GRINDING</th>
                                                    <th colspan="3"></th>
                                                    <th colspan="3"></th>

                                                </tr>
                                                <tr>
                                                    <td rowspan="2" class="bg-color">EFFECTIVE CASE DEPTH</td>
                                                    <td><input type="text" id="eff_after_grinding_location1" name="eff_after_grinding_location1" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="eff_after_grinding_requirement1" name="eff_after_grinding_requirement1" class="input-color"><span class="add-on">mm</span></div></td>
                                                    <td>
                                                        <input type="text" id="remark_observe1" name="remark_observe1">
                                                        
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_ag" name="remark_ag" style="width:510px !important;">
                                                     </td>
                                                </tr>
                                                <tr>
                                                   
                                                    <td><input type="text" id="eff_after_grinding_location2" name="eff_after_grinding_location2" class="input-color"></td>
                                                    <td><div class="input-append"><input type="text" id="eff_after_grinding_requirement2" name="eff_after_grinding_requirement2" class="input-color"><span class="add-on">mm</span></div></td>
                                                    <td>
                                                        <input type="text" id="remark_observe2" name="remark_observe2">
                                                        
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_ag2" name="remark_ag2" style="width:510px !important;">
                                                    </td>
                                                </tr>
                                                <tr>

                                              <td class="bg-color">SURFACE HARDNESS</td>

                                              <td>

                                                <input value="" type="text" name="surface_hardness_location_after_grind" id="surface_hardness_location_after_grind" class="span5 input-color">
                                                </td>
                                                <td>
                                                 <input value="" type="text" name="surface_hardness_requirement_after_grind" id="surface_hardness_requirement_after_grind" class="span5 input-color" style="width:60px !important">

                                                  <select id="surface_hardness_value_after_grind"  name="surface_hardness_value_after_grind" style="width:80px !important" class="input-color">
                                                      <option value="">Select</option>

                                                  <option  value="HRC">HRC</option>

                                                  <option value="HRA">HRA</option>

                                                  <option value="HR15N">HR15N</option>

                                                  <option value="HR30N">HR30N</option>

                                                  <option value="HV">HV</option>

                                                </select>

                                              </td>
                                              <td>
                                                        <input type="text" id="remark_observe3" name="remark_observe3">
                                                        
                                                    </td>
                                              <td colspan="3">
                                                        <input type="text" id="remark_ag3" name="remark_ag3" style="width:510px !important;">
                                                </td>

                                                

                                             </tr>
                                             <tr>
                                                <td colspan="7"><div id="graph"></div></td>
                                             </tr>
                                                
                                                <tr class="bg-color">
                                                  <th><a class="btn btn-beoro-6" onclick="generateGraph()" style="padding:2px;">Generate Graph</a></th>
                                                	<th colspan="6" style="text-align: center;">HARDNESS TRAVERSE( in Hv)</th>
                                                </tr>
                                                 
                                                <tr>
                                                     <td colspan="7">
                                                        <div id="div1" class="div-scroll">
                                                            <table>
                                                                <tr class="bg-color">
                                                    <td>LOCATION (Distance in MM)</td>
                                                    <td>0.05</td>
                                                    <td>0.1</td>
                                                    <td>0.2</td>
                                                    <td>0.3</td>
                                                    <td>0.4</td>
                                                    <td>0.5</td>
                                                    <td>0.6</td>
                                                    <td>0.7</td>
                                                    <td>0.8</td>
                                                    <td>0.9</td>
                                                    <td>1.0</td>
                                                    <td>1.1</td>
                                                    <td>1.2</td>
                                                    <td>1.3</td>
                                                    <td>1.4</td>
                                                    <td>1.5</td>
                                                    <td>1.6</td>
                                                    <td>1.7</td>
                                                    <td>1.8</td>
                                                    <td>1.9</td>
                                                    <td>2.0</td>
                                                    <td>2.1</td>
                                                    <td>2.2</td>
                                                    <td>2.3</td>
                                                    <td>2.4</td>
                                                    <td>2.5</td>
                                                </tr>
                                                <!-- <tr class="bg-color">
                                                    <td><a class="btn btn-beoro-6" onclick="generateGraph()">Generate Graph</a></td>
                                                    <td colspan="16" style="text-align:center">Hardness in HV</td>
                                                    <td colspan="13"  style="text-align:center">Hardness in HV</td>
                                                </tr> -->
                                                <tr>
                                                    <td class="bg-color">PCD</td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="bg-color">RCD</td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><select id="hardness_traverse_value" name="hardness_traverse_value" style="width:150px;">
                                                        <option value="">Select</option>
                                                        <option value="A/G PCD">A/G PCD</option>
                                                        <option value="B/G ID">B/G ID</option>
                                                        <option value="B/G OD">B/G OD</option>
                                                        <option value="B/G ID">A/G ID</option>
                                                        <option value="B/G OD">A/G OD</option>
                                                        <option value="Internal Spline">Internal Spline</option>
                                                        <option value="External Spline">External Spline</option>

                                                    </select></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><select id="hardness_traverse_value2" name="hardness_traverse_value2" style="width:150px;">
                                                        <option value="">Select</option>
                                                        <option value="A/G PCD">A/G PCD</option>
                                                        <option value="B/G ID">B/G ID</option>
                                                        <option value="B/G OD">B/G OD</option>
                                                        <option value="B/G ID">A/G ID</option>
                                                        <option value="B/G OD">A/G OD</option>
                                                        <option value="Internal Spline">Internal Spline</option>
                                                        <option value="External Spline">External Spline</option>

                                                    </select></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="" name="hardness_traverse_extra_value"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                    <td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes"></td>
                                                </tr>    
                                                            </table>    
                                                            </div>
                                                </td>
                                            </tr>
                                                <tr>
                                                	<td class="bg-color">BURN TEST</td>
                                                    <td><input type="text" id="burn_test1" name="burn_test1" class="input-color"></td>
                                                    <td><input type="text" id="burn_test2" name="burn_test2" class="input-color"></td>
                                                    <td><input type="text" id="burn_test3" name="burn_test3"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_burn_test" name="remark_burn_test" style="width:510px !important;">
                                                     </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">SHOT PEENING ARC INTENSITY</td>
                                                    <td><input type="text" id="shop_peenign_arc_initencity1" name="shop_peenign_arc_initencity1" class="input-color"></td>
                                                    <td><input type="text" id="shop_peenign_arc_initencity2" name="shop_peenign_arc_initencity2" class="input-color"></td>
                                                    <td><input type="text" id="shop_peenign_arc_initencity3" name="shop_peenign_arc_initencity3"></td>
                                                    <td colspan="3">
                                                        <input type="text" id="remark_shot_peening" name="remark_shot_peening" style="width:510px !important;">
                                                     </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">REMARKS</td>
                                                    <td colspan="6"><textarea  id="remark" name="remark" row="16" class="span12" style="height:110px;"></textarea></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td class="bg-color">CHECKED BY</td>
                                                    <td><select id="checked_by" name="checked_by">
                                                            <option value="">SELECT</option>

                                                        <?php 
                                                        
                                                        $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                 
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';
                                                              
                                                          }
                                                        ?>
                                                            
                                                        </select></td>
                                                    <td class="bg-color">APPROVED BY</td>
                                                    <td><select id="approved_by" name="approved_by">
                                                            <option value="">SELECT</option>
                                                            <?php 
                                                            $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("16",custom_field)';
                                                            // $query ='SELECT id,full_name FROM users WHERE user_type=3';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                 
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';
                                                              
                                                          }
                                                        ?>
                                                        </select></td>
                                                    <td class="bg-color">DISPOSITION</td>
                                                    <td>
                                                    	<select id="disposition" name="disposition"  onchange="this.className=this.options[this.selectedIndex].className"
    class="grayText">
                                                        	<option value="" class="grayText">SELECT</option>
                                                        	<option value="ACCEPTED" class="grayText">ACCEPTED</option>
                                                            <option value="REJECTED" class="grayText">REJECTED</option>
                                                            <option value="HOLD FOR RETEMPRING" class="grayText">HOLD FOR RETEMPERING</option>
                                                            <option value="HOLD FOR REWORK" class="grayText">HOLD FOR REWORK</option>
                                                            <option value="KEEP PENDING" class="grayText">KEEP PENDING</option>
                                                            <option value="ACCEPTED UNDER DEVIATION" class="grayText">ACCEPTED UNDER DEVIATION</option>
                                                            <option value="ACCEPTED AFTER REWORK" class="grayText">ACCEPTED AFTER REWORK</option>
															<option value="PENDING FOR INSPECTION" class="redText">PENDING FOR INSPECTION</option>
                                                            <option value="CONDITIONALLY ACCEPTED" class="grayText">CONDITIONALLY ACCEPTED</option>
                                                            <option value="PENDING FOR MICRO" class="blueText" >PENDING FOR MICRO</option>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        
                                        <div class="">
                                            <div class="">
												<button type="submit" class="btn btn-primary" style="margin-top:20px">Save</button>
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

        <script type="text/javascript">
	$(document).ready(function(){
				customername();

        	});
			
			
			function checkPart(){
				var part_no = $('#part_no').val();
				//alert(part_no);
				  $.ajax({
					type : "POST",
					url : "ajax_control_plan.php",
					data : {
							part_no:part_no
						},
					 dataType : "HTML",
					success : function(data){
		
							$('#image').html(data);
			
					}
				});
				}
			
function customername(){
                var blo = $('#customer').val();
				if(blo == 'JOHN DEERE'){
					$('#p4,#p3,#p5').hide();
					$('#p6,#p7,#p8,#p9').show();
			}
			else{
				$('#p6,#p7,#p8,#p9').hide();
			}
}

            $(function(){

                 $('.datepicker').datepicker({

                   // date-format : 'yyyy-mm-dd'

                 })

    //             $('#graph').highcharts({
    //     title: {
    //         text: 'HARDNESS TRAVERSE GRAPH',
    //         x: -20 //center
    //     },
        
    //     xAxis: {
    //         title:{
    //            text : 'Distance in MM'
    //         },
    //         categories: ['0.05', '0.1', '0.2', '0.3', '0.4', '0.5',
    //             '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5',, '1.6', '1.7', '1.8', '1.9', '2.0','2.1','2.2','2.3','2.4','2.5'],
    //             plotLines: [{
    //       value: 1.5,
    //       color: 'red',
    //       width: 2,
    //       zIndex: 10
    //     }]
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Hardness in Hv'
    //         },
    //         plotLines: [{
    //             value: 3,
    //             width: 1,
    //             color: '#808080',
    //             zIndex: 10
    //         }]
    //     },
        
    //     legend: {
    //         layout: 'vertical',
    //         align: 'right',
    //         verticalAlign: 'middle',
    //         borderWidth: 0
    //     },
    //     credits: {
    //    enabled: false
    //  },
    //     series: [{
    //         name: 'PCD',
    //         data: [700,680,650,640,610,600,580,560,540,520,500]
    //     }, {
    //         name: 'RCD',
    //         data: [700,685,655,645,615,605,585,565,545,520,505]
    //     }, {
    //         name: 'ID',
    //         data: [700,670,645,635,605,598,575,545,525,505,495]
    //     }]
    // });

            });
           function showField(){
            var name= $('#cut_part').val();
            
            if(name == 'Segment Off'){
                $('#segment_off_extra').css('display','block');
            }
            else{
                $('#segment_off_extra').css('display','none');
            }

           }
           function getPartId(id,value){
               var part_no = $('#'+id).val();
               $.ajax({
            type : "POST",
            url : "get_part_data.php",
            data : {
                part_no : part_no
            },
            dataType : "JSON",
            success : function(data){
                if(data.status==1){
                    $('#'+value).val(data.data[0].part_id);
                }
            }
            });    
           }
           function generateGraph(){
                 var pcd = [];
                 var rcd = [];
                 var od = [];
                $('input[name^="Hardness_traverse_pcd"]').each(function() {
                         if($(this).val() == ''){
                          pcd.push(null);
                         }
                         else{
                         pcd.push(parseInt($(this).val())); 
                         }
                });
                $('input[name^="hardness_traverse_rcd"]').each(function() {
                        if($(this).val() == ''){
                          rcd.push(null);
                        }
                        else{
                        rcd.push(parseInt($(this).val())); 
                       }
                });
                $('input[name^="hardness_traverse_od"]').each(function() {
                       if($(this).val() == ''){
                        od.push(null);
                       }
                       else{
                         od.push(parseInt($(this).val())); 
                       }
                });
                 var cut_off = $('#cut_off').val();
                 var x = $('#hardness_traverse_value').val();
                  
                $('#graph').highcharts({
        title: {
            text: 'HARDNESS TRAVERSE GRAPH',
            x: -20 //center
        },
        
        xAxis: {
            title:{
               text : 'Distance in MM'
            },
            categories: ['0.05', '0.1', '0.2', '0.3', '0.4', '0.5',
                '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5',, '1.6', '1.7', '1.8', '1.9', '2.0','2.1','2.2','2.3','2.4','2.5'],
                plotLines: [{
          value: cut_off,
          color: 'red',
          width: 2,
          zIndex: 10
        }]
        },
        yAxis: {
            title: {
                text: 'Hardness in Hv'
            },
            plotLines: [{
                value: cut_off,
                width: 1,
                color: 'red',
                zIndex: 10
            }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        credits: {
       enabled: false
     },
        series: [{
          connectNulls: true,
            name: 'PCD',
            data: pcd
        }, {
          connectNulls: true,
            name: 'RCD',
            data: rcd
        }, {
          connectNulls: true,
            name: x,
            data: od
        }]
    });
           $(window).scrollTop($('#surface_hardness_location_after_grind').offset().top);    
           }
 
		  $('#charge_number').keyup(function() {	
    $('span.error-keyup-2').remove();
    var inputVal = $(this).val();
    var characterReg = /^([5-9]\d|[1-9]\d{2,})$/;
    if(!characterReg.test(inputVal)) {
        $(this).after('<span class="error error-keyup-2"> No special characters allowed.</span>');
    }
});
/*$('#charge_number').keyup(function(){ 
   if ( $(this).val().length === 1 && $(this).val() === 0 ){
      alert('No leading zeroes!');^(?:[1-9]\d*|0)$
   }^([5-9]\d|[1-9]\d{2,})$
);*/

        </script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script>

// just for the demos, avoids form submit

// $( "#control_plan_form" ).validate({
//   rules: {
//             charge_number: {
// 				number: true,
// 			}
//   }
// });
var countryVal;
$("#disposition").change(function() {
  var newVal = $(this).val();
  if (!confirm("Are you sure you want to "+$(this).val()+" ?")) {
    $(this).val(countryVal); //set back
    return;                  //abort!
  }
  /*  if(newVal=='PENDING FOR MICRO'){
	   $("#disposition").css('color','blue');
  }
  
  if(newVal!='PENDING FOR MICRO'){
	   $("#disposition").css('color','gray');
  } */
  //destroy branches
  countryVal = newVal;       //store new value for next time
  
});

 /*$('#disposition').on('change', function() {
  confirm("Are you sure you want to "+this.value);
});*/

</script>

        