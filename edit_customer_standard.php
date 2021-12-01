<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="material_listing">Customer Standard</a></li>
                    <li><a href="javascript:void(0)">Edit Customer Standard</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Customer Standard</h4>
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
                                     $detail = 'SELECT * FROM customer_standard WHERE id='.$id;
                                     $data = $crud->getSingleRow($detail);
                                 ?>
                                <form class="form-horizontal" action="edit_customer_standard_sub.php" id="material_form" method="post" enctype="multipart/form-data">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                                       <input type="hidden" id="id" name="old_file" value="<?php echo $data['file']; ?>"/>
										
										
                                        <div class="control-group">
                                            <label class="control-label" for="name">Customer Name</label>
                                            <div class="controls">
                                                <select name="customer">
												<option value="">Select Customer </option>
												 <?php
                      $query = 'SELECT * FROM customer order by id desc';
                       $result  = $crud->getAllData($query);
                     
                       foreach ($result as $key => $value) {
						   ?>
						   <option value="<?php echo $value['id']; ?>" <?php if($data['customer_id'] == $value['id'] ){ ?>selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
					   <?php } ?>
												</select>
                                            </div>
                                        </div>
										
                                       <div class="control-group">
                                            <label class="control-label" for="name">Standard No</label>
                                            <div class="controls">
                                                <input type="text" id="standard_no" name="standard_no" value="<?php echo $data['standard_no']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="name">File</label>
                                            <div class="controls">
                                              <?php if($data['file']!=''){ ?>
                                              <a href="img/customer/<?php echo $data['file'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a>
                                              <?php } ?>
                                                <input type="file" id="file" name="file">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
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