<?php include_once("header.php"); 

?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Users list</a></li>
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
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="w-box">
                             <div class="w-box-header">
                                <h4>Users List</h4>
                               <div class="pull-right">
                                    <a href="add_user"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">New User</span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>User Type</th>
                                        <th>Contact No.</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query = 'SELECT * FROM users order by id desc';
                       $result  = $crud->getAllData($query);
                       $i = 1;
                       foreach ($result as $key => $value) {
                        $status = $value['user_status'] == 1 ? 'Active' : 'Inactive';
                          $q = "SELECT type_name FROM user_type WHERE id =".$value['user_type'];
                          $user_type = $crud->getSingleRow($q);
                          ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['full_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $status; ?>
                                            </td>
                                            <td>
                                                <?php echo $user_type['type_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['contact_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo date('m-d-Y',$value['date']); ?>
                                            </td>
                                            <td><a href="edit_user?user_id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a>

												<?php if ($_SESSION['user_type'] == '1'){
													?>
											<a onClick="userConfirmation(<?php echo $value['id']; ?>,'delete_user.php')" href="#"><i class="icsw16-trashcan"></i></i></a>
												<?php } ?>
											
											</td>
                                            <!-- <a href="edit_user.php?user_id=<?php echo $value['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a onClick="return confirm('Are You Sure');" href="delete_user.php?user_id=<?php echo $value['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                        </tr>

                                        <?php   $i++;
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
        
        <?php include_once("footer.php");
	
		  ?>
          

          
        <script type="text/javascript">
		
		
        $(document).ready(function(){
            $('#example2').DataTable({				"pageLength": 50,
                'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1] 
        // 1st one, start by the right 
    }],
                 responsive : true,  
            });
        
			var isLogin = $("#new_flash").val();
			if(!isLogin){
			       $('#myModal2').modal({
        				backdrop: 'static',
        				keyboard: false  // to prevent closing with Esc button (if you want this too)
        			})
			}
			
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