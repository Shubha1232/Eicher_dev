<?php 
header("Content-type: application/vnd.ms-word");

header("Content-Disposition: attachment;Filename=forging_clear.doc");

include_once("classes/Database.php");

$crud = new Database();

$id = $_GET['id'];

$query = 'SELECT * FROM forging_clear WHERE id='.$id;

$result = $crud->getSingleRow($query);

$q = 'SELECT * FROM forger_company WHERE id='.$result['forger_tc_supplier'];

$rs = $crud->getSingleRow($q);

$q1 = 'SELECT full_name FROM users WHERE id='.$result['check_by'];

$rs1 = $crud->getSingleRow($q1);

$q2 = 'SELECT full_name FROM users WHERE id='.$result['approve_by'];

$rs2 = $crud->getSingleRow($q2);

$q3 = 'SELECT name FROM steel_mill WHERE id='.$result['mill_tc_supplier'];

$rs3 = $crud->getSingleRow($q3);

$q4 = 'SELECT grade FROM grade WHERE id='.$result['material_grade'];

$rs4 = $crud->getSingleRow($q4);


echo "<html>";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";

echo "<body>";

echo "<style>table{width:100%;border-spacing: unset;font-size:10px;font-family: sans-serif;} td{ border-top : 1px solid #000; border-left:1px solid #000;}</style>";

$res.= "<table  class='table display nowrap table-bordered table1' style='border : 1px solid #000;'>
<tr>
        <td colspan='12' style='border-top:0px;border-left:0px;background-color:#ccc;text-align:center;font-size:18px;'>VECV FORGING CLEARANCE REPORT</td>
</tr>
<tr>
		<td colspan='4' style='border-left:0px;'>&nbsp;</td>
		<td colspan='4' style=''>PART NAME :- </td>
		<td colspan='4' style=''>BALANCE WEIGHT :-".$result['balance_weight']."</td>
	  </tr>
      <tr>
        <td colspan='4' style='border-left:0px;'><!-- CUSTOMER -->GRN NO :- ".$result['grn_no']."</td>
        <td colspan='4'>PART NO :- ".$result['part_no']."</td>
        <td colspan='4'>QUANTITY :- ".$result['quantity']."</td>
	</tr>
    <tr>
         <td colspan='4' style='border-left:0px;'>FORGER TC SUPPLIER NAME :- ".$rs['name']."</td>
         <td colspan='4'>PART WEIGHT :- ".$result['part_weight']."</td>
         <td colspan='4' >DATE :- ".$result['date']."</td>
    </tr>
    <tr>
         <td colspan='4' style='border-left:0px;'>MILL TC SUPPLIER NAME :- ".$rs3['name']."</td>
         <td colspan='4'>MATERIAL GRADE :- ".$rs4['grade']."</td>
		 <td colspan='4'>ACTUAL WEIGHT :- ".$result['weight']."</td>
    </tr>
	<tr>
        <td colspan='4' style='border-left:0px;'>STEELCODE :- ".$result['steelcode']."</td>
        <td colspan='4'>HEAT NO. :- ".$result['heat_no']."</td>
		<td colspan='4'></td>
    </tr>
	<tr>
        <td colspan='12' style='background-color:#ccc;text-align: center; border-left:0px;'>METALLURGICAL TEST RESULT</td>
    </tr>
    <tr>
        <td style='border-left:0px;' colspan='3'>LOCATION</td>
        <td colspan='2'>REQUIREMENT</td>
        <td colspan='4'>OBSERVATION</td>
        <td class='bg-color' colspan='3'>REMARK</td>
    </tr>
	<tr>
         <td style='border-left:0px;' colspan='3'>HARDNESS</td>
         <td colspan='2'>".$result['requirement']."</td>
         <td colspan='4'>".$result['observation']."</td>
         <td colspan='3'>".$result['remark_mt']."</td>
    </tr>
	<tr>
         <td style='border-left:0px;' colspan='3' rowspan='2'>MICROSTRUCTURE</td>
         <td colspan='2' rowspan='2'>".$result['micro_location']."</td>
         <td style='height:200px;width:200px;' colspan='4'><img style='width: 0px;' src='http://link4.in/eicher/img/".$result['file']."'></div>
            
		 </td>
         <td colspan='3' rowspan='2'>".$result['micro_remark']."</td>
    </tr>
	<tr>
          <td style='height:100px;width:100px;' colspan='4'> </td>
    </tr>
    <tr>
		<td style='border-left:0px;' colspan='12'>REMARK :- ".$result['remark']."</td>
	</tr>
    <tr>
                                                  <td style='border-left:0px;' colspan='4'>CHECKED BY :- ".$rs1['full_name']."</td>
                                                    <td colspan='4'>APPROVED BY :- ".$rs2['full_name']."</td>					
													<td colspan='4'>DISPOSITION :- ".$result['disposition']."</td>
                                           </tr>
                                            
</table>";
echo $res;
echo "</body>";

echo "</html>";
echo "</html>";