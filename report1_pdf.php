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
$img1 =$fol."/image/jd.png";
$content.='<tr><th colspan="15"> <!-- <img src="'.$img1.'" width="100px" height="30px"> --> </th><th colspan="6">Format No:- AP04:460:10J</th></tr>';
$content.='<tr><th colspan="21" align="center">METALLURGICAL TEST REPORT</th></tr>';
$content.='<tr><th colspan="21" align="left">Report No:- '.$result['report_no'].'</th></tr>';

$content.= '<tr><th colspan="3">Part No/Part ID:</th><th colspan="4">'.$result['part_no'].' / '.$result['control_plan_id'].'</th><th colspan="3">Part Name</th><th colspan="4">'.$result['part_name'].'</th><th colspan="3">Date:</th><th colspan="4">'.$result['date'].'</th></tr>';
$content.='<tr><td colspan="3">Qty</td><td colspan="4">'.$result['qty'].'</td><td colspan="3">Customer:</td><td colspan="4">'.$result['customer'].'</td><td colspan="3">Batch Code</td><td colspan="4">'.$result['batch_code'].'</td></tr>';
$content.= '<tr><td colspan="3">Furnace ID</td><td colspan="4">'.$data['furnace_no'].'</td><td colspan="3">Quench Media/Grade:</td><td colspan="4">'.$data['qch_grade'].'</td><td colspan="7"></td></tr>';
// $content.='<tr><td colspan="3">Carb/Hard Temp:</td><td colspan="4">'.$data['curbeizing_temp'].' / '.$data['hardening_temp'].'&#032; <sup>o</sup>C</td><td colspan="3">Carb/Hard %CP:</td><td colspan="4">'.$data['curbeizing_cp'].' / '.$data['hardening_cp'].'</td><td colspan="3">Quench oil Temp:</td><td colspan="4">'.$data['quench_oil_temp'].'&#032;  <sup>o</sup>C</td></tr>';
// $content.='<tr><td colspan="3">Tempering Temp:</td><td colspan="4">'.$data['temper_temp'].'&#032;  <sup>o</sup>C</td><td colspan="3">Tempering Time:</td><td colspan="4">'.$data['temper_time'].' &#032; min</td><td colspan="3"></td><td colspan="4"></td></tr>';
$content.='<tr><td colspan="21" align="center">Process Parameter</td></tr>';
$content.='<tr><td colspan="3">PARAMETRS</td><td colspan="3">CARBURIZING</td><td colspan="3">DIFFUSION 1/2</td><td colspan="3">HARDENING</td><td colspan="3">QUENCH OIL</td><td colspan="3">TEMPERING</td><td colspan="3">Remark</td></tr>';
$content.='<tr><td colspan="3"></td><td colspan="1">SET</td><td colspan="2">ACTUAL</td><td colspan="1">SET</td><td colspan="2">ACTUAL</td><td colspan="1">SET</td><td colspan="2">ACTUAL</td><td colspan="1">SET</td><td colspan="2">ACTUAL</td><td colspan="1">SET</td><td colspan="2">ACTUAL</td><td rowspan="3" colspan="3">'.$data['process_remark'].'</td></tr>';
$content.='<tr><td colspan="3">TEMP<sup>o</sup>C</td><td colspan="1">'.$data['curbeizing_temp'].'</td><td colspan="2">'.$data['curbeizing_temp1'].'</td><td colspan="1">'.$data['diffusion_temp'].'</td><td colspan="2">'.$data['diffusion_temp1'].'</td><td colspan="1">'.$data['hardening_temp'].'</td><td colspan="2">'.$data['hardening_temp1'].'</td><td colspan="1">'.$data['quench_oil_temp'].'</td><td colspan="2">'.$data['quench_oil_temp1'].'</td><td colspan="1">'.$data['temp_tempering'].'</td><td colspan="2">'.$data['temp_tempering1'].'</td><td rowspan="3" colspan="3">'.$data['process_remark'].'</td></tr>';
$content.='<tr><td colspan="3">TIME1(Minute)</td><td colspan="1">'.$data['curbeizing_time'].'</td><td colspan="2">'.$data['curbeizing_time1'].'</td><td colspan="1">'.$data['diffusion_time'].'</td><td colspan="2">'.$data['diffusion_time1'].'</td><td colspan="1">'.$data['hardening_time'].'</td><td colspan="2">'.$data['hardening_time1'].'</td><td colspan="1">'.$data['quench_oil_time'].'</td><td colspan="2">'.$data['quench_oil_time1'].'</td><td colspan="1">'.$data['time_tempering'].'</td><td colspan="2">'.$data['time_tempering1'].'</td></tr>';
$content.='<tr><td colspan="3">CP</td><td colspan="1">'.$data['curbeizing_cp'].'</td><td colspan="2">'.$data['curbeizing_cp1'].'</td><td colspan="1">'.$data['diffusion_cp'].'</td><td colspan="2">'.$data['diffusion_cp1'].'</td><td colspan="1">'.$data['hardening_cp'].'</td><td colspan="2">'.$data['hardening_cp1'].'</td><td colspan="1">'.$data['quench_oil_cp'].'</td><td colspan="2">'.$data['quench_oil_cp1'].'</td><td colspan="3"></td></tr>';
$content.='<tr><td colspan="6" style="text-align: left;">
1) Raw Material: </td><td colspan="6" style="text-align: left;">'.$result['grade'].'</td><td colspan="4" style="text-align: left;">
Steel Code: </td><td colspan="5" style="text-align: left;">'.$data['steel_code'].'</td></tr>';
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
$content.='<tr><td colspan="7" rowspan="3">1.2 Inclusion Rating :<br>(Worst Field Rating)</td><td colspan="5" rowspan="2">Specification</td><td colspan="5">Type <span style="font-family: DejaVu Sans, sans-serif;"> &rarr;</span></td><td>A</td><td>B</td><td>C</td><td>D</td></tr>';
$inclu = explode('*',$data['inclu']);
$content.='<tr><td rowspan="2" colspan="3">T/H</td><td colspan="2">Max</td><td>3/2</td><td>3/2</td><td>1/1</td><td>2/1.5</td>';
              
$content.='</tr>';
$content.='<tr><td colspan="5">Observation</td><td colspan="2"></td>';
for ($i=0; $i<4; $i++) {
            $content.='<td>'.$inclu[$i].'</td>';
   }                 
$content.='</tr>';
$content.='<tr><td colspan="21">2) Heat Treatment: JDV2 HT10T per JDV 21-Case carburised, hardened & tempered</td></tr>';
$img = $fol."/image/".$result['image_graph'];
$content.='<tr><td rowspan="10" colspan="12"><img src="'.$img.'" width="350px" height="160px;"></td><td colspan="9">2.1 Hardness</td></tr>';
$content.='<tr><td colspan="3">Location</td><td colspan="3">Specification</td><td colspan="3">Observation</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_surface_hard1_location'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard1_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_surface_hard1_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_location'].'</td><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_core_hardness_rcd_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['surface_hardness_location_after_grind'].'</td><td colspan="3">'.$data['surface_hardness_requirement_after_grind'].'</td><td colspan="3">'.$data['remark_observe3'].'</td></tr>';
$content.='<tr><td colspan="13">2.2 Effective Case Depth at '.$data['cut_off_point'].'</td></tr>';
$content.='<tr><td colspan="3">Location</td><td colspan="3">Specification (mm)</td><td colspan="3">Observation (mm)</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_case_depth_pcd_location'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_pcd_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_pcd_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['metallurgical_test_case_depth_location'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_requirement'].'</td><td colspan="3">'.$data['metallurgical_test_case_depth_observation'].'</td></tr>';
$content.='<tr><td colspan="3">'.$data['eff_after_grinding_location1'].'</td><td colspan="3">'.$data['eff_after_grinding_requirement1'].'</td><td colspan="3">'.$data['remark_observe1'].'</td></tr>';
$content.='<tr><td colspan="21" align=" left">2.3 Hardness traverse in Hv (Distance from surface)</td></tr>';
$content.='<tr><td>in mm <span style="font-family: DejaVu Sans, sans-serif;"> &rarr;</span></td><td>0.1</td><td>0.2</td><td>0.3</td><td>0.4</td><td>0.5</td><td >0.6</td>
<td>0.7</td><td>0.8</td><td>0.9</td><td>1.0</td><td>1.1</td><td>1.2</td><td>1.3</td><td>1.4</td><td>1.5</td><td>1.6</td><td>1.7</td><td>1.8</td><td>1.9</td><td>2.0</td></tr>';
$content.='<tr><td>PCD</td>';
  $hardness_traverse_pcd = explode('*',$data['hardness_traverse_pcd']);
  for($i=1; $i<21; $i++){
                $content.='<td>'.$hardness_traverse_pcd[$i].'</td>';
             }
             $content.='</tr>';

             $content.='<tr><td>RCD</td>';
  $hardness_traverse_rcd = explode('*',$data['hardness_traverse_rcd']);
  for($i=1; $i<21; $i++){
                $content.='<td>'.$hardness_traverse_rcd[$i].'</td>';
             }
             $content.='</tr>';
             $content.='<tr><td>'.$data['hardness_traverse_value'].'</td>';
            $hardness_traverse_od = explode('*',$data['hardness_traverse_od']);
  for($i=1; $i<21; $i++){
                $content.='<td>'.$hardness_traverse_od[$i].'</td>';
             }
             $content.='</tr>';
  $content.='<tr><td colspan="21">2.4 Microstructure: Inspect as per JDV21</td></tr>';
  $content.='<tr><td colspan="6">Microstructure Photographs</td><td colspan="5">Location</td><td colspan="5">Specification</td><td colspan="5">Observation</td></tr>';
  $content.='<tr><td rowspan="3" colspan="6">500x</td><td colspan="5">'.$data['micro_photo_location'].'</td><td colspan="5">'.$data['micro_photo_specification'].'</td><td colspan="5">'.$data['micro_photo_observation'].'</td></tr>';  
  $content.='<tr><td colspan="5">'.$data['metallurgical_test_micro_case_location'].'</td><td colspan="5">'.$data['metallurgical_test_micro_case_requirement'].'</td><td colspan="5">'.$data['metallurgical_test_micro_case_observation'].'</td></tr>'; 
  $content.='<tr><td colspan="5">'.$data['micro_photo_location3'].'</td><td colspan="5">'.$data['micro_photo_specification3'].'</td><td colspan="5">'.$data['micro_photo_observation3'].'</td></tr>';
  $content.='<tr><td rowspan="3" colspan="6">100x</td><td colspan="5">'.$data['micro_photo_itp_location'].'</td><td colspan="5">'.$data['micro_photo_itp_specification'].'</td><td colspan="5">'.$data['micro_photo_itp_observation'].'</td></tr>';
  $content.='<tr><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_pcd_location'].'</td><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_pcd_requirement'].'</td><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_pcd_observation'].'</td></tr>';  
  $content.='<tr><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_rcd_location'].'</td><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_rcd_requirement'].'</td><td colspan="5">'.$data['metallurgical_test_itp_sub_surface_rcd_observation'].'</td></tr>';         
$content.='<tr><td colspan="6">500x</td><td colspan="5">'.$data['metallurgical_test_gbo_igo_rcd_location'].'</td><td colspan="5">'.$data['metallurgical_test_gbo_igo_rcd_requirement'].'</td><td colspan="5">'.$data['metallurgical_test_gbo_igo_rcd_observation'].'</td></tr>';
$content.='<tr><td colspan="6">500x</td><td colspan="5">'.$data['metallurgical_test_micro_core_location'].'</td><td colspan="5">'.$data['metallurgical_test_micro_core_requirement'].'</td><td colspan="5">'.$data['metallurgical_test_micro_core_observation'].'</td></tr>';
$content.='<tr><td colspan="6">Magnetic Particle Inspection</td><td colspan="5">'.$data['mag_loc'].'</td><td colspan="5">'.$data['mag_spec'].'</td><td colspan="5">'.$data['mag_obser'].'</td></tr>';
$content.='<tr><td colspan="21">*- In case RA is more than 25%, check Hardness(with 100 gm load) at 0.1 mm it should be 58 HRC Min.</td></tr>';
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
