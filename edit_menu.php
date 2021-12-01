<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="menus">Menus</a></li>
                    <li><a href="javascript:void(0)">Edit Menu</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Menu</h4>
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
                                     $query = 'SELECT * FROM menus WHERE id ='.$id;
                                     $result = $crud->getSingleRow($query);
                                 ?>
                                <form class="form-horizontal" action="edit_menu_sub.php" id="menu_form" method="post">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>"/>
                                        
                                        <input type="hidden" id="parent_id" name="parent_id" value="<?php $result['parent_id'] ?>"/>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Menu Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name" value="<?php echo $result['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="path">Path</label>
                                            <div class="controls">
                                                <input type="text" id="path" name="path" value="<?php echo $result['link'] ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="path">Menu Order</label>
                                            <div class="controls">
                                                <input type="text" id="menu_order" name="menu_order" value="<?php echo $result['menu_order'] ?>" >
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