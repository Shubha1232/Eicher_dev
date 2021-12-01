<?php include_once("classes/Database.php");
$crud = new Database(); 

$part_no = $_POST['part_no'];
$id = $_POST['id'];
 /* $query = "SELECT * FROM part_number WHERE id = '".$id."' ";

  $res = $crud->getSingleRow($query);*/
  
  //echo "<pre>";print_r($res);die;
	
  $query1 = "SELECT * FROM new_part_number WHERE part_no = '".$part_no."' ";

  $res1 = $crud->getSingleRow($query1);
  
 // echo "<pre>";print_r($res1);die;

  $q2 = "SELECT * FROM forging_drawing WHERE `new_part_id` = '".$res1['id']."'";
  $res2 = $crud->getSingleRow($q2);

   $q3 = "SELECT * FROM part_number_images_name WHERE `new_part_id` = '".$res1['id']."'";
  $res3 = $crud->getSingleRow($q3);
  
  if($part_no!=''){?>

  <?php 
	  if($res1){?>
		  <tr >
                                              <td class="bg-color" style="width:20%">Forging Drawing</td>
                                               <td>
                                                <?php if($res2){ if($res2['forging_image']){
												$r1=$res2['forging_image'];
											    $str1=explode(",",$r1);
                          $str2 = explode(",", $res3['forging_drawing_image_name']);

											    foreach ($str1 as $key => $item1) { 
											    if($item1==''){}else{
												?>
												<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item1; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $str2[$key]; ?>  </a>
												<!--<a style="margin-right:20px;" download href="img/test1/<?php echo $item1; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
                                                </a>--><?php }} ?>    <input type="hidden" id="image_name" name="image_name" value="<?php echo $res2['forging_image']; ?>"><?php }} ?>
                                                <input type="hidden" id="forging_id" name="forging_id" value="<?php if($res2) {echo $res2['id'];}else{ echo 0;} ?>">
                                              <!--- <input type="file" name="forging_image[]" id="forging_image" accept=".pdf" multiple>--></td>
                                             </tr >

                                             <tr >

                                              <td class="bg-color" style="width:20%">Control Plan</td>

                                              <td>
                                              <?php $r=$res1['part_image'];
											  $str=explode(",",$r);
                        $str3 = explode(",", $res3['control_plan_image_name']);
											  foreach ($str as $key => $item) { 
											  if($item!=''){
											  ?>
<a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $item; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo $str3[$key]; ?>  </a>											  
<!--<a style="margin-right:20px;" download href="img/test1/<?php echo $item; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
											  </a>--><?php }} ?>                              
                                             <!-- <input type="file" name="part_image[]" id="part_image" accept=".pdf" multiple>--></td>
                                              

                                             </tr>

                                             <tr >

                                              <td class="bg-color" style="width:20%">Customer Drawing</td>

                                              <td>
                                              <?php if($res1['part_image2']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res1['part_image2']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php  echo $res3['customer_drawing_image_name']; ?>   </a>
											  <!--<a style="margin-right:20px;" download href="img/part_image/<?php echo $res['part_image2']; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
</a>--><?php } ?>
                                             <!-- <input type="file" name="part_image2" id="part_image2"/>--></td>

                                              

                                             </tr>

                                             <tr >

                                              <td class="bg-color" style="width:20%">Part Image</td>

                                              <td>
                                              <?php if($res1['part_image3']) { ?>
											  <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $res1['part_image3']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $res3['part_image_name']; ?> </a>
											 <!-- <a style="margin-right:20px;" download href="img/part_image/<?php echo $res['part_image3']; ?>"><i class="fa fa-download" aria-hidden="true"></i> Download
</a>-->
<?php } ?>
                                             <!-- <input type="file" name="part_image3" id="part_image3"/>--></td>

                                              

                                             </tr>
		 <?php }
	  }

?>