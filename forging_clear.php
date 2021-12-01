<?php include_once("header.php"); ?>

<style type="text/css">
   .bg-color{
    background-color: #006dcc;
    color: #fff; 
   }
    .table-bordered td{
    border-left:2px solid #fff !important;
  }
   .table-bordered th{
    border-left:2px solid #fff !important;
  }
  .table-bordered{
    border:none !important;
  }
  td{
    border-top:2px solid #fff !important;
  }
  th{
    border-top:2px solid #fff !important;
  }
  /*td{
    border-top: none !important;

  }*/

     /*td input{
        width:150px !important;
     } */
     .span1{
        width:100px !important;
     }    
 .innerBoxes{
        width:25px !important;
        }
        .div-scroll
{
width:1270px;
overflow-x:scroll;
}
.div-scroll-metallographic{
    width:900px;
    /*overflow-x:scroll;*/
}
        </style>
 

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                    <li><a href="#">Forging Clearance</a></li>

                   

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <!-- <div class="w-box-header">

                                <h4>Control Plan</h4>

                            </div> -->

                            <div class="w-box-content cnt_a">

                                <?php 



                                  if($_SESSION['msg_success'] != ''){ ?>

                                   <script>

                                       window.onload = function(){

                                        $.sticky('<?php echo $_SESSION['msg_success'];?>', {autoclose : 3000, position: "top-center", type: "st-success" });

                                        

                                       }

                                   </script>

                                  <?php 

                                  $_SESSION['msg_success'] = '';

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
                                    
                                ?>

                                

                                <form class="form-horizontal" action="forging_clear_sub.php" id="forging_clear" method="post" enctype="multipart/form-data">
                                        
                                        <table class="table table-bordered">
                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="bg-color">BALANCE WEIGHT</td>
                                                
                    <td><input type="text" name="balance_weight" id="balance_weight" readonly=""  /><input type="hidden" name="balance_weight_hidden" id="balance_weight_hidden" readonly=""/></td>
                    </tr>
                                            <tr>
                                                <td class="bg-color"><!-- CUSTOMER -->GRN NO</td>
                                                
                        <td><input type="text" id="grn_no" name="grn_no"> <input type="hidden" id="id" name="id"></td>
                                                
                        <td class="bg-color">PART NO</td>
                                                <td><select id="part_no" name="part_no" onchange="getPartWeight()">
            <option value="0">- Select -</option>
        </select></td>
                                                <td class="bg-color">QUANTITY</td>
                                                <td>
                                                             
                                                             <input type="text" id="quantity" name="quantity"  onblur="setBalanceWeight()"/></td>

                                            </tr>
                                            <tr>
                                                <td class="bg-color">FORGER TC SUPPLIER NAME</td>
                                                <td><select name="forger_tc_supplier" id="forger_tc_supplier" readOnly>
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM forger_company';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select></td>
                                                <td class="bg-color">PART WEIGHT</td>
                                                <td><input type="text" id="part_weight" name="part_weight" readonly=""/></td>
                                                
                                                <td class="bg-color">DATE</td>
                                                <td><input type="text" id="date" name="date" class="" readOnly value="<?php echo date('Y-m-d',time()) ?>" /></td>
                                            </tr>
                                            
                                            <tr>
                                               <td  class="bg-color">MILL TC SUPPLIER NAME</td>
                                                <td><!-- <select name="customer" id="customer">
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM customer';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select> --> <select name="mill_tc_supplier" id="mill_tc_supplier" readOnly>
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM steel_mill';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select></td>
                                                <td class="bg-color">MATERIAL GRADE</td>
                                                <td><select id="grade" name="grade" onchange="getChemicalComposition()" readOnly>
                                                    <option value="">Select</option>
                                                     <?php
                                                        $query = 'SELECT * FROM grade';
                                                          $result = $crud->getAllData($query);
                                                            foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['grade']; ?></option>

                                                    <?php } ?>
                                                </select></td>
                                                
                                                <td class="bg-color" >ACTUAL WEIGHT</td>
                                                <td ><input type="text" id="weight" name="weight"  required="" readonly=""/></td>
                                               
                                            </tr>
                                           <tr>
                                             
                                                
                        <td class="bg-color">STEELCODE</td>
                                                <td><input type="text" id="steelcode" name="steelcode" readonly=""/></td>
                                                 <td class="bg-color">HEAT NO.</td>
                                                <td><input type="text" id="heat_no" name="heat_no" onBlur="getMaterialWeight(this.value);" onkeyup="getbed()" required=""/></td>
                                              <td class="bg-color">FORGING QUANTITY </td>
											   <td ><input type="text" id="forging_quantity" name="forging_quantity" /></td>
                                              <!-- <td class="bg-color" >WEIGHT IN METRIC TONE</td>
                                                <td ><input type="text" id="metric_weight" name="metric_weight"  required="" /></td> -->
                                              
                                             
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="4"></td>
                                                <td><!-- CONDITION --></td>
                                                <td><!-- <input type="text" id="condition" name="condition" /> --></td>
                                            </tr>
                      <tr  class="bg-color">
                                                                        <td colspan="6" style="text-align:center">METALLURGICAL TEST RESULT</td>
                                            </tr>
                                            
                                          
                                            <tr>
                                              <td class="bg-color">LOCATION</td>
                                             <td class="bg-color"><!-- CUSTOMER -->REQUIREMENT</td>
                                                
                                                
                                                <td class="bg-color">OBSERVATION</td>
                                              
                                               <td class="bg-color" colspan="3">REMARK</td>
                                              
                                              
                                            </tr>
                                                <td class="bg-color">HARDNESS</td>
                                                <td><input type="text" id="third_party_file" name="requirement"></td>
                                                <td><input type="text" id="condition" name="observation" /></td>
                                                <td colspan="3"><input type="text" id="remark_mt" name="remark_mt" style="width:400px;"/></td>
                                               
                                            
                      
                      <tr>
                                             <td class="bg-color"><!-- CUSTOMER -->MICROSTRUCTURE</td>
                                             <td><input type="text" id="micro_location" name="micro_location"></td>
                                                
                                              <td><div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;"><img src="img/<?php echo $response['file'] ?>"></div>
                                            <div>
                                                <span class="btn btn-small btn-file">
                                                    <span class="fileupload-new">Select image</span>
                                                    <span class="fileupload-exists">Change</span>
                                                    <input type="file" name="file">
                                                </span>
                                                <a href="#" class="btn btn-small fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div><!-- <input type="text" id="third_party_file" name="microstructure"> --></td>
                                                
                        
                                                <td colspan="3"><textarea id="micro_remark" name="micro_remark" style="width:402px;height: 150px;"></textarea><input type="hidden" id="update_file" name="update_file"></td>
                                              
                                              
                                              
                                              
                                            </tr>
                                          <tr>
                      <td class="bg-color"><!-- CUSTOMER -->REMARK</td>
                      <td colspan="5"><textarea id="remark" name="remark" class="span12"></textarea></td>
                      </tr>
                                            

                                            <tr>
                                                  <td class="bg-color">CHECKED BY</td>
                                                    <td><select id="checked_by" name="checked_by" required="">
                                                            <option value="">SELECT</option>
                                                            
														 <?php 
                                                        
                                                        $query1 ='SELECT id,full_name FROM users WHERE FIND_IN_SET("3",custom_field)';
                                                        $result1 =$crud->getAllData($query1);
                                                          foreach ($result1 as $key => $value1) {
                                                                 
                                                            echo '<option value="'.$value1['id'].'">'.$value1['full_name'].'</option>';
                                                              
                                                          }
                                                        ?>
                                                        </select></td>
                                                    <td class="bg-color">APPROVED BY</td>
                                                    <td><select id="approved_by" name="approved_by" required="">
                                                            <option value="">SELECT</option>
                                                            <?php 
                                                            $query ='SELECT id,full_name FROM users WHERE FIND_IN_SET("16",custom_field)';
                                                            // $query ='SELECT id,full_name FROM users WHERE user_type=3';
                                                        $result =$crud->getAllData($query);
                                                          foreach ($result as $key => $value) {
                                                                 
                                                            echo '<option value="'.$value['id'].'">'.$value['full_name'].'</option>';
                                                              
                                                          }
                                                        ?>
                                                        </select"></td>                            <td class="bg-color">DISPOSITION</td>                                                   <td>                                                        <select id="disposition" name="disposition">                                                            <option value="ACCEPTED">ACCEPTED</option>                                                            <option value="REJECTED">REJECTED</option>                                                            <option value="HOLD FOR RETEMPRING">HOLD FOR RETEMPERING</option>                                                            <option value="HOLD FOR REWORK">HOLD FOR REWORK</option>                                                            <option value="ACCEPTED UNDER DEVIATION">ACCEPTED UNDER DEVIATION</option>                                                            <option value="ACCEPTED AFTER REWORK">ACCEPTED AFTER REWORK</option>                                                            <option value="KEEP PENDING">KEEP PENDING</option>                                                            <option value="CONDITIONALLY ACCEPTED">CONDITIONALLY ACCEPTED</option>                                                        </select>                                                    </td>
                                                    
                                                </tr>
                                            
                                        </table>
                                        
                                        <div class="">
                                            <div class="">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Save</button>
                                            </div>
                                        </div>

                                </form> 
                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>

        <script type="text/javascript">

            $(function(){

                 $('.datepicker').datepicker({

                    format : 'yyyy-mm-dd'

                 });
                 
                  
             if($('#forging_clear').length) {
                $('#forging_clear').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('td').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('td').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('td').append(error);
                    },
                    rules: {
                        user_type: "required",
                      },
                    submitHandler: function(form) {
                        form.submit();
                        $(':submit').attr('disabled', 'disabled');
                      }  
                })
    }

            });
           
           
           
           function setBalanceWeight(){
              
             var quantity = $('#quantity').val();
             var part_weight = $('#part_weight').val();
             var balance_weight = $('#balance_weight_hidden').val();
             if(quantity != '' && part_weight != '' && balance_weight != ''){
             var in_tones = part_weight/1000.0;
             var weight = quantity*in_tones;
             balance_weight = balance_weight-weight;
             $('#weight').val(weight); 
             $('#balance_weight').val(balance_weight);
            }
           }
           function getPartWeight(){
              $.ajax({
             type: 'POST',
              url: "get_part_weight.php",
             data: {
              part_no : $('#part_no option:selected').val()
             },
             dataType : "JSON",
              success: function(result){
                  if(result.status == 1){
                    $('#part_weight').val(result.data.part_weight);
                  }
                  else{
                    $('#part_weight').val('');
                  }
                  setBalanceWeight();
              }
              
            });
              
           }
           function getMaterialWeight(val){

      $.ajax({
      
       url: "get_weight.php",
       type: 'POST',
       data: 'heat_no='+val,
             dataType : "JSON",
       success: function(result){
               if(result.status ==1){
            $('#forger_tc_supplier option[value="'+result.data.forger_tc_supplier+'"]').attr("selected",'selected');
            $('#grade option[value="'+result.data.grade+'"]').attr("selected",'selected');
            $('#mill_tc_supplier option[value="'+result.data.mill_tc_supplier+'"]').attr("selected",'selected');
            $('#steelcode').val(result.data.steel_code);
					function financial(x) {
						return Number.parseFloat(x).toFixed(2);
					}
            $('#balance_weight').val(financial(result.data.weight));
            $('#balance_weight_hidden').val(result.data.weight);
			//$('#part_weight').val(result.data.weight);
            // $('#weight_res').html('');
            // if(result.data.weight != ''){
            //  $('#weight_res').html('Balance Weight = '+result.data.weight);
            //  $('#balance_weight').val(result.data.weight);
            // }
            // else{
            //  $('#weight_res').html('Balance Weight = 0');
            //  $('#balance_weight').val(0);
             
            // }
            setPartNo(result.data.steel_code);
               }
      setBalanceWeight();

        }});
      
}
    function setPartNo(sc)
     {
          $.ajax({

            type : 'POST',

            url : 'get_partno.php',

            data : {
				steel_code:sc,
				heat_no:$('#heat_no').val()
				  },

            dataType : "JSON",

            success:function(response){
                var len = response.data.length;
                $("#part_no").empty();
                for( var i = 0; i<len; i++){
                    var id = response.data[i]['id'];
                    var name = response.data[i]['part_no'];
                    $("#part_no").append("<option value='"+name+"'>"+name+"</option>");
                }
				var v=$('#part_no :selected').text();
				getPartWeight();
            }

          });
     }
 function getbed(){
          $.ajax({

            type : 'POST',

            url : 'get_partno.php',

            data : {
				heat_no:$('#heat_no').val()

				  },

            dataType : "JSON",

            success:function(response){
                var len = response.data.length;
                $("#part_no").empty();
                for( var i = 0; i<len; i++){
                    var id = response.data[i]['id'];
                    var name = response.data[i]['part_no'];
                    $("#part_no").append("<option value='"+name+"'>"+name+"</option>");
                }
				var v=$('#part_no :selected').text();
				getPartWeight();
            }

          });

        }
        </script>

        