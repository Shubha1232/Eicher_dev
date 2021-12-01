<?php include_once("header.php"); ?>

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                    <li><a href="user_list">Users List</a></li>

                    <li><a href="javascript:void(0)">Update User</a></li>

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid"">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <div class="w-box-header">

                                <h4>Add User</h4>

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

                                <?php $user_id = $_REQUEST["user_id"]; /*user  id */

                                  $query = "select * from users where id='$user_id'"; /*fetching data acc to id*/

                                  $data = $crud->getSingleRow($query); 

                                  $unit_id = explode(',', $data['unit_id']);
                                  $custom_field = explode(',', $data['custom_field']);

                                ?>

                                <form class="form-horizontal" action="edit_user_sub.php"  id="user_form" method="post">

                                    

                                        

                                        <div class="control-group">

                                            <label class="control-label" for="email_address">Email address</label>

                                            <div class="controls">

                                                <input type="text" id="email_address" name="email_address" value="<?php echo $data["email"]; ?>">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label" for="full_name">Full name</label>

                                            <div class="controls">

                                                <input type="text" id="full_name" name="full_name" value="<?php echo $data["full_name"]; ?>">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label" for="contact_no">Contact Number</label>

                                            <div class="controls">

                                                <input type="text" name="contact_no" id="contact_no"  value="<?php echo $data["contact_no"]; ?>">

                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">



                                            </div>

                                        </div>

                                        <div class="control-group">

                                        <label class="control-label">User Type</label>

                                        <div class="controls">

                                        <?php

                                          $query = "SELECT * FROM user_type where id NOT IN(15,16)";

                                          $result = $crud->getAllData($query);

                                          foreach ($result as $key => $value) { ?>

                                             <label class="radio"><input type="radio" name="user_type" id="user_type" value="<?php echo $value['id'] ?>" <?php if($data[ 'user_type']==$value[ 'id']){ ?> checked <?php } ?>><?php echo $value['type_name']; ?></label>

                                        <?php  }

                                        ?>

                                        </div>

                                        </div>
                                        <div class="control-group">
                                        <label class="control-label bg-color1">User Listed In</label>
                                        <div class="controls">
                                       <?php
                                          if(in_array(3, $custom_field)){ ?>
                                          <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field"  value="3" checked="">Checked BY</label>
                                       <?php }else{ ?>
                                             <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="3">Checked BY</label>
                                      <?php } 
                                      if(in_array(16, $custom_field)){ ?>
                                         <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="16" checked="">Approved BY</label>
                                       <?php }else{ ?>
                                              <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="16">Approved BY</label>
                                      <?php } 
									  if(in_array(15, $custom_field)){ ?>
                                         <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="15" checked="">Verified BY</label>
                                       <?php }else{ ?>
                                              <label class="checkbox"><input type="checkbox" name="custom_field[]" id="custom_field" value="15">Verified BY</label>
                                      <?php } ?>
                                        </div>
                                        </div>

                                        <div class="control-group">

                                        <label class="control-label bg-color1">Unit</label>

                                        <div class="controls">

                                          <select id="unit_id[]" name="unit_id[]" multiple="">

                                            <option value="">Select</option>

                                        <?php

                                          $query = "SELECT * FROM unit";

                                          $result = $crud->getAllData($query);

                                          foreach ($result as $key => $value) {

                                             if(in_array($value[id],$unit_id)){

                                             echo '<option value="'.$value['id'].'" selected="selected">'.$value['name'].'</option>';

                                           }

                                           else{

                                             echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';



                                           }

                                          }

                                        ?>

                                        </select>

                                        </div>

                                        </div>

                                        
                                        <div class="control-group">

                                            <label class="control-label" for="contact_no">Password</label>

                                            <div class="controls">

                                                <input type="password" name="password1" id="password1"  value="">

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