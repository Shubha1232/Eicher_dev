<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Users Access</a></li>
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
                                <h4>Users Access</h4>
                               <!-- <div class="pull-right">
                                    <a href="add_user"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add User</span></span></a>
                                </div> -->
                            </div>
                            
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        <th>User Type</th>
                                        <?php
                                             $query1 = "SELECT * FROM menus WHERE parent_id in (0,100)";

                                             $result1 = $crud->getAllData($query1);
                                             
                                            foreach ($result1 as $key => $value) {
                                                
                                              echo '<th>'.$value['name'].'</th>';
                                            }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                $query2 = "SELECT * FROM user_type where id NOT IN(15,16)";
                                $result2 = $crud->getAllData($query2);
                               foreach ($result2 as $key => $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $value["type_name"]; ?>
                                        </td>
                                      <?php   foreach ($result1 as $k1 => $v1) {
                                               $query3 = "SELECT permission FROM user_access WHERE user_type =".$value['id']." AND menus_id =".$v1['id'];

                                               $result3 = $crud->getSingleRow($query3);

                                               $checkedValue = 0;
                                               $permissionValue = 0;
                                                 if(!empty($result3)){
                                                     if($result3['permission'] == 0){
                                                       $checkedValue = 0; 
                                                     }
                                                     else{
                                                        $checkedValue = 1;
                                                     }
                                                 }
                                                 if($checkedValue == 0){
                                                    $permissionValue = 1;
                                                 }
                                                 else{
                                                   $permissionValue = 0; 
                                                 }
                                               ?>
                                        <td>
                                            <input class="checkbox" id="abc-<?php echo $value['id']; ?>-<?php echo $v1['id']; ?>" type="checkbox" name="dashboard[]" value="" onclick="givePermission(<?php echo $value["id"]?>,<?php echo $v1["id"] ?>,<?php echo $permissionValue ?>);" <?php if($checkedValue == 1){ echo 'checked';} ?>>
                                        </td>
                                        <?php }?>
                                        <!-- <td <?php echo 'id=user_section-'.$key. ''; ?>>
                                            <input class="checkbox1" type="checkbox" name="user_section[]" value="<?php echo $value["id"]; ?>" onclick="givePermission(<?php echo $value["user_type"]?>,<?php echo "'".$user_type["type_name"]."'" ?>,'user_section',<?php echo $value['user_section']?>,<?php echo $key ?>);" <?php if($value['user_section']==1 ){ echo 'checked';} ?>>
                                        </td>
                                        <td <?php echo 'id=setting_section-'.$key. ''; ?>>
                                            <input class="checkbox1" type="checkbox" name="setting_section[]" value="<?php echo $value["id"]; ?>" onclick="givePermission(<?php echo $value["user_type"]?>,<?php echo "'".$user_type["type_name"]."'" ?>,'setting_section',<?php echo $value['setting_section']?>,<?php echo $key ?>);" <?php if($value['setting_section']==1 ){ echo 'checked';} ?>>
                                        </td> -->
                                    </tr>
                                    <?php   } ?>
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
                "bPaginate": false,
        "bFilter": false,
        "bInfo": false,
        "bSortable": false,
        "ordering" : false,
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