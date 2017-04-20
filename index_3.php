<?php
session_start();
require('Connections/dbconnection.php');
?>
<?php 

if(!empty($_SESSION['username']))
{
	
$user = $_SESSION['username'];

	
}
else
{
	$user='';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NOC Home Page</title>


<link rel="stylesheet" href="css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" href="css/style_final.css" type="text/css">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
<script type="text/javascript" src="js/modernizr-latest.js"></script>
 <style type="text/css">
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0.0; }
}
.navbar {
    min-height: 60px!important;
}
.navbar-brand {
    line-height: 34px!important;
    height: 60px!important;
}
.navbar-nav>li>a {
    line-height: 36px!important;
}
.carousel-inner>.item>img, .carousel-inner>.item>a>img {
	width:100%!important;
    height:500px!important;
}
.navbar-default {
    background-color: rgb(63,81,181)!important;
    border-color: rgb(63,81,181)!important;
}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
    background-color: #323c73 !important;
}
.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus {
    background-color: #323c73 !important;
}
.typepanel {
    min-height: 115px;
    line-height: 115px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    background-color: #9c27b0 !important;
    color: #FFF;
    border-radius: 10px;
    font-family: cursive;
}
.ongoing {
    background-color: #9c27b0 !important;
}
.upcoming {
    background-color: #2196f3 !important;
}
.completed {
    background-color: #4caf50 !important;
}
.carousel {
	width:100%!important;
    height:500px!important;
   }
 </style>	  
	 
  
  </head>
  <body>
    
    <!--navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="#"><b>NPTEL Online Certification</b></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
			
			<ul class="nav navbar-nav navbar-right">
            <li><a href="aboutnoc.php"><b>About Us</b></a></li>
            <!-- <li><a href="pdf/NOC - FREQUENTLY ASKED QUESTIONS.pdf"><b>FAQ</b></a></li> -->
            <li><a href="./faq.php"><b>FAQ</b></a></li>
				<li><a href="contact.html"><b>Contact Us</b></a></li>
				<?php if($user == ''){  ?>
        <li class="dropdown" style="margin-right:10px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Exam Results Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu" >
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" name="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2" placeholder="Date of Birth (ddmmyyyy)" required>
                                            
										</div>
										<div class="form-group">
											 <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										
								 </form>
							</div>
                            <div class="bottom"><b>Note: Only candidates who have appeared for certification exam and its scores are published, will be able to login here </b></div>
							<div class="bottom text-center">
								New here ? <a href="https://onlinecourses.nptel.ac.in/"><b>Join Us</b></a>
							</div>
                            
                            
					 </div>
				</li>
				
			</ul>
			
			
		  </li>
				<?php }else
{
	?>
				<li>	<a href="candidatelogin.php" ><b>Candidate Login</b></a> </li>
				<?php
}?>
      </ul>
    </div>
  </div>
</nav>
	<!--end navbar-->

<div class="container" style="margin-top:60px;">
</div>
		
<!--sub nav bar panel-->


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  
  </ol>

  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
  
  <div class="item active">
      <img src="images/slider/slide_1.jpg" alt="slider 0" height="100">
      <div class="carousel-caption">
		   <!-- <a href="http://nptel.ac.in/careers/" class="btn-link" style="color:#fff;"><h3><b>NPTEL - IIT MADRAS OFFICE IS HIRING !</b></h3></a> -->
      </div>
    </div>
    <div class="item">
      <img src="images/slider/slide_2.jpg" alt="slider 1" height="100">
      <div class="carousel-caption">
		 <!-- <h3 style="color:#fff;"><b>Earn a Certificate from the IITs!</b></h3>-->
         <a href="http://nptel.ac.in/LocalChapter/" class="btn-link" style="color:#fff;"><h3><b> Is your college interested in having a NPTEL local chapter? Are you faculty of a college? If so, visit our Local Chapter portal for colleges</b></h3></a>
      </div>
    </div>
    <div class="item">
     <img src="images/slider/slide_3.jpg" alt="slider 2" height="100">
      <div class="carousel-caption">
		  <a href="https://docs.google.com/spreadsheets/d/1ZrgDJsfZYlM5O0iIY_fqwAOucvW4mIAy3tTkTUNiUUg/pubhtml" class="btn-link" style="color:#fff;"><h3><b>Status about September 2016 Exam Results</b></h3></a>
      </div>
    </div>
    <div class="item">
     <img src="images/slider/slide_4.jpg" alt="slider 3" height="100">
      <div class="carousel-caption">
		  <h3><b><a href="https://onlinecourses.nptel.ac.in/explorer">New set of courses will start in January 2016. Enrollment will open by mid January 1, 2017.</b></a></h3>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container" style="margin-top:10px;">
	<div class="row">
		<div class="col-md-1" feature></div>
		<a href="noccourse.php?panel=upcoming" target="_blank">
			<div class="col-md-3 typepanel upcoming">
		      <i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;&nbsp;Upcoming Courses
		  	</div>
		</a><!--end of col-md-4-->
		<div class="col-md-1" feature></div>
		<a href="noccourse.php?panel=ongoing" target="_blank">
			<div class="col-md-3 typepanel ongoing">
		      <i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;&nbsp;Ongoing Courses
		  	</div>
		</a><!--end of col-md-4-->
		<div class="col-md-1" feature></div>
		<a href="noccourse.php?panel=completed" target="_blank">
			<div class="col-md-3 typepanel completed">
		      <i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;&nbsp;Completed Courses
		  	</div>
		</a><!--end of col-md-4-->
	</div><!--end of row-->
</div><!--end of container-->


<div class="container" >


<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;margin-top:10px;">
  <div class="panel-body">

<!--end of a carousal-->
	
<hr>
    <div>     
        <a href="https://onlinecourses.nptel.ac.in/explorer"><h1 style="text-align: center;"><span style="color: #993300;"><strong>Enroll for January 2017 courses now !</strong></span></h1></a>
        
    </div>    
<hr>
<!--recent newspanel-->
<div class="container">
<div class="row">

<div class="col-md-4">

   <div class="list-group" style="font-family: 'Roboto Condensed', sans-serif; font-size:16px;">
    <a href="#" class="list-group-item active" style="font-size:18px; font-weight:bold; text-align:center; background:#262C3A;">
   <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Recent News
  </a>
	   
       
<!-- <a href="http://nptelonlinecourses.iitm.ac.in/" class="list-group-item"><b><span class="glyphicon glyphicon-star" id="blink-me"></span>&nbsp;Exam Registration open for March 20th/27th 2016</b></a> -->
  <!-- <a href="http://nptel.ac.in/noc/noc_paymentcheck.php" class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;Track your payment status for certification exam here!</a> -->
  <!-- <a href="http://nptel.ac.in/noc/topscorers.php?id=complete" class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;NPTEL Online Certification - Toppers List</a> -->
  <a href="pdf/List of examcities_September 2016.pdf" class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;Tentative Exam Cities for September 18th/25th 2016 exams</a>
  <a href="pdf/List of examcities_October 2016.pdf" class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;Tentative Exam Cities for October 16th/23rd 2016 exams</a>

</div>
</div><!--emd of col-md-12-->

<div class="col-md-8">

<!--search note-->
<div class="page-header col-md-8" style="border:none;">
  <!--<h4 style="font-family: 'Roboto Condensed', sans-serif; color:#666; font-weight:bold;margin-top: 10px;">Search for a course</h4>-->
  <form role="search" action="noccourse.php" method="post">
      
  <div class="input-group">
     <input type="text" class="form-control" id="pref-search" name="pref-search" placeholder="Search courses" width="350"  required style="height:40px;">
     <div class="input-group-addon" style="padding: 0;"><button type="submit" class="btn btn-default" name="search" id="searchicon"><span class="glyphicon glyphicon-search"></span></button></div>
  </div>
  
</form>
	<?php

if(isset($_POST['submit']))
{
	$username = $_POST['exampleInputEmail2'];
	$pass = $_POST['exampleInputPassword2'];
	
	if(is_numeric($pass))
	{
		$day=substr($pass,0,2);
		$year=substr($pass,4,4);
		$month=substr($pass,2,2);
		$password=$year.'-'.$month.'-'.$day;
		
		$safe_uname = mysqli_real_escape_string($dbconn, $_POST['exampleInputEmail2']);
		
		if(($safe_uname != '')&&($password != ''))
		{
			$validate_query = mysqli_query($dbconn,"select EmailId from noc_testscores where EmailId='".$safe_uname."' and DOB='".$password."' ");
			if(mysqli_num_rows($validate_query) > 0)
			{
			$find_rows=mysqli_num_rows($validate_query);
			if($find_rows > 0)
			{
				$_SESSION['username']=$safe_uname;
				$_SESSION['password']=$password;
			?>
		<script type="text/javascript">window.location.href="candidatelogin.php";</script>
		<?php
			}
				else
				{
					?>
		<script type="text/javascript">alert('Invalid Candidate');</script>
		<?php
				}
			}
		}
	}
	
	
}

if(isset($_POST['searchicon']))
{
	
	$co=$_POST['coursename'];
	$splitting = explode(":",$co);
	
	
	$co1 = mysqli_real_escape_string($splitting[0]);
	$co2 = mysqli_real_escape_string($splitting[1]);
	$co3 = ltrim($co2);
	
	mysqli_select_db($database_local_conn, $local_conn);
	$query = mysqli_query("select NOCCourseId from noc_course where `NOCCourseName`='".$co1."' AND `NOCPeriod`= '".$co3."' ");
	if($query > 0)
		{
	while($dd=mysqli_fetch_array($query))
	{
		 
			$num=mysqli_num_rows($query);
			$ff=$dd['NOCCourseId'];
		
		}
		
	}
	
	
	
	if($num > 0)
		{
			?>
            <script>window.location.href='NOCCoursepage.php?id=<?php echo $ff; ?>';</script>
            <?php
			//header('location:NOCCoursepage.php?id=$ff');
		}
		else
		{
			
			echo '<div class="alert alert-danger text-center" role="alert">Sorry No courses found !</div>';
		}
	
}
?>
</div>
<!--end of search note-->
<div class="col-md-11">
	<!-- <div class="well resultwell"><div class="blink_me">Exams conducted on 20 and 27 March for 29 courses - an update</div></div> -->
	<div class="restext"><a href="https://docs.google.com/spreadsheets/d/1ZrgDJsfZYlM5O0iIY_fqwAOucvW4mIAy3tTkTUNiUUg/pubhtml" target="_blank">Status about September 2016 Exam Results</a></div>
	<div class="restext"><a href="https://docs.google.com/spreadsheets/d/1H-x1m5Y5EPQjnIbmjWxSe5oVAXQDcMNEgXxEAEwnCPY/pubhtml?gid=0&single=true" target="_blank">Status about October 2016 Exam Results</a></div>
    <div class="restext"><a href="https://docs.google.com/a/nptel.iitm.ac.in/spreadsheets/d/1RmfFZnmlF-iLrJSDwLRm0s5vOnhIHGUFD07a3C5JOXw/pubhtml" target="_blank">Track Your Certificate Hard copy for Sep and Oct 2016 </a></div>
<!-- 	<div class="resultlist">
		<ul class="reslist list-group">
			<li class="list-group-item resitm">Fundamentals of optical and scanning electron microscopy</li>
			<li class="list-group-item resitm" class="list-group-item">Introduction to Boundary Layers</li>
			<li class="list-group-item resitm">Language and Mind</li>
			<li class="list-group-item resitm">Technical English for Engineers</li>
			<li class="list-group-item resitm">Introduction to Molecular Spectra I/chemisty-II</li>
			<li class="list-group-item resitm">Information Security - II</li>
		</ul>
	</div> -->
	<div class="restext">Login using "Exam Results Login" (top right corner of this page) to view your scores.</div>
</div>

</div><!--end of col-md-12-->

<div class="col-md-2"></div><!--end of dummy col-md-2-->

</div><!--end of row-->
</div><!--end of container--->


<!--end of recent newspanel-->
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		
			
			<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <span class="glyphicon glyphicon-stats" style="font-size: 50px;"></span>
    </a>
  </div>
  <div class="media-body">
	  <h4 class="media-heading" style="text-decoration:underline;"><b>NPTEL Online Certification - Statistics</b></h4>
	  <p>View here the statistics on the NPTEL online certification completed courses.<a href="NocStatisticspage.php">Click here</a></p>
  </div>
</div>
			
			
		</div>
	</div>
	</div>
<hr>



</div><!--end of panel div-->
</div><!--end of conatiner-->





<!-- Footer-->
<footer style="background:#333;
	color:#eee;
	font-size:11px;
	padding:20px;">
<div class="container">
<div class="row">
<div class="col-sm-4">
<h6> &copy; Copyright@2015</h6>
</div>

<div class="col-sm-4 pull-right">
<h5 style="text-decoration:underline;">Contact Us</h5>
<ol class="list-unstyled">
<li>NPTEL Webstudio</li>
<li>IC&SR building 3rd floor</li>
<li>IIT Madras</li>
<li>mail to: nptel@iitm.ac.in</li>
<li><span class="glyphicon glyphicon-phone-alt"></span> (044)- 2257 5905/08</li>
</ol>
</div>
<div class="col-sm-4 pull-right">
<ul class="list-unstyled" style=" display:block;">
<h5 style="text-decoration:underline;">Follow Us</h5>

<li style="float:left;"><a href="https://www.facebook.com/pages/Nptel-India/1413735098927291" target="_blank"><img src="images/FaceBook-icon.png" width="50" height="40"></a></li>
<li style="float:left;"><a href="https://twitter.com/nptelindia" target="_blank"><img src="images/twitter1.png" width="50" height="40"></a></li>
</ul>
</div>


</div><!--end of row-->
            </div><!--end of footer container-->
</footer>
    <!-- End Footer -->


		
	







   <!---jquery-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<?php
	$query2=mysqli_query($dbconn,"select NOCCourseName,NOCPeriod from noc_course order by NOCCourseName");
?>

 <script type="text/javascript">
  $(function() {
    var availableTags = [<?php	while($gg = mysqli_fetch_array($query2)){echo "'".$gg['NOCCourseName']."',";}?>];
    $( "#pref-search" ).autocomplete({
      source: availableTags
    });
  });
  </script>
  </body>
</html>
