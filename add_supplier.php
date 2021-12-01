<?php include_once("header.php"); ?><style type="text/css">.bg-color{    background-color: #006dcc;    color: #fff;    }   </style>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="supplier_list">Supplier List</a></li>
                    <li><a href="javascript:void(0)">Add Supplier</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Add Supplier</p>
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
                                <form class="form-horizontal" action="add_supplier_sub" id="supplier_form" method="post">

                                       <div class="control-group" style="margin-bottom: 15px;">
                                            <label class="control-label bg-color1" for="name">Supplier Name</label>
                                            <div class="controls">
                                                <input type="text" name="supplier" id="supplier" >
                                            </div>
                                        </div>
                                       
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-primary">SAVE</button>
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