<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="furnace_list">Furnaces</a></li>
                    <li><a href="javascript:void(0)">Edit Furnace</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Furnace</h4>
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
                                     $query = 'SELECT * FROM furnace WHERE id ='.$id;
                                     $result = $crud->getSingleRow($query);
                                   
                                 ?>
                                <form class="form-horizontal" action="edit_furnace_sub" id="furnace_form" method="post">
                                    
                                        <input type="hidden" id="furnace_id" name="furnace_id" value="<?php echo $result['id']; ?>">
                                         <div class="control-group">
                                            <label class="control-label" for="name">Unit</label>
                                            <div class="controls">
                                                <select name="unit" id="unit">
                                                <option value="">Select Unit</option>
                                                <?php
                                                                              $query = 'SELECT * FROM unit';
                                                                              $result1 = $crud->getAllData($query);
                                                                              foreach ($result1 as $key => $value) {

                                                                      if($value['id'] == $result['unit']){
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>" selected="selected"><?php echo $value['name']; ?></option>
                                                    <?php } else{ ?>
                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                   <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Furnace</label>
                                            <div class="controls">
                                                <input type="text" id="furnace_no" name="furnace_no" value="<?php echo $result['furnace_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Capacity</label>
                                            <div class="controls">
                                                <input type="text" id="capacity" name="capacity" value="<?php echo $result['capacity']; ?>">
                                            </div>
                                        </div>
                    <div class="control-group">
                                            <label class="control-label" for="name">Oil Grade</label>
                                            <div class="controls">
                                                <input type="text" id="oil_grade" name="oil_grade" value="<?php echo $result['oil_grade']; ?>">
                                            </div>
                                        </div>
                    <div class="control-group">
                                            <label class="control-label" for="name">Quench Tank Capacity</label>
                                            <div class="controls">
                                                <input type="text" id="tank_capacity" name="tank_capacity" value="<?php echo $result['tank_capacity']; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Description</label>
                                            <div class="controls">
                                                <textarea  placeholder="Description" rows="3"   name="description" value="<?php echo $result['description']; ?>"><?php echo $result['description']; ?></textarea>
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