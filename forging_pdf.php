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
$id = $_GET['id'];
$query = 'SELECT * FROM forging_clear WHERE id='.$id;

$result = $crud->getSingleRow($query);

//echo "<pre>";print_r($result);die;

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


// -----------------------------------------------------------------------------
$content .='<table cellspacing="0" cellpadding="1" border="1">';
$content.='<tr><td colspan="12" align="center" style="font-size:18px;">VECV FORGING CLEARANCE REPORT</td></tr>';
//$content.='<tr><td colspan="4"></td><td colspan="4"></td><td colspan="4">Part Name. :- </td></tr>';
$content.='<tr><td colspan="4">GRN No. :- '.$result['grn_no'].'</td><td colspan="4">Part No. :- '.$result['part_no'].'</td><td colspan="4">Balance Weight. :- '.$result['balance_weight'].'</td></tr>';
$content.='<tr><td colspan="4">FORGER TC SUPPLIER NAME :- '.$rs['name'].'</td><td colspan="4">PART WEIGHT :- '.$result['part_weight'].'</td><td colspan="4">DATE :- '.$result['date'].'</td></tr>';
$content.='<tr> <td colspan="4">MILL TC SUPPLIER NAME :- '.$rs3['name'].'</td><td colspan="4">MATERIAL GRADE :- '.$rs4['grade'].'</td><td colspan="4">ACTUAL WEIGHT :- '.$result['weight'].'</td></tr>';
$content.='<tr><td colspan="4">STEELCODE :- '.$result['steelcode'].'</td><td colspan="4">HEAT NO. :- '.$result['heat_no'].'</td><td colspan="4">Quantity :- '.$result['quantity'].'</td></tr>';
$content.='<tr>
        <td colspan="12" style="background-color:#ccc;text-align: center;">METALLURGICAL TEST RESULT</td>
    </tr>';
$content.= '<tr>
        <td colspan="3">LOCATION</td>
        <td colspan="2">REQUIREMENT</td>
        <td colspan="4">OBSERVATION</td>
        <td colspan="3">REMARK</td>
    </tr>';
$content.= '<tr>
         <td colspan="3">HARDNESS</td>
         <td colspan="2">'.$result['requirement'].'</td>
         <td colspan="4">'.$result['observation'].'</td>
         <td colspan="3">'.$result['remark_mt'].'</td>
    </tr>';
	$s='';
	//echo $result['file'];die;
	if($result['file']!=''){
	$s='img/'.$result['file'];
	}
$content.='<tr>
         <td rowspan="2" colspan="3">MICROSTRUCTURE</td>
         <td rowspan="2" colspan="2">'.$result['micro_location'].'</td>
		  <td rowspan="2" style="height:200px;" colspan="4"><img style="width: 0px;" src="'.$s.'"></td>
         <td rowspan="2" colspan="3">'.$result['micro_remark'].'</td>
    </tr><tr>
		  <td style="height:100px;" colspan="4"></td>
    </tr>';  
$content.='<tr><td colspan="12">REMARK :- '.$result['remark'].'</td></tr>';
$content.='<tr><td colspan="4">CHECKED BY :- '.$rs1['full_name'].'</td><td colspan="4">APPROVED BY :- '.$rs2['full_name'].'</td><td colspan="4">DISPOSITION :- '.$result['disposition'].'</td>
                                           </tr>';    
$content.='</table>';
 $pdf->writeHTML($content, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('forging_clearance_report.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+