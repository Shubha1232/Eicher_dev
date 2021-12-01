<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="material_listing">Material</a></li>
                    <li><a href="javascript:void(0)">Edit Material</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Material</h4>
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
                                     $query = 'SELECT * FROM material WHERE id='.$id;
                                     $result = $crud->getSingleRow($query);
                                 ?>
                                <form class="form-horizontal" action="edit_material_sub.php" id="material_form" method="post">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>"/>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Material Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="name">Minimum Stock</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="min_stock" value="<?php echo $result['min_stock']; ?>" >
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="name">Item Code</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="item_code" value="<?php echo $result['item_code']; ?>">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="name">Supplier Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="supplier_name" value="<?php echo $result['supplier_name']; ?>">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="name">Lead Time</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="lead_time" value="<?php echo $result['lead_time']; ?>">
                                            </div>
                                        </div>
                                       <div class="control-group">
                                            <label class="control-label" for="name">Availaible Quantity</label>
                                            <div class="controls">
                                                <input type="text" id="quantity" name="quantity" value="<?php echo $result['quantity']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="name">Price</label>
                                            <div class="controls">
                                                <input type="text" id="price" name="price" value="<?php echo $result['price']; ?>">
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