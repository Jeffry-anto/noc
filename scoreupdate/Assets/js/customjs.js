$(document).ready(function(){

  
  
  
$("#enablediv").hide();
  $("#SearchCourseId").keyup(function(){
				
    var a = $("#SearchCourseId").val();
    
    
   
    
    
    if(a.length > 3)
    {
      
      $.post( 
                  "phpfiles/displaycourses.php",
                  { name: a },
                  function(data) {
                    
                    if(data != false)
                    {
                      $("#enablediv").show();
                     
                      var decode = JSON.parse(data);
                      
                       $('#hashcourseid').html(decode.NOCCourseId);
                       $('#hashcoursename').html(decode.NOCCourseName);
                       $('#hashexamrun').html(decode.NOCPeriod);
                      $('#hasexamscore').val(decode.NOCCourseId);
                      $('#hasdownload').val(decode.NOCCourseId);
                      $('#hascertifistatus').val(decode.NOCCourseId);
                      $('#hasclogin').val(decode.NOCCourseId);
                      
                      if(decode.NOCEnableCandidateLogin == "Y")
                      {
                         $('#hasclogin').prop('checked',true);
                      }
                      else{
                        $('#hasclogin').prop('checked',false);
                      }
                      
                       if(decode.NOCEnableExamScores == "Y")
                      {
                         $('#hasexamscore').prop('checked',true);
                        
                        
                      }
                      else{
                        $('#hasexamscore').prop('checked',false);
                      }
                      
                       if(decode.NOCEnableDownloadCertificate == "Y")
                      {
                         $('#hasdownload').prop('checked',true);
                      }
                      else{
                        $('#hasdownload').prop('checked',false);
                      }
                      
                        if(decode.NOCEnableCertificatestatus == "Y")
                      {
                         $('#hascertifistatus').prop('checked',true);
                      }
                      else{
                        $('#hascertifistatus').prop('checked',false);
                      }
                      
                      
                       
                    }
                    
                    
                  }
               );
      
       
    
     
    }
    
  
  });
  
    
   $("#hasexamscore").change(function() {
     var fieldname = "examscore";
      var cid = $('#hasexamscore').val();
                    var ischecked= $(this).is(':checked');
                    if(ischecked)
                    {
                     
                      Enablefunction(cid,fieldname);
                      
                    }
              else{
                
                Disablefunction(cid,fieldname);
       
                }
                });
  
  $("#hasclogin").change(function() {
     var fieldname = "clogin";
      var cid = $('#hasclogin').val();
                    var ischecked= $(this).is(':checked');
    var status;
                    if(ischecked)
                    {
                     
                      Enablefunction(cid,fieldname);
                      
                    }
              else{
                
                Disablefunction(cid,fieldname);
       
                }
                });
  
  
  $("#hasdownload").change(function() {
     var fieldname = "download";
      var cid = $('#hasdownload').val();
                    var ischecked= $(this).is(':checked');
    var status;
                    if(ischecked)
                    {
                     
                      Enablefunction(cid,fieldname);
                      
                    }
              else{
                
                Disablefunction(cid,fieldname);
       
                }
                });
  
    $("#hascertifistatus").change(function() {
     var fieldname = "cstatus";
      var cid = $('#hascertifistatus').val();
                    var ischecked= $(this).is(':checked');
    var status;
                    if(ischecked)
                    {
                     
                      Enablefunction(cid,fieldname);
                      
                    }
              else{
                
                Disablefunction(cid,fieldname);
       
                }
                });
  
  
  
  
  function Enablefunction(cid,fieldname)
  {
    var status;
   
  var enable =  confirm('You Need to enable ?');
    if(enable == true)
    {
     $.post("phpfiles/Enabledisable.php",{ courseid: cid,fieldtype: fieldname ,status:'Y'},
                  function(data) {
                  
       if(data == 1)
       {
          
          $('#enabletag').show();
       }
       else{
         
         $('#enabletag').hide();
       }
                  
                  });
    }
  }
  
    function Disablefunction(cid,fieldname)
  {
    var status;
    var disable = confirm('You Need to disable ?');
    if(disable == true)
    {
      $.post("phpfiles/Enabledisable.php",{ courseid: cid,fieldtype: fieldname,status:'N' },
                  function(data) {
              
             if(data == 1)
       {
          
          $('#enabletag').show();
       }
       else{
         $('#enabletag').hide();
       }
                     
                  });
    }
  }
  
  
  
   
  

});