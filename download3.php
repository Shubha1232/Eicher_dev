<?php 
header("Content-type: application/vnd.ms-word");

header("Content-Disposition: attachment;Filename=customer_report.doc");

include_once("classes/Database.php");

$crud = new Database();

$id = $_GET['id'];

$query = 'SELECT * FROM catepillar_report WHERE report_id=56';

$result = $crud->getSingleRow($query);

$q = 'SELECT full_name FROM users WHERE id='.$result['checked_by'];

$rs = $crud->getSingleRow($q);

$q2 = 'SELECT full_name FROM users WHERE id='.$result['approved_by'];

$rs2 = $crud->getSingleRow($q2);

$data = json_decode($result['data'],TRUE);



echo "<html>";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";

echo "<body>";

echo "<style>table{width:100%;border-spacing: unset;} td{ border-top : 1px solid #000; border-left:1px solid #000;}</style>";

echo "<table  class='table display nowrap table-bordered table1' style='border : 1px solid #000;'>";
echo "<tr><td colspan='12' style='border-left:0px;margin-left:140px;'><img src='".$fol."/image/ve_logo.png' alt='Beoro Admin'></td></tr>";


echo "<tr><td colspan='12' style='background-color:#ccc;text-align: center; border-left: 0px;'>MATERIALS LABORATORY REPORT</td></tr>";

echo "<tr><td colspan='2'  style='border-left: 0px; border-top:0px;'>Part No:</td><td colspan='2' style='border-top: 0px;'>".$result['part_no']."</td><td colspan='2' style='border-top: 0px;' >Part Name</td><td colspan='2' style='border-top: 0px;'>".$result['part_name']."</td><td colspan='2' style='border-top: 0px;'>Date:</td><td colspan='2' style='border-top: 0px;'>".$result['date']."</td></tr>";

echo "<tr><td colspan='2' style='border-left: 0px;'>Qty</td><td colspan='2'>".$result['qty']."</td><td colspan='2'>Customer:</td><td colspan='2'>".$result['customer']."</td><td colspan='2'>Batch Code</td><td colspan='2'>".$result['batch_code']."</td></tr>";

if($result['customer'] == 'REML' || $result['customer'] == 'ETB' || $result['customer'] == 'FORCE MOTOR' || $result['customer'] == 'ZF' || $result['customer'] == 'TAFE' || $result['customer'] == 'POLARIS'){
}else{
echo "<tr><td colspan='2' style='border-left: 0px;'>HT Cycle</td><td colspan='2'>".$data['ht_cycle']."</td><td colspan='2'>Furnace ID</td><td colspan='2'>".$data['furnace_no']."</td><td colspan='2'>Qch Media/Grade:</td><td colspan='2'>".$result['grade']."</td></tr>";

echo "<tr><td colspan='2' style='border-left: 0px;'>Carb/Hard Temp:</td><td colspan='2'>".$data['carb_hard_temp']."</td><td colspan='2'>Carb/Hard %CP:</td><td colspan='2'>".$data['carb_hard_cp']."</td><td colspan='2'>Quench oil Temp:</td><td colspan='2'>".$data['quench_oil_temp']."</td></tr>";
}

echo "<tr><td colspan='12' style='background-color:#ccc;text-align: left; border-left:0px;'>1) Raw Material: SAE 12620H QL3</td></tr>";

if($result['customer'] == 'REML' || $result['customer'] == 'ETB' || $result['customer'] == 'FORCE MOTOR'){
}else{
echo "<tr><td colspan='12' style='border-left: 0px;'>1.1 Chemistry</td></tr>";
 
$element_sae_min = explode('*',$data['element_sae_min']);
echo "<tr style='text-align: center;'><td colspan='2' style='border-left:0px;'>Elements (%) -> </td><td>C</td><td>Mn</td><td>S</td>
                                    <td>P</td>
								<td>Si</td>
									<td>Ni</td>
									<td>Cr</td>
                                    <td>Mo</td>
                                   <td>V</td>
                                    <td>Al</td></tr>";

echo "<tr><td rowspan='2' style='border-left: 0px;'>SAE 12620H </td><td>Min</td>";
    for ($i=0; $i<10; $i++) {
            echo  "<td>".$element_sae_min[$i]."</td>";
           			}
"</tr>";
																	   
$element_sae_max = explode('*',$data['element_sae_max']);
echo "<tr><td>Max</td>";
	for ($i=0; $i<10; $i++) {
            echo  "<td>".$element_sae_max[$i]."</td>";
                    }
"</tr>";

$chemistry_observations = explode('*',$data['chemistry_observations']);
echo "<tr><td colspan='2' style='border-left: 0px;'>Observations </td>";
    for($i=0; $i<10; $i++) {
            echo  "<td>".$chemistry_observations[$i]."</td>";
               }
"</tr>";
if($result['customer'] == 'ZF' || $result['customer'] == 'TAFE' || $result['customer'] == 'POLARIS'){
}else{
echo "<tr><td rowspan='3' colspan='5' style='border-left: 0px;'>1.2 Inclusion Rating :<br>(Worst Field Rating)</td>
							<td rowspan='2'>Specification</td>
							<td colspan='2'>Type -></td>
							<td>A</td>
							<td>B</td>
							<td>C</td>
							<td>D</td>
							</tr>";
echo "<tr><td rowspan='2'>T/H</td>
		<td>Max</td>";
							echo "<td>".$data['inclu_rat_speci_a']."</td><td>".$data['inclu_rat_speci_b']."</td><td>".$data['inclu_rat_speci_c']."</td><td>".$data['inclu_rat_speci_d']."</td>";
							"</tr>";
echo "<tr><td>Observations</td>
							<td></td>
							<td>".$data['inclu_rat_obser_a']."</td><td>".$data['inclu_rat_obser_b']."</td><td>".$data['inclu_rat_obser_c']."</td><td>".$data['inclu_rat_obser_d']."</td>
							</tr>";
}		
				}
echo "<tr><td colspan='12' style='background-color:#ccc;text-align: left; border-left:0px;'>2) Heat Treatment: HT10T per JDV 2-Case carburised, hardened & tempered</td></tr>";							

echo "
	<tr><td colspan='6' rowspan='10' style='width:51%; border-left: 0px; border-top: 0px;'><div id='graph'></div></td>
	<td colspan='6' style='width:49%; border-top:0px;'>2.1 Hardness</td></tr>
	<tr><td colspan='2'>Location</td><td colspan='2'>Specification</td><td colspan='2'>Observations</td></tr>
	<tr><td colspan='2'>".$data['metallurgical_test_surface_hard1_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard1_requirement']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard1_observation']."</td>
	</tr>
	<tr><td colspan='2'>".$data['metallurgical_test_surface_hard2_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard2_requirement']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard2_observation']."</td>
	</tr>
	<tr><td colspan='2'>".$data['metallurgical_test_core_hardness_pcd_location']."</td>
	    <td colspan='2'>".$data['metallurgical_test_core_hardness_pcd_requirement']."</td>
		<td colspan='2'>".$data['metallurgical_test_core_hardness_pcd_observation']."</td>
	</tr>
	<tr>
	     <td colspan='6'>2.2 Effective Case Depth at 50 HRC(515 Hv)</td></tr>
		<tr><td colspan='2'>Location</td><td colspan='2'>Specification</td><td colspan='2'>Observations</td></tr>
		<tr><td colspan='2'>".$data['metallurgical_test_case_depth_pcd_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_case_depth_pcd_requirement']."</td>
	    <td colspan='2'>".$data['metallurgical_test_case_depth_pcd_observation']."</td>
	</tr>
	<tr><td colspan='2'>".$data['metallurgical_test_case_depth_location']."</td>
	   <td colspan='2'>".$data['metallurgical_test_case_depth_requirement']."</td>
	<td colspan='2'>".$data['metallurgical_test_case_depth_observation']."</td>
	</tr>
	<tr><td colspan='2'>".$data['metallurgical_test_case_depth_location1']."</td>
	<td colspan='2'>".$data['metallurgical_test_case_depth_requirement1']."</td>
	<td colspan='2'>".$data['metallurgical_test_case_depth_observation1']."</td>
								 </tr>
								";

echo "	<tr><td colspan='12' style='border-left: 0px;'>2.3 Hardness travese report</td></tr>
";


echo "<tr><td colspan='12' style='border-left: 0px;'><table class='table display nowrap table-bordered'>
    <tr><td style='border-top: 0px; border-left: 0px;'>Distance from surface in mm</td>
	<td style='border-top: 0px;'>0.1</td><td style='border-top: 0px;'>0.2</td><td style='border-top: 0px;'>0.3</td>
    <td style='border-top: 0px;'>0.4</td><td style='border-top: 0px;'>0.5</td><td style='border-top: 0px;'>0.6</td>
	<td style='border-top: 0px;'>0.7</td><td style='border-top: 0px;'>0.12</td><td style='border-top: 0px;'>0.9</td>
    <td style='border-top: 0px;'>1</td><td style='border-top: 0px;'>1.1</td><td style='border-top: 0px;'>1.2</td><td style='border-top: 0px;'>1.3</td>
	</tr>
    <tr>";
  echo   "<td style='border-left: 0px;'>PCD</td>";
  $hardness_traverse_pcd = explode('*',$data['hardness_traverse_pcd']);
	for($i=0; $i<13; $i++){
								echo "<td>".$hardness_traverse_pcd[$i]."</td>";
						 }
	echo "</tr>
	 <tr>
	<td style='border-left: 0px;'>RCD</td>";
	$hardness_traverse_rcd = explode('*',$data['hardness_traverse_rcd']);
	for($i=0; $i<13; $i++){ 
	echo "<td>".$hardness_traverse_rcd[$i]."</td>";
       } 
	echo "</tr>
	 <tr>
	<td style='border-left: 0px;'>".$data['hardness_traverse_value']."</td>";
	
	$hardness_traverse_od = explode('*',$data['hardness_traverse_od']);
	for($i=0; $i<13; $i++){ 
	echo "<td>".$hardness_traverse_od[$i]."</td>";
	} 
	echo "</tr>
	</table></td></tr>";
echo "<tr><td colspan='12' style='border-left: 0px; border-top:0px'>2.4 Microstructure: Inspect as per JDV21</td></tr>";
	echo "<tr><td colspan='12' style='border-left: 0px;'><table class='table display nowrap table-bordered'><tr><td colspan='3' style='border-left: 0px; border-top:0px;'>Microstructure Photographs</td>
    <td colspan='3' style='border-top: 0px;'>Location</td><td colspan='3' style='border-top: 0px;'>Specification</td>
	<td colspan='3' style='border-top: 0px;'>Observation</td></tr>
	<tr><td rowspan='3' colspan='3' style='height:300px;border-left: 0px;'>500x</td>
	 <td colspan='3'>".$data['micro_photo_location']."</td>
	 <td colspan='3'>".$data['micro_photo_specification']."</td>
	 <td colspan='3'>".$data['micro_photo_observation']."</td>
	</tr>
	<tr>
	<td colspan='3'>".$data['micro_photo_location2']."</td>
	<td colspan='3'>".$data['micro_photo_specification2']."</td>
	<td colspan='3'>".$data['micro_photo_observation2']."</td>
	</tr>
	<tr>
	<td colspan='3'>".$data['micro_photo_location3']."</td>
	<td colspan='3'>".$data['micro_photo_specification3']."</td>
	<td colspan='3'>".$data['micro_photo_observation3']."</td>
	 </tr>
	<tr>
	 <td rowspan='3' colspan='3' style='height:300px;border-left: 0px;'>200x</td>
	<td colspan='3'>".$data['micro_photo_itp_location']."</td>
	<td colspan='3'>".$data['micro_photo_itp_specification']."</td>
	<td colspan='3'>".$data['micro_photo_itp_observation']."</td>
	</tr>
	 <tr>
	<td colspan='3'>".$data['micro_photo_itp_location2']."</td>
	<td colspan='3'>".$data['micro_photo_itp_specification2']."</td>
	<td colspan='3'>".$data['micro_photo_itp_observation2']."</td>
	</tr>
	<tr>
	<td colspan='3'>".$data['micro_photo_itp_location3']."</td>
	<td colspan='3'>".$data['micro_photo_itp_specification3']."</td>
	<td colspan='3'>".$data['micro_photo_itp_observation3']."</td>
	</tr>
	<tr>
	<td colspan='3' style='height:300px;border-left: 0px;'>500x</td>
	 <td colspan='3'>".$data['micro_photo_location4']."</td>
	 <td colspan='3'>".$data['micro_photo_specification4']."</td>
	 <td colspan='3'>".$data['micro_photo_observation4']."</td>
	</tr>
	<tr>
	<td colspan='3' style='height:300px;border-left: 0px;' rowspan='3'>500x</td>
	 <td colspan='3' rowspan='3'>".$data['micro_photo_location5']."</td>
	<td colspan='3' rowspan='3'>".$data['micro_photo_specification5']."</td>
	<td colspan='3' rowspan='3'>".$data['micro_photo_observation5']."</td>
	</tr></table></td></tr>
	<tr><td colspan='12' style='border-left: 0px;'>
	*- In case RA is more than 25%, check Hardness(with 100 gm load) at 0.1 mm it should be 512 HRC Min.
	</td></tr>
	<tr>
	<td colspan='12' style='border-left: 0px;'>Disposition: ".$data['disposition']."</td>
	</tr>
	<tr>
	<td colspan='12' style='border-left: 0px;'>Remarks : ".$result['remark']."</td>
						
						</tr>
";
	
	
echo "</table>";
echo " <script src='js/jquery.min.js'></script>";
echo " <script src='js/highcharts.js'></script>";
echo " <script type='text/javascript'>

				var pcd=".json_encode($hardness_traverse_pcd).";
				var pcdGraph = [];
				var rcd=".json_encode($hardness_traverse_rcd).";
				var rcdGraph = [];
				var od=".json_encode($hardness_traverse_od).";
				var odGraph = [];
				 
				 $.each(pcd,function(i,val){

                    if(val == ''){

                        pcdGraph.push(null);

                    }

                    else{

                       pcdGraph.push(parseInt(val));

                    }

                    });
					$.each(rcd,function(i,val){

                    if(val == ''){

                        rcdGraph.push(null);

                    }

                    else{

                       rcdGraph.push(parseInt(val));

                    }

                    });
					$.each(od,function(i,val){

                    if(val == ''){

                        odGraph.push(null);

                    }

                    else{

                       odGraph.push(parseInt(val));

                    }

                    });
					console.log(pcd);
$('#graph').highcharts({

        title: {

            text: 'HARDNESS TRAVERSE GRAPH',

            x: -20 //center

        },

        

        xAxis: {

            title:{

               text : 'Distance in MM'

            },

            categories: ['0.1', '0.2', '0.3', '0.4', '0.5','0.6', '0.7', '0.12', '0.9', '1.0'],

               

        },
        

        yAxis: {

            title: {

                text: 'Hardness in Hv'

            },

            plotLines: [{

                value: 3,

                width: 1,

                color: '#120120120',

                zIndex: 10

            }]

        },

        

        legend: {

            layout: 'vertical',

            align: 'right',

            verticalAlign: 'middle',

            borderWidth: 0

        },

        credits: {

       enabled: false

     },

        series: [{

          connectNulls: true,

            name: 'PCD',

            data: pcdGraph

        }, {

          connectNulls: true,

            name: 'RCD',

            data: rcdGraph

        }, {

          connectNulls: true,

            name: '34',

             data: odGraph

        }]

    }); ";
	echo "</script>";

echo "</body>";

echo "</html>";
echo "</html>";