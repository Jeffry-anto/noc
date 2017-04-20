
<?php

function coursedisplay1($option)
{
	include('Connections/local_conn.php'); 
mysqli_select_db($database_local_conn, $local_conn);
	
	if($option == 'ongoing'){$chosen='ocsc';}else if($option == 'upcoming'){$chosen = 'upsc';}else{$chosen = 'not_avai';}
	
	if(($chosen == 'ocsc') || ($chosen == 'upsc'))
	{
	
	$query = mysqli_query("select * from noc_course where CourseStatus = '".$chosen."' order by NOCCourseName" );
	
	if($query > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	 mysqli_select_db($database_local_conn, $local_conn);
	 $displinequery = mysqli_query("select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-sm-3 col-md-3">
    <div style="float:left; position:relative;">
 
 <a href="NOCCoursepage.php?id=<?php echo $courseid; ?>" target="_blank">
    <div class="thumbnail" style="width:250px; height:300px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?></p></td>
       <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
       
        </div>
        
         
    </div>
  	</a>
    
    </div>
  
 </div>
    
	
     <?php
	}
		}
		else
		{
			echo '<div>Will be announce shortly</div>';
		}
	}
	else
	{
		echo '<div>Will be announce shortly</div>';
	}
	}
	else
	{
		echo '<div>Will be announce soon</div>';
	}
	
	
}

function coursedisplay2($option){
	
	if($option == 'ongoing'){$chosen='oclc';}else if($option == 'upcoming'){$chosen = 'uplc';}else{$chosen = 'not_avai';}
	
	
	if(($chosen == 'oclc')||($chosen == 'uplc'))
	{
	
	$query = mysqli_query("select * from noc_course where CourseStatus = '".$chosen."' order by NOCCourseName");
	
	if($query > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	
	while($row = mysqli_fetch_array($query))
	{
	$courseid=$row['NOCCourseId'];
	$did2=$row['disciplineid'];
	 $displinequery2 = mysqli_query("select * from discipline where DisciplineId = '".$did2."'" );
	 while($ddd=mysqli_fetch_array($displinequery2))
	 {
		 $dname2 = $ddd['DisciplineName'];
	 }
	 $NOCCourseName2=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames2=$row['NOCCoordinatorNames'];
		  $NOCPeriod2=$row['NOCPeriod'];
		 $NOCins2=$row['NOCInstitute'];
	
	?>
    <div class="col-sm-3 col-md-3">
     <div style="float:left; position:relative;">
	
     
  <a href="NOCCoursepage.php?id=<?php echo $courseid; ?>" target="_blank">
  
    <div class="thumbnail" style="width:250px; height:300px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did2; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
        <h3 style="color:#069; float:left; font-weight:bold; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName2; ?></h3>
        <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:200px;"><?php echo $NOCCoordinatorNames2; ?></p>
       	<p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins2; ?></p>
        <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration : '.$NOCPeriod2; ?></p>
      </div>
    </div>
    </a>
  </div>
  

    
    </div>
     <?php
	}
	}
	else
	{
		echo '<div>Will be announce shortly</div>';
	}
	}
	else
	{
		echo '<div>Will be announce shortly</div>';
	}
	}
	else
	{
		echo '<div>Will be announce soon</div>';
	}
	
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CoursePage</title>
<!----bootstrap css-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">


<!----naveen stylesheet-->
<link href="css/style.css" rel="stylesheet">
<!---include modernizer before other javascript-->
<script type="text/javascript" src="js/modernizr-latest.js"></script>

<style>
  /* unvisited link */
a:link {
  text-decoration:none;
}

/* visited link */
a:visited {
	text-decoration:none;
}

/* mouse over link */
a:hover {
   text-decoration:none;
}

/* selected link */
a:active {
    text-decoration:none;
}
  </style>

<style>
#coursename
    {
		
      box-shadow:0px 0px 5px rgba(210,210,210,210);
      display:block;
    }
</style>


 <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
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
<p class="pull-right" style="margin-top:45px; color:#eee; font-size:18px; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:bold;">Follow Us - <a href="https://www.facebook.com/pages/Nptel-India/1413735098927291" target="_blank"><img src="images/FaceBook-icon.png" width="50" height="40"></a>&nbsp;<a href="https://twitter.com/nptelindia" target="_blank"><img src="images/twitter1.png" width="50" height="40"></a></p>


</div><!--end container-->
</div><!---end of nav bar-->


</div>


<div class="container" style="margin-top:130px;">
<div class="row">
<div class="col-xs-6">
<?php
include('Connections/local_conn.php'); 
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
<div class="col-xs-5">
 
      
      <form role="search" action="" method="post">
      
  <div class="input-group">
      
     <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Search courses" width="550"  required style="height:50px;">
     <div class="input-group-addon"><button type="submit" class="btn btn-default" name="searchicon" id="searchicon"><span class="glyphicon glyphicon-search"></span></button></div>
  </div>
  
</form>

</div>

<div class="col-xs-1">
</div>

</div>
</div>

<p style="margin-top:5px;"><br /></p>


<?php
if(isset($_GET['panel']))
{
	 $_GET['panel'];
	
	if(($_GET['panel']) == '')
	{
		?>
        <script>window.location.href="index.php";</script>
        <?php
	}
	elseif((($_GET['panel']) != 'ongoing')&&(($_GET['panel']) != 'upcoming')&&(($_GET['panel']) != 'completed'))
	{
		?>
        <script>window.location.href="index.php";</script>
        <?php
	}
	else
	{
		$option=$_GET['panel'];
	}
}
else
{
	?>
        <script>window.location.href="index.php";</script>
        <?php
}

?>
<?php
if(($option == 'ongoing')||($option == 'upcoming'))
{
?>

<div class="col-xs-3"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left">
		<li class="active"><a href="#home" data-toggle="tab"><strong><span class="glyphicon glyphicon-adjust"></span> Short term Courses</strong></a></li>
		<li><a href="#profile" data-toggle="tab"><strong><span class="glyphicon glyphicon-certificate"></span> Full term Courses</strong></a></li>
   
    </ul>
</div>

<div class="col-xs-9">

    <!-- Tab panes -->
    <div class="tab-content">

      <div class="tab-pane active" id="home">
      
      <div class="thumbnail row">
      
    <?php
	 ///short term courses
	 coursedisplay1($option);
	 ?>  
   
     </div><!---end of thumbnail row-->
    </div>
   
      <div class="tab-pane" id="profile">
      <div class="thumbnail row">
      
     
       <?php
	 ///full term courses
	 coursedisplay2($option);
	 ?>
       
     </div><!---end of thumbnail row-->
      </div>
     
    </div>
</div>  

<?php
}



if($option == 'completed')
{
?>
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="panel panel-default ">
<div class="panel-heading" style="text-align:center; font-weight:bold;"><strong>Completed Courses</strong></div>

<div class="panel-body">

<?php
require_once('Connections/local_conn.php'); 
mysqli_select_db($database_local_conn, $local_conn);
$query=mysqli_query("select * from noc_course where CourseStatus='comp' group by NOCPeriod order by NOCPeriod");
//$fetching=mysqli_fetch_array($query);


?>

<?php
while($fetching = mysqli_fetch_assoc($query))
{
	mysqli_select_db($database_local_conn, $local_conn);
$query2=mysqli_query("select * from noc_course where NOCPeriod='".$fetching['NOCPeriod']."' and CourseStatus='comp' order by NOCCourseName ");
//$fetching2=mysqli_fetch_array($query2);
?>
<div class="panel panel-default">
<div class="panel-heading" style="font-weight:bold;" >
<?php
	echo $fetching['NOCPeriod'].'<br />';
	
	 
	?></div>
    <div class="panel-body">
    <?php
	while($fetching2=mysqli_fetch_array($query2))
	{
		$fff = $fetching2['disciplineid'];
		$displinequery3 = mysqli_query("select * from discipline where DisciplineId = '".$fff."'" );
	 while($ddd=mysqli_fetch_array($displinequery3))
	 {
		 $dname3 = $ddd['DisciplineName'];
	 }
		?>
        
        <div class="col-sm-3 col-md-3">
        
         <a href="NOCCoursepage.php?id=<?php echo $fetching2['NOCCourseId']; ?>" target="_blank">
           <div class="thumbnail" style="width:250px; height:340px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $fff; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
        <h3 style="color:#069; float:left; font-weight:bold; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $fetching2['NOCCourseName']; ?></h3>
        <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:200px;"><?php echo $fetching2['NOCCoordinatorNames']; ?></p>
       	<p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $fetching2['NOCInstitute']; ?></p>
        <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration : '.$fetching2['NOCPeriod']; ?></p>
      </div>
    </div>
		</a>
        
        </div>
        <?php
	}
	
	
	
	?>
    </div>
    </div>
    <?php
}
?>





</div>
</div>

</div>
</div>
</div><!--end of container-->
<?php
}
?>








<!---jquery-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<?php
include('Connections/local_conn.php'); 
	mysqli_select_db($database_local_conn, $local_conn);
	$query2=mysqli_query("select NOCCourseName,NOCPeriod from noc_course order by NOCCourseName");
?>

 <script type="text/javascript">
  $(function() {
    var availableTags = [<?php	while($gg=mysqli_fetch_array($query2)){echo " '".$gg['NOCCourseName'].' : '.$gg['NOCPeriod']."',";}	?>];
    $( "#coursename" ).autocomplete({
      source: availableTags
    });
  });
  </script>
</body>
</html>
