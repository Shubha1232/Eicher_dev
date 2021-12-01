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

$pdf->SetFont('helvetica', '', 10);
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
$img1 = '';
$unique = '';
if($result['customer'] == 'VOLVO'){
$img1 =$fol."/image/vo.png";
$unique ='AP04:460:10V';
}
else{
$img1 =$fol."/image/vst.png";
$unique ='AP04:460:10VS';
}
$content.='<tr><th colspan="15"><img src="'.$img1.'" width="100px" height="50px"></th><th colspan="6"> Format No:- '.$unique.'</th></tr>';
$content.='<tr><th colspan="21" align="center">METALLURGICAL TEST REPORT</th></tr>';
$content.='<tr><td colspan="21" style="border-left:0px;">Report No:-  '.$result['report_no'].'</td></tr>';
$content.= '<tr><th colspan="3">Part No/Part ID:</th><th colspan="4">'.$result['part_no'].' / '.$result['control_plan_id'].'</th><th colspan="3">Part Name</th><th colspan="4">'.$result['part_name'].'</th><th colspan="3">Date:</th><th colspan="4">'.$result['date'].'</th></tr>';
$content.='<tr><td colspan="3">Qty</td><td colspan="4">'.$result['qty'].'</td><td colspan="3">Customer:</td><td colspan="4">'.$result['customer'].'</td><td colspan="3">Batch Code:</td><td colspan="4">'.$result['batch_code'].'</td></tr>';

$content.='<tr><td colspan="21">1) Material Grade: '.$result['grade'].'</td></tr>';
$content.='<tr><td colspan="21" align="left">1.1 Chemistry</td></tr>';
$content.='<tr><td colspan="9">Elements (%)<span style="font-family: DejaVu Sans, sans-serif;"> &rarr;</span></td><td>C</td><td>Mn</td><td>S</td><td>P</td><td>Si</td><td>Ni</td><td>Cr</td><td>Mo</td><td>V</td><td>Al</td><td>B</td><td>Cu</td></tr>';
$chemical_composition_min = explode('*',$data['chemical_composition_min']);
$chemical_composition_max = explode('*',$data['chemical_composition_max']);
$chemical_composition_milltc = explode('*',$data['chemical_composition_milltc']);

$content.='<tr><td colspan="9">Min</td>';
    for ($i=0; $i<12; $i++) {
            $content.='<td>'.$chemical_composition_min[$i].'</td>';
                }
$content.='</tr>';
$content.='<tr><td colspan="9">Max</td>';
    for ($i=0; $i<12; $i++) {
            $content.='<td>'.$chemical_composition_max[$i].'</td>';
                }
$content.='</tr>';
$content.='<tr><td colspan="9">Observation</td>';
    for ($i=0; $i<12; $i++) {
            $content.='<td>'.$chemical_composition_milltc[$i].'</td>';
                }
$content.='</tr>';
$content.='<tr><td colspan="21">2) Heat Treatment: Case carburised, hardened & tempered</td></tr>';
$img = $fol."/image/".$result['image_graph'];
$content.='<tr><td rowspan="10" colspan="12"><img src="'.$img.'" width="350px" height="214px;"></td><td colspan="9">2.1 Hardness</td></tr>';
$content.='<tr><td colspan="3">Location</td><td colspan="3">Specification</td><td colspan="3">Observation</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_surface_hard1_location'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard1_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard1_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_surface_hard2_location'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard2_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard2_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_location'].'</td><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_observation'].'</td></tr>';
$content.='<tr><td colspan="9">2.2 Effective Case Depth @ '.$data['cut_off_point'].'</td></tr>';
$content.='<tr><td colspan="3">Location</td><td colspan="3">Specification (mm)</td><td colspan="3">Observation (mm)</td></tr>';
$content.='<tr><td colspan="3">'.$data['eff_after_grinding_location1'].'</td><td colspan="3">'.$data['eff_after_grinding_requirement1'].'</td><td colspan="3">'.$data['remark_observe1'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_case_depth_location'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_case_depth_location1'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_requirement1'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_observation1'].'</td></tr>';
$content.='<tr><td colspan="21" align="left">2.3 Hardness travese in Hv (Distance from surface)</td></tr>';
$content.='<tr><td>in mm</td><td>0.1</td><td>0.2</td><td>0.3</td><td>0.4</td><td>0.5</td><td >0.6</td>
<td>0.7</td><td>0.8</td><td>0.9</td><td>1.0</td><td>1.1</td><td>1.2</td><td>1.3</td><td>1.4</td><td>1.5</td><td>1.6</td><td>1.7</td><td>1.8</td><td>1.9</td><td>2.0</td></tr>';
$content.='<tr><td>PCD</td>';
   $hardness_traverse_od = explode('*',$data['hardness_traverse_od']);
  for($i=1; $i<21; $i++){
                $content.='<td>'.$hardness_traverse_od[$i].'</td>';
             }
             $content.='</tr>';

             $content.='<tr><td>RCD</td>';
  $hardness_traverse_rcd = explode('*',$data['hardness_traverse_rcd']);
  for($i=1; $i<21; $i++){
                $content.='<td>'.$hardness_traverse_rcd[$i].'</td>';
             }
             $content.='</tr>';
             
  $content.='<tr><td colspan="21">2.4 Microstructure: </td></tr>';
  $content.='<tr><td colspan="7">Location</td><td colspan="7">Specification</td><td colspan="7">Observation</td></tr>';
  $content.='<tr><td colspan="7">'.$data['metallurgical_test_micro_case_location'].'</td><td colspan="7">'.$data['metallurgical_test_micro_case_requirement'].'</td><td colspan="7">'.$data['metallurgical_test_micro_case_observation'].'</td></tr>'; 
  $content.='<tr><td colspan="7">'.$data['metallurgical_test_micro_core_location'].'</td><td colspan="7">'.$data['metallurgical_test_micro_core_requirement'].'</td><td colspan="7">'.$data['metallurgical_test_micro_core_observation'].'</td></tr>';
  $content.='<tr><td colspan="7">'.$data['micro_photo_location3'].'</td><td colspan="7">'.$data['micro_photo_specification3'].'</td><td colspan="7">'.$data['micro_photo_observation3'].'</td></tr>'; 
  $content.='<tr><td colspan="7">'.$data['metallurgical_test_gbo_igo_rcd_location'].'</td><td colspan="7">'.$data['metallurgical_test_gbo_igo_rcd_requirement'].'</td><td colspan="7">'.$data['metallurgical_test_gbo_igo_rcd_observation'].'</td></tr>';
$content.='<tr><td colspan="7">'.$data['micro_photo_location5'].'</td><td colspan="7">'.$data['micro_photo_specification5'].'</td><td colspan="7">'.$data['micro_photo_observation5'].'</td></tr>'; 
  $content.='<tr><td colspan="21">Disposition:- '.$data['disposition'].'</td></tr>';
$content.='<tr><td colspan="21">Remarks :- '.$result['remark'].'</td></tr>';
$content.='<tr><td colspan="3">Checked by :-</td><td colspan="4">'.$rs['full_name'].'</td><td colspan="3">Prepared by : -</td><td colspan="4">'.$rs3['full_name'].'</td><td colspan="3">Approved by :-</td><td colspan="4">'.$rs2['full_name'].'</td></tr>';

$content.='</table>';

 $pdf->writeHTML($content, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
