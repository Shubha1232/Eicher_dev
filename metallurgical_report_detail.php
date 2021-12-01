<?php include_once("header.php"); ?>

<style type="text/css">
  /*td{
    border-top: none !important;

  }*/

     /*td input{
        width:150px !important;
     } */
     .span1{
        width:100px !important;
     }    
 .innerBoxes{
        width:40px !important;
        }
        .div-scroll
{
width:1270px;
/*overflow-x:scroll;*/
}
.div-scroll-metallographic{
    width:900px;
    /*overflow-x:scroll;*/
}
 .splashy-pencil_small{
        margin-top: -2px !important;
    }
    .jQ-todoAll-count{
        font-size:13px !important;
    }
        </style>
 

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                    <li><a href="#">METALLURGICAL TEST REPORT DETAIL</a></li>

                   

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <div class="w-box-header">
                                  <?php $id = $_GET['id']; ?>
                                <div class="pull-right">
                                    <a href="edit_metallurgical_report?id=<?php echo $id; ?>" target="_blank"><span class="label"><i class="splashy-pencil_small"></i><span class="jQ-todoAll-count">Edit</span></span></a>
                                </div>

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
                                   
                                   $query = 'SELECT * FROM metallurgical_report WHERE id='.$id;
                                   $response = $crud->getSingleRow($query);
                                   $chemical_composition_min = explode('*',$response['chemical_composition_min']);
                                   $chemical_composition_max = explode('*',$response['chemical_composition_max']);
                                   $chemical_composition_milltc = explode('*',$response['chemical_composition_milltc']);
                                   $chemical_composition_forgertc = explode('*',$response['chemical_composition_forgertc']);
                                   $chemical_composition_partyremark = explode('*',$response['chemical_composition_partyremark']);
                                   $chemical_composition = explode('*',$response['chemical_composition']);
                                   $chemical_composition2 = explode('*',$response['chemical_composition2']);
                                   $chemical_composition_avg = explode('*',$response['chemical_composition_avg']);
                                   $hardness_test_milltc = explode('*',$response['hardness_test_milltc']);
                                   $hardness_test_forgertc = explode('*',$response['hardness_test_forgertc']);
                                   $hardness_test_vec = explode('*',$response['hardness_test_vec']);
                                   $hardness_test = explode('*',$response['hardness_test']);
                                   $hardness_test2 = explode('*',$response['hardness_test2']);
                                   $hardness_test_calculatedvalue = explode('*',$response['hardness_test_calculatedvalue']);
                                   $inclusion_rating_req_tn = explode('*', $response['inclusion_rating_req_tn']);
                                   $inclusion_rating_req_tk = explode('*', $response['inclusion_rating_req_tk']);
                                   $inclusion_rating_act_tn = explode('*', $response['inclusion_rating_act_tn']);
                                   $inclusion_rating_act_tk = explode('*', $response['inclusion_rating_act_tk']);
                                   $gas_content_req = explode('*', $response['gas_content_req']);
                                   $gas_content_act = explode('*', $response['gas_content_act']);
                                   $part_no = explode('*', $response['part_no']);
                                   $jommy_requirement = explode('*', $response['jommy_requirement']);
                                   $jommy_value = explode('*', $response['jommy_value']);
                                   $observed = explode('*', $response['observed']);
                                   $accept = explode('*', $response['accept']);
                                   $remark = explode('*', $response['remark']);
                                   $hardness_test_min_spec = explode('*', $response['hardness_test_min_spec']);
                                   $hardness_test_max_spec = explode('*', $response['hardness_test_max_spec']);
                                    
                                ?>

                                

                                <form class="form-horizontal" action="#" id="control_plan_form" method="post">
                                        
                                        <table class="table table-bordered">
                                           <tr>
                                             <td colspan="4"></td>
                                             <td>REPORT NO.</td>
                                                <td><?php echo $response['report_no']; ?></td>
                                           </tr>
                                            <tr>
                                                <td>MILL TC SUPPLIER NAME</td>
                                                <td><?php 
                                                $query = 'SELECT * FROM steel_mill WHERE id='.$response['mill_tc_supplier']; 
                                                $result = $crud->getSingleRow($query);
                                                echo $result['name'];
                                                ?></td>
                                                <td>HEAT NO.</td>
                                                <td><?php echo $response['heat_no']; ?></td>
                                               <td>DATE</td>
                                                <td><?php echo $response['date']; ?></td>

                                            </tr>
                                            <tr>
                                                <td>FORGER TC SUPPLIER NAME</td>
                                                <td><?php 
                                                $query = 'SELECT * FROM forger_company WHERE id='.$response['forger_tc_supplier']; 
                                                $result = $crud->getSingleRow($query);
                                                echo $result['name'];
                                                ?></td>
                                                <td>MATERIAL GRADE</td>
                                                <td><?php echo $response['grade']; ?></td>
                                                <td>BLOOM SIZE</td>
                                                <td><?php echo $response['bloom_size']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>MILL TC</td>
                                                <td><?php if($response['mill_tc_file']!= ''){ ?><a href="img/part_image/<?php echo $response['mill_tc_file'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a><?php }?></td>
                                                <td>SECTION</td>
                                                <td><?php echo $response['section']; ?></td>
                                                <td>LENGTH</td>
                                                <td><?php echo $response['length']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>FORGER TC</td>
                                                <td><?php if($response['forger_tc_file']!= ''){ ?><a href="img/part_image/<?php echo $response['forger_tc_file'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a><?php }?></td>
                                                <td>TOTAL PCS</td>
                                                <td><?php echo $response['total_pcs']; ?></td>
                                                 <td>BLOOM SIZE</td>
                                                <td><?php echo $response['bloom_size']; ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">THIRD PARTY FILE</td>
                                                <td rowspan="2"><?php if($response['third_party_file']!= ''){ ?><a href="img/part_image/<?php echo $response['third_party_file'] ?>" download><i class="fa fa-download" aria-hidden="true" style="font-size:15px !important;"></i> Download</a><?php }?></td>
                                                <td>WEIGHT</td>
                                                <td><?php echo $response['weight']; ?></td>
                                                <td>CONDITION</td>
                                                <td><?php echo $response['condition']; ?></td>
                                            </tr>
                                            <tr>
                                                
                                                <td>REDUCTION RATIO</td>
                                                <td><?php echo $response['reduction_ratio']; ?></td>
                                                <td>PROCESS ROUTE</td>
                                                <td><?php echo $response['process_route']; ?></td>
                                            </tr>
                                            
                                            <tr style="background:#A2A2A2; color:#FFF;">
                                                                        <td colspan="6" style="text-align:center">% CHEMICAL COMPOSITION</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                            <div id="div1" class="div-scroll">
                                                                <table class="table">
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
                                                                       <td>AI%</td>
                                                                       <td>B%</td>
                                                                       <td>Cu%</td>
                                                                       <td>Ca%</td>
                                                                       <td>Sn%</td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td>MIN SPEC</td>
                                                                       
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td> <?php echo $chemical_composition_min[$i] ?></td>
                                                                        <?php }
                                                                       ?>
                                                                   

                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                       <td>MAX SPEC</td>
                                                                       
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition_max[$i] ?></td>
                                                                        <?php }
                                                                       ?>
                                                                   
                                                                     
                                                                    </tr>
                                                                    <tr>
                                                                       <td>MILL TC VALUE</td>
                                                                        
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition_milltc[$i] ?></td>
                                                                       <?php  }
                                                                       ?>
                                                                   
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                       <td>FORGER TC VALUE</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition_forgertc[$i] ?></td>
                                                                       <?php  }
                                                                       ?>
                                                                   
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                       <td>THIRD PARTY VALUE</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition_partyremark[$i] ?></td>
                                                                       <?php }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td><?php echo $response['chenical_composition_value1']; ?></td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition[$i] ?></td>
                                                                       <?php  }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td><?php echo $response['chenical_composition_value2'] ?></td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition2[$i] ?></td>
                                                                       <?php  }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td>AVG VALUE</td>
                                                                        
                                                                       <?php
                                                                         for($i=0; $i<14; $i++) { ?>
                                                                    <td><?php echo $chemical_composition_avg[$i] ?></td>
                                                                       <?php  }
                                                                       ?>
                                                                   
                                                                   </tr>


                                                                </table>
                                                            </div>
                                                </td>
                                            </tr>
                                            <tr style="background:#A2A2A2; color:#FFF;">
                                                                        <td colspan="6" style="text-align:center">HARDENABILITY TEST (IS : 3848)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="div-scroll">
                                                    <table class="table">
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
                                                                    <td><?php echo $hardness_test_min_spec[$i]; ?></td>
                                                                        <?php  }
                                                                       ?>
                                                                   
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td>MAX SPEC</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><?php echo $hardness_test_max_spec[$i]; ?></td>
                                                                        <?php  }
                                                                       ?>
                                                                   
                                                                   
                                                                   </tr>
                                                                    <tr>
                                                                       <td>MILL TC VALUE</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><?php echo $hardness_test_milltc[$i]; ?></td>
                                                                        <?php  }
                                                                       ?>
                                                                   
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td>FORGER TC VALUE</td>
                                                                        
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><?php echo $hardness_test_forgertc[$i]; ?></td>
                                                                        <?php  }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td>VECV VALUE</td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                        <td><?php echo $hardness_test_vec[$i] ?></td>
                                                                       <?php   }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td><?php echo $response['jominy_value1'] ?></td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                      <td><?php echo $hardness_test[$i] ?></td>
                                                                        <?php }
                                                                       ?>
                                                                   
                                                                   </tr>
                                                                   <tr>
                                                                       <td><?php echo $response['jominy_value2'] ?></td>
                                                                         
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><?php echo $hardness_test2[$i] ?></td>
                                                                        <?php  }
                                                                       ?>
                                                                  
                                                                   </tr>
                                                                   <tr>
                                                                       <td>CALCULATED VALUE</td>
                                                                       
                                                                       <?php
                                                                         for($i=0; $i<20; $i++) { ?>
                                                                    <td><?php echo $hardness_test_calculatedvalue[$i]; ?></td>
                                                                      <?php    }
                                                                       ?>
                                                                   
                                                                   </tr>

                                                    </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="background:#A2A2A2; color:#FFF;text-align:center">
                                                <td colspan="4" style="text-align:center;">METALLOGRAPHIC CHARACTERSITICS</td>
                                                <td colspan="2" style="text-align:center;">GAS CONTENT(PPM)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="div-scroll-metallographic">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td colspan="5" style="text-align:center;">INCLUSION RATING IS:4163</td>
                                                                <td colspan="2" style="text-align:center;display: none;">DECARB IS:6396</td>
                                                                <td colspan="2" style="text-align:center;">GRAIN SIZE IS:4748</td>
                                                                <td style="display: none;">MICRO STRUCT.</td>
                                                                <td colspan="2" style="text-align:center;display: none;">INTERNAL SOUNDNESS ASTM, E381</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td colspan="2" style="display: none;">REQ</td>
                                                                <td colspan="4" style="text-align: center;">ACT</td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="display: none;">ACT</td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="text-align: center;">ACT</td>
                                                                <td rowspan="2" style="display: none;"></td>
                                                                <td rowspan="2" style="display: none;">REQ</td>
                                                                <td rowspan="2" style="display: none;text-align: center">ACT</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td style="display: none;">Tn</td>
                                                                <td style="display: none;">Tk</td>
                                                                <td>Tn</td>
                                                                <td colspan="2">Tk</td>
                                                            </tr>
                                                            <tr>
                                                                <td>A</td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tn[0]; ?></td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tk[0]; ?></td>
                                                                <td><?php echo $inclusion_rating_act_tn[0]; ?></td>
                                                                <td colspan="3"><?php echo $inclusion_rating_act_tk[0]; ?></td>
                                                                <td rowspan="4" style="display: none;"><?php echo $response['decarb_req']; ?></td>
                                                                <td rowspan="4" style="display: none;"><?php echo $response['decarb_act']; ?></td>
                                                                <td rowspan="4" style="display: none;"><?php echo $response['grain_size_req']; ?></td>
                                                                <td rowspan="4"><?php echo $response['grain_size_act']; ?></td>
                                                                
                                                                <td rowspan="4" style="display: none;"><?php echo $response['micro_struct']; ?></td>
                                                                <td rowspan="4" style="display: none;"><?php echo $response['internal_soundness_req']; ?></td>
                                                                <td rowspan="4" style="display: none;"><?php echo $response['internal_soundness_act']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>B</td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tn[1]; ?></td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tk[1]; ?></td>
                                                                <td><?php echo $inclusion_rating_act_tn[1]; ?></td>
                                                                <td colspan="2"><?php echo $inclusion_rating_act_tk[1]; ?></td>
                                                            </tr>
                                                            <tr>
                                                            <td>C</td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tn[2]; ?></td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tk[2]; ?></td>
                                                                <td><?php echo $inclusion_rating_act_tn[2]; ?></td>
                                                                <td colspan="2"><?php echo $inclusion_rating_act_tk[2]; ?></td>
                                                             </tr>
                                                             <tr>
                                                                <td>D</td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tn[3]; ?></td>
                                                                <td style="display: none;"><?php echo $inclusion_rating_req_tk[3]; ?></td>
                                                                <td><?php echo $inclusion_rating_act_tn[3]; ?></td>
                                                                <td colspan="2"><?php echo $inclusion_rating_act_tk[3]; ?></td>
                                                             </tr>   
                                                        </table>
                                                    </div>    
                                                </td>
                                                <td colspan="2">
                                                    <table class="table table-bordered">
                                                                                                               
                                                    <tr style="margin-top:20px">
                                                        <td>GAS</td>
                                                        <td>REQ</td>
                                                        <td>ACT</td>
                                                    </tr>
                                                    <tr>
                                                        <td>O2</td>
                                                        <td><?php echo $gas_content_req[0]; ?></td>
                                                        <td><?php echo $gas_content_act[0]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>N2</td>
                                                        <td><?php echo $gas_content_req[1]; ?></td>
                                                        <td><?php echo $gas_content_act[1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>H2</td>
                                                        <td><?php echo $gas_content_req[2]; ?></td>
                                                        <td><?php echo $gas_content_req[2]; ?></td>
                                                    </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td>PART NO.</td>
                                              
                                              <td colspan="2">OBSERVATION</td>
                                              <td>ACCEPTED/REJECTED</td>
                                              <td colspan="2">REMARK</td>
                                            </tr>
                                            <?php foreach ($part_no as $key => $value) {
                                              # code...?>
                                            <tr>

                                              <td><?php echo $value; 
                                               $q2 = "SELECT forging_image FROM forging_drawing WHERE part_number='$value'";
                                               
                                               $rs = $crud->getSingleRow($q2);
                                                 if($rs){
                                                echo '<p><a href="img/part_image/'.$rs['forging_image'].'" download><i class="fa fa-download" aria-hidden="true" style="font-size:30 !important;"></i> Download</a></p>';
                                               }
                                              ?></td>
                                              
                                              <td colspan="2"><?php echo $observed[$key]; ?></td>
                                              <td><?php echo $accept[$key] ?></td>
                                              <td colspan="2"><?php $remark[$key] ?></td>
                                              
                                            </tr>
                                           <?php } ?>
                                            
                                            
                                            <tr>
                                                  <td>CHECKED BY</td>
                                                    <td colspan="2"><?php
                                                      $query = 'SELECT full_name FROM users WHERE id='.$response['checked_by'];
                                                       $rs = $crud->getSingleRow($query);
                                                      echo $rs['full_name']; ?></td>
                                                    <td>APPROVED BY</td>
                                                    <td colspan="2"><?php 
                                                    $query = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                                       $rs = $crud->getSingleRow($query);
                                                     echo $rs['full_name']; ?></td>
                                                    
                                            </tr>
                                            
                                        </table>
                                        
                                        <div class="">
                                            <div class="">
												<button type="submit" style="visibility: hidden" class="btn btn-primary">Submit</button>
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

        <script type="text/javascript">

            $(function(){

                 $('.datepicker').datepicker({

                    format : 'yyyy-mm-dd'

                 })



            });
           
        </script>

        