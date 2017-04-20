$( document ).ready(function() {
    
var propnew1 = $('#someSwitchOptionSuccess1').prop("checked");
var propnew2 = $('#someSwitchOptionSuccess2').prop("checked");

  $.post( "change_status.php", { propnew1: propnew1 })
  .done(function( data ) {
    
    if(data == 1)
    {
      $('#someSwitchOptionSuccess1').prop("checked",true);
	  $("#statusnew1").html("<b>Yes</b>");
    }
    
    if(data == 0)
    {
      $('#someSwitchOptionSuccess1').prop("checked",false);
	   $("#statusnew1").html("<b>No</b>");
    }
  });  
  
  
  $.post( "change_status.php", { propnew2: propnew2 })
  .done(function( data ) {
   
    if(data == 1)
    {
      $('#someSwitchOptionSuccess2').prop("checked",true);
	   $("#statusnew2").html("<b>Yes</b>");
    }
    
    if(data == 0)
    {
      $('#someSwitchOptionSuccess2').prop("checked",false);
	  $("#statusnew2").html("<b>No</b>");
    }
  });
  
    
  $('#someSwitchOptionSuccess1').on('change',function(){
    var prop1 = $('#someSwitchOptionSuccess1').prop("checked");
   
    
    
  $.post( "change_status.php", { prop1: prop1 })
  .done(function( data ) {
     location.reload();
  });
    
  });
  
  
    $('#someSwitchOptionSuccess2').on('change',function(){
    var prop2 = $('#someSwitchOptionSuccess2').prop("checked");
   
        $.post( "change_status.php", { prop2: prop2 })
  .done(function( data ) {
         location.reload();
  });
    
      
    
  });
  
  
 
  
});