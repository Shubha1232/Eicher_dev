<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">User type</a></li>
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
                                <h4>User Type</h4>
                               <div class="pull-right">
                                    <a href="add_user_type"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">New User Type</span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>S.No</th>
                                            <th>User Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                        $query = "select * from user_type where id NOT IN(15,16) order by id";
                                        $result = $crud->getAllData($query);
                                        $count = 0;
                                        foreach($result as $key=>$value){
                                            $count = $count+1;
                                        ?>
                             <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $value["type_name"]; ?></td>
                                            <td>
                          
                          <a href="edit_user_type?user_type_id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a>
                            </tr>
                                        <?php } ?>
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
            $('#example2').DataTable({
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