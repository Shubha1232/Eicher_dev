<?php include_once("header.php"); ?>

<style type="text/css">

  .form-element{

    border-top: none !important;



  }

  .box{

    height: 10px;

    line-height: 10px !important;

    width: 30px !important;

  }

  td{

    font-weight: bold;

  }

</style>

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

    td input,select{

      width:115px;

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

                                <p style="text-align: center;"></p>

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

                                    



                                        <table class="table">

                                          <tr>

                                            <th class="bg-color1">Part NO.</th>

                                          <th class="bg-color1">Batch Code</th>

                                          <th class="bg-color1">Steel Code</th>
                                          <th class="bg-color1">Customer</th>
                                          <th class="bg-color1">Furnace Name</th>

                                          <th class="bg-color1">Unit</th>

                                          <th class="bg-color1">Start Date</th>

                                          <th class="bg-color1">End Date</th>

                                          <th class="bg-color1">DISPOSITION <input type="checkbox" id="disposition_check" name="disposition_check"></th>

                                          </tr>

                                           <tr>

                                            <td class="form-element">

                                              <input type="text" id="part_no" name="part_no" />

                                            </td>

                                            <td class="form-element">

                                                <input type="text" id="batch_code" name="batch_code"/>

                                            </td>

                                            <td class="form-element">

                                                <input type="text" id="steel_code" name="steel_code">

                                            </td>
                                            <td class="form-element">
                                                <select id="customer" name="customer">
                                                        <option value="">SELECT</option>
                                                          <?php $qu = 'SELECT * FROM customer where name!=""';
                                                          $re = $crud->getAllData($qu);
                                                          foreach ($re as $key => $val) { ?>
                                                            <option value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
                                                         <?php }
                                                           ?>
                                                        </select>
                                            </td>
                                            <td class="form-element">

                                                <input type="text" id="furnace_name" name="furnace_name">

                                            </td>

                                            <td class="form-element">

                                                <select id="f_unit" name="f_unit">

                                                        <option value="">SELECT</option>

                                                          <?php $query = 'SELECT * FROM unit';

                                                          $result = $crud->getAllData($query);

                                                          foreach ($result as $key => $value) { ?>

                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

                                                         <?php }

                                                           ?>

                                                        </select>

                                            </td>

                                             <td class="form-element">

                                                <input type="text" name="from" id="from" value="">

                                            </td>

                                            <td class="form-element">

                                                <input type="text" name="to" id="to" value="">

                                             </td>

                                             <td class="form-element">

                                                      <select id="disposition" name="disposition" style="display: none;">

                                                        <option value="">SELECT</option>

                                                          <option value="ACCEPTED" selected="">ACCEPTED</option>

                                                            <option value="REJECTED">REJECTED</option>

                                                            <option value="HOLD HOR RETEMPRING">HOLD FOR RETEMPRING</option>

                                                            <option value="HOLD FOR REWORK">HOLD FOR REWORK</option>

                                                            <option value="ACCEPTED UNDER DEVIATION">ACCEPTED UNDER DEVIATION</option>

                                                            <option value="ACCEPTED AFTER REWORK">ACCEPTED AFTER REWORK</option>

                                                            <option value="KEEP PENDING">KEEP PENDING</option>

                                                            <option value="CONDITIONALLY ACCEPTED">CONDITIONALLY ACCEPTED</option>

                                                        </select>

                                                    </td>



                                           </tr>

                                           <tr>

                                                <td colspan="2" class="form-element">

                                                <button type="submit" id="search" class="btn btn-primary">Search</button>

                                                </td>

                                            </tr>

                                      </table>

                                        

                                         

                                        

                                        

                                       

                                    

                                </form>

                                <hr>

    

                                <div id="abc">

                                <table id="example2" class="table display nowrap table-bordered">

                                <thead>



                                    <tr>

                                        <th>S.NO.</th>

                                        <th>REPORT NO.</th>

                                        <th>PART NO.</th>

										<th>ECD</th>

										<th>CORE HARDNESS</th>

                                        <th>OTHER CLUBBED PARTS</th>

                                        <th>BATCH CODE</th>

                                        <th>STEEL CODE</th>

                                         <th>DISPOSITION</th>

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

                

                

            </div>

            <div class="footer_space"></div>

        </div>

        <?php include_once("footer.php");  ?>

        <script type="text/javascript">

          // var table ='';

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

                //    table = $('#example2').DataTable({

                //       searching : false,

                //       ordering : false,

                //       "bLengthChange": false,

                //       "pageLength": 50,

                //  responsive : true,

                //  dom: 'Bfrtip',

                //     buttons: [

                //        {

                //         extend: 'print',

                //         title: function(){

                //            return 'VECV MET.LAB. STATUS'

                //         },

                //         customize: function (win) {

                //           $(win.document.body).find('h1').css('text-align','center');

                //          $(win.document.body).find('.box').css('height','30px');

                //          $(win.document.body).find('.box').css('line-height','10px !important');

                //          $(win.document.body).find('.box').css('width','30px !important');



                //         },

                //         exportOptions: { stripHtml: false }

                //       },



                //     ]  

                // });

                  table = $('#example2').DataTable({

                      processing: true,

                      "language": {

                            "processing": "<img src='img/loading.gif'>" //add a loading image,simply putting <img src="loader.gif" /> tag.

                        },

                      serverSide: true,

                      "ajax":  {

                "url": "server_processing.php",

                "type": "POST",

                "data": function(d) {

                    d.disposition = $('#disposition').val(),

                    d.part_no = $('#part_no').val(),

                    d.batch_code = $('#batch_code').val(),

                    d.steel_code = $('#steel_code').val(),
                    d.customer = $('#customer').val(),
                    d.furnace_name = $('#furnace_name').val(),

                    d.f_unit = $('#f_unit option:selected').val(),

                    d.from = $('#from').val(),

                    d.to = $('#to').val()

                },

            },

                       searching : false,

                      ordering : false,

                      

                       "bLengthChange": false,

                      "pageLength": 100,

                 responsive : true,

                 dom: 'Bfrtip',

                    buttons: [

                       {

                        extend: 'print',

                        title: function(){

                           return 'VECV MET.LAB. STATUS'

                        },

                        customize: function (win) {

                          $(win.document.body).find('h1').css('text-align','center');

                         $(win.document.body).find('.box').css('height','30px');

                         $(win.document.body).find('.box').css('line-height','10px !important');

                         $(win.document.body).find('.box').css('width','30px !important');



                        },

                        exportOptions: { stripHtml: false }

                      },



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

  'update_control_plan?id='+id,

  '_blank' // <- This is what makes it open in a new window.

);

            }

            function getHTSearch(){

                      $('.loader').css('display','block');

            //           $.ajax({

            //                     type : "POST",

            //                     url : "ht_search_sub.php",

            //                     data : {

            //                        batch_code : $('#batch_code').val(),

            //                        steel_code : $('#steel_code').val(),

            //                        furnace_name : $('#furnace_name').val(),

            //                        f_unit : $('#f_unit option:selected').val(),

            //                        from : $('#from').val(),

            //                        to : $('#to').val(),

            //                        disposition : $('#disposition').val(),

            //                        part_no : $('#part_no').val()

            //                     },

            //                     dataType : "JSON",

            //                     success : function(response){

            //                            if(response.status == 1){

            //                             table.clear();

            //                             var j = 1;

            //                             $.each(response.data,function(i,val){

            //                             var stat= val.status;

            //                             var data = '<table class="table table-bordered other_clubbed_part"><tr>';

            //                               // if(val.other_clubbed_part_no !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no+'</td>';

            //                               // }

            //                               // if(val.other_clubbed_part_no2 !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no2+'</td>'

            //                               // }

            //                               // if(val.other_clubbed_part_no3 !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no3+'</td>'

            //                               // }

            //                               // if(val.other_clubbed_part_no4 !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no4+'</td>'

            //                               // }

            //                               // if(val.other_clubbed_part_no5 !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no5+'</td>'

            //                               // }

            //                               // if(val.other_clubbed_part_no6 !=''){

            //                                 data+='<td class="box">'+val.other_clubbed_part_no6+'</td>'

            //                               // }

            //                               data+='</tr></table>';

            //                               // if(val.other_clubbed_part_no =='' && val.other_clubbed_part_no2 =='' && val.other_clubbed_part_no3 =='' && val.other_clubbed_part_no4 =='' && val.other_clubbed_part_no5 =='' && val.other_clubbed_part_no6 ==''){

            //                               //   data = '';

            //                               // }  

										  // if(stat==1){

            //                               table.row.add([

            //                                       j,

            //                                       '<a style="cursor:pointer;color: red;" onclick="reDirect('+val.id+')">'+val.report_no+'</a>',

            //                                       val.part_no,

												//   val.metallurgical_test_case_depth_pcd_observation,

												//   val.metallurgical_test_core_hardness_rcd_observation,

            //                                       data,

            //                                       val.batch_code,

            //                                       val.steel_code,

            //                                       val.disposition,

                                                  

										  // ]).draw(false);}

										  // else{

											 //   table.row.add([

            //                                       j,

            //                                       '<a style="cursor:pointer" onclick="reDirect('+val.id+')">'+val.report_no+'</a>',

            //                                       val.part_no,

												//   val.metallurgical_test_case_depth_pcd_observation,

												//   val.metallurgical_test_core_hardness_rcd_observation,

            //                                       data,

            //                                       val.batch_code,

            //                                       val.steel_code,

            //                                       val.disposition,

                                                  

										  // ]).draw(false);}

            //                               j++;

            //                             });

                                        

            //                            }

            //                            else{

            //                             table.clear();

            //                             table.row.add([

            //                                       '',

            //                                      '',

            //                                      '',

												//  '',

            //                                      'No result found',

												//  '',

            //                                      '',

            //                                      '',

            //                                      '',

                                                 

                                                

            //                                 ]).draw(false);

            //                            } 

            //           $('.loader').css('display','none');

                                     

            //                     } 

            //                });



            //  table.DataTable({

            //           processing: true,

            //           serverSide: true,

            //           "ajax":  {

            //     "url": "server_processing.php",

            //     "type": "POST",

            //     "data": function(d) {

            //         d.disposition = $('#disposition').val(),

            //         d.part_no = $('#part_no').val(),

            //         d.batch_code = $('#batch_code').val()

            //     },

            // },

            //           searching : false,

            //           ordering : false,

            //           "bLengthChange": false,

            //           "pageLength": 50,

            //      responsive : true,

            //      dom: 'Bfrtip',

            //         buttons: [

            //            {

            //             extend: 'print',

            //             title: function(){

            //                return 'VECV MET.LAB. STATUS'

            //             },

            //             customize: function (win) {

            //               $(win.document.body).find('h1').css('text-align','center');

            //              $(win.document.body).find('.box').css('height','30px');

            //              $(win.document.body).find('.box').css('line-height','10px !important');

            //              $(win.document.body).find('.box').css('width','30px !important');



            //             },

            //             exportOptions: { stripHtml: false }

            //           },



            //         ]  

            //     });



             table.ajax.reload(); 

                  $('.loader').css('display','none');





                      

                      

}

        </script>

       