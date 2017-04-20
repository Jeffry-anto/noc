<?php
session_start();
require_once('Connections/dbconnection.php'); 
?>

<?php
if(empty($_GET['id']))
{
	?>
        <script>window.location.href="index.php";</script>
        <?php
}

if($_GET['id'] != '')
{
	$_SESSION['courseid']=$_GET['id'];
	
	$get_query=mysqli_query($dbconn,"select * from noc_course where NOCCourseId = '".$_SESSION['courseid']."' ");
	$num=mysqli_num_rows($get_query);
	if($num == 0)
	{
		?>
        <script>window.location.href="index.php";</script>
        <?php
	}
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
		$coursestatus = $fetch_getquery['CourseStatus'];
		$NOCAssignmentGraph = $fetch_getquery['NOCAssignmentGraph'];
		$NOCExamGraph = $fetch_getquery['NOCExamGraph'];
		
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
	
	$get_query1=mysqli_query($dbconn,"select * from nocprof_info where CourseId = '".$_SESSION['courseid']."' ");
	
	$get_query2=mysqli_query($dbconn,"SELECT SUM(`Count`) as enm_count FROM  `course_analyt_count` WHERE `Type` =  'State' AND  `status` =  'enroll' and CourseId = '".$_SESSION['courseid']."' ");
	while($fetch_getquery2 = mysqli_fetch_array($get_query2))
	{
	$enrollment_count =$fetch_getquery2['enm_count'];
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
<title>Course Analytics</title>

<!----bootstrap css-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">


<!----naveen stylesheet-->
<link href="css/style.css" rel="stylesheet">
<!---include modernizer before other javascript-->
<script type="text/javascript" src="js/modernizr-latest.js"></script>
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
<?php if($enrollment_count != ''){ ?>
<div class="container">
<div class="row">
<h4 style="font-weight:bold; text-decoration:underline;">Course Analytics : <?php echo $coursetitle; ?></h4>

<div class="panel panel-default">
  <div class="panel-heading text-center" style="font-weight:bold;"><span class="glyphicon glyphicon-stats"></span>&nbsp;Enrolled Candidate - Chart view</div>
  <div class="panel-body">

<div class="col-sm-6">
<h5 style="font-weight:bold; "><span class="glyphicon glyphicon-globe"></span>&nbsp;Statewise</h5>
<div class="well well-lg">




     <?php
	 $choosestategraph = 'enroll';
	 google_statewisegraph($choosestategraph,$courseid1,$dbconn)
	 ?>
<!-- Button trigger modal for enroll state -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top:5px;">
  Google Map view
</button>



</div>
</div><!--end of col-sm-6-->

<div class="col-sm-6">
<h5 style="font-weight:bold; "><span class="glyphicon glyphicon-globe"></span>&nbsp;Countrywise</h5>
<div class="well well-lg">

<?php
	 $choosecountrygraph='enroll';
	 google_countrywisegraph($choosecountrygraph,$courseid1,$dbconn);
	 ?>

<!-- Button trigger modal for enroll country -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcountry" style="margin-top:5px;">
  Google Map view
</button>

</div>
</div><!--end of col-sm-6-->



</div>
</div><!--end of panels-->

</div><!--end of row-->
</div><!--end of container-->
<?php }?>


<?php if($reg_count != ''){ ?>

<div class="container">
<div class="row">


<div class="panel panel-default">
  <div class="panel-heading text-center" style="font-weight:bold;"><span class="glyphicon glyphicon-stats"></span>&nbsp;Exam registered Candidate - Chart view</div>
  <div class="panel-body">

<div class="col-sm-12">
<h5 style="font-weight:bold; "><span class="glyphicon glyphicon-globe"></span>&nbsp;Statewise</h5>
<div class="well well-lg">




     <?php
	 $choosestategraphregister = 'register';
	 google_statewisegraphregister($choosestategraphregister,$courseid1,$dbconn)
	 ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalregsiterstate" style="margin-top:5px;">
  Google Map view
</button>



</div>
</div>





</div>
</div>

</div>
</div>


<?php } ?>



<?php if($cert_count != ''){ ?>

<div class="container">
<div class="row">


<div class="panel panel-default">
  <div class="panel-heading text-center" style="font-weight:bold;"><span class="glyphicon glyphicon-stats"></span>&nbsp;Certificate eligible Candidate - Chart view</div>
  <div class="panel-body">

<div class="col-sm-12">
<h5 style="font-weight:bold; "><span class="glyphicon glyphicon-globe"></span>&nbsp;Statewise</h5>
<div class="well well-lg">




     <?php
	$choosestategraphcertificate = 'certificate';
	 google_statewisegraphcertificate($choosestategraphcertificate,$courseid1,$dbconn)
	 ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcertificatestate" style="margin-top:5px;">
  Google Map view
</button>



</div>
</div>





</div>
</div>

</div>
</div>



<?php } ?>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Google map view</h4>
      </div>
      <div class="modal-body">
        <?php 
	 $choose='enroll';
	  googlemap_statewise($choose,$courseid1,$dbconn); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalcountry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Google map view</h4>
      </div>
      <div class="modal-body">
        <?php 
	 $choosecountry = 'enroll';
	 google_countrywise($choosecountry,$courseid1); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModalregsiterstate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Google map view</h4>
      </div>
      <div class="modal-body">
        <?php 
	 $choosestateregister = 'register';
	 google_statewiseregister($choosestateregister,$courseid1,$dbconn); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalcertificatestate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Google map view</h4>
      </div>
      <div class="modal-body">
        <?php 
	 $choosestatecertificate = 'certificate';
	 google_statewisecertificate($choosestatecertificate,$courseid1,$dbconn); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




<?php
function google_statewisegraph($choosestategraph, $courseid1,$dbconn)
{

$query23="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='State' and status='".$choosestategraph."' order by Count desc";
$run_query23=mysqli_query($dbconn,$query23)or die(mysql_error());
?>



<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  
		  <?php
		

while($fetch_query23=mysqli_fetch_array($run_query23))
{
	
?>
		  
          ['<?php echo $fetch_query23['Name']; ?>', <?php echo $fetch_query23['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_state'));
        chart.draw(data, options);
      }
    </script>
    <?php
	echo '<div id="piechart_3d_state" style="width: 500px; height: 400px; padding:0px; margin:0px;  border:3px solid #25242C; border-radius:3px;" ></div>';
}
	?>



<?php
function google_statewisegraphregister($choosestategraphregister, $courseid1,$dbconn)
{


$query23="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='State' and status='".$choosestategraphregister."' order by Count desc";
$run_query23=mysqli_query($dbconn,$query23)or die(mysql_error());
?>



<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  
		  <?php
		

while($fetch_query23=mysqli_fetch_array($run_query23))
{
	
?>
		  
          ['<?php echo $fetch_query23['Name']; ?>', <?php echo $fetch_query23['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_stateregister'));
        chart.draw(data, options);
      }
    </script>
    <?php
	echo '<div id="piechart_3d_stateregister" style="width: 1000px; height: 500px; padding:0px; margin:0px;  border:3px solid #25242C; border-radius:3px;" ></div>';
}
	?>






<?php
function google_countrywisegraph($choosecountrygraph, $courseid1,$dbconn)
{

$query23="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='Country' and status='".$choosecountrygraph."' order by Count desc";
$run_query23=mysqli_query($dbconn,$query23)or die(mysql_error());
?>



<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  
		  <?php
		

while($fetch_query23=mysqli_fetch_array($run_query23))
{
?>
		  
          ['<?php echo $fetch_query23['Name']; ?>', <?php echo $fetch_query23['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
    <?php
	echo '<div id="piechart_3d" style="width: 500px; height: 400px; padding:0px; margin:0px;  border:3px solid #25242C; border-radius:3px;" ></div>';
}
	?>
    
    
    
    

    <?php
function google_statewisegraphcertificate($choosestategraphcertificate, $courseid1,$dbconn)
{

$query23="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='State' and status='".$choosestategraphcertificate."' order by Count desc";
$run_query23=mysqli_query($dbconn,$query23)or die(mysql_error());
?>

    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
		

while($fetch_query23=mysqli_fetch_array($run_query23))
{
	
?>
		  
          ['<?php echo $fetch_query23['Name']; ?>', <?php echo $fetch_query23['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    
    <?php
	echo '<div id="donutchart" style="width: 1000px; height: 500px; padding:0px; margin:0px;  border:3px solid #25242C; border-radius:3px;" ></div>';
}
	?>
    
  
    

<?php
function google_countrywise($choosecountry, $courseid1,$dbconn)
{
//$courseid='noc14-cs02';

$query24="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='Country' and status='".$choosecountry."' order by Count desc";
$run_query24=mysqli_query($dbconn,$query24)or die(mysql_error());
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'count'],
                   <?php
		

while($fetch_query24=mysqli_fetch_array($run_query24))
{
	
?>
		  
          ['<?php echo $fetch_query24['Name']; ?>', <?php echo $fetch_query24['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          icons: {
            default: {
              normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
              selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
            }
          }
        };

        var map = new google.visualization.Map(document.getElementById('map_markers_div'));
        map.draw(data, {showTip: true});
      }

    </script>
<?php
echo '<div id="map_markers_div" style="width: 550px; height: 400px; padding:0px; margin:0px;  border:2px solid #25242C; border-radius:3px;" ></div>';
}
?>

<?php
function google_statewiseregister($choosestateregister, $courseid1,$dbconn)
{
//$courseid='noc14-cs02';

$query24="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='Country' and status='".$choosestateregister."' order by Count desc";
$run_query24=mysqli_query($dbconn,$query24)or die(mysql_error());
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'count'],
                   <?php
		

while($fetch_query24=mysqli_fetch_array($run_query24))
{
	
?>
		  
          ['<?php echo $fetch_query24['Name']; ?>', <?php echo $fetch_query24['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          icons: {
            default: {
              normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
              selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
            }
          }
        };

        var map = new google.visualization.Map(document.getElementById('map_markers_divregister'));
        map.draw(data, {showTip: true});
      }

    </script>
<?php
echo '<div id="map_markers_divregister" style="width: 550px; height: 400px; padding:0px; margin:0px;  border:2px solid #25242C; border-radius:3px;" ></div>';
}
?>

<?php

function googlemap_statewise($choose, $courseid1,$dbconn)
{

$query25="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='State' and status='".$choose."' order by Count desc";
$run_query25=mysqli_query($dbconn,$query25)or die(mysql_error());
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name','count'],
         <?php
		

while($fetch_query25=mysqli_fetch_array($run_query25))
{
	
?>
		  
          ['<?php echo $fetch_query25['Name']; ?>', <?php echo $fetch_query25['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          icons: {
            default: {
              normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
              selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
            }
          }
        };

        var map = new google.visualization.Map(document.getElementById('map_markers_div2'));
        map.draw(data, {showTip: true});
      }

    </script>
    
<?php
echo '<div id="map_markers_div2" style="width: 550px; height: 400px; padding:0px; margin:0px;  border:2px solid #25242C; border-radius:3px;" ></div>';
}
?>

<?php

function google_statewisecertificate($choosestatecertificate, $courseid1,$dbconn)
{

$query25="select Name, Count from course_analyt_count where CourseId='".$courseid1."' and Type='State' and status='".$choosestatecertificate."' order by Count desc";
$run_query25=mysqli_query($dbconn,$query25)or die(mysql_error());
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name','count'],
         <?php
		

while($fetch_query25=mysqli_fetch_array($run_query25))
{
	
?>
		  
          ['<?php echo $fetch_query25['Name']; ?>', <?php echo $fetch_query25['Count']; ?>],
          <?php
	  }
		  ?>
        ]);

        var options = {
          icons: {
            default: {
              normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
              selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
            }
          }
        };

        var map = new google.visualization.Map(document.getElementById('map_markers_div24'));
        map.draw(data, {showTip: true});
      }

    </script>
    
<?php
echo '<div id="map_markers_div24" style="width: 550px; height: 400px; padding:0px; margin:0px;  border:2px solid #25242C; border-radius:3px;" ></div>';
}
?>













<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
</body>
</html>
