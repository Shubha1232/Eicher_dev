<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="user_type">Users Type</a></li>
                    <li><a href="javascript:void(0)">Edit User Type</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit User Type</h4>
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
                                <?php 
                                    $user_type_id = $_REQUEST["user_type_id"]; /*user type id */
                                    $query = "select * from user_type where id='$user_type_id'"; /*fetching data acc to id*/
                                    $result = $crud->getSingleRow($query); 
                                 ?>
                                <form class="form-horizontal" action="edit_user_type_sub.php" method="post" id="add_user_form">
                                    
                                         <input type="hidden"  id="user_type_id" name="user_type_id" value="<?php echo $result['id'] ?>"/>
                                        <div class="control-group">
                                            <label class="control-label" for="user_type">User Type</label>
                                            <div class="controls">
                                                <input type="text" name="user_type" id="user_type" value="<?php echo $result["type_name"]; ?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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