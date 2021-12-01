<?php 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=customer_report.doc");
include_once("classes/Database.php");
$crud = new Database();
$id = $_GET['id'];
$query = 'SELECT * FROM catepillar_report WHERE id='.$id;
$result = $crud->getSingleRow($query);
$q = 'SELECT full_name FROM users WHERE id='.$result['checked_by'];
$rs = $crud->getSingleRow($q);
$q2 = 'SELECT full_name FROM users WHERE id='.$result['approved_by'];
$rs2 = $crud->getSingleRow($q2);
$data = json_decode($result['data'],TRUE);
$q3  = 'SELECT full_name FROM users WHERE id='.$result['verified_by'];
$rs3 = $crud->getSingleRow($q3);
echo "<html>";
echo "";
echo "<body>";
echo "<style>table{width:100%;border-spacing: unset;font-size:8px;font-family: sans-serif;} 
td{ border-top : 1px solid #000; border-left:1px solid #000;}</style>";
echo "<table  class='table display nowrap table-bordered table1' style='border : 1px solid #000;'>";
echo "<tr><td colspan='12' style='border-left:0px;margin-left:140px;'><img src='".$fol."/image/ve_logo.png' alt='Beoro Admin'></td></tr>";
echo "<tr><td colspan='4' style='border-left:0px;border-top:0px;'><!--
<img src='".$fol."/image/jd.png'> --> </td> 
<td colspan='6' style='text-align:left;font-size:8px; border-top: 0px; border-left:0px;'></td>
<td colspan='2' style='border-left:0px;border-top:0px;'>Format No:- AP04:460:10J</td></tr>";
echo "<tr><td colspan='12' style='border-left:0px;text-align:center;'>METALLURGICAL TEST REPORT</td></tr>";
echo "<tr><td colspan='12' style='border-left:0px;'>Report No:-  ".$result['report_no']."</td></tr>";
echo "<tr><td colspan='2'  style='border-left: 0px;'>Part No/Part ID:</td>
<td colspan='2' style='border-left: 0px;'>".$result['part_no']." / ".$result['control_plan_id']."</td>
<td colspan='2'>Part Name</td><td colspan='2' style='border-left: 0px;'>".$result['part_name']."</td>
<td colspan='2' >Date:</td><td colspan='2' style='border-left: 0px;'>".$result['date']."</td></tr>";

echo "<tr><td colspan='2' style='border-left: 0px;'>Qty</td><td colspan='2' style='border-left: 0px;'>".$result['qty']."</td>
<td colspan='2'>Customer:</td><td colspan='2' style='border-left: 0px;'>".$result['customer']."</td>
<td colspan='2'>Batch Code</td><td colspan='2' style='border-left: 0px;'>".$result['batch_code']."</td></tr>";

echo "<tr>
<td colspan='2' style='border-left: 0px;'>Furnace ID</td><td colspan='2' style='border-left: 0px;'>".$data['furnace_no']."</td>
<td colspan='2'>Quench Media/Grade:</td><td colspan='2' style='border-left: 0px;'>".$data['qch_grade']."</td>";
// <td colspan='2' style='border-left: 0px;'>Carb/Diff Time:</td><td colspan='2' style='border-left: 0px;'>".$data['curbeizing_time']."/".$data['diffusion_time']." &#032; min</td>
echo "<td colspan='4'></td></tr>";

// echo "<tr><td colspan='2' style='border-left: 0px;'>Carb/Hard Temp:</td>
// <td colspan='2' style='border-left: 0px;'>".$data['curbeizing_temp']."/".$data['hardening_temp']."  &#032; &#8451;</td>
// <td colspan='2'>Carb/Hard %CP:</td><td colspan='2' style='border-left: 0px;'>".$data['curbeizing_cp']."/".$data['hardening_cp']."</td>
// <td colspan='2'>Quench oil Temp:</td><td colspan='2' style='border-left: 0px;'>".$data['quench_oil_temp']." &#032; &#8451;</td></tr>";

// echo "<tr><td colspan='2' style='border-left: 0px;'>Tempering Temp:</td>
// <td colspan='2' style='border-left: 0px;'>".$data['temper_temp']." &#032; &#8451;</td>
// <td colspan='2'>Tempering Time:</td><td colspan='2' style='border-left: 0px;'>".$data['temper_time']."  &#032; min</td>
// <td colspan='2'></td><td colspan='2' style='border-left: 0px;'></td></tr>";
echo '
<tr>
<td colspan="12" style="border-left: 0px;"><table style="border-collapse: collapse;border: 1px solid black;" class="table display nowrap table-bordered">

				<tr class="bg-color">
                                                         <th colspan="14" style="background-color:#ccc;text-align: center;">PROCESS PARMETERS</th>

                                                    
                                                     </tr>
                                                     <tr class="bg-color">
                                                         <th colspan="2">PARAMETRS</th>

                                                    <th colspan="2">CARBURIZING</th>

                                                    <th colspan="2">DIFFUSION 1/2</th>

                                                    <th colspan="2">HARDENING</th>

                                                    <th colspan="2">QUENCH OIL</th>

                                                    <th colspan="2">TEMPERING</th>
                                                    <th colspan="2">REMARK</th>
                                                    <!--<th>CHARGE IN TIME</th>

                                                    <th >CHARGE OUT TIME</th>-->
                                                     </tr>
													  <tr>

                                                    <td colspan="2"></td>

                                                    <td colspan="1">SET</td><td colspan="1">ACTUAL</td>
                                                    <td colspan="1">SET</td><td colspan="1">ACTUAL</td>
                                                    <td colspan="1">SET</td><td colspan="1">ACTUAL</td>
                                                    <td colspan="1">SET</td><td colspan="1">ACTUAL</td>
                                                    <td colspan="1">SET</td><td colspan="1">ACTUAL</td>
                                                   <td colspan="2"></td>
</tr>
                                                      <tr>

                                                    <td colspan="2">TEMP(¡ÆC)</td>

                                                    <td colspan="1">'.$data['curbeizing_temp'].'</td><td colspan="1">'.$data['curbeizing_temp1'].'</td>
                                                    <td colspan="1">'.$data['diffusion_temp'].'</td><td colspan="1">'.$data['diffusion_temp1'].'</td>
                                                    <td colspan="1">'.$data['hardening_temp'].'</td><td colspan="1">'.$data['hardening_temp1'].'</td>
                                                    <td colspan="1">'.$data['quench_oil_temp'].'</td><td colspan="1">'.$data['quench_oil_temp1'].'</td>
                                                    <td colspan="1">'.$data['temp_tempering'].'</td><td colspan="1">'.$data['temp_tempering1'].'</td>
                                                   <td rowspan="3" colspan="2">'.$data['process_remark'].'</td>
</tr>
                         

                                               <tr>

                                                    <td colspan="2">TIME1(Minute)</td>
                                                    <td colspan="1">'.$data['curbeizing_time'].'</td><td colspan="1">'.$data['curbeizing_time1'].'</td>
                                                    <td colspan="1">'.$data['diffusion_time'].'</td><td colspan="1">'.$data['diffusion_time1'].'</td>
                                                    <td colspan="1">'.$data['hardening_time'].'</td><td colspan="1">'.$data['hardening_time1'].'</td>
                                                    <td colspan="2"></td>
                                                    <td colspan="1">'.$data['time_tempering'].'</td><td colspan="1">'.$data['time_tempering1'].'</td>
													

                                                </tr>
                        
                        

                                                <tr>

                                                    <td colspan="2">C.P.</td>
                                                    <td colspan="1">'.$data['curbeizing_cp'].'</td><td colspan="1">'.$data['curbeizing_cp1'].'</td>
                                                    <td colspan="1">'.$data['diffusion_cp'].'</td><td colspan="1">'.$data['diffusion_cp1'].'</td>
                                                    <td colspan="1">'.$data['hardening_cp'].'</td><td colspan="1">'.$data['hardening_cp1'].'</td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2"></td>

                                                </tr>
                         

                       </table>
		</td>
	</tr>

';
echo "<tr><td colspan='8' style='background-color:#ccc;text-align: left; border-left:0px;'>";
echo "1) Raw Material: ".$result['grade']."</td><td colspan='4' style='background-color:#ccc;text-align: left; border-left:0px;'>";
echo "Steel Code: ".$data['steel_code']."</td></tr>";

echo "<tr><td colspan='12' style='border-left: 0px;'>1.1 Chemistry</td></tr>";
 
$chemical_composition_min = explode('*',$data['chemical_composition_min']);
echo "<tr><td colspan='12' style='border-left: 0px;'><table style='border-collapse: collapse;border: 1px solid black;' class='table display nowrap table-bordered'>"; 
echo "<tr style='text-align: center;'><td colspan='2' >Elements (%) <span style='font-size:20px;'>&#8594;</span></td><td>C</td><td>Mn</td><td>S</td>
                                    <td>P</td>
								<td>Si</td>
									<td>Ni</td>
									<td>Cr</td>
                                    <td>Mo</td>
                                   <td>V</td>
                                    <td>Al</td><td>B</td>
                                    <td>Cu</td></tr>";

echo "<tr style='text-align: center;'><td rowspan='2'>";
echo"</td><td>Min</td>";
    for ($i=0; $i<12; $i++) {
            echo  "<td>".$chemical_composition_min[$i]."</td>";
           			}
"</tr>";
																	   
$chemical_composition_max = explode('*',$data['chemical_composition_max']);
echo "<tr style='text-align: center;'><td>Max</td>";
	for ($i=0; $i<12; $i++) {
            echo  "<td style='width: 50px;'>".$chemical_composition_max[$i]."</td>";
                    }
"</tr>";

$chemical_composition_milltc = explode('*',$data['chemical_composition_milltc']);
echo "<tr style='text-align: center;'><td colspan='2' >Observations </td>";
    for($i=0; $i<12; $i++) {
            echo  "<td>".$chemical_composition_milltc[$i]."</td>";
               }
"</tr>";
if($result['customer'] == 'ZF' || $result['customer'] == 'TAFE' || $result['customer'] == 'POLARIS' || $result['customer'] == 'CNH' || $result['customer'] == 'VOLVO'){
}else{
echo "<tr style='text-align: center;'><td rowspan='3' colspan='6' style='text-align: left;'>1.2 Inclusion Rating :<br>(Worst Field Rating)</td>
							<td rowspan='2' colspan='2'>Specification</td>
							<td colspan='2'>Type <span style='font-size:20px;'>&#8594;</span></td>
							<td>A</td>
							<td>B</td>
							<td>C</td>
							<td>D</td>
							</tr>";
$inclu = explode('*',$data['inclu']);
echo "<tr style='text-align: center;'><td rowspan='2'>T/H</td>
		<td>Max</td>
		<td>3/2</td>
		<td>3/2</td>
		<td>1/1</td>
		<td>2/1.5</td>";
							
						echo 	"</tr>";
echo "<tr style='text-align: center;'><td colspan='2'>Observations</td>
							<td></td>";
							for ($i=0; $i<4; $i++) {
            echo  "<td>".$inclu[$i]."</td>";
                    }
						echo 	"</tr></table></td></tr>";
}		
				

echo "<tr><td colspan='12' style='background-color:#ccc;text-align: left; border-left:0px;'>2) Heat Treatment: JDV2 HT10T per JDV 21-Case carburised, hardened & tempered</td></tr>";		

echo "
	<tr><td colspan='6' rowspan='10' style='width:500px;   border-left: 0px; border-top: 0px;'><div><img style='width: 300px;' src='".$fol."/image/".$result['image_graph']."' /></div></td>
	<td colspan='6' style='width:49%; border-top:0px;'>2.1 Hardness</td></tr>
	<tr style='text-align: center;'><td colspan='2'>Location</td><td colspan='2'>Specification</td><td colspan='2'>Observations</td></tr>
	<tr style='text-align: center;'><td colspan='2'>".$data['metallurgical_test_surface_hard1_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard1_requirement']."</td>
		<td colspan='2'>".$data['metallurgical_test_surface_hard1_observation']."</td>
	</tr>
	<tr style='text-align: center;'><td colspan='2'>".$data['metallurgical_test_core_hardness_rcd_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_core_hardness_rcd_requirement']."</td>
		<td colspan='2'>".$data['metallurgical_test_core_hardness_rcd_observation']."</td>
	</tr>
	<tr style='text-align: center;'><td colspan='2'>".$data['surface_hardness_location_after_grind']."</td>
	<td colspan='2'>".$data['surface_hardness_requirement_after_grind']."</td>
	<td colspan='2'>".$data['remark_observe3']."</td>
								 </tr>";
	

echo "<tr><td colspan='6'>2.2 Effective Case Depth at ".$data['cut_off_point']."</td></tr>";


								 
echo "<tr style='text-align: center;'><td colspan='2'>Location</td><td colspan='2'>Specification(mm)</td><td colspan='2'>Observations(mm)</td></tr>
		<tr style='text-align: center;'><td colspan='2'>".$data['metallurgical_test_case_depth_pcd_location']."</td>
		<td colspan='2'>".$data['metallurgical_test_case_depth_pcd_requirement']."</td>
	    <td colspan='2'>".$data['metallurgical_test_case_depth_pcd_observation']."</td>
	</tr>
	<tr style='text-align: center;'><td colspan='2'>".$data['metallurgical_test_case_depth_location']."</td>
	   <td colspan='2'>".$data['metallurgical_test_case_depth_requirement']."</td>
	<td colspan='2'>".$data['metallurgical_test_case_depth_observation']."</td>
	</tr>
	<tr style='text-align: center;'><td colspan='2'>".$data['eff_after_grinding_location1']."</td>
	    <td colspan='2'>".$data['eff_after_grinding_requirement1']."</td>
		<td colspan='2'>".$data['remark_observe1']."</td>
	</tr>
								";

echo "	<tr><td colspan='12' style='border-left: 0px;'>2.3 Hardness travese in Hv (Distance from surface)</td></tr>
";


echo "<tr><td colspan='12' style='border-left: 0px;'><table class='table display nowrap table-bordered'>
    <tr style='text-align: center;'><td style='border-top: 0px; border-left:0px; text-align: left;'>in mm <span style='font-size:20px;'>&#8594;</span></td>
	<td style='border-top: 0px;'>0.1</td><td style='border-top: 0px;'>0.2</td><td style='border-top: 0px;'>0.3</td>
    <td style='border-top: 0px;'>0.4</td><td style='border-top: 0px;'>0.5</td><td style='border-top: 0px;'>0.6</td>
	<td style='border-top: 0px;'>0.7</td><td style='border-top: 0px;'>0.8</td><td style='border-top: 0px;'>0.9</td>
    <td style='border-top: 0px;'>1</td><td style='border-top: 0px;'>1.1</td><td style='border-top: 0px;'>1.2</td><td style='border-top: 0px;'>1.3</td><td style='border-top: 0px;'>1.4</td><td style='border-top: 0px;'>1.5</td><td style='border-top: 0px;'>1.6</td><td style='border-top: 0px;'>1.7</td><td style='border-top: 0px;'>1.8</td><td style='border-top: 0px;'>1.9</td><td style='border-top: 0px;'>2.0</td>
	</tr>
    <tr>";
  echo   "<td style='border-left: 0px;'>PCD</td>";
  $hardness_traverse_pcd = explode('*',$data['hardness_traverse_pcd']);
	for($i=1; $i<21; $i++){
								echo "<td style='text-align: center;'>".$hardness_traverse_pcd[$i]."</td>";
						 }
	echo "</tr>
	 <tr>
	<td style='border-left: 0px;'>RCD</td>";
	$hardness_traverse_rcd = explode('*',$data['hardness_traverse_rcd']);
	for($i=1; $i<21; $i++){ 
	echo "<td style='text-align: center;'>".$hardness_traverse_rcd[$i]."</td>";
       } 
	echo "</tr>
	 <tr>
	<td style='border-left: 0px;'>".$data['hardness_traverse_value']."</td>";
	
	$hardness_traverse_od = explode('*',$data['hardness_traverse_od']);
	for($i=1; $i<21; $i++){ 
	echo "<td style='text-align: center;'>".$hardness_traverse_od[$i]."</td>";
	} 
	echo "</tr>
	</table></td></tr>";
echo "<tr><td colspan='12' style='border-left: 0px;'>2.4 Microstructure: Inspect as per JDV21</td></tr>";

		echo "<tr><td colspan='12' style='border-left: 0px;'><table class='table display nowrap table-bordered'><tr><td colspan='3' style='border-left: 0px; text-align: center; border-top:0px;'>Microstructure Photographs</td>
    <td colspan='3' style='border-top: 0px; text-align: center;'>Location</td><td colspan='3' style='border-top: 0px; text-align: center;'>Specification</td>
	<td colspan='3' style='border-top: 0px; text-align: center;'>Observation</td></tr>
	<tr><td rowspan='3' colspan='3' style='height:300px;border-left: 0px;text-align: center;'>500x</td>
	 <td colspan='3' style='text-align: center;'>".$data['micro_photo_location']."</td>
	 <td colspan='3' style='text-align: center;'>".$data['micro_photo_specification']."</td>
	 <td colspan='3' style='text-align: center;'>".$data['micro_photo_observation']."</td>
	</tr>
	<tr>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_micro_case_location']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_micro_case_requirement']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_micro_case_observation']."</td>
	</tr>
	<tr>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_location3']."</td>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_specification3']."</td>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_observation3']."</td>
	 </tr>	 
     <tr>
	 <td rowspan='3' colspan='3' style='height:300px;border-left: 0px; text-align: center;'>100x</td>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_itp_location']."</td>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_itp_specification']."</td>
	<td colspan='3' style='text-align: center;'>".$data['micro_photo_itp_observation']."</td>
	</tr>
	 <tr>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_pcd_location']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_pcd_requirement']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_pcd_observation']."</td>
	</tr>
	<tr>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_rcd_location']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_rcd_requirement']."</td>
	<td colspan='3' style='text-align: center;'>".$data['metallurgical_test_itp_sub_surface_rcd_observation']."</td>
	</tr>
   <tr>
	<td colspan='3' style='border-left: 0px;text-align: center;'>500x</td>
	 <td colspan='3' style='text-align: center;'>".$data['metallurgical_test_gbo_igo_rcd_location']."</td>
	 <td colspan='3' style='text-align: center;'>".$data['metallurgical_test_gbo_igo_rcd_requirement']."</td>
	 <td colspan='3' style='text-align: center;'>".$data['metallurgical_test_gbo_igo_rcd_observation']."</td>
	</tr>
	<tr>
	<td colspan='3' style='border-left: 0px; text-align: center;' >500x</td>
	 <td colspan='3' style='text-align: center;' >".$data['metallurgical_test_micro_core_location']."</td>
	<td colspan='3' style='text-align: center;' >".$data['metallurgical_test_micro_core_requirement']."</td>
	<td colspan='3' style='text-align: center;' >".$data['metallurgical_test_micro_core_observation']."</td>
	</tr>
	<tr>
	<td colspan='3' style='border-left: 0px; text-align: center;'>Magnetic Particle Inspection</td>
	 <td colspan='3' style='text-align: center;' >".$data['mag_loc']."</td>
	<td colspan='3' style='text-align: center;' >".$data['mag_spec']."</td>
	<td colspan='3' style='text-align: center;' >".$data['mag_obser']."</td>
	</tr>
	</table></td></tr>";
	
	echo"
	<tr><td colspan='12' style='border-left: 0px;'>
	*- In case RA is more than 25%, check Hardness(with 100 gm load) at 0.1 mm it should be 58 HRC Min.
	</td></tr>";

	echo"<tr>
	<td colspan='12' style='border-left: 0px;'>Disposition: ".$data['disposition']."</td>
	</tr>
	<tr>
	<td colspan='12' style='border-left: 0px;'>Remarks : ".$result['remark']."</td>
						
						</tr>
					<tr><td style='border-left: 0px;'>Checked by :-</td><td colspan='3'>".$rs['full_name']."</td><td>Prepared by : -</td><td colspan='3'>".$rs3['full_name']."</td><td>Approved by :-</td><td colspan='3'>".$rs2['full_name']."</td></tr>
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
		
graph.onload = function() {
        save_chart($('#graph').highcharts(), 'chart');
    }
    }); ";
	echo "</script>";

echo "</body>";

echo "</html>";
echo "</html>";