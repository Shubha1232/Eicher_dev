<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="user_list">Users List</a></li>
                    <li><a href="javascript:void(0)">Add User</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Add User</p>
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
                                
                                <form class="form-horizontal" action="add_user_sub.php" id="user_form" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="email_address">Email address</label>
                                            <div class="controls">
                                                <input type="text" id="email_address" name="email_address">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="full_name">Full name</label>
                                            <div class="controls">
                                                <input type="text" id="full_name" name="full_name">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="contact_no">Contact Number</label>
                                            <div class="controls">
                                                <input type="text" name="contact_no" id="contact_no">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="password">Password</label>
                                            <div class="controls">
                                                <input type="text" name="password" id="password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label bg-color1">User Type</label>
                                        <div class="controls">
                                        <?php
                                          $query = "SELECT * FROM user_type where id NOT IN(15,16)";
                                          $result = $crud->getAllData($query);
                                          foreach ($result as $key => $value) {
                                             echo  '<label class="radio"><input type="radio" name="user_type" id="user_type" value="'.$value['id'].'">'.$value['type_name'].'</label>';
                                          }
                                        ?>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label bg-color1">User Listed In</label>
                                        <div class="controls">
                                            <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="3">Checked BY</label>
                                            <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="16">Approved BY</label>
                                            <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="15">Verified BY</label>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label bg-color1">Unit</label>
                                        <div class="controls">
                                          <select id="unit_id[]" name="unit_id[]" multiple>
                                            <option value="">Select</option>
                                        <?php
                                          $query = "SELECT * FROM unit";
                                          $result = $crud->getAllData($query);
                                          foreach ($result as $key => $value) {
                                             echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                          }
                                        ?>
                                        </select>
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