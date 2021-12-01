<?php include_once("header.php"); ?>
<style type="text/css">
   #example2_wrapper .row {
        padding:10px;
        margin-left:0px;
    }
    .splashy-add_small{
        margin-top: -2px !important;
    }
    .jQ-todoAll-count{
        font-size:13px !important;
    }
    td input{
      width:110px;
    }
    td select{
      width:110px;
    }
    .set-width{
      width:280px !important;
    }
	.size{
	width:35px;
	}
	.size1{
		width:75%;
	}
</style>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                   <!--  <li><a href="part_list"></a></li>
                    <li><a href="javascript:void(0)">Edit Part</a></li> -->
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>METALLURGICAL TEST REPORT</h4>
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
                                  $_SESSION['msg_session'] = '';
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
								  $response;
                                  $id =  $_GET['id'];
                                  $query = 'SELECT * FROM catepillar_report1 WHERE report_id='.$id;
                                  $result= $crud->getSingleRow($query);
								  if($result){
									  print_r('if');
                                    $response = json_decode($result['data'],TRUE);
									$response['customer']= $result['customer'];
                                    $response['date'] = $result['date'];
                                    $response['control_plan_id'] = $result['control_plan_id'];
                                    $response['batch_code'] = $result['batch_code'];
                                    $response['part_no'] = $result['part_no'];
                                    $response['qty'] = $result['qty'];
                                    $response['part_name'] = $result['part_name'];
                                    $response['grade'] = $result['grade'];
                                    $response['remark'] = $result['remark'];
                                    $response['steel_mill'] = $result['steel_mill'];
								    $response['report_no'] = $result['report_no'];
                                    $response['heat_no'] = $result['heat_no'];
                                    $response['mill_tc'] = $result['mill_tc'];
                                    $response['forger_tc'] = $result['forger_tc'];
                                    $response['checked_by'] = $result['checked_by'];
                                    $response['approved_by'] = $result['approved_by'];
									$hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
								    $chemical_composition_min = explode('*',$response['chemical_composition_min']);
								    $chemical_composition_max = explode('*',$response['chemical_composition_max']);
								    $chemical_composition_milltc = explode('*',$response['chemical_composition_milltc']);
								    $inclu = explode('*',$response['inclu']);
                                   }
                                   else{

                                    $query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                   }
                                ?>
                                
                                <a class="btn" href="#" onclick="saveData()" style="float:right;">Download File</a>
                                <div id="docx">
                                <table id="example2" class="table display nowrap table-bordered">
                                  <tr>
								    <td colspan="2" rowspan="2" style="text-align: center;">NEW HOLLAND</td>
                                    <td colspan="5" style="text-align: center;">METALLURGICAL TEST REPORT</td>
									<td colspan="5" style="text-align: center;">PURPOSE: - ISIR / LOT Reports</td>
                                   </tr>
								<tr>
								   <td colspan="5"></td>
								   <td colspan="1">Qty:- </td><td colspan="1" style="border-left:0px;"><input class="size1" type="text" name="qty" value="<?php echo $response['qty']; ?>"/></td>
								   <td colspan="1">REPORT NO:- </td><td colspan="2" style="border-left:0px;"><input class="size1" type="text" name="report_no" value="<?php echo $response['report_no']; ?>"/></td>
								</tr>
								<tr>
								   <td colspan="2">FIAT STD NO: </td><td colspan="4" style="border-left:0px;"><input class="size1" type="text" name="fiat_std" value="<?php echo $response['fiat_std']; ?>"/></td>
								   <td colspan="2">SUPPLIER: </td><td colspan="4" style="border-left:0px;"><input class="size1" type="text" name="supplier" value="<?php echo $response['supplier']; ?>"/></td>
								</tr>   
								<tr>
								   <td colspan="2">HEAT CODE:</td><td colspan="3" style="border-left:0px;"><input class="size1" type="text" name="heat_no" value="<?php echo $response['heat_no']; ?>"/></td>
								   <td colspan="1"></td>
								   <td colspan="2">HEAT CODE: </td><td colspan="4" style="border-left:0px;"><input class="size1" type="text" name="heat_no" value="<?php echo $response['heat_no']; ?>"/></td>
								</tr>
								<tr>
								   <td colspan="2">PART NO:</td><td colspan="4" style="border-left:0px;"><input class="size1" type="text" name="part_no" value="<?php echo $response['part_no']; ?>"/></td>
								   <td colspan="2">PART NAME: </td><td colspan="4" style="border-left:0px;"><input class="size1" type="text" name="part_name" value="<?php echo $response['part_name']; ?>"/></td>
								</tr>
								<tr>
								   <td colspan="3">MATERIAL SPECIFICATION</td>
								   <td colspan="1">MODULE (MM)</td>
								   <td colspan="1">CHORDIAL THICKNESS</td>
								   <td colspan="5">HEAT TREATMENT PROCESS </td>
								   <td colspan="2">SURFACE TREATMENT</td>
								</tr>
								<tr>
								   <td colspan="3"><input  type="text" name="grade" id="grade" value="<?php echo $response['grade']; ?>"/></td>
								   <td colspan="1"><input  type="text" name="module" id="module" value="<?php echo $response['module']; ?>"/></td>
								   <td colspan="1"><input  type="text" name="chordial" id="chordial" value="<?php echo $response['chordial']; ?>"/></td>
								   <td colspan="5"><input  type="text" name="heat_treat" id="heat_treat" value="<?php echo $response['heat_treat']; ?>"/></td>
								   <td colspan="2"><input  type="text" name="surface" id="surface" value="<?php echo $response['surface']; ?>"/></td>
								</tr>
								<tr>
		<td colspan="2">CHEMICAL COMPOSITION </td>
		<td>%C</td>
		<td>%Mn</td>
		<td>%Si</td>
        <td>%S</td>
		<td>%P</td>
		<td>%Cr</td>
		<td>%Mo</td>
        <td>%Ni</td>
        <td>%Cu</td>
		<td>%Al</td>
    </tr>
	<tr><td colspan="2">SPECIFICATION</td>
	<?php 
	for($i=0; $i<10; $i++) {
                         echo  '<td><input class="size" type="text" id="chemical_composition_min'.$i.'" name="chemical_composition_min[]" value='.$chemical_composition_min[$i].'></td>';
                    }
	?></tr>
	<tr><td colspan="2">ACTUAL</td>
	<?php
                    for($i=0; $i<10; $i++) {
                        echo  '<td><input class="size" type="text" id="chemical_composition_max'.$i.'" name="chemical_composition_max[]" value='.$chemical_composition_max[$i].'></td>';
                    }
				?>
	</tr>
	<tr>
	<td colspan="2">PROPERTIES</td>
	<td colspan="3">SPECIFIED</td>
	<td colspan="2">ACTUAL</td>
	<td colspan="5">EFFECTIVE CASE DEPT AT CUT OFF 513 HV AT (A-A & B - B LOCATION)	</td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_surface_hard1_location" id="metallurgical_test_surface_hard1_location" value="<?php echo $response['metallurgical_test_surface_hard1_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_surface_hard1_requirement" id="metallurgical_test_surface_hard1_requirement" value="<?php echo $response['metallurgical_test_surface_hard1_requirement'].' '.$response['surface_hardnessloc_value']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_surface_hard1_observation" id="metallurgical_test_surface_hard1_observation" value="<?php echo $response['metallurgical_test_surface_hard1_observation']; ?>"/></td>
	<td colspan="2" rowspan="2">TRAVERSE(Distance from surface in mm)</td>
	<td colspan="3">HARDNESS (HV) 1 Kg</td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_location" id="metallurgical_test_core_hardness_rcd_location" value="<?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_requirement" id="metallurgical_test_core_hardness_rcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_rcd_requirement'].' '.$response['core_hardness_value2']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_observation" id="metallurgical_test_core_hardness_rcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?>"/></td>
	<td colspan="2">A-A</td>
	<td colspan="1">B-B</td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_ID_location" id="metallurgical_test_core_hardness_ID_location" value="<?php echo $response['metallurgical_test_core_hardness_ID_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_core_hardness_ID_requirement" id="metallurgical_test_core_hardness_ID_requirement" value="<?php echo $response['metallurgical_test_core_hardness_ID_requirement'].' '.$response['core_hardness_value3']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_ID_observation" id="metallurgical_test_core_hardness_ID_observation" value="<?php echo $response['metallurgical_test_core_hardness_ID_observation']; ?>"/></td>
	<td colspan="2">0.10</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_location" id="metallurgical_test_core_hardness_pcd_location" value="<?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_requirement" id="metallurgical_test_core_hardness_pcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_pcd_requirement'].' '.$response['core_hardness_value1']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_observation" id="metallurgical_test_core_hardness_pcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?>"/></td>
	<td colspan="2">0.20</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_gbo_igo_pcd_location" id="metallurgical_test_gbo_igo_pcd_location" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_gbo_igo_pcd_requirement" id="metallurgical_test_gbo_igo_pcd_requirement" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_gbo_igo_pcd_observation" id="metallurgical_test_gbo_igo_pcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation']; ?>"/></td>
	<td colspan="2">0.40</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_location" id="metallurgical_test_gbo_igo_rcd_location" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_requirement" id="metallurgical_test_gbo_igo_rcd_requirement" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_observation" id="metallurgical_test_gbo_igo_rcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_rcd_observation']; ?>"/></td>
	<td colspan="2">0.60</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2">AUSTENITE GRAIN SIZE</td>
	<td colspan="3"><input class="size1" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="2">0.70</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2" rowspan="2"><input class="size1" type="text" name="metallurgical_test_micro_case_location" id="metallurgical_test_micro_case_location" value="<?php echo $response['metallurgical_test_micro_case_location']; ?>"/></td>
	<td colspan="3" rowspan="2"><input class="size1" type="text" name="metallurgical_test_micro_case_requirement" id="metallurgical_test_micro_case_requirement" value="<?php echo $response['metallurgical_test_micro_case_requirement']; ?>"/></td>
	<td colspan="2" rowspan="2"><input class="size1" type="text" name="metallurgical_test_micro_case_observation" id="metallurgical_test_micro_case_observation" value="<?php echo $response['metallurgical_test_micro_case_observation']; ?>"/></td>
	<td colspan="2">0.80</td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2" rowspan="3"><input class="size1" type="text" name="metallurgical_test_micro_core_location" id="metallurgical_test_micro_core_location" value="<?php echo $response['metallurgical_test_micro_core_location']; ?>"/></td>
	<td colspan="3" rowspan="3"><input class="size1" type="text" name="metallurgical_test_micro_core_requirement" id="metallurgical_test_micro_core_requirement" value="<?php echo $response['metallurgical_test_micro_core_requirement']; ?>"/></td>
	<td colspan="2"  rowspan="3"><input class="size1" type="text" name="metallurgical_test_micro_core_observation" id="metallurgical_test_micro_core_observation" value="<?php echo $response['metallurgical_test_micro_core_observation']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_pcd_location" id="metallurgical_test_nmtp_surface_pcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_pcd_requirement" id="metallurgical_test_nmtp_surface_pcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_pcd_observation" id="metallurgical_test_nmtp_surface_pcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_rcd_location" id="metallurgical_test_nmtp_surface_rcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_location']; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_rcd_requirement" id="metallurgical_test_nmtp_surface_rcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_nmtp_surface_rcd_observation" id="metallurgical_test_nmtp_surface_rcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2" rowspan="2"><input class="size1" type="text" name="" id="" value="<?php echo "NMTP WITH IGO"; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="" id="" value="<?php echo $response['']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="" id="" value="<?php echo $response['']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="3"><input class="size1" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_case_depth_location" id="metallurgical_test_case_depth_location" value="<?php echo 'EFFECTIVE CASE DEPTH AT SEC-AA at Cut Off 513 HV AT 1 Kg Load'; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_case_depth_requirement" id="metallurgical_test_case_depth_requirement" value="<?php echo $response['metallurgical_test_case_depth_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_case_depth_observation" id="metallurgical_test_case_depth_observation" value="<?php echo $response['metallurgical_test_case_depth_observation']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_location" id="metallurgical_test_case_depth_pcd_location" value="<?php echo 'EFFECTIVE CASE DEPTH AT SEC-BB should be 60%min of lower spec. at PCD at Cut Off 513 HV AT 1 Kg Load'; ?>"/></td>
	<td colspan="3"><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_requirement" id="metallurgical_test_case_depth_pcd_requirement" value="<?php echo $response['metallurgical_test_case_depth_pcd_requirement']; ?>"/></td>
	<td colspan="2"><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_observation" id="metallurgical_test_case_depth_pcd_observation" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?>"/></td>
	<td colspan="2"></td>
	<td colspan="2"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	<td colspan="1"><input class="size" type="text" name="surface" id="surface" value="<?php echo $response['surface'] ?>"/></td>
	</tr>
	<tr>
	<td colspan="2">REMARKS: </td><td colspan="5"><textarea name="remark"><?php echo $response['remark'];?></textarea> </td>
	<td colspan="2">DISPOSITION: </td><td colspan="3"><input type="text" name="disposition" id="disposition" value="<?php echo $response['disposition'];?>"></td>
	</tr>
                                </table>
                              </div>
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

                     

                 $("#from").datepicker({
                      format: 'yyyy-mm-dd',
                      autoclose: true,
                    }).on('changeDate', function (selected) {
                        var startDate = new Date(selected.date.valueOf());
                        $('#to').datepicker('setStartDate', startDate);
                    }).on('clearDate', function (selected) {
                        $('#to').datepicker('setStartDate', null);
                    });

                    $("#to").datepicker({
                       format: 'yyyy-mm-dd',
                       autoclose: true,
                    }).on('changeDate', function (selected) {
                       var endDate = new Date(selected.date.valueOf());
                       $('#from').datepicker('setEndDate', endDate);
                    }).on('clearDate', function (selected) {
                       $('#from').datepicker('setEndDate', null);
                    });
                //    table = $('#example2').DataTable({
                //       searching : false,
                //       ordering : false,
                //       "bLengthChange": false,
                //  responsive : true,
                //  "pageLength": 50,
                //  dom: 'Bfrtip', 
                //  buttons: [
                //        {
                //         extend: 'print',
                //         title: function(){
                //            return 'VECV MET.LAB. FORGING RECORD'
                //         },
                //         customize: function (win) {
                //           $(win.document.body).find('h1').css('text-align','center');
                //          $(win.document.body).find('.box').css('height','30px');
                //          $(win.document.body).find('.box').css('line-height','10px !important');
                //          $(win.document.body).find('.box').css('width','30px !important');

                //         },
                //         exportOptions: { stripHtml: false }
                //       },

                //     ] 
                // });

                 if($('#ht_search').length) {
                $('#ht_search').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('td').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('td').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('td').append(error);
                    },
                    rules: {
                        
                        
                        to :{
                         required : function(){
                            if($('#from').val() != ''){
                              return true;
                            }
                            else{
                               return false;
                            }
                         },
                        },
                        
                       },
                   submitHandler: function(form) {
                      getHTSearch();
                    }    
                })
            } 

            $('#disposition_check').click(function(){
                   if($('#disposition_check').is(':Checked')){
                       $('#disposition').css('display','block');
                   }
                   else{
                       $('#disposition').css('display','none');

                   }
            });      
                    
            });
            function reDirect(id){
              // window.location.href();
              window.open(
  'edit_metallurgical_report?id='+id,
  '_blank' // <- This is what makes it open in a new window.
);
            }
             
// function printDiv() {
//     var divToPrint = document.getElementById('example2');
//     var htmlToPrint = '' +
//         '<style type="text/css">' +
//         'table th, table td {' +
//         'border-top:1px solid #ccc;' +
//         'padding;0.5em;' +
//         'border-left:1px solid #ccc;' ++
//         '}' +
//         '</style>';
//     htmlToPrint += '<h1>VE COMMERCIAL VEHICLES LTD DEWAS</h1>'+divToPrint.outerHTML;
//     newWin = window.open("");
//     newWin.document.write(htmlToPrint);
//     newWin.print();
//     newWin.close();
// }
// function printDiv(divID) {
//             //Get the HTML of div
//             var divElements = document.getElementById(divID).innerHTML;
//             //Get the HTML of whole page
//             var oldPage = document.body.innerHTML;
//             //Reset the page's HTML with div's HTML only
//             document.body.innerHTML = 
//               "<html><head><title></title></head><body>" + 
//               divElements + "</body>";
//             //Print Page
//             window.print();
//             //Restore orignal HTML
//             document.body.innerHTML = oldPage;
//         }
        function saveData(){
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
          var data = {  
          
          fiat_std : $('input[name="fiat_std"]').val(),
          supplier : $('input[name="supplier"]').val(),
          module : $('input[name="module"]').val(),
          chordial : $('input[name="chordial"]').val(),
          heat_treat : $('input[name="heat_treat"]').val(),
          surface : $('input[name="surface"]').val(),
		  
		  chemical_composition_min : x,
		  chemical_composition_max : sae_max,
		  
		  metallurgical_test_surface_hard1_location : $('input[name="metallurgical_test_surface_hard1_location"]').val(),
          metallurgical_test_surface_hard1_requirement : $('input[name="metallurgical_test_surface_hard1_requirement"]').val(),
          metallurgical_test_surface_hard1_observation : $('input[name="metallurgical_test_surface_hard1_observation"]').val(),
		  
		  metallurgical_test_core_hardness_rcd_location : $('input[name="metallurgical_test_core_hardness_rcd_location"]').val(),
          metallurgical_test_core_hardness_rcd_requirement : $('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(),
          metallurgical_test_core_hardness_rcd_observation : $('input[name="metallurgical_test_core_hardness_rcd_observation"]').val(),
		  
		  metallurgical_test_core_hardness_ID_location : $('input[name="metallurgical_test_core_hardness_ID_location"]').val(),
		  metallurgical_test_core_hardness_ID_requirement : $('input[name="metallurgical_test_core_hardness_ID_requirement"]').val(),
		  metallurgical_test_core_hardness_ID_observation : $('input[name="metallurgical_test_core_hardness_ID_observation"]').val(),
		  
          metallurgical_test_core_hardness_pcd_location : $('input[name="metallurgical_test_core_hardness_pcd_location"]').val(),
		  metallurgical_test_core_hardness_pcd_requirement : $('input[name="metallurgical_test_core_hardness_pcd_requirement"]').val(),
		  metallurgical_test_core_hardness_pcd_observation : $('input[name="metallurgical_test_core_hardness_pcd_observation"]').val(),
		  
		  metallurgical_test_gbo_igo_pcd_location : $('input[name="metallurgical_test_gbo_igo_pcd_location"]').val(),
		  metallurgical_test_gbo_igo_pcd_requirement : $('input[name="metallurgical_test_gbo_igo_pcd_requirement"]').val(),
          metallurgical_test_gbo_igo_pcd_observation : $('input[name="metallurgical_test_gbo_igo_pcd_observation"]').val(),
          
		  metallurgical_test_gbo_igo_rcd_location : $('input[name="metallurgical_test_gbo_igo_rcd_location"]').val(),
          metallurgical_test_gbo_igo_rcd_requirement : $('input[name="metallurgical_test_gbo_igo_rcd_requirement"]').val(),
          metallurgical_test_gbo_igo_rcd_observation : $('input[name="metallurgical_test_gbo_igo_rcd_observation"]').val(),
		  
		  metallurgical_test_micro_case_location : $('input[name="metallurgical_test_micro_case_location"]').val(),
          metallurgical_test_micro_case_requirement : $('input[name="metallurgical_test_micro_case_requirement"]').val(),
          metallurgical_test_micro_case_observation : $('input[name="metallurgical_test_micro_case_observation"]').val(),

          metallurgical_test_micro_core_location : $('input[name="metallurgical_test_micro_core_location"]').val(),
          metallurgical_test_micro_core_requirement : $('input[name="metallurgical_test_micro_core_requirement"]').val(),
          metallurgical_test_micro_core_observation : $('input[name="metallurgical_test_micro_core_observation"]').val(),
		  
          metallurgical_test_nmtp_surface_rcd_observation : $('input[name="metallurgical_test_nmtp_surface_rcd_observation"]').val(),
          metallurgical_test_nmtp_surface_rcd_requirement : $('input[name="metallurgical_test_nmtp_surface_rcd_requirement"]').val(),
          metallurgical_test_nmtp_surface_rcd_location : $('input[name="metallurgical_test_nmtp_surface_rcd_location"]').val(),


          metallurgical_test_nmtp_surface_pcd_location : $('input[name="metallurgical_test_nmtp_surface_pcd_location"]').val(),
          metallurgical_test_nmtp_surface_pcd_requirement : $('input[name="metallurgical_test_nmtp_surface_pcd_requirement"]').val(),
          metallurgical_test_nmtp_surface_pcd_observation : $('input[name="metallurgical_test_nmtp_surface_pcd_observation"]').val(),
          
		  metallurgical_test_case_depth_pcd_location : $('input[name="metallurgical_test_case_depth_pcd_location"]').val(),
          metallurgical_test_case_depth_pcd_requirement : $('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(),
          metallurgical_test_case_depth_pcd_observation : $('input[name="metallurgical_test_case_depth_pcd_observation"]').val(),

          metallurgical_test_case_depth_location : $('input[name="metallurgical_test_case_depth_location"]').val(),
          metallurgical_test_case_depth_requirement : $('input[name="metallurgical_test_case_depth_requirement"]').val(),
          metallurgical_test_case_depth_observation : $('input[name="metallurgical_test_case_depth_observation"]').val(),
            
          };
          $.ajax({
               type : "POST",
               url : 'word.php',
               data : {
                customer : $('input[name="customer"]').val(),
                date : $('input[name="date"]').val(),
                control_plan_id :  $('input[name="control_plan_id"]').val(),
                batch_code :  $('input[name="batch_code"]').val(),
                part_no :  $('input[name="part_no"]').val(),								report_no : $('input[name="report_no"]').val(),
                qty :  $('input[name="qty"]').val(),
                part_name :  $('input[name="part_name"]').val(),
                grade :  $('input[name="grade"]').val(),
                remark : $('input[name="remark"]').val(),
                data : JSON.stringify(data),
                report_id : $('input[name="report_id"]').val(),
                steel_mill : $('input[name="steel_mill"]').val(),
                heat_no : $('input[name="heat_no"]').val(),
                mill_tc : $('input[name="mill_tc"]').val(),
                forger_tc : $('input[name="forger_tc"]').val(),
                checked_by : $('input[name="checked_by"]').val(),
                approved_by : $('input[name="approved_by"]').val(),
				disposition : $('input[name="disposition"]').val()
              },
              dataType : "JSON",
              success : function(res){
                  window.location = 'download_cnh.php?id='+res.data;
               }
          });
        }
        function getRawMaterial(){
          $.ajax({
            type : 'POST',
            url : 'get_grade.php',
            data : {
              steel_code : $('input[name="steel_mill"]').val(),
              part_no : $('input[name="part_no"]').val()

            },
            dataType : "JSON",
            success : function(res){
              if(res.status ==1){
                $('input[name="heat_no"]').val(res.data.heat_no);
                $('input[name="mill_tc"]').val(res.data.mill_tc_supplier);
                $('input[name="forger_tc"]').val(res.data.forger_tc_supplier);
              }
            }
          });
        }
        </script>
        