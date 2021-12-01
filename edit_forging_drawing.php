<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Forging Drawing</a></li>
                    
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Forging Drawing</h4>
                            </div>
                            <div class="w-box-content cnt_a">
                                <?php 
                                if($_SESSION['msg_session'] != ''){
                                echo '<div class="alert alert-error"><a data-dismiss="alert" class="close">×</a><strong>Error! </strong>'.$_SESSION['msg_session'].'</div>';
                                $_SESSION['msg_session'] = '';
                                }
                                ?>
                                                                <?php 
                                if($_SESSION['msg_success'] != ''){
                                echo '<div class="alert alert-success"><a data-dismiss="alert" class="close">×</a><strong>Success! </strong>'.$_SESSION['msg_success'].'</div>';
                                $_SESSION['msg_success'] = '';
                                }
                                $id = $_GET['id'];
                                $query = 'SELECT * FROM forging_drawing WHERE id='.$id;
                                $response = $crud->getSingleRow($query);
                                ?>
                                <form class="form-horizontal" id="add_forging_drawing" action="edit_forging_drawing_sub.php" method="post" enctype="multipart/form-data">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" id="image_name" name="image_name" value="<?php echo $response['forging_image']; ?>">

                                        <div class="control-group">
                                            <label class="control-label" for="old_password">Part Number</label>
                                            <div class="controls">
                                                <input type="text" name="part_no" id="part_no" value="<?php echo $response['part_number']; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="old_password">Part Weight</label>
                                            <div class="controls">
                                                <div class="input-append">
                                                <input type="text" name="part_weight" id="part_weight" value="<?php echo $response['part_weight']; ?>"><span class="add-on">KG</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="new_password">Customer</label>
                                            <div class="controls">
                                                <select id="customer" name="customer">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM customer';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $response['customer']){ ?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="old_password">Material Grade</label>
                                            <div class="controls">
                                                <select id="material_grade" name="material_grade">
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $response['material_grade']){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="old_password"></label>
                                            <div class="controls">
                                                <?php if($response['forging_image'] != ''){ ?>
                                                <a href="img/part_image/<?php echo $response['forging_image'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a>
                                                <?php }?>
                                                <input type="file" name="forging_image" id="forging_image">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-primary">Save</button>
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