<?php include_once("header.php"); ?>
<style type="text/css">
#example2_wrapper .row {
 padding:10px;
	margin-left:0px;
}
.splashy-add_small{
	margin-top: -2px !important;
}
.jQ-todoAll-count{
	font-size:13px !important;
}
td input{
	width:110px;
}
td select{
	width:110px;
 }
.set-width{
	width:280px !important;
 }
.size{
	width:25px;
	}
	.size1{
		width:75%;
	}
	.error1{
	border-color:red !important;
	color:red !important;
}
</style>
<!-- breadcrumbs -->
<script src="js/jquery.min.js"></script>
<div class="container-fluid">
  <ul id="breadcrumbs">
      <li><a href="dashboard"><i class="icon-home"></i></a></li>
<!--  <li><a href="part_list"></a></li>
	  <li><a href="javascript:void(0)">Edit Part</a></li> -->
  </ul>
</div>
<!-- main content -->
<div class="container-fluid"">
  <div class="row-fluid">
	<div class="span12">
		<div class="w-box">
			<div class="w-box-header">
				<h4>METALLURGICAL TEST REPORT</h4>
			</div>
			<div class="w-box-content cnt_a">
				<?php 
                     if($_SESSION['msg_success'] != ''){ ?>
						<script>
								window.onload = function(){
								$.sticky('<?php echo $_SESSION['msg_success'];?>', {autoclose : 3000, position: "top-center", type: "st-success" });
								}
						</script>
				<?php 
					 $_SESSION['msg_session'] = '';
						}
					if($_SESSION['msg_session'] != ''){ ?>
						<script>
								window.onload = function(){
								$.sticky('<?php echo $_SESSION['msg_session'];?>', {autoclose : 3000, position: "top-center", type: "st-error" });
								}
						</script>
				<?php 
					 $_SESSION['msg_session'] = '';
						}
                                  $response;
                                  $id =  $_GET['id'];
								  $reset_id=0;
								  $reset_id= $_GET['reset_id'];

								  if($reset_id!=1){

                                  $query = 'SELECT * FROM catepillar_report WHERE report_id='.$id;
                                  $result= $crud->getSingleRow($query);

								  if($result){
                                    
                                    $response = json_decode($result['data'],TRUE);
									$response['customer']= $result['customer'];
                                    $response['date'] = $result['date'];
                                    $response['control_plan_id'] = $result['control_plan_id'];
                                    $response['batch_code'] = $result['batch_code'];
                                    $response['part_no'] = $result['part_no'];
                                    $response['qty'] = $result['qty'];
                                    $response['part_name'] = $result['part_name'];
                                    $response['grade'] = $result['grade'];
                                    $response['remark'] = $result['remark'];
                                    $response['steel_mill'] = $result['steel_mill'];
				                    $response['report_no'] = $result['report_no'];
                                    $response['heat_no'] = $result['heat_no'];
                                    $response['mill_tc'] = $result['mill_tc'];
                                    $response['forger_tc'] = $result['forger_tc'];
                                    $response['checked_by'] = $result['checked_by'];
                                    $response['approved_by'] = $result['approved_by'];
									$response['verified_by'] = $result['verified_by'];
									$hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
								    $chemical_composition_min = explode('*',$response['chemical_composition_min']);
								    $chemical_composition_max = explode('*',$response['chemical_composition_max']);
								    $chemical_composition_milltc = explode('*',$response['chemical_composition_milltc']);
								    $inclu = explode('*',$response['inclu']);
									
                                   }
								  else{

									$query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                    $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
									$response['date'] = $result['current_date'];
									$response['cut_off_point'] = $result['cut_off'].''.$result['cut_off_value'];
								  }
								}else{
									$query = 'SELECT * FROM control_plan WHERE id='.$id;
                                    $result= $crud->getSingleRow($query);
                                    $response = $result;
                                    $hardness_traverse_pcd = explode('*',$response['hardness_traverse_pcd']);
									$hardness_traverse_rcd = explode('*',$response['hardness_traverse_rcd']);
									$hardness_traverse_od = explode('*',$response['hardness_traverse_od']);
									$response['date'] = $result['current_date'];
									$response['cut_off_point'] = $result['cut_off'].' '.$result['cut_off_value'];
								  }


                ?><div style="float:right;">
	<a class="btn btn-beoro-3" href="#" onclick="reset(<?php echo $id; ?>)">Reset</a>
		<a class="btn btn-success" href="#" onclick="saveData(1)" >Save</a>
			<a class="btn btn-beoro-1 word" href="#" onclick="saveData(2)" style="display: none;float:right;margin-left: 5px;">PDF</a> 
		<a class="btn btn-info word" href="#" onclick="saveData(0)"  style="display: none;float:right;margin-left: 5px;">Word</a> 
	
	</div>
<div id="docx">
	<table id="example2" class="table display nowrap table-bordered">
		<tr><td colspan="12" style="background-color:#ccc;text-align: center;">MATERIALS LABORATORY REPORT</td></tr>
	<tr>
		<td>Report No:<input type="hidden" id="cut_off" name="cut_off" value="<?php echo $response['cut_off']; ?>"></td>
		<td colspan="3"><input class="size1" type="text" name="report_no" value="<?php echo $response['report_no'] ?>"/><input type="hidden" name="report_id" value="<?php echo $id; ?>"><input type="hidden" id="image_graph" name="image_graph"></td>
	</tr>
	<tr>
		<td>Part No/ Part ID:</td>
		<td colspan="3"><div class="input-append"><input class="size1" type="text" name="part_no" style="width: 36%;" value="<?php echo $response['part_no'] ?>"/><button class="btn" onclick="getHTControlPlan()">Go</button></div>
		<input class="size1" type="text" name="control_plan_id" style="width: 35%;" value="<?php echo $response['control_plan_id'] ?>"/></td>
		<td>Part Name:</td>
		<td colspan="3"><input class="size1" type="text" name="part_name" value="<?php echo $response['part_name'] ?>"/></td>
		<td>Date:</td>
		<td colspan="3"><input class="size1" type="text" name="date" value="<?php echo $response['date'] ?>"/></td>
	</tr>
	<tr>
	<td>Qty:</td>
		<td colspan="3"><input class="size1" type="text" name="qty" value="<?php echo $response['qty'] ?>"/></td>
		<td>Customer:</td>
		<td colspan="3"><input class="size1" type="text" id="customer" name="customer" value="<?php echo $response['customer'] ?>" readonly></td>
		<td>Batch Code:</td>
		<td colspan="3"><input class="size1" type="text" name="batch_code" value="<?php echo $response['batch_code'] ?>"/></td>
	</tr>
	<tr id="p">
		<td>Furnace ID:</td>
		<td colspan="3"><input class="size1" type="text"  id="furnace_no" name="furnace_no" value="<?php echo $response['furnace_no'] ?>" onkeyup="get_quench()"/></td>
        <td>Quench Media/Grade:</td>
		<td colspan="3"><input class="size1" type="text" id="qch_grade" name="qch_grade" value="<?php echo $response['qch_grade'] ?>"/></td>
	    <td colspan="4"></td>
		<td style="display: none;">Carb/Diff Time:</td>
		<td colspan="3" class="input-append" style="display: none;"><input class="size1" type="text" style="width:125px;" name="curbeizing_time11" value="<?php echo $response['curbeizing_time11'] ?>"/><input class="size1" type="text" style="width:125px;" name="diffusion_time12" value="<?php echo $response['diffusion_time12'] ?>"/><span class="add-on">min</span></td>
	</tr>
	<tr id="p1" style="display: none;">
		<td>Carb/Hard Temp:</td>
		<td colspan="3" class="input-append"><input class="size1" style="width:125px;" type="text" name="curbeizing_temp" value="<?php if($response['curbeizing_temp']){ echo $response['curbeizing_temp']; } ?>"/><input class="size1" style="width:133px;" type="text" name="hardening_temp12" value="<?php if($response['hardening_temp12']){ echo $response['hardening_temp12']; } ?>"/><span class="add-on">°C</span></td>
		<td>Carb/Hard %CP:</td>
		<td colspan="3"><input class="size1" style="width:82px;" type="text" name="curbeizing_cp" value="<?php if($response['curbeizing_cp']){ echo $response['curbeizing_cp']; } ?>"/><input class="size1" style="width:82px;" type="text" name="hardening_cp12" value="<?php if($response['hardening_cp12']){ echo $response['hardening_cp12']; } ?>"/></td>
		<td>Quench oil Temp:</td>
		<td colspan="3" class="input-append"><input style="width:63%;" class="size1" type="text" name="quench_oil_temp12" value="<?php if($response['quench_oil_temp12']){ echo $response['quench_oil_temp12']; } ?>"/><span class="add-on">°C</span></td>
	</tr>
	<tr id="p1" style="display: none;">
		<td>Tempering Temp:</td>
		<td colspan="3" class="input-append"><input class="size1" type="text" name="temper_temp" style="width: 69%;" value="<?php if($response['temper_temp']){ echo $response['temper_temp']; } ?>"/><span class="add-on">°C</span></td>
		<td>Tempering Time:</td>
		<td colspan="3" class="input-append"><input class="size1" type="text" name="temper_time" style="width: 62%;" value="<?php if($response['temper_time']){ echo $response['temper_time']; } ?>"/><span class="add-on">min</span></td>
		<td></td>
		<td colspan="3"></td>
	</tr>
	<?php if($response['customer'] == 'JOHN DEERE'){?> 
	<tr>
		<td colspan="12">
			<table class="table display nowrap table-bordered">
				<tr class="bg-color">
                                                         <th colspan="12" style="background-color:#ccc;text-align: center;">PROCESS PARMETERS</th>

                                                    
                                                     </tr>
                                                     <tr class="bg-color">
                                                         <th colspan="3">PARAMETRS</th>

                                                    <th>CARBURIZING</th>

                                                    <th>DIFFUSION 1/2</th>

                                                    <th>HARDENING</th>

                                                    <th>QUENCH OIL</th>

                                                    <th>TEMPERING</th>
                                                    <th>REMARK</th>
                                                    <!--<th>CHARGE IN TIME</th>

                                                    <th style=>CHARGE OUT TIME</th>-->
                                                     </tr>
                                                     <?php if($response['customer'] == 'JOHN DEERE'){?>
                                                     <tr>

                                                    <td class="bg-color" colspan="3"></td>

                                                    <td><span style="width:40px !important;">SET /</span><span style="width:40px !important;"> ACTUAL</span></td>
                                                    <td><span style="width:40px !important;">SET /</span><span style="width:40px !important;"> ACTUAL</span></td>
													<td><span style="width:40px !important;">SET /</span><span style="width:40px !important;"> ACTUAL</span></td>
													<td><span style="width:40px !important;">SET /</span><span style="width:40px !important;"> ACTUAL</span></td>
													<td><span style="width:40px !important;">SET /</span><span style="width:40px !important;"> ACTUAL</span></td>
                                                    <td colspan="2"></td>

                                                </tr>
													 <tr>

                                                    <td class="bg-color" colspan="3">TEMP(°C)</td>

                                                    <td><input type="text" style="width:40px !important;" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>">
                          <input type="text" style="width:40px !important;" id="curbeizing_temp1" name="curbeizing_temp1" value="<?php echo $response['curbeizing_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>">
                          <input type="text" style="width:40px !important;" id="diffusion_temp1" name="diffusion_temp1" value="<?php echo $response['diffusion_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>">
                          <input type="text" style="width:40px !important;" id="hardening_temp1" name="hardening_temp1" value="<?php echo $response['hardening_temp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>">
                          <input type="text" style="width:40px !important;"  id="quench_oil_temp1" name="quench_oil_temp1" value="<?php echo $response['quench_oil_temp1']; ?>"></td>
                                                    <td><input type="text" style="width:40px !important;" id="temp_tempering" name="temp_tempering" value="<?php echo $response['temp_tempering']; ?>">
                          <input type="text" style="width:40px !important;"  id="temp_tempering1" name="temp_tempering1" value="<?php echo $response['temp_tempering1']; ?>"></td>
                                                    <!--<td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>" style="width:40px !important;display: none;"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>" style="width:40px !important;display: none;"></td>-->
                                                   <td rowspan="3" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 250px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
                         <?php } else{ ?>

                                                <tr>

                                                    <td class="bg-color" colspan="3">TEMP(°C)</td>

                                                    <td><input type="text" id="curbeizing_temp" name="curbeizing_temp" value="<?php echo $response['curbeizing_temp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_temp" name="diffusion_temp" value="<?php echo $response['diffusion_temp']; ?>"></td>

                                                    <td><input type="text" id="hardening_temp" name="hardening_temp" value="<?php echo $response['hardening_temp']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_temp" name="quench_oil_temp" value="<?php echo $response['quench_oil_temp']; ?>"></td>
                                                    <td><input type="text" style="width:40px !important;" id="temp_tempering" name="temp_tempering" value="<?php echo $response['temp_tempering']; ?>">
                          <input type="text" style="width:40px !important;"  id="temp_tempering1" name="temp_tempering1" value="<?php echo $response['temp_tempering1']; ?>"></td>
                                                    <td><input type="text" id="in_time" name="in_time" value="<?php echo $response['in_time']; ?>" style="width:40px !important;"></td>

                                                    <td><input type="text" id="out_time" name="out_time" value="<?php echo $response['out_time']; ?>" style="width:40px !important;"></td>

                                                </tr>

                         <?php } ?>
                         <?php if($response['customer'] == 'JOHN DEERE'){?>
                                                <tr>

                                                    <td class="bg-color" colspan="3">TIME(Minute)</td>

                                                    <td><input type="text" style="width:40px !important;" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>">
                          <input type="text" style="width:40px !important;" id="curbeizing_time1" name="curbeizing_time1" value="<?php echo $response['curbeizing_time1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>">
                          <input type="text" style="width:40px !important;" id="diffusion_time1" name="diffusion_time1" value="<?php echo $response['diffusion_time1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>">
                          <input type="text" style="width:40px !important;" id="hardening_time1" name="hardening_time1" value="<?php echo $response['hardening_time1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;display: none;" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>">
                          <input type="text" style="width:40px !important;display: none;" id="quench_oil_time1" name="quench_oil_time1" value="<?php echo $response['quench_oil_time1']; ?>"></td>
                                                      <td><input type="text" style="width:40px !important;" id="time_tempering" name="time_tempering" value="<?php echo $response['time_tempering']; ?>">
                          <input type="text" style="width:40px !important;"  id="time_tempering1" name="time_tempering1" value="<?php echo $response['time_tempering1']; ?>"></td>
                                                   

                                                </tr>
                        <?php } else{ ?>
                         <tr>

                                                    <td class="bg-color" colspan="3">TIME(Minute)</td>

                                                    <td><input type="text" id="curbeizing_time" name="curbeizing_time" value="<?php echo $response['curbeizing_time']; ?>"></td>

                                                    <td><input type="text" id="diffusion_time" name="diffusion_time" value="<?php echo $response['diffusion_time']; ?>"></td>

                                                    <td><input type="text" id="hardening_time" name="hardening_time" value="<?php echo $response['hardening_time']; ?>"></td>

                                                    <td><input type="text" id="quench_oil_time" name="quench_oil_time" value="<?php echo $response['quench_oil_time']; ?>"></td>
                                                    <td><input type="text" style="width:40px !important;" id="time_tempering" name="time_tempering" value="<?php echo $response['time_tempering']; ?>">
                          <input type="text" style="width:40px !important;"  id="time_tempering1" name="time_tempering1" value="<?php echo $response['time_tempering1']; ?>"></td>
                                                    <td rowspan="2" colspan="2"><textarea id="process_remark" name="process_remark" placeholder="REMARK" style="width: 250px;height: 64px;" value="<?php echo $response['process_remark']; ?>"><?php echo $response['process_remark']; ?></textarea></td>

                                                </tr>
                        <?php } ?>
                        <?php if($response['customer'] == 'JOHN DEERE'){?>

                                                <tr>

                                                    <td class="bg-color" colspan="3">C.P.</td>

                                                    <td><input type="text" style="width:40px !important;"  id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>">
                          <input type="text" style="width:40px !important;"  id="curbeizing_cp1" name="curbeizing_cp1" value="<?php echo $response['curbeizing_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;"  id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>">
                          <input type="text" style="width:40px !important;"  id="diffusion_cp1" name="diffusion_cp1" value="<?php echo $response['diffusion_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;"  id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>">
                          <input type="text" style="width:40px !important;"  id="hardening_cp1" name="hardening_cp1" value="<?php echo $response['hardening_cp1']; ?>"></td>

                                                    <td><input type="text" style="width:40px !important;display: none;"  id="quench_oil_cp1" name="quench_oil_cp1" value="<?php echo $response['quench_oil_cp1']; ?>">
                          <input type="text" style="width:40px !important;display: none;" id="quench_oil_cp" name="quench_oil_cp"   value="<?php echo $response['quench_oil_cp']; ?>">

                                                </td>

                                                <td><input type="text" style="width:40px !important;display: none;" id="cp_tempering" name="cp_tempering" value="<?php echo $response['cp_tempering']; ?>">
                          <input type="text" style="width:40px !important;display: none;"  id="cp_tempering1" name="cp_tempering1" value="<?php echo $response['cp_tempering1']; ?>"></td>

                                                </tr>
                        <?php } else{ ?>
                                                <tr>

                                                    <td class="bg-color" colspan="3">C.P.</td>

                                                    <td><input type="text" id="curbeizing_cp" name="curbeizing_cp" value="<?php echo $response['curbeizing_cp']; ?>"></td>

                                                    <td><input type="text" id="diffusion_cp" name="diffusion_cp" value="<?php echo $response['diffusion_cp']; ?>"></td>

                                                    <td><input type="text" id="hardening_cp" name="hardening_cp" value="<?php echo $response['hardening_cp']; ?>"></td>

                                                    <td><div class="input-append"><input type="text" id="quench_oil_cp" name="quench_oil_cp" size="16" class="span9" value="<?php echo $response['quench_oil_cp']; ?>"><span class="add-on">RPM</span>

                                                </div></td>
                                                <td><input type="text" style="width:40px !important;" id="cp_tempering" name="cp_tempering" value="<?php echo $response['cp_tempering']; ?>">
                          <input type="text" style="width:40px !important;"  id="cp_tempering1" name="cp_tempering1" value="<?php echo $response['cp_tempering1']; ?>"></td>

                                                </tr>
                        <?php } ?> 

                       </table>
		</td>
	</tr>
	<?php } ?>
	<tr id="p5">
		<td colspan="10" style="background-color:#ccc;text-align: left;">
		<?php if($response['customer']=="VOLVO"){ echo "1) Material Grade:"; }
			  else { echo "1) Raw Material :";}
		?>						 
		<input  type="text" name="grade" id="grade" value="<?php echo $response['grade'] ?>" onkeyup="getraw_no()"/></td>
		<td colspan="2" style="background-color:#ccc;text-align: left;">Steel Code :<input  type="text" id="steel_code" name="steel_code" value="<?php echo $response['steel_code'] ?>" onkeyup="getheat_no()"></td>
	</tr>
	<tr id="p2" >
		<td>1.1 Chemistry : </td>
	</tr>
	<tr id="p3" ><td colspan="12">
<table class="table display nowrap table-bordered">
	<tr>
		<td colspan="2">Elements (%) <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </td>
		<td>C</td>
		<td>Mn</td>
		<td>S</td>
        <td>P</td>
		<td>Si</td>
		<td>Ni</td>
		<td>Cr</td>
        <td>Mo</td>
        <td>V</td>
		<td>Al</td>
		<td>B</td>
		<td>Cu</td>
    </tr>
	<tr>
		<td rowspan="2"></td>
		<td>Min</td>
				<?php
                    for($i=0; $i<12; $i++) {
                         echo  '<td><input class="size" type="text" id="chemical_composition_min'.$i.'" name="chemical_composition_min[]" value='.$chemical_composition_min[$i].'></td>';
                    }
                ?>
    </tr>
	<tr>
		<td>Max</td>
				<?php
                    for($i=0; $i<12; $i++) {
                        echo  '<td><input class="size" type="text" id="chemical_composition_max'.$i.'" name="chemical_composition_max[]" value='.$chemical_composition_max[$i].'></td>';
                    }
				?>
	</tr>
	<tr>
		<td colspan="2">Observations </td>
				<?php
                    for($i=0; $i<12; $i++) {
				?>
                <td><input class="size" type="text" id="chemical_composition_milltc<?php echo $i; ?>" name="chemical_composition_milltc[]" value="<?php echo $chemical_composition_milltc[$i];?>" onkeyup="check_mid(<?php echo $i; ?>,this)"></td>
				 <script>
				 $(document).ready(function(){
					check_mid(<?php echo $i; ?>,chemical_composition_milltc<?php echo $i; ?>)
				 });
				 </script>													
				<?php  
				}
                ?>
    </tr>
							<tr id="p4">
							<td rowspan="3" colspan="6">1.2 Inclusion Rating :<br>(Worst Field Rating)</td>
							<td rowspan="2" colspan="2">Specification</td>
							<td colspan="2">Type <i class="fa fa-long-arrow-right" aria-hidden="true"></i></td>
							<td>A</td>
							<td>B</td>
							<td>C</td>
							<td>D</td>
							</tr>
							<tr id="p4">
							<td rowspan="2">T/H</td>
							<td>Max</td>
							<td>3/2</td><td>3/2</td><td>1/1</td><td>2/1.5</td>
							</tr>
							<tr id="p4">
							<td colspan="2">Observations</td>
							<td></td>
							<?php
                                                                         for($i=0; $i<4; $i++) {
                                                                    echo  '<td><input class="size" type="text" id="inclu'.$i.'" name="inclu[]" value='.$inclu[$i].'></td>';
                                                                         }
                                                                       ?>
							</tr></div>
							</table></td>
							</tr>
							<tr>
                            <td colspan="12" style="background-color:#ccc;text-align: left;">
							2) Heat Treatment: JDV2 HT10T per JDV 21-Case carburised, hardened & tempered</td>
                                 </tr>
								 <tr>
								 <td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr><td colspan="6" rowspan="10" style="width:50%;"><div id="graph"></div></td>
								 <td colspan="6">2.1 Hardness</td></tr>
								 <tr><td><strong>Location</strong></td><td><strong>Specification</strong></td><td><strong>Observations</strong></td></tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_surface_hard1_location" value="<?php echo $response['metallurgical_test_surface_hard1_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_surface_hard1_requirement" value="<?php echo $response['metallurgical_test_surface_hard1_requirement'].' '.$response['surface_hardnessloc_value']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_surface_hard1_observation" value="<?php echo $response['metallurgical_test_surface_hard1_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_location" value="<?php echo $response['metallurgical_test_core_hardness_rcd_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_requirement" value="<?php echo $response['metallurgical_test_core_hardness_rcd_requirement'].' '.$response['core_hardness_value2']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_core_hardness_rcd_observation" value="<?php echo $response['metallurgical_test_core_hardness_rcd_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="surface_hardness_location_after_grind" value="<?php echo $response['surface_hardness_location_after_grind']; ?>"></td>
								 <td><input class="size1" type="text" name="surface_hardness_requirement_after_grind" value="<?php echo $response['surface_hardness_requirement_after_grind']; ?><?php echo $response['surface_hardness_value_after_grind']; ?>"></td>
								 <td><input class="size1" type="text" name="remark_observe3" value="<?php echo $response['remark_observe3']; ?>"></td>
								 </tr>
								 <tr>
								 <td colspan="12">2.2 Effective Case Depth at <input class="" type="text" name="cut_off_point" value="<?php echo $response['cut_off_point']; ?>"></td> 
								 </tr>
								 <tr><td><strong>Location</strong></td><td><strong>Specification (mm)</strong></td><td><strong>Observations (mm)</strong></td></tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_location" value="<?php echo $response['metallurgical_test_case_depth_pcd_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_requirement" value="<?php echo $response['metallurgical_test_case_depth_pcd_requirement']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_pcd_observation" value="<?php echo $response['metallurgical_test_case_depth_pcd_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="metallurgical_test_case_depth_location" value="<?php echo $response['metallurgical_test_case_depth_location']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_requirement" value="<?php echo $response['metallurgical_test_case_depth_requirement']; ?>"></td>
								 <td><input class="size1" type="text" name="metallurgical_test_case_depth_observation" value="<?php echo $response['metallurgical_test_case_depth_observation']; ?>"></td>
								 </tr>
								 <tr><td><input class="size1" type="text" name="eff_after_grinding_location1" value="<?php echo $response['eff_after_grinding_location1']; ?>"></td>
								 <td><input class="size1" type="text" name="eff_after_grinding_requirement1" value="<?php echo $response['eff_after_grinding_requirement1']; ?>"></td>
								 <td><input class="size1" type="text" name="remark_observe1" value="<?php echo $response['remark_observe1']; ?>"></td>
								 </tr>
								 </table>
								 </td>
								 </tr>
								 
						<tr>
								 <td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr><td colspan="6">2.3 Hardness traverse in Hv (Distance from surface) <a class="btn btn-primary" href="#" onclick="generateGraph()">EditGraph</a></td></tr>
								 <tr>
									<td>in mm</td>
									<td>0.1</td>
									<td>0.2</td>
									<td>0.3</td>
                                    <td>0.4</td>
									<td>0.5</td>
									<td>0.6</td>
									<td>0.7</td>
                                    <td>0.8</td>
                                    <td>0.9</td>
                                    <td>1.0</td>
									<td>1.1</td>
									<td>1.2</td>
									<td>1.3</td>
									<td>1.4</td>
									<td>1.5</td>
									<td>1.6</td>
									<td>1.7</td>
									<td>1.8</td>
									<td>1.9</td>
									<td>2.0</td>

								 </tr>
								  <tr>
									<td>PCD</td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_pcd[]" value="<?php echo $hardness_traverse_pcd[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								  <tr>
									<td>RCD</td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_rcd[]" value="<?php echo $hardness_traverse_rcd[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								  <tr>
									<td><input type="text" name="hardness_traverse_value" value="<?php echo $response['hardness_traverse_value'] ?>"></td>
									<?php for($i=1; $i<21; $i++){ ?>
									<td><input class="size" type="text" name="hardness_traverse_od[]" value="<?php echo $hardness_traverse_od[$i]; ?>"/></td>
									<?php } ?>
								 </tr>
								 </table>
								</td>
						</tr>		
						<tr>
								<td colspan="12">
								 <table class="table display nowrap table-bordered">
								 <tr>
								
								 
								  <td colspan="12">2.4 Microstructure: Inspect as per JDV21</td>
								 
								 </tr>
						<tr> <?php if($response['customer']=="JOHN DEERE"){ ?>
						 <td>Microstructure Photographs</td>
						<?PHP } ?>
						 <td><strong>Location</strong></td>
						 <td><strong>Specification</strong></td>
						 <td><strong>Observation</strong></td>
						</tr>
								 <tr> 
								 <td rowspan="3">500x</td>
						
								 <td><input class="size1" type="text" name="micro_photo_location" value="<?php if($response['micro_photo_location']){ echo $response['micro_photo_location']; } else{ echo 'Case'; } ?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_specification" value="<?php if($response['micro_photo_specification']){ echo $response['micro_photo_specification']; } else{ echo 'Fully Tempered Martensite R.A'; } ?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_observation" value="<?php if($response['micro_photo_observation']){ echo $response['micro_photo_observation']; } else{ echo 'Fully Tempered Martensite'; } ?>"/></td>
								 </tr>
					
								 <tr>
								 <td><input class="size1" type="text" name="metallurgical_test_micro_case_location" value="<?php if($response['metallurgical_test_micro_case_location']){ echo $response['metallurgical_test_micro_case_location']; } else{ echo 'Case'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_micro_case_requirement" value="<?php if($response['metallurgical_test_micro_case_requirement']){ echo $response['metallurgical_test_micro_case_requirement']; } else{ echo '25% Max*'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_micro_case_observation" value="<?php if($response['metallurgical_test_micro_case_observation']){ echo $response['metallurgical_test_micro_case_observation']; } else{ echo '10%'; } ?>"/></td>
								 </tr>
								 <tr>
								 <td><input class="size1" type="text" name="micro_photo_location3" value="<?php if($response['micro_photo_location3']){ echo $response['micro_photo_location3']; } else {echo 'Carbides Network '; }?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_specification3" value="<?php if($response['micro_photo_specification3']){ echo $response['micro_photo_specification3']; } else{ echo 'Nil'; } ?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_observation3" value="<?php if($response['micro_photo_observation3']){ echo $response['micro_photo_observation3']; } else{ echo 'Nil'; } ?>"/></td>
								 </tr>
							
								 <tr>
								 <td rowspan="3">100x</td>
								 <td><input class="size1" type="text" name="micro_photo_itp_location" value="<?php if($response['micro_photo_itp_location']){ echo $response['micro_photo_itp_location']; } else{ echo '% ITP at Surface'; } ?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_itp_specification" value="<?php if($response['micro_photo_itp_specification']){ echo $response['micro_photo_itp_specification']; } else{ echo 'Nil'; } ?>"/></td>
								 <td><input class="size1" type="text" name="micro_photo_itp_observation" value="<?php if($response['micro_photo_itp_observation']){ echo $response['micro_photo_itp_observation']; } else{ echo 'Nil'; } ?>"/></td>
								 </tr>
								 
								 <tr>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_pcd_location" value="<?php if($response['metallurgical_test_itp_sub_surface_pcd_location']){ echo $response['metallurgical_test_itp_sub_surface_pcd_location']; } else{ echo '5% Depth of ITP at PCD = '; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_pcd_requirement" value="<?php if($response['metallurgical_test_itp_sub_surface_pcd_requirement']){ echo $response['metallurgical_test_itp_sub_surface_pcd_requirement']; } else{ echo 'ECD/2'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_pcd_observation" value="<?php if($response['metallurgical_test_itp_sub_surface_pcd_observation']){ echo $response['metallurgical_test_itp_sub_surface_pcd_observation']; } else{ echo '0.47'; } ?>"/></td>
								 </tr>
								 <tr>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_rcd_location" value="<?php if($response['metallurgical_test_itp_sub_surface_rcd_location']){ echo $response['metallurgical_test_itp_sub_surface_rcd_location']; } else{ echo '5% Depth of ITP at Root'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_rcd_requirement" value="<?php if($response['metallurgical_test_itp_sub_surface_rcd_requirement']){ echo $response['metallurgical_test_itp_sub_surface_rcd_requirement']; } else{ echo 'ECD/4'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_itp_sub_surface_rcd_observation" value="<?php if($response['metallurgical_test_itp_sub_surface_rcd_observation']){ echo $response['metallurgical_test_itp_sub_surface_rcd_observation']; } else{ echo '0.33'; } ?>"/></td>
								 </tr>
						
								  <tr>
								 <td>500x</td>
								 <td><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_location" value="<?php if($response['metallurgical_test_gbo_igo_rcd_location']){ echo $response['metallurgical_test_gbo_igo_rcd_location']; } else{ echo 'Grain Boundary Oxidation'; } ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_requirement" value="<?php if($response['metallurgical_test_gbo_igo_rcd_requirement']){ echo $response['metallurgical_test_gbo_igo_rcd_requirement']; }  ?>"/></td>
								 <td><input class="size1" type="text" name="metallurgical_test_gbo_igo_rcd_observation" value="<?php if($response['metallurgical_test_gbo_igo_rcd_observation']){ echo $response['metallurgical_test_gbo_igo_rcd_observation']; } ?>"/></td>
								 </tr>
								 
								 <tr>
								 
								 <td>500x</td>
								
								 <td ><input class="size1" type="text" name="metallurgical_test_micro_core_location" value="<?php if($response['metallurgical_test_micro_core_location']){ echo $response['metallurgical_test_micro_core_location']; }  else{ echo 'Core'; } ?>"/></td>
								 <td ><input class="size1" type="text" name="metallurgical_test_micro_core_requirement" value="<?php if($response['metallurgical_test_micro_core_requirement']){ echo $response['metallurgical_test_micro_core_requirement']; } ?>"/></td>
								 <td ><input class="size1" type="text" name="metallurgical_test_micro_core_observation" value="<?php if($response['metallurgical_test_micro_core_observation']){ echo $response['metallurgical_test_micro_core_observation']; } ?>"/></td>
								 </tr>
								 <tr>
						
								 <td>Magnetic Particle Inspection</td>
								
								 <td rowspan="3"><input class="size1" type="text" name="mag_loc" value="<?php if($response['mag_loc']){ echo $response['mag_loc']; } else{ echo 'No Crack Allowed'; } ?>"/></td>
								 <td rowspan="3"><input class="size1" type="text" name="mag_spec" value="<?php if($response['mag_spec']){ echo $response['mag_spec']; }else { echo '5 part/lot';} ?>"/></td>
								 <td rowspan="3"><input class="size1" type="text" name="mag_obser" value="<?php if($response['mag_obser']){ echo $response['mag_obser'];} else{ echo 'No Crack Found';} ?>"/></td>
								 </tr>
								 </table>
								</td>
						</tr>
						<tr><td colspan="12">
						*- In case RA is more than 25%, check Hardness(with 100 gm load) at 0.1 mm it should be 58 HRC Min.
						</td></tr>
						
						<tr>
						<td colspan="12" >Disposition: <input type="text" name="disposition" value="<?php echo $response['disposition'] ?>"></td>
						</tr>
						<tr>
						<td colspan="12">Remarks : <textarea name="remark" style="width:1000px;">OK</textarea></td>
						
						</tr>
						
                                                 <tr>
                                    <td>Checked By</td>
                                    			<td colspan="3">
                                                   <select class="size1" id="checked_by" name="checked_by" required="">

                                                            <option value="">SELECT</option>



                                                        <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';

                                                        $result =$crud->getAllData($query);

                                                          foreach ($result as $key => $value) {

                                                               if($value['id'] == $response['checked_by']){

                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';



                                                               }

                                                               else{



                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                               }  

                                                              

                                                          }

                                                        ?>

                                                            

                                                        </select></td>
                                                        <td>Prepared By</td>
                                                        <td colspan="3" id="verified_by_td">
                                                   <select class="size1" id="verified_by" name="verified_by" required="">

                                                            <option value="">SELECT</option>



                                                        <?php $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("15",custom_field)';

                                                        $result =$crud->getAllData($query);

                                                          foreach ($result as $key => $value) {

                                                               if($value['id'] == $response['verified_by']){

                                                            echo '<option value="'.$value['id'].'" selected="selected">'.$value['full_name'].'</option>';



                                                               }

                                                               else{



                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';

                                                               }  

                                                              

                                                          }

                                                        ?>

                                                            

                                                        </select><span class="showError" style="color:red;display: none;">This field is required</span></td>
                                    
                                    <td>Approved by :- </td><td colspan="3"><?php $q = 'SELECT full_name FROM users WHERE id='.$response['approved_by'];
                                      $rs = $crud->getSingleRow($q); ?> <input class="size1" type="text" value="<?php echo $rs['full_name'] ?>" readOnly/>
                                      <input type="hidden" name="approved_by" value="<?php echo $response['approved_by']; ?>"></td>
                                  </tr>


							                                </table>
						</div>


                            </div>

                            

                        </div>

                    </div>

                     

                </div>

                

                

            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>
        <script type="text/javascript">
        	$(document).ready(function(){
				generateGraph();

        	});
		    $(document).ready(function(){
				getheat_no();

        	});
			$(document).ready(function(){
				getraw_no();

        	});
			$(document).ready(function(){
				get_quench();

        	});
			function reset(id){
				window.location = 've_reports_2?id='+id +'&reset_id='+1;
			}
			function check_mid(id,arg)
			{
				var j_min = $('#chemical_composition_min'+id).val();
				var j_max = $('#chemical_composition_max'+id).val();
				if(isNaN(j_min)){
                  j_min = 0;
                 }
                 else{
                  j_min = j_min;
                 }
                 if(isNaN(j_max)){
                  j_max = 0;
                 }
                 else{
                  j_max = j_max;
                 } 
			     var sid = arg.getAttribute('id');
				 var j_mil = arg.value;
				 if(isNaN(j_mil)){
                  j_mil = 0;
                 }
                 else{
                  j_mil = j_mil;
                 }
				 j_min = parseFloat(j_min);
				 j_max = parseFloat(j_max);
				 j_mil = parseFloat(j_mil);
				 if(j_mil<j_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(j_mil<j_max){
					  $('#'+sid).removeClass('error1');
				 }
			}	

			function get_quench(){
            $.ajax({
				type : "POST",
                url : 'get_quench.php',
                data : {
                   furnace_no : $('#furnace_no').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status == 1){
                    console.log(response.data.oil_grade);
                    var oil_grade = response.data.oil_grade;
					console.log(oil_grade);
					$('#qch_grade').val(oil_grade);
                    
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
			 function getraw_no(){
            $.ajax({
				type : "POST",
                url : 'getraw_no.php',
                data : {
                   grade : $('#grade').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status == 1){
                    console.log(response.data);
                    var chemical_composition_min = response.data.min.split(',');
                    var chemical_composition_max = response.data.max.split(',');
				
                    $.each(chemical_composition_min,function(i,val){
                       $('#chemical_composition_min'+i).val(val);
                    });
                    $.each(chemical_composition_max,function(i,val){
                       $('#chemical_composition_max'+i).val(val);
					   var j_min = $('#chemical_composition_min'+i).val();
				       var j_max = $('#chemical_composition_max'+i).val();
					   var j_mil = $('#chemical_composition_milltc'+i).val();
				       if(isNaN(j_min)){
                       j_min = 0;
                       }
                       else{
					   j_min = j_min;
					   }
					   if(isNaN(j_max)){
                       j_max = 0;
                       }
                       else{
                       j_max = j_max;
                       } 
					   var sid = 'chemical_composition_milltc'+i;
				       if(isNaN(j_mil)){
                  j_mil = 0;
                 }
                 else{
                  j_mil = j_mil;
                 }
				 j_min = parseFloat(j_min);
				 j_max = parseFloat(j_max);
				 j_mil = parseFloat(j_mil);
				 if(j_mil<j_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(j_mil<j_max){
					  $('#'+sid).removeClass('error1');
				 }
					   
					   });
					   
					
                    
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
		
		  function getheat_no(){
            $.ajax({
				type : "POST",
                url : 'getheat_no.php',
                data : {
                   steel_code : $('#steel_code').val()
                },
                dataType : "JSON",
                success : function(response){
                  if(response.status == 1){
                   
					var chemical_composition_milltc = response.data.chemical_composition_milltc.split('*');
					var inclusion_rating_act_tn = response.data.inclusion_rating_act_tn.split('*');
					var inclusion_rating_act_tk = response.data.inclusion_rating_act_tk.split('*');
                    if(response.data.heat_no!=''){
					var heat_no = response.data.heat_no;
					$('#heat_no').val(heat_no);
                   
					   $.each(chemical_composition_milltc,function(i,val){ 
                       $('#chemical_composition_milltc'+i).val(val);
					   var j_min = $('#chemical_composition_min'+i).val();
				       var j_max = $('#chemical_composition_max'+i).val();
				       if(isNaN(j_min)){
                       j_min = 0;
                       }
                       else{
					   j_min = j_min;
					   }
					   if(isNaN(j_max)){
                       j_max = 0;
                       }
                       else{
                       j_max = j_max;
                       } 
					   var sid = 'chemical_composition_milltc'+i;
				       var j_mil = val;
				       if(isNaN(j_mil)){
                  j_mil = 0;
                 }
                 else{
                  j_mil = j_mil;
                 }
				 j_min = parseFloat(j_min);
				 j_max = parseFloat(j_max);
				 j_mil = parseFloat(j_mil);
				 if(j_mil<j_min){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_max){
					 $('#'+sid).addClass('error1');
				 }
				 else if(j_mil>j_min){
					  $('#'+sid).removeClass('error1');
				 }
				 else if(j_mil<j_max){
					  $('#'+sid).removeClass('error1');
				 }
				   });
				   
				   
                    $.each(inclusion_rating_act_tn,function(i,val){
						var inclu= val+'/'+inclusion_rating_act_tk[i];
                       $('#inclu'+i).val(inclu);
				   });		
                    }
                    // $('#min').append(mindata);
                    // $('#max').append(maxdata);
                  }
                }
            });
           }
		   
		$(function() {
			if($('#customer').val() == 'REML' || $('#customer').val() == 'ETB' || $('#customer').val() == 'FORCE MOTOR'){
					$('#p,#p1,#p2,#p3').hide();
			}
			if($('#customer').val() == 'ZF' || $('#customer').val() == 'POLARIS' || $('#customer').val() == 'TAFE' || $('#customer').val() == 'CNH' || $('#customer').val() == 'VOLVO'){
					$('#p,#p1,#p4').hide();
			}
			if($('#customer').val() == 'FORCE MOTOR'){
					$('#p5').hide();
			}
		});
		
        			function generateGraph(){
        	var pcd =[]; var rcd = []; var od = [];
        	var x = $('input[name="hardness_traverse_value"]').val();
        	$('input[name^="hardness_traverse_pcd"]').each(function() {

                  if($(this).val() == ''){

                          pcd.push(null);

                        }

                        else{

                         pcd.push(parseInt($(this).val())); 

                        }

                });
        	$('input[name^="hardness_traverse_rcd"]').each(function() {

                  if($(this).val() == ''){

                          rcd.push(null);

                        }

                        else{

                         rcd.push(parseInt($(this).val())); 

                        }

                });
        	$('input[name^="hardness_traverse_od"]').each(function() {

                  if($(this).val() == ''){

                          od.push(null);

                        }

                        else{

                         od.push(parseInt($(this).val())); 

                        }

                });
        	var cut_off = $('#cut_off').val();
        	$('#graph').highcharts({

        title: {

            text: 'HARDNESS TRAVERSE GRAPH',

            x: -20 //center

        },

        

        xAxis: {

            title:{

               text : 'Distance in MM'

            },

            categories: ['0.1', '0.2', '0.3', '0.4', '0.5','0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3','1.4','1.5','1.6','1.7','1.8','1.9','2.0'],

               

        },
        

        yAxis: {

            title: {

                text: 'Hardness in Hv'

            },

            plotLines: [{

                value: cut_off,

                width: 2,

                color: 'red',

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

            data: pcd

        }, {

          connectNulls: true,

            name: 'RCD',

            data: rcd

        }, {

          connectNulls: true,

            name: x,

            data: od

        }]

    }); 
          setTimeout(function(){
	save_chart($('#graph').highcharts(), 'chart');
	$('.word').css('display','block');
},2000);
      }
	var EXPORT_WIDTH = 350;
	function save_chart(chart, filename) {
    var render_width = EXPORT_WIDTH;
    var render_height = render_width * chart.chartHeight / chart.chartWidth

    var svg = chart.getSVG({
        exporting: {
            sourceWidth: chart.chartWidth,
            sourceHeight: chart.chartHeight
        }
    });

    var canvas = document.createElement('canvas');
    canvas.height = render_height;
    canvas.width = render_width;

    var image = new Image;
    image.onload = function() {
        canvas.getContext('2d').drawImage(this, 0, 0, render_width, render_height);
        var data = canvas.toDataURL("image/png")
        $('#image_graph').val(data);
    };
    image.src = 'data:image/svg+xml;base64,' + window.btoa(svg);
}
	
	function saveData(save){
		if($('#verified_by option:selected').val()  == ''){
			$.sticky('select Verified by', {autoclose : 3000, position: "top-center", type: "st-success" });			
			$('.showError').css('display','block');
			$('#verified_by_td').addClass('f-error');
			return false;
		}
		else{
			$('#verified_by_td').removeClass('f-error');

			$('.showError').css('display','none');
		}
		var r = 1;
		var x = '';
			$('input[name^="chemical_composition_min"]').each(function() {
                     if(r==1){
						 x+=$(this).val();
					 }
					 else {
						 x+='*'+$(this).val();
					 }
					 r++;
                });
				
			    var r1 =1;
				var sae_max = '';
			$('input[name^="chemical_composition_max"]').each(function() {
                     if(r1==1){
						 sae_max+=$(this).val();
					 }
					 else {
						 sae_max+='*'+$(this).val();
					 }
					 r1++;
                });
				
				var r2 =1;
				var che_obs = '';
			$('input[name^="chemical_composition_milltc"]').each(function() {
                     if(r2==1){
						 che_obs+=$(this).val();
					 }
					 else {
						 che_obs+='*'+$(this).val();
					 }
					 r2++;
                });
				
				var r3 =1;
				var pcd = '';
			$('input[name^="hardness_traverse_pcd"]').each(function() {
                     if(r3==1){
						 pcd+='*'+$(this).val();
					 }
					 else {
						 pcd+='*'+$(this).val();
					 }
					 r3++;
                });
				
				var r4 =1;
				var rcd = '';
			$('input[name^="hardness_traverse_rcd"]').each(function() {
                     if(r4==1){
						 rcd+='*'+$(this).val();
					 }
					 else {
						 rcd+='*'+$(this).val();
					 }
					 r4++;
                });
				var r5 =1;
				var od = '';
			$('input[name^="hardness_traverse_od"]').each(function() {
                     if(r5==1){
						 od+='*'+$(this).val();
					 }
					 else {
						 od+='*'+$(this).val();
					 }
					 r5++;
                });		
               var r6 =1;
				var inc = '';
			$('input[name^="inclu"]').each(function() {
                     if(r6==1){
						 inc+=$(this).val();
					 }
					 else {
						 inc+='*'+$(this).val();
					 }
					 r6++;
                });						
				
          var data = {  
		  curbeizing_time : $('input[name="curbeizing_time"]').val(),
		  curbeizing_time1 : $('input[name="curbeizing_time1"]').val(),
		  diffusion_time : $('input[name="diffusion_time"]').val(),
		  diffusion_time1 : $('input[name="diffusion_time1"]').val(),
		  hardening_time : $('input[name="hardening_time"]').val(),
		  hardening_time1 : $('input[name="hardening_time1"]').val(),
		  quench_oil_time : $('input[name="quench_oil_time"]').val(),
		  quench_oil_time1 : $('input[name="quench_oil_time1"]').val(),
		  time_tempering : $('input[name="time_tempering"]').val(),
		  time_tempering1 : $('input[name="time_tempering1"]').val(),
		  process_remark : $('textarea[name="process_remark"]').val(),
		  furnace_no : $('input[name="furnace_no"]').val(),
		  curbeizing_temp : $('input[name="curbeizing_temp"]').val(),
		  curbeizing_temp1 : $('input[name="curbeizing_temp1"]').val(),
		  diffusion_temp : $('input[name="diffusion_temp"]').val(),
		  diffusion_temp1 : $('input[name="diffusion_temp1"]').val(),
		  hardening_temp : $('input[name="hardening_temp"]').val(),
		  hardening_temp1 : $('input[name="hardening_temp1"]').val(),
		  curbeizing_cp : $('input[name="curbeizing_cp"]').val(),
		  curbeizing_cp1 : $('input[name="curbeizing_cp1"]').val(),
		  diffusion_cp : $('input[name="diffusion_cp"]').val(),
		  diffusion_cp1 : $('input[name="diffusion_cp1"]').val(),
		  hardening_cp : $('input[name="hardening_cp"]').val(),
		  hardening_cp1 : $('input[name="hardening_cp1"]').val(),
		  quench_oil_cp : $('input[name="quench_oil_cp"]').val(),
		  quench_oil_cp1 : $('input[name="quench_oil_cp1"]').val(),
		  cp_tempering : $('input[name="cp_tempering"]').val(),
		  cp_tempering1 : $('input[name="cp_tempering1"]').val(),
		  qch_grade : $('input[name="qch_grade"]').val(),
		  quench_oil_temp : $('input[name="quench_oil_temp"]').val(),
		  quench_oil_temp1 : $('input[name="quench_oil_temp1"]').val(),
		  temp_tempering : $('input[name="temp_tempering"]').val(),
		  temp_tempering1 : $('input[name="temp_tempering1"]').val(),
		  in_time : $('input[name="in_time"]').val(),
		  out_time : $('input[name="out_time"]').val(),
		  grade : $('input[name="grade"]').val(),
		  steel_code : $('input[name="steel_code"]').val(),
		  disposition : $('input[name="disposition"]').val(),
		  hardness_traverse_value : $('input[name="hardness_traverse_value"]').val(),
		  temper_time : $('input[name="temper_time"]').val(),
		  temper_temp : $('input[name="temper_temp"]').val(),

		  chemical_composition_min : x,
		  chemical_composition_max : sae_max,
		  chemical_composition_milltc : che_obs,
		  
		  //inclusion
		  inclu : inc,
		  
		  inclu_rat_obser_a : $('input[name="inclu_rat_obser_a"]').val(),
		  inclu_rat_obser_b : $('input[name="inclu_rat_obser_b"]').val(),
		  inclu_rat_obser_c : $('input[name="inclu_rat_obser_c"]').val(),
		  inclu_rat_obser_d : $('input[name="inclu_rat_obser_d"]').val(),
		  
		  //hardness:
		  metallurgical_test_surface_hard1_location : $('input[name="metallurgical_test_surface_hard1_location"]').val(),
		  metallurgical_test_surface_hard1_requirement : $('input[name="metallurgical_test_surface_hard1_requirement"]').val(),
		  metallurgical_test_surface_hard1_observation : $('input[name="metallurgical_test_surface_hard1_observation"]').val(),
		  metallurgical_test_core_hardness_rcd_location : $('input[name="metallurgical_test_core_hardness_rcd_location"]').val(),
		  metallurgical_test_core_hardness_rcd_requirement : $('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(),
		  metallurgical_test_core_hardness_rcd_observation : $('input[name="metallurgical_test_core_hardness_rcd_observation"]').val(),
		  eff_after_grinding_location1 : $('input[name="eff_after_grinding_location1"]').val(),
		  eff_after_grinding_requirement1 : $('input[name="eff_after_grinding_requirement1"]').val(),
		  remark_observe1 : $('input[name="remark_observe1"]').val(),
          
		  cut_off : $('#cut_off').val(),
		  cut_off_point : $('input[name="cut_off_point"]').val(),
		  //effective
		  metallurgical_test_case_depth_pcd_location : $('input[name="metallurgical_test_case_depth_pcd_location"]').val(),
		  metallurgical_test_case_depth_pcd_requirement : $('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(),
		  metallurgical_test_case_depth_pcd_observation : $('input[name="metallurgical_test_case_depth_pcd_observation"]').val(),
		  metallurgical_test_case_depth_location : $('input[name="metallurgical_test_case_depth_location"]').val(),
		  metallurgical_test_case_depth_requirement : $('input[name="metallurgical_test_case_depth_requirement"]').val(),
		  metallurgical_test_case_depth_observation : $('input[name="metallurgical_test_case_depth_observation"]').val(),
		  surface_hardness_location_after_grind : $('input[name="surface_hardness_location_after_grind"]').val(),
		  surface_hardness_requirement_after_grind : $('input[name="surface_hardness_requirement_after_grind"]').val(),
		  remark_observe3 : $('input[name="remark_observe3"]').val(),
		  
		  //hardness/distance
		  hardness_traverse_pcd : pcd,
		  hardness_traverse_rcd : rcd,
		  hardness_traverse_od : od,

		  
		  //microstructure1
		  micro_photo_location : $('input[name="micro_photo_location"]').val(),
		  micro_photo_specification : $('input[name="micro_photo_specification"]').val(),
		  micro_photo_observation : $('input[name="micro_photo_observation"]').val(),
		  metallurgical_test_micro_case_location : $('input[name="metallurgical_test_micro_case_location"]').val(),
		  metallurgical_test_micro_case_requirement : $('input[name="metallurgical_test_micro_case_requirement"]').val(),
		  metallurgical_test_micro_case_observation : $('input[name="metallurgical_test_micro_case_observation"]').val(),
		  micro_photo_location3 : $('input[name="micro_photo_location3"]').val(),
		  micro_photo_specification3 : $('input[name="micro_photo_specification3"]').val(),
		  micro_photo_observation3 : $('input[name="micro_photo_observation3"]').val(),
		  
		  
		  metallurgical_test_gbo_igo_rcd_location : $('input[name="metallurgical_test_gbo_igo_rcd_location"]').val(),
		  metallurgical_test_gbo_igo_rcd_requirement : $('input[name="metallurgical_test_gbo_igo_rcd_requirement"]').val(),
		  metallurgical_test_gbo_igo_rcd_observation : $('input[name="metallurgical_test_gbo_igo_rcd_observation"]').val(),
		  
		  //microstructure2
		  micro_photo_itp_location : $('input[name="micro_photo_itp_location"]').val(),
		  micro_photo_itp_specification : $('input[name="micro_photo_itp_specification"]').val(),
		  micro_photo_itp_observation : $('input[name="micro_photo_itp_observation"]').val(),
		  metallurgical_test_itp_sub_surface_pcd_location : $('input[name="metallurgical_test_itp_sub_surface_pcd_location"]').val(),
		  metallurgical_test_itp_sub_surface_pcd_requirement : $('input[name="metallurgical_test_itp_sub_surface_pcd_requirement"]').val(),
		  metallurgical_test_itp_sub_surface_pcd_observation : $('input[name="metallurgical_test_itp_sub_surface_pcd_observation"]').val(),
		  metallurgical_test_itp_sub_surface_rcd_location : $('input[name="metallurgical_test_itp_sub_surface_rcd_location"]').val(),
		  metallurgical_test_itp_sub_surface_rcd_requirement : $('input[name="metallurgical_test_itp_sub_surface_rcd_requirement"]').val(),
		  metallurgical_test_itp_sub_surface_rcd_observation : $('input[name="metallurgical_test_itp_sub_surface_rcd_observation"]').val(),
		  
		  //remaining micro photo field:
		   metallurgical_test_gbo_igo_rcd_location : $('input[name="metallurgical_test_gbo_igo_rcd_location"]').val(),
		  metallurgical_test_gbo_igo_rcd_requirement : $('input[name="metallurgical_test_gbo_igo_rcd_requirement"]').val(),
		  metallurgical_test_gbo_igo_rcd_observation : $('input[name="metallurgical_test_gbo_igo_rcd_observation"]').val(),
		  metallurgical_test_micro_core_location : $('input[name="metallurgical_test_micro_core_location"]').val(),
		  metallurgical_test_micro_core_requirement : $('input[name="metallurgical_test_micro_core_requirement"]').val(),
		  metallurgical_test_micro_core_observation : $('input[name="metallurgical_test_micro_core_observation"]').val(),
		  
		  mag_loc : $('input[name="mag_loc"]').val(),
		  mag_spec : $('input[name="mag_spec"]').val(),
		  mag_obser : $('input[name="mag_obser"]').val()

		  
	 };

          $.ajax({

               type : "POST",

               url : 'word2.php',

               data : {

                customer : $('input[name="customer"]').val(),

                date : $('input[name="date"]').val(),

                batch_code :  $('input[name="batch_code"]').val(),

                part_no :  $('input[name="part_no"]').val(),
				
				control_plan_id :  $('input[name="control_plan_id"]').val(),
				
				report_no : $('input[name="report_no"]').val(),

                qty :  $('input[name="qty"]').val(),

                part_name :  $('input[name="part_name"]').val(),

                grade :  $('input[name="grade"]').val(),

                remark : $('textarea[name="remark"]').val(),
				heat_no : $('input[name="heat_no"]').val(),				
				report_id : $('input[name="report_id"]').val(),
				image_graph : $('input[name="image_graph"]').val(),
				checked_by : $('#checked_by option:selected').val(),
                approved_by : $('input[name="approved_by"]').val(),
                verified_by : $('#verified_by option:selected').val(),
                data : JSON.stringify(data)
              },
			  dataType : "JSON",

              success : function(res){
				if(save==0)
				  {
                window.location = 'download2.php?id='+res.data;
				}else if(save == 2){
					window.location = 'report1_pdf?id='+res.data;
				}
				else if(save == 1){
					$.sticky('Record Saved Successfully', {autoclose : 3000, position: "top-center", type: "st-success" });
				}
               }

          });

        }

        function getRawMaterial(){

          $.ajax({

            type : 'POST',

            url : 'get_grade.php',

            data : {

              steel_code : $('input[name="steel_mill"]').val(),

              part_no : $('input[name="part_no"]').val()



            },

            dataType : "JSON",

            success : function(res){

              if(res.status ==1){

                $('input[name="heat_no"]').val(res.data.heat_no);

                $('input[name="mill_tc"]').val(res.data.mill_tc_supplier);

                $('input[name="forger_tc"]').val(res.data.forger_tc_supplier);

              }

            }

          });

        }

        function getHTControlPlan(){
        	 $.ajax({
            type : "POST",
            url : "get_part_data.php",
            data : {
                part_no : $('input[name="part_no"]').val()
            },
            dataType : "JSON",
            success : function(data){
            	if(data.status == 1){
				$('input[name="customer"]').val(data.data[0]['customer_name']);
                $('input[name="part_name"]').val(data.data[0]['part_name']);
				$('input[name="control_plan_id"]').val(data.data[0]['part_id']);
				$('input[name="grade"]').val(data.data[0]['steel_grade']);	 
             	$('input[name="metallurgical_test_surface_hard1_location"]').val(data.data[0]['surface_hardness_1']);
            	$('input[name="metallurgical_test_surface_hard1_requirement"]').val(data.data[0]['surface_hardness_2']+' '+data.data[0]['surface_hardness2_value']);
				$('input[name="metallurgical_test_core_hardness_rcd_location"]').val(data.data[0]['surface_hardness_location']);
				$('input[name="metallurgical_test_core_hardness_rcd_requirement"]').val(data.data[0]['surface_hardness_requirement']+' '+data.data[0]['surface_hardness_value_after_grind']);
            	$('input[name="surface_hardness_location_after_grind"]').val(data.data[0]['core_hardness_location1']);
				$('input[name="surface_hardness_requirement_after_grind"]').val(data.data[0]['core_hardness_requirement1']+' '+data.data[0]['core_hardness_value1']);
				$('input[name="cut_off_point"]').val(data.data[0]['cut_off']+' '+data.data[0]['cut_off_value']);

				$('input[name="metallurgical_test_case_depth_pcd_location"]').val(data.data[0]['effective_case_depth_location']);
				$('input[name="metallurgical_test_case_depth_pcd_requirement"]').val(data.data[0]['effective_case_depth_requirement']);

				 $('input[name="metallurgical_test_case_depth_location"]').val(data.data[0]['effective_case_depth_location2']);
				 $('input[name="metallurgical_test_case_depth_requirement"]').val(data.data[0]['effective_case_depth_requirement2']);

				 $('input[name="eff_after_grinding_location1"]').val(data.data[0]['after_grind_case_depth_location']);
				 $('input[name="eff_after_grinding_requirement1"]').val(data.data[0]['after_grind_case_depth_requirement']);

				 $('input[name="metallurgical_test_micro_case_location"]').val(data.data[0]['micro_structure_location']);
				 $('input[name="metallurgical_test_micro_case_requirement"]').val(data.data[0]['micro_structure_requirement']);
				
				 $('input[name="metallurgical_test_micro_core_location"]').val(data.data[0]['micro_structure_location1'])
				 $('input[name="metallurgical_test_micro_core_requirement"]').val(data.data[0]['micro_structure_requirement1']);
				
				 $('input[name="metallurgical_test_itp_sub_surface_pcd_location"]').val(data.data[0]['sub_surface_baimite_location']);
				 $('input[name="metallurgical_test_itp_sub_surface_pcd_requirement"]').val(data.data[0]['sub_surface_baimite_requirement']);
				 $('input[name="metallurgical_test_itp_sub_surface_rcd_location"]').val(data.data[0]['sub_surface_baimite_location1']);
				 $('input[name="metallurgical_test_itp_sub_surface_rcd_requirement"]').val(data.data[0]['sub_surface_baimite_requirement1']);
				 $('input[name="metallurgical_test_gbo_igo_rcd_location"]').val(data.data[0]['grain_boundary_location1']);
				$('input[name="metallurgical_test_gbo_igo_rcd_requirement"]').val(data.data[0]['grain_boundary_requirement1']);
				}
				
			 }
        	});

        }

        </script>
