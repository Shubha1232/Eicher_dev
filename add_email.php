<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="user_email">Email List</a></li>
                    <li><a href="javascript:void(0)">Add Email</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <p style="text-align: center;">Add Email</p>
                            </div>
                            <div class="w-box-content cnt_a">
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
                                
                                <form class="form-horizontal" action="add_email_sub.php" id="user_form" method="post">
                                    
                                        
                                        <div class="control-group">
                                            <label class="control-label bg-color1" for="email_address">Email address</label>
                                            <div class="controls">
                                                <input type="text" id="email_address" name="email_address">
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
		<script>
        $(document).ready(function(){
			var isLogin = $("#new_flash").val();
			if(!isLogin){
			       $('#myModal2').modal({
        				backdrop: 'static',
        				keyboard: false  // to prevent closing with Esc button (if you want this too)
        			})
			}
			})
        </script>