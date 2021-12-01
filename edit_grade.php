<?php include_once("header.php"); ?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard"><i class="icon-home"></i></a></li>
                    <li><a href="grade_list">Grade List</a></li>
                    <li><a href="javascript:void(0)">Edit Grade</a></li>
                </ul>
            </div>
<!-- main content -->
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Edit Grade</h4>
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
                                     $query = 'SELECT * FROM grade WHERE id='.$id;
                                     $result2 = $crud->getSingleRow($query);
									 $min = explode(",",$result2["min"]);
									 $max = explode(",",$result2["max"]);
                   $hardness_test_max = explode(',', $result2['hardness_test_max']);
                   $hardness_test_min = explode(',', $result2['hardness_test_min']);

                                 ?>
                                <form class="form-horizontal" action="edit_grade_sub" id="grade_form" method="post">
                                    
                                        <input type="hidden" id="id" name="id" value="<?php echo $result2['id'] ?>"/>
                                        <!--<div class="control-group">
                                            <label class="control-label" for="name">Material</label>
                                            <div class="controls">
                                                <select name="material">
                              												<option value="">Select Material</option>
                                                      <?php/*
                                                      $query = 'SELECT id,name FROM material';
                                                      $result = $crud->getAllData($query);
                                                      foreach ($result as $key => $value) {
                                                        if($result2['material'] == $value['id']){

                                                        echo '<option value='.$value['id'].' selected="">'.$value['name'].'</option>';
                                                        }
                                                        else{
                                                          echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
                                                        }
                                                      }
                                                      */?>
                          												</select>
                                            </div>
                                        </div>-->
                                       <div class="control-group" style="margin-bottom: 15px;">
                                            <label class="control-label" for="name">GRADE</label>
                                            <div class="controls">
                                                 <input type="text" name="grade" value="<?php echo $result2['grade']; ?>">
                                            </div>
                                        </div>
										                    <div class="control-group" style="margin-bottom: 15px;">
                                            <label class="control-label" for="name">VECV MATERIAL CODE</label>
                                            <div class="controls">
                                                <input type="text" name="vecv_code" value="<?php echo $result2['vecv_code'] ?>">
                                            </div>
                                        </div>
										                  <table class="table table-bordered" style="margin-bottom: 15px;">
                                          <thead>
                                            <tr style="background:#A2A2A2; color:#FFF;">
                                              <td colspan="15" style="text-align:center">CHEMICAL COMPOSITION</td>
                                            </tr>
                                            <tr>
                                              <td>PARAMETER</td>
                                                <td>C%</td>                                              
                                                <td>Mn%</td>
                                                  <td>S%</td>                      
                                                  <td>P%</td>                                            
                                                  <td>Si%</td>
                                                  <td>Ni%</td>
                                                  <td>Cr%</td>
                                                  <td>Mo%</td>
                                                  <td>V%</td>                      
                                                  <td>Al%</td>
                                                  <td>B%</td>                      
                                                  <td>Cu%</td>
                                                  <td>Ca%</td>
                                                  <td>Sn%</td>
                                            </tr>
                                          </thead>
                                             <tbody>
                                               <tr>
                                                 <td>MIN SPEC</td>
                                                 
                                                   <?php for($i=0;$i<=13;$i++) { ?>
                                                  <td><input type="text" class="smbox" name="min[]" value="<?php echo $min[$i] ?>"></td>
                                                  <?php  } ?>

                                                 
                                               </tr>
                                               <tr>
                                                 <td>MAX SPEC</td>
                                                 
                                                   <?php for($i=0;$i<=13;$i++) { ?>
                                                  <td><input type="text" class="smbox" name="max[]" value="<?php echo $max[$i] ?>"></td>
                                                  <?php  } ?>

                                                 
                                               </tr>
                                             </tbody>
                                        </table>
                                        <table class="table table-bordered" style="margin-bottom: 15px;">
                                          <tr style="background:#A2A2A2; color:#FFF;">
                                              <td colspan="21" style="text-align:center">HARDENABILITY TEST</td>
                                            </tr>
                                                                    <tr>
                                                                       <td>DISTANCE (in inches)</td>
                                                                       
                                                                       <td>J1/16''</td>
                                                                       <td>2/16''</td>
                                                                       <td>3/16''</td>
                                                                       <td>4/16''</td>
                                                                       <td>5/16''</td>
                                                                       <td>6/16''</td>
                                                                       <td>7/16''</td>
                                                                       <td>8/16''</td>
                                                                       <td>9/16''</td>
                                                                       <td>10/16''</td>
                                                                       <td>11/16''</td>
                                                                       <td>12/16''</td>
                                                                       <td>13/16''</td>
                                                                       <td>14/16''</td>
                                                                       <td>15/16''</td>
                                                                       <td>16/16''</td>
                                                                       <td>17/16''</td>
                                                                       <td>18/16''</td>
                                                                       <td>19/16''</td>
                                                                       <td>20/16''</td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td>DISTANCE (in mm)</td>
                                                                       
                                                                       <td>1.5875</td>
                                                                       <td>3.175</td>
                                                                       <td>4.7625</td>
                                                                       <td>6.35</td>
                                                                       <td>7.9375</td>
                                                                       <td>9.525</td>
                                                                       <td>11.1125</td>
                                                                       <td>12.7</td>
                                                                       <td>14.2875</td>
                                                                       <td>15.875</td>
                                                                       <td>17.4625</td>
                                                                       <td>19.05</td>
                                                                       <td>20.6375</td>
                                                                       <td>22.225</td>
                                                                       <td>23.8125</td>
                                                                       <td>25.4</td>
                                                                       <td>26.9875</td>
                                                                       <td>28.575</td>
                                                                       <td>30.1625</td>
                                                                       <td>31.75</td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td>MIN SPEC</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><input class="smbox " type="text" id="hardness_test_min[]" name="hardness_test_min[]" value="<?php echo $hardness_test_min[$i]; ?>" /></td>
                                                                       <?php   }
                                                                       ?>
                                                                   
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td>MAX SPEC</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><input class="smbox" type="text" id="hardness_test_max[]" name="hardness_test_max[]" value="<?php echo $hardness_test_max[$i]; ?>"/></td>
                                                                     <?php   }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   
                                                                   
                                                                   
                                                                   

                                                    </table>
										  <div class="control-group">
                                            <label class="control-label" for="name">Description</label>
                                            <div class="controls">
                                               <textarea  placeholder="Description" rows="3"   name="description" value="<?php echo $result2['description']; ?>" ><?php echo $result2['description']; ?></textarea>
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