<?php include_once("header.php"); ?>

<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.php"><i class="icon-home"></i></a></li>
                    <li><a href="javascript:void(0)">Furnaces</a></li>
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
                                <h4>Furnaces</h4>
                               <div class="pull-right">
                                    <a href="add_furnace"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add Furnace</span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content">
                                 <table id="example2" class="table display nowrap">
                                <thead>
                                    <tr>
                                        
                                        <th>Furnace Id</th>
                                        <th>Unit</th>
                                        <th>Capacity</th>
                                        <th>Oil Grade</th>
                                        <th>Quench Tank Capacity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query = 'SELECT * FROM furnace order by id desc';
                       $result  = $crud->getAllData($query);
                      
                       foreach ($result as $key => $value) {
                        $q = 'SELECT name FROM unit WHERE id='.$value['unit'];
                        $unit = $crud->getSingleRow($q);
                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $value['furnace_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo $unit['name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $value['capacity']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['oil_grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['tank_capacity']; ?>
                                            </td>

                                             <td><a href="edit_furnace?id=<?php echo $value['id']; ?>"><i class="icsw16-pencil"></i></a><a onClick="userConfirmation(<?php echo $value['id']; ?>,'delete_furnace.php')" href="#"><i class="icsw16-trashcan"></i></i></a></td>
                                            <!-- <a href="edit_user.php?user_id=<?php echo $value['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a onClick="return confirm('Are You Sure');" href="delete_user.php?user_id=<?php echo $value['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                        </tr>

                                        <?php   
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