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

$pdf->SetFont('helvetica', '', 11);
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

$data = str_replace('<', '&lt;', $data);
// -----------------------------------------------------------------------------
$content .='<table cellspacing="0" cellpadding="1" border="1">';

$content.='<tr><th colspan="8"><img src="'.$fol.'/img/caterpillar.jpg"></th><th colspan="4">Format No:- AP04:460:10CAT</th></tr>';
$content.='<tr><th colspan="12" align="center">METALLURGICAL TEST REPORT</th></tr>';
$content.='<tr><th colspan="12">Report No:- '.$result['report_no'].'</th></tr>';
$content.= '<tr><td colspan="3">Customer</td><td colspan="3">'.$result['customer'].'</td><td colspan="3">Date</td><td colspan="3">'.$result['date'].'</td></tr>';
$content.='<tr><td colspan="3">Cust Part Id</td><td colspan="3">'.$result['control_plan_id'].'</td><td colspan="3">Batch Code</td><td colspan="3">'.$result['batch_code'].'</td></tr>';
$content.= '<tr><td colspan="3">EECD Part No.</td><td colspan="3">'.$result['part_no'].'</td><td colspan="3">Qty</td><td colspan="3">'.$result['qty'].'</td></tr>';
$content.='<tr><td colspan="3">Part Name</td><td colspan="3">'.$result['part_name'].'</td><td colspan="3">Material</td><td colspan="3">'.$result['grade'].'</td></tr>';
$content.='<tr><td colspan="3">Steel Mill</td><td colspan="3">'.$result['steel_mill'].'</td><td colspan="3">Heat No.</td><td colspan="3">'.$result['heat_no'].'</td></tr>';
$content.='<tr><td colspan="1">S.No</td><td colspan="2">Parameters</td><td colspan="2">Location</td><td colspan="2">Specification</td><td colspan="2">Observation</td><td colspan="1"></td><td colspan="1"></td><td colspan="1">Remark</td></tr>';
$content.='<tr><td colspan="1" rowspan="3">1.</td><td colspan="2" rowspan="3">Effective Case Depth in mm</td><td colspan="2">'.$data['metallurgical_test_case_depth_pcd_location'].'</td><td colspan="2">'.$data['eff_after_grinding_requirement1'].'</td><td colspan="2">'.$data['remark_observe1'].'</td><td colspan="1">'.$data['metallurgical_test_case_depth_pcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_case_depth_pcd_observation2'].'</td><td colspan="1">'.$data['remark_ag'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['metallurgical_test_case_depth_location'].'</td><td colspan="2">'.$data['metallurgical_test_case_depth_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_case_depth_observation'].'</td><td colspan="1">'.$data['metallurgical_test_case_depth_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_case_depth_observation2'].'</td><td colspan="1">'.$data['remark4'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['eff_case_depth_location'].'</td><td colspan="2">'.$data['eff_case_depth_requirement'].'</td><td colspan="2">'.$data['eff_case_depth_observation'].'</td><td colspan="1">'.$data['eff_case_depth_observation1'].'</td><td colspan="1">'.$data['eff_case_depth_observation2'].'</td><td colspan="1">'.$data['eff_case_depth_observation_remark'].'</td></tr>';
$content.='<tr><td colspan="1">2.</td><td colspan="2">Hardness in HRC</td><td colspan="2">'.$data['metallurgical_test_surface_hard2_location'].'</td><td colspan="2">'.$data['metallurgical_test_surface_hard2_requirement'].' '.$data['surface_hardnessloc1_value'].'</td><td colspan="2">'.$data['metallurgical_test_surface_hard2_observation'].'</td><td colspan="1">'.$data['metallurgical_test_surface_hard2_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_surface_hard2_observation2'].'</td><td colspan="1">'.$data['remark2'].'</td></tr>';
$content.='<tr><td colspan="1" rowspan="3">3.</td><td rowspan="3" colspan="2">Core Hardness in HRC</td><td colspan="2">'.$data['metallurgical_test_core_hardness_pcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_core_hardness_pcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_core_hardness_pcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_core_hardness_pcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_core_hardness_pcd_observation2'].'</td><td colspan="1">'.$data['remark7'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['metallurgical_test_core_hardness_rcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_core_hardness_rcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_core_hardness_rcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_core_hardness_rcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_core_hardness_rcd_observation2'].'</td><td colspan="1">'.$data['remark8'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['core_hardness_location'].'</td><td colspan="2">'.$data['core_hardness_requirement'].'</td><td colspan="2">'.$data['core_hardness_observation'].'</td><td colspan="1">'.$data['core_hardness_observation1'].'</td><td colspan="1">'.$data['core_hardness_observation2'].'</td><td colspan="1">'.$data['core_hardness_remark'].'</td></tr>';
$content.='<tr><td colspan="1">4.</td><td colspan="2">Surface Hardness after final grinding in HRC</td><td colspan="2">'.$data['surface_hardness_location_after_grind'].'</td><td colspan="2">'.$data['surface_hardness_requirement_after_grind'].'</td><td colspan="2">'.$data['remark_observe3'].'</td><td colspan="1">'.$data['remark_observe31'].'</td><td colspan="1">'.$data['remark_observe32'].'</td><td colspan="1">'.$data['remark_ag3'].'</td></tr>';
$content.='<tr><td colspan="1">5.</td><td colspan="2">Surface Hardness in HRC</td><td colspan="2">'.$data['metallurgical_test_surface_hard1_location'].'</td><td colspan="2">'.$data['metallurgical_test_surface_hard1_requirement'].''.$data['surface_hardnessloc_value'].'</td><td colspan="2">'.$data['metallurgical_test_surface_hard1_observation'].'</td><td colspan="1">'.$data['metallurgical_test_surface_hard1_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_surface_hard1_observation2'].'</td><td colspan="1">'.$data['remark1'].'</td></tr>';
$content.='<tr><td colspan="1" rowspan="2">6.</td><td rowspan="2" colspan="2">Surface Bainite</td><td colspan="2">'.$data['metallurgical_test_nmtp_surface_pcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_nmtp_surface_pcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_nmtp_surface_pcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_nmtp_surface_pcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_nmtp_surface_pcd_observation2'].'</td><td colspan="1">'.$data['remark_nmtp'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['metallurgical_test_nmtp_surface_rcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_nmtp_surface_rcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_nmtp_surface_rcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_nmtp_surface_rcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_nmtp_surface_rcd_observation2'].'</td><td colspan="1">'.$data['remark_nmtp2'].'</td></tr>';
$content.='<tr><td rowspan="2" colspan="1">7.</td><td rowspan="2" colspan="2">Sub Surface Bainite</td><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_pcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_pcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_pcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_itp_sub_surface_pcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_itp_sub_surface_pcd_observation2'].'</td><td colspan="1">'.$data['remark_itp'].'</td></tr>';
$content.='<tr><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_rcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_rcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_itp_sub_surface_rcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_itp_sub_surface_rcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_itp_sub_surface_rcd_observation2'].'</td><td colspan="1">'.$data['remark_itp2'].'</td></tr>';
$content.='<tr><td colspan="1">8.</td><td colspan="2">Grain Boundary Oxidation</td><td colspan="2">'.$data['metallurgical_test_gbo_igo_pcd_location'].'</td><td colspan="2">'.$data['metallurgical_test_gbo_igo_pcd_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_gbo_igo_pcd_observation'].'</td><td colspan="1">'.$data['metallurgical_test_gbo_igo_pcd_observation1'].'</td><td colspan="1">'.$data['metallurgical_test_gbo_igo_pcd_observation2'].'</td><td colspan="1">'.$data['remark_gbo'].'</td></tr>';
$content.='<tr><td colspan="1" rowspan="4">9.</td><td colspan="2">Dark etched Microstructure Retained Austenite</td><td colspan="2">'.$data['metallurgical_test_micro_case_location'].'</td><td colspan="2">'.$data['metallurgical_test_micro_case_requirement'].'</td><td colspan="2">'.$data['metallurgical_test_micro_case_observation'].'</td><td colspan="1">'.$data['d1_observation1'].'</td><td colspan="1">'.$data['d1_observation2'].'</td><td colspan="1">'.$data['d1_remark'].'</td></tr>';
$content.='<tr><td colspan="2">Carbides</td><td colspan="2">'.$data['dc_location'].'</td><td colspan="2">'.$data['dc_requirement'].'</td><td colspan="2">'.$data['dc_observation'].'</td><td colspan="1">'.$data['dc_observation1'].'</td><td colspan="1">'.$data['dc_observation2'].'</td><td colspan="1">'.$data['dc_remark'].'</td></tr>';
$content.='<tr><td colspan="2">Decarb</td><td colspan="2">'.$data['decarb_location'].'</td><td colspan="2">'.$data['decarb_requirement'].'</td><td colspan="2">'.$data['decarb_observation'].'</td><td colspan="1">'.$data['decarb_observation1'].'</td><td colspan="1">'.$data['decarb_observation2'].'</td><td colspan="1">'.$data['decarb_remark'].'</td></tr>';

$content.='<tr><td colspan="2">Core Ferrite</td><td colspan="2">'.$data['ferrite_location'].'</td><td colspan="2">'.$data['ferrite_requirement'].'</td><td colspan="2">'.$data['ferrite_observation'].'</td><td colspan="1">'.$data['ferrite_observation1'].'</td><td colspan="1">'.$data['ferrite_observation2'].'</td><td colspan="1">'.$data['ferrite_remark'].'</td></tr>';
$content.='<tr><td colspan="2">Remark</td><td colspan="10">'.$result['remark'].'</td></tr>';
$content.='<br pagebreak="true" />';
$content.='<tr><td colspan="12" align="center">Micro Photographs Magnification : 500 X</td></tr>';
$content.='<tr><td colspan="6" rowspan="16"></td><td colspan="6" rowspan="16"></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td colspan="6">Surface Bainite Loc-X</td><td colspan="6">Surface Bainite Loc-C</td></tr></table>';
$content .='<table cellspacing="0" cellpadding="1" border="1">';
$content.='<tr><td colspan="6" rowspan="16"></td><td colspan="6" rowspan="16"></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';
$content.='<tr><td></td></tr>';

 $content.='<tr><td colspan="6">Case Microstructure Loc-X</td><td colspan="6">Core Microstructue Loc-D</td></tr>';
$content.='<tr><td colspan="2">Checked by :-</td><td colspan="2">'.$rs['full_name'].'</td><td colspan="2">Prepared by : -</td ><td colspan="2">'.$rs3['full_name'].'</td><td colspan="2">Approved by :-</td><td colspan="2">'.$rs2['full_name'].'</td></tr>';

$content.='</table>';
 $pdf->writeHTML($content, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
