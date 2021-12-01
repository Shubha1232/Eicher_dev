<?php

 include_once("classes/Database.php");



$crud = new Database();

/*

 * DataTables example server-side processing script.

 *

 * Please note that this script is intentionally extremely simply to show how

 * server-side processing can be implemented, and probably shouldn't be used as

 * the basis for a large complex system. It is suitable for simple use cases as

 * for learning.

 *

 * See http://datatables.net/usage/server-side for full details on the server-

 * side processing requirements of DataTables.

 *

 * @license MIT - http://datatables.net/license_mit

 */

 

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

 * Easy set variables

 */

 

// DB table to use

$table = 'control_plan';

 

// Table's primary key

$primaryKey = 'id';

 

// Array of database columns which should be read and sent back to DataTables.

// The `db` parameter represents the column name in the database, while the `dt`

// parameter represents the DataTables column identifier. In this case simple

// indexes

$columns = array(

    array ('db' => 'id', 'dt' => 0),

    array( 'db' => 'report_no', 'dt' => 1),

    array( 'db' => 'part_no',   'dt' => 2 ),

    array( 'db' => 'metallurgical_test_case_depth_pcd_observation',     'dt' => 3 ),

    array( 'db' => 'metallurgical_test_core_hardness_rcd_observation',     'dt' => 4 ),

    array( 'db' => 'other_clubbed_part_no',     'dt' => 5 ),

    array( 'db' => 'batch_code',     'dt' => 6 ),

    array( 'db' => 'steel_code',     'dt' => 7 ),

    array( 'db' => 'disposition',     'dt' => 8 ),



    // array(

    //     'db'        => 'start_date',

    //     'dt'        => 4,

    //     'formatter' => function( $d, $row ) {

    //         return date( 'jS M y', strtotime($d));

    //     }

    // ),

    // array(

    //     'db'        => 'salary',

    //     'dt'        => 5,

    //     'formatter' => function( $d, $row ) {

    //         return '$'.number_format($d);

    //     }

    // )

);

 

// SQL server connection information

$sql_details = array(

    'user' => 'ewayiuax_eicher',

    'pass' => 'eicher',

    'db'   => 'ewayiuax_eicher',

    'host' => 'ewayits.com'

);

 

 

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

 * If you just want to use the basic configuration for DataTables with PHP

 * server-side, there is no need to edit below this line.

 */



// $extraWhere = 'part_no="'.$_POST['part_no'].'"';

$batch_code = $_POST['batch_code'];



$steel_code = $_POST['steel_code'];



$furnace_name = $_POST['furnace_name'];



$from = $_POST['from'];



$to = $_POST['to'];



$disposition = $_POST['disposition'];

$customer = $_POST['customer'];

$part_no = $_POST['part_no'];

$f_unit  = $_POST['f_unit'];

$extraWhere ='`id`!=""';

if($from != ''){



      $extraWhere.=" AND `current_date` BETWEEN '$from'";



   }



   if($to != ''){



      $extraWhere.=" AND '$to'";



   }



   if($batch_code != ''){



    $extraWhere.=" AND `batch_code` = '$batch_code'";



   }



   if($steel_code != ''){



    $extraWhere.=" AND `steel_code` = '$steel_code'";



   }
   if($customer != ''){



    $extraWhere.=" AND `customer` = '$customer'";



   }



   if($furnace_name != ''){



    $extraWhere.=" AND `furnace_no` = '$furnace_name'";



   }



   if($disposition != ''){



      $extraWhere.=" AND `disposition` ='$disposition'";



   }



   if($part_no != ''){



      $extraWhere.=" AND (`part_no` ='$part_no' OR `other_clubbed_part_no` ='$part_no' OR `other_clubbed_part_no2` ='$part_no' OR `other_clubbed_part_no3` = '$part_no' OR `other_clubbed_part_no4` = '$part_no' OR `other_clubbed_part_no5` = '$part_no' OR  `other_clubbed_part_no6` = '$part_no')";



   }

   if($f_unit != ''){

      $q1 = 'SELECT furnace_no FROM furnace WHERE unit='.$f_unit;

      $r1 = $crud->getAllData($q1);

      $furnaces = '';

      foreach ($r1 as $key => $value){

         $furnaces.='"'.$value['furnace_no'].'",';

      }

      $furnaces=rtrim($furnaces,", ");

      $extraWhere.=" AND `furnace_no` IN ($furnaces)";

   }

require( 'classes/ssp.class.php' );

$result  = SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns,$extraWhere);



   $start=$_REQUEST['start'];



$start++;

foreach($result['data'] as &$res){

    $q2 = 'SELECT other_clubbed_part_no,other_clubbed_part_no2,other_clubbed_part_no3,other_clubbed_part_no4,other_clubbed_part_no5,other_clubbed_part_no6,status FROM control_plan WHERE id='.$res[0];

    $rs = $crud->getSingleRow($q2);

    $data = '<table class="table table-bordered other_clubbed_part"><tr>';

                                          // if(val.other_clubbed_part_no !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no'].'</td>';

                                          // }

                                          // if(val.other_clubbed_part_no2 !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no2'].'</td>';

                                          // }

                                          // if(val.other_clubbed_part_no3 !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no3'].'</td>';

                                          // }

                                          // if(val.other_clubbed_part_no4 !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no4'].'</td>';

                                          // }

                                          // if(val.other_clubbed_part_no5 !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no5'].'</td>';

                                          // }

                                          // if(val.other_clubbed_part_no6 !=''){

                                            $data.='<td class="box">'.$rs['other_clubbed_part_no6'].'</td>';

                                          // }

                                          $data.='</tr></table>';

                                          $res[5] = $data;

                                          if($rs['status'] == 1){

    $res[1] = '<a style="cursor:pointer;color:red;" onclick="reDirect('.$res[0].')">'.$res[1].'</a>';

                                          }

                                          else{

    $res[1] = '<a style="cursor:pointer;" onclick="reDirect('.$res[0].')">'.$res[1].'</a>';



                                          }

    $res[0]=(string)$start;

    $start++;

}

// print_r($result);

echo json_encode($result);