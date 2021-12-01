<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="forger_company_list">Forger Company</a></li>
                    <li><a href="javascript:void(0)">Edit Company</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Company</h4>
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
                                     $query = 'SELECT * FROM forger_company WHERE id='.$id;
                                     $result = $crud->getSingleRow($query);
                                 ?>
                                <form class="form-horizontal" action="edit_company_sub.php" id="forger_company_form" method="post">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>"/>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Company Name</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="name">Company Code</label>
                                            <div class="controls">
                                                <input type="text" id="company_code" name="company_code" value="<?php echo $result['company_code']; ?>">
                                            </div>
                                        </div>
                                      <div class="control-group">
                                            <label class="control-label" for="name">Company Email</label>
                                            <div class="controls">
                                                <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>">
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="name">Phone Number</label>
                                            <div class="controls">
                                                <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="name">Address</label>
                                            <div class="controls">
                                               <textarea  placeholder="Address" rows="3"   name="address" value="<?php echo $result['address']; ?>" ><?php echo $result['address']; ?></textarea>
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="name">Last Audit Date</label>
                                            <div class="controls">
                                            <input type="date" id="last_audit_date" name="last_audit_date" value="<?php echo $result['last_audit_date']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                         <!--   <label class="control-label" for="name">Due Audit Date</label> -->
                                           <label class="control-label" for="name">Plan Date</label>
                                            <div class="controls">
                                            <input type="date" id="due_audit_date" name="due_audit_date" value="<?php echo $result['due_audit_date']; ?>">
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="name">Audit Person</label>
                                            <div class="controls">
                                            <input type="text" id="audit_person" name="audit_person" value="<?php echo $result['audit_person']; ?>">
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