<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<?php require_once('Connections/dbconnection.php'); ?>



<?php

if(isset($_GET['id']))
{
	$getting_id=$_GET['id'];
	$pageid=substr($getting_id,1,1);
		
}
else
{
	?>
   <script>window.location.href="index.php";</script>
    <?php
}



if(empty($_SESSION['courseId']))
{
	?>
        <script>window.location.href="index.php";</script>
        <?php
}
else
{
	$coursid=$_SESSION['courseId'];
}

mysqli_select_db($database_local_conn, $local_conn);
  $query_course="SELECT * FROM `noc_course` WHERE `NOCCourseId`='".$coursid."' ";
  $fetch_course = mysqli_query($query_course, $local_conn) or die(mysql_error());
  $fetching=mysqli_fetch_array($fetch_course);
	
	if($fetching['NOCEnableReallocationLogin'] == 'Y')
	{
		if($pageid == '1')
		{
		if($fetching['NOCEnableReallocationDt1'] == 'Y')
		{
			
			
			$examdate=$fetching['NOCExamDt1'];
		}
		}
		if($pageid == '2')
		{
		if($fetching['NOCEnableReallocationDt2'] == 'Y')
		{
			$examdate=$fetching['NOCExamDt2'];
		}
		}
		
		
	}
	else
	{
		?>
        <script>window.location.href="index.php";</script>
   
        <?php
	}





require_once('Connections/local_conn.php');
//$colname_OCCrecordset = "-1";
if (isset($_SESSION['bec_user'])) {
	
  $colname_OCCrecordset = $_SESSION['bec_user'];
  
 
  
  
  mysqli_select_db($database_local_conn, $local_conn);
$query_OCCrecordset_check = "SELECT * FROM `reallocation_table` WHERE `EmailId` = '".$colname_OCCrecordset."' and ExamDate='".date('Y-m-d',strtotime($examdate))."' and CourseId='".$coursid."'";
$OCCrecordset_check = mysqli_query($query_OCCrecordset_check, $local_conn) or die(mysql_error());
$totalRows_OCCrecordset_check = mysqli_num_rows($OCCrecordset_check);
if($totalRows_OCCrecordset_check == 0)
{
	//session_destroy();
	session_destroy();
	?>
    <script>
		alert('Invalid User.');
		window.location.href="index.php";
        </script>
    <?php
}
else
{
  
 
	  
mysqli_select_db($database_local_conn, $local_conn);
$query_OCCrecordset = "SELECT * FROM `reallocation_table` WHERE `EmailId` = '".$colname_OCCrecordset."' and ExamDate='".date('Y-m-d',strtotime($examdate))."' and choice='' and CourseId='".$coursid."' ";
$OCCrecordset = mysqli_query($query_OCCrecordset, $local_conn) or die(mysql_error());
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);


while($row_OCCrecordset = mysqli_fetch_assoc($OCCrecordset))
	{
$RollNumber=$row_OCCrecordset['Regno'];
$FullName=$row_OCCrecordset['Name'];
//$DOB=$row_OCCrecordset['DOB'];
$EmailId=$row_OCCrecordset['EmailId'];
$second_city=$row_OCCrecordset['Secon_city_chosen'];

$CCO=$row_OCCrecordset['City_chosen'];
$CA=$row_OCCrecordset['City_alloc'];

$choice=$row_OCCrecordset['choice'];
$newone=$row_OCCrecordset['newcity'];
	}
if($totalRows_OCCrecordset == 0)
{
	//session_destroy();
	session_destroy();
	?>
    <script>
		alert('You have already given your choice. Thank you');
		window.location.href="index.php";
        </script>
    <?php
	
	//header("Location:Reallocation.php?id=".$getting_id."&result=registered");
}
  
  
  
}
  
}





?>
<?php
if (isset($_POST["insert"])) {
	
		
		$course=$_POST['course'];
		$exam=$_POST['exam'];
		$fname=$_POST['fname'];
		
		$roll=$_POST['rollno'];
						
		$emailid=$_POST['emailid'];
		
		
		
		$newcity = $_POST['newcity'];
		
		
		
		
		
		
		
		
			


if(isset($_POST['colorRadio']))
{
	$colorRadio=$_POST['colorRadio'];

}
$Result2='0';
if(empty($colorRadio))
{
	$Result2 = '0';
	//echo "Select any one option";
	?>
	
    <script>
	alert('Select any one option');
	</script>
    <?php
}
else
{
	
if(($colorRadio == 'blue') && ($newcity == ''))
{
	 //$Result2=0;
	//echo "please select city";
	?>
	
    <script>
	alert('Please select new city select option');
		</script>
    
    <?php
}
else
{
if($colorRadio == 'green')
{
		
		
	mysqli_select_db($database_local_conn, $local_conn);
	$insertSQL1="UPDATE `reallocation_table` SET `choice`='Accept' where `EmailId`='".$emailid."' and Regno= '".$roll."' and ExamDate='".$exam."' and CourseId='".$course."'  ";

  
  $Result2 = mysqli_query($insertSQL1, $local_conn) or die(mysql_error());
   
  
}
else if(($colorRadio == 'blue') && ($newcity != ''))
{
	 mysqli_select_db($database_local_conn, $local_conn);
	$insertSQL2="UPDATE `reallocation_table` SET `newcity`='".$newcity."' , choice='New' where `EmailId`='".$emailid."' and Regno= '".$roll."' and ExamDate='".$exam."' and CourseId='".$course."' ";

 
  $Result2 = mysqli_query($insertSQL2, $local_conn) or die(mysql_error());
   
	
}
else if($colorRadio == 'red')
{
	 mysqli_select_db($database_local_conn, $local_conn);
	$insertSQL3="UPDATE `reallocation_table` SET `choice`='Refund' where `EmailId`='".$emailid."' and Regno= '".$roll."' and ExamDate='".$exam."' and CourseId='".$course."' ";

 
  
  $Result2 = mysqli_query($insertSQL3, $local_conn) or die(mysql_error());
  
	
}
}
}

  //$insertGoTo = "index.php?result=success";
  if ($Result2 > 0)
   {
	   
	   ?>
        <script>
		alert('Thank you for the response. Successfully recorded your choice.');
		window.location.href="noclogout.php";</script>
       <?php
  // header("Location:Reallocation.php?id=".$getting_id."&result=success");
  	}
  
  //header(sprintf("Location: %s", $insertGoTo));
  		
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC: Exam city reallocation</title>

<!----bootstrap css-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">


<!----naveen stylesheet-->
<link href="css/style.css" rel="stylesheet">
<!---include modernizer before other javascript-->
<script type="text/javascript" src="js/modernizr-latest.js"></script>

   
   
  


<style type="text/css">
    .box{
        padding: 10px;
        display: none;
        margin-top: 20px;
        
    }
    .red{ background: #ffff; }
    .green{ background: #ffff; }
    .blue{ background: #ffff; }
</style>


  <script type="text/javascript">
    function validatenumber1() {
        var mobile = document.getElementById("mob1").value;
       // var pattern = /^\d{10}$/;
	   
	  
        	if ((mobile.length < 10) || (isNaN('mobile')))
		 	{
			
			alert("It is not valid mobile number.input 10 digits number1!");
			document.getElementById("mob1").value='';
            return false;
			
        	} 
			else
			
            {
				return true;
			}
			
			
		

    }
	</script>
      <script type="text/javascript">
    function validatenumber2() {
        var mobile1 = document.getElementById("mob2").value;
       
       if ((mobile1.length < 10)||(mobile1.length > 13))
		 	{
			
			alert("It is not valid mobile number.input 10 digits number2!");
			document.getElementById("mob2").value='';
            return false;
			
        	} 
			else
			            
				return true;
    }
	</script>




    <style type="text/css">
		
		pre.tip
		{
			margin: 0px;
			padding: 5px;
			font-size: 0.9em;
		}
		pre.code
		{
			margin: 0px;
			padding: 20px;
			border: solid 1px #CCC;
			font-size: 1.0em;
		}
		em 
		{
			font-size: 0.9em;
			color: #777777; 
		}</style>
	
<script type="text/javascript">
		$(document).ready(function() {
			


			$('#fname').bubbletip($('#tip1_focusblur1'), {
				deltaDirection: 'right',
				bindShow: 'focus',
				bindHide: 'blur'
			});
			
			$('#fname2').bubbletip($('#tip1_focusblur2'), {
				deltaDirection: 'right',
				bindShow: 'focus',
				bindHide: 'blur'
			});
		});
	</script>
    
    
   
   
    

<style>


#link 
{
	text-decoration:none;
	color:green;
}
#wrapper
{
	margin:0 auto;
	width:900px;
	border:1px solid #000;
}

#header
{
	background-color:#A90909;
	height:50px;
	border-radius:3px;
	
}
#imglogo
{
	width:80px;
	height:20px;
	padding-left:30px;
	padding-top:15px;
	padding-bottom:13px;
}
#imginst
{
	padding-left:15px;
	width:850px;
	height:100px;
}
h4
{
	text-align:center;
	color:#D6555A;
	font-size:25px;
	padding-left:12px;
	font-family:"Times New Roman", Times, serif;
}
#tp
{
	color:#424854;
	font-family:"Times New Roman", Times, serif;
	font-size:18px;
	font-weight:bold;
}
#tab1
{
	padding-left:12px;
}
#tab2
{
	width:50%;
	text-align:center;
	font-weight:normal;
}
#imgbar
{
	background-color:#FFF;
	padding-bottom:30px;
	

	
}


#regform {
	background-color: #FFF;
	
	height: auto;
	margin: auto;
}
#maindiv
{
	width:750px;
	margin:0px auto;
	
}
table td{
    border: 1px solid #999;
	padding-bottom:5px;
  }
.red {
color: red;



}

</style>

</head>

<body>



<div class="container" id="main">

<div class="navbar navbar-default navbar-fixed-top" style=" background:#333; padding-bottom:20px;">
<div class="container">

<button class=" navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand" href="index.php" style="margin-bottom:25px; color:#eee; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; "><h1 style="text-align:center;">NPTEL ONLINE CERTIFICATION</h1></a>

</div><!--end container-->
</div><!---end of nav bar-->
<p style="margin-top:50px;"><br /><br /></p>

<div class="container">
<div class="row">
<div class="col-xs-6">

</div>
<div class="col-xs-4">

</div>

<div class="col-xs-2">
<a href="noclogout.php"><button class="btn btn-primary" type="submit">Logout</button></a>
</div>

</div>
</div>
<p></p>
<div class="container">
<div class="row">
<div class="col-xs-12">



  <div class="panel panel-default">
  <div class="panel-body">
   
 <div class="page-header">
  <h2 class="text-center" style="font-family:Verdana, Geneva, sans-serif;">NPTEL Online Certification<br /><?php echo date('M',strtotime($examdate)); ?> <?php echo date('d',strtotime($examdate)); ?><sup>th</sup> Exam - Confirmation for reallocated exam city</h2>
</div>



<form name="form1" method="post" action="" enctype="multipart/form-data">
    <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Registered information</p>
  
  
  <div class="form-group">
    <label for="cname">Course Name - <?php echo $fetching['NOCCourseName']; ?></label>
  </div>
  
  
  
    <div class="form-group">
    <label for="rno">Applicant Number - <?php echo $RollNumber; ?><input type="hidden" name="rollno" id="rollno"  required="required" minlength="9" maxlength="16" size="50"  value="<?php echo $RollNumber; ?>" readonly /></label>
   </div>
  
   <div class="form-group">
    <label for="email">Email Id - <?php echo $colname_OCCrecordset; ?><input name="emailid" type="hidden" required id="emailid" size="50" value="<?php echo $colname_OCCrecordset; ?>" readonly /></label>
  </div>
  
  <div class="form-group">
    <label for="fname">Full Name - <?php echo $FullName; ?>
    <input name="fname" type="hidden" required id="fname" size="50" minlength="4" maxlength="30" onChange="function4()" value="<?php echo $FullName; ?>" readonly /></label>
  </div>
   <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Registered Exam city</p>
  
  <div class="form-group">
    <label for="pcity">Primary city - <?php echo "<strong>".$CCO."</strong>"; ?></label>
  </div>
  
  <div class="form-group">
    <label for="scity">Secondary city - <?php echo "<strong>".$second_city."</strong>"; ?></label>
  </div>
  <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Kindly choose any one option below</p>
  
   <div class="form-group">
    <label for="nptelcity">Next best city suggested by NPTEL - <?php echo "<strong>".$CA."</strong>"; ?></label>
  </div>
  
  
  
  <div class="radio">
  <label>
    <input type="radio" name="colorRadio" id="colorRadio" value="green">
    Accept exam city suggested
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="colorRadio" id="colorRadio" value="blue">
    Choose another exam city</label>
    <label>
    <select class="form-control" name="newcity" id="newcity">
  <option value="">Select</option>
  <?php
		
mysqli_select_db($database_local_conn, $local_conn);
$city = "SELECT * FROM `reallocation_city_nptel` WHERE ExamDate='".date('Y-m-d',strtotime($examdate))."' ";
$city_record = mysqli_query($city, $local_conn) or die(mysql_error());

		
		while($city_fetch=mysqli_fetch_array($city_record))
		{
			$cc=$city_fetch['City'];
			echo '<option value="'.$cc.'">'.$cc.'</option>';
		}
		
		?>
</select>
  </label>
  

  </div>
  
  <div class="radio">
  <label>
    <input type="radio" name="colorRadio" id="colorRadio" value="red">
    I do not wish to take the exam and would like a refund. I understand I will not get a certificate.
  </label>
  </div>
  
  <div class="container">
  <div class="row">
  <div class="col-xs-10">
   <div class="red box"><div class="alert alert-danger">You have selected <strong>I do not want to take the exam, I would like to get Refund</strong> option</div></div>
    <div class="green box"><div class="alert alert-info">You have selected <strong>Accept exam city suggested</strong> option</div></div>
    <div class="blue box"><div class="alert alert-info">You have selected <strong>Choose new exam city</strong> option</div></div>
    
    </div>
    </div>
  </div>
  <input type="hidden" name="course" id="course" value="<?php echo $coursid; ?>">
  
<input type="hidden" name="exam" id="exam" value="<?php echo date('Y-m-d',strtotime($examdate)); ?>">

    
    <div class="alert alert-warning" role="alert"><p style="font-weight:bold;"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Please be sure about your option before submitting. Once submitted, your choice is final. </p></div>
     <input type="hidden" name="MM_insert" value="form2" />
 <div align="center"><input type="submit" name="insert" value="Submit"/></div>

  </form>

</div></div>
</div></div></div>








<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>

    
     <script type="text/javascript">
window.history.forward(1);
function noBack(){
window.history.forward();
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="red"){
                $(".box").hide();
                $(".red").show();
            }
            if($(this).attr("value")=="green"){
                $(".box").hide();
                $(".green").show();
            }
            if($(this).attr("value")=="blue"){
				
				
                $(".box").hide();
                $(".blue").show();
            }
        });
    });
</script>


</body>
</html>
<?php
mysqli_free_result($OCCrecordset);
?>
