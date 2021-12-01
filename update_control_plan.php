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

                                   $id = $_GET['id'];



                                   $q2 = 'SELECT * FROM control_plan WHERE id='.$id;

                                  $response = $crud->getSingleRow($q2);

                                  $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);

                                  $hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);

                                  $hardness_traverse_od = explode('*',$response['hardness_traverse_od']);

                                  $hardness_traverse_ag = explode('*',$response['hardness_traverse_ag']);

                                  $hardness_traverse_extra = explode('*',$response['hardness_traverse_extra']);

                                  $other_clubbed_steel_code = explode('*',$response['other_clubbed_steel_code']);



                                ?>



                                



                                <form class="form-horizontal control_plan_form" action="update_control_plan_sub.php" id="control_plan_form" method="post" enctype="multipart/form-data">

                                        

                                        <div class="span12">

                                            <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">

                                            <table class="table table-bordered" style="margin-top:20px;">
                                                <tr>
                                                  <td colspan="5"><a href="#" style="display: none;"> class="btn btn-danger" onclick="deleteControlPlan('<?php echo $id ?>')"/>DELETE</a></td>
                                                  <td colspan="2" style="text-align:right;">
<?php if($_SESSION['user_type'] != 20){ $customer = 0; if($response['customer'] == 'CATERPILLAR') {?><a href="ve_reports_1?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'AUTOLAC' || $response['customer'] == 'DANA SPICER' || $response['customer'] == 'ESCORTS' || $response['customer'] == 'SPICER INDIA' || $response['customer'] == 'TMA') {?><a href="new_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'REML' || $response['customer'] == 'RE' || $response['customer'] == 'SAME' || $response['customer'] == 'WARN' || $response['customer'] == 'MAHINDRA & MAHINDRA') {?><a href="reml_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'FORCE MOTOR') {?><a href="fm_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'ZF') {?><a href="zf_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'VOLVO' || $response['customer'] == 'VST') {?><a href="volvo_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'ETB') {?><a href="etb_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'POLARIS' || $response['customer'] == 'TAFE' ) {?><a href="polaris_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'CNH'){?><a href="cnh_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'JOHN DEERE') {?><a href="ve_reports_2?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($response['customer'] == 'JD IBERICA') {?><a href="jd_ib?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php $customer = $customer+1; } ?>
<?php if($customer == 0 ) {?><a href="new_report?id=<?php echo $response['id'] ?>" class="btn btn-primary" target="_blank">CUSTOMER REPORT</a><?php  }} ?>
</td>
                                                </tr>

                                                <tr>

                                                    <td colspan="5"><?php

                                                           $q5 = 'SELECT full_name FROM users WHERE id='.$response['user_id'];

                                                           $rs5 = $crud->getSingleRow($q5);

                                                     echo 'Last updated at '.$response['date'].' by '.$rs5['full_name'].'';  ?></td>

                                                    <td class="bg-color">REPORT NO.</td>

                                                    <td> <input type="text" id="report_no" name="report_no" value="<?php echo $response['report_no']  ?>" readOnly=""/>

                                                                   <input type="hidden" name="furnace_no" id="furnace_no" value="<?php echo $response['furnace_no']  ?>" />
																	<input type="hidden" name="report_code" value="<?php echo $response['report_code']; ?>">
                                                              </td>

                                                </tr>

                                                <tr>

                                                    <td class="bg-color">PART NO.</td>

                                                    <td><div class="input-append">

                                                    <input type="text" size="16" name="part_no" id="part_no" class="span10" value="<?php echo $response['part_no']; ?>"><button type="button" class="btn" id="go">GO</button>

                                                </div></td>

                                                    <td></td>

                                                    <td class="bg-color"><!-- BATCH CODE --> DATE</td>

                                                    <td><!-- <input type="text" id="batch_code" name="batch_code"> --><input type="text" id="date" name="date" class="" value="<?php echo $response['date']; ?>" readOnly=""><input type="hidden" name="current_date" value="<?php echo $response['current_date']; ?>" /></td>

                                                    <td></td>

                                                    <td rowspan="1"><div id="part_image"></div><div id="part_image2" ></div><div id="part_image3"></div></td>

                                                </tr>

                                                <tr>

                                                    <td class="bg-color">PART NAME</td>

                                                    <td><input type="text" id="part_name" name="part_name" value="<?php echo $response['part_name']; ?>" class="input-color"></td>

                                                    <td></td>

                                                    <td class="bg-color">BATCH CODE</td>

                                                    <td><input type="text" id="batch_code" name="batch_code" value="<?php echo $response['batch_code']; ?>"></td>
													 <td class="bg-color">CHARGE NUMBER</td>

                                                    <td><input type="text" id="charge_number" name="charge_number" maxlength="3"  pattern="\d{3}" value="<?php echo $response['charge_number']; ?>"></td>

                                                </tr>


                                                
                                                  <tr>

                                                   <td class="bg-color">PART ID</td>

                                                    <td><input type="text" id="control_plan_id" name="control_plan_id" value="<?php echo $response['control_plan_id']; ?>" class="input-color"></td>

                                                    <td>

                                                        <input type="text" id="steel_code3" name="steel_code3" style="display: none;">

                                                    </td>

                                                    <td class="bg-color">STEEL CODE</td>

                                                    <td>

                                                        <input type="text" id="steel_code" name="steel_code" value="<?php echo $response['steel_code']; ?>">

                                                    </td>
																<?php
																if($response['supplier'] != ''){
																	$suppqry = "select * from `supplier` where `id`='".$response['supplier']."' ";
																	$suppres = $crud->getSingleRow($suppqry);
																	$suppqry1 = "select * from `supplier` order by id desc";
																	$suppres1 = $crud->getAllData($suppqry1);
																	//echo "<pre>";print_r($suppres1);
																	$supp_data='';
																	foreach($suppres1 as $suppkey=>$suppvalue){
																		if($suppvalue['id'] == $suppres['id']){
																			$supp_data.='<option value="'.$suppvalue['id'].'" selected="selected">'.$suppvalue['name'].'</option>';
																			}else{
																				$supp_data.='<option value="'.$suppvalue['id'].'" >'.$suppvalue['name'].'</option>';
																				}
																		}
																	?>
																	<td class="bg-color">Supplier Name</td>

                                                    <td>
                                                    <select id="supplier_name" name="supplier_name" required>
                                                    	<?php echo $supp_data; ?>
                                                    </select>
                                                    </td>
																	<?php }
																 ?>

																 


                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">MATERIAL GRADE</td>

                                                    <td><input type="text" id="material_grade" name="material_grade" value="<?php echo $response['grade']; ?>" class="input-color"></td>

                                                    <td></td>

                                                    <td class="bg-color">CUT PART</td>

                                                    <td><select id="cut_part" name="cut_part" style="width:150px;" onchange="showField()" required="">
                                                        <option value="">Select</option>
														<option value="Ok" <?php if($response['cut_part']=='Ok'){ ?> selected="selected" <?php } ?>>Ok</option>

                                                        <option value="Reject" <?php if($response['cut_part']=='Reject'){ ?> selected="selected" <?php } ?>>Reject</option>

                                                       <!-- <option value="Actual Ok Full Part" <?php if($response['cut_part']=='Actual Ok Full Part'){ ?> selected="selected" <?php } ?>>Actual Ok Full Part</option>

                                                        <option value="Actual Ok Cut Part" <?php if($response['cut_part']=='Actual Ok Cut Part'){ ?> selected="selected" <?php } ?>>Actual Ok Cut Part</option>

                                                        <option value="Actual Rejected Full Part" <?php if($response['cut_part']=='Actual Rejected Full Part'){ ?> selected="selected" <?php } ?>>Actual Rejected Full Part</option>

                                                        <option value="Actual Rejected Cut Part" <?php if($response['cut_part']=='Actual Rejected Cut Part'){ ?> selected="selected" <?php } ?>>Actual Rejected Cut Part</option>

                                                        <option value="Segment Off" <?php if($response['cut_part']=='Segment Off'){ ?> selected="selected" <?php } ?>>Segment Off</option> -->

                                                    </select></td>

                                                    <td><input type="text"  id="segment_off_extra" name="segment_off_extra" value="<?php echo $response['segment_off_extra']; ?>"></td>

                                                 </tr>

                                                <tr>

                                                    <td class="bg-color">CUSTOMER NAME</td>

                                                    <td><input type="text" id="customer" name="customer" value="<?php echo $response['customer']; ?>" class="input-color"readOnly></td>

                                                    <td></td>

                                                    <td class="bg-color">QTY</td>

                                                    <td><input type="text" id="qty" name="qty" value="<?php echo $response['qty']; ?>"></td>

                                                    <td colspan="2"><?php if($response['part_image']!= ''){ ?><a href="img/part_image/<?php echo $response['part_image'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a><?php }?><input style="width:186px !important" type="file" name="part_image" id="part_image"/><input type="hidden" id="hidden_file_name" name="hidden_file_name" value="<?php echo $response['part_image']; ?>"></td>

                                                </tr>

                                                

                                                <tr class="bg-color">

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

                                                        onkeyup="getPartId('other_clubbed_part_no','other_clubbed_id')" value="<?php echo $response['other_clubbed_part_no']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_part_no2" name="other_clubbed_part_no2" onkeyup="getPartId('other_clubbed_part_no2','other_clubbed_id2')" value="<?php echo $response['other_clubbed_part_no2']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_part_no3" name="other_clubbed_part_no3" onkeyup="getPartId('other_clubbed_part_no3','other_clubbed_id3')" value="<?php echo $response['other_clubbed_part_no3']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_part_no4" name="other_clubbed_part_no4" onkeyup="getPartId('other_clubbed_part_no4','other_clubbed_id4')" value="<?php echo $response['other_clubbed_part_no4']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_part_no5" name="other_clubbed_part_no5" onkeyup="getPartId('other_clubbed_part_no5','other_clubbed_id5')" value="<?php echo $response['other_clubbed_part_no5']; ?>"/></td>

                                                    <td><input type="text" id="other_clubbed_part_no6" name="other_clubbed_part_no6" onkeyup="getPartId('other_clubbed_part_no6','other_clubbed_id6')" value="<?php echo $response['other_clubbed_part_no6']; ?>"/></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">PART ID</td>

                                                    <td><input type="text" id="other_clubbed_id" name="other_clubbed_id" value="<?php echo $response['other_clubbed_id']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_id2" name="other_clubbed_id2" value="<?php echo $response['other_clubbed_id2']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_id3" name="other_clubbed_id3" value="<?php echo $response['other_clubbed_id3']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_id4" name="other_clubbed_id4" value="<?php echo $response['other_clubbed_id4']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_id5" name="other_clubbed_id5" value="<?php echo $response['other_clubbed_id5']; ?>"/></td>

                                                    <td><input type="text" id="other_clubbed_id6" name="other_clubbed_id6" value="<?php echo $response['other_clubbed_id6']; ?>"/></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">QTY</td>

                                                    <td><input type="text" id="other_clubbed_qty" name="other_clubbed_qty" value="<?php echo $response['other_clubbed_qty']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_qty2" name="other_clubbed_qty2" value="<?php echo $response['other_clubbed_qty2']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_qty3" name="other_clubbed_qty3" value="<?php echo $response['other_clubbed_qty3']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_qty4" name="other_clubbed_qty4" value="<?php echo $response['other_clubbed_qty4']; ?>"></td>

                                                    <td><input type="text" id="other_clubbed_qty5" name="other_clubbed_qty5" value="<?php echo $response['other_clubbed_qty5']; ?>"/></td>

                                                    <td><input type="text" id="other_clubbed_qty6" name="other_clubbed_qty6" value="<?php echo $response['other_clubbed_qty6']; ?>"/></td>

                                                </tr>

                                                <tr>

                                                  <td class="bg-color">STEEL CODE</td>

                                                  <?php for($i=0; $i<6; ++$i){ ?>

                                                    <td><?php echo '<input type="text" name="other_clubbed_steel_code[]" value="'.$other_clubbed_steel_code[$i].'"/>' ?></td>

                                                    <?php } ?>

                                                </tr>

                                                

                                                <tr>

                                                    <th class="bg-color" colspan="7" style="text-align: center;">PROCESS PARAMETERS</th>

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

                                                    <th>TEMPERING</th>
                                                    <th>CHARGE IN TIME</th>

                                                    <th>CHARGE OUT TIME</th>
                                                     </tr>
                                                     <?php if($response['customer'] == 'JOHN DEERE'){?> <tr>

                                                    <td class="bg-color">TEMP(°C)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>">
                          <input type="text" style="width:60px !important;" id="curbeizing_temp1" name="curbeizing_temp1" value="<?php echo $response['curbeizing_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>">
                          <input type="text" style="width:60px !important;" id="diffusion_temp1" name="diffusion_temp1" value="<?php echo $response['diffusion_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>">
                          <input type="text" style="width:60px !important;" id="hardening_temp1" name="hardening_temp1" value="<?php echo $response['hardening_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>">
                          <input type="text" style="width:60px !important;"  id="quench_oil_temp1" name="quench_oil_temp1" value="<?php echo $response['quench_oil_temp1']; ?>"></td>
                                                    <td><input type="text" style="width:60px !important;" id="temp_tempering" name="temp_tempering" value="<?php echo $response['temp_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="temp_tempering1" name="temp_tempering1" value="<?php echo $response['temp_tempering1']; ?>"></td>
                                                    <td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>" style="width:60px !important;"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>" style="width:60px !important;"></td>

                                                </tr>
                         <?php } else{ ?>

                                                <tr>

                                                    <td class="bg-color">TEMP(°C)</td>

                                                    <td><input type="text" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>"></td>

                                                    <td><input type="text" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>"></td>
                                                    <td><input type="text" style="width:60px !important;" id="temp_tempering" name="temp_tempering" value="<?php echo $response['temp_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="temp_tempering1" name="temp_tempering1" value="<?php echo $response['temp_tempering1']; ?>"></td>
                                                    <td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>" style="width:60px !important;"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>" style="width:60px !important;"></td>

                                                </tr>

                         <?php } ?>
                         <?php if($response['customer'] == 'JOHN DEERE'){?>
                                                <tr>

                                                    <td class="bg-color">TIME1(Minute)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>">
                          <input type="text" style="width:60px !important;" id="curbeizing_time1" name="curbeizing_time1" value="<?php echo $response['curbeizing_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>">
                          <input type="text" style="width:60px !important;" id="diffusion_time1" name="diffusion_time1" value="<?php echo $response['diffusion_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>">
                          <input type="text" style="width:60px !important;" id="hardening_time1" name="hardening_time1" value="<?php echo $response['hardening_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>">
                          <input type="text" style="width:60px !important;" id="quench_oil_time1" name="quench_oil_time1" value="<?php echo $response['quench_oil_time1']; ?>"></td>
                                                      <td><input type="text" style="width:60px !important;" id="time_tempering" name="time_tempering" value="<?php echo $response['time_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="time_tempering1" name="time_tempering1" value="<?php echo $response['time_tempering1']; ?>"></td>
                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 250px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
                        <?php } else{ ?>
                         <tr>

                                                    <td class="bg-color">TIME(Minute)</td>

                                                    <td><input type="text" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>"></td>

                                                    <td><input type="text" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>"></td>

                                                    <td><input type="text" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>"></td>
                                                    <td><input type="text" style="width:60px !important;" id="time_tempering" name="time_tempering" value="<?php echo $response['time_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="time_tempering1" name="time_tempering1" value="<?php echo $response['time_tempering1']; ?>"></td>
                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 250px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
                        <?php } ?>
                        <?php if($response['customer'] == 'JOHN DEERE'){?>

                                                <tr>

                                                    <td class="bg-color">C.P.</td>

                                                    <td><input type="text" style="width:60px !important;"  id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>">
                          <input type="text" style="width:60px !important;"  id="curbeizing_cp1" name="curbeizing_cp1" value="<?php echo $response['curbeizing_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;"  id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>">
                          <input type="text" style="width:60px !important;"  id="diffusion_cp1" name="diffusion_cp1" value="<?php echo $response['diffusion_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;"  id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>">
                          <input type="text" style="width:60px !important;"  id="hardening_cp1" name="hardening_cp1" value="<?php echo $response['hardening_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;"  id="quench_oil_cp1" name="quench_oil_cp1" value="<?php echo $response['quench_oil_cp1']; ?>">
                          <div class="input-append"><input type="text" style="width:60px !important;" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" value="<?php echo $response['quench_oil_cp']; ?>"><span class="add-on">RPM</span>

                                                </div></td>

                                                <td><input type="text" style="width:60px !important;" id="cp_tempering" name="cp_tempering" value="<?php echo $response['cp_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="cp_tempering1" name="cp_tempering1" value="<?php echo $response['cp_tempering1']; ?>"></td>

                                                </tr>
                        <?php } else{ ?>
                                                <tr>

                                                    <td class="bg-color">C.P.</td>

                                                    <td><input type="text" id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>"></td>

                                                    <td><input type="text" id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>"></td>

                                                    <td><div class="input-append"><input type="text" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" value="<?php echo $response['quench_oil_cp']; ?>"><span class="add-on">RPM</span>

                                                </div></td>
                                                <td><input type="text" style="width:60px !important;" id="cp_tempering" name="cp_tempering" value="<?php echo $response['cp_tempering']; ?>">
                          <input type="text" style="width:60px !important;"  id="cp_tempering1" name="cp_tempering1" value="<?php echo $response['cp_tempering1']; ?>"></td>

                                                </tr>
                        <?php } ?> 

                       </table>
                                                  </td>
                                                </tr>

                                                <!-- <tr class="bg-color">

                                                    <th>PARAMETRS</th>

                                                    <th>CARBURIZING</th>

                                                    <th>DIFFUSION 1/2</th>

                                                    <th>HARDENING</th>

                                                    <th>QUENCH OIL</th>


                                                    <th>CHARGE IN TIME</th>

                                                    <th>CHARGE OUT TIME</th>

                                                </tr>

                                               <!-- <?php if($response['customer'] == 'JOHN DEERE'){?> <tr>

                                                    <td class="bg-color">TEMP(°C)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>">
													<input type="text" style="width:60px !important;" id="curbeizing_temp1" name="curbeizing_temp1" value="<?php echo $response['curbeizing_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>">
													<input type="text" style="width:60px !important;" id="diffusion_temp1" name="diffusion_temp1" value="<?php echo $response['diffusion_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>">
													<input type="text" style="width:60px !important;" id="hardening_temp1" name="hardening_temp1" value="<?php echo $response['hardening_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>">
													<input type="text" style="width:60px !important;"  id="quench_oil_temp1" name="quench_oil_temp1" value="<?php echo $response['quench_oil_temp1']; ?>"></td>

                                                    <td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>"></td>

                                                </tr>
											   <?php } else{ ?>

                                                <tr>

                                                    <td class="bg-color">TEMP(°C)</td>

                                                    <td><input type="text" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>"></td>

                                                    <td><input type="text" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>"></td>

                                                    <td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>"></td>

                                                </tr>

											   <?php } ?> -->
												<!-- <?php if($response['customer'] == 'JOHN DEERE'){?>
                                                <tr>

                                                    <td class="bg-color">TIME1(Minute)</td>

                                                    <td><input type="text" style="width:60px !important;" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>">
													<input type="text" style="width:60px !important;" id="curbeizing_time1" name="curbeizing_time1" value="<?php echo $response['curbeizing_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>">
													<input type="text" style="width:60px !important;" id="diffusion_time1" name="diffusion_time1" value="<?php echo $response['diffusion_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>">
													<input type="text" style="width:60px !important;" id="hardening_time1" name="hardening_time1" value="<?php echo $response['hardening_time1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>">
													<input type="text" style="width:60px !important;" id="quench_oil_time1" name="quench_oil_time1" value="<?php echo $response['quench_oil_time1']; ?>"></td>

                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 311px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
												<?php } else{ ?>
												 <tr>

                                                    <td class="bg-color">TIME(Minute)</td>

                                                    <td><input type="text" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>"></td>

                                                    <td><input type="text" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>"></td>

                                                    <td><input type="text" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>"></td>

                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 311px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
												<?php } ?>
                                                <?php if($response['customer'] == 'JOHN DEERE'){?>

                                                <tr>

                                                    <td class="bg-color">C.P.</td>

                                                    <td><input type="text" style="width:60px !important;"  id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>">
													<input type="text" style="width:60px !important;"  id="curbeizing_cp1" name="curbeizing_cp1" value="<?php echo $response['curbeizing_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;"  id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>">
													<input type="text" style="width:60px !important;"  id="diffusion_cp1" name="diffusion_cp1" value="<?php echo $response['diffusion_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:60px !important;"  id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>">
													<input type="text" style="width:60px !important;"  id="hardening_cp1" name="hardening_cp1" value="<?php echo $response['hardening_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;"  id="quench_oil_cp1" name="quench_oil_cp1" value="<?php echo $response['quench_oil_cp1']; ?>">
													<div class="input-append"><input type="text" style="width:60px !important;" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" value="<?php echo $response['quench_oil_cp']; ?>"><span class="add-on">RPM</span>

                                                </div></td>

                                                </tr>
												<?php } else{ ?>
                                                <tr>

                                                    <td class="bg-color">C.P.</td>

                                                    <td><input type="text" id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>"></td>

                                                    <td><input type="text" id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>"></td>

                                                    <td><div class="input-append"><input type="text" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" value="<?php echo $response['quench_oil_cp']; ?>"><span class="add-on">RPM</span>

                                                </div></td>

                                                </tr>
												<?php } ?> -->
                                                <tr>

                                                    <th class="bg-color" colspan="7" style="text-align: center;">METALLURGICAL TEST RESULT</th>

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

                                                    <td><input type="text" id="metallurgical_test_surface_hard1_location" name="metallurgical_test_surface_hard1_location" value="<?php echo $response['metallurgical_test_surface_hard1_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_surface_hard1_requirement" name="metallurgical_test_surface_hard1_requirement" style="width:60px !important" value="<?php echo $response['metallurgical_test_surface_hard1_requirement']; ?>" class="input-color"><select class="input-color" style="width:80px !important;" name="surface_hardnessloc_value" id="surface_hardnessloc_value">
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HRC" <?php if($response['surface_hardnessloc_value']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>

                                                  <option value="HRA" <?php if($response['surface_hardnessloc_value']=='HRA'){ ?> selected="selected" <?php } ?>>HRA</option>

                                                  



                                                  <option value="HR15N" <?php if($response['surface_hardnessloc_value']=='HR15N'){ ?> selected="selected" <?php } ?>>HR15N</option>

                                                  <option value="HR30N" <?php if($response['surface_hardnessloc_value']=='HR30N'){ ?> selected="selected" <?php } ?>>HR30N</option>

                                                  <option value="HV" <?php if($response['surface_hardnessloc_value']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>

                                                </select></td>

                                                    <td><input type="text" id="metallurgical_test_surface_hard1_observation" name="metallurgical_test_surface_hard1_observation" value="<?php echo $response['metallurgical_test_surface_hard1_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark1" name="remark1" style="width:510px !important;" value="<?php echo $response['remark1']; ?>"></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">SURFACE HARDNESS2</td>

                                                    <td><input type="text" id="metallurgical_test_surface_hard2_location" name="metallurgical_test_surface_hard2_location" value="<?php echo $response['metallurgical_test_surface_hard2_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_surface_hard2_requirement" name="metallurgical_test_surface_hard2_requirement" style="width:60px !important" value="<?php echo $response['metallurgical_test_surface_hard2_requirement']; ?>" class="input-color"><select class="input-color" style="width:80px !important;" name="surface_hardnessloc1_value" id="surface_hardnessloc1_value">
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HRC" <?php if($response['surface_hardnessloc1_value']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>

                                                  <option value="HRA" <?php if($response['surface_hardnessloc1_value']=='HRA'){ ?> selected="selected" <?php } ?>>HRA</option>

                                                  



                                                  <option value="HR15N" <?php if($response['surface_hardnessloc1_value']=='HR15N'){ ?> selected="selected" <?php } ?>>HR15N</option>

                                                  <option value="HR30N" <?php if($response['surface_hardnessloc1_value']=='HR30N'){ ?> selected="selected" <?php } ?>>HR30N</option>

                                                  <option value="HV" <?php if($response['surface_hardnessloc1_value']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>

                                                </select></td>

                                                    <td><input type="text" id="metallurgical_test_surface_hard2_observation" name="metallurgical_test_surface_hard2_observation" value="<?php echo $response['metallurgical_test_surface_hard2_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark2" name="remark2" style="width:510px !important;" value="<?php echo $response['remark2']; ?>"></td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">EFFECTIVE CASE DEPTH</td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_pcd_location" name="metallurgical_test_case_depth_pcd_location" value="<?php echo $response['metallurgical_test_case_depth_pcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_pcd_requirement" name="metallurgical_test_case_depth_pcd_requirement" value="<?php echo $response['metallurgical_test_case_depth_pcd_requirement']; ?>" class="input-color"><span class="add-on">mm</span>

                                                </div></td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_pcd_observation" name="metallurgical_test_case_depth_pcd_observation" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark3" name="remark3" style="width:510px !important;" value="<?php echo $response['remark3']; ?>"></td>

                                                   

                                                </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_location" name="metallurgical_test_case_depth_location" value="<?php echo $response['metallurgical_test_case_depth_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_requirement" name="metallurgical_test_case_depth_requirement" value="<?php echo $response['metallurgical_test_case_depth_requirement']; ?>" class="input-color"><span class="add-on">mm</span>

                                                </div></td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_observation" name="metallurgical_test_case_depth_observation" value="<?php echo $response['metallurgical_test_case_depth_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark4" name="remark4" style="width:510px !important;" value="<?php echo $response['remark4']; ?>"></td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_location1" name="metallurgical_test_case_depth_location1" value="<?php echo $response['metallurgical_test_case_depth_location1']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_case_depth_requirement1" name="metallurgical_test_case_depth_requirement1" value="<?php echo $response['metallurgical_test_case_depth_requirement1']; ?>" class="input-color"><span class="add-on">mm</span>

                                                </div></td>

                                                    <td><input type="text" id="metallurgical_test_case_depth_observation1" name="metallurgical_test_case_depth_observation1" value="<?php echo $response['metallurgical_test_case_depth_observation1']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark5" name="remark5" style="width:510px !important;" value="<?php echo $response['remark5']; ?>"></td>

                                                 </tr>

                                                

                                                

                                                

                                                <tr>

                                                    <td class="bg-color">CUT OFF POINTS</td>

                                                    <td colspan="3"><input type="text" id="cut_off" name="cut_off" class="span1 input-color" style="width:65px !important" value="<?php echo $response['cut_off']; ?>"><select class="input-color" style="width:80px !important;" name="cut_off_value" id="cut_off_value">
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HV1" <?php if($response['cut_off_value']=='HV1'){ ?> selected="selected" <?php } ?>>HV1</option>

                                                  <option value="HV0.5" <?php if($response['cut_off_value']=='HV0.5'){ ?> selected="selected" <?php } ?>>HV0.5</option>

                                                </select></td>

                                                 <td colspan="3"><input type="text" id="remark6" name="remark6" style="width:510px !important;" value="<?php echo $response['remark6']; ?>"></td>

                                                </tr>

                                                

                                                

                                                <tr>

                                                    <td class="bg-color">CORE HARDNESS</td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_location" name="metallurgical_test_core_hardness_pcd_location" value="<?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_requirement" name="metallurgical_test_core_hardness_pcd_requirement" style="width:60px !important;" value="<?php echo $response['metallurgical_test_core_hardness_pcd_requirement']; ?>" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value1" id="core_hardness_value1">
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HRC" <?php if($response['core_hardness_value1']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>

                                                  <option value="HBW" <?php if($response['core_hardness_value1']=='HBW'){ ?> selected="selected" <?php } ?>>HBW</option>

                                                  <option value="HV" <?php if($response['core_hardness_value1']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>



                                                  </select></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_pcd_observation" name="metallurgical_test_core_hardness_pcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark7" name="remark7" style="width:510px !important;" value="<?php echo $response['remark7']; ?>"></td>

                                                   

                                                </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_location" name="metallurgical_test_core_hardness_rcd_location" value="<?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_requirement" name="metallurgical_test_core_hardness_rcd_requirement" style="width:60px !important;" value="<?php echo $response['metallurgical_test_core_hardness_rcd_requirement']; ?>" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value2" id="core_hardness_value2" >
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HRC" <?php if($response['core_hardness_value2']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>

                                                  <option value="HBW" <?php if($response['core_hardness_value2']=='HBW'){ ?> selected="selected" <?php } ?>>HBW</option>

                                                  <option value="HV" <?php if($response['core_hardness_value2']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>



                                                  </select></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_rcd_observation" name="metallurgical_test_core_hardness_rcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark8" name="remark8" style="width:510px !important;" value="<?php echo $response['remark8']; ?>"></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_location" name="metallurgical_test_core_hardness_ID_location" value="<?php echo $response['metallurgical_test_core_hardness_ID_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_requirement" name="metallurgical_test_core_hardness_ID_requirement" style="width:60px !important;"  value="<?php echo $response['metallurgical_test_core_hardness_ID_requirement']; ?>" class="input-color"><select class="input-color" style="width:80px !important;" name="core_hardness_value3" id="core_hardness_value3">
                                                      <option value="">Select</option>
                                                      
                                                  <option value="HRC" <?php if($response['core_hardness_value3']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>

                                                  <option value="HBW" <?php if($response['core_hardness_value3']=='HBW'){ ?> selected="selected" <?php } ?>>HBW</option>

                                                  <option value="HV" <?php if($response['core_hardness_value3']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>



                                                  </select></td>

                                                    <td><input type="text" id="metallurgical_test_core_hardness_ID_observation" name="metallurgical_test_core_hardness_ID_observation" value="<?php echo $response['metallurgical_test_core_hardness_ID_observation']; ?>"></td>

                                                    <td colspan="3"><input type="text" id="remark9" name="remark9" style="width:510px !important;" value="<?php echo $response['remark9']; ?>"></td>

                                                   

                                                </tr>

                                                <tr>

                                                    <td class="bg-color">MICRO STRUCTURE</td>

                                                    <td><input type="text" id="metallurgical_test_micro_case_location" name="metallurgical_test_micro_case_location" value="<?php echo $response['metallurgical_test_micro_case_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_micro_case_requirement" name="metallurgical_test_micro_case_requirement" value="<?php echo $response['metallurgical_test_micro_case_requirement']; ?>" class="input-color"></td>

                                                    <td><select  id="metallurgical_test_micro_case_observation" name="metallurgical_test_micro_case_observation" style="width:150px;">

                                                        <option value="">Select</option>

                                                        <option value="T.M+R.A.2%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.2%'){ ?> selected="selected" <?php } ?>>T.M+R.A.2%</option>

                                                        <option value="T.M+R.A.5%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.5%'){ ?> selected="selected" <?php } ?>>T.M+R.A.5%</option>

                                                        <option value="T.M+R.A.5-10%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.5-10%'){ ?> selected="selected" <?php } ?>>T.M+R.A.5-10%</option>

                                                        <option value="T.M+R.A.10-15%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.10-15%'){ ?> selected="selected" <?php } ?>>T.M+R.A.10-15%</option>

                                                        <option value="T.M+R.A.15-20%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.15-20%'){ ?> selected="selected" <?php } ?>>T.M+R.A.15-20%</option>

                                                        <option value="T.M+R.A.20-25%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.20-25%'){ ?> selected="selected" <?php } ?>>T.M+R.A.20-25%</option>

                                                        <option value="T.M+R.A.25-30%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.25-30%'){ ?> selected="selected" <?php } ?>>T.M+R.A.25-30%</option>

                                                        <option value="T.M+R.A.30-35%" <?php if($response['metallurgical_test_micro_case_observation']=='T.M+R.A.30-35%'){ ?> selected="selected" <?php } ?>>T.M+R.A.30-35%</option>

                                                        <option value="A1-A1" <?php if($response['metallurgical_test_micro_case_observation']=='A1-A1'){ ?> selected="selected" <?php } ?>>A1-A1</option>

                                                        <option value="A1-A2" <?php if($response['metallurgical_test_micro_case_observation']=='A1-A2'){ ?> selected="selected" <?php } ?>>A1-A2</option>

                                                        <option value="U.T.M" <?php if($response['metallurgical_test_micro_case_observation']=='U.T.M'){ ?> selected="selected" <?php } ?>>U.T.M</option>
                                                        <option value="Hard & Tempered" <?php if($response['metallurgical_test_micro_case_observation']=='Hard & Tempered'){ ?> selected="selected" <?php } ?>>Hard & Tempered</option>
                                                        


                                                    </select></td>

                                                    <td colspan="3"><input type="text" id="remark_micro_case" name="remark_micro_case" value="<?php echo $response['remark_micro_case'] ?>" style="width:510px !important;"></td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_micro_core_location" name="metallurgical_test_micro_core_location" value="<?php echo $response['metallurgical_test_micro_core_location']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="metallurgical_test_micro_core_requirement" name="metallurgical_test_micro_core_requirement" value="<?php echo $response['metallurgical_test_micro_core_requirement']; ?>" class="input-color"></td>

                                                    <td><select  id="metallurgical_test_micro_core_observation" name="metallurgical_test_micro_core_observation" style="width:150px;">

                                                        <option value="">Select</option>

                                                        <option value="L.C.M+Bainite" <?php if($response['metallurgical_test_micro_core_observation']=='L.C.M+Banite' || $response['metallurgical_test_micro_core_observation']=='L.C.M+Bainite'){ ?> selected="selected" <?php } ?>>L.C.M+Bainite</option>

                                                        <option value="F1-F2" <?php if($response['metallurgical_test_micro_core_observation']=='F1-F2'){ ?> selected="selected" <?php } ?>>F1-F2</option>

                                                        <option value="F2-F3" <?php if($response['metallurgical_test_micro_core_observation']=='F2-F3'){ ?> selected="selected" <?php } ?>>F2-F3</option>

                                                        <option value="F3-F4" <?php if($response['metallurgical_test_micro_core_observation']=='F3-F4'){ ?> selected="selected" <?php } ?>>F3-F4</option>

                                                        <option value="F4-F5" <?php if($response['metallurgical_test_micro_core_observation']=='F4-F5'){ ?> selected="selected" <?php } ?>>F4-F5</option>
                                                        <option value="Hard & Tempered" <?php if($response['metallurgical_test_micro_case_observation']=='Hard & Tempered'){ ?> selected="selected" <?php } ?>>Hard & Tempered</option>

                                                     </select></td>

                                                    <td colspan="3"><input type="text" id="remark_micro_core" name="remark_micro_core" value="<?php echo $response['remark_micro_core'] ?>" style="width:510px !important;"></td>

                                                   

                                                </tr>

                                                <tr>

                                                    <td class="bg-color">THREAD HARDNESS</td>

                                                    <td><input type="text" id="thread_hardness_location" name="thread_hardness_location" value="<?php echo $response['thread_hardness_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="thread_hardness_requirement" name="thread_hardness_requirement" value="<?php echo $response['thread_hardness_requirement']; ?>" class="input-color"><span class="add-on">HV1</span>

                                                </div></td>

                                                    <td><input type="text" id="thread_hardness_observation" name="thread_hardness_observation" value="<?php echo $response['thread_hardness_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_thread_hardness" name="remark_thread_hardness" style="width:510px !important;" value="<?php echo $response['remark_thread_hardness'] ?>">

                                                     </td>

                                                 </tr>

                                                

                                                

                                                

                                                <tr>

                                                    <td class="bg-color">GBO/IGO</td>

                                                    <td><input type="text" id="metallurgical_test_gbo_igo_pcd_location" name="metallurgical_test_gbo_igo_pcd_location" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_gbo_igo_pcd_requirement" name="metallurgical_test_gbo_igo_pcd_requirement" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_requirement']; ?>" class="input-color"><span class="add-on">μm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_gbo_igo_pcd_observation" name="metallurgical_test_gbo_igo_pcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_gbo" name="remark_gbo" style="width:510px !important;" value="<?php echo $response['remark_gbo'] ?>">

                                                     </td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_gbo_igo_rcd_location" name="metallurgical_test_gbo_igo_rcd_location" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_gbo_igo_rcd_requirement" name="metallurgical_test_gbo_igo_rcd_requirement" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_requirement']; ?>" class="input-color"><span class="add-on">μm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_gbo_igo_rcd_observation" name="metallurgical_test_gbo_igo_rcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_gbo2" name="remark_gbo2" style="width:510px !important;" value="<?php echo $response['remark_gbo2'] ?>">

                                                     </td>

                                                </tr>

                                                

                                                

                                                <tr>

                                                    <td class="bg-color">NMTP/SURFACE BAINITE</td>

                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_pcd_location" name="metallurgical_test_nmtp_surface_pcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_nmtp_surface_pcd_requirement" name="metallurgical_test_nmtp_surface_pcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_requirement']; ?>" class="input-color"><span class="add-on">μm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_pcd_observation" name="metallurgical_test_nmtp_surface_pcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_nmtp" name="remark_nmtp" style="width:510px !important;" value="<?php echo $response['remark_nmtp'] ?>">

                                                     </td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_rcd_location" name="metallurgical_test_nmtp_surface_rcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_nmtp_surface_rcd_requirement" name="metallurgical_test_nmtp_surface_rcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_requirement']; ?>" class="input-color"><span class="add-on">μm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_nmtp_surface_rcd_observation" name="metallurgical_test_nmtp_surface_rcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_nmtp2" name="remark_nmtp2" style="width:510px !important;" value="<?php echo $response['remark_nmtp2'] ?>">

                                                     </td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">ITP/SUB-SURFACE BAINITE</td>

                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_pcd_location" name="metallurgical_test_itp_sub_surface_pcd_location" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_itp_sub_surface_pcd_requirement" name="metallurgical_test_itp_sub_surface_pcd_requirement" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_requirement']; ?>" class="input-color"><span class="add-on">mm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_pcd_observation" name="metallurgical_test_itp_sub_surface_pcd_observation" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_itp" name="remark_itp" style="width:510px !important;" value="<?php echo $response['remark_itp'] ?>">

                                                     </td>

                                                 </tr>

                                                

                                                <tr>

                                                    <td></td>

                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_rcd_location" name="metallurgical_test_itp_sub_surface_rcd_location" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_location']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="metallurgical_test_itp_sub_surface_rcd_requirement" name="metallurgical_test_itp_sub_surface_rcd_requirement" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_requirement']; ?>" class="input-color"><span class="add-on">mm</span></div></td>

                                                    <td><input type="text" id="metallurgical_test_itp_sub_surface_rcd_observation" name="metallurgical_test_itp_sub_surface_rcd_observation" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_itp2" name="remark_itp2" style="width:510px !important;" value="<?php echo $response['remark_itp2'] ?>">

                                                     </td>

                                                </tr>

                                                <tr>

                                                    <th class="bg-color">AFTER GRINDING</th>

                                                    <th colspan="3"></th>



                                                    <th  colspan="3"></th>



                                                </tr>

                                                <tr>

                                                    <td rowspan="2" class="bg-color">EFFECTIVE CASE DEPTH</td>

                                                    <td><input type="text" id="eff_after_grinding_location1" name="eff_after_grinding_location1" value="<?php echo $response['eff_after_grinding_location1']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="eff_after_grinding_requirement1" name="eff_after_grinding_requirement1" value="<?php echo $response['eff_after_grinding_requirement1']; ?>" class="input-color"><span class="add-on">mm</span></div></td>

                                                    <td>

                                                        <input type="text" id="remark_observe1" name="remark_observe1" value="<?php echo $response['remark_observe1'] ?>">

                                                        

                                                    </td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_ag" name="remark_ag" style="width:510px !important;" value="<?php echo $response['remark_ag']; ?>">

                                                     </td>

                                                </tr>

                                                <tr>

                                                   

                                                    <td><input type="text" id="eff_after_grinding_location2" name="eff_after_grinding_location2" value="<?php echo $response['eff_after_grinding_location2']; ?>" class="input-color"></td>

                                                    <td><div class="input-append"><input type="text" id="eff_after_grinding_requirement2" name="eff_after_grinding_requirement2" value="<?php echo $response['eff_after_grinding_requirement2']; ?>" class="input-color"><span class="add-on">mm</span></div></td>

                                                    <td>

                                                        <input type="text" id="remark_observe2" name="remark_observe2" value="<?php echo $response['remark_observe2'] ?>">

                                                        

                                                    </td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_ag2" name="remark_ag2" style="width:510px !important;" value="<?php echo $response['remark_ag2']; ?>">

                                                    </td>

                                                </tr>

                                                <tr>



                                              <td class="bg-color">SURFACE HARDNESS</td>



                                              <td>



                                                <input  type="text" name="surface_hardness_location_after_grind" id="surface_hardness_location_after_grind" class="span5 input-color" value="<?php echo $response['surface_hardness_location_after_grind']; ?>">

                                                </td>

                                                <td>

                                                 <input  type="text" name="surface_hardness_requirement_after_grind" id="surface_hardness_requirement_after_grind" class="span5 input-color" style="width:60px !important" value="<?php echo $response['surface_hardness_requirement_after_grind']; ?>">



                                                  <select class="input-color" id="surface_hardness_value_after_grind"  name="surface_hardness_value_after_grind" style="width:80px !important">


                                                      <option value="">Select</option>
                                                    
                                                  <option  value="HRC" <?php if($response['surface_hardness_value_after_grind']=='HRC'){ ?> selected="selected" <?php } ?>>HRC</option>



                                                  <option value="HRA" <?php if($response['surface_hardness_value_after_grind']=='HRA'){ ?> selected="selected" <?php } ?>>HRA</option>



                                                  <option value="HR15N" <?php if($response['surface_hardness_value_after_grind']=='HR15N'){ ?> selected="selected" <?php } ?>>HR15N</option>



                                                  <option value="HR30N" <?php if($response['surface_hardness_value_after_grind']=='HR30N'){ ?> selected="selected" <?php } ?>>HR30N</option>



                                                  <option value="HV" <?php if($response['surface_hardness_value_after_grind']=='HV'){ ?> selected="selected" <?php } ?>>HV</option>



                                                </select>



                                              </td>

                                              <td>

                                                        <input type="text" id="remark_observe3" name="remark_observe3" value="<?php echo $response['remark_observe3'] ?>">

                                                        

                                                    </td>



                                              <td colspan="3">

                                                        <input type="text" id="remark_ag3" name="remark_ag3" style="width:510px !important;" value="<?php echo $response['remark_ag3']; ?>">

                                                </td>



                                                



                                             </tr>

                                                <tr>

                                                  <td colspan="7"><div id="graph"></div></td>

                                                </tr>

                                                <tr class="bg-color">

                                                  <th><a href="#" class="btn btn-beoro-6" onclick="generateGraph(1)" style="padding:2px;">Generate Graph</a></th>

                                                    <th  colspan="6" style="text-align: center;">HARDNESS TRAVERSE (in Hv)</th>

                                                </tr>

                                                

                                                 

                                                <tr >

                                                     <td colspan="7">

                                                        <div id="div1" class="div-scroll">

                                                            <table>

                                                                <tr class="bg-color">

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

                                                <!-- <tr>

                                                    

                                                    <td colspan="16" style="background:#A2A2A2; color:#FFF;text-align:center">Hardness in HV</td>

                                                    <td colspan="13"  style="background:#A2A2A2; color:#FFF;text-align:center">Hardness in HV</td>

                                                </tr> -->

                                                <tr>

                                                    <td class="bg-color">PCD</td>

                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="Hardness_traverse_pcd[]" class="innerBoxes pcd" value="'.$hardness_traverse_pcd[$i].'"></td>'; } ?></td>

                                                   

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">RCD</td>

                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_rcd[]" class="innerBoxes" value="'.$hardness_traverse_rcd[$i].'"></td>'; } ?></td>

                                                    

                                                </tr>

                                                

                                                <tr>

                                                    <td><select id="hardness_traverse_value" name="hardness_traverse_value" style="width:150px;">

                                                        <option value="">Select</option>

                                                        <option value="A/G PCD" <?php if($response['hardness_traverse_value']=='A/G PCD'){ ?> selected="selected" <?php } ?>>A/G PCD</option>

                                                        <option value="B/G ID" <?php if($response['hardness_traverse_value']=='B/G ID'){ ?> selected="selected" <?php } ?>>B/G ID</option>

                                                        <option value="B/G OD" <?php if($response['hardness_traverse_value']=='B/G OD'){ ?> selected="selected" <?php } ?>>B/G OD</option>

                                                        <option value="A/G ID" <?php if($response['hardness_traverse_value']=='A/G ID'){ ?> selected="selected" <?php } ?>>A/G ID</option>

                                                        <option value="A/G OD" <?php if($response['hardness_traverse_value']=='A/G OD'){ ?> selected="selected" <?php } ?>>A/G OD</option>

                                                        <option value="Internal Spline" <?php if($response['hardness_traverse_value']=='Internal Spline'){  ?> selected="selected"<?php } ?>>Internal Spline</option>

                                                        <option value="External Spline" <?php if($response['hardness_traverse_value']=='External Spline'){ ?> selected="selected" <?php } ?>>External Spline</option>



                                                    </select></td>

                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_od[]" class="innerBoxes" value="'.$hardness_traverse_od[$i].'"></td>'; } ?></td>

                                                    

                                                </tr>

                                                

                                                <tr>

                                                    <td><select id="hardness_traverse_value2" name="hardness_traverse_value2" style="width:150px;">

                                                        <option value="">Select</option>

                                                       <option value="A/G PCD" <?php if($response['hardness_traverse_value2']=='A/G PCD'){ ?> selected="selected" <?php } ?>>A/G PCD</option>

                                                        <option value="B/G ID" <?php if($response['hardness_traverse_value2']=='B/G ID'){ ?> selected="selected" <?php } ?>>B/G ID</option>

                                                        <option value="B/G OD" <?php if($response['hardness_traverse_value2']=='B/G OD'){ ?> selected="selected" <?php } ?>>B/G OD</option>

                                                        <option value="A/G ID" <?php if($response['hardness_traverse_value2']=='A/G ID'){ ?> selected="selected" <?php } ?>>A/G ID</option>

                                                        <option value="A/G OD" <?php if($response['hardness_traverse_value2']=='A/G OD'){ ?> selected="selected" <?php } ?>>A/G OD</option>

                                                        <option value="Internal Spline" <?php if($response['hardness_traverse_value2']=='Internal Spline'){  ?> selected="selected"<?php } ?>>Internal Spline</option>

                                                        <option value="External Spline" <?php if($response['hardness_traverse_value2']=='External Spline'){ ?> selected="selected" <?php } ?>>External Spline</option>



                                                    </select></td>

                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_ag[]" class="innerBoxes" value="'.$hardness_traverse_ag[$i].'"></td>'; } ?></td>

                                                    

                                                </tr>

                                                <tr>

                                                    <td><input type="text" id="hardness_traverse_extra_value" name="hardness_traverse_extra_value" value="<?php echo $response['hardness_traverse_extra_value'] ?>" /></td>

                                                    <td><?php for($i=0; $i<26; $i++){ echo '<td style="padding-right: 0px;padding-left: 0px;"><input type="text" id="" name="hardness_traverse_extra[]" class="innerBoxes" value="'.$hardness_traverse_extra[$i].'"></td>'; } ?></td>

                                                   

                                                </tr>    

                                                            </table>    

                                                            </div>

                                                </td>

                                            </tr>

                                                <tr>

                                                    <td class="bg-color">BURN TEST</td>

                                                    <td><input type="text" id="burn_test1" name="burn_test1" value="<?php echo $response['burn_test1']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="burn_test2" name="burn_test2" value="<?php echo $response['burn_test2']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="burn_test3" name="burn_test3" value="<?php echo $response['burn_test3']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_burn_test" name="remark_burn_test" style="width:510px !important;" value="<?php $response['remark_burn_test'] ?>">

                                                     </td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">SHOT PEENING ARC INTENSITY</td>

                                                    <td><input type="text" id="shop_peenign_arc_initencity1" name="shop_peenign_arc_initencity1" value="<?php echo $response['shop_peenign_arc_initencity1']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="shop_peenign_arc_initencity2" name="shop_peenign_arc_initencity2" value="<?php echo $response['shop_peenign_arc_initencity2']; ?>" class="input-color"></td>

                                                    <td><input type="text" id="shop_peenign_arc_initencity3" name="shop_peenign_arc_initencity3" value="<?php echo $response['shop_peenign_arc_initencity3']; ?>"></td>

                                                    <td colspan="3">

                                                        <input type="text" id="remark_shot_peening" name="remark_shot_peening" style="width:510px !important;" value="<?php $response['remark_shot_peening'] ?>">

                                                     </td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">REMARKS</td>

                                                    <td colspan="6" id="remark-td"><input type="text"  id="remark" onclick="getRemark(<?php echo $response['id']; ?>)" name="remark"  class="span12" style="height:30px;min-width:155px" value="<?php //echo $response['remark']; ?>"></textarea></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td class="bg-color">CHECKED BY</td>

                                                    <td><select id="checked_by" name="checked_by" required="">

                                                            <option value="">SELECT</option>



                                                        <?php 
                                                        $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';
                                                        // $query ='SELECT id,full_name FROM users WHERE user_type=16';

                                                        $result =$crud->getAllData($query);

                                                          foreach ($result as $key => $value) {

                                                               if($value['id'] == $response['checked_by']){

                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';



                                                               }

                                                               else{



                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                               }  

                                                              

                                                          }

                                                        ?>

                                                            

                                                        </select></td>

                                                    <td class="bg-color">APPROVED BY</td>

                                                    <td><select id="approved_by" name="approved_by" required="">

                                                            <option value="">SELECT</option>

                                                            <?php 
                                                            $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("16",custom_field)';
                                                            // $query ='SELECT id,full_name FROM users WHERE user_type=3';

                                                        $result =$crud->getAllData($query);

                                                          foreach ($result as $key => $value) {

                                                                  if($value['id'] == $response['approved_by']){

                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';



                                                                  }

                                                                  else{



                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                                  }

                                                              

                                                          }

                                                        ?>

                                                        </select></td>

                                                    <td class="bg-color">DISPOSITION</td>

                                                    <td>
<?php if($response['disposition']=='PENDING FOR INSPECTION'){ ?>
	 <select id="disposition" name="disposition" onchange="this.className=this.options[this.selectedIndex].className"
    class="redText"> <?php
}elseif($response['disposition']=='PENDING FOR MICRO'){
	?>
	 <select id="disposition" name="disposition" onchange="this.className=this.options[this.selectedIndex].className"
    class="blueText">
	<?php 
}else{ ?>
	 <select id="disposition" name="disposition" onchange="this.className=this.options[this.selectedIndex].className"
    class="grayText">
<?php } ?>
                                                       
                                                        

                                                            <option value="ACCEPTED" class="grayText" <?php if($response['disposition']=='ACCEPTED') { ?> selected="selected" <?php } ?>>ACCEPTED</option>

                                                            <option value="REJECTED" class="grayText" <?php if($response['disposition']=='REJECTED') { ?> selected="selected" <?php } ?>>REJECTED</option>

                                                            <option value="HOLD FOR RETEMPRING" class="grayText" <?php if($response['disposition']=='HOLD FOR RETEMPRING') { ?> selected="selected" <?php } ?>>HOLD FOR RETEMPERING</option>

                                                            <option value="HOLD FOR REWORK" class="grayText" <?php if($response['disposition']=='HOLD FOR REWORK') { ?> selected="selected" <?php } ?>>HOLD FOR REWORK</option>

                                                            <option value="ACCEPTED UNDER DEVIATION" class="grayText" <?php if($response['disposition']=='ACCEPTED UNDER DEVIATION') { ?> selected="selected" <?php } ?>>ACCEPTED UNDER DEVIATION</option>

                                                            <option value="ACCEPTED AFTER REWORK" class="grayText" <?php if($response['disposition']=='ACCEPTED AFTER REWORK') { ?> selected="selected" <?php } ?>>ACCEPTED AFTER REWORK</option>

                                                            <option value="KEEP PENDING" class="grayText"<?php if($response['disposition']=='KEEP PENDING') { ?> selected="selected" <?php } ?>>KEEP PENDING</option>
															
															<option value="PENDING FOR INSPECTION" class="redText" <?php if($response['disposition']=='PENDING FOR INSPECTION') { ?> selected="selected" class="redText" <?php } ?> style="color:red">PENDING FOR INSPECTION</option>

                                                            <option value="CONDITIONALLY ACCEPTED" class="grayText" <?php if($response['disposition']=='CONDITIONALLY ACCEPTED') { ?> selected="selected" <?php } ?>>CONDITIONALLY ACCEPTED</option>
															<option value="PENDING FOR MICRO" class="blueText" <?php if($response['disposition']=='PENDING FOR MICRO') { ?> selected="selected"  <?php } ?>>PENDING FOR MICRO</option>

                                                        </select>

                                                    </td>

                                                    <td></td>

                                                </tr>

                                                

                                            </table>

                                        </div>

                                        

                                        <div class="">
                                               
                                            <div class="">
                                                
                                                <button type="submit" style="margin-top:20px;<?php if($_SESSION['user_type'] == 20){ ?> visibility: hidden; <?php }?>" class="btn btn-primary">Save</button>
                                                 

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

                    generateGraph(0);

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

    //             '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5',, '1.6', '1.7', '1.8', '1.9', '2.0','2.1','2.2','2.3','2.4','2.5']

    //     },

    //     yAxis: {

    //         title: {

    //             text: 'Hardness in Hv'

    //         },

    //         plotLines: [{

    //             value: 0,

    //             width: 1,

    //             color: '#808080'

    //         }]

    //     },

        

    //     legend: {

    //         layout: 'vertical',

    //         align: 'right',

    //         verticalAlign: 'middle',

    //         borderWidth: 0

    //     },

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

              

            var cut_part = $('#cut_part').val();

            if(cut_part == 'Segment Off'){

                $('#segment_off_extra').css('display','block');



            }

            else{

                $('#segment_off_extra').css('display','none');



            }



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



           function generateGraph(id){

                 var pcdValue = [];

                 var rcd = [];

                 var od = [];

                $('.pcd').each(function() {

                        if($(this).val() == ''){

                          pcdValue.push(null);

                        }

                        else{

                          pcdValue.push(parseInt($(this).val())); 

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

                  console.log(pcdValue);

                  console.log(rcd);

                  console.log(od);

             var chart =   $('#graph').highcharts({


        title: {

            text: 'HARDNESS TRAVERSE GRAPH',

            x: -20 //center

        },

        

        xAxis: {

            title:{

               text : 'Distance in MM'

            },

            categories: ['0.05', '0.1', '0.2', '0.3', '0.4', '0.5',

                '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5','1.6', '1.7', '1.8', '1.9', '2.0','2.1','2.2','2.3','2.4','2.5'],

                

        },
        

        yAxis: {
            

            title: {

                text: 'Hardness in Hv'

            },

            plotLines: [{

                value: cut_off,

                width: 2,

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

            data: pcdValue

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
           

         if(id==1){

              $(window).scrollTop($('#surface_hardness_location_after_grind').offset().top);

              }    

           }
           function deleteControlPlan(id){
            bootbox.confirm("Are you sure?", function(confirmed) {
      if(confirmed)  {        
  $.ajax({
    type : "POST",
    url : 'set_status.php',
    data : {
      id : id,
      table : 'control_plan'
    },
    dataType : "JSON",
    success : function(response){
      if(response.status == 1){
                $.sticky(''+response.message+'', {autoclose : 3000, position: "top-center", type: "st-success" });
                setTimeout(function(){
                location.reload();
                },1000);
         // var host = window.location.hostname;
         
         window.location.href = 'ht_search';    
      }
    }
  });
    }
  });
           }
		    $('#charge_number').keyup(function() {	
    $('span.error-keyup-2').remove();
    var inputVal = $(this).val();
    var characterReg = /^([5-9]\d|[1-9]\d{2,})$/;
    if(!characterReg.test(inputVal)) {
        $(this).after('<span class="error error-keyup-2"> No special characters allowed.</span>');
    }
});

        </script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script>

// just for the demos, avoids form submit

var countryVal;
$("#disposition").change(function() {
  var newVal = $(this).val();
  if (!confirm("Are you sure you want to "+$(this).val()+" ?")) {
    $(this).val(countryVal); //set back
    return;                  //abort!
  }
  //destroy branches
  countryVal = newVal;       //store new value for next time
});

 /*$('#disposition').on('change', function() {
  confirm("Are you sure you want to "+this.value);
});*/

function getRemark(id){	
	 $.ajax({
    type : "POST",
    url : 'ajax_getRemark.php',
    data : {
      id : id
    },
    success : function(response){		
     $('#remark-td').html('');
	 $('#remark-td').append('<textarea  id="remark"  name="remark" row="16" class="span12" style="height:110px;" value="'+response+'">'+response+'</textarea>');
    }
  });
	}
</script>
 

        