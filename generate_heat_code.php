<?php include_once("header.php"); ?>

<style type="text/css">

  td{

    border-top: none !important;

  }

  .bg-color{

    background-color: #006dcc;

    color: #fff; 

   }

</style>

<!-- breadcrumbs -->

            <div class="container-fluid">

                <ul id="breadcrumbs">

                    <li><a href="dashboard"><i class="icon-home"></i></a></li>

                   <!--  <li><a href="part_list"></a></li>

                    <li><a href="javascript:void(0)">Edit Part</a></li> -->

                </ul>

            </div>

<!-- main content -->

            <div class="container-fluid">

                <div class="row-fluid">

                    

                    <div class="span12">

                        <div class="w-box">

                            <div class="w-box-header">

                                <h4>Steel Code</h4>

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

                                <form action="" id="generate_heat_code" method="post">

                                  <table class="table" style="width:25%;margin:auto;">

                                    <tr class="bg-color">

                                      <td colspan="2">Generate Steel Code</td>

                                    </tr>

                                     <tr>

                                      <td>Heat No.</td>

                                      <td><select name="generate_heat_no" id="generate_heat_no" onchange="getData();">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = "SELECT heat_no FROM metallurgical_report WHERE  heat_no !=''";

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['heat_no']; ?>"><?php echo $value['heat_no']; ?></option>

                                                    <?php } ?>

                                                </select> </td>

                                    </tr>

                                    <tr>

                                      <td>Forger Supplier Name</td>

                                      <td>

                                        <select name="generate_forger_tc_supplier" id="generate_forger_tc_supplier">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM forger_company';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                      </td>

                                    </tr>

                                    <tr>

                                      <!-- <td>Material Grade</td>

                                      <td>

                                         <select id="generate_material_grade" name="generate_material_grade">

                                                    <option value="">Select</option>

                                                     <?php

                                                        $query = 'SELECT * FROM grade';

                                                          $result = $crud->getAllData($query);

                                                            foreach ($result as $key => $value) {



                                                      ?>



                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $response['material_grade']){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>



                                                    <?php } ?>

                                                </select>

                                      </td> -->

                                    </tr>

                                    <tr>

                                      <td colspan="2" style="text-align: center"><button type="submit" id="save_steel_code" class="btn btn-primary">Save</button></td>

                                    </tr>

                                  </table>

                                </form>

                                <br><br>

                                <form class="form-horizontal" action="" id="ht_search"  method="post">

                                    



                                        <table class="table">

                                          <tr>



                                          <th>Part No</th>

                                          <th>Forger Supplier Name</th>

                                          <th>Mill Supplier Name</th>

                                          <th>Material Grade</th>

                                          <th>Heat No</th>

                                          <th>Start Date</th>

                                          <th>End Date</th>

                                          </tr>

                                           <tr>

                                            <td>

                                                <input type="text" id="part_no" name="part_no">

                                            </td>

                                            <td>

                                              <select name="forger_tc_supplier" id="forger_tc_supplier">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM forger_company';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </td>

                                            <td>

                                              <select name="mill_tc_supplier" id="mill_tc_supplier">

                                                <option value="">Select</option>

                                                <?php

                                                                              $query = 'SELECT * FROM steel_mill';

                                                                              $result = $crud->getAllData($query);

                                                                              foreach ($result as $key => $value) {

                                                      ?>

                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </td>

                                            <td>

                                                <select id="material_grade" name="material_grade">

                                                    <option value="">Select</option>

                                                     <?php

                                                        $query = 'SELECT * FROM grade';

                                                          $result = $crud->getAllData($query);

                                                            foreach ($result as $key => $value) {



                                                      ?>



                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']== $response['material_grade']){ ?> selected="selected" <?php } ?>><?php echo $value['grade']; ?></option>



                                                    <?php } ?>

                                                </select>

                                            </td>

                                            

                                            <td>

                                                <input type="text" id="heat_no" name="heat_no">

                                            </td>

                                            

                                             <td>

                                                <input type="text" name="from" id="from" value="">

                                            </td>

                                            <td>

                                                <input type="text" name="to" id="to" value="">

                                             </td>

                                             



                                           </tr>

                                           <tr>

                                                <td colspan="2">

                                                <button type="submit" id="search" class="btn btn-primary">Search</button>

                                                </td>

                                            </tr>

                                      </table>

                                        

                                         

                                        

                                        

                                       

                                    

                                </form>

                                <hr>

                                <table id="example2" class="table display nowrap table-bordered">

                                <thead>

                                    <tr>

                                         <th>S.No.</th>

                                         <th>Heat No.</th>

                                         <th>Part No</th>

                                         <th>Steel Code</th>

                                         <th>Material Grade</th>

                                         <th>Forger Supplier Name</th>

                                         <th>Mill Supplier Name</th>

                                         <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody id="appendBody">

                                    



                        

                                </tbody>

                            </table>

                            </div>

                            

                        </div>

                    </div>

                     

                </div>

                

                

            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>
 <script src="js/lib/select2/select2.min.js"></script>

        <script type="text/javascript">

            $(function(){
                
                    $("#generate_heat_no").select2({
                    placeholder: "Select heat code",
                    allowClear: true
                });
                    $("#s2id_generate_heat_no").css('width','130px');
                  
                 $("#from").datepicker({

                      format: 'yyyy-mm-dd',

                      autoclose: true,

                    }).on('changeDate', function (selected) {

                        var startDate = new Date(selected.date.valueOf());

                        $('#to').datepicker('setStartDate', startDate);

                    }).on('clearDate', function (selected) {

                        $('#to').datepicker('setStartDate', null);

                    });



                    $("#to").datepicker({

                       format: 'yyyy-mm-dd',

                       autoclose: true,

                    }).on('changeDate', function (selected) {

                       var endDate = new Date(selected.date.valueOf());

                       $('#from').datepicker('setEndDate', endDate);

                    }).on('clearDate', function (selected) {

                       $('#from').datepicker('setEndDate', null);

                    });

                   table = $('#example2').DataTable({

                      searching : false,

                      ordering : false,

                      "bLengthChange": false,

                      "pageLength": 50,

                 responsive : true,  

                 dom: 'Bfrtip', 

                 buttons: [

					 {
      extend: 'pdfHtml5',
      text: 'PDF',
      title: $('h1').text(),
	    pageSize : 'A0',
      exportOptions: {
        columns: ':not(.no-print)'
					 }},
                       {

                        extend: 'print',

                        title: function(){

                           return 'VECV MET.LAB. HEAT RECORD'

                        },

                        customize: function (win) {

                          $(win.document.body).find('h1').css('text-align','center');

                         $(win.document.body).find('.box').css('height','30px');

                         $(win.document.body).find('.box').css('line-height','10px !important');

                         $(win.document.body).find('.box').css('width','30px !important');



                        },

                        exportOptions: { stripHtml: false }

                      },
							'excel'


                    ]

                });



                 if($('#ht_search').length) {

                $('#ht_search').validate({

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

                        

                        

                        to :{

                         required : function(){

                            if($('#from').val() != ''){

                              return true;

                            }

                            else{

                               return false;

                            }

                         },

                        },

                        

                       },

                   submitHandler: function(form) {

                      getHTSearch();

                    }    

                })

                $('#generate_heat_code').validate({

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

                        

                        generate_heat_no : 'required',

                        generate_forger_tc_supplier : 'required',

                        // generate_material_grade : 'required',

                        

                        

                       },

                   submitHandler: function(form) {

                      generateHeatCode();

                    }    

                })

                

            } 



            $('#disposition_check').click(function(){

                   if($('#disposition_check').is(':Checked')){

                       $('#disposition').css('display','block');

                   }

                   else{

                       $('#disposition').css('display','none');



                   }

            });      

                    

            });

  function reDirect(id){
              // window.location.href();
              window.open(
  'edit_metallurgical_report?id='+id,
  '_blank' // <- This is what makes it open in a new window.
);
            }

            function getHTSearch(){

  

                      $.ajax({

                                type : "POST",

                                url : "generate_heat_code_sub.php",

                                data : {

                                  forger_tc_supplier : $('#forger_tc_supplier').val(),

                                  mill_tc_supplier : $('#mill_tc_supplier').val(),

                                   part_no : $('#part_no').val(),

                                   material_grade : $('#material_grade').val(),

                                   heat_no : $('#heat_no').val(),

                                   from : $('#from').val(),

                                   to : $('#to').val()

                                   

                                },

                                dataType : "JSON",

                                success : function(response){

                                       if(response.status == 1){

                                        table.clear();

                                        var j =1;

                                        $.each(response.data,function(i,val){

                                           table.row.add([

                                                j,
												
												'<a style="cursor:pointer" onclick="reDirect('+val.link+')">'+val.heat_no+'</a>',

                                                 val.part_no,

                                                 val.steel_code,

                                                 val.material_grade,

                                                 val.forger_tc_supplier,

                                                 val.mill_tc_supplier,

                                                 '<?php if ($_SESSION['user_type'] == '1') { ?> <a onclick="userConfirmation(\''+val.id+'\',\'delete_steel_code.php\')" href="#"><i class="fa fa-trash" style="color:#ff0000;font-size:18px;"></i></a> <?php } ?>',

                                              ]).draw(false);         

                                                    

                                          j++;

                                        });

                                        

                                       

                                        

                                       }

                                       else{

                                        table.clear();

                                        table.row.add([

                                                 '',

                                                 '',

                                                 '',

                                                 'No Result Found',

                                                 '',

                                                 '',

                                                 '',

                                                 '',

                                             ]).draw(false);

                                        

                                       } 



                                } 

                           });



                      

                      

}

function generateHeatCode(){

  $.ajax({

      type : "POST",

      url : 'generate_steel_code_sub.php',

      data : {

          generate_heat_no : $('#generate_heat_no').val(),

          generate_forger_tc_supplier : $('#generate_forger_tc_supplier').val(),

          generate_material_grade : $('#generate_material_grade').val()

       },

       dataType : "JSON",

       success : function(response){

             if(response.status ==1){

                $.sticky('Steel Code Generated Successfully', {autoclose : 3000, position: "top-center", type: "st-success" });



             }

             else{

                $.sticky(''+response.data+'', {autoclose : 3000, position: "top-center", type: "st-success" });



             }

       }

  });



}

function getData(){

  $.ajax({

      type : "POST",

      url : 'get_weight.php',

      data : {

          heat_no : $('#generate_heat_no').val()

          

       },

       dataType : "JSON",

       success : function(response){



             if(response.status ==1){

              

                     $('#generate_forger_tc_supplier option[value="'+response.data.forger_tc_supplier+'"]').attr("selected",'selected');

                

                     $('#generate_material_grade option[value="'+response.data.grade+'"]').attr("selected",'selected');

                    

             }

       }

  });

}

        </script>

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

      width:130px;

    }

    td select{

      width:130px;

    }

</style>