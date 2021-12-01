<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once("classes/Database.php");
$crud = new Database();

 $part_no = $_POST['part_no'];

	$query = "select * from `new_part_number` where `part_no`='".$part_no."' ";
	$result = $crud->getSingleRow($query);
	
	
//echo "<pre>";print_r($result);die;
if($result){
		$query1 = "select * from `forging_drawing` where `new_part_id`='".$result['id']."' ";
		$result1 = $crud->getSingleRow($query1);
		
		$query2 = "select * from `part_number_images_name` where `new_part_id`='".$result['id']."' ";
		$result2 = $crud->getSingleRow($query2);?>
        <?php
		if($result1['forging_image']){?>
			        <a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $result1['forging_image']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $result1['forging_image']; ?>  </a><br />
			<?php }
			 if($result['part_image']){?>
                <a target="_blank" href="http://link4.in/eicher/img/test1/<?php echo $result['part_image']; ?> "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $result['part_image']; ?>  </a><br />
      <?php   }
	  if($result['part_image2']){?>
		     <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $result['part_image2']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $result['part_image2']; ?><br />
		 <?php  }
		 
		 if($result['part_image3']){?>
			        <a target="_blank" href="http://link4.in/eicher/img/part_image/<?php echo $result['part_image3']; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $result['part_image3']; ?>  </a>
			<?php  }
		 ?>

        
	<?php }

 ?>