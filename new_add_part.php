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
label{
	padding:11px;
}
  

        </style>

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="<?php if($_SESSION['user_type'] == 21){?>#<?php }else{?>dashboard.php<?php } ?>"><i class="icon-home"></i></a></li>

                    <li><a href="new_part_list">Part List</a></li>

                    <li><a href="javascript:void(0)">Add Part</a></li>

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

                                

                                <form class="form-horizontal" action="new_add_part_sub.php" id="partno_form" method="post" enctype="multipart/form-data">

                                    

                                        <div class="span12" style="margin-bottom: 20px;">

                                        <div class="span2">

                                            <label for="part_no" class="bg-color">Part No.</label>

                                            <div class="">

                                                <input type="text" id="part_no" name="part_no" onblur="checkPart()" style="width: 140px;">

                                            </div>

                                        </div>

                                        <!--<div class="span2">

                                            <label for="part_name" class="bg-color">Part ID</label>

                                            <div class="">

                                                <input type="text" id="part_id" name="part_id" style="width: 140px;">

                                            </div>

                                        </div>

                                        <div class="span2">

                                            <label for="part_name" class="bg-color">Part Name</label>

                                            <div class="">

                                                <input type="text" id="part_name" name="part_name" style="width: 140px;">

                                            </div>

                                        </div>-->

                                        <div class="span2">

                                            <label for="date" class="bg-color">Customer Name</label>

                                            <div class="">

                                                <select name="customer_name1" id="customer_name" style="width: 140px;">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM customer';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                        </div>

                                        <!--<div class="span2">

                                            <label class="bg-color" for="quantity">Material Grade</label>

                                            <div class="">

                                                  <select id="steel_grade" name="steel_grade1" style="width: 140px;">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['grade']; ?>"><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>-->

                                      </div>

                                        <table class="table" style="margin-top:20px;">
                                        
                                        	<tbody id="response">

                                           <!-- <tr>

                                            <td class="bg-color" rowspan="2">Surface Hardness</td>

                                              <td>

                                                <input type="text" name="surface_hardness_1" id="surface_hardness_1" class="span5">

                                            

                                              

                                                <input type="text" name="surface_hardness_2" id="surface_hardness_2" class="span5" style="width:90px;">

                                                <select style="width:90px;" name="surface_hardness2_value">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HRA">HRA</option>

                                                  <option value="HR15N">HR15N</option>

                                                  <option value="HR30N">HR30N</option>

                                                  <option value="HV">HV</option>

                                                </select>

                                            

                                              </td>

                                              <td><span class="bg-color" style="padding:11px;">Cut Off At&nbsp;&nbsp;&nbsp;</span><input type="text" name="cut_off" id="cut_off" class="span5"><select style="width:90px;" name="cut_off_value">

                                                  <option value="HV1">HV1</option>

                                                  <option value="HV0.5">HV0.5</option>

                                                </select></td>

                                             </tr>-->

                                            <!-- <tr>

                                              <td>

                                                <input type="text" name="surface_hardness_loc1" id="surface_hardness_1" class="span5">

                                            

                                              

                                                <input type="text" name="surface_hardness_loc2" id="surface_hardness_2" class="span5" style="width:90px;">

                                                <select style="width:90px;" name="surface_hardnessloc2_value">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HRA">HRA</option>

                                                  <option value="HR15N">HR15N</option>

                                                  <option value="HR30N">HR30N</option>

                                                  <option value="HV">HV</option>

                                                </select>

                                            

                                              </td>

                                             </tr> -->

                                         <!--    <tr>

                                              <td rowspan="3" class="bg-color">Effective Case Depth</td>

                                              <td>

                                                <input type="text" name="effective_case_depth_location" id="effective_case_depth_location" class="span5">

                                            

                                                <div class="input-append">

                                                <input type="text" name="effective_case_depth_requirement" id="effective_case_depth_requirement" size="16"  class="span9"><span class="add-on">mm</span></div>

                                            

                                              </td>

                                              <td><!-- <div class="input-append">

                                                    <input type="text" id="effective_case_depth_pcd" name="effective_case_depth_pcd" size="16" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                               


                                              

                                                <div class="input-append">

                                                    <input type="text" size="16" id="effective_case_depth_rcd" name="effective_case_depth_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                                

                                               <div class="input-append">

                                                    <input type="text" size="16" id="effective_case_depth_od" name="effective_case_depth_od" class="span9" placeholder="OD/FD"><span class="add-on">mm</span>

                                                </div> 

                                              </td>

                                              

                                             </tr> -->

                                       <!--      <tr>

                                                <td><input type="text" name="effective_case_depth_location2" id="effective_case_depth_location2" class="span5">

                                               <div class="input-append">

                                                <input type="text" id="effective_case_depth_requirement2" name="effective_case_depth_requirement2" size="16" class="span9" ><span class="add-on">mm</span></div></td>

                                             </tr>

                                             <tr>

                                                <td><input type="text" name="effective_case_depth_location3" id="effective_case_depth_location3" class="span5">

                                               <div class="input-append">

                                                <input type="text" id="effective_case_depth_requirement3" name="effective_case_depth_requirement3" size="16" class="span9"><span class="add-on">mm</span></div></td>

                                             </tr>

                                             

                                             <!-- <tr>

                                              <td>Cut off At</td>

                                              <td>

                                                <input type="text" name="cut_off_location" id="cut_off_location" class="span5">

                                                 <input type="text" name="cut_off_requirement" id="cut_off_requirement" class="span5">

                                              </td>

                                              <td><input type="text" name="cut_off" id="cut_off" class="span5"></td>

                                             </tr> --> 

                                        <!--     <tr> 

                                              <td rowspan="3" class="bg-color">Core Hardness</td>

                                              <td>

                                                <input type="text" name="core_hardness_location" id="core_hardness_location" class="span5">

                                                 

                                                 

                                                    <input type="text" size="16" id="core_hardness_requirement" name="core_hardness_requirement" class="span5" style="width:90px;"><select style="width:90px;" name="core_hardness_value">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>
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

                                             </tr> -->



                                         <!--    <tr>

                                              <td>

                                                <input type="text" name="core_hardness_location1" id="core_hardness_location1" class="span5">

                                                 

                                                 

                                                    <input type="text" size="16" id="core_hardness_requirement1" name="core_hardness_requirement1" class="span5" style="width:90px;">

                                                    <select style="width:90px;" name="core_hardness_value1">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>
                                                  
                                                  </select>

                                                

                                              </td>

                                             </tr> -->

                                          <!--   <tr>

                                              <td>

                                                <input type="text" name="core_hardness_location2" id="core_hardness_location2" class="span5">

                                                 

                                                 

                                                    <input type="text" size="16" id="core_hardness_requirement2" name="core_hardness_requirement2" class="span5" style="width:90px;">

                                                    <select style="width:90px;" name="core_hardness_value2">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HBW">HBW</option>
                                                  <option value="HV">HV</option>
                                                  
                                                  </select>

                                                

                                              </td>

                                             </tr> -->

                                           <!--   <tr>

                                                <td class="bg-color">Thread Hardness</td>

                                              <td>

                                                <input type="text" name="thread_hardness_location" id="thread_hardness_location" class="span5">

                                                <div class="input-append">

                                                  <input type="text" size="16" id="thread_hardness_requirement" name="thread_hardness_requirement" class="span9">

                                                <span class="add-on">HV1</span></div>    

                                                

                                              </td>

                                             </tr> -->

                                         <!--    <tr>

                                              <td class="bg-color" rowspan="2">Micro Structure</td>




                                              <td>

                                                <input type="text" name="micro_structure_location" id="micro_structure_location" class="span5" >

                                                  <input type="text" name="micro_structure_requirement" id="micro_structure_requirement" class="span5"> 

                                                 

                                                    <input type="text" size="16" id="micro_structure_requirement" name="micro_structure_requirement" class="span5" >

                                              </td>

                                               <td><input type="text" name="micro_structure_case" id="micro_structure_case" class="span3" placeholder="CASE">

                                             

                                              <input type="text" name="micro_structure_core" id="micro_structure_core" class="span3" placeholder="CORE"></td> 



                                             </tr> -->

                                         <!--    <tr>

                                                <td><input type="text" name="micro_structure_location1" id="micro_structure_location1" class="span5" >

                                                  

                                                    <input type="text" size="16" id="micro_structure_requirement1" name="micro_structure_requirement1" class="span5" ></div>

                                                  <input type="text" name="micro_structure_requirement1" id="micro_structure_requirement" class="span5"></td> 

                                             </tr> -->

                                             

                                          <!--   <tr>

                                               <td class="bg-color" rowspan="2">Grain Boundary Oxidation/IGO</td>

                                               <td>

                                                <input type="text" name="grain_boundary_location" id="grain_boundary_location" class="span5">

                                                 

                                                 <div class="input-append">

                                                    <input type="text" size="16" id="grain_boundary_requirement" name="grain_boundary_requirement" class="span9" ><span class="add-on">μm</span></div>

                                              </td>

                                               

                                             </tr> -->

                                         <!--    <tr>

                                              <td><input type="text" name="grain_boundary_location1" id="grain_boundary_location1" class="span5">

                                             <div class="input-append">

                                                    <input type="text" size="16" id="grain_boundary_requirement1" name="grain_boundary_requirement1" class="span9" ><span class="add-on">μm</span></div></td>

                                             </tr> -->

                                             

                                         <!--    <tr>

                                               <td class="bg-color" rowspan="2">Surace Bainite/NMTP</td>



                                               <td>

                                                <input type="text" name="surface_baimite_location" id="surface_baimite_location" class="span5">

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_requirement" id="surface_baimite_requirement" class="span9"><span class="add-on">μm</span></div>

                                                 

                                              </td>

                                               <td>

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_pcd" id="surface_baimite_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div>

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_rcd" id="surface_baimite_rcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div>

                                              </td> 

                                             </tr> -->

                                          <!--   <tr>

                                               



                                               <td>

                                                <input type="text" name="surface_baimite_location1" id="surface_baimite_location1" class="span5">

                                                <div class="input-append">

                                                    <input type="text" size="16" name="surface_baimite_requirement1" id="surface_baimite_requirement1" class="span9"><span class="add-on">μm</span></div>

                                                 

                                              </td>

                                             </tr> -->

                                         <!--    <tr>

                                               <td class="bg-color" rowspan="2">Sub-Surface Bainite/ITP</td>

                                               <td>

                                                <input type="text" name="sub_surface_baimite_location" id="sub_surface_baimite_location" class="span5">

                                                 

                                                 <div class="input-append">

                                                    <input type="text" size="16" id="sub_surface_baimite_requirement" name="sub_surface_baimite_requirement" class="span9" ><span class="add-on">mm</span>

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

                                             </tr> -->

                                          <!--   <tr>

                                              <td><input type="text" name="sub_surface_baimite_location1" id="sub_surface_baimite_location1" class="span5">

                                                <div class="input-append">

                                                    <input type="text" size="16" id="sub_surface_baimite_requirement1" name="sub_surface_baimite_requirement1" class="span9" ><span class="add-on">mm</span></td>

                                             </tr>

                                             

                                             <tr>

                                              <th  colspan="7" class="bg-color" style="text-align: center;">After Grinding</th>

                                             </tr>

                                             <tr>

                                              <td class="bg-color" rowspan="2">Effective Case Depth</td>

                                              <td>

                                                <input type="text" name="after_grind_case_depth_location" id="after_grind_case_depth_location" class="span5">

                                                

                                                 <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_requirement" name="after_grind_case_depth_requirement" class="span9" ><span class="add-on">mm</span>

                                                </div>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_pcd" name="after_grind_case_depth_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div> 

                                                

                                              </td>

                                             </tr> -->
                                        <!--     <tr>

                                              

                                              <td>

                                                <input type="text" name="after_grind_case_depth_location_2" id="after_grind_case_depth_location_2" class="span5">

                                                

                                                 <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_requirement_2" name="after_grind_case_depth_requirement_2" class="span9" ><span class="add-on">mm</span>

                                                </div>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="after_grind_case_depth_pcd" name="after_grind_case_depth_pcd" class="span9" placeholder="PCD"><span class="add-on">mm</span>

                                                </div> 

                                                

                                              </td>

                                             </tr>-->

                                          <!--   <tr> 

                                              <td class="bg-color">Surface Hardness</td>

                                              <td>

                                                <input type="text" name="surface_hardness_location" id="surface_hardness_location" class="span5">

                                                 <input type="text" name="surface_hardness_requirement" id="surface_hardness_requirement" class="span5">

                                                  <select style="width:90px;" name="surface_hardness_value_after_grind">

                                                  <option value="HRC">HRC</option>

                                                  <option value="HRA">HRA</option>

                                                  



                                                  <option value="HR15N">HR15N</option>

                                                  <option value="HR30N">HR30N</option>

                                                  <option value="HV">HV</option>

                                                </select>

                                              </td>

                                              <td>

                                               <div class="input-append">

                                                    <input type="text" size="16" id="surface_hardness_pcd" name="surface_hardness_pcd" class="span9" placeholder="RCD"><span class="add-on">mm</span>

                                                </div> </td>

                                                

                                             </tr>  -->

                                         <!--    <tr>

                                              <td colspan="3">

                                              <hr/></td>

                                             </tr>

                                             <tr>

                                              <td class="bg-color">Burn Test</td>

                                              <td>

                                                <input type="text" name="burn_test_location" id="burn_test_location" class="span5">

                                                 <input type="text" name="burn_test_requirement" id="burn_test_requirement" class="span5">

                                              </td>

                                              <td>

                                                     <input type="text" size="16" class="span3" id="burn_test" name="burn_test" placeholder=""> 

                                                </td>

                                                

                                             </tr> -->

                                          <!--   <tr>

                                              <td class="bg-color">Shot Peening</td>

                                              <td>

                                                <input type="text" name="shot_peeming_location" id="shot_peeming_location" class="span5">

                                                 <input type="text" name="shot_peeming_requirement" id="shot_peeming_requirement" class="span5">

                                              </td>

                                              <td>

                                                     <input type="text" size="16" class="span3" id="shot_peeming" name="shot_peeming"> 

                                                </td>

                                                

                                             </tr> -->
                                         <!--    <tr>
                                              <td class="bg-color">Part Weight</td>
                                              <td><div class="input-append">
                                                <input type="text" name="part_weight" id="part_weight" ><span class="add-on">KG</span>
                                                    </div></td>
                                             </tr> -->
                                             <tr>
                                             <tr class="part_images">
                                              <td class="bg-color">Forging Drawing</td>
                                               <td><input type="file" name="forging_image[]" id="forging_image" accept=".pdf" multiple></td>
                                             </tr>
                                             <tr class="part_images">

                                              <td class="bg-color">Control Plan</td>

                                              <td><input type="file" name="part_image[]" id="part_image" accept=".pdf" multiple></td>

                                              

                                             </tr>

                                             <tr class="part_images">

                                              <td class="bg-color">Customer Drawing</td>

                                              <td><input type="file" name="part_image2" id="part_image2"/></td>

                                              

                                             </tr>

                                             <tr class="part_images">

                                              <td class="bg-color">Part Image</td>

                                              <td><input type="file" name="part_image3" id="part_image3"/></td>

                                              

                                             </tr>
                                             

                                          </tbody>

                                        </table>

                                         

                                        

                                        

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

            $(function(){

                 $('.datepicker').datepicker({

                    format : 'mm-dd-yyyy'

                 })

            });
			
			/*function checkPart(){
				var part_no = $('#part_no').val();
				  $.ajax({
			type : "POST",
			url : "ajax_add_part.php",
			data : {
					part_no:part_no
				},
			 success : function(res){
					$('#response').html(res);
					$('.part_images').css("display","none");					
				 }	
		});
				}*/

        </script>

        