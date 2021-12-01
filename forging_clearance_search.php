<?php include_once("header.php"); ?>
<style type="text/css">
  td{
    border-top: none !important;
  }
  .table th,td{
	  padding:1px !important;
	  width:30px !important;
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
                                <h4>Forging Clearance Search</h4>
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
                                ?>
                                
                                <form class="form-horizontal" action="" id="ht_search"  method="post">
                                    

                                        <table class="table" style="">
                                          <tr>
                                          <th>Part No</th>
                                          <th>Quantity</th>
                                          <th>Forger Supplier Name</th>
                                          <th>Mill Supplier Name</th>
                                          <th>Material Grade</th>
                                          <th>GRN No</th>
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
                                                <input type="text" id="quantity" name="quantity">
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
                                            </td>																						<td>                                                <input type="text" id="grn_no" name="grn_no">                                            </td>
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
                                       <th style="width:30px; !important">S.No.</th>
                                        <th style="width:30px; !important">GRN No.</th>
                                        <th style="width:30px; !important">Date</th>                                        
                                        <th style="width:30px; !important">Quantity</th>
                                        <th style="width:30px; !important">Part No.</th>
                                        <th style="width:30px; !important">Heat No.</th>
                                        <th style="width:30px; !important">Steel Code</th>
                                        <th style="width:30px; !important">Material Grade</th>
										<th style="width:30px; !important">Weight</th>
										                                        <th style="width:30px; !important">Balance Weight</th>
                                        <th style="width:30px; !important">Mill Supp Name</th>
                                        <th style="display:contents; width:30px; !important">Forger Supp Name</th>
                                         
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
                 responsive : true,
                 "pageLength": 50,
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
                           return 'VECV MET.LAB. FORGING RECORD'
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
            function reDirect(id){
              // window.location.href();
              window.open(
  'update_forging_clear?id='+id,
  '_blank' // <- This is what makes it open in a new window.
	);

            }
			
		function reDirect_edit(steel_code){
              // window.location.href();
              window.open(
  'edit_heat_entry.php?stid='+steel_code,
  '_blank' // <- This is what makes it open in a new window.
);
            }	
             
            function getHTSearch(){
  
                      $.ajax({
                                type : "POST",
                                url : "forging_clearance_search_sub.php",
                                data : {
                                  forger_tc_supplier : $('#forger_tc_supplier').val(),
                                   mill_tc_supplier : $('#mill_tc_supplier').val(),
                                   report_no : $('#report_no').val(),
                                   steel_code : $('#steel_code').val(),
                                   material_grade : $('#material_grade').val(),
								   grn_no : $('#grn_no').val(),
                                   heat_no : $('#heat_no').val(),
                                   from : $('#from').val(),
                                   to : $('#to').val(),
								   quantity : $('#quantity').val()
                                   
                                },
                                dataType : "JSON",
                                success : function(response){
                                       if(response.status == 1){
                                        table.clear();
                                        var j =1;
                                        $.each(response.data,function(i,val){
										var stat= val.status;
										
										function financial(x) {
												return Number.parseFloat(x).toFixed(2);
											}
											
											
									//console.log(financial(val.balance_weight));
                                        	var bw_elem='';				      
                                          if(val.balance_weight>=0)
                                           {
                                            bw_elem='<p>'+(financial(val.balance_weight))+'</p>';
                                           }
                                          else
                                           {
                                            bw_elem='<p style="color:red;">'+(financial(val.balance_weight))+'</p>';                                               
                                           }										
                                        if(stat==1){

										  table.row.add([
                                                     j,												 
													'<a style="cursor:pointer;color: #ff0000;" onclick="reDirect('+val.id+')">'+val.grn_no+'</a>',
												  val.date,	
												  val.quantity,
												  val.part_no,
                                                  val.heat_no,
												  '<a style="cursor:pointer;color: #ff0000;" onclick="reDirect_edit(&quot;'+val.steelcode+'&quot;)">'+val.steelcode+'</a>',
                                                  
                                                  val.material_grade, 
												 (financial(val.weight)),
                                                  bw_elem,							
                                                  val.mill_tc_supplier,
                                                  val.forger_tc_supplier,
										  ]).draw(false);
                                        					      
                                           }
										  else{
                                          table.row.add([
                                                     j,												 
													'<a style="cursor:pointer;color: blue;" onclick="reDirect('+val.id+')">'+val.grn_no+'</a>',
												  val.date,
												  val.quantity,	
												  val.part_no,
                                                  val.heat_no,
												  
                                                  '<a style="cursor:pointer;color: #ff0000;" onclick="reDirect_edit(&quot;'+val.steelcode+'&quot;)">'+val.steelcode+'</a>',
                                                  val.material_grade, 
												  (financial(val.weight)),							  bw_elem,						
                                                  val.mill_tc_supplier,
                                                  val.forger_tc_supplier,
										  ]).draw(false);}
                                          j++;
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
                                                 'No result found',
                                                 '',
												 '',
												 ''
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
      width:112px;
    }
    td select{
      width:130px;
    }
</style>