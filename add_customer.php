<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="customer_list">Customer</a></li>
                    <li><a href="javascript:void(0)">Add Customer</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Add Customer</p>
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
                                 ?>
                                <form class="form-horizontal" action="add_customer_sub.php" id="customer_form" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="name">Customer Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name"/>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color1" for="name">Email</label>
                                            <div class="controls">
                                                <input type="email" id="email" name="email"/>
                                            </div>
                                        </div>
										
                                       <div class="control-group">
                                            <label class="control-label bg-color1" for="name">Mobile</label>
                                            <div class="controls">
                                                <input type="text" id="mobile" name="mobile"/>
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label bg-color1" for="name">Address</label>
                                            <div class="controls">
                                               <textarea  placeholder="Address" rows="3"   name="address" ></textarea>
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