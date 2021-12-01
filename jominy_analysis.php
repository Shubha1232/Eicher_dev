<?php include_once("header.php"); ?>
<style type="text/css">
  td{
    border-top: none !important;
  }
         .div-scroll
{
width:1270px;
overflow-x:scroll;
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
            <div class="container-fluid"">
                <div class="row-fluid">
                    
                    <div class="span12">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Material Grade Analysis</h4>
                            </div>
                            <div class="w-box-content cnt_a">
                                <?php if($_SESSION['msg_success'] != ''){ ?>
                                   <script>
                                       window.onload = function(){
                                        $.sticky('<?php echo $_SESSION['msg_success'];?>', {autoclose : 3000, position: "top-center", type: "st-success" });
                                       }
                                   </script>
                                  <?php 
                                  $_SESSION['msg_session'] = '';      }
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
                                
                                <form class="form-horizontal" action="" id="ht_search"  method="post">
                                    

                                        <table class="table">
                                          <tr>
                                          <th>Part No</th>
                                          <th>Forger Supplier Name</th>
                                          <th>Mill Supplier Name</th>
                                          <th>Material Grade</th>
                                          <th>Steel Code</th>
                                          <th>Heat No</th>
                                          <th>Start Date</th>
                                          <th>End Date</th>
                                          </tr>
                                           <tr>
                                            <td>
                                                <input type="text" id="report_no" name="report_no">
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
                                                <input type="text" id="steel_code" name="steel_code">

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
                                
                                <table id="example2" class="table display nowrap">
                                <thead>

                                    <tr>
                                        <th style="padding-left: 3px;padding-right: 0px;">Heat No.</th>																				
										<th style="padding-left: 3px;padding-right: 0px;">Steel Code</th>                                        
										<th style="padding-left: 3px;padding-right: 0px;">Material Grade</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">j1/16<br>1.59</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">2/16<br>3.18</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">3/16<br>4.77</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">4/16<br>6.35</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">5/16<br>7.94</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">6/16<br>9.53</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">7/16<br>11.12</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">8/16<br>12.7</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">9/16<br>14.29</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">10/16<br>15.88</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">11/16<br>17.47</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">12/16<br>19.05</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">13/16<br>20.64</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">14/16<br>22.23</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">15/16<br>23.82</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">16/16<br>25.4</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">17/16<br>26.99</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">18/16<br>28.58</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">19/16<br>30.17</th>
                                        <th style="padding-left: 0px;padding-right: 0px;">20/16<br>31.75</th> 
                                        <!-- <th>Print</th> -->
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
        <script type="text/javascript">
            $(function(){
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
                           return 'VECV MET.LAB. JOMINY ANALYSIS'
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

            function getHTSearch(){
  
                      $.ajax({
                                type : "POST",
                                url : "jominy_analysis_sub.php",
                                data : {
                                  forger_tc_supplier : $('#forger_tc_supplier').val(),
                                   mill_tc_supplier : $('#mill_tc_supplier').val(),
                                   report_no : $('#report_no').val(),
                                   material_grade : $('#material_grade').val(),
                                   heat_no : $('#heat_no').val(),
                                   from : $('#from').val(),
                                   to : $('#to').val(),
                                   steel_code : $('#steel_code').val()
                                   
                                },
                                dataType : "JSON",
                                success : function(response){
                                       if(response.status == 1){
                                        table.clear();
                                        $.each(response.data,function(i,val){
                                                    var min_spec = val.hardness_test_min_spec.split('*');
                                                    var max_spec = val.hardness_test_max_spec.split('*');
                                                    var mill_tc = val.hardness_test_milltc.split('*');
                                                    var forger_tc = val.hardness_test_forgertc.split('*');
                                                    var partyremark = val.hardness_test_vec.split('*');
                                                    var chemical_composition = val.hardness_test.split('*');
                                                    var chemical_composition_two = val.hardness_test2.split('*');
                                                    var chemical_composition_avg = val.hardness_test_calculatedvalue.split('*');
                                                    
                                          
                                          
                                          table.row.add([
                                                  val.heat_no,												  												 
												  val.steel_code,					
												  val.grade,
                                                  mill_tc[0],
                                                  mill_tc[1],
                                                  mill_tc[2],
                                                  mill_tc[3],
                                                  mill_tc[4],
                                                  mill_tc[5],
                                                  mill_tc[6],
                                                  mill_tc[7],
                                                  mill_tc[8],
                                                  mill_tc[9],
                                                  mill_tc[10],
                                                  mill_tc[11],
                                                  mill_tc[12],
                                                  mill_tc[13],
                                                  mill_tc[14],
                                                  mill_tc[15],
                                                  mill_tc[16],
                                                  mill_tc[17],
                                                  mill_tc[18],
                                                  mill_tc[19],
                                                  
                                            ]).draw(false);
                                         
                                          
                                          
                                         
                                          
                                        });
                                        
                                       
                                        
                                       }
                                       else{
                                        table.clear();
                                        table.row.add([
												 '',
												 '',
												 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
												 '',
                                                 'No result found',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '',
                                                 '', 
												 '',
												 '',
                                                 '',
                                                 '',
                                                
                                            ]).draw(false);
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
	@media print {
  table {
width: 40em;
border: medium solid #00F;
border-collapse:collapse;
}
th, td {
border: medium solid #00F;
}
} 
</style>