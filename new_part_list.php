<?php include_once("header.php"); ?>
<style type="text/css">
.box2{
      border: 1px solid #ddd;
    height: 20px;
    text-align: center;
    float: left;
    padding:2px;
    width:65px;
    }
</style>	
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="<?php if($_SESSION['user_type'] == 21){?>#<?php }else{?>dashboard.php<?php } ?>"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Part list</a></li>
                </ul>
            </div>
<!-- main content -->
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
                            ?>
            <div class="container-fluid"">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="w-box">
                             <div class="w-box-header">
                                <h4>Parts</h4>
                               <div class="pull-right">
                               <?php
							   if($_SESSION['user_type'] == 21){?>
								   <a href="new_add_part"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">New Part</span></span></a>
								 <?php  }
							   
							    ?>
                                    
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        
                                        <th>Part Number</th>
                                        <!--<th>Part Id</th>
                                        <th>Part Name</th>
										<th style="width: 180px;">EC DEPTH<br><div class="box2">PCD</div><div class="box2">RCD</div></th>
                    					<th style="width: 156px;">CORE HARDNESS<br><div class="box2">PCD</div><div class="box2">RCD</div></th>-->
                                        <th>Customer</th>
                                       <!-- <th>Steel Grade</th>-->
                                       <?php 
									   if($_SESSION['user_type'] == 21){?>
										     <th>Action</th>
										   <?php }
									   ?>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query = "SELECT * FROM `new_part_number`  order by id desc";
                       $result  = $crud->getAllData($query);
                      
                       foreach ($result as $key => $value) {
                              $q = 'SELECT name FROM customer WHERE id='.$value['customer_name'];
                              $rs = $crud->getSingleRow($q);
                          ?>
                                        <tr>
                                            
                                            <td>
                                               
												<a target="_blank" href="new_edit_part?part_id=<?php echo $value['id']; ?>&sec=1"> <?php echo $value['part_no']; ?></a> 
                                            </td>
                                            <!--<td>
                                                <?php echo $value['part_id']; ?>
                                            </td>
                                            <td>
                                              <?php echo $value['part_name']; ?>
                                            </td>
											<td><div class="box2"><?php echo $value['effective_case_depth_requirement']; ?>
											</div><div class="box2"><?php echo $value['effective_case_depth_requirement2']; ?></div></td>
											<td><div class="box2"><?php echo $value['core_hardness_requirement']; ?>
											</div><div class="box2"><?php echo $value['core_hardness_requirement1']; ?></div></td>-->
                                            <td>
                                                <?php echo $rs['name']; ?>
                                            </td>
                                            <!--<td>
                                                <?php echo $value['steel_grade']; ?>
                                            </td>-->
                                            <?php
											if($_SESSION['user_type'] == 21){?>
                                            <td><a href="new_edit_part?part_id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a> 
                                            
												<a onClick="userConfirmation(<?php echo $value['id']; ?>,'new_delete_part.php')" href="#"><i class="icsw16-trashcan"></i></i></a>
												
                                            </td>
<?php }
											 ?>
                                        </tr>

                                        <?php  
                        } 
                      ?>
                                </tbody>
                            </table> 
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
            $('#example2').DataTable({                 "pageLength": 50,
                'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1] 
        // 1st one, start by the right 
    }],
                 responsive : true,  
            });
        });
    </script>
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
</style>