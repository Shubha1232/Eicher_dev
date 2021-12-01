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
	width:25px;
	}
	.size1{
		width:90%;
	}
.error1{
	border-color:red !important;
	color:red !important;
}	
</style>
<script src="js/jquery.min.js"></script>
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
								  $reset_id=0;
								  $reset_id= $_GET['reset_id'];
								  if($reset_id!=1){
                                  $query = 'SELECT * FROM catepillar_report WHERE report_id='.$id;
                                  $result= $crud->getSingleRow($query);
								  if($result){
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
									$response['verified_by'] = $result['verified_by'];
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
                                    $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
									$response['date'] = $result['current_date'];
									$response['cut_off_point'] = $result['cut_off'].''.$result['cut_off_value'];
					               }}
								  else{
									$query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                    $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
									$response['date'] = $result['current_date'];
									$response['cut_off_point'] = $result['cut_off'].''.$result['cut_off_value'];
								  }
                ?>
	<div style="float:right;">
	<a class="btn btn-beoro-3" href="#" onclick="reset(<?php echo $id; ?>)">Reset</a>
		<a class="btn btn-success" href="#" onclick="saveData(1)" >Save</a>
		<a class="btn btn-beoro-1 word" href="#" onclick="saveData(2)" style="display: none;float:right;margin-left: 5px;">PDF</a> 
		<a class="btn btn-info word" href="#" onclick="saveData(0)"  style="display: none;float:right;margin-left: 5px;">Word</a> 
	</div>
<div id="docx">
	<table id="example2" class="table display nowrap table-bordered">
		<tr><td colspan="12" style="background-color:#ccc;text-align: center;">MATERIALS LABORATORY REPORT</td></tr>
	<tr>
		<td>Report No:<input type="hidden" id="cut_off" name="cut_off" value="<?php echo $response['cut_off']; ?>"></td>
		<td colspan="3"><input class="size1" type="text" name="report_no" value="<?php echo $response['report_no'] ?>"/><input type="hidden" name="report_id" value="<?php echo $id; ?>"><input type="hidden" id="image_graph" name="image_graph"></td>
	</tr>
	<tr>
		<td>Part No/ Part ID:</td>
		<td colspan="3"><div class="input-append"><input class="size1" type="text" name="part_no" style="width: 36%;" value="<?php echo $response['part_no'] ?>"/><button class="btn" onclick="getHTControlPlan()">Go</button></div>
		<input class="size1" type="text" name="control_plan_id" style="width: 36%;" value="<?php echo $response['control_plan_id'] ?>"/></td>
		<td>Part Name:</td>
		<td colspan="3"><input class="size1" type="text" name="part_name" value="<?php echo $response['part_name'] ?>"/></td>
		<td>Date:</td>
		<td colspan="3"><input class="size1" type="text" name="date" value="<?php echo $response['date'] ?>"/></td>
	</tr>
	<tr>
	<td>Qty:</td>
		<td colspan="3"><input class="size1" type="text" name="qty" value="<?php echo $response['qty'] ?>"/></td>
		<td>Customer:</td>
		<td colspan="3"><input class="size1" type="text" id="customer" name="customer" value="<?php echo $response['customer'] ?>" readonly></td>
		<td>Batch Code:</td>
		<td colspan="3"><input class="size1" type="text" name="batch_code" value="<?php echo $response['batch_code'] ?>"/></td>
	</tr>
	<tr >
		<td>MATERIAL SPECIFICATION:-</td>
		<td colspan="3"><input class="size1" type="text" name="grade" value="<?php echo $response['grade'] ?>"/></td>
		<td>MODULE (MM):-</td>
		<td colspan="3"><input class="size1" type="text" name="module" value="<?php echo $response['module'] ?>"/></td>
        <td>CHORDIAL THICKNESS:-</td>
		<td colspan="3"><input class="size1" type="text" name="chordial" value="<?php echo $response['chordial'] ?>"/></td>
	</tr>

	<tr>
	<td colspan="12"><image src="<?php echo $fol;?>/image/cnh.png"></td>
	</tr>
	<tr id="p5">
		<td colspan="10" style="background-color:#ccc;text-align: left;">
		<?php if($response['customer']=="VOLVO"){ echo "1) Material Grade:"; }
			  else { echo "1) Raw Material :";}
		?>						 
		<input  type="text" name="grade" id="grade" value="<?php echo $response['grade'] ?>" onkeyup="getraw_no()"/></td>
		<td colspan="2" style="background-color:#ccc;text-align: left;">Steel Code :<input  type="text" id="steel_code" name="steel_code" value="<?php echo $response['steel_code'] ?>" onkeyup="getheat_no()"></td>
	</tr>
	<tr id="p2" >
		<td>1.1 Chemistry : </td>
	</tr>
	<tr id="p3" ><td colspan="12">
<table class="table display nowrap table-bordered">
	<tr>
		<td colspan="2">Elements (%) <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </td>
		<td>C</td>
		<td>Mn</td>
		<td>S</td>
        <td>P</td>
		<td>Si</td>
		<td>Ni</td>
		<td>Cr</td>
        <td>Mo</td>
        <td>V</td>
		<td>Al</td>
		<td>B</td>
		<td>Cu</td>
    </tr>
	<tr>
		<td rowspan="2"></td>
		<td>Min</td>
				<?php
                    for($i=0; $i<12; $i++) {
                         echo  '<td><input class="size" type="text" id="chemical_composition_min'.$i.'" name="chemical_composition_min[]" value='.$chemical_composition_min[$i].'></td>';
                    }
                ?>
    </tr>
	<tr>
		<td>Max</td>
				<?php
                    for($i=0; $i<12; $i++) {
                        echo  '<td><input class="size" type="text" id="chemical_composition_max'.$i.'" name="chemical_composition_max[]" value='.$chemical_composition_max[$i].'></td>';
                    }
				?>
	</tr>
	<tr>
		<td colspan="2">Observations </td>
				<?php
                    for($i=0; $i<12; $i++) {
				?>
                <td><input class="size" type="text" id="chemical_composition_milltc<?php echo $i; ?>" name="chemical_composition_milltc[]" value="<?php echo $chemical_composition_milltc[$i];?>" onkeyup="check_mid(<?php echo $i; ?>,this)"></td>
				 <script>
				 $(document).ready(function(){
					check_mid(<?php echo $i; ?>,chemical_composition_milltc<?php echo $i; ?>)
				 });
				 </script>													
				<?php  
				}
                ?>
    </tr>
							
							</div>
							</table></td>
							</tr>
							<tr>
                          
							   <td colspan="12" style="background-color:#ccc;text-align: left;">2) Heat Treatment:Case carburised, hardened & tempered</td>
							  
                                 </tr>
								 <tr>
								 <td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr><td colspan="6" rowspan="10" style="width:50%;"><div id="graph"></div></td>
								 <td colspan="6">2.1 Hardness</td></tr>
								 <tr><td><strong>Location</strong></td><td><strong>Specification</strong></td><td><strong>Observation</strong></td></tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_surface_hard1_location" value="<?php echo $response['metallurgical_test_surface_hard1_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_surface_hard1_requirement" value="<?php echo $response['metallurgical_test_surface_hard1_requirement'].' '.$response['surface_hardnessloc_value']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_surface_hard1_observation" value="<?php echo $response['metallurgical_test_surface_hard1_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_location" value="<?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_rcd_requirement'].' '.$response['surface_hardnessloc1_value']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_location" value="<?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_pcd_requirement'].' '.$response['core_hardness_value1']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_pcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?>"></td>
								 </tr>
								 <tr>
								  
								 <td colspan="12">2.2 Effective Case Depth @ <input class="" type="text" name="cut_off_point" value="<?php echo $response['cut_off_point']; ?>"></td>
								  
								 </tr>
								 <tr><td><strong>Location</strong></td><td><strong>Specification(mm)</strong></td><td><strong>Observation(mm)</strong></td></tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_location" value="<?php echo $response['metallurgical_test_case_depth_pcd_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_requirement" value="<?php echo $response['metallurgical_test_case_depth_pcd_requirement']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_observation" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_case_depth_location" value="<?php echo $response['metallurgical_test_case_depth_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_requirement" value="<?php echo $response['metallurgical_test_case_depth_requirement']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_observation" value="<?php echo $response['metallurgical_test_case_depth_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_case_depth_location1" value="<?php echo $response['metallurgical_test_case_depth_location1']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_requirement1" value="<?php echo $response['metallurgical_test_case_depth_requirement1']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_observation1" value="<?php echo $response['metallurgical_test_case_depth_observation1']; ?>"></td>
								 </tr>
								 </table>
								 </td>
								 </tr>
								 
						<tr>
								 <td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr><td colspan="6">2.3 Hardness travese in Hv (Distance from surface) <a class="btn btn-primary" href="#" onclick="generateGraph()">EditGraph</a></td></tr>
								 <tr>
									<td>in mm</td>
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
								 </tr>
								  <tr>
									<td>PCD</td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_pcd[]" value="<?php echo $hardness_traverse_pcd[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								  <tr>
									<td>RCD</td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_rcd[]" value="<?php echo $hardness_traverse_rcd[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								  <tr>
									<td><input type="text" name="hardness_traverse_value" value="<?php echo $response['hardness_traverse_value'] ?>"></td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_od[]" value="<?php echo $hardness_traverse_od[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								 </table>
								</td>
						</tr>		
						<tr>
								<td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr>
								
								 <td colspan="12">2.4 Microstructure: </td>
								 
								 </tr>
						<tr> 
						 <td><strong>Properties</strong></td>
						 <td><strong>Specification</strong></td>
						 <td><strong>Observation</strong></td>
						</tr>
						<!--
								<tr> 
								 <td><input class="size1" type="text" name="surface_hardness_location" value="<?php if($response['surface_hardness_location']){ echo $response['surface_hardness_location']; } else{ echo 'SURFACE HARDNESS AT TEETH'; } ?>"/></td>
								 <td><input class="size1" type="text" name="surface_hardness_requ" value="<?php if($response['surface_hardness_requ']){ echo $response['surface_hardness_requ']; }else{ echo '58-62 HRC (653 - 746 HV)'; } ?>"/></td>
								 <td><input class="size1" type="text" name="surface_hardness_obser" value="<?php if($response['surface_hardness_obser']){ echo $response['surface_hardness_obser']; } else{ echo '60-61 HRC'; } ?>"/></td>
								 </tr>
								 
							     <tr>
								 <td rowspan="2"><input class="size1" type="text" name="core_hardness_rcd1" value="<?php if($response['core_hardness_rcd1']){ echo $response['core_hardness_rcd1']; } else{ echo 'CORE HARDNESS AT RCD'; } ?>"/></td>
								 <td><input class="size1" type="text" name="core_hardness_rcd_req1" value="<?php if($response['core_hardness_rcd_req1']){ echo $response['core_hardness_rcd_req1']; } else{ echo 'Module >= 4 42 HRC MAX.'; } ?>"/></td>
								 <td><input class="size1" type="text" name="core_hardness_rcd_obser1" value="<?php if($response['core_hardness_rcd_obser1']){ echo $response['core_hardness_rcd_obser1']; }?>"/></td>
								 </tr>
								 
								 <tr> 
								 <td><input class="size1" type="text" name="core_hardness_rcd_req2" value="<?php if($response['core_hardness_rcd_req2']){ echo $response['core_hardness_rcd_req2']; } else{ echo 'Module < 4 44 HRC MAX.';}?>"/></td>
								 <td><input class="size1" type="text" name="core_hardness_rcd_obser2" value="<?php if($response['core_hardness_rcd_obser2']){ echo $response['core_hardness_rcd_obser2']; } else{ echo '39';}?>"/></td>
								 </tr>
							    <tr> 
								 <td><input class="size1" type="text" name="core_hardness_mid" value="<?php if($response['core_hardness_mid']){ echo $response['core_hardness_mid']; } else{ echo 'CORE HARDNESS AT MID TOOTH HEIGHT (PCD)';}?>"/></td>
								 <td><input class="size1" type="text" name="core_hardness_mid_req" value="<?php if($response['core_hardness_mid_req']){ echo $response['core_hardness_mid_req']; } else{ echo '45 HRC MAX.';}?>"/></td>
								 <td><input class="size1" type="text" name="core_hardness_mid_obs" value="<?php if($response['core_hardness_mid_obs']){ echo $response['core_hardness_mid_obs']; }else{ echo '43';}?>"/></td>
								 </tr>
								 -->
								 <tr> 
								 <td rowspan="2"><textarea class="size1" type="text" name="intergranular_oxide_depth_loc"><?php if($response['intergranular_oxide_depth_loc']){ echo $response['intergranular_oxide_depth_loc']; } else{ echo 'INTERGRANULAR OXIDE (IGO) DEPTH NETWORK';} ?></textarea></td>
								 <td><textarea class="size1" type="text" name="intergranular_oxide_depth_require"><?php if($response['intergranular_oxide_depth_require']){ echo $response['intergranular_oxide_depth_require']; } else{ echo 'if Upper ECD limit is < 0.75 IGO 18 Microns Max.';} ?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_gbo_igo_pcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation']?>"/></td>
								 </tr>
								 <tr> 
								 <td><textarea class="size1" type="text" name="intergranular_oxide_depth_require2"><?php if($response['intergranular_oxide_depth_require2']){ echo $response['intergranular_oxide_depth_require2']; } else{ echo 'if Upper ECD limit is < 0.75~ 2.25 IGO 20 Microns Max.';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_observation" value="<?php  echo $response['metallurgical_test_gbo_igo_rcd_observation'];?>"/></td>
								 </tr>
								 
								  <tr> 
								 <td><input class="size1" type="text" name="aust_grain_size" value="<?php if($response['aust_grain_size']){ echo $response['aust_grain_size']; } else{ echo 'AUSTENITE GRAIN SIZE';}?>"/></td>
								 <td><input class="size1" type="text" name="aust_grain_size_req" value="<?php if($response['aust_grain_size_req']){ echo $response['aust_grain_size_req']; } else{ echo '6 OR FINER';}?>"/></td>
								 <td><input class="size1" type="text" name="aust_grain_size_obser" value="<?php if($response['aust_grain_size_obser']){ echo $response['aust_grain_size_obser']; }else{ echo '7.0';}?>"/></td>
								 </tr>
					             
								 <tr> 
								 <td><textarea class="size1" type="text" name="care_micro"><?php if($response['care_micro']){ echo $response['care_micro']; } else{ echo 'CASE MICRO @ 500X :';}?></textarea></td>
								 <td><textarea class="size1" type="text" name="care_micro_requirement"><?php if($response['care_micro_requirement']){ echo $response['care_micro_requirement']; } else{ echo 'Tempered Fine Grain,High Carbon Martensite with 10 ~ 30 % RA. No Carbide networks,Continious or discontinious are Permissible.';}?></textarea></td>
								 <td><textarea class="size1" type="text" name="metallurgical_test_micro_case_observation"><?php  echo $response['metallurgical_test_micro_case_observation']; ?></textarea></td>
								 </tr>
								 <tr> 
								 <td><textarea class="size1" type="text" name="core_micro"><?php if($response['core_micro']){ echo $response['core_micro']; } else{ echo 'CORE MICRO @ 500X :';}?></textarea></td>
								 <td><textarea class="size1" type="text" name="core_micro_requirement"><?php if($response['core_micro_requirement']){ echo $response['core_micro_requirement']; } else{ echo 'Fine grain Low carbon Martensite,Banite & acicular ferrite, appropriate to the specified material grade and part section size, are permissible.Pearlite & blocky Ferrite are not allowed.';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_micro_core_observation" value="<?php  echo $response['metallurgical_test_micro_core_observation'];?>"/></td>
								 </tr>
								 
								 <tr> 
								 <td rowspan="2"><textarea class="size1" type="text" name="nmtp_location"><?php if($response['nmtp_location']){ echo $response['nmtp_location']; } else{ echo 'NMTP @500X ( Witin the case bainite/pearlite )';}?></textarea></td>
								 <td><textarea class="size1" type="text" name="nmtp_requirement"><?php if($response['nmtp_requirement']){ echo $response['nmtp_requirement']; } else{ echo 'At tooth Half Height -- Not allowed from the surface to a depth of (0.30mm) 50% of the specified Min ECD';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_nmtp_surface_pcd_observation" value="<?php  echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?>"/></td>
								 </tr>
								  <tr> 
								 <td><textarea class="size1" type="text" name="nmtp_requ_2"><?php if($response['nmtp_requ_2']){ echo $response['nmtp_requ_2']; } else{ echo 'At root fillet -- Trace amounts of NMTP are allowed from surface to a depth of(0.18mm) 30% of the required Min. root fillet ECD';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_nmtp_surface_rcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?>"/></td>
								 </tr>
								
								 
								  <tr> 
								 <td rowspan="2"><textarea class="size1" type="text" name="nmtp_igo_location"><?php if($response['nmtp_igo_location']){ echo $response['nmtp_igo_location']; } else{ echo 'NMTP @500X ( Associated with IGO )';}?></textarea></td>
								 <td><textarea class="size1" type="text" name="nmtp_igo_requirement"><?php if($response['nmtp_igo_requirement']){ echo $response['nmtp_igo_requirement']; } else{ echo 'On active profile of gear teeth,limited disontinuous NMTP shall not exceed the IGO Depth ( = < 20 microns ).';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_pcd_observation" value="<?php  echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; ?>"/></td>
								 </tr>
								  <tr> 
								 <td><textarea class="size1" type="text" name="nmtp_igo_requ_2"><?php if($response['nmtp_igo_requ_2']){ echo $response['nmtp_igo_requ_2']; } else{ echo 'In the teeth root, NMTP shall not exceed the IGO Depth ( = < 20 microns ).';}?></textarea></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_rcd_observation" value="<?php  echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; ?>"/></td>
								 </tr>
								 <tr> 
								 <td><input class="size1" type="text" name="extra_micro_location" value="<?php echo $response['extra_micro_location']; ?>"></td>
								 <td><input class="size1" type="text" name="extra_micro_requirement" value="<?php echo $response['extra_micro_requirement']; ?>"></td>
								 <td><input class="size1" type="text" name="extra_micro_observation" value="<?php echo $response['extra_micro_observation']; ?>"/></td>
								 </tr>
								 <!--
								 <tr>
								 <td><input class="size1" type="text" name="effect_location1" value="<?php if($response['effect_location1']){ echo $response['effect_location1']; } else{ echo 'EFFECTIVE CASE DEPTH AT SEC-AA at Cut Off 513 HV AT 1 Kg Load';}?>"/></td>
								 <td><input class="size1" type="text" name="effect_requirement1" value="<?php if($response['effect_requirement1']){ echo $response['effect_requirement1']; } else{ echo '0.6 - 0.9 mm';}?>"/></td>
								 <td><input class="size1" type="text" name="effect_observation1" value="<?php if($response['effect_observation1']){ echo $response['effect_observation1']; }else{ echo '0.80 mm';}?>"/></td>
								 </tr>
								  <tr> 
								  <td><input class="size1" type="text" name="effect_location2" value="<?php if($response['effect_location2']){ echo $response['effect_location2']; } else{ echo 'EFFECTIVE CASE DEPTH AT SEC-BB should be 60%min of lower spec. at PCD at Cut Off 513 HV AT 1 Kg Load';}?>"/></td>
								 <td><input class="size1" type="text" name="effect_requirement2" value="<?php if($response['effect_requirement2']){ echo $response['effect_requirement2']; } else{ echo '0.36 Min';}?>"/></td>
								 <td><input class="size1" type="text" name="effect_observation2" value="<?php if($response['effect_observation2']){ echo $response['effect_observation2']; }else{ echo '0.70 mm';}?>"/></td>
								 </tr>
								 -->
								 </table>
								</td>
						</tr>
						
						<tr>
						<td colspan="12" >Disposition: <input type="text" name="disposition" value="<?php echo $response['disposition'] ?>"></td>
						</tr>
						<tr>
						<td colspan="12">Remarks : <textarea name="remark" style="width:1000px;">OK</textarea></td>
						
						</tr>
						
                                                 <tr>
                                    <td>Checked By</td>
                                    			<td colspan="3">
                                                   <select class="size1" id="checked_by" name="checked_by" required="">

                                                            <option value="">SELECT</option>



                                                        <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';

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
                                                        <td>Prepared By</td>
                                                        <td colspan="3" id="verified_by_td">
                                                   <select class="size1" id="verified_by" name="verified_by" required="">

                                                            <option value="">SELECT</option>



                                                        <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("15",custom_field)';

                                                        $result =$crud->getAllData($query);

                                                          foreach ($result as $key => $value) {

                                                               if($value['id'] == $response['verified_by']){

                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';



                                                               }

                                                               else{



                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                               }  

                                                              

                                                          }

                                                        ?>

                                                            

                                                        </select><span class="showError" style="color:red;display: none;">This field is required</span></td>
                                    
                                    <td>Approved by :- </td><td colspan="3"><?php $q = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                      $rs = $crud->getSingleRow($q); ?> <input class="size1" type="text" value="<?php echo $rs['full_name'] ?>" readOnly/>
                                      <input type="hidden" name="approved_by" value="<?php echo $response['approved_by']; ?>"></td>
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
        	$(document).ready(function(){
				generateGraph();

        	});
		    $(document).ready(function(){
				getheat_no();

        	});
			$(document).ready(function(){
				getraw_no();

        	});
			function reset(id){
				window.location = 'cnh_report?id='+id +'&reset_id='+1;
			}
			function check_mid(id,arg)
			{
				var j_min = $('#chemical_composition_min'+id).val();
				var j_max = $('#chemical_composition_max'+id).val();
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

		  function getheat_no(){
            $.ajax({
				type : "POST",
                url : 'getheat_no.php',
                data : {
                   steel_code : $('#steel_code').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status == 1){
                   
					var chemical_composition_milltc = response.data.chemical_composition_milltc.split('*');
					var inclusion_rating_act_tn = response.data.inclusion_rating_act_tn.split('*');
					var inclusion_rating_act_tk = response.data.inclusion_rating_act_tk.split('*');
                    if(response.data.heat_no!=''){
					var heat_no = response.data.heat_no;
					$('#heat_no').val(heat_no);
                   
					   $.each(chemical_composition_milltc,function(i,val){ 
                       $('#chemical_composition_milltc'+i).val(val);
					   var j_min = $('#chemical_composition_min'+i).val();
				       var j_max = $('#chemical_composition_max'+i).val();
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
					   var sid = 'chemical_composition_milltc'+i;
				       var j_mil = val;
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
				   });
				   
				   
                    $.each(inclusion_rating_act_tn,function(i,val){
						var inclu= val+'/'+inclusion_rating_act_tk[i];
                       $('#inclu'+i).val(inclu);
				   });		
                    }
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
		   
		   function getraw_no(){
            $.ajax({
				type : "POST",
                url : 'getraw_no.php',
                data : {
                   grade : $('#grade').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status == 1){
                    console.log(response.data);
                    var chemical_composition_min = response.data.min.split(',');
                    var chemical_composition_max = response.data.max.split(',');
				
                    $.each(chemical_composition_min,function(i,val){
                       $('#chemical_composition_min'+i).val(val);
                    });
                    $.each(chemical_composition_max,function(i,val){
                       $('#chemical_composition_max'+i).val(val);
					   var j_min = $('#chemical_composition_min'+i).val();
				       var j_max = $('#chemical_composition_max'+i).val();
					   var j_mil = $('#chemical_composition_milltc'+i).val();
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
					   var sid = 'chemical_composition_milltc'+i;
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
					   
					   });
					   
					
                    
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
		
		
		
		$(function() {
			if($('#customer').val() == 'REML' || $('#customer').val() == 'ETB' || $('#customer').val() == 'FORCE MOTOR'){
					$('#p,#p1,#p2,#p3').hide();
			}
			if($('#customer').val() == 'ZF' || $('#customer').val() == 'POLARIS' || $('#customer').val() == 'TAFE' || $('#customer').val() == 'CNH' || $('#customer').val() == 'VOLVO'){
					$('#p,#p1,#p4').hide();
			}
			if($('#customer').val() == 'FORCE MOTOR'){
					$('#p5').hide();
			}
		});
		
        			function generateGraph(){
        	var pcd =[]; var rcd = []; var od = [];
        	var x = $('input[name="hardness_traverse_value"]').val();
        	$('input[name^="hardness_traverse_pcd"]').each(function() {

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
        	$('#graph').highcharts({

        title: {

            text: 'HARDNESS TRAVERSE GRAPH',

            x: -20 //center

        },

        

        xAxis: {

            title:{

               text : 'Distance in MM'

            },

            categories: ['0.1', '0.2', '0.3', '0.4', '0.5','0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3','1.4','1.5','1.6','1.7','1.8','1.9','2.0'],

               

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
          setTimeout(function(){
	save_chart($('#graph').highcharts(), 'chart');
	$('.word').css('display','block');
},2000);
      }
	var EXPORT_WIDTH = 250;
	function save_chart(chart, filename) {
    var render_width = EXPORT_WIDTH;
    var render_height = render_width * chart.chartHeight / chart.chartWidth

    var svg = chart.getSVG({
        exporting: {
            sourceWidth: chart.chartWidth,
            sourceHeight: chart.chartHeight
        }
    });

    var canvas = document.createElement('canvas');
    canvas.height = render_height;
    canvas.width = render_width;

    var image = new Image;
    image.onload = function() {
        canvas.getContext('2d').drawImage(this, 0, 0, render_width, render_height);
        var data = canvas.toDataURL("image/png")
        $('#image_graph').val(data);
    };
    image.src = 'data:image/svg+xml;base64,' + window.btoa(svg);
}
	
	function saveData(save){
		if($('#verified_by option:selected').val()  == ''){
			$.sticky('select Verified by', {autoclose : 3000, position: "top-center", type: "st-success" });
			$('.showError').css('display','block');
			$('#verified_by_td').addClass('f-error');
			return false;
		}
		else{
			$('#verified_by_td').removeClass('f-error');

			$('.showError').css('display','none');
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
				
				var r3 =1;
				var pcd = '';
			$('input[name^="hardness_traverse_pcd"]').each(function() {
                     if(r3==1){
						 pcd+='*'+$(this).val();
					 }
					 else {
						 pcd+='*'+$(this).val();
					 }
					 r3++;
                });
				
				var r4 =1;
				var rcd = '';
			$('input[name^="hardness_traverse_rcd"]').each(function() {
                     if(r4==1){
						 rcd+='*'+$(this).val();
					 }
					 else {
						 rcd+='*'+$(this).val();
					 }
					 r4++;
                });
				var r5 =1;
				var od = '';
			$('input[name^="hardness_traverse_od"]').each(function() {
                     if(r5==1){
						 od+='*'+$(this).val();
					 }
					 else {
						 od+='*'+$(this).val();
					 }
					 r5++;
                });		
               var r6 =1;
				var inc = '';
			$('input[name^="inclu"]').each(function() {
                     if(r6==1){
						 inc+=$(this).val();
					 }
					 else {
						 inc+='*'+$(this).val();
					 }
					 r6++;
                });						
				
          var data = {  
          
          fiat_std : $('input[name="fiat_std"]').val(),
          supplier : $('input[name="supplier"]').val(),
          module : $('input[name="module"]').val(),
          chordial : $('input[name="chordial"]').val(),
          heat_treat : $('input[name="heat_treat"]').val(),
          surface : $('input[name="surface"]').val(),
		  steel_code : $('input[name="steel_code"]').val(),
		  disposition : $('input[name="disposition"]').val(),
		  hardness_traverse_value : $('input[name="hardness_traverse_value"]').val(),
		  
		  chemical_composition_min : x,
		  chemical_composition_max : sae_max,
		  chemical_composition_milltc : che_obs,
		  
		  //hardness/distance
		  hardness_traverse_pcd : pcd,
		  hardness_traverse_rcd : rcd,
		  hardness_traverse_od : od,
		  cut_off : $('#cut_off').val(),
		  cut_off_point : $('input[name="cut_off_point"]').val(),
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
		  core_hardness_rcd_req2 : $('input[name="core_hardness_rcd_req2"]').val(),
          core_hardness_rcd_obser2 : $('input[name="core_hardness_rcd_obser2"]').val(),
          
		  core_hardness_mid : $('input[name="core_hardness_mid"]').val(),
          core_hardness_mid_req : $('input[name="core_hardness_mid_req"]').val(),
          core_hardness_mid_obs : $('input[name="core_hardness_mid_obs"]').val(),
		  
		  surface_hardness_location : $('input[name="surface_hardness_location"]').val(),
          surface_hardness_requ : $('input[name="surface_hardness_requ"]').val(),
          surface_hardness_obser : $('input[name="surface_hardness_obser"]').val(),

          core_hardness_rcd1 : $('input[name="core_hardness_rcd1"]').val(),
          core_hardness_rcd_req1 : $('input[name="core_hardness_rcd_req1"]').val(),
          core_hardness_rcd_obser1 : $('input[name="core_hardness_rcd_obser1"]').val(),
		  
          metallurgical_test_gbo_igo_rcd_observation : $('input[name="metallurgical_test_gbo_igo_rcd_observation"]').val(),
          intergranular_oxide_depth_require2 : $('textarea[name="intergranular_oxide_depth_require2"]').val(),
          metallurgical_test_nmtp_surface_rcd_location : $('input[name="metallurgical_test_nmtp_surface_rcd_location"]').val(),


          intergranular_oxide_depth_loc : $('textarea[name="intergranular_oxide_depth_loc"]').val(),
          intergranular_oxide_depth_require : $('textarea[name="intergranular_oxide_depth_require"]').val(),
          metallurgical_test_gbo_igo_pcd_observation : $('input[name="metallurgical_test_gbo_igo_pcd_observation"]').val(),
          
		  metallurgical_test_case_depth_pcd_location : $('input[name="metallurgical_test_case_depth_pcd_location"]').val(),
          metallurgical_test_case_depth_pcd_requirement : $('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(),
          metallurgical_test_case_depth_pcd_observation : $('input[name="metallurgical_test_case_depth_pcd_observation"]').val(),

          metallurgical_test_case_depth_location : $('input[name="metallurgical_test_case_depth_location"]').val(),
          metallurgical_test_case_depth_requirement : $('input[name="metallurgical_test_case_depth_requirement"]').val(),
          metallurgical_test_case_depth_observation : $('input[name="metallurgical_test_case_depth_observation"]').val(),
		  
		  metallurgical_test_case_depth_location1 : $('input[name="metallurgical_test_case_depth_location1"]').val(),
          metallurgical_test_case_depth_requirement1 : $('input[name="metallurgical_test_case_depth_requirement1"]').val(),
          metallurgical_test_case_depth_observation1 : $('input[name="metallurgical_test_case_depth_observation1"]').val(),
           
		  //autenitE
		  aust_grain_size : $('input[name="aust_grain_size"]').val(),
          aust_grain_size_req : $('input[name="aust_grain_size_req"]').val(),
          aust_grain_size_obser : $('input[name="aust_grain_size_obser"]').val(),
		  
		  //micro
		  care_micro : $('textarea[name="care_micro"]').val(),
          care_micro_requirement : $('textarea[name="care_micro_requirement"]').val(),
          metallurgical_test_micro_case_observation : $('textarea[name="metallurgical_test_micro_case_observation"]').val(),
		  core_micro : $('textarea[name="core_micro"]').val(),
          core_micro_requirement : $('textarea[name="core_micro_requirement"]').val(),
          metallurgical_test_micro_core_observation : $('input[name="metallurgical_test_micro_core_observation"]').val(),
			
		  //nmtp
		  nmtp_location : $('textarea[name="nmtp_location"]').val(),
          nmtp_requirement : $('textarea[name="nmtp_requirement"]').val(),
          metallurgical_test_nmtp_surface_pcd_observation : $('input[name="metallurgical_test_nmtp_surface_pcd_observation"]').val(),
		  nmtp_requ_2 : $('textarea[name="nmtp_requ_2"]').val(),
          metallurgical_test_nmtp_surface_rcd_observation : $('input[name="metallurgical_test_nmtp_surface_rcd_observation"]').val(),
         
		  nmtp_igo_location : $('textarea[name="nmtp_igo_location"]').val(),
          nmtp_igo_requirement : $('textarea[name="nmtp_igo_requirement"]').val(),
          metallurgical_test_itp_sub_surface_pcd_observation : $('input[name="metallurgical_test_itp_sub_surface_pcd_observation"]').val(),
		  nmtp_igo_requ_2 : $('textarea[name="nmtp_igo_requ_2"]').val(),
          metallurgical_test_itp_sub_surface_rcd_observation : $('input[name="metallurgical_test_itp_sub_surface_rcd_observation"]').val(),
		  
		  //extra
		  extra_micro_location : $('input[name="extra_micro_location"]').val(),
          extra_micro_requirement : $('input[name="extra_micro_requirement"]').val(),
          extra_micro_observation : $('input[name="extra_micro_observation"]').val(),
		 
		 //effective case
		  effect_location1 : $('input[name="effect_location1"]').val(),
          effect_location2 : $('input[name="effect_location2"]').val(),
          effect_requirement1 : $('input[name="effect_requirement1"]').val(),
		  effect_requirement2 : $('input[name="effect_requirement2"]').val(),
          effect_observation1 : $('input[name="effect_observation1"]').val(),
		  effect_observation2 : $('input[name="effect_observation2"]').val()
		  
		 
          };

          $.ajax({

               type : "POST",

               url : 'word2.php',

               data : {

                customer : $('input[name="customer"]').val(),

                date : $('input[name="date"]').val(),

                batch_code :  $('input[name="batch_code"]').val(),

                part_no :  $('input[name="part_no"]').val(),
				
				control_plan_id :  $('input[name="control_plan_id"]').val(),
				
				report_no : $('input[name="report_no"]').val(),

                qty :  $('input[name="qty"]').val(),

                part_name :  $('input[name="part_name"]').val(),

                grade :  $('input[name="grade"]').val(),

                remark : $('textarea[name="remark"]').val(),
				heat_no : $('input[name="heat_no"]').val(),				
				report_id : $('input[name="report_id"]').val(),
				image_graph : $('input[name="image_graph"]').val(),
				checked_by : $('#checked_by option:selected').val(),
                approved_by : $('input[name="approved_by"]').val(),
				verified_by : $('#verified_by option:selected').val(),
                data : JSON.stringify(data)
              },
			  dataType : "JSON",

              success : function(res){
				if(save==0)
				  {
                window.location = 'download_cnh1.php?id='+res.data;
				  }else if(save == 2){
					window.location = 'report_cnh_pdf?id='+res.data;
				}
				else if(save == 1){
					$.sticky('Record Saved Successfully', {autoclose : 3000, position: "top-center", type: "st-success" });
				}
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
       function getHTControlPlan(){
        	 $.ajax({
            type : "POST",
            url : "get_part_data.php",
            data : {
                part_no : $('input[name="part_no"]').val()
            },
            dataType : "JSON",
            success : function(data){
            	if(data.status == 1){
				$('input[name="customer"]').val(data.data[0]['customer_name']);
                $('input[name="part_name"]').val(data.data[0]['part_name']);
				$('input[name="control_plan_id"]').val(data.data[0]['part_id']);
				$('input[name="grade"]').val(data.data[0]['steel_grade']);	 
				
            	$('input[name="metallurgical_test_surface_hard1_location"]').val(data.data[0]['surface_hardness_1']);
            	$('input[name="metallurgical_test_surface_hard1_requirement"]').val(data.data[0]['surface_hardness_2']+' '+data.data[0]['surface_hardness2_value']);
				$('input[name="metallurgical_test_core_hardness_rcd_location"]').val(data.data[0]['core_hardness_location1']);
				$('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(data.data[0]['core_hardness_requirement1']+' '+data.data[0]['core_hardness_value1']);
				$('input[name="metallurgical_test_core_hardness_pcd_location"]').val(data.data[0]['core_hardness_location']);
				$('input[name="metallurgical_test_core_hardness_pcd_requirement"]').val(data.data[0]['core_hardness_requirement']+' '+data.data[0]['core_hardness_value']);
				$('input[name="cut_off_point"]').val(data.data[0]['cut_off']+' '+data.data[0]['cut_off_value']);
				
				$('input[name="metallurgical_test_case_depth_pcd_location"]').val(data.data[0]['effective_case_depth_location']);
				$('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(data.data[0]['effective_case_depth_requirement']);

				$('input[name="metallurgical_test_case_depth_location"]').val(data.data[0]['effective_case_depth_location2']);
				$('input[name="metallurgical_test_case_depth_requirement"]').val(data.data[0]['effective_case_depth_requirement2']);
					
				}
				
			 }
        	});

        }


        </script>

