<?php include_once("header.php"); ?><style>.bg-color{    background-color: #006dcc;    color: #fff; 	padding: 8px;line-height: 20px;text-align: left;vertical-align: top;text-align: left !important;}</style>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="material_listing">Material</a></li>
                    <li><a href="javascript:void(0)">Add Material</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                 <p style="text-align: center;">Add Material</p>
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
                                <form class="form-horizontal" action="add_material_sub.php" id="material_form" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label bg-color" for="name">Material Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color" for="name">Minimum Stock</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="min_stock">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color" for="name">Item Code</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="item_code">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color" for="name">Supplier Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="supplier_name">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label bg-color" for="name">Lead Time</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="lead_time">
                                            </div>
                                        </div>
                                       <div class="control-group">
                                            <label class="control-label bg-color" for="name">Availaible Quantity</label>
                                            <div class="controls">
                                                <input type="text" id="quantity" name="quantity">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label bg-color" for="name">Price</label>
                                            <div class="controls">
                                                <input type="text" id="price" name="price">
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