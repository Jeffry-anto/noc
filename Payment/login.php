<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>NOC Registration form</title>
	
		<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link href="Assets/css/formValidation.css" rel="stylesheet">
<script src="Assets/js/jquery-1.11.2.min.js" ></script>
	<!--==bootstrap css-->
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css" rel="stylesheet">
<script src="Assets/js/formValidation.js" type="text/javascript"></script>

<script src="Assets/js/framework/bootstrap.js" type="text/javascript"></script>
	
	<script src="Assets/scripts/state.js" type="text/javascript"></script>
	<script src="Assets/scripts/formvalidation_script.js" type="text/javascript"></script>
	<script src="Assets/scripts/script.js" type="text/javascript"></script>
	<script src="Assets/scripts/examcity.js" type="text/javascript"></script>
	
	
		<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="Assets/scripts/crop.js"></script>-->
	<!-- Include Bootstrap Datepicker -->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"
rel="stylesheet">
<link href=
"//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	


	<script src="Assets/js/modernizr-latest.js" type="text/javascript"></script>
	
<style>

body
	{
		
		background-color:#2c3e50;
		/*font-family: 'Open Sans', sans-serif;*/
	}
	#alertinfo
	{
		background-color:#95a5a6;
		border:none;
		color:#fff;
		font-weight:bold;
	}
	
	

</style>
</head>
<body>
  
  
  
  
   <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Email" required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
                                    

                                
                                                   <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-md-offset-3 col-sm-12 controls">
                                      <button type="submit" id="btn-login" href="#" class="btn btn-success">Login</button>
                                     

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! &nbsp;
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            New User
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">New User</div>
                          <div style="color:#fff; float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()"><b style="color:#fff;">Sign In</b></a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-12">
                                        <button type="submit" id="btn-signup" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp New User</button>
                      
                                    </div>
                                </div>
                                
                                                           
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    
  
  
  
  
  
  
  
  
  	
<script src="Assets/js/bootstrap.min.js"></script>

	
</body>
</html>