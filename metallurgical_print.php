<?php 
header("Content-type: application/vnd.ms-word");

header("Content-Disposition: attachment;Filename=metallurgical_report.doc");

include_once("classes/Database.php");

$crud = new Database();

/*$id = $_GET['id'];

$query = 'SELECT * FROM metallurgical_report WHERE id='.$id;

$result = $crud->getSingleRow($query);

$q = 'SELECT * FROM forger_company WHERE id='.$result['forger_tc_supplier'];

$rs = $crud->getSingleRow($q);

$q1 = 'SELECT full_name FROM users WHERE id='.$result['checked_by'];

$rs1 = $crud->getSingleRow($q1);

$q2 = 'SELECT full_name FROM users WHERE id='.$result['approved_by'];

$rs2 = $crud->getSingleRow($q2);
$q5 = 'SELECT full_name FROM users WHERE id='.$result['verified_by'];

$rs5 = $crud->getSingleRow($q5);

$q3 = 'SELECT name FROM steel_mill WHERE id='.$result['mill_tc_supplier'];

$rs3 = $crud->getSingleRow($q3);

$q4 = 'SELECT grade FROM grade WHERE id='.$result['grade'];

$rs4 = $crud->getSingleRow($q4);



$chemical_composition_min = explode('*',$result['chemical_composition_min']);
$chemical_composition_max = explode('*',$result['chemical_composition_max']);
$chemical_composition_milltc = explode('*',$result['chemical_composition_milltc']);
$chemical_composition_forgertc = explode('*',$result['chemical_composition_forgertc']);
$chemical_composition_partyremark = explode('*',$result['chemical_composition_partyremark']);
$chemical_composition = explode('*',$result['chemical_composition']);
$chemical_composition2 = explode('*',$result['chemical_composition2']);
$chemical_composition_avg = explode('*',$result['chemical_composition_avg']);
$hardness_test_milltc = explode('*',$result['hardness_test_milltc']);
$hardness_test_forgertc = explode('*',$result['hardness_test_forgertc']);
$hardness_test_vec = explode('*',$result['hardness_test_vec']);
$hardness_test = explode('*',$result['hardness_test']);
$hardness_test2 = explode('*',$result['hardness_test2']);
$hardness_test_calculatedvalue = explode('*',$result['hardness_test_calculatedvalue']);
$inclusion_rating_req_tn = explode('*', $result['inclusion_rating_req_tn']);
$inclusion_rating_req_tk = explode('*', $result['inclusion_rating_req_tk']);
$inclusion_rating_act_tn = explode('*', $result['inclusion_rating_act_tn']);
$inclusion_rating_act_tk = explode('*', $result['inclusion_rating_act_tk']);
$gas_content_req = explode('*', $result['gas_content_req']);
$gas_content_act = explode('*', $result['gas_content_act']);
$part_no = explode('*', $result['part_no']);
$jommy_requirement = explode('*', $result['jommy_requirement']);
$jommy_value = explode('*', $result['jommy_value']);
$observed = explode('*', $result['observed']);
$accept = explode('*', $result['accept']);
$remark = explode('*', $result['remark']);
$hardness_test_min_spec = explode('*', $result['hardness_test_min_spec']);
$hardness_test_max_spec = explode('*', $result['hardness_test_max_spec']);
$part_grade = explode('*',$result['part_grade']);
*/

$q = 'SELECT * FROM forger_company WHERE id='.$_POST['forger_tc_supplier'];
$rs = $crud->getSingleRow($q);
$q1 = 'SELECT full_name FROM users WHERE id='.$_POST['checked_by'];
$rs1 = $crud->getSingleRow($q1);
$q2 = 'SELECT full_name FROM users WHERE id='.$_POST['approved_by'];
$rs2 = $crud->getSingleRow($q2);
$q5 = 'SELECT full_name FROM users WHERE id='.$_POST['verified_by'];
$rs5 = $crud->getSingleRow($q5);
$q3 = 'SELECT name FROM steel_mill WHERE id='.$_POST['mill_tc_supplier'];
$rs3 = $crud->getSingleRow($q3);
$q4 = 'SELECT grade FROM grade WHERE id='.$_POST['grade'];
$rs4 = $crud->getSingleRow($q4);


$chemical_composition_min = $_POST['chemical_composition_min'];
$chemical_composition_max = $_POST['chemical_composition_max'];
$chemical_composition_milltc =$_POST['chemical_composition_milltc'];
$chemical_composition_forgertc = $_POST['chemical_composition_forgertc'];
$chemical_composition_partyremark = $_POST['chemical_composition_partyremark'];
$chemical_composition = $_POST['chemical_composition'];
$chemical_composition2 = $_POST['chemical_composition2'];
$chemical_composition_avg = $_POST['chemical_composition_avg'];
$hardness_test_milltc = $_POST['hardness_test_milltc'];
$hardness_test_forgertc = $_POST['hardness_test_forgertc'];
$hardness_test_vec = $_POST['hardness_test_vec'];
$hardness_test = $_POST['hardness_test'];
$hardness_test2 = $_POST['hardness_test2'];
$hardness_test_calculatedvalue = $_POST['hardness_test_calculatedvalue'];
$inclusion_rating_req_tn = $_POST['inclusion_rating_req_tn'];
$inclusion_rating_req_tk = $_POST['inclusion_rating_req_tk'];
$inclusion_rating_act_tn = $_POST['inclusion_rating_act_tn'];
$inclusion_rating_act_tk = $_POST['inclusion_rating_act_tk'];
$gas_content_req = $_POST['gas_content_req'];
$gas_content_act = $_POST['gas_content_act'];
$part_no = $_POST['part_no'];
/*
$jommy_requirement = $_POST['jommy_requirement'];
$jommy_value = $_POST['jommy_value'];
*/
$jommy_requirement = '';
$jommy_value = '';
$observed =  $_POST['observed'];
$accept = $_POST['accept'];
$remark = $_POST['remark'];
$hardness_test_min_spec = $_POST['hardness_test_min_spec'];
$hardness_test_max_spec = $_POST['hardness_test_max_spec'];
$part_grade = $_POST['part_grade'];

echo "<html>";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";

echo "<body>";

echo "<style>table{width:100%;border-spacing: unset;font-size:8px;font-family: sans-serif;} td{ border-top : 1px solid #000; border-left:1px solid #000;}</style>";

echo"<table  class='table display nowrap table-bordered table1' style='border : 1px solid #000;'>
     <tr><td colspan='22' style='border-left:0px;border-top:0px;margin-left:140px;'><img src='".$fol."/image/ve_logo.png' alt='Beoro Admin'></td></tr>
     <tr><td colspan='22' style='border-left:0px;background-color:#ccc;text-align: center;'>RAW MATERIAL LAB TEST REPORT</td>
     </tr>
    <tr>
		<td colspan='15' style='border-left:0px;border-top: 0px;'></td><td colspan='3' style='border-top: 0px;'>Format No.</td><td colspan='4' style='border-top: 0px;'>AP04:460:RMTR</td>
    </tr>
   <tr>
		<td colspan='3' style='border-left: 0px;'>MILL TC SUPPLIER NAME</td><td colspan='4'>".$rs3['name']."</td>
		<td colspan='4'>HEAT NO.</td><td colspan='4'>".$_POST['heat_no']."</td>
		<td colspan='3'>REPORT NO.</td><td colspan='4'>".$_POST['report_no']."</td>
    </tr>
    <tr>
        <td colspan='3' style='border-left: 0px;'>FORGER TC SUPPLIER NAME</td>
        <td colspan='4' >".$rs['name']."</td>
        <td colspan='4' >MATERIAL GRADE</td>
        <td colspan='4' >".$rs4['grade']."</td>
        <td colspan='3' >DATE</td>
        <td colspan='4' >".$_POST['date']."</td>
    </tr>
    <tr>
		<td colspan='3' style='border-left: 0px;'>CONDITION</td>
		<td colspan='4' >".$_POST['condition']."</td>
		<td colspan='4' >STEEL CODE</td>
		<td colspan='4' >".$_POST['steel_code']."</td>
		<td colspan='3' >WEIGHT</td>
        <td colspan='4' >".$_POST['weight']."</td>
    </tr>
    <tr>
      <td colspan='3' style='border-left: 0px;'>BLOOM SIZE</td>
        <td colspan='4' >".$_POST['bloom_size']."  , ".$_POST['bloom_size2']."</td>
		<td colspan='4' >SECTION SIZE MM/RCS</td> 
		<td colspan='4' >".$_POST['section']."</td>
        <td colspan='3' >SECTION SIZE DIA</td> 
		<td colspan='4' >".$_POST['reduction_ratio']."</td>
    </tr>
    <tr>
        <!--<td colspan='2' style='border-left: 0px;'>PROCESS ROUTE</td>
		<td colspan='2' >".$_POST['process_route']."</td> -->
        <td colspan='3' style='border-left: 0px;'>RE. RATIO AS PER MILL TC</td>
        <td colspan='4' >".$_POST['rr_tc']."</td>     
		<td colspan='4' >RE. RATIO AS PER CALCULATOR</td>        
		<td colspan='4' >".$_POST['rr_for_tc']."</td>    
		<td colspan='3'></td><td colspan='4'></td>
	</tr>
	<tr align='center'><td colspan='22' style='border-left:0px;'>% CHEMICAL COMPOSTION</td></tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>PARAMETER</td>
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
        <td>".$_POST['parameter1']."</td>
        <td>".$_POST['parameter2']."</td>
        <td>".$_POST['parameter3']."</td>
        <td>".$_POST['parameter4']."</td>
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>MIN SPEC</td>
        ";

            for($i=0; $i<18; $i++) {
                echo  "<td>".$chemical_composition_min[$i]."</td>";
            }
 
        echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>MAX SPEC</td>
       ";
  
            for($i=0; $i<18; $i++) {
                echo  "<td>".$chemical_composition_max[$i]."</td>";
             }
  
		echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>MILL TC VALUE</td>
        ";
 
                for($i=0; $i<18; $i++) {
                  echo  "<td>".$chemical_composition_milltc[$i]."</td>";
                }
   
        echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>FORGER TC VALUE</td>
		";

                for($i=0; $i<18; $i++) {
                   echo "<td>".$chemical_composition_forgertc[$i]."</td>";
                }
      
        echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>THIRD PARTY VALUE</td>
   ";
		for($i=0; $i<18; $i++) {
                   echo "<td>".$chemical_composition_partyremark[$i]."</td>";
                }
       echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>".$_POST['chenical_composition_value1']."</td>
      ";
                for($i=0; $i<18; $i++) {
                   echo "<td>".$chemical_composition[$i]."</td>";
                }
      echo "
    </tr>
    <tr align='center'>
        <td colspan='4' style='border-left: 0px;'>".$_POST['chenical_composition_value2']."</td>
		";
           for($i=0; $i<18; $i++) {
                    echo "<td>".$chemical_composition2[$i]."</td>";
                }
      echo "
    </tr>
    <tr>
        <td colspan='22' style='text-align:center; border-left:0px;'>JOMINY HARDENABILITY BAND (IS : 3848)</td>
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>DISTANCE (in inches)</td>
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
        <td>18/16''</td>
        <td>18/16''</td>
        <td>19/16''</td>
        <td>20/16''</td>
     </tr>
     <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>DISTANCE (in mm)</td>
        <td>1.59</td>
        <td>3.175</td>
        <td>4.77</td>
        <td>6.35</td>
        <td>7.94</td>
        <td>9.525</td>
        <td>11.1125</td>
        <td>12.7</td>
        <td>14.29</td>
        <td>15.875</td>
        <td>17.47</td>
        <td>19.05</td>
        <td>20.64</td>
        <td>22.225</td>
        <td>23.82</td>
        <td>25.4</td>
        <td>26.99</td>
        <td>28.58</td>
        <td>30.17</td>
        <td>31.75</td>
     </tr>
     <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>MIN SPEC</td>";
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_min_spec[$i]."</td>";
                }
     echo "                                                             
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>MAX SPEC</td>";
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_max_spec[$i]."</td>";
                }
             echo "</tr>
     <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>MILL TC VALUE</td>";
        
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_milltc[$i]."</td>";
                }
        
      echo "
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>FORGER TC VALUE</td>";
     
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_forgertc[$i]."</td>";
                }
      
     echo "
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>VECV VALUE</td>";
      
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_vec[$i]."</td>";
                }
    
     echo "</tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>".$_POST['jominy_value2']."</td>";
			for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test[$i]."</td>";
                }
     echo "
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>".$_POST['jominy_value2']."</td>";
		
                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test2[$i]."</td>";
                }
    echo "
    </tr>
   <tr align='center'>
       <td colspan='2' style='border-left: 0px;'>CALCULATED VALUE</td>";

                for($i=0; $i<20; $i++) {
                    echo "<td>".$hardness_test_calculatedvalue[$i]."</td>";
                }
 
    echo "</tr>

    <tr >
        <td colspan='16' style='text-align:center;border-left:0px;'>METALLOGRAPHIC CHARACTERSITICS</td>
        <td colspan='6' style='text-align:center;'>GAS CONTENT(PPM)</td>
    </tr>
    <tr align='center'>
        <td colspan='6' style='border-left:0px;'>INCLUSION RATING IS:4163</td>
        <td colspan='3'>GRAIN SIZE IS:4748</td>
		<td colspan='2'>MPI</td>
		<td colspan='2'>UT</td>
		<td colspan='3'>Radio active ELement</td>
        <td colspan='2'>GAS</td>
        <td colspan='2'>REQ</td>
        <td colspan='2'>ACT</td>
    </tr>
    <tr align='center'>
		<td colspan='2' style='border-left: 0px;'></td>
        <td colspan='4' style='text-align: center;'>ACT</td>
        <td rowspan='2' colspan='3' style='text-align: center;'></td>
		<td colspan='2' rowspan='2'></td>
		<td colspan='2' rowspan='2'></td>
		<td colspan='3' rowspan='2'>ACT</td>
        <td colspan='2'>O2</td>
        <td colspan='2'>".$gas_content_req[0]."</td>
        <td colspan='2'>".$gas_content_act[0]."</td>
    </tr>
    <tr align='center'>
		<td colspan='2' style='border-left: 0px;'></td>
        <td colspan='2'>Tn</td>
        <td colspan='2'>Tk</td>
        <td colspan='2'>N2</td>
        <td colspan='2'>".$gas_content_req[1]."</td>
        <td colspan='2'>".$gas_content_act[1]."</td>
    </tr>
    <tr align='center'>
		<td colspan='2' style='border-left: 0px;'>A</td>
        <td colspan='2'>".$inclusion_rating_act_tn[0]."</td>
        <td colspan='2'>".$inclusion_rating_act_tk[0]."</td>
        <td rowspan='4' colspan='3' style='text-align: center;'>".$_POST['grain_size_act']."</td>
		
		<td colspan='2' rowspan='4'>".$_POST['mip_act']."</td>
		<td colspan='2' rowspan='4'>".$_POST['ut_act']."</td>
		<td colspan='3' rowspan='4'>".$_POST['radio_active_eLement_act']."</td>
		<td colspan='2'>H2</td>
        <td colspan='2'>".$gas_content_req[2]."</td>
        <td colspan='2'>".$gas_content_act[2]."</td>
    </tr>
    <tr align='center'>
		<td colspan='2' style='border-left: 0px;'>B</td>
        <td colspan='2'>".$inclusion_rating_act_tn[1]."</td>
        <td colspan='2'>".$inclusion_rating_act_tk[1]."</td>
		<td colspan='6'></td>
    </tr>
    <tr align='center'>
        <td colspan='2' style='border-left: 0px;'>C</td>
        <td colspan='2'>".$inclusion_rating_act_tn[2]."</td>
        <td colspan='2'>".$inclusion_rating_act_tk[2]."</td>
		<td colspan='6'></td>
    </tr>
    <tr align='center'>
		<td colspan='2' style='border-left: 0px;'>D</td>
        <td colspan='2'>".$inclusion_rating_act_tn[3]."</td>
        <td colspan='2'>".$inclusion_rating_act_tk[3]."</td>
		<td colspan='6'></td>
     </tr>   
    <tr align='center'>
		<td colspan='4' style='border-left: 0px;'>PART NO.</td>
		<td colspan='4' >OBSERVATION</td>
		<td colspan='4' >MATERIAL GRADE</td>
		<td colspan='4' >ACCEPTED/REJECTED</td>
        <td colspan='6'>REMARK</td>
    </tr>";
    /*for($i=0; $i<=14; $i++){ 
  echo "<tr>
		<td colspan='2' style='border-left: 0px;'>".$part_no[$i]."</td>
        <td colspan='2' >".$observed[$i]."</td>
		<td colspan='2' >";
		$u = 'SELECT * FROM grade';
        $lt = $crud->getAllData($u);
        foreach ($lt as $key => $value) {
			if($value['id']== $part_grade[$i]){
			echo $value['grade'];}
	
		}
		echo "</td><td colspan='2' >";
		if($accept[$i]=="ACCEPTED"){ 
		echo "ACCEPTED";
		}if($accept[$i]=='REJECTED'){ 
		echo "REJECTED";}
		if($accept[$i]=='ACCEPT UNDER DEVIATION'){
		echo "ACCEPT UNDER DEVIATION";}
		echo "</td>
        <td colspan='4' >".$remark[$i]."</td>
    </tr>";
   }*/
   	$i=0;
   foreach($part_no as $part_value){
	if($part_value!=''){
		
		echo "<tr align='center'>
		<td colspan='4' style='border-left: 0px;'>".$part_no[$i]."</td>
        <td colspan='4' >".$observed[$i]."</td>
		<td colspan='4' >";
		$u = 'SELECT * FROM grade';
        $lt = $crud->getAllData($u);
        foreach ($lt as $key => $value) {
			if($value['id']== $part_grade[$i]){
			echo $value['grade'];}
	
		}
		echo "</td><td colspan='4' >";
		if($accept[$i]=="ACCEPTED"){ 
		echo "ACCEPTED";
		}if($accept[$i]=='REJECTED'){ 
		echo "REJECTED";}
		if($accept[$i]=='ACCEPT UNDER DEVIATION'){
		echo "ACCEPT UNDER DEVIATION";}
		echo "</td>
		
        <td colspan='6' >".$remark[$i]."</td>
    </tr>";	
	}
	$i++;
}
    echo "<tr align='center'>
        <td colspan='3' style='border-left: 0px;'>CHECKED BY:-</td>
        <td colspan='4' style='border-left: 0px;'>".$rs1['full_name']."</td>
		<td colspan='4' >VERIFIED BY:-</td>
        <td colspan='4'  style='border-left:0px;'>".$rs5['full_name']."</td>
        <td colspan='3' >APPROVED BY:-</td>
        <td colspan='4' style='border-left:0px;'>".$rs2['full_name']."</td>
    </tr>
</table>";
echo "</body>";

echo "</html>";
echo "</html>";