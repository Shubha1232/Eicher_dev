<?php include_once("header.php"); ?>

<style type="text/css">
  /*td{
    border-top: none !important;

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
        width:40px !important;
        }*/
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

                                <span style="text-align: center;">METALLURGICAL REPORT</span>
                                <?php $id = $_GET['id']; ?>
                                <div class="pull-right">
                                    <a href="update_control_plan?id=<?php echo $id; ?>" target="_blank"><span class="label"><i class="splashy-pencil_small"></i><span class="jQ-todoAll-count">Edit</span></span></a>
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
                                   $id= $_GET['id'];
                                   $q2 = 'SELECT * FROM control_plan WHERE id='.$id;
                                  $response = $crud->getSingleRow($q2);
                                  $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
                                  $hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
                                  $hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
                                  $hardness_traverse_ag = explode('*',$response['hardness_traverse_ag']);
                                  $hardness_traverse_extra = explode('*',$response['hardness_traverse_extra']);
                                  $other_clubbed_steel_code = explode('*',$response['other_clubbed_steel_code']);
                                 ?>

                                
                                <input type="hidden" id="hardness_traverse_rcd" value="<?php echo $hardness_traverse_rcd ?>"/>
                                <input type="hidden" id="hardness_traverse_od" value="<?php echo $hardness_traverse_od ?>"/>
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
                                                    <td></td>
                                                    <td><!-- BATCH CODE --> DATE</td>
                                                    <td><!-- <input type="text" id="batch_code" name="batch_code"> --><?php echo $response['date']; ?></td>
                                                    <td></td>
                                                    <td rowspan="2"><div id="part_image"></div><div id="part_image2" ></div><div id="part_image3"></div></td>
                                                </tr>
                                                <tr>
                                                    <td>PART NAME</td>
                                                    <td><?php echo $response['part_name']; ?></td>
                                                    <td></td>
                                                    <td>BATCH CODE</td>
                                                    <td colspan="3"><?php echo $response['batch_code']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PART ID</td>
                                                    <td><?php echo $response['control_plan_id']; ?></td>
                                                    <td>
                                                        <input type="text" id="steel_code3" name="steel_code3" style="display: none;">
                                                    </td>
                                                    <td>STEEL CODE</td>
                                                    <td colspan="2">
                                                       <?php echo $response['steel_code']; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="steel_code2" name="steel_code2" style="display: none;">
                                                    </td>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                    <td>MATERIAL GRADE</td>
                                                    <td> <?php echo $response['grade']; ?></td>
                                                    <td></td>
                                                    <td>CUT PART</td>
                                                    <td><?php echo $response['cut_part']; ?></td>
                                                    <td colspan="2"><?php echo $response['segment_off_extra']; ?></td>
                                                   
                                                    
                                                </tr>
                                                <tr>
                                                    <td>CUSTOMER NAME</td>
                                                    <td><?php echo $response['customer']; ?></td>
                                                    <td></td>
                                                    <td>QTY</td>
                                                    <td><?php echo $response['qty']; ?></td>
                                                    <td colspan="2"><?php if($response['part_image']!= ''){ ?><a href="img/part_image/<?php echo $response['part_image'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a><?php }?></td>
                                                </tr>
                                                
                                                <tr style="background:#A2A2A2; color:#FFF;">
                                                    <th>OTHER CLUBBED PART</th>
                                                    
                                                    <td style="text-align: center;">II</td>
                                                    <td style="text-align: center;">III</td>
                                                    <td style="text-align: center;">IV</td>
                                                    <td style="text-align: center;">V</td>
                                                    <td style="text-align: center;">VI</td>
                                                    <td style="text-align: center;">VII</td>

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
                                                    <td>PART ID</td>
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
                                                    <td>STEEL CODE</td>
                                                    <?php for($i=0; $i<6; ++$i){ ?>
                                                    <td><?php echo $other_clubbed_steel_code[$i]; ?></td>
                                                    <?php } ?>
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
                                                    <th>CHARGE IN TIME</th>
                                                    <th>CHARGE OUT TIME</th>
                                                </tr>
                                                
                                                <tr>
                                                    <td>TEMP(°C)</td>
                                                    <td><?php echo $response['curbeizing_temp']; ?></td>
                                                    <td><?php echo $response['diffusion_temp']; ?></td>
                                                    <td><?php echo $response['hardening_temp']; ?></td>
                                                    <td><?php echo $response['quench_oil_temp']; ?></td>
                                                    <td><?php echo $response['in_time']; ?></td>
                                                    <td><?php echo $response['out_time']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>TIME(Minute)</td>
                                                    <td><?php echo $response['curbeizing_time']; ?></td>
                                                    <td><?php echo $response['diffusion_time']; ?></td>
                                                    <td><?php echo $response['hardening_time']; ?></td>
                                                    <td><?php echo $response['quench_oil_time']; ?></td>
                                                    <td rowspan="2" colspan="2"><?php echo $response['process_remark']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>C.P.</td>
                                                    <td><?php echo $response['curbeizing_cp']; ?></td>
                                                    <td><?php echo $response['diffusion_cp']; ?></td>
                                                    <td><?php echo $response['hardening_cp']; ?></td>
                                                    <td><?php if($response['quench_oil_cp']) {echo $response['quench_oil_cp'].' RPM'; }?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <th style="background:#A2A2A2; color:#FFF;" colspan="7">METALLURGICAL TEST RESULT</th>
                                                </tr>
                                                
                                                 <tr>
                                                    <th>PARAMETRS</th>
                                                    <th>LOCATION</th>
                                                    <th>REQUIREMENT</th>
                                                    <th>OBSERVATION</th>
                                                    <th  colspan="2">REMARK</th>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                    <td>SURFACE HARDNESS1</td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_requirement']; ?> <?php echo $response['surface_hardnessloc_value']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard1_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark1']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>SURFACE HARDNESS2</td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_requirement']; ?> <?php echo $response['surface_hardnessloc1_value']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_surface_hard2_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark2']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>EFFECTIVE CASE DEPTH</td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_pcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_case_depth_pcd_requirement']) {echo $response['metallurgical_test_case_depth_pcd_requirement'].' mm'; }?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark3']; ?></td>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_case_depth_requirement']) {echo $response['metallurgical_test_case_depth_requirement'].' mm'; } ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark4']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_location1']; ?></td>
                                                    <td><?php if($response['metallurgical_test_case_depth_requirement1']){echo $response['metallurgical_test_case_depth_requirement1'].' mm'; } ?></td>
                                                    <td><?php echo $response['metallurgical_test_case_depth_observation1']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark5']; ?></td>
                                                    
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td>CUT OFF POINTS</td>
                                                    <td colspan="3"><?php echo $response['cut_off']; ?> <?php echo $response['cut_off_value']; ?></td>
                                                 <td colspan="3"><?php echo $response['remark6']; ?></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td>CORE HARDNESS</td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_requirement']; ?> <?php echo $response['core_hardness_value1']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark7']; ?></td>
                                                   
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_rcd_requirement']; ?> <?php echo $response['core_hardness_value2']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark8']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_ID_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_ID_requirement']; ?> <?php echo $response['core_hardness_value3']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_core_hardness_ID_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark9']; ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>MICRO STRUCTURE</td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_case_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark_micro_case']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_micro_core_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_core_requirement']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_micro_core_observation']; ?></td>
                                                    <td colspan="3"><?php echo $response['remark_micro_core']; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>THREAD HARDNESS</td>
                                                    <td><?php echo $response['thread_hardness_location']; ?></td>
                                                    <td><?php if($response['thread_hardness_requirement']){echo $response['thread_hardness_requirement'].' HV1';} ?></td>
                                                    <td><?php echo $response['thread_hardness_observation']; ?></td>
                                                    <td colspan="3" rowspan="7"></td>
                                                    
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td>GBO/IGO</td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_pcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_gbo_igo_pcd_requirement']) {echo $response['metallurgical_test_gbo_igo_pcd_requirement'].' μm';} ?></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_pcd_observation']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_rcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_gbo_igo_rcd_requirement']){ echo $response['metallurgical_test_gbo_igo_rcd_requirement'].' μm'; }?></td>
                                                    <td><?php echo $response['metallurgical_test_gbo_igo_rcd_observation']; ?></td>
                                                   
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td>NMTP/SURFACE BAINITE</td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_location']; ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_requirement'].' μm'; ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_rcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_nmtp_surface_rcd_requirement']) {echo $response['metallurgical_test_nmtp_surface_rcd_requirement'].' μm';} ?></td>
                                                    <td><?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>ITP/SUB-SURFACE BAINITE</td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_pcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_itp_sub_surface_pcd_requirement']){echo $response['metallurgical_test_itp_sub_surface_pcd_requirement'].' mm'; }?></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_rcd_location']; ?></td>
                                                    <td><?php if($response['metallurgical_test_itp_sub_surface_rcd_requirement']){echo $response['metallurgical_test_itp_sub_surface_rcd_requirement'].' mm'; }?></td>
                                                    <td><?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <th style="background:#A2A2A2; color:#FFF;" colspan="3">AFTER GRINDING</th>
                                                    <th style="background:#A2A2A2; color:#FFF;"></th>

                                                    <th style="background:#A2A2A2; color:#FFF;" colspan="3"></th>

                                                </tr>
                                                <tr>
                                                    <td rowspan="2">EFFECTIVE CASE DEPTH</td>
                                                    <td><?php echo $response['eff_after_grinding_location1']; ?></td>
                                                    <td><?php if($response['eff_after_grinding_requirement1']){echo $response['eff_after_grinding_requirement1'].' mm'; }?></td>
                                                    <td>
                                                        <?php echo $response['remark_observe1'] ?>
                                               </td>
                                                    <td colspan="3">
                                                        <?php echo $response['remark_ag']; ?>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                   
                                                    <td><?php echo $response['eff_after_grinding_location2']; ?></td>
                                                    <td><?php if($response['eff_after_grinding_requirement2']){echo $response['eff_after_grinding_requirement2'].' mm';} ?></td>
                                                    <td>
                                                        <?php echo $response['remark_observe2'] ?>
                                               </td>
                                                    <td colspan="3">
                                                        <?php echo $response['remark_ag2']; ?>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>

                                              <td>SURFACE HARDNESS</td>

                                              <td>
                                                <?php echo $response['surface_hardness_location_after_grind']; ?>
                                               
                                                </td>
                                                <td>
                                                    <?php echo $response['surface_hardness_requirement_after_grind']; ?>
                                                    <?php echo $response['surface_hardness_value_after_grind']; ?>

                                                  

                                              </td>
                                              <td>
                                                        <?php echo $response['remark_observe3'] ?>
                                               </td>
                                              <td colspan="3">
                                                        <?php echo $response['remark_ag3']; ?>
                                                       
                                              </td>

                                              

                                                

                                             </tr>
                                               <tr>
                                                <td colspan="7"><div id="graph"></div></td>
                                               </tr>
                                                
                                                <tr>
                                                    <th style="background:#A2A2A2; color:#FFF;" colspan="7">HARDNESS TRAVERSE</th>
                                                </tr>
                                                 
                                                <tr>
                                                     <td colspan="7">
                                                        <div id="div1" class="div-scroll">
                                                            <table style="width:1287px;" class="table table-bordered">
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
                                                    <td colspan="2"></td>
                                                    <td colspan="26" style="background:#A2A2A2; color:#FFF;text-align:center">Hardness in HV</td>
                                                    <!-- <td colspan="13"  style="background:#A2A2A2; color:#FFF;text-align:center">Hardness in HV</td> -->
                                                </tr>
                                                <tr>
                                                    <td>PCD</td>
                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td>'.$hardness_traverse_pcd[$i].'</td>'; } ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>RCD</td>
                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td>'.$hardness_traverse_rcd[$i].'</td>'; } ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td><?php echo $response['hardness_traverse_value']; ?></td>
                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td>'.$hardness_traverse_od[$i].'</td>'; } ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td><?php echo $response['hardness_traverse_value2']; ?></td>
                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td>'.$hardness_traverse_ag[$i].'</td>'; } ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><?php echo $response['hardness_traverse_extra_value']; ?></td>
                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td>'.$hardness_traverse_extra[$i].'</td>'; } ?></td>
                                                    
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
                                                    <td><?php
                                                       $query = 'SELECT full_name FROM users WHERE id='.$response['checked_by'];
                                                       $rs = $crud->getSingleRow($query);

                                                     echo $rs['full_name']; ?></td>
                                                    <td>APPROVED BY</td>
                                                    <td><?php
                                                     $query = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                                       $rs = $crud->getSingleRow($query);
                                                     echo $rs['full_name']; ?></td>
                                                    <td>DISPOSITION</td>
                                                    <td>
                                                        <?php echo $response['disposition']; ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        
                                        <div class="">
                                            <div class="">
                                                <button style="visibility: hidden" type="submit" class="btn btn-primary">Save</button>
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
                 var pcd = <?php echo json_encode($hardness_traverse_pcd); ?>;
                 var pcdGraph = [];
                 $.each(pcd,function(i,val){
                    if(val == ""){
                        pcdGraph.push(0);
                    }
                    else{
                       pcdGraph.push(parseInt(val));
                    }
                    }
                 });
                 var rcd = <?php echo json_encode($hardness_traverse_rcd); ?>;
                 var rcdGraph = [];
                 $.each(rcd,function(i,val){
                    if(val == ""){
                        rcdGraph.push(0);
                    }
                    else{
                     rcdGraph.push(parseInt(val));
                    }
                 });
                 var od = <?php echo json_encode($hardness_traverse_od); ?>;
                 var odGraph = [];
                 $.each(od,function(i,val){
                    if(val == ""){
                        pcdGraph.push(0);
                    }
                    else{
                     odGraph.push(parseInt(val));
                    }
                 });
                 var cut_off = <?php echo json_encode($response['cut_off']); ?>;
                 var od_value = <?php echo json_encode($response['hardness_traverse_value']); ?>;
                   
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
                value: 0,
                width: 1,
                color: '#808080'
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
            name: 'PCD',
            data: pcdGraph
        }, {
            name: 'RCD',
            data: rcdGraph
        }, {
            name: od_value,
            data: odGraph
        }]
    });

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

      

        