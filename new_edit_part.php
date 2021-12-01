<?php include_once("header.php"); 

  

  $part_id = $_REQUEST['part_id'];

  $query = "SELECT * FROM `new_part_number` WHERE id = '".$part_id."' ";

  $res = $crud->getSingleRow($query);
  
  $query1 = "SELECT * FROM `part_number` WHERE part_no = '".$res['part_no']."' ";

  $res1 = $crud->getSingleRow($query1);

  $q2 = "SELECT * FROM `forging_drawing` WHERE `new_part_id` = '".$part_id."'";
  $res2 = $crud->getSingleRow($q2);
  
  //echo "<pre>";print_r($res2);die;

   $q3 = "SELECT * FROM `part_number_images_name` WHERE `new_part_id` = '".$part_id."'";
  $res3 = $crud->getSingleRow($q3);
  //echo "<pre>";print_r($res3);die;

?>

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
label{
	padding:11px;
}
  

        </style>

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="<?php if($_SESSION['user_type'] == 21){?>#<?php }else{?>dashboard.php<?php } ?>"><i class="icon-home"></i></a></li>

                    <li><a href="new_part_list">Part List</a></li>

                    <li><a href="javascript:void(0)">Edit Part</a></li>

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <div class="w-box-header">

                                 <p style="text-align: center;">Add Part</p>

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

                                ?>

                                

                                <form class="form-horizontal" action="new_edit_part_sub.php" id="partno_form" method="post" enctype="multipart/form-data">

                                       <input type="hidden" value="<?php echo $res['id'] ?>" name="id"/>

                                        <div class="span12" style="margin-bottom: 20px;">

                                        <div class="span2" style="margin-left:-32px">

                                            <label class="bg-color" for="part_no">Part No.</label>

                                            <div class="">

                                                <input type="text" onkeyup="checkPart(<?php echo $part_id; ?>)" id="part_no" value="<?php echo $res['part_no']; ?>" name="part_no" style="width: 140px;">

                                            </div>

                                        </div>
                                        
                                        <?php 
										if($_SESSION['user_type']!=21){?>
											<!--<div class="span2">

                                            <label class="bg-color" for="part_name">Part ID</label>

                                            <div class="">

                                                <input type="text" id="part_id" name="part_id" value="<?php echo $res1['part_id']; ?>" style="width: 140px;">

                                            </div>

                                        </div>

                                        <div class="span2">

                                            <label class="bg-color" for="part_name">Part Name</label>

                                            <div class="">

                                                <input type="text" id="part_name" value="<?php echo $res1['part_name']; ?>" name="part_name" style="width: 140px;">

                                            </div>

                                        </div>
                                        
                                        <div class="span2">

                                            <label class="bg-color" for="quantity">Material Grade</label>

                                            <div class="">

                                               
                                                <select id="steel_grade" name="steel_grade" style="width: 140px;">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['grade']; ?>" <?php if($value['grade']== $res['steel_grade']){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select>

                                            </div>

                                        </div>-->
                                        
                                        <div class="span2">

                                            <label class="bg-color" for="date">Customer Name</label>

                                            <div class="">

                                                <select name="customer_name" id="customer_name" style="width: 140px;">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM customer';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option <?php if($res['customer_name']==$value['id']) { ?> selected="selected" <?php } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                        </div>


                                      </div>
                                      
                                      <table class="table" style="margin-top:20px;">
                                      
                                      <!--<thead>

                                            <tr>

                                            <th style="background-color: #006dcc !important;color: #fff;">Parameter</th>

                                            <th style="background-color: #006dcc !important;color: #fff;">Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Requirement</th>

                                            <th style="background-color: #006dcc !important;color: #fff;"></th>

                                            </tr>

                                          </thead>-->

                                          <tbody>

                                            <!--<tr>

                                            <td class="bg-color" rowspan="2">Surface Hardness</td>

                                              <td>

                                                <input type="text" name="surface_hardness_1" id="surface_hardness_1" value="<?php echo $res1['surface_hardness_1']; ?>" class="span5">

                                            

                                              

                                                <input type="text" name="surface_hardness_2" id="surface_hardness_2" value="<?php echo $res1['surface_hardness_2']; ?>" class="span5"  style="width:90px;">

                                                <select style="width:90px;" name="surface_hardness2_value">

                                                  <option <?php if($res1['surface_hardness2_value']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['surface_hardness2_value']=='HRA') { ?> selected="selected" <?php } ?> value="HRA">HRA</option>
												  
												  <option <?php if($res1['surface_hardness2_value']=='HR15N') { ?> selected="selected" <?php } ?> value="HR15N">HR15N</option>

                                                  <option <?php if($res1['surface_hardness2_value']=='HR30N') { ?> selected="selected" <?php } ?> value="HR30N">HR30N</option>

                                                  <option <?php if($res1['surface_hardness2_value']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>

                                                </select>

                                            

                                              </td>

                                              <td><span class="bg-color" style="padding:11px;">Cut Off At&nbsp;&nbsp;&nbsp;</span><input type="text" name="cut_off" id="cut_off" value="<?php echo $res1['cut_off']; ?>" class="span5">
                                              <select style="width:90px;" name="cut_off_value">

                                                  <option <?php if($res1['cut_off_value']=='HV1') { ?> selected="selected" <?php } ?> value="HV1">HV1</option>

                                                  <option <?php if($res1['cut_off_value']=='HV0.5') { ?> selected="selected" <?php } ?> value="HV0.5">HV0.5</option>

                                                </select></td>

                                             </tr> 

                                             <tr>

                                              <td>

                                                <input value="<?php echo $res1['surface_hardness_loc1']; ?>"  type="text" name="surface_hardness_loc1" id="surface_hardness_1" class="span5">

                                                <input value="<?php echo $res1['surface_hardness_loc2']; ?>"  type="text" name="surface_hardness_loc2" id="surface_hardness_2" class="span5" style="width:90px;">

                                                <select style="width:90px;" name="surface_hardnessloc2_value">

                                                  <option <?php if($res1['surface_hardnessloc2_value']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['surface_hardnessloc2_value']=='HRA') { ?> selected="selected" <?php } ?> value="HRA">HRA</option>

                                                  <option <?php if($res1['surface_hardnessloc2_value']=='HR15N') { ?> selected="selected" <?php } ?> value="HR15N">HR15N</option>

                                                  <option <?php if($res1['surface_hardnessloc2_value']=='HR30N') { ?> selected="selected" <?php } ?> value="HR30N">HR30N</option>

                                                  <option <?php if($res1['surface_hardnessloc2_value']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>

                                                </select>

                                            

                                              </td>

                                             </tr> 

                                             <tr>

                                              <td rowspan="3" class="bg-color">Effective Case Depth</td>

                                              <td>

                                                <input value="<?php echo $res1['effective_case_depth_location']; ?>" type="text" name="effective_case_depth_location" id="effective_case_depth_location" class="span5">

                                            

                                                <div class="input-append">

                                                <input value="<?php echo $res1['effective_case_depth_requirement']; ?>" type="text" name="effective_case_depth_requirement" id="effective_case_depth_requirement" size="16"  class="span9"><span class="add-on">mm</span></div>

                                            

                                              </td>

                                              <td> <div class="input-append">

                                                    <input type="text" id="effective_case_depth_pcd" name="effective_case_depth_pcd" size="16" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                               

                                              

                                                <div class="input-append">

                                                   <input type="text" size="16" id="effective_case_depth_rcd" name="effective_case_depth_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                                

                                               <div class="input-append">

                                                    <input type="text" size="16" id="effective_case_depth_od" name="effective_case_depth_od" class="span9" placeholder="OD/FD"><span class="add-on">mm</span> 

                                                </div> 

                                              </td>

                                              

                                             </tr> 

                                            <tr>

                                                <td><input value="<?php echo $res1['effective_case_depth_location2']; ?>" type="text" name="effective_case_depth_location2" id="effective_case_depth_location2" class="span5">

                                               <div class="input-append">

                                                <input value="<?php echo $res1['effective_case_depth_requirement2']; ?>" type="text" id="effective_case_depth_requirement2" name="effective_case_depth_requirement2" size="16" class="span9" ><span class="add-on">mm</span></div></td>

                                             </tr> 

                                            <tr>

                                                <td><input value="<?php echo $res1['effective_case_depth_location3']; ?>" type="text" name="effective_case_depth_location3" id="effective_case_depth_location3" class="span5">

                                               <div class="input-append">

                                                <input value="<?php echo $res1['effective_case_depth_requirement3']; ?>" type="text" id="effective_case_depth_requirement3" name="effective_case_depth_requirement3" size="16" class="span9"><span class="add-on">mm</span></div></td>

                                             </tr>  

                                             

                                              <tr>

                                              <td>Cut off At</td>

                                              <td>

                                                <input type="text" name="cut_off_location" id="cut_off_location" class="span5">

                                                 <input type="text" name="cut_off_requirement" id="cut_off_requirement" class="span5">

                                              </td>

                                              <td><input type="text" name="cut_off" id="cut_off" class="span5"></td>

                                             </tr> 

                                            <tr>

                                              <td rowspan="3" class="bg-color">Core Hardness</td>

                                              <td>

                                                <input value="<?php echo $res1['core_hardness_location']; ?>" type="text" name="core_hardness_location" id="core_hardness_location" class="span5">



                                                    <input value="<?php echo $res1['core_hardness_requirement']; ?>" type="text" size="16" id="core_hardness_requirement" name="core_hardness_requirement" class="span5" style="width:90px;">
                                                    
                                                  <select style="width:90px;" name="core_hardness_value">

                                                  <option <?php if($res1['core_hardness_value']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['core_hardness_value']=='HBW') { ?> selected="selected" <?php } ?> value="HBW">HBW</option>
                                                  <option <?php if($res1['core_hardness_value']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>
                                                   
                                                  </select>

                                                

                                              </td>

                                               <td>

                                                <div class="input-append">

                                                    <input type="text" size="16" id="core_hardness_pcd" name="core_hardness_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                                

                                                <div class="input-append">

                                                    <input type="text" size="16" id="core_hardness_rcd" name="core_hardness_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                              </td> 

                                             </tr>
 


                                            <tr>

                                              <td>

                                                <input value="<?php echo $res1['core_hardness_location1']; ?>" type="text" name="core_hardness_location1" id="core_hardness_location1" class="span5">

                                                 

                                                 

                                                    <input value="<?php echo $res1['core_hardness_requirement1']; ?>" type="text" size="16" id="core_hardness_requirement1" name="core_hardness_requirement1" class="span5" style="width:90px;">

                                                    <select style="width:90px;" name="core_hardness_value1">

                                                  <option <?php if($res1['core_hardness_value1']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['core_hardness_value1']=='HBW') { ?> selected="selected" <?php } ?> value="HBW">HBW</option>
                                                  <option <?php if($res1['core_hardness_value1']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>
                                                   
                                                  </select>

                                                

                                              </td>

                                             </tr>  

                                           <tr>

                                              <td>

                                                <input value="<?php echo $res1['core_hardness_location2']; ?>" type="text" name="core_hardness_location2" id="core_hardness_location2" class="span5">

                                                 

                                                 

                                                    <input value="<?php echo $res1['core_hardness_requirement2']; ?>" type="text" size="16" id="core_hardness_requirement2" name="core_hardness_requirement2" class="span5" style="width:90px;">

                                                    <select style="width:90px;" name="core_hardness_value2">

                                                  <option <?php if($res1['core_hardness_value2']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['core_hardness_value2']=='HBW') { ?> selected="selected" <?php } ?> value="HBW">HBW</option>
                                                  <option <?php if($res1['core_hardness_value2']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>
                                                  </select>

                                                

                                              </td>

                                             </tr>  

                                             <tr>

                                                <td class="bg-color">Thread Hardness</td>

                                              <td>

                                                <input value="<?php echo $res1['thread_hardness_location']; ?>" type="text" name="thread_hardness_location" id="thread_hardness_location" class="span5">

                                                <div class="input-append">

                                                  <input value="<?php echo $res1['thread_hardness_requirement']; ?>" type="text" size="16" id="thread_hardness_requirement" name="thread_hardness_requirement" class="span9">

                                                <span class="add-on">HV1</span></div>    

                                                

                                              </td>

                                             </tr>  

                                            <tr>

                                              <td rowspan="2" class="bg-color">Micro Structure</td>



                                              <td>

                                                <input value="<?php echo $res1['micro_structure_location']; ?>" type="text" name="micro_structure_location" id="micro_structure_location" class="span5" >

                                                  <input type="text" name="micro_structure_requirement" id="micro_structure_requirement" class="span5"> 

                                                 

                                                <input type="text" size="16" id="micro_structure_requirement" name="micro_structure_requirement" class="span5" value="<?php echo str_replace('"',' ',$res['micro_structure_requirement']); ?>"/>

                                              </td>

                                               <td><input type="text" name="micro_structure_case" id="micro_structure_case" class="span3" placeholder="CASE">

                                             

                                              <input type="text" name="micro_structure_core" id="micro_structure_core" class="span3" placeholder="CORE"></td> 



                                             </tr> 

                                           <tr>

                                                <td><input value="<?php echo $res1['micro_structure_location1']; ?>" type="text" name="micro_structure_location1" id="micro_structure_location1" class="span5" >

                                                  

                                                    <input value="<?php echo $res1['micro_structure_requirement1']; ?>" type="text" size="16" id="micro_structure_requirement1" name="micro_structure_requirement1" class="span5" >

                                                  <input type="text" name="micro_structure_requirement1" id="micro_structure_requirement" class="span5"></td> 

                                             </tr>  

                                             

                                           <tr>

                                               <td rowspan="2" class="bg-color">Grain Boundary Oxidation/IGO</td>

                                               <td>

                                                <input value="<?php echo str_replace('"',' ',$res['grain_boundary_location']); ?>"  type="text" name="grain_boundary_location" id="grain_boundary_location" class="span5">

                                                 

                                                 <div class="input-append">

                                                    <input value="<?php echo str_replace('"',' ',$res1['grain_boundary_requirement']); ?>"  type="text" size="16" id="grain_boundary_requirement" name="grain_boundary_requirement" class="span9" ><span class="add-on">μm</span></div>

                                              </td>

                                               

                                             </tr> 

                                            <tr>

                                              <td><input type="text"  value="<?php echo $res1['grain_boundary_location1']; ?>" name="grain_boundary_location1" id="grain_boundary_location1" class="span5">

                                             <div class="input-append">

                                                    <input type="text"  value="<?php echo $res1['grain_boundary_requirement1']; ?>" size="16" id="grain_boundary_requirement1" name="grain_boundary_requirement1" class="span9" ><span class="add-on">μm</span></div></td>

                                             </tr>

                                             

                                            <tr>

                                               <td rowspan="2" class="bg-color">Surace Bainite/NMTP</td>



                                               <td>

                                                <input value="<?php echo $res1['surface_baimite_location']; ?>" type="text" name="surface_baimite_location" id="surface_baimite_location" class="span5">

                                                <div class="input-append">

                                                    <input value="<?php echo str_replace('"',' ',$res1['surface_baimite_requirement']); ?>" type="text" size="16" name="surface_baimite_requirement" id="surface_baimite_requirement" class="span9"><span class="add-on">μm</span></div>

                                              </td>

                                               <td>

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_pcd" id="surface_baimite_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_rcd" id="surface_baimite_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                              </td> 

                                             </tr> 

                                            <tr>

                                               



                                               <td>

                                                <input value="<?php echo $res1['surface_baimite_location1']; ?>" type="text" name="surface_baimite_location1" id="surface_baimite_location1" class="span5">

                                                <div class="input-append">

                                                    <input value="<?php echo str_replace('"',' ',$res1['surface_baimite_requirement1']); ?>" type="text" size="16" name="surface_baimite_requirement1" id="surface_baimite_requirement1" class="span9"><span class="add-on">μm</span></div>

                                                 

                                              </td>

                                             </tr>  

                                             <tr>

                                               <td rowspan="2" class="bg-color">Sub-Surface Bainite/ITP</td>

                                               <td>

                                                <input value="<?php echo $res1['sub_surface_baimite_location']; ?>" type="text" name="sub_surface_baimite_location" id="sub_surface_baimite_location" class="span5">

                                                 

                                                 <div class="input-append">

                                                    <input value="<?php echo str_replace('"',' ',$res1['sub_surface_baimite_requirement']); ?>" type="text" size="16" id="sub_surface_baimite_requirement" name="sub_surface_baimite_requirement" class="span9" ><span class="add-on">mm</span>

                                                </div>

                                              </td>

                                                <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="sub_surface_baimite_pcd" name="sub_surface_baimite_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                                

                                                <div class="input-append">

                                                    <input type="text" size="16" id="sub_surface_baimite_rcd" name="sub_surface_baimite_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                              </td> 

                                             </tr> 

                                             <tr>

                                              <td><input value="<?php echo $res1['sub_surface_baimite_location1']; ?>" type="text" name="sub_surface_baimite_location1" id="sub_surface_baimite_location1" class="span5">

                                                <div class="input-append">

                                                    <input value="<?php echo str_replace('"',' ',$res1['sub_surface_baimite_requirement1']); ?>" type="text" size="16" id="sub_surface_baimite_requirement1" name="sub_surface_baimite_requirement1" class="span9" ><span class="add-on">mm</span></td>
                                                   

                                             </tr>  

                                             

                                            <tr>

                                              <th  colspan="7" class="bg-color" style="text-align: center;">After Grinding</th>

                                             </tr>

                                             <tr>

                                              <td class="bg-color" rowspan="2">Effective Case Depth</td>

                                              <td>

                                                <input value="<?php echo $res1['after_grind_case_depth_location']; ?>"  type="text" name="after_grind_case_depth_location" id="after_grind_case_depth_location" class="span5">

                                                

                                                 <div class="input-append">

                                                    <input value="<?php echo $res1['after_grind_case_depth_requirement']; ?>"  type="text" size="16" id="after_grind_case_depth_requirement" name="after_grind_case_depth_requirement" class="span9" ><span class="add-on">mm</span>

                                                </div>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_pcd" name="after_grind_case_depth_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div> 

                                                

                                              </td>

                                             </tr> 
                                            <tr>

                                              

                                              <td>

                                                <input type="text" name="after_grind_case_depth_location_2" id="after_grind_case_depth_location_2" class="span5" value="<?php echo $res1['after_grind_case_depth_location_2']; ?>">

                                                

                                                 <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_requirement_2" name="after_grind_case_depth_requirement_2" class="span9" value="<?php echo $res1['after_grind_case_depth_requirement_2']; ?>"><span class="add-on">mm</span>

                                                </div>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_pcd" name="after_grind_case_depth_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div> 

                                                

                                              </td>

                                             </tr>  

                                            <tr>

                                              <td class="bg-color">Surface Hardness</td>

                                              <td>

                                                <input value="<?php echo $res1['surface_hardness_location']; ?>"  type="text" name="surface_hardness_location" id="surface_hardness_location" class="span5">

                                                 <input value="<?php echo $res1['surface_hardness_requirement']; ?>"  type="text" name="surface_hardness_requirement" id="surface_hardness_requirement" class="span5">

                                                  <select style="width:90px;" name="surface_hardness_value_after_grind">

                                                  <option <?php if($res1['surface_hardness_value_after_grind']=='HRC') { ?> selected="selected" <?php } ?> value="HRC">HRC</option>

                                                  <option <?php if($res1['surface_hardness_value_after_grind']=='HRA') { ?> selected="selected" <?php } ?> value="HRA">HRA</option>

                                                  <option <?php if($res1['surface_hardness_value_after_grind']=='HR15N') { ?> selected="selected" <?php } ?> value="HR15N">HR15N</option>

                                                  <option <?php if($res1['surface_hardness_value_after_grind']=='HR30N') { ?> selected="selected" <?php } ?> value="HR30N">HR30N</option>

                                                  <option <?php if($res1['surface_hardness_value_after_grind']=='HV') { ?> selected="selected" <?php } ?> value="HV">HV</option>

                                                </select>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="surface_hardness_pcd" name="surface_hardness_pcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div> </td> 

                                                

                                             </tr> 

                                             <tr>

                                              <td colspan="3">

                                              <hr/></td>

                                             </tr> 

                                            <tr>

                                              <td class="bg-color">Burn Test</td>

                                              <td>

                                                <input value="<?php echo $res1['burn_test_location']; ?>" type="text" name="burn_test_location" id="burn_test_location" class="span5">

                                                 <input value="<?php echo $res1['burn_test_requirement']; ?>" type="text" name="burn_test_requirement" id="burn_test_requirement" class="span5">

                                              </td>

                                              <td>

                                                     <input type="text" size="16" class="span3" id="burn_test" name="burn_test" placeholder=""> 

                                                </td>

                                                

                                             </tr>  

                                            <tr>

                                              <td class="bg-color">Shot Peening</td>

                                              <td>

                                                <input value="<?php echo $res1['shot_peeming_location']; ?>" type="text" name="shot_peeming_location" id="shot_peeming_location" class="span5">

                                                 <input value="<?php echo $res1['shot_peeming_requirement']; ?>" type="text" name="shot_peeming_requirement" id="shot_peeming_requirement" class="span5">

                                              </td>

                                              <td>

                                                     <input type="text" size="16" class="span3" id="shot_peeming" name="shot_peeming"> 

                                                </td>

                                                

                                             </tr> 
                                            <tr>
                                              <td class="bg-color">Part Weight</td>
                                              <td><div class="input-append">
                                                <input type="text" name="part_weight" id="part_weight" required="" value="<?php if($res1){ echo $res1['part_weight'];}?>"><span class="add-on">KG</span>
                                                    </div></td>
                                             </tr>-->
                                             <tr class="part_images">
                                              <td class="bg-color" style="width:20%" >Forging Drawing</td>
                                               <td>
                                                <?php if($res2){ if($res2['forging_image']){
												$r1=$res2['forging_image'];
											    $str1=explode(",",$r1);
                          $str2 = explode(",", $res3['forging_drawing_image_name']);

											    foreach ($str1 as $key => $item1) { 
											    if($item1==''){}else{
												?>
												<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item1; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $str2[$key]; ?>  </a>
												<?php }} ?>    <input type="hidden" id="image_name" name="image_name" value="<?php echo $res2['forging_image']; ?>"><?php }} ?>
                                                <input type="hidden" id="forging_id" name="forging_id" value="<?php if($res2) {echo $res2['id'];}else{ echo 0;} ?>">
                                        </td>
                                             </tr >

                                             <tr class="part_images">

                                              <td class="bg-color" style="width:20%">Control Plan</td>

                                              <td>
                                              <?php $r=$res['part_image'];
											  $str=explode(",",$r);
                        $str3 = explode(",", $res3['control_plan_image_name']);
											  foreach ($str as $key => $item) { 
											  if($item!=''){
											  ?>
<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo $str3[$key]; ?>  </a>											  
<?php }} ?>                              
                                            </td>
                                              

                                             </tr>

                                             <tr class="part_images">

                                              <td class="bg-color" style="width:20%">Customer Drawing</td>

                                              <td>
                                              <?php if($res['part_image2']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res['part_image2']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php  echo $res3['customer_drawing_image_name']; ?>   </a>

</a>--><?php } ?>
                                          </td>

                                              

                                             </tr>

                                             <tr class="part_images">

                                              <td class="bg-color" style="width:20%">Part Image</td>

                                              <td>
                                              <?php if($res['part_image3']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res['part_image3']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $res3['part_image_name']; ?> </a>
											
<?php } ?>
                                              </td>

                                              

                                             </tr>
                                             
                                              </tbody>

                                        </table>

                                        <table class="table" style="margin-top:20px;">
                                        <tbody id="response"></tbody>
                                        </table>
                                        
											<?php }else{?>
												<div class="span2">

                                            <label class="bg-color" for="date">Customer Name</label>

                                            <div class="">

                                                <select name="customer_name" id="customer_name" style="width: 140px;">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM customer';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option <?php if($res['customer_name']==$value['id']) { ?> selected="selected" <?php } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                        </div>

                                       <!-- -->

                                      </div>
                                      
                                      <table class="table" style="margin-top:20px;">
                                      
                                      <tr>
                                              <td class="bg-color">Forging Drawing</td>
                                               <td>
                                                <?php if($res2){ if($res2['forging_image']){
												$r1=$res2['forging_image'];
											    $str1=explode(",",$r1);
                          $str2 = explode(",", $res3['forging_drawing_image_name']);

											    foreach ($str1 as $key => $item1) { 
											    if($item1==''){}else{
												?>
												<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item1; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $str2[$key]; ?>  </a>
												<!--<a style="margin-right:20px;" download href="img/test1/<?php echo $item1; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
                                                </a>--><?php }} ?>    <input type="hidden" id="image_name" name="image_name" value="<?php echo $res2['forging_image']; ?>"><?php }} ?>
                                                <input type="hidden" id="forging_id" name="forging_id" value="<?php if($res2) {echo $res2['id'];}else{ echo 0;} ?>">
                                               <input type="file" name="forging_image[]" id="forging_image" accept=".pdf" multiple></td>
                                             </tr>

                                             <tr>

                                              <td class="bg-color">Control Plan</td>

                                              <td>
                                              <?php $r=$res['part_image'];
											  $str=explode(",",$r);
                        $str3 = explode(",", $res3['control_plan_image_name']);
											  foreach ($str as $key => $item) { 
											  if($item!=''){
											  ?>
<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo $str3[$key]; ?>  </a>											  
<!--<a style="margin-right:20px;" download href="img/test1/<?php echo $item; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
											  </a>--><?php }} ?>                              
                                              <input type="file" name="part_image[]" id="part_image" accept=".pdf" multiple></td>
                                              

                                             </tr>

                                             <tr>

                                              <td class="bg-color">Customer Drawing</td>

                                              <td>
                                              <?php if($res['part_image2']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res['part_image2']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php  echo $res3['customer_drawing_image_name']; ?>   </a>
											  <!--<a style="margin-right:20px;" download href="img/part_image/<?php echo $res['part_image2']; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
</a>--><?php } ?>
                                              <input type="file" name="part_image2" id="part_image2"/></td>

                                              

                                             </tr>

                                             <tr >

                                              <td class="bg-color">Part Image</td>

                                              <td>
                                              <?php if($res['part_image3']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res['part_image3']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $res3['part_image_name']; ?> </a>
											 <!-- <a style="margin-right:20px;" download href="img/part_image/<?php echo $res['part_image3']; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
</a>-->
<?php } ?>
                                              <input type="file" name="part_image3" id="part_image3"/></td>

                                              

                                             </tr>
                                               </tbody>

                                        </table>

                                        <table class="table" style="margin-top:20px;">
                                        <tbody id="response"></tbody>
                                        </table>
												<?php }
										?>

                                        

                                        
                                    <?php
									$sec=0;
								    $sec= $_GET['sec'];
									if($sec=='1'){?>
										<div class="">

                                            <div class="">

                                                <button type="submit" class="btn btn-primary" style="margin-top:20px">Save</button>

                                            </div>

                                        </div>
										<?php }else{
								    ?>
                                        <div class="">

                                            <div class="">

                                                <button type="submit" class="btn btn-primary" style="margin-top:20px">Save</button>

                                            </div>

                                        </div>
									<?php } ?>
                                    

                                </form>

                                

                                

                            </div>

                            

                        </div>

                    </div>

                     

                </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>

        <script type="text/javascript">
		

				function checkPart(id){
				var part_no = $('#part_no').val();
				  $.ajax({
			type : "POST",
			url : "ajax_newhtpart.php",
			data : {
					id:id,
					part_no:part_no
				},
			 success : function(res){
					$('#response').html(res);
					$('.part_images').css("display","none");					
				 }	
		});
				}

            $(function(){

                 $('.datepicker').datepicker({

                    format : 'mm-dd-yyyy'

                 })

            });
       /* <FilesMatch "\.(?i:pdf)$">
  ForceType application/pdf
  Header set Content-Disposition attachment
</FilesMatch>*/
        </script>