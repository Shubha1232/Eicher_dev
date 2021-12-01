<?php include_once("header.php"); ?>
<style type="text/css">
  td{
  	border-top:none;
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
                                <p style="text-align: center;">Data Characteristics</p>
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
                                          <tr >
                                          <th class="bg-color1">Part No</th>
                                          <th class="bg-color1">Furnace No</th>
                                          <th class="bg-color1">Steel Code</th>
                                          <th class="bg-color1">Start Date</th>
                                          <th class="bg-color1">End Date</th>
                                          </tr>
                                           <tr>
                                            <td>
                                                <input type="text" id="part_no" name="part_no">
                                            </td>
                                            <td>
                                              <select name="furnace_name" id="furnace_name">
                                                <option value="">Select</option>
                                                <?php
                                                                              $query = 'SELECT * FROM furnace';
                                                                              $result = $crud->getAllData($query);
                                                                              foreach ($result as $key => $value) {
                                                      ?>
                                                    <option value="<?php echo $value['furnace_no']; ?>"><?php echo $value['furnace_no']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="steel_code" id="steel_code" value="">

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
                                <div id="graph1"></div><br>
                                <div id="graph3"></div><br>

                                <div id="graph2"></div>
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
                      "pageLength": 8,
                 responsive : true,  
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
                                url : "data_characteristics_sub.php",
                                data : {
                                   part_no : $('#part_no').val(),
                                   furnace_name : $('#furnace_name').val(),
                                   steel_code : $('#steel_code').val(),
                                   from : $('#from').val(),
                                   to : $('#to').val()
                                   
                                },
                                dataType : "JSON",
                                success : function(response){
                                	       var report_no = [];
                                         var report_no1 = [];
                                         var report_no2 = [];
                                	       var rcd = [];
                                         var rcdHv = [];
                                	       var pcd = [];
                                       if(response.status == 1){
                                       	 $.each(response.data,function(i,val){
											                       report_no.push(val.batch_code);
                                                if(val.core_hardness_value1 == 'HRC'){
                                                if(val.metallurgical_test_core_hardness_rcd_observation == '' || val.metallurgical_test_core_hardness_rcd_observation == '-' || val.metallurgical_test_core_hardness_rcd_observation == '*'){
                                                	rcd.push(null);
                                                }
                                                else{
                                                	rcd.push(parseInt(val.metallurgical_test_core_hardness_rcd_observation));
                                                }
                                                report_no1.push(val.batch_code);
                                              }
                                              if(val.core_hardness_value1 == 'HV'){
                                                if(val.metallurgical_test_core_hardness_rcd_observation == '' || val.metallurgical_test_core_hardness_rcd_observation == '-' || val.metallurgical_test_core_hardness_rcd_observation == '*'){
                                                  rcdHv.push(null);
                                                }
                                                else{
                                                  rcdHv.push(parseInt(val.metallurgical_test_core_hardness_rcd_observation));
                                                }
                                                report_no2.push(val.batch_code);

                                              }

                                                if(val.metallurgical_test_case_depth_pcd_observation == '' || val.metallurgical_test_case_depth_pcd_observation == '-' || val.metallurgical_test_case_depth_pcd_observation == '*'){
                                                	pcd.push(null);
                                                }
                                                else{
													pcd.push(parseFloat(val.metallurgical_test_case_depth_pcd_observation));
                                                }
                                       	 });
                                           console.log(rcd);
                                           console.log(pcd);
                                           console.log(rcdHv);
                                        var elem = $('#graph1').highcharts({
									        title: {
									            text: 'Core Hardness RCD Observation Value',
									            x: -20 //center
									        },
                           chart: {
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(186,213,243)'],
                [1, 'rgb(186,213,243)']
            ]
        },
        type: 'line'
    },
    plotOptions: {
                          series: {
                              color: '#fff'
                          }
                      },
									        subtitle: {
									            text: '',
									            x: -20
									        },
									        xAxis: {
									            categories: report_no1
									        },
									        yAxis: {
									        	min: 25,
        										max: 50,
        										startOnTick: false,
        										endOnTick: false,
									            title: {
									                text: 'Core Hardness in HRC'
									            },
									            plotLines: [{
									                value: 0,
									                width: 1,
									                color: '#fff'
									            }]
									        },
									        tooltip: {
									            valueSuffix: ''
									        },
									        credits: {
											       enabled: false
											     },
									        legend: {
									            layout: 'vertical',
									            align: 'right',
									            verticalAlign: 'middle',
									            borderWidth: 0
									        },
									        series: [{
									            connectNulls: true,
									            name: 'rcd',
									            data: rcd
									              }]
									    });
                                    
                                        var elem = $('#graph3').highcharts({
                          title: {
                              text: 'Core Hardness RCD Observation Value',
                              x: -20 //center
                          },
                           chart: {
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(186,213,243)'],
                [1, 'rgb(186,213,243)']
            ]
        },
        type: 'line'
    },
    plotOptions: {
                          series: {
                              color: '#fff'
                          }
                      },
                          subtitle: {
                              text: '',
                              x: -20
                          },
                          xAxis: {
                              categories: report_no2
                          },
                          yAxis: {
                            min: 280,
                            max: 500,
                            tickInterval: 30,
                            startOnTick: false,
                            endOnTick: false,
                              title: {
                                  text: 'Core Hardness in HV'
                              },
                              plotLines: [{
                                  value: 0,
                                  width: 1,
                                  color: '#fff'
                              }]
                          },
                          tooltip: {
                              valueSuffix: ''
                          },
                          credits: {
                             enabled: false
                           },
                          legend: {
                              layout: 'vertical',
                              align: 'right',
                              verticalAlign: 'middle',
                              borderWidth: 0
                          },
                          series: [{
                              connectNulls: true,
                              name: 'rcd',
                              data: rcdHv
                                }]
                      });

                                             $('#graph2').highcharts({
									        title: {
									            text: 'Effective Case Depth at PCD',
									            x: -20 //center
									        },
                          chart: {
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(186,213,243)'],
                [1, 'rgb(186,213,243)']
            ]
        },
        type: 'line'
    },
									        subtitle: {
									            text: '',
									            x: -20
									        },
                          plotOptions: {
                          series: {
                              color: '#fff'
                          }
                      },
									        xAxis: {
									            categories: report_no
									        },
									        yAxis: {
                                                min: 0.3,
        										max: 2.2,
                            tickInterval: 0.1,
        										startOnTick: false,
        										endOnTick: false,
									            title: {
									                text: 'Distance in mm'
									            },
									            plotLines: [{
									                value: 0,
									                width: 1,
									                color: '#808080'
									            }]
									        },
									        tooltip: {
									            valueSuffix: ''
									        },
									        credits: {
											       enabled: false
											     },
									        legend: {
									            layout: 'vertical',
									            align: 'right',
									            verticalAlign: 'middle',
									            borderWidth: 0
									        },
									        series: [{
									            connectNulls: true,
									            name: 'pcd',
									            data: pcd
									              }]
									    });
                                        
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