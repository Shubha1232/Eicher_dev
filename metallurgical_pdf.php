<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).

require_once('tcpdf_include.php');
require_once("./classes/Database.php");
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'ve_logo.png';
        $this->Image($image_file, 50, 10, 100, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set fon
        // $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();
$pdf->setJPEGQuality(75);
// $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);
$crud = new Database();
/*
$id = $_GET['id'];
$query = 'SELECT * FROM metallurgical_report WHERE id='.$id;
$result = $crud->getSingleRow($query);
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
/*
$data = json_decode($_POST['data'],TRUE);

$data = str_replace('<', '&lt;', $data);
*/
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
// -----------------------------------------------------------------------------
$content .='<table cellspacing="0" cellpadding="1" border="1">';
$content.='<tr style="background-color: #006dcc;"><th colspan="22" align="center">RAW MATERIAL LAB TEST REPORT</th></tr>';
$content.= '<tr><th colspan="15"></th><th colspan="3">Format No.</th><th colspan="4">AP04:460:RMTR</th></tr>';
$content.= '<tr><th colspan="3">MILL TC SUPPLIER NAME:</th><th colspan="4">'.$rs3['name'].'</th><th colspan="4">HEAT NO:</th><th colspan="4">'.$_POST['heat_no'].'</th><th colspan="3">REPORT NO:</th><th colspan="4">'.$_POST['report_no'].'</th></tr>';
$content.='<tr><td colspan="3">FORGER TC SUPPLIER NAME:</td><td colspan="4">'.$rs['name'].'</td><td colspan="4">MATERIAL GRADE:</td><td colspan="4">'.$rs4['grade'].'</td><td colspan="3">DATE:</td><td colspan="4">'.$_POST['date'].'</td></tr>';
$content.= '<tr><td colspan="3">CONDITION:</td><td colspan="4">'.$_POST['condition'].'</td><td colspan="4">STEEL CODE</td><td colspan="4">'.$_POST['steel_code'].'</td><td colspan="3">WEIGHT:</td><td colspan="4">'.$_POST['weight'].'</td></tr>';
$content.='<tr><td colspan="3">BLOOM SIZE:</td><td colspan="4">'.$_POST['bloom_size'].'  , '.$_POST['bloom_size2'].'</td><td colspan="4">SECTION SIZE MM/RCS:</td><td colspan="4">'.$_POST['section'].'</td><td colspan="3">SECTION SIZE DIA:</td><td colspan="4">'.$_POST['reduction_ratio'].'</td></tr>';
$content.='<tr><td colspan="3">RE. RATIO AS PER MILL TC:</td><td colspan="4">'.$_POST['rr_tc'].' </td><td colspan="4">RE. RATIO AS PER CALCULATOR:</td><td colspan="4">'.$_POST['rr_for_tc'].' </td><td colspan="3"></td><td colspan="4"></td></tr>';

$content.='<tr style="background-color: #006dcc;" align="center"><td colspan="22">% CHEMICAL COMPOSTION</td></tr>';
$content.='<tr align="center"><td colspan="4">PARAMETER</td><td>C%</td><td>Mn%</td><td>S%</td><td>P%</td><td>Si%</td><td>Ni%</td><td>Cr%</td>
        <td>Mo%</td><td>V%</td><td>AI%</td><td>B%</td><td>Cu%</td><td>Ca%</td><td>Sn%</td><td>'.$_POST['parameter1'].'</td>
        <td>'.$_POST['parameter2'].'</td><td>'.$_POST['parameter3'].'</td><td>'.$_POST['parameter4'].'</td>';
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">MIN SPEC</td>';
            for($i=0; $i<18; $i++) {
               $content.='<td>'.$chemical_composition_min[$i].'</td>';
            }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">MAX SPEC</td>';
			for($i=0; $i<18; $i++) {
                $content.='<td>'.$chemical_composition_max[$i].'</td>';
             }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">MILL TC VALUE</td>';
				for($i=0; $i<18; $i++) {
                  $content.='<td>'.$chemical_composition_milltc[$i].'</td>';
                }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">FORGER TC VALUE</td>';
				for($i=0; $i<18; $i++) {
                   $content.='<td>'.$chemical_composition_forgertc[$i].'</td>';
                }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">THIRD PARTY VALUE</td>';
		        for($i=0; $i<18; $i++) {
                   $content.='<td>'.$chemical_composition_partyremark[$i].'</td>';
                }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">'.$_POST['chenical_composition_value1'].'</td>';
                for($i=0; $i<18; $i++) {
                   $content.='<td>'.$chemical_composition[$i].'</td>';
                }
$content.='</tr>';	
$content.='<tr align="center"><td colspan="4">'.$_POST['chenical_composition_value2'].'</td>';
                for($i=0; $i<18; $i++) {
                    $content.='<td>'.$chemical_composition2[$i].'</td>';
                }
$content.='</tr>';	
$content.='<tr style="background-color: #006dcc;" align="center"><td colspan="22">JOMINY HARDENABILITY BAND (IS : 3848)</td></tr>';
$content.='<tr align="center"><td colspan="2">DISTANCE (in inches)</td><td >J1/16</td><td >2/16</td><td >3/16</td>
        <td >4/16</td><td >5/16</td><td >6/16</td><td >7/16</td><td >8/16</td>
        <td >9/16</td><td >10/16</td><td >11/16</td><td >12/16</td><td >13/16</td>
        <td >14/16</td><td >15/16</td><td >16/16</td><td >18/16</td><td >18/16</td>
        <td >19/16</td><td >20/16</td></tr>';
$content.='<tr align="center"><td colspan="2">DISTANCE (in mm)</td><td>1.59</td><td>3.175</td><td>4.77</td><td>6.35</td><td>7.94</td>
        <td>9.525</td><td>11.1125</td><td>12.7</td><td>14.29</td><td>15.875</td><td>17.47</td><td>19.05</td><td>20.64</td>
        <td>22.225</td><td>23.82</td><td>25.4</td><td>26.99</td><td>28.58</td><td>30.17</td><td>31.75</td>
     </tr>';
$content.='<tr align="center"><td colspan="2">MIN SPEC</td>';
                for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_min_spec[$i].'</td>';
                }
$content.='</tr>';	 
$content.='<tr align="center"><td colspan="2">MAX SPEC</td>';
                for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_max_spec[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">MILL TC VALUE</td>';
                for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_milltc[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">FORGER TC VALUE</td>';
				for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_forgertc[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">VECV VALUE</td>';
				for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_vec[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">'.$_POST['jominy_value2'].'</td>';
			    for($i=0; $i<20; $i++) {
                   $content.= '<td>'.$hardness_test[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">'.$_POST['jominy_value2'].'</td>';
				for($i=0; $i<20; $i++) {
                   $content.= '<td>'.$hardness_test2[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr align="center"><td colspan="2">CALCULATED VALUE</td>';
				for($i=0; $i<20; $i++) {
                    $content.= '<td>'.$hardness_test_calculatedvalue[$i].'</td>';
                }
$content.='</tr>'; 
$content.='<tr style="background-color: #006dcc;" align="center"><td colspan="16">METALLOGRAPHIC CHARACTERSITICS</td><td colspan="6">GAS CONTENT(PPM)</td></tr>';
$content.='<tr align="center"><td colspan="6">INCLUSION RATING IS:4163</td><td colspan="3">GRAIN SIZE IS:4748</td><td colspan="2">MPI</td><td colspan="2">UT</td><td colspan="3">Radio active ELement</td><td colspan="2">GAS</td><td colspan="2">REQ</td><td colspan="2">ACT</td></tr>';
$content.='<tr align="center"><td colspan="2"></td><td colspan="4">ACT </td><td colspan="3" rowspan="2">ACT</td><td colspan="2" rowspan="2">ACT</td><td colspan="2" rowspan="2">ACT</td><td colspan="3" rowspan="2">ACT</td><td colspan="2">O2</td><td colspan="2">'.$gas_content_req[0].'</td><td colspan="2">'.$gas_content_act[0].'</td></tr>';
$content.='<tr align="center"><td colspan="2"></td><td colspan="2">Tn </td><td colspan="2">Tk </td><td colspan="2">N2</td><td colspan="2">'.$gas_content_req[1].'</td><td colspan="2">'.$gas_content_act[1].'</td></tr>';
$content.='<tr align="center"><td colspan="2">A</td><td colspan="2">'.$inclusion_rating_act_tn[0].'</td><td colspan="2">'.$inclusion_rating_act_tk[0].'</td><td colspan="3" rowspan="4">'.$_POST['grain_size_act'].'</td><td colspan="2" rowspan="4">'.$_POST['mip_act'].'</td><td colspan="2" rowspan="4">'.$_POST['ut_act'].'</td><td colspan="3" rowspan="4">'.$_POST['radio_active_eLement_act'].'</td><td colspan="2">H2</td><td colspan="2">'.$gas_content_req[2].'</td><td colspan="2">'.$gas_content_act[2].'</td></tr>';
$content.='<tr align="center"><td colspan="2">B</td><td colspan="2">'.$inclusion_rating_act_tn[1].'</td><td colspan="2">'.$inclusion_rating_act_tk[1].'</td><td colspan="6"></td></tr>';
$content.='<tr align="center"><td colspan="2">C</td><td colspan="2">'.$inclusion_rating_act_tn[2].'</td><td colspan="2">'.$inclusion_rating_act_tk[2].'</td><td colspan="6"></td></tr>';
$content.='<tr align="center"><td colspan="2">D</td><td colspan="2">'.$inclusion_rating_act_tn[3].'</td><td colspan="2">'.$inclusion_rating_act_tk[3].'</td><td colspan="6"></td></tr>';
$content.='<tr style="background-color: #006dcc;" align="center"><td colspan="4">PART NO.</td><td colspan="4" >OBSERVATION</td><td colspan="4" >MATERIAL GRADE</td><td colspan="4" >ACCEPTED/REJECTED</td><td colspan="6">REMARK</td></tr>';
/*for($i=0; $i<=14; $i++){
$content.='<tr><td colspan="4">'.$part_no[$i].'</td><td colspan="4" >'.$observed[$i].'</td>
		<td colspan="4" >';
		$u = 'SELECT * FROM grade';
        $lt = $crud->getAllData($u);
        foreach ($lt as $key => $value) {
			if($value['id']== $part_grade[$i]){
			$content.=$value['grade'];}
	
		}
		$content.='</td><td colspan="3" >'.$accept[$i].'</td><td colspan="6" >'.$remark[$i].'</td></tr>';
}
*/
	$i=0;
foreach($part_no as $part_value){		
	if($part_value!=''){
		$content.='<tr align="center"><td colspan="4">'.$part_no[$i].'</td><td colspan="4" >'.$observed[$i].'</td>
		<td colspan="4" >';
		$u = 'SELECT * FROM grade';
        $lt = $crud->getAllData($u);
        foreach ($lt as $key => $value) {
			if($value['id']== $part_grade[$i]){
			$content.=$value['grade'];}
	
		}
		$content.='</td><td colspan="4" >'.$accept[$i].'</td><td colspan="6" >'.$remark[$i].'</td></tr>';	
	}
		$i++;
}

$content.='<tr align="center"><td colspan="3">CHECKED BY:</td><td colspan="4">'.$rs1['full_name'].'</td><td colspan="3">Prepared BY:</td><td colspan="4">'.$rs5['full_name'].'</td><td colspan="4">APPROVED BY:</td><td colspan="4">'.$rs2['full_name'].'</td></tr>';

$content.='</table>';
$pdf->writeHTML($content, true, false, false, false, '');
// -----------------------------------------------------------------------------
//Close and output PDF document
ob_end_clean();
$pdf->Output('metallurgical.pdf', 'D');