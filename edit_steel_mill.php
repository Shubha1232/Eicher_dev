<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="still_mill_list">Steel Mill</a></li>
                    <li><a href="javascript:void(0)">Edit Steel Mill</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Steel Mill</h4>
                            </div>
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
                                     $id = $_GET['id'];
                                     $query = 'SELECT * FROM steel_mill WHERE id='.$id;
                                     $result = $crud->getSingleRow($query);
                                 ?>
                                <form class="form-horizontal" action="edit_steel_mill_sub.php" id="still_mill_form" method="post">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                                        <div class="control-group">
                                            <label class="control-label" for="name">Mill Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>">
                                            </div>
                                        </div>
                                       <div class="control-group">
                                            <label class="control-label" for="name">Registration No.</label>
                                            <div class="controls">
                                                <input type="text" id="reg_no" name="reg_no" value="<?php echo $result['registration_no']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="email">Email</label>
                                            <div class="controls">
                                                <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="phone">Phone</label>
                                            <div class="controls">
                                                <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="address">Address</label>
                                            <div class="controls">
                                               <textarea  placeholder="Address" rows="3"   name="address" value="<?php echo $result['address']; ?>" ><?php echo $result['address']; ?></textarea>
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