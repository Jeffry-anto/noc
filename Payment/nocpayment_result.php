<?php
if(session_id() == '') {
  session_start();
  
  echo session_id();
}


session_destroy();


include_once("Assets/phpfiles/function.php"); 

if(isset($_POST['applicationpaymenttoken']))
{
  $token = $_POST['applicationpaymenttoken'];
  $appno = $_POST['applicationnumber'];
  
   $confirmtoken = new select_reg_open();
  $confirmtoken_query = $confirmtoken->checktoken($appno);
  
  while($fetch = mysqli_fetch_array($confirmtoken_query))
  {
    $paymentstatus = $fetch['applicationpaymentstatus'];
    $Application_number = $fetch['Application_number'];
    $Emailid = $fetch['Emailid'];
    $Name = $fetch['Name'];
    $DOB = $fetch['DOB'];
    $Gender = $fetch['Gender'];
    $Courses_applied = $fetch['Courses_applied'];
    $Course1 = $fetch['Course1'];
    $ExamDate1 = $fetch['ExamDate1'];
    $primarycity1 = $fetch['primarycity1'];
    
    $Course2 = $fetch['Course2'];
    $ExamDate2 = $fetch['ExamDate2'];
    $primarycity2 = $fetch['primarycity2'];
    $Amount = $fetch['Amount'];
  }  
}
else
{
 ?>
<!--<script>window.location.href="http://nptel.ac.in/noc/Payment";</script>-->
<?php
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>NOC Registration form</title>
	
			<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
<script src="Assets/js/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link href="Assets/css/formValidation.css" rel="stylesheet">
<script src="Assets/js/jquery-1.11.2.min.js" ></script>
	<!--==bootstrap css-->
<link href="Assets/css/boot.css" rel="stylesheet">
  <link href="Assets/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="Assets/js/formValidation.js" type="text/javascript"></script>

<script src="Assets/js/framework/bootstrap.js" type="text/javascript"></script>
	
	<script src="Assets/scripts/state.js" type="text/javascript"></script>
	<script src="Assets/scripts/formvalidation_script.js" type="text/javascript"></script>
	<script src="Assets/scripts/script.js" type="text/javascript"></script>
	<script src="Assets/scripts/examcity.js" type="text/javascript"></script>
	
	
		<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="Assets/scripts/crop.js"></script>-->
	<!-- Include Bootstrap Datepicker -->
<link href="Assets/css/datepicker.min.css" rel="stylesheet">
<link href="Assets/css/datepicker3.min.css" rel="stylesheet">
<script src="Assets/js/bootstrap-datepicker.min.js"></script>
	


	<script src="Assets/js/modernizr-latest.js" type="text/javascript"></script>
	
<style>

body
	{
		
		background-color:#2c3e50;
		font-family: 'Open Sans', sans-serif;
	}
	#alertwarning
	{
		background-color:#27ae60;
		border:none;
		color:#fff;
		font-weight:bold;
	}
  
  	#alertdanger
	{
		background-color:#e74c3c;
		border:none;
		color:#fff;
		font-weight:bold;
	}
	
	

</style>
</head>
<body>
  
  <div class="container">
<p><br></p>
<p><br></p>
</div>
	
  
  <div class="container">
		
		
		
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 10px 0 10px rgba(255,255,255,.5) inset;">
			
			<!--header logo-->
			<div class="row">
				<div class="panel-title">
					<div class="col-md-2"><img class="img-responsive" src="Assets/images/TAB.png"></div>
					<div class="col-md-8"><img class="img-responsive" height="100" src="Assets/images/LOGOS_1.jpg" width="800"></div>
						<div class="col-md-2"></div>
				</div>
			</div>
			<!--end header logo-->
			
			<div class="panel-body">
				
				<div class="page-header">
					<h2 class="text-center">Exam Registration Form for November 2015</h2>
				</div>
				
         
              <?php if($paymentstatus == '1'){ ?>
				
				<div class="alert alert-warning" id="alertwarning">
						<ul>
						<li style="list-style: none; display: inline">
						<h5 style="font-weight: bold; text-decoration: underline">Application Number: <?php echo $Application_number; ?></h5>
						</li>
                          <li><h5 style="font-weight: bold;">Your transaction is "successful"</h5></li>
						</ul>
				</div>
              
              
              <div class="container">
              <div class="col-md-12">
                <legend><b>Registration details</b></legend>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                  
                    <div class="row">
                      <div class="col-md-4"><h6>Name</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $Name ?></div>
                    </div>
                    
                                    
                     <div class="row">
                      <div class="col-md-4"><h6>EmailId</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $Emailid ?></div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-4"><h6>Course 1</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $Course1 ?></div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-4"><h6>Date 1</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $ExamDate1 ?></div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-4"><h6>City 1</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $primarycity1 ?></div>
                    </div>
                    <?php if($Courses_applied == '2'){ ?>
                     <div class="row">
                      <div class="col-md-4"><h6>Course 2</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $Course2 ?></div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-4"><h6>Date 2</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $ExamDate2 ?></div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-4"><h6>City 2</h6></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-6"><?php echo $primarycity2 ?></div>
                    </div>
                    <?php } ?>
                  
                  
                  </div>
                  <div class="col-md-2"></div>
                  
                  
                  
                </div>
              </div>
              </div>
              
              <?php }
              else
              {
                ?>
                
                <div class="alert alert-warning" id="alertdanger">
						<ul>
						<li style="list-style: none; display: inline">
						<h5 style="font-weight: bold; text-decoration: underline">Application Number: <?php echo $Application_number; ?></h5>
						</li>
                          <li><h5 style="font-weight: bold; ">"Your registration has Failed"</h5></li>
                          <li><h5 style="font-weight: bold; ">Please try to make payment again later</h5></li>
						</ul>
				</div>
                
                <?php
              }?>
              
          </div>
    </div>
  </div>
  
  
  
  
  
  
    <script src="Assets/js/bootstrap.min.js"></script>
  <script src="Assets/js/bootswatch.js"></script>

	
</body>
</html>
