<?php include_once("header.php"); ?>

<style type="text/css">
  /*td{
    border-top: none !important;

  }*/
     td input{
        width:140px !important;
     } 
     .span1{
        width:100px !important;
     }    
 .innerBoxes{
        width:40px !important;
        }
        .div-scroll
{
width:1270px;
overflow-x:scroll;
}
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
                                 <?php $id = $_GET['id']; ?>
                                <div class="pull-right">
                                    <a href="update_control_plan?id=<?php echo $id; ?>" target="_blank"><span class="label"><i class="splashy-pencil_small"></i><span class="jQ-todoAll-count">Edit Metallurgical Report</span></span></a>
                                </div>

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

                                  
                                  $q2 = 'SELECT * FROM control_plan WHERE id='.$id;
                                  $response = $crud->getSingleRow($q2);
                                  $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
                                  $hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
                                  $hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
                                  $hardness_traverse_ag = explode('*',$response['hardness_traverse_ag']);
                                  $hardness_traverse_extra = explode('*',$response['hardness_traverse_extra']);

                                ?>

                                

                                <form class="form-horizontal" action="control_plan_sub.php" id="control_plan_form" method="post">
                                        
                                        <div class="span12">
                                            <input type="hidden" name="furnace_id" id="furnace_id" value="<?php echo $_GET['id'];  ?>" />
                                        	<table class="table table-bordered" style="margin-top:20px;">
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td>REPORT NO.</td>
                                                    <td><?php echo $response['report_no']; ?>
                                                              </td>
                                                </tr>
                                            	<tr>
                                                	<td>PART NO.</td>
                                                    <td><?php echo $response['part_no']; ?></td>
                                                    <td>BATCH CODE</td>
                                                    <td><?php echo $response['batch_code']; ?></td>
                                                    <td>CUSTOMER NAME</td>
                                                    <td colspan="2"><?php echo $response['customer']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                	<td>ID</td>
                                                    <td><?php echo $response['control_plan_id']; ?></td>
                                                    <td>STEEL CODE</td>
                                                    <td>
                                                    	<?php echo $response['steel_code']; ?>
                                                    </td>
                                                    <td colspan="3">
                                                    	<?php echo $response['steel_code3']; ?>
                                                    </td>
                                                   <!--  <td>
                                                       <?php echo $response['steel_code3']; ?>
                                                    </td> -->
                                                   
                                                </tr>
                                                
                                                <tr>
                                                	<td>QTY</td>
                                                    <td><?php echo $response['qty']; ?></td>
                                                    <td>CUT PART</td>
                                                    <td><?php echo $response['cut_part']; ?></td>
                                                    <td>DATE</td>
                                                    <td colspan="2"><?php echo $response['date']; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>GRADE</td>
                                                    <td colspan="6"><?php echo $response['grade']; ?></td>
                                                </tr>
                                                <tr>
                                                	<th style="background:#A2A2A2; color:#FFF;" colspan="7">OTHER CLUBBED PART</th>
                                                </tr>
                                                
                                                <tr>
                                                	<td>PART NO.</td>
                                                    <td><?php echo $response['other_clubbed_part_no']; ?></td>
                                                    <td><?php echo $response['other_clubbed_part_no2']; ?></td>
                                                    <td><?php echo $response['other_clubbed_part_no3']; ?></td>
                                                    <td><?php echo $response['other_clubbed_part_no4']; ?></td>
                                                    <td><?php echo $response['other_clubbed_part_no5']; ?></td>
                                                    <td><?php echo $response['other_clubbed_part_no6']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>ID</td>
                                                    <td><?php echo $response['other_clubbed_id']; ?></td>
                                                    <td><?php echo $response['other_clubbed_id2']; ?></td>
                                                    <td><?php echo $response['other_clubbed_id3']; ?></td>
                                                    <td><?php echo $response['other_clubbed_id4']; ?></td>
                                                    <td><?php echo $response['other_clubbed_id5']; ?></td>
                                                    <td><?php echo $response['other_clubbed_id6']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>QTY</td>
                                                    <td><?php echo $response['other_clubbed_qty']; ?></td>
                                                    <td><?php echo $response['other_clubbed_qty2']; ?></td>
                                                    <td><?php echo $response['other_clubbed_qty3']; ?></td>
                                                    <td><?php echo $response['other_clubbed_qty4']; ?></td>
                                                    <td><?php echo $response['other_clubbed_qty5']; ?></td>
                                                    <td><?php echo $response['other_clubbed_qty6']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                	<th style="background:#A2A2A2; color:#FFF;" colspan="7">PROCESS PARAMETERS</th>
                                                </tr>
                                                
                                                <tr>
                                                	<th>PARAMETRS</th>
                                                    <th>CARBURIZING</th>
                                                    <th>DIFFUSION 1/2</th>
                                                    <th>HARDENING</th>
                                                    <th>QUENCH OIL</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                
                                                <tr>
                                                	<td>TEMP</td>
                                                    <td><?php echo $response['curbeizing_temp']; ?></td>
                                                    <td><?php echo $response['diffusion_temp']; ?></td>
                                                    <td><?php echo $response['hardening_temp']; ?></td>
                                                    <td><?php echo $response['quench_oil_temp']; ?>RPM</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>TIME</td>
                                                    <td><?php echo $response['curbeizing_time']; ?></td>
                                                    <td><?php echo $response['diffusion_time']; ?></td>
                                                    <td><?php echo $response['hardening_time']; ?></td>
                                                    <td><?php echo $response['quench_oil_time']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>C.P.</td>
                                                    <td><?php echo $response['curbeizing_cp']; ?></td>
                                                    <td><?php echo $response['diffusion_cp']; ?></td>
                                                    <td><?php echo $response['hardening_cp']; ?></td>
                                                    <td><?php echo $response['quench_oil_cp']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<th style="background:#A2A2A2; color:#FFF;" colspan="7">METALLURGICAL TEST RESULT</th>
                                                </tr>
                                                
                                                 <tr>
                                                	<th>PARAMETRS</th>
                                                    <th>LOCATION</th>
                                                    <th>REQUIREMENT</th>
                                                    <th>OBSERVATION</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                
                                                <tr>
                                                	<td>SURFACE HARDNESS</td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>SURFACE HARDNESS</td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>EFFECTIVE CASE DEPTH</td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_pcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_rcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_rcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_ID_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_ID_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_OD_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_OD_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>CUT OFF POINTS</td>
                                                    <td colspan="6"><?php echo $response['cut_off']; ?></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<td>CORE HARDNESS</td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_rcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>THREAD HARDNESS</td>
                                                    <td><?php echo $response['thread_hardness_location']; ?></td>
                                                    <td><?php echo $response['thread_hardness_requirement']; ?></td>
                                                    <td><?php echo $response['thread_hardness_observation']; ?></td>
                                                    <!-- <td colspan="3" rowspan="9"><div id="graph"></div></td> -->
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_ID_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_ID_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>MICRO STRUCTURE</td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_micro_core_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_core_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<td>GBO/IGO</td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_pcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_pcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_rcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_rcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<td>NMTP/SURFACE BAINITE</td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_rcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>ITP/SUB-SURFACE BAINITE</td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_pcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td></td>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_rcd_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                	<th style="background:#A2A2A2; color:#FFF;" colspan="7">HARDNESS TRAVERSE</th>
                                                </tr>
                                                 
                                                <tr>
                                                     <td colspan="7">
                                                        <div id="div1" class="div-scroll">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                    <td colspan="2">LOCATION (Distance in MM)</td>

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
                                                <tr>
                                                    <td>PCD</td>
                                                    <td><?php for($i=0; $i<26; $i++) {
                                                        echo '<td>'.$hardness_traverse_pcd[$i].'</td>';
                                                    } ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>RCD</td>
                                                    <td><?php for($i=0; $i<26; $i++) {
                                                        echo '<td>'.$hardness_traverse_rcd[$i].'</td>';
                                                    } ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><?php echo $response['hardness_traverse_value']; ?></td>
                                                    <td><?php for($i=0; $i<26; $i++) {
                                                        echo '<td>'.$hardness_traverse_od[$i].'</td>';
                                                    } ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>A/G PCD</td>
                                                    <td><?php for($i=0; $i<26; $i++) {
                                                        echo '<td>'.$hardness_traverse_ag[$i].'</td>';
                                                    } ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $response['hardness_traverse_extra_value']; ?></td>
                                                    <td><?php for($i=0; $i<26; $i++) {
                                                        echo '<td>'.$hardness_traverse_extra[$i].'</td>';
                                                    } ?></td>
                                                </tr>    
                                                            </table>    
                                                            </div>
                                                        
                                                </td>
                                            </tr>
                                                <tr>
                                                	<td>BURN TEST</td>
                                                    <td><?php echo $response['burn_test1']; ?></td>
                                                    <td><?php echo $response['burn_test2']; ?></td>
                                                    <td><?php echo $response['burn_test3']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>SHOT PEENING ARC INTENSITY</td>
                                                    <td><?php echo $response['shop_peenign_arc_initencity1']; ?></td>
                                                    <td><?php echo $response['shop_peenign_arc_initencity2']; ?></td>
                                                    <td><?php echo $response['shop_peenign_arc_initencity3']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>REMARKS</td>
                                                    <td colspan="6"><?php echo $response['remark']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                	<td>CHECKED BY</td>
                                                    <td><?php if($response['checked_by'] != ''){
                                                        $q = 'SELECT full_name FROM users WHERE id='.$response['checked_by'];
                                                        $rs = $crud->getSingleRow($q);
                                                      echo $rs['full_name']; } ?></td>
                                                    <td>APPROVED BY</td>
                                                    <td><?php
                                                       $q = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                                        $rs = $crud->getSingleRow($q);
                                                     echo $rs['full_name']; ?></td>
                                                    <td>DISPOSITION</td>
                                                    <td colspan="2">
                                                        <?php echo $response['disposition']; ?>
                                                    	
                                                    </td>
                                                    <!-- <td></td> -->
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div>
                                            <div>
												<button style="visibility: hidden"   type="button"></button>
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

            $(function(){

                 $('.datepicker').datepicker({

                    format : 'yyyy-mm-dd'

                 })



            });
           
        </script>
        <style type="text/css">
   /*#example2_wrapper .row {
        padding:10px;
        margin-left:0px;
    }*/
    .splashy-pencil_small{
        margin-top: -2px !important;
    }
    .jQ-todoAll-count{
        font-size:13px !important;
    }
</style>

        