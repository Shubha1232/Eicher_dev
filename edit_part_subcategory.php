<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="part_subcategory_list">Part Sub Category</a></li>
                    <li><a href="javascript:void(0)">Edit Sub Category</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Sub Category</h4>
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

                                  $id = $_GET['id'];
                                  $query = 'SELECT * FROM part_category WHERE id='.$id;
                                  $result = $crud->getSingleRow($query);
                                   
                                ?>
                                
                                <form class="form-horizontal" action="edit_part_category_sub.php" id="part_subcategory_form" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="name">Part Category</label>
                                            <div class="controls">
                                                <select name="parent_id">
                                                    <option value="">Select Category</option>
                                                    <?php $query = "SELECT id,name FROM part_category where parent_id = 0";
                                                          $rs = $crud->getAllData($query);
                                                          foreach ($rs as $key => $value) {
                                                             if($result['parent_id'] == $value['id']){
                                                              echo '<option value='.$value['id'].' selected="Selected">'.$value['name'].'</option>';
                                                             }
                                                             else{
                                                              echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
                                                             }
                                                           } 
                                                      ?>
                        												</select>
                                            </div>
                                        </div>
                                       <div class="control-group">
                                            <label class="control-label" for="name">Part Sub Category</label>
                                            <div class="controls">
                                                 <input type="text" id="name" name="name" value="<?php echo $result['name'] ?>">
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