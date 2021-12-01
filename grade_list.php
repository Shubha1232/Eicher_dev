<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Grade List</a></li>
                </ul>
            </div>
<!-- main content -->
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
            <div class="container-fluid"">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="w-box">
                             <div class="w-box-header">
                                <h4>Grade List</h4>
                               <div class="pull-right">
                                    <a href="add_grade"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add Grade </span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        
                                        
										                    <th>Material Grade</th>
															          <th>VECV Material Code</th>
															<th>Discription</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query = 'SELECT * FROM grade order by id desc';
                       $result  = $crud->getAllData($query);
                       $i = 1;
                       foreach ($result as $key => $value) {
                        $q2 = 'SELECT * FROM material WHERE id='.$value['material'];
                        $r2 = $crud->getSingleRow($q2);

                        ?>
                                        <tr>
                                           
                                           <td><?php echo $value['grade'] ?></td>
										                       <td><?php echo $value['vecv_code'] ?></td>
										   <td><?php echo $value['description'] ?></td>
                                           <td><a href="edit_grade?id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a><!--<a onclick="userConfirmation(<?php echo $value['id'] ?>,'delete_grade.php')" href="#"><i class="icsw16-trashcan"></i></a>--></td>
                                        </tr>

                                        <?php   $i++;
                        } 
                      ?>
                                </tbody>
                            </table> 
                            </div>
                        </div>
                    </div>
                      
                </div>
                
                
            </div>
            <div class="footer_space"></div>
        </div>
        <?php include_once("footer.php");  ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#example2').DataTable({				"pageLength": 50,
                'aoColumnDefs': [{		
        'bSortable': false,
        'aTargets': [-1] 
        // 1st one, start by the right 
    }],
                 responsive : true,  
            });
        });
    </script>
    <style type="text/css">
   #example2_wrapper .row {
        padding:10px;
        margin-left:0px;
    }
    .splashy-add_small{
        margin-top: -2px !important;
    }
    .jQ-todoAll-count{
        font-size:13px !important;
    }
</style>