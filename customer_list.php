<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Customer</a></li>
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
                                <h4>Customer</h4>
                               <div class="pull-right">
                                    <a href="add_customer"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add Customer</span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                       <th>Customer name</th>
									   <th>Email</th>
										                    <th>Mobile</th>
										                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query = 'SELECT * FROM customer order by id desc';
                       $result  = $crud->getAllData($query);
                       
                       foreach ($result as $key => $value) {
                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $value['name']; ?>  
                                            </td>
                                            <td>
                                               <?php echo $value['email'];?>
                                            </td>
										                        <td>
                                               <?php echo $value['mobile']; ?>
                                            </td>
											                       <td>
                                             <a href="edit_customer?id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a>
											 <?php if ($_SESSION['user_type'] == '1'){
													?>
											 
											 <a onclick="userConfirmation(<?php echo $value['id'] ?>,'delete_customer.php')" href="#"><i class="icsw16-trashcan"></i></a>
											 <?php } ?>
                                          </td>
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
            $('#example2').DataTable({				 "pageLength": 50,
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