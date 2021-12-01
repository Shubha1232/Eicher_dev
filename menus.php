<?php include_once("header.php"); 

?>
<!-- breadcrumbs -->
            <div class="container-fluid">
                <ul id="breadcrumbs">
                    <li><a href="javascript:void(0)"><i class="icon-home"></i></a></li>
                    
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
                                <h4>Menus</h4>
                                <div class="pull-right">
                                    <a href="add_menus?id=0"><span class="label"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add New</span></span></a>
                                </div>
                            </div>
                            <div class="w-box-content cnt_a">
                                       <div class="row-fluid">
                                        <div class="span6">
                                        <div class="accordion" id="accordion2">
                                            <?php $query = 'select * from menus where parent_id = 0 order by menu_order ASC ';
                                                $result  = $crud->getAllData($query);

                                                foreach ($result as $key => $value) {
                                                    
                                                
                                            ?>
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $key; ?>">
                                                    <?php echo $value['name']; ?>
                                                    <span class="pull-right" style="z-index:999;color:#000;" onclick="editMenu(<?php echo $value['id'] ?>)"><i class="icsw16-pencil"></i></span>
                                                     <div class="pull-right"><span class="label" style="z-index:999;" onclick="addNewMenu(<?php echo $value['id'] ?>)"><i class="splashy-add_small"></i><span class="jQ-todoAll-count">Add New</span></span></div>
                                                    </a>
                                                </div>
                                                <?php $query = 'select * from menus where parent_id ='.$value['id'].' order by menu_order ASC' ;
                                                        $submenus  = $crud->getAllData($query);
                                                        if(!empty($submenus)){ ?>
                                                <div id="collapse<?php echo $key; ?>" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        
                                                        <?php
                                                           
                                                           echo '<table>';

                                                        foreach($submenus as $key1 => $value1){?>

                                                        <tr>
                                                           <td>
                                                                <?php echo $value1['name'] ?>
                                                            </td>
                                                            <td>
                                                                <a href="#" onclick="editMenu(<?php echo $value1['id'] ?>)"><i class="icsw16-pencil"></i></a>
                                                            </td>
                                                        </tr>    
                                                        <?php } echo '</table>'; ?>
                                                    </div>

                                                </div>
                                                <?php }?>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                      
                </div>
                
                
            </div>
            <div class="footer_space"></div>
        </div>
        <?php include_once("footer.php");  ?>
        <script type="text/javascript">
                $(function(){
                    $("#tree").dynatree({checkbox: true});
                });
                function addNewMenu(id){
                    var location = 'add_menus?id='+id;
                    
                    window.location.href = ''+location+'';
                }
                function editMenu(id){
                    var location = 'edit_menu?id='+id;
                    
                    window.location.href = ''+location+'';
                }
            </script>
            <style type="text/css">
   #example2_wrapper .row {
        padding:10px;
        margin-left:0px;
    }
    .splashy-add_small{
        margin-top: -2px !important;
    }
    .splashy-pencil_small{
        margin-top: -2px !important;
    }
    .jQ-todoAll-count{
        font-size:13px !important;
    }
</style>