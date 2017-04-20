<?php
session_start();
require('Connections/dbconnection.php'); 
?>
<?php 

if(isset($_SESSION['username']) != '')
{
	
$user = $_SESSION['username'];

	
}
else
{
$user = '';
}


?>

<?php

if($_GET['id'] != '')
{
	$_SESSION['courseid']=$_GET['id'];
	
	$get_query=mysqli_query($dbconn,"select * from noc_course where NOCCourseId = '".$_SESSION['courseid']."' ");
	while($fetch_getquery = mysqli_fetch_array($get_query))
	{
		$courseid1 = $fetch_getquery['NOCCourseId'];
		$coursetitle = $fetch_getquery['NOCCourseName'];
		$abstract = $fetch_getquery['NOCCourseAbstract'];
		$courseduration = $fetch_getquery['NOCPeriod'];
		$enrolstdate = $fetch_getquery['NOCEnrolStartDt'];
		$enrolendate = $fetch_getquery['NOCEnrolEndDt'];
		$Regstdate = $fetch_getquery['NOCRegStartDt'];
		$Regendate = $fetch_getquery['NOCRegEndDt'];
		$MockUrl = $fetch_getquery['NOCStaticMockUrl'];
		$CanLogin = $fetch_getquery['NOCEnableCandidateLogin'];
		$reLoginmain = $fetch_getquery['NOCEnableReallocationLogin'];
		$reallocLog1= $fetch_getquery['NOCEnableReallocationDt1'];
		$reallocLog2= $fetch_getquery['NOCEnableReallocationDt2'];
		$Syllabus_link = $fetch_getquery['Syllabus_link'];
		$coursestatus = $fetch_getquery['CourseStatus'];
		$NOCEnableExamScores = $fetch_getquery['NOCEnableExamScores'];
		$NOCAssignmentGraph = $fetch_getquery['NOCAssignmentGraph'];
		$NOCExamGraph = $fetch_getquery['NOCExamGraph'];
		$exmdate1 = $fetch_getquery['NOCExamDt1'];
		$exmdate2 = $fetch_getquery['NOCExamDt2'];
		$exmdate3 = $fetch_getquery['NOCExamDt3'];
		$NOCRegUrl = $fetch_getquery['NOCRegUrl'];
		
		
		
	}
if($exmdate3 == '0000-00-00')
{
$exmdate3 = '';
}
	if(mysqli_affected_rows($dbconn) > 0)
	{
		$nudd=mysqli_num_rows($get_query);
		if($nudd == 0)
		{
			unset($_SESSION['courseid']);
	
	?>
        <script>window.location.href="index.php";</script>
        <?php
		}
	}
	
	
	$ddate=mysqli_query($dbconn,"select DATE_FORMAT(NOW(),'%d-%m-%Y') as df from DUAL ");
	while($fetch_ddate=mysqli_fetch_array($ddate))
	{
		$dat=$fetch_ddate['df'];
	}
	
	
	$erc=mysqli_query($dbconn,"select * from statistics where NOCCourseId = '".$_SESSION['courseid']."' ");
	while($fetch_erc=mysqli_fetch_array($erc))
	{
		$enr=$fetch_erc['Enrolled'];
			$reg=$fetch_erc['Registered'];
			$cer=$fetch_erc['Certified'];
					}
	
	$get_query2=mysqli_query($dbconn,"SELECT SUM(`Count`) as enm_count FROM  `course_analyt_count` WHERE `Type` =  'State' AND  `status` =  'enroll' and CourseId = '".$_SESSION['courseid']."' ");
	while($fetch_getquery2 = mysqli_fetch_array($get_query2))
	{
	$enroll_count =$fetch_getquery2['enm_count'];
	}
	
	$get_query3=mysqli_query($dbconn,"SELECT SUM(`Count`) as reg_count FROM  `course_analyt_count` WHERE `Type` =  'State' AND  `status` =  'register' and CourseId = '".$_SESSION['courseid']."' ");
	while($fetch_getquery3 = mysqli_fetch_array($get_query3))
	{
	$reg_count =$fetch_getquery3['reg_count'];
	}
	
	$get_query4=mysqli_query($dbconn,"SELECT SUM(`Count`) as cert_count FROM  `course_analyt_count` WHERE `Type` =  'State' AND  `status` =  'certificate' and CourseId = '".$_SESSION['courseid']."' ");
	while($fetch_getquery4 = mysqli_fetch_array($get_query4))
	{
	$cert_count =$fetch_getquery4['cert_count'];
	}
	
	
	
}
else
{
	unset($_SESSION['courseid']);
	
	?>
        <script>window.location.href="index.php";</script>
        <?php
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC Course page</title>


	<link rel="stylesheet" href="css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
<script type="text/javascript" src="js/modernizr-latest.js"></script>
	<style>
		#logo { height: 90px; width: 90px; overflow: hidden; }
		
		#cname
    {
		
      box-shadow:0px 0px 5px rgba(210,210,210,210);
      display:block;
    }
		</style>
<style>
	
	#blink_me {
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 2s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    
    -moz-animation-name: blinker;
    -moz-animation-duration: 2s;
    -moz-animation-timing-function: linear;
    -moz-animation-iteration-count: infinite;
    
    animation-name: blinker;
    animation-duration: 2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

@-moz-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}
	
</style>
	<style>
#agraph
{
	width:500px;
	float:left;
	padding-left:25px;
}
#egraph
{
	width:500px;
	float:right;
	padding-right:25px;
}
</style>
	<style>
		body
		{
			
			color:#545454;
		}
		
		#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc 
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
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
      <a class="navbar-brand" href="index.php">NPTEL Online Certification</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
			
			<ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><b>Home</b></a></li>
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
                            <div class="alert alert-warning" style="color:#000;"><b>Fundamentals of database systems are disabled now.</b>
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

		 <p style="margin-top:60px;"></p>
		<?php

if(isset($_POST['submit']))
{
	$username = $_POST['exampleInputEmail2'];
	$pass = $_POST['exampleInputPassword2'];
	
	$day=substr($pass,0,2);
	$year=substr($pass,4,4);
	$month=substr($pass,2,2);
	$password=$year.'-'.$month.'-'.$day;
	
	
	
	if(($username != '')&&($password != ''))
	{
		
	include('Connections/local_conn.php');
	
		$validate_query = mysqli_query($dbconn,"select * from noc_testscores where EmailId='".$username."' and DOB='".$password."' ");
		if(mysqli_affected_rows($dbconn) > 0)
		{
		$find_rows=mysqli_num_rows($validate_query);
		if($find_rows > 0)
		{
			$_SESSION['username']=$username;
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
?>
	
<?php
$today = date("Y-m-d");
?>
<div class="container">

<div class="row">

<div class="col-sm-8">
	<h2><b><?php if($coursetitle != ''){ echo $coursetitle;} ?></b> &nbsp;<?php if(($today >= $enrolstdate)&&($today <= $enrolendate)){ echo '<a href="https://onlinecourses.nptel.ac.in/explorer" id="blink_me"><img src="images/enroll.png" width="150" height="90"></a>'; } ?></h2>
<hr>

<?php if($abstract != ''){ ?>
<h4 style="font-weight:bold; text-decoration:underline;">Course abstract</h4>
<p class="text-justify"><?php echo $abstract; ?></p>

<?php }?>

</div><!--end of col-sm-6-->


<div class="col-sm-4" style="margin-top:50px;">
<div class="panel" style="background:#202020; color:#fff; font-weight:bold; padding:3px;">
<?php if($courseduration != ''){ ?>
<h5><span class="glyphicon glyphicon-time"></span>&nbsp;Course Duration : <?php echo $courseduration; ?></h5><!--Course duration-->
<hr>
<?php } ?>
<?php if($Syllabus_link != ''){ ?>
<h5><a href="<?php echo $Syllabus_link; ?>"  style="color:#fff;"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Syllabus</a></h5><!--Course duration-->
<hr>
<?php }?>
<?php if($enrolstdate != ''){ ?>
<h5><?php if(($today >= $enrolstdate)&&($today <= $enrolendate)){ ?><a href="https://onlinecourses.nptel.ac.in/explorer"  style="color:#fff;"><span class="glyphicon glyphicon-book"></span>&nbsp;Enrollment : <?php  echo date('d-M-Y', strtotime($enrolstdate)).' to '.date('d-M-Y', strtotime($enrolendate)); ?></a><?php }else
{
	?>
    <span class="glyphicon glyphicon-book"></span>&nbsp;Enrollment : <?php  echo date('d-M-Y', strtotime($enrolstdate)).' to '.date('d-M-Y', strtotime($enrolendate)); ?>
    <?php
}?></h5><!--Course duration-->
<hr>
<?php } ?>
	
<?php if($Regstdate != '' ){ ?>
<h5><?php if(($today >= $Regstdate)&&($today <= $Regendate)){?><a href="<?php echo $NOCRegUrl; ?>"  style="color:#fff;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Exam registration : <?php  echo date('d-M-Y', strtotime($Regstdate)).' to '.date('d-M-Y', strtotime($Regendate)); ?></a><?php }else{
	?>
    <span class="glyphicon glyphicon-pencil"></span>&nbsp;Exam registration : <?php  echo date('d-M-Y', strtotime($Regstdate)).' to '.date('d-M-Y', strtotime($Regendate)); ?>
    <?php
	
	
	}?></h5><!--Course duration-->
<hr>
<?php } ?>
	
	<?php if(($exmdate1 != '')&&($exmdate2 != '')){ ?>
<h5><span class="glyphicon glyphicon-pencil"></span>&nbsp;Exam Date : <?php if($exmdate1 != ''){ echo date('d-M-Y', strtotime($exmdate1)).', ';} if($exmdate2 != ''){ echo date('d-M-Y', strtotime($exmdate2)).' ';}if($exmdate3 != ''){ echo ', '.date('d-M-Y', strtotime($exmdate3));} ?></h5><!--Course duration-->
<hr>
<?php } ?>

<?php if($MockUrl != ''){ ?>
<h5><a href="<?php echo $MockUrl; ?>"  style="color:#fff;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Take mock test</a></h5><!--Course duration-->
<hr>
<?php } ?>

<?php
if($reLoginmain == 'Y')
{
	if($reallocLog1 == 'Y')
{
?>

<?php $_SESSION['courseId']=$courseid1;
 ?>
<h5>
<a href="#" data-toggle="modal" data-target="#reallocationlogin1" style="color:#fff;" data-backdrop="false"><span class="glyphicon glyphicon-user"></span>&nbsp;Reallocation Login for <?php  echo date('d-M-Y', strtotime($exmdate1)); ?></a></h5>
<hr>

<?php
}


	if($reallocLog2 == 'Y')
{
	
?>

<?php $_SESSION['courseId']=$courseid1; ?>
<h5><a href="#" data-toggle="modal" data-target="#reallocationlogin2" style="color:#fff;" data-backdrop="false"><span class="glyphicon glyphicon-user"></span>&nbsp;Reallocation Login for <?php  echo date('d-M-Y', strtotime($exmdate2)); ?></a>
</h5>
<hr>
<?php
}

}
?>

</div><!--end of panel-->
	<?php
if(($coursestatus == 'comp') || ($coursestatus == 'ocsc') || ($coursestatus == 'oclc') ||($coursestatus == 'octc'))
{
?>
	<br>
	<div class="panel" style="background:#202020; color:#fff; padding:3px;">
		<?php if($enroll_count != ''){ ?>

<h5><a href="course_analytics.php?id=<?php echo $courseid1; ?>" target="_blank" style="color:#fff;"><span class="glyphicon glyphicon-stats"></span>&nbsp;Course Statistics</a></h5>
		<hr>
<?php
}
else
{
	?>
    <h5><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Course Statistics will be published shortly</h5>
    <?php
}
?>
<?php
	$city_query=mysqli_query($dbconn,"select * from reallocation_city_nptel where ExamDate='".date('Y-m-d',strtotime($exmdate1))."' ");

$city1_num=mysqli_num_rows($city_query);
if($city1_num > 0)
{
if($exmdate1 != '')
{
?>
<h5><a href="#" data-toggle="modal" data-target="#examcities1" data-backdrop="false" style="color:#fff;"><span class="glyphicon glyphicon-globe"></span>&nbsp;<?php echo 'Exam Conducted cities for '.date('d-M-Y',strtotime($exmdate1)); ?></a></h5>
		<hr>
<?php
}
}
?>


<?php
	$city_query2=mysqli_query($dbconn,"select * from reallocation_city_nptel where ExamDate='".date('Y-m-d',strtotime($exmdate2))."' ");

$city2_num=mysqli_num_rows($city_query2);
if($city2_num > 0)
{
if($exmdate2 != '')
{
?>
<h5><a href="#" data-toggle="modal" data-target="#examcities2" data-backdrop="false" style="color:#fff;"><span class="glyphicon glyphicon-globe"></span>&nbsp;<?php echo 'Exam Conducted cities for '.date('d-M-Y',strtotime($exmdate2)); ?></a></h5>
<?php
}
}
?>
<?php

	$city_query3=mysqli_query($dbconn,"select * from reallocation_city_nptel where ExamDate='".date('Y-m-d',strtotime($exmdate3))."' ");
$city3_num=mysqli_num_rows($city_query3);
if($city3_num > 0)
{
if($exmdate3 != '')
{
?>
<h5><a href="#" data-toggle="modal" data-target="#examcities3" ><span class="glyphicon glyphicon-globe"></span>&nbsp;<?php echo 'Exam Conducted cities for '.date('d-M-Y',strtotime($exmdate3)); ?></a></h5>
<?php
}
}
?>
	</div>
	<?php
}
 ?>

</div><!--end of col-sm-6-->

</div><!--end row-->

</div><!--container-->

<?php
$get_query1=mysqli_query($dbconn,"select * from nocprof_info where CourseId = '".$_SESSION['courseid']."' ");
if(mysqli_affected_rows($dbconn) > 0)
	{
		$num=mysqli_num_rows($get_query1);
		if($num > 0)
		{
?>
<hr>
<div class="container">
<div class="row">
	<?php
	   include('Connections/local_conn.php'); 
	   
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$_SESSION['courseid']."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			 ?>
	<div class="col-sm-8">
	<?php
		   }
		   else
		   {
			   ?>
		<div class="col-sm-12">
		<?php
		   }
	   
	   }
	   ?>

<h4 style="font-weight:bold; text-decoration:underline;">Course Instructor</h4>
<div class="media col-md-12">
<?php		
	while($fetch_getquery1 = mysqli_fetch_array($get_query1))
	{
		$prof_name = $fetch_getquery1['Name'];
		$about_prof = $fetch_getquery1['About'];
		$photo_path = $fetch_getquery1['photo_path'];
		$prof_url = $fetch_getquery1['Url'];
		
	
		
	?>
	
	<div class="row">
   <a class="pull-left col-md-2" href="<?php if($prof_url != ''){echo $prof_url;}else{echo '#';} ?>">
      <img class="media-object img-responsive" src="<?php echo $photo_path; ?>" alt="Media Object" width="150" height="150">
   </a>
   <?php if(strlen($about_prof) > 3) { ?>
	   <div class="col-md-10 text-justify">
		   <h4 class="media-heading" style="font-size:18px;"><b><?php echo $prof_name; ?></b></h4>
	      <?php echo $about_prof.'<br>'; ?>
		   <?php if($prof_url != ''){ echo '<a href="'.$prof_url.'" target="_blank">More info</a>';} ?>
	   </div>
	</div>
	<?php }
	} ?>

</div>
<?php }
		}

	?>
</div><!--end col-sm-12-->
		<?php
   include('Connections/local_conn.php'); 
	  
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$_SESSION['courseid']."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
?>
	<div class="col-md-4">
		<div class="panel panel-default" class="panel" style="background:#202020; color:#fff; font-weight:bold; padding:3px;">
			
  <div class="panel-body">
	  <h5>Course Sponsors</h5>
	  <hr>
	  <?php
	
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		
	   ?>
  </div>
</div>
	</div>
		<?php
			      }
	   
	   }
			   ?>
</div><!--end row-->
</div><!--end container-->

<!--TA Details-Start-->

<div class="container">
<div class="row">

<h4 style="font-weight:bold; text-decoration:underline;">Teaching Assistant(s)</h4>

<?php
include('Connections/local_conn.php');
$ta_details=mysqli_query($dbconn,"select * from ta_details where TA_CourseId = '".$_SESSION['courseid']."' ");

$tanum = mysqli_num_rows($ta_details);

?>

<?php 
if($tanum > 0)
{
while($ta_row=mysqli_fetch_array($ta_details))
{
?>
<div class="thumbnail" style="margin:5px; width:300px; height:200px; overflow: hidden; display:inline-block; font-size:14px;">

      <img src="<?php echo $ta_row['TA_Photopath'];?>" alt="<?php echo $ta_row['TA_Name']; ?>" id="logo" class="img-circle" style="border:1px solid #666;">
      <div class="caption text-center">
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $ta_row['TA_Name']; ?></b></p>
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $ta_row['TA_About']; ?></b></p>
        
      </div>
      
    </div>
    <?php
}
}
else
echo'No teaching assistant data available for this course yet'; 
?>
</div>

</div>

<!--TA Details-End-->


<hr>
<div class="container">
<div class="row">

<div class="col-sm-4">
<div class="panel panel-default">
   <div class="panel-heading">
      <h4 class=" panel-title text-center" style="font-weight:bold;">Enrolled</h4>
   </div>
   <div class="panel-body">
     <p style="text-align:center;"><?php if($enr != ''){ echo $enr; }else{ echo 'Will be announced';} ?></p>
   </div>
</div>
</div><!--end of col-sm-4-->

<div class="col-sm-4">
<div class="panel panel-default">
   <div class="panel-heading">
      <h4 class=" panel-title text-center" style="font-weight:bold;">Registered</h4>
   </div>
   <div class="panel-body">
     <p style="text-align:center;"><?php if($reg != ''){ echo $reg; }else{ echo 'Will be announced';} ?></p>
   </div>
</div>
</div><!--end of col-sm-4-->

<div class="col-sm-4">
<div class="panel panel-default">
   <div class="panel-heading">
      <h4 class=" panel-title text-center" style="font-weight:bold;">Certificate Eligible</h4>
   </div>
   <div class="panel-body">
     <p style="text-align:center;"><?php if($cer != '' && $cer != 0){ echo $cer; }else{ echo 'Will be announced';} ?></p>
   </div>
</div>
</div><!--end of col-sm-4-->


</div><!--end of row-->
</div><!--end of conatiner-->
<hr>
<!--certificate model -->
<?php
if($coursestatus == 'comp')
{
?>
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="well">
<h4 style=" font-weight:bold; text-decoration:underline;">Certificate Model</h4>
<?php
if(($courseduration != 'Mar-Aug 2014')&&($courseduration != 'Sep-Nov 2014')&&($courseduration != 'Jan-Mar 2015'))
{
	?>
    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="EliteGold.jpg" data-backdrop="false"><img src="Certificateimages/EliteGold.jpg" width="250" height="250" class="img-thumbnail"></a>&nbsp;&nbsp;
     <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Elite.jpg" data-backdrop="false"><img src="Certificateimages/Elite.jpg" width="250" height="250" class="img-thumbnail"></a>&nbsp;&nbsp;
    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Empty.jpg" data-backdrop="false"><img src="Certificateimages/Empty.jpg" width="250" height="250" class="img-thumbnail"></a>
     <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Participation.jpg" data-backdrop="false"><img src="Certificateimages/Participation.jpg" width="250" height="250" class="img-thumbnail"></a> -->
    <?php
}
else
{

?>
<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $courseid1; ?>.jpg" data-backdrop="false"><img src="Certificateimages/<?php echo $courseid1; ?>.jpg" width="650" height="350" class="img-thumbnail"></a>
<?php
}
?>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="well">
<h4 style=" font-weight:bold; text-decoration:underline;">Legend</h4>
<?php
if(($courseduration != 'Mar-Aug 2014')&&($courseduration != 'Sep-Nov 2014'))
{ ?>
	<?php if(($courseduration == 'Jul-Sep 2016') && ($courseduration != 'Jul-Oct 2016'))
	{ 
		if($courseid1 == 'noc16-hs20') { ?>
			<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Legend_3.jpg" data-backdrop="false"><img src="Certificateimages/Legend_3.jpg" width="250" height="250" class="img-thumbnail"></a>&nbsp;&nbsp;
		<?php } else { ?>
			<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Legend_2.jpg" data-backdrop="false"><img src="Certificateimages/Legend_2.jpg" width="250" height="250" class="img-thumbnail"></a>&nbsp;&nbsp;
	<?php } 
	} else { ?>
    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="Legend.jpg" data-backdrop="false"><img src="Certificateimages/Legend.jpg" width="250" height="250" class="img-thumbnail"></a>&nbsp;&nbsp;         
<?php }
} else { ?>
	<h1> - </h1>
<?php } ?>
</div>
</div>
</div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
        
        <img src="#" class="img-responsive" id="certifpopup">
        
      </div>
   
    </div>
  </div>
</div>


<hr>
<?php

}
?>

<?php
if($coursestatus == 'comp')
{
	$Agraph = 'graph/'.$courseid1.'(A).jpg';
		$Egraph = 'graph/'.$courseid1.'(E).jpg';
if((file_exists($Agraph) ) || (file_exists($Egraph)))
{
?>
<div class="container">
<div class="row">
<div class="col-xs-12">
	
	
	
<div class="well">
	
	<?php
		
	
	if (file_exists($Agraph)) {
    
 
	?>
<div class="col-xs-6" id="agraph">
<h2 style="font-size:21px; text-align:center; text-decoration:underline;">Assignment Score distribution</h2>
<img src="<?php echo 'graph/'.$courseid1.'(A).jpg'; ?>" width="450px" height="350px">
</div>
	<?php
}

if (file_exists($Egraph)) {
    
	?>
	
	
<div class="col-xs-6" id="egraph">
<h2 style="font-size:21px; text-align:center; text-decoration:underline;">Exam Score distribution</h2>
<img src="graph/<?php echo $courseid1.'(E).jpg'; ?>" width="450px" height="350px" >
</div>
	
	<?php
}
	?>
<div style="clear:both;">
</div>
	
</div>

	
	
	<?php
}
if($coursestatus == 'comp' && ($courseduration != 'Jul-Sep 2016' || $courseduration != 'Sep-Oct 2016' || $courseduration != 'Jul-Oct 2016'))
{

	if($NOCEnableExamScores == 'Y')
	{
	?>
	<div>
		<?php
	include('Connections/local_conn.php');
	
	$nocperiod_query = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCCourseId='".$courseid1."' limit 1");
	
	if(mysqli_affected_rows($dbconn) > 0)
	{
		$period_check = mysqli_num_rows($nocperiod_query);
		
		if($period_check > 0)
		{
		
	while($fetch_nocperiod = mysqli_fetch_array($nocperiod_query))
	{
		$period = $fetch_nocperiod['NOCPeriod'];
		$courseId = $fetch_nocperiod['NOCCourseId'];
		
		?>
	<div class="panel panel-default">
		<div class="panel-heading text-center"><b><?php echo $fetch_nocperiod['NOCCourseName']; ?> - Toppers list</b></div>
  		<div class="panel-body" >
	  
	  <?php
	include('Connections/local_conn.php');
	$arrynew = array();
	$toppers_querynew = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$courseId."' and FinalScore >=90 order by FinalScore desc");
	while($fetch_toppersnew = mysqli_fetch_array($toppers_querynew))
	{
		$arrynew[]=$fetch_toppersnew['FinalScore'];
	}
	$listnew = "'". implode("', '", $arrynew) ."'";
	$toppers_query = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseid1."' and b.FinalScore IN($listnew) order by b.FinalScore desc");
	$score_fetch = 0;	
		if(mysqli_affected_rows($dbconn) > 0)
		{
			$score_fetch = mysqli_num_rows($toppers_query);
		}
		
		
		if($score_fetch >= 10)
		{
			
		while($fetch_toppers = mysqli_fetch_array($toppers_query))
		{
			?>
	  <!--thumbnail start-->
			
  
    <div class="thumbnail" style="margin:5px; width:260px; height:180px; overflow: hidden; display:inline-block; font-size:14px;">
      <img src="<?php echo $fetch_toppers['photopath']; ?>" alt="<?php echo $fetch_toppers['Name']; ?>" id="logo" class="img-circle" style="border:1px solid #666;">
      <div class="caption text-center">
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $fetch_toppers['Name']; ?> <span class="badge"><?php echo $fetch_toppers['FinalScore'].'%'; ?></span></b></p>
		  <p style="font-size:11px; text-transform:uppercase"><b>
		  	<?php $clgname = $fetch_toppers['CollegeName'];
		  			$orgname = $fetch_toppers['OrganizationName'];
		  			$role = $fetch_toppers['Role'];
		  			if($role == 'Student')
		  			{
		  				echo $clgname;
		  			} else if($role == 'Faculty')
		  			{
		  				if($clgname != '')
		  				{
		  					echo $clgname;
		  				} else {
		  					echo $orgname;
		  				}
		  			} else if ($role == 'Others') {
		  				if($orgname != '')
		  				{
		  					echo $orgname;
		  				} else {
		  					echo $clgname;
		  				}
		  			}
		  	 ?>
		  </b></p>
      </div>
    </div>
	 
	<!--end of thumbnail start-->
				
	  <?php
		}
			
			
		}
		else
		{
		include('Connections/local_conn.php');
		$arry = array();
	$toppers_query3 = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$courseId."' and FinalScore >=50 order by FinalScore desc limit 10 ");
	while($fetch_toppers3 = mysqli_fetch_array($toppers_query3))
	{
		$arry[]=$fetch_toppers3['FinalScore'];
	}
	$list = "'". implode("', '", $arry) ."'";
	$toppers_query2 = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseId."' and b.FinalScore IN($list) order by b.FinalScore desc");
			
			while($fetch_toppers2 = mysqli_fetch_array($toppers_query2))
		{
				?>
	  <!--thumbnail start-->
			
  
    <div class="thumbnail" style="margin:5px; width:260px; height:180px; overflow: hidden; display:inline-block; font-size:14px;">
      <img src="<?php echo $fetch_toppers2['photopath']; ?>" alt="<?php echo $fetch_toppers2['Name']; ?>" id="logo" class="img-circle" style="border:1px solid #666;">
      <div class="caption text-center">
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $fetch_toppers2['Name']; ?> <span class="badge"><?php echo $fetch_toppers2['FinalScore'].'%'; ?></span></b></p>
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $fetch_toppers2['CollegeName']; ?></b></p>
          <p style="font-size:11px; text-transform:uppercase"><b><?php echo $fetch_toppers2['OrganizationName']; ?></b> </p>
        
      </div>
    </div>
	 
	<!--end of thumbnail start-->
	  <?php
				
			}
			
		}
		?>
	  
  				</div>
</div>
				<?php
	}
		}
		
	}
?>
	</div>
	
	<?php
	}
	}
		?>
	
</div>
</div>
</div>

<hr>
<?php

}
?>




<div class="modal fade" id="examcities1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Exam Cities for date 1</h4>
      </div>
      <div class="modal-body">
      
       <?php
	   
	while($rowss=mysqli_fetch_array($city_query))
	{
		$city1=$rowss['City'];
		?>
        <ul>
        <li><?php if($city1!=''){echo $city1;}else
		{
			echo 'will be announced';
		}?></li>
        </ul>
        <?php
	}
	   ?>

        <div>
        
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="examcities2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Exam Cities for date 2</h4>
      </div>
      <div class="modal-body">
      
       <?php
	 
	while($rowss=mysqli_fetch_array($city_query2))
	{
		$city2=$rowss['City'];
		?>
        <ul>
        <li><?php echo $city2; ?></li>
        </ul>
        <?php
	}
	   ?>

        <div>
        
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="examcities3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Exam Cities for date 3</h4>
      </div>
      <div class="modal-body">
      
       <?php
	   
	while($rowss=mysqli_fetch_array($city_query3))
	{
		$city3=$rowss['City'];
		?>
        <ul>
        <li><?php echo $city3; ?></li>
        </ul>
        <?php
	}
	   ?>

        <div>
        
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>





<div class="modal fade" id="candidatelogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Candidate Login</h4>
      </div>
      <div class="modal-body">
      
       <form class="form-horizontal" action="NOC_Login.php" method="post" name="form1">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="inputEmail3" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="inputPassword3" placeholder="ddmmyyyy" required>
      <input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $courseid1; ?>" required>
      
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="csignin" id="csignin" onClick="return checkForm(form)">Sign in</button>
    </div>
  </div>
</form>

        <div>
        <ul>
<strong>Note:</strong>
<li>UserName is your email id registered for the course. Your password is your date of birth in the format – ddmmyyyy</li>
<li>Only candidates who registered for the certification exam and wrote the exam, will be able to login here to view scores.</li>
<li>If candidates have taken the retest, the best of the 2 test scores will be displayed.</li>

</ul>
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>

<!---reallocation1-->
<div class="modal fade" id="reallocationlogin1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reallocation Login for <?php  echo date('d-M-Y', strtotime($exmdate1)); ?></h4>
      </div>
      <div class="modal-body">
      
       <form class="form-horizontal" action="" method="post" name="form1">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="inputEmail3" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    
      <input type="password" class="form-control" id="inputPassword3" name="inputPassword3" placeholder="Registered Mobile number" required >
      <input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $courseid1; ?>" required>
      <input type="hidden" class="form-control" id="id" name="id" value="216335645Adcf" required>
      
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="rsignin1" id="rsignin1">Sign in</button>
    </div>
  </div>
</form>

        <div>
        <ul>
<strong>Note:</strong>
<li>UserName is your email id registered for the course. Your password is your Mobile number.</li>
<li>Login available only to candidates whose exam city is reallocated and you have received an email and sms on the same.</li>
<li>Last date to fill the form is Apr 20th (Monday) 1 PM.</li>
<li>For candidates who do not fill the form with their choice, the hall ticket will be generated for the next best city suggested by NPTEL and no requests for refund will be entertained after Apr 20th 1 PM</li>
</ul>
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>

<?php

if (isset($_POST['inputEmail3'])) {
  $loginUsername=$_POST['inputEmail3'];
  $password=$_POST['inputPassword3'];
  
   $cc=$_POST['cid'];
  
  //$finalexamdate=$_POST['examdate'];
   $iddd=$_POST['id'];
 $pageid=substr($iddd,1,1);
   
   
   mysqli_select_db($database_local_conn, $local_conn);
  $query_course="SELECT * FROM `noc_course` WHERE `NOCCourseId`='".$cc."' ";
  $fetch_course = mysqli_query($query_course, $local_conn) or die(mysql_error());
  $fetching=mysqli_fetch_array($fetch_course);
	
	if($fetching['NOCEnableReallocationLogin'] == 'Y')
	{
		if($pageid == '1')
		{
		if($fetching['NOCEnableReallocationDt1'] == 'Y')
		{
			
			
			$finalexamdate=$fetching['NOCExamDt1'];
		}
		}
		if($pageid == '2')
		{
		if($fetching['NOCEnableReallocationDt2'] == 'Y')
		{
			$finalexamdate=$fetching['NOCExamDt2'];
		}
		}
		
		
	}
   
   
   
   
   
  
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "Reallocationexamcenter.php?id=$iddd";
  $MM_redirectLoginFailed = "Reallocation.php?id=$iddd&result=fail";
  $MM_redirecttoReferrer = false;
	
	
	
	
	mysqli_select_db($database_local_conn, $local_conn);
  $LoginRS__query="SELECT `EmailId`,`mobno`,`ExamDate` FROM `reallocation_table` WHERE `EmailId`='".$loginUsername."' AND `mobno`='".$password."' AND ExamDate='".date('Y-m-d',strtotime($finalexamdate))."'" ;
  $LoginRS = mysqli_query($LoginRS__query, $local_conn) or die(mysql_error());
  $row=mysqli_fetch_array($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser > 0) {
         $_SESSION['bec_user']=$row['EmailId'];
		 //$_SESSION['examdt']=$row['ExamDate'];

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
   ?>
      <script>
      window.location.href='Reallocationexamcenter.php?id=<?php echo $iddd; ?>';
      
      </script>
      <?php
  }
  else {
	  ?>
      <script>alert('Invalid User');</script>
      <?php
   //header("Location: ". $MM_redirectLoginFailed );
  }
}
?>



<!---reallocation2-->
<div class="modal fade" id="reallocationlogin2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reallocation Login for <?php  echo date('d-M-Y', strtotime($exmdate2)); ?></h4>
      </div>
      <div class="modal-body">
      
       <form class="form-horizontal" action="" method="post" name="form1">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail55" name="inputEmail55" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    
      <input type="password" class="form-control" id="inputPassword55" name="inputPassword55" placeholder="Registered Mobile number" required>
      <input type="hidden" class="form-control" id="cid55" name="cid55" value="<?php echo $courseid1; ?>" required>
      <input type="hidden" class="form-control" id="id55" name="id55" value="52545642Fgt" required>
      
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="rsignin55" id="rsignin55">Sign in</button>
    </div>
  </div>
</form>

        <div>
        <ul>
<strong>Note:</strong>
<li>UserName is your email id registered for the course. Your password is your Mobile number.</li>
<li>Login available only to candidates whose exam city is reallocated and you have received an email and sms on the same.</li>
<li>Last date to fill the form is Apr 20th (Monday) 1 PM.</li>
<li>For candidates who do not fill the form with their choice, the hall ticket will be generated for the next best city suggested by NPTEL and no requests for refund will be entertained after Apr 20th 1 PM</li>

</ul>
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>

<?php

if (isset($_POST['inputEmail55'])) {
  $loginUsername=$_POST['inputEmail55'];
  $password=$_POST['inputPassword55'];
  
   $cc=$_POST['cid55'];
  
 // $finalexamdate=$_POST['examdate'];
   $iddd55=$_POST['id55'];
   $pageid=substr($iddd55,1,1);
   
   
   mysqli_select_db($database_local_conn, $local_conn);
  $query_course="SELECT * FROM `noc_course` WHERE `NOCCourseId`='".$cc."' ";
  $fetch_course = mysqli_query($query_course, $local_conn) or die(mysql_error());
  $fetching=mysqli_fetch_array($fetch_course);
	
	if($fetching['NOCEnableReallocationLogin'] == 'Y')
	{
		if($pageid == '1')
		{
		if($fetching['NOCEnableReallocationDt1'] == 'Y')
		{
			
			
			$finalexamdate=$fetching['NOCExamDt1'];
		}
		}
		if($pageid == '2')
		{
		if($fetching['NOCEnableReallocationDt2'] == 'Y')
		{
			$finalexamdate=$fetching['NOCExamDt2'];
		}
		}
		
		
	}
   
   
   
   
   
  
  $MM_fldUserAuthorization = "";
  //$MM_redirectLoginSuccess = "Reallocationexamcenter.php?id=$iddd";
  //$MM_redirectLoginFailed = "Reallocation.php?id=$iddd&result=fail";
  $MM_redirecttoReferrer = false;
	
	
	
	
	mysqli_select_db($database_local_conn, $local_conn);
  $LoginRS__query="SELECT `EmailId`,`mobno`,`ExamDate` FROM `reallocation_table` WHERE `EmailId`='".$loginUsername."' AND `mobno`='".$password."' AND ExamDate='".date('Y-m-d',strtotime($finalexamdate))."'" ;
  $LoginRS = mysqli_query($LoginRS__query, $local_conn) or die(mysql_error());
  $row=mysqli_fetch_array($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser > 0) {
         $_SESSION['bec_user']=$row['EmailId'];
		 //$_SESSION['examdt']=$row['ExamDate'];

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
   ?>
      <script>
      window.location.href='Reallocationexamcenter.php?id=<?php echo $iddd55; ?>';
      
      </script>
      <?php
  }
  else {
	  ?>
      <script>alert('Invalid User');</script>
      <?php
   //header("Location: ". $MM_redirectLoginFailed );
  }
}
?>







<!---jquery-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>




<script>
function checkForm(form)
		  { 
		 re = /^(\d{1,2})(\d{1,2})(\d{4})$/; 
		 if(form1.inputPassword3.value != '')
		  { 
		  if(regs = form1.inputPassword3.value.match(re))
		   { 
		 
		 if(regs[1] < 1 || regs[1] > 31) 
		 {
			  alert("Invalid value for day: " + regs[1]); 
			  form.password.focus(); return false;
		 
		  } 
		
		 
		  if(regs[2] < 1 || regs[2] > 12) { alert("Invalid value for month: " + regs[2]); form1.inputPassword3.focus(); return false; }
		  
		  
		   
		   if(regs[3] < 1902 || regs[3] > (new Date()).getFullYear())
		    { 
			alert("Invalid value for year: " + regs[3] + " - must be between 1902 and " + (new Date()).getFullYear());
			 form1.inputPassword3.focus(); 
			 return false; }
			  } 
			  else
			   {
				    alert("Invalid date format: " + form1.inputPassword3.value); form1.inputPassword3.focus(); 
					
					return false; 
		  
		   
		   }
		   
		  }}
</script>

<script>

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
var final = "Certificateimages/" + recipient;
  $("#certifpopup").attr("src",final);
})

</script>

</body>
</html>
