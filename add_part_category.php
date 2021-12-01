<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="part_category">Part Category</a></li>
                    <li><a href="javascript:void(0)">Add Part Category</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Add Part Category</h4>
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
                                <form class="form-horizontal" action="add_part_category_sub.php" id="part_category_form" method="post">
                                    
                                       <input type="hidden" id="parent_id" name="parent_id" value="0"/>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="name">Category Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name">
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