


<script src="./Assets/js/jquery-1.10.2.js"></script>
<script src="./Assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="./Assets/js/jquery-ui.js"></script>
 <script type="text/javascript" language="javascript" src="./media/js/jquery.dataTables.js">
  </script>
  <script type="text/javascript" language="javascript" src="./resources/syntax/shCore.js">
  </script>
  <script type="text/javascript" language="javascript" src="./resources/demo.js"> </script>
  
   <script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		
      $('#example').dataTable( {
		"order": [[ 3, "desc" ]]
	}
                           );
						   
		$('#example1').dataTable( {
		"order": [[ 3, "desc" ]]
	}
                           );
						   
	}
	
	
	
                     );
      
  </script>
<script src="./Assets/js/customjs.js"></script>


<!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    <script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" class="form-control" name="mytext[]" id="mytext[]" required><a href="#" class="remove_field" >Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
    //for logic course
    
     var max_fields_logic      = 20; //maximum input boxes allowed
    var wrapper_logic         = $(".logic_fields_wrap"); //Fields wrapper
    var logic_button      = $(".logic_field_button"); //Add button ID
     var x = 1; //initlal text box count
    $(logic_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields_logic){ //max input box allowed
            x++; //text box increment
            $(wrapper_logic).append('<div><input type="text" class="form-control" name="logictext[]" id="logictext[]" required><a href="#" class="remove_field" >Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper_logic).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
    
    
    
});
</script>

 
</body>
</html>