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
    .remark-class{
      width:60px;
    }
    .require-class{
      width:230px;
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
                                    $response['part_no'] = $result['part_no'];																		$response['report_no'] = $result['report_no'];
                                    $response['qty'] = $result['qty'];
                                    $response['part_name'] = $result['part_name'];
                                    $response['grade'] = $result['grade'];
                                    $response['remark'] = $result['remark'];
                                    $response['steel_mill'] = $result['steel_mill'];									
                                    $response['heat_no'] = $result['heat_no'];
                                    $response['mill_tc'] = $result['mill_tc'];
                                    $response['forger_tc'] = $result['forger_tc'];
                                    $response['checked_by'] = $result['checked_by'];
                                    $response['approved_by'] = $result['approved_by'];
									$response['verified_by'] = $result['verified_by'];
								 }
                                   else{

                                    $query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                   }}
								   else{

                                    $query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                   }

                                ?>
								<div style="float:right;">
	<a class="btn btn-beoro-3" href="#" onclick="reset(<?php echo $id; ?>)">Reset</a>
		<a class="btn btn-success" href="#" onclick="saveData(1)" >Save</a>
		<a class="btn btn-info" href="#" onclick="saveData(0)" >Word</a> 
<a class="btn btn-beoro-1" href="#" onclick="saveData(2)" >PDF</a>
  </div>
                                <div id="docx">
                                <table id="example2" class="table display nowrap table-bordered">
                                  <tr>
                                    <td colspan="8" style="background-color:#ccc;text-align: center;">METALLURGICAL TEST REPORT</td>
                                   </tr>								   								    <tr>                                    <td>Report No</td>                                    <td colspan="4"><input type="text" name="report_no" value="<?php echo $response['report_no']; ?>"/></td>                                   </tr>
                                   <tr>
                                    <td>Customer</td>
                                    <td colspan="3"><input type="text" name="customer" value="<?php echo $response['customer']; ?>"/><input type="hidden" name="report_id" value="<?php echo $id; ?>"></td>
                                    <td>Date</td>
                                    <td colspan="3"><input type="text" name="date" value="<?php echo $response['date']; ?>"/></td>
                                   </tr>
                                  <tr>
                                    <td>Cust Part ID</td>
                                    <td colspan="3"><input type="text" name="control_plan_id" value="<?php echo $response['control_plan_id']; ?>"/></td>
                                    <td>Batch Code</td>
                                    <td colspan="3"><input type="text" name="batch_code" value="<?php echo $response['batch_code']; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>EECD Part No</td>
									<td colspan="3"><div class="input-append"><input class="size1" type="text" name="part_no" style="width: 36%;" value="<?php echo $response['part_no'] ?>"/><button class="btn" onclick="getHTControlPlan()">Go</button></div>
                                    <td>Qty</td>
                                    <td colspan="3"><input type="text" name="qty" value="<?php echo $response['qty']; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>Part Name</td>
                                    <td colspan="3"><input type="text" name="part_name" value="<?php echo $response['part_name']; ?>"/></td>
                                    <td>Material</td>
                                    <td colspan="3"><input type="text" name="grade" value="<?php echo $response['grade']; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>Steel Mill</td>
                                    <td><input type="text" name="steel_mill" value="<?php echo $response['steel_mill'] ?>" onkeyup="getRawMaterial()"/></td>
                                    <td></td>
                                    <td><input type="text" name="mill_tc" value="<?php echo $response['mill_tc'] ?>" style="display: none;"></td>
                                    <td></td>
                                    <td><input type="text" name="forger_tc" value="<?php echo $response['forger_tc'] ?>" style="display: none;"></td>
                                    <td>Heat No.</td>
                                    <td><input type="text" name="heat_no" value="<?php echo $response['heat_no'] ?>"/></td>
                                   </tr>
                                   <tr style="background-color:#ccc;text-align: center;">
                                    <td>S.No</td>
                                    <td>Parameters</td>
                                    <td>Location</td>
                                    <td>Specification</td>
                                    <td>Observation</td>
                                    <td></td>
                                    <td></td>
                                    <td>Remarks</td>
                                   </tr>
                                   <tr>
                                    <td rowspan="3">1.</td>
                                    <td rowspan="3">Effective Case Depth in mm</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_case_depth_pcd_location" value="<?php echo $response['metallurgical_test_case_depth_pcd_location']; ?>"/></td>
                                    <td><input type="text"  name="eff_after_grinding_requirement1" value="<?php echo $response['eff_after_grinding_requirement1']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="remark_observe1" value="<?php echo $response['remark_observe1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_case_depth_pcd_observation1" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_case_depth_pcd_observation2" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_ag" value="<?php echo 'OK'; ?>"/></td>
                                    </tr>
                                   <tr>
                                    <td><input type="text" class="require-class" name="metallurgical_test_case_depth_location" value="<?php echo $response['metallurgical_test_case_depth_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_case_depth_requirement" value="<?php echo $response['metallurgical_test_case_depth_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_case_depth_observation" value="<?php echo $response['metallurgical_test_case_depth_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_case_depth_observation1" value="<?php echo $response['metallurgical_test_case_depth_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_case_depth_observation2" value="<?php echo $response['metallurgical_test_case_depth_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark4" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <!-- new Fields -->
                                   <tr>
                                    <td><input type="text" class="require-class" name="eff_case_depth_location" value="<?php echo $response['eff_case_depth_location']; ?>"/></td>
                                    <td><input type="text"  name="eff_case_depth_requirement" value="<?php echo $response['eff_case_depth_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="eff_case_depth_observation" value="<?php echo $response['eff_case_depth_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="eff_case_depth_observation1" value="<?php echo $response['eff_case_depth_observation1'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="eff_case_depth_observation2" value="<?php echo $response['eff_case_depth_observation2'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="eff_case_depth_observation_remark" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>2.</td>
                                    <td>Hardness in HRC</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_surface_hard2_location" value="<?php echo $response['metallurgical_test_surface_hard2_location'] ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_surface_hard2_requirement" value="<?php echo $response['metallurgical_test_surface_hard2_requirement'] ?>" style="width:132px !important;"/><input type="text" name="surface_hardnessloc1_value" value="<?php echo $response['surface_hardnessloc1_value'] ?>" style="width:132px !important;"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard2_observation" value="<?php echo $response['metallurgical_test_surface_hard2_observation'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard2_observation1" value="<?php echo $response['metallurgical_test_surface_hard2_observation1'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard2_observation2" value="<?php echo $response['metallurgical_test_surface_hard2_observation2'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark2" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td rowspan="3">3.</td>
                                    <td rowspan="3">Core Hardness in HRC</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_core_hardness_pcd_location" value="<?php echo $response['metallurgical_test_core_hardness_pcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_core_hardness_pcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_pcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_pcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_pcd_observation1" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_pcd_observation2" value="<?php echo $response['metallurgical_test_core_hardness_pcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark7" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td><input type="text" class="require-class" name="metallurgical_test_core_hardness_rcd_location" value="<?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_core_hardness_rcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_rcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_rcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_rcd_observation1" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_core_hardness_rcd_observation2" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark8" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <!-- new Fields -->
                                   <tr>
                                    <td><input type="text" class="require-class" name="core_hardness_location" value="<?php echo $response['core_hardness_location']; ?>"/></td>
                                    <td><input type="text"  name="core_hardness_requirement" value="<?php echo $response['core_hardness_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="core_hardness_observation" value="<?php echo $response['core_hardness_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="core_hardness_observation1" value="<?php echo $response['core_hardness_observation1'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="core_hardness_observation2" value="<?php echo $response['core_hardness_observation2'] ?>"/></td>
                                    <td><input type="text" class="remark-class" name="core_hardness_remark" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>4.</td>
                                    <td>Surface Hardness after final grinding in HRC</td>
                                    <td><input type="text" class="require-class" name="surface_hardness_location_after_grind" value="<?php echo $response['surface_hardness_location_after_grind']; ?>"/></td>
                                    <td><input type="text"  name="surface_hardness_requirement_after_grind" value="<?php echo $response['surface_hardness_requirement_after_grind']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="remark_observe3" value="<?php echo $response['remark_observe3']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_observe31" value="<?php echo $response['remark_observe31']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_observe32" value="<?php echo $response['remark_observe32']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_ag3" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>5.</td>
                                    <td>Surface Hardness</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_surface_hard1_location" value="<?php echo $response['metallurgical_test_surface_hard1_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_surface_hard1_requirement" value="<?php echo $response['metallurgical_test_surface_hard1_requirement']; ?>" style="width:132px;"/><input type="text" name="surface_hardnessloc_value" value="<?php echo $response['surface_hardnessloc_value']; ?>" style="width:132px;"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard1_observation" value="<?php echo $response['metallurgical_test_surface_hard1_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard1_observation1" value="<?php echo $response['metallurgical_test_surface_hard1_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_surface_hard1_observation2" value="<?php echo $response['metallurgical_test_surface_hard1_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark1" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td rowspan="2">6.</td>
                                    <td rowspan="2">Surface Bainite</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_nmtp_surface_pcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_nmtp_surface_pcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_pcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_pcd_observation1" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_pcd_observation2" value="<?php echo $response['metallurgical_test_nmtp_surface_pcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_nmtp" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td><input type="text" class="require-class" name="metallurgical_test_nmtp_surface_rcd_location" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_nmtp_surface_rcd_requirement" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_rcd_observation" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_rcd_observation1" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_nmtp_surface_rcd_observation2" value="<?php echo $response['metallurgical_test_nmtp_surface_rcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_nmtp2" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td rowspan="2">7.</td>
                                    <td rowspan="2">Sub Surface Bainite</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_itp_sub_surface_pcd_location" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_itp_sub_surface_pcd_requirement" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_pcd_observation" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_pcd_observation1" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_pcd_observation2" value="<?php echo $response['metallurgical_test_itp_sub_surface_pcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_itp" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td><input type="text" class="require-class" name="metallurgical_test_itp_sub_surface_rcd_location" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_itp_sub_surface_rcd_requirement" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_requirement']; ?>" class="set-width"></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_rcd_observation" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_rcd_observation1" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_itp_sub_surface_rcd_observation2" value="<?php echo $response['metallurgical_test_itp_sub_surface_rcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="remark_itp2" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>8.</td>
                                    <td>Grain Boundary Oxidation</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_gbo_igo_pcd_location" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_gbo_igo_pcd_requirement" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_requirement']; ?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_gbo_igo_pcd_observation" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_gbo_igo_pcd_observation1" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="metallurgical_test_gbo_igo_pcd_observation2" value="<?php echo $response['metallurgical_test_gbo_igo_pcd_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" class="remark-class" name="remark_gbo" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td rowspan="4">9.</td>
                                    <td>Dark etched Microstructure Retained Austenite</td>
                                    <td><input type="text" class="require-class" name="metallurgical_test_micro_case_location" value="<?php echo $response['metallurgical_test_micro_case_location']; ?>"/></td>
                                    <td><input type="text"  name="metallurgical_test_micro_case_requirement" value="<?php echo $response['metallurgical_test_micro_case_requirement']; ?>" class="set-width"/></td>
                                    <td><p><input type="text" class="remark-class" name="metallurgical_test_micro_case_observation" value="<?php if($response['metallurgical_test_micro_case_observation']){ echo $response['metallurgical_test_micro_case_observation']; }?>"/></p></td>
                                    <td><input type="text" class="remark-class" name="d1_observation1" value="<?php echo $response['d1_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="d1_observation2" value="<?php echo $response['d1_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="d1_remark" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>Carbides</td>
                                    <td><input type="text" class="require-class" name="dc_location" value="<?php echo $response['dc_observation1']; ?>"/></td>
                                    <td><input type="text"  name="dc_requirement" value="<?php if($response['dc_requirement']){ echo $response['dc_requirement']; }else{ echo 'DC1 borderline'; }?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="dc_observation" value="<?php if($response['dc_observation']){ echo $response['dc_observation']; }else{ echo 'DC0'; }?>"/></td>
                                    <td><input type="text" class="remark-class" name="dc_observation1" value="<?php echo $response['dc_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="dc_observation2" value="<?php echo $response['dc_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="dc_remark" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>Decarb</td>
                                    <td><input type="text" class="require-class" name="decarb_location" value="<?php if($response['decarb_location']){ echo $response['decarb_location']; }else{ echo 'X'; }?>" /></td>
                                    <td><input type="text"  name="decarb_requirement" value="<?php if($response['decarb_location']){ echo $response['decarb_location']; }else{ echo 'D1 Borderline'; }?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="decarb_observation" value="<?php if($response['d1_borderline']){ echo $response['d1_borderline']; }else{ echo 'D0'; }?>"/></td>
                                    <td><input type="text" class="remark-class" name="decarb_observation1" value="<?php echo $response['decarb_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="decarb_observation2" value="<?php echo $response['decarb_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="decarb_remark" value="<?php echo 'OK'; ?>"/></td>
                                   </tr>
                                   <tr>
                                    <td>Core Ferrite</td>
                                    <td><input type="text" class="require-class" name="ferrite_location" value="<?php if($response['ferrite_location']){ echo $response['ferrite_location']; }else{ echo 'D'; }?>"/></td>
                                    <td><input type="text"  name="ferrite_requirement" value="<?php if($response['ferrite_requirement']){ echo $response['ferrite_requirement']; }else{ echo 'F5 Acceptable'; }?>" class="set-width"/></td>
                                    <td><input type="text" class="remark-class" name="ferrite_observation"  value="<?php if($response['ferrite_observation']){ echo $response['ferrite_observation']; }else{ echo 'F2-3'; }?>"/></td>
                                    <td><input type="text" class="remark-class" name="ferrite_observation1" value="<?php echo $response['ferrite_observation1']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="ferrite_observation2" value="<?php echo $response['ferrite_observation2']; ?>"/></td>
                                    <td><input type="text" class="remark-class" name="ferrite_remark" value="<?php if($response['ferrite_remark']){ echo $response['ferrite_remark']; }else{ echo 'OK'; }?>"/></td>
                                   </tr>
                                   <tr>
                                    <td colspan="8">Remarks : <input type="text" name="remark" value="Burn test done on two part No grinding burn seen. OK" style="width:1000px;"/></td>
                                   </tr>
                                </table>
                                <br>
                                <table  class="table display nowrap table-bordered">
                                  <tr>
                                    <td colspan="2" style="text-align: center;">Micro Photographs Magnification : 500 X</td>
                                  </tr>
                                  <tr>
                                    <td style="height: 300px;width:50%;"></td>
                                    <td style="height: 300px;width:50%;"></td>
                                  </tr>
                                  <tr>
                                    <td>Surface Bainite Loc-X</td>
                                    
                                    <td>Surface Bainite Loc-C</td>
                                  </tr>
                                  <tr>
                                    <td style="height: 300px;width:40%;"></td>
                                    <td style="height: 300px;width:50%;"></td>
                                  </tr>
                                  <tr>
                                    <td>Case Microstructure Loc-X</td>
                                    <td>Core Microstructue Loc-D</td>
                                  </tr>
                                <tr>
                                    <td>Checked by :- <?php
                                      $q = 'SELECT full_name FROM users WHERE id='.$response['checked_by'];
                                      $rs = $crud->getSingleRow($q);
                                      ?><input class="require-class" type="text" value="<?php echo $rs['full_name'] ?>" readOnly/>
                                      <input type="hidden" name="checked_by" value="<?php echo $response['checked_by']; ?>">
                                      <p style="float:right;" id="verified_by_td">Prepared By<select class="require-class" id="verified_by" name="verified_by" required="">

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

                                                            

                                                        </select><span class="showError size1" style="color:red;display: none;">This field is required</span></p></td>
                                    
                                    <td>Approved by :- <?php $q = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                      $rs = $crud->getSingleRow($q); ?> <input type="text" value="<?php echo $rs['full_name'] ?>" readOnly/>
                                      <input class="require-class" type="hidden" name="approved_by" value="<?php echo $response['approved_by']; ?>"></td>
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
		function reset(id){
				window.location = 've_reports_1?id='+id +'&reset_id='+1;
			}
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
          var data = {  
          metallurgical_test_case_depth_pcd_location: $('input[name="metallurgical_test_case_depth_pcd_location"]').val(),
          eff_after_grinding_requirement1: $('input[name="eff_after_grinding_requirement1"]').val(),
          remark_observe1: $('input[name="remark_observe1"]').val(),
          metallurgical_test_case_depth_pcd_observation1 : $('input[name="metallurgical_test_case_depth_pcd_observation1"]').val(),
          metallurgical_test_case_depth_pcd_observation2 : $('input[name="metallurgical_test_case_depth_pcd_observation2"]').val(),
          remark_ag : $('input[name="remark_ag"]').val(),

          metallurgical_test_case_depth_location : $('input[name="metallurgical_test_case_depth_location"]').val(),
          metallurgical_test_case_depth_requirement : $('input[name="metallurgical_test_case_depth_requirement"]').val(),
          metallurgical_test_case_depth_observation : $('input[name="metallurgical_test_case_depth_observation"]').val(),
          metallurgical_test_case_depth_observation1 : $('input[name="metallurgical_test_case_depth_observation1"]').val(),
          metallurgical_test_case_depth_observation2 : $('input[name="metallurgical_test_case_depth_observation2"]').val(),
          remark4 : $('input[name="remark4"]').val(),
         
          metallurgical_test_surface_hard2_location : $('input[name="metallurgical_test_surface_hard2_location"]').val(),
          metallurgical_test_surface_hard2_requirement : $('input[name="metallurgical_test_surface_hard2_requirement"]').val(),
          surface_hardnessloc1_value : $('input[name="surface_hardnessloc1_value"]').val(),
          metallurgical_test_surface_hard2_observation : $('input[name="metallurgical_test_surface_hard2_observation"]').val(),
          metallurgical_test_surface_hard2_observation1 : $('input[name="metallurgical_test_surface_hard2_observation1"]').val(),
          metallurgical_test_surface_hard2_observation2 : $('input[name="metallurgical_test_surface_hard2_observation2"]').val(),
          remark2 : $('input[name="remark2"]').val(),

          metallurgical_test_core_hardness_pcd_location : $('input[name="metallurgical_test_core_hardness_pcd_location"]').val(),
          metallurgical_test_core_hardness_pcd_requirement : $('input[name="metallurgical_test_core_hardness_pcd_requirement"]').val(),
          metallurgical_test_core_hardness_pcd_observation : $('input[name="metallurgical_test_core_hardness_pcd_observation"]').val(),
          metallurgical_test_core_hardness_pcd_observation1 : $('input[name="metallurgical_test_core_hardness_pcd_observation1"]').val(),
          metallurgical_test_core_hardness_pcd_observation2 : $('input[name="metallurgical_test_core_hardness_pcd_observation2"]').val(),
          remark7 : $('input[name="remark7"]').val(),

          metallurgical_test_core_hardness_rcd_location : $('input[name="metallurgical_test_core_hardness_rcd_location"]').val(),
          metallurgical_test_core_hardness_rcd_requirement : $('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(),
          metallurgical_test_core_hardness_rcd_observation : $('input[name="metallurgical_test_core_hardness_rcd_observation"]').val(),
          metallurgical_test_core_hardness_rcd_observation1 : $('input[name="metallurgical_test_core_hardness_rcd_observation1"]').val(),
          metallurgical_test_core_hardness_rcd_observation2 : $('input[name="metallurgical_test_core_hardness_rcd_observation2"]').val(),
          remark8 : $('input[name="remark8"]').val(),

          surface_hardness_location_after_grind : $('input[name="surface_hardness_location_after_grind"]').val(),
          surface_hardness_requirement_after_grind : $('input[name="surface_hardness_requirement_after_grind"]').val(),
          remark_observe3 : $('input[name="remark_observe3"]').val(),
          remark_observe31 : $('input[name="remark_observe31"]').val(),
          remark_observe32 : $('input[name="remark_observe32"]').val(),
          remark_ag3 : $('input[name="remark_ag3"]').val(),

          metallurgical_test_surface_hard1_location : $('input[name="metallurgical_test_surface_hard1_location"]').val(),
          metallurgical_test_surface_hard1_requirement : $('input[name="metallurgical_test_surface_hard1_requirement"]').val(),
          surface_hardnessloc_value : $('input[name="surface_hardnessloc_value"]').val(),
          metallurgical_test_surface_hard1_observation : $('input[name="metallurgical_test_surface_hard1_observation"]').val(),
          metallurgical_test_surface_hard1_observation1 : $('input[name="metallurgical_test_surface_hard1_observation1"]').val(),
          metallurgical_test_surface_hard1_observation2 : $('input[name="metallurgical_test_surface_hard1_observation2"]').val(),
          remark1 : $('input[name="remark1"]').val(),

          metallurgical_test_nmtp_surface_pcd_location : $('input[name="metallurgical_test_nmtp_surface_pcd_location"]').val(),
          metallurgical_test_nmtp_surface_pcd_requirement : $('input[name="metallurgical_test_nmtp_surface_pcd_requirement"]').val(),
          metallurgical_test_nmtp_surface_pcd_observation : $('input[name="metallurgical_test_nmtp_surface_pcd_observation"]').val(),
          metallurgical_test_nmtp_surface_pcd_observation1 : $('input[name="metallurgical_test_nmtp_surface_pcd_observation1"]').val(),
          metallurgical_test_nmtp_surface_pcd_observation2 : $('input[name="metallurgical_test_nmtp_surface_pcd_observation2"]').val(),
          remark_nmtp : $('input[name="remark_nmtp"]').val(),

          metallurgical_test_nmtp_surface_rcd_location : $('input[name="metallurgical_test_nmtp_surface_rcd_location"]').val(),
          metallurgical_test_nmtp_surface_rcd_requirement : $('input[name="metallurgical_test_nmtp_surface_rcd_requirement"]').val(),
          metallurgical_test_nmtp_surface_rcd_observation : $('input[name="metallurgical_test_nmtp_surface_rcd_observation"]').val(),
          metallurgical_test_nmtp_surface_rcd_observation1 : $('input[name="metallurgical_test_nmtp_surface_rcd_observation1"]').val(),
          metallurgical_test_nmtp_surface_rcd_observation2 : $('input[name="metallurgical_test_nmtp_surface_rcd_observation2"]').val(),
          remark_nmtp2 : $('input[name="remark_nmtp2"]').val(),

          core_hardness_location : $('input[name="core_hardness_location"]').val(),
          core_hardness_requirement : $('input[name="core_hardness_requirement"]').val(),
          core_hardness_observation : $('input[name="core_hardness_observation"]').val(),
          core_hardness_observation1 : $('input[name="core_hardness_observation1"]').val(),
          core_hardness_observation2 : $('input[name="core_hardness_observation2"]').val(),
          core_hardness_remark : $('input[name="core_hardness_remark"]').val(),

          eff_case_depth_location : $('input[name="eff_case_depth_location"]').val(),
          eff_case_depth_requirement : $('input[name="eff_case_depth_requirement"]').val(),
          eff_case_depth_observation : $('input[name="eff_case_depth_observation"]').val(),
          eff_case_depth_observation1 : $('input[name="eff_case_depth_observation1"]').val(),
          eff_case_depth_observation2 : $('input[name="eff_case_depth_observation2"]').val(),
          eff_case_depth_observation_remark : $('input[name="eff_case_depth_observation_remark"]').val(),


          metallurgical_test_itp_sub_surface_pcd_location : $('input[name="metallurgical_test_itp_sub_surface_pcd_location"]').val(),
          metallurgical_test_itp_sub_surface_pcd_requirement : $('input[name="metallurgical_test_itp_sub_surface_pcd_requirement"]').val(),
          metallurgical_test_itp_sub_surface_pcd_observation : $('input[name="metallurgical_test_itp_sub_surface_pcd_observation"]').val(),
          metallurgical_test_itp_sub_surface_pcd_observation1 : $('input[name="metallurgical_test_itp_sub_surface_pcd_observation1"]').val(),
          metallurgical_test_itp_sub_surface_pcd_observation2 : $('input[name="metallurgical_test_itp_sub_surface_pcd_observation2"]').val(),
          remark_itp : $('input[name="remark_itp"]').val(),

          metallurgical_test_itp_sub_surface_rcd_location : $('input[name="metallurgical_test_itp_sub_surface_rcd_location"]').val(),
          metallurgical_test_itp_sub_surface_rcd_requirement : $('input[name="metallurgical_test_itp_sub_surface_rcd_requirement"]').val(),
          metallurgical_test_itp_sub_surface_rcd_observation : $('input[name="metallurgical_test_itp_sub_surface_rcd_observation"]').val(),
          metallurgical_test_itp_sub_surface_rcd_observation1 : $('input[name="metallurgical_test_itp_sub_surface_rcd_observation1"]').val(),
          metallurgical_test_itp_sub_surface_rcd_observation2 : $('input[name="metallurgical_test_itp_sub_surface_rcd_observation2"]').val(),
          remark_itp2 : $('input[name="remark_itp2"]').val(),

          metallurgical_test_gbo_igo_pcd_location : $('input[name="metallurgical_test_gbo_igo_pcd_location"]').val(),
          metallurgical_test_gbo_igo_pcd_requirement : $('input[name="metallurgical_test_gbo_igo_pcd_requirement"]').val(),
          metallurgical_test_gbo_igo_pcd_observation : $('input[name="metallurgical_test_gbo_igo_pcd_observation"]').val(),
          metallurgical_test_gbo_igo_pcd_observation1 : $('input[name="metallurgical_test_gbo_igo_pcd_observation1"]').val(),
          metallurgical_test_gbo_igo_pcd_observation2 : $('input[name="metallurgical_test_gbo_igo_pcd_observation2"]').val(),
          remark_gbo : $('input[name="remark_gbo"]').val(),

          metallurgical_test_micro_case_location: $('input[name="metallurgical_test_micro_case_location"]').val(),
          metallurgical_test_micro_case_requirement: $('input[name="metallurgical_test_micro_case_requirement"]').val(),
          metallurgical_test_micro_case_observation: $('input[name="metallurgical_test_micro_case_observation"]').val(),
          d1_observation1 : $('input[name="d1_observation1"]').val(),
          d1_observation2 : $('input[name="d1_observation2"]').val(),
          d1_remark : $('input[name="d1_remark"]').val(),

          dc_location : $('input[name="dc_location"]').val(),
          dc_requirement : $('input[name="dc_requirement"]').val(),
          dc_observation : $('input[name="dc_observation"]').val(),
          dc_observation1 : $('input[name="dc_observation1"]').val(),
          dc_observation2 : $('input[name="dc_observation2"]').val(),
          dc_remark : $('input[name="dc_remark"]').val(),

          decarb_location : $('input[name="decarb_location"]').val(),
          decarb_requirement : $('input[name="decarb_requirement"]').val(),
          decarb_observation : $('input[name="decarb_observation"]').val(),
          decarb_observation1 : $('input[name="decarb_observation1"]').val(),
          decarb_observation2 : $('input[name="decarb_observation2"]').val(),
          decarb_remark : $('input[name="decarb_remark"]').val(),

          ferrite_location : $('input[name="ferrite_location"]').val(),
          ferrite_requirement : $('input[name="ferrite_requirement"]').val(),
          ferrite_observation : $('input[name="ferrite_observation"]').val(),
          ferrite_observation1 : $('input[name="ferrite_observation1"]').val(),
          ferrite_observation2 : $('input[name="ferrite_observation2"]').val(),
          ferrite_remark : $('input[name="ferrite_remark"]').val(),
            
          };
          $.ajax({
               type : "POST",
               url : 'word.php',
               data : {
                customer : $('input[name="customer"]').val(),
                date : $('input[name="date"]').val(),
                control_plan_id :  $('input[name="control_plan_id"]').val(),
                batch_code :  $('input[name="batch_code"]').val(),
                part_no :  $('input[name="part_no"]').val(),								
				report_no : $('input[name="report_no"]').val(),
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
				verified_by : $('#verified_by option:selected').val()
              },
              dataType : "JSON",
              success : function(res){
				  if(save==0)
          {
                window.location = 'download.php?id='+res.data;
        }else if(save == 2){
          window.location = 'caterpillar_pdf?id='+res.data;
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
            url : 'get_raw_material.php',
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
				
								
				$('input[name="metallurgical_test_case_depth_pcd_location"]').val(data.data[0]['effective_case_depth_location']);
				$('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(data.data[0]['effective_case_depth_requirement']);
				$('input[name="metallurgical_test_case_depth_location"]').val(data.data[0]['effective_case_depth_location2']);
				$('input[name="metallurgical_test_case_depth_requirement"]').val(data.data[0]['effective_case_depth_requirement2']);
				$('input[name="metallurgical_test_surface_hard2_location"]').val(data.data[0]['surface_hardness_loc1']);
				$('input[name="metallurgical_test_surface_hard2_requirement"]').val(data.data[0]['surface_hardness_loc2']);
				$('input[name="surface_hardnessloc1_value"]').val(data.data[0]['surface_hardnessloc2_value']);
				$('input[name="metallurgical_test_core_hardness_pcd_location"]').val(data.data[0]['core_hardness_location']);
				$('input[name="metallurgical_test_core_hardness_pcd_requirement"]').val(data.data[0]['core_hardness_requirement']+' '+data.data[0]['core_hardness_value']);
				
				$('input[name="metallurgical_test_core_hardness_rcd_location"]').val(data.data[0]['core_hardness_location1']);
				$('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(data.data[0]['core_hardness_requirement1']+' '+data.data[0]['core_hardness_value1']);
				$('input[name="metallurgical_test_surface_hard1_location"]').val(data.data[0]['surface_hardness_1']);
				$('input[name="metallurgical_test_surface_hard1_requirement"]').val(data.data[0]['surface_hardness_2']);
				$('input[name="surface_hardnessloc_value"]').val(data.data[0]['surface_hardness2_value']);
				
				$('input[name="metallurgical_test_nmtp_surface_pcd_location"]').val(data.data[0]['surface_baimite_requirement']);
				$('input[name="metallurgical_test_itp_sub_surface_pcd_location"]').val(data.data[0]['sub_surface_baimite_location']);
				$('input[name="metallurgical_test_itp_sub_surface_pcd_requirement"]').val(data.data[0]['sub_surface_baimite_requirement']);
				$('input[name="metallurgical_test_itp_sub_surface_rcd_location"]').val(data.data[0]['sub_surface_baimite_location1']);
				$('input[name="metallurgical_test_itp_sub_surface_rcd_requirement"]').val(data.data[0]['sub_surface_baimite_requirement1']);
				
				$('input[name="metallurgical_test_gbo_igo_pcd_location"]').val(data.data[0]['grain_boundary_location']);
				$('input[name="metallurgical_test_gbo_igo_pcd_requirement"]').val(data.data[0]['grain_boundary_requirement']);
				$('input[name="metallurgical_test_micro_case_location"]').val(data.data[0]['micro_structure_location']);
				$('input[name="metallurgical_test_micro_case_requirement"]').val(data.data[0]['micro_structure_requirement']);
				
				$('input[name="cut_off_point"]').val(data.data[0]['cut_off']+' '+data.data[0]['cut_off_value']);
					
				}
				
			 }
        	});

        }


        </script>

