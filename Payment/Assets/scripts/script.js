$(document).ready(function() {
	
	
	
	if(document.URL.indexOf("#")==-1){
        // Set the URL to whatever it was plus "#".
        url = document.URL+"#";
        location = "#";

        //Reload the page
        location.reload(true);
    }
			
			$("#disablity_reason_js").hide();
			$("#scst_js").hide();
			$("#name_college").hide();
			$("#other_role").hide();
			$("#facultyrole").hide();
			$("#organization").hide();
			$("#role_otherscitydiv").hide();
			$("#certificate_othercitynamediv").hide();
			$("#know_others_div").hide();
			
	$("#seondonerow").hide();

	
	
	 
	$('#form1 input').on('change', function() {
   var ss=$('input[name="checkfor2exam"]:checked', '#form1').val(); 
		
		if(ss == 'Y')
		{
			$("#seondonerow").show();
		}
		if(ss == 'N')
		{
               $('#examdate2').val(function() {
          return this.defaultValue;
   });
          
          $('#subject2').val(function() {
          return this.defaultValue;
   });
          
          $('#state2').val(function() {
          return this.defaultValue;
   });
          
          $('#city2').val(function() {
          return this.defaultValue;
   });
          $('#second_state2').val(function() {
          return this.defaultValue;
   });
          
          $('#second_city2').val(function() {
          return this.defaultValue;
   });
      
          
          
		$("#seondonerow").hide();
          
     
          
		}
		
		
		
	});
	
	

	
		$("#know_abt_course").change(function () {
		
		var know_abt_course = $('#know_abt_course').val();
		
		if(know_abt_course == 'Others')
		{
			$("#know_others_div").show();
		}
		else{
			$("#know_others_div").hide();
		}
	});
	$("#role_city").change(function () {
		
		var role_city = $('#role_city').val();
		
		if(role_city == 'Others')
		{
			$("#role_otherscitydiv").show();
		}
		else{
			$("#role_otherscitydiv").hide();
		}
	});
	
	
		$("#certificate_city").change(function () {
		
		var certificate_city = $('#certificate_city').val();
		
		if(certificate_city == 'Others')
		{
			$("#certificate_othercitynamediv").show();
		}
		else{
			$("#certificate_othercitynamediv").hide();
		}
	});
	
	
 $("#subject1").change(function () {
        var subject1 = this.value;
        var subject2 = $('#subject2').val();
        
	  var iswrite2exam=$('input[name="checkfor2exam"]:checked', '#form1').val(); 
	  var iscst=$('input[name="isscst"]:checked', '#form1').val(); 

	 if(subject1 != '' && iswrite2exam == 'N' )
	 {
	 $.post("amount.php", { subject: subject1},
   function(data) {
    
		 
		 if(iscst == 'N')
		 {
			 var dd = data;
			 $('#amount').html(dd);
			 
		 }
		 if(iscst == 'Y')
		 {
			 var newdata = data/2;
			 $('#amount').html(newdata);
		 }
		 
		 
		 
	 });
	 }
	 if(subject1 != '' && subject2 != '' && iswrite2exam == 'Y' )
	 {
		 
		 	 $.post("amount.php", { subject: subject2},
   function(data2) {
    
		 $.post("amount.php", { subject: subject1},
   function(data1) {
		 
		 var newval = parseInt(data1) + parseInt(data2);
		
			 	 if(iscst == 'N')
		 {

			 $('#amount').html(newval);
			 
		 }
		 if(iscst == 'Y')
		 {
			 var newdata = newval/2;
			 $('#amount').html(newdata);
		 }
		 
		 
			 });
	 });
		 
		 
		 
	 }
	 
    });
	
	
	 $("#subject2").change(function () {
        var subject2 = this.value;
        var subject1 = $('#subject1').val();
        
	  var iswrite2exam=$('input[name="checkfor2exam"]:checked', '#form1').val(); 
	  var iscst=$('input[name="isscst"]:checked', '#form1').val(); 

	 if(subject1 != '' && subject2 != '' && iswrite2exam == 'Y' )
	 $.post("amount.php", { subject: subject2},
   function(data2) {
    
		 $.post("amount.php", { subject: subject1},
   function(data1) {
		 
		 var newval = parseInt(data1) + parseInt(data2);
		
			 	 if(iscst == 'N')
		 {

			 $('#amount').html(newval);
			 
		 }
		 if(iscst == 'Y')
		 {
			 var newdata = newval/2;
			 $('#amount').html(newdata);
		 }
		 
		 
			 });
	 });
		
	 
    });


	
		$('input[type=radio][name=disablity]').on('change', function() {
   var disab=$('input[name="disablity"]:checked', '#form1').val(); 

        if(disab == 'Y')
		{
		$("#disablity_reason_js").show();
		}
		if(disab == 'N')
		{
		$("#disablity_reason_js").hide();
		}
		
    });
			
	$('input[type=radio][name=isscst]').on('change', function() {
   var iscst=$('input[name="isscst"]:checked', '#form1').val(); 
		
					if(iscst == 'Y')
					{
						$("#scst_js").show();
					}
					if(iscst == 'N')
					{
						$("#scst_js").hide();
					}
		
		var subject1 = $('#subject1').val();
        var subject2 = $('#subject2').val();
        
	  var iswrite2exam=$('input[name="checkfor2exam"]:checked', '#form1').val(); 

	 if(subject1 != '' && iswrite2exam == 'N' )
	 {
	 $.post("amount.php", { subject: subject1},
   function(data) {
   
		 
		 if(iscst == 'N')
		 {
			 var dd = data;
			 $('#amount').html(dd);
			 
		 }
		 if(iscst == 'Y')
		 {
			 var newdata = data/2;
			 $('#amount').html(newdata);
		 }
		 
		 
		 
	 });
	 }
	 if(subject1 != '' && subject2 != '' && iswrite2exam == 'Y' )
	 {
		 
		 	 $.post("amount.php", { subject: subject2},
   function(data2) {
    
		 $.post("amount.php", { subject: subject1},
   function(data1) {
		 
		 var newval = parseInt(data1) + parseInt(data2);
		
		if(iscst == 'N')
		 {

			 $('#amount').html(parseInt(newval));
			 
		 }
		 if(iscst == 'Y')
		 {
			
			 var newdata = parseInt(newval)/2;
		
			 $('#amount').html(newdata);
		 }
		 
		 
			 });
	 });
		 
		 
		 
	 }
		
				});
	
	
	
	$('input[type=radio][name=checkfor2exam]').on('change', function() {
   var iswrite2exam=$('input[name="checkfor2exam"]:checked', '#form1').val(); 
		
		var subject1 = $('#subject1').val();
        var subject2 = $('#subject2').val();
        
	  var iscst=$('input[name="isscst"]:checked', '#form1').val(); 

	 if(subject1 != '' && iswrite2exam == 'N' )
	 {
	 $.post("amount.php", { subject: subject1},
   function(data) {
   
		 
		 if(iscst == 'N')
		 {
			 var dd = data;
			 $('#amount').html(dd);
			 
		 }
		 if(iscst == 'Y')
		 {
			 var newdata = data/2;
			 $('#amount').html(newdata);
		 }
		 
		 
		 
	 });
	 }
	 if(subject1 != '' && subject2 != '' && iswrite2exam == 'Y' )
	 {
		 
		 	 $.post("amount.php", { subject: subject2},
   function(data2) {
    
		 $.post("amount.php", { subject: subject1},
   function(data1) {
		 
		 var newval = parseInt(data1) + parseInt(data2);
		
		if(iscst == 'N')
		 {

			 $('#amount').html(parseInt(newval));
			 
		 }
		 if(iscst == 'Y')
		 {
			
			 var newdata = parseInt(newval)/2;
		
			 $('#amount').html(newdata);
		 }
		 
		 
			 });
	 });
		 
		 
		 
	 }
		
				});
	
	
				
	
	
			
			$('#form1 input').on('change', function() {
   var roles=$('input[name="role"]:checked', '#form1').val(); 
					if(roles == 'Student')
					{
						$("#name_college").show();
						$("#other_role").hide();
						$("#organization").hide();
						$("#facultyrole").hide();
						
					}
					if(roles == 'Others')
					{
						$("#other_role").show();
						$("#organization").show();
						$("#name_college").hide();
						$("#facultyrole").hide();
					}
					if(roles == 'Faculty')
					{
						$("#facultyrole").show();
						$("#name_college").hide();
						$("#other_role").hide();
						$("#organization").hide();
					}
				
				});
			
	

	
	

		});




    $(window).load(function(){
       
		
		$("#form1")[0].reset();
		
		
    });


function readURL(input)
{
	var validExtensions = ['jpg']; //array of valid extensions
        var fileName = $('#photo').val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
			$('#imgpreview').hide();
           alert("Invalid file type");
           $('#photo').val('');
           return false;
        }
	else
	{
	
	
	
	
	$('#imgpreview').show();
		 var reader = new FileReader();
                   reader.onload = function (e)
                                          {
                                                $('#imgpreview')
                                                .attr('src',e.target.result)
                                                .width(99)
                                                .height(128);
                                          };
                   reader.readAsDataURL(input.files[0]);
	}
}
	
	function readURL1(input)
{
	var validExtensions = ['jpg']; //array of valid extensions
        var fileName = $('#signature').val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
			$('#signatureimgpreview').hide();
           alert("Invalid file type");
           $('#signature').val('');
           return false;
        }
	else
	{
	
	
	
	
	$('#signatureimgpreview').show();
		 var reader = new FileReader();
                   reader.onload = function (e)
                                          {
                                                $('#signatureimgpreview')
                                                .attr('src',e.target.result)
                                                .width(227)
                                                .height(99);
                                          };
                   reader.readAsDataURL(input.files[0]);
	}
}

function onlyAlpha(e,t){
	if(navigator.appName=="Microsoft Internet Explorer"){
		var n=event.keyCode;
		if ( n > 64 && n < 91|| n > 96 && n < 123 || n==32 || n==8 ) {
			return true}
			else{}}
	else{
				var n=t.charCode;
				if (n > 64 && n < 91 || n > 96 && n < 123 || n==0 || n==32 || n==8) {
					return true}
					else{}}
					return false
		}








