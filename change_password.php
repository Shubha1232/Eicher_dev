<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="<?php if($_SESSION['user_type'] == 21){?>#<?php }else{?>dashboard.php<?php } ?>"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Change Password</a></li>
                    
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Change Password</p>
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
                                ?>
                                <form class="form-horizontal" id="change_password_form" action="change_password_sub.php" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="old_password">Old Password</label>
                                            <div class="controls">
                                                <input type="password" name="old_password" id="old_password" placeholder="old password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="new_password">New Password</label>
                                            <div class="controls">
                                                <input type="password" name="new_password" id="new_password" placeholder="new password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="old_password">Confirm Password</label>
                                            <div class="controls">
                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm password">
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