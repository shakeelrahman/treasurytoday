/* global ajaxurl */

jQuery(document).ready(function($) {
	$('#ajax-login-form').submit(function(e){
		var uname =  $("#uname").val();
		var psw =  $("#psw").val();
		e.preventDefault();
		$.ajax({
          url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
          data: {
              'action':'login_ajax_request', // This is our PHP function below
              'uname' : uname,  
              'psw' : psw  
          },
          success:function(data) {
            // This outputs the result of the ajax request (The Callback)
              //$(".apiloginoutputname").text(data);
              if(data!="False"){
                $('#signInModal').modal('hide');
                location.reload();
                }
              else
              {
               
                 var linkText = "Incorrect Username Or Password";
                 $('#loginformerrormessage').html(linkText);
            
              }
          },
          error: function(errorThrown){
              window.alert(errorThrown);
          }
      });
	});
});

jQuery(document).ready(function($) {
	$('#ajax-registration-form').submit(function(e){
		var rfname =  $("#rfname").val();
		var rlname =  $("#rlname").val();
		var rcompanynameid =  $("#rcompanynameid").val();
                var rcompanyname =  $("#rcompanyname").val();
		var remailaddress =  $("#remailaddress").val();
		var rpassword =  $("#rpassword").val();
		var rindustryfrom =  $("#rindustryfrom").val();
		e.preventDefault();
		$.ajax({
          url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
         data: {
              'action':'registration_ajax_request', 
              'rfname' : rfname, 
              'rlname' : rlname, 
              'rcompanynameid' : rcompanynameid,
              'rcompanyname' : rcompanyname,
              'remailaddress' : remailaddress,
              'rpassword' : rpassword,    
              'rindustryfrom' : rindustryfrom  
          },
          success:function(data) {
      			//$('#ajax-registration-form').hide();
                        var result = $.parseJSON(data);
                        $("#servermessage").html(result[0]);
                        //$("#servermessage").html(data);
      			if(result[1] === "True"){
      				$('#ajax-registration-form').hide();
      			}
          },
          error: function(errorThrown){
              window.alert(errorThrown);
          }
      });
	});
});

jQuery(document).ready(function($) {
	$('#ajax-registration-form-page').submit(function(e){
		var prfname =  $("#prfname").val();
		var prlname =  $("#prlname").val();
                var prcompanynameid =  $("#prcompanynameid").val();
		var prcompanyname =  $("#prcompanyname").val();
		var premailaddress =  $("#premailaddress").val();
		var prpassword =  $("#prpassword").val();
		var prindustryfrom =  $("#prindustryfrom").val(); 
		e.preventDefault();
		$.ajax({
          url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
         data: {
              'action':'registration_ajax_request_page', 
              'prfname' : prfname, 
              'prlname' : prlname, 
              'prcompanynameid' : prcompanynameid,
              'prcompanyname' : prcompanyname,
              'premailaddress' : premailaddress,
              'prpassword' : prpassword,    
              'prindustryfrom' : prindustryfrom  
          },
          success:function(data) {
      		// This outputs the result of the ajax request (The Callback)
      			//$('#ajax-registration-form-page').hide();
                        $("#registrationsuccess2").html(data);
      			
              	//$(".signuptesting").text(data);
             	// $('#signInModal').modal('hide');
              	//location.reload();
          },
          error: function(errorThrown){
              window.alert(errorThrown);
          }
      });
	});
});


jQuery(document).ready(function($) {
	$('#ajax-forgot-password').submit(function(e){
		var fpemailadd =  $("#fpemailadd").val();
		e.preventDefault();
		$.ajax({
                url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
                 data: {
                    'action':'forgot_ajax_request', // This is our PHP function below
                    'fpemailadd' : fpemailadd
          },
          success:function(data) {
                $('#ajax-forgot-password').hide();
                $('#textprimaryfp').hide();
//              if(data=="True"){
//                    $("#forgotsuccessmessage").show();              
//              }
//              else
//              {
//                  $("#forgoterrormessage").show();
//              }
                $(".serverresponsemessage").text(data);
                
          },
          error: function(errorThrown){
              window.alert(errorThrown);
          }
      });
	});
});