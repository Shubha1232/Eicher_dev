<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="furnace_list">Furnaces</a></li>
                    <li><a href="javascript:void(0)">Add Furnace</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Add Furnace</p>
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
                                <form class="form-horizontal" action="add_furnace_sub" id="furnace_form" method="post">
                                    
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="name">Unit</label>
                                            <div class="controls">
                                                <select name="unit" id="unit">
												<option value="">Select Unit</option>
												<?php
                                                      $query = 'SELECT * FROM unit';
                                                      $result = $crud->getAllData($query);
                                                      foreach ($result as $key => $value) {
														  ?>
														<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
													  <?php } ?>
												</select>
                                            </div>
                                        </div>
                                        
										<div class="control-group">
                                            <label class="control-label bg-color1" for="name">Furnace No</label>
                                            <div class="controls">
                                                <input type="text" id="furnace_no" name="furnace_no">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color1" for="name">Capacity</label>
                                            <div class="controls">
                                                <input type="text" id="capacity" name="capacity">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color1" for="name">Oil Grade</label>
                                            <div class="controls">
                                                <input type="text" id="oil_grade" name="oil_grade">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color1" for="name">Quench Tank Capacity</label>
                                            <div class="controls">
                                                <input type="text" id="tank_capacity" name="tank_capacity">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="name">Description</label>
                                            <div class="controls">
                                                <textarea  placeholder="Description" rows="3"   name="description" ></textarea>
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