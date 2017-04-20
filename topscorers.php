<?php include('Connections/dbconnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPTEL Toppers Page</title>

	
	<link rel="stylesheet" href="css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
	<style>
		#logo { height: 90px; width: 90px; overflow: hidden; }
		
		#cname
    {
		
      box-shadow:0px 0px 5px rgba(210,210,210,210);
      display:block;
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
   
    </div>
  </div>
</nav>
		<p style="margin-top:50px;"></p>
	<!--end navbar-->

		<div class="container">
			<div class="row">
			<div class="col-md-12">
				
	<div class="panel panel-default" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
  <div class="panel-body">
   
	  <?php
	$list_query = mysqli_query($dbconn,"select a.NOCPeriod,a.NOCExamDt1 from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.FinalScore!='' and NOCPeriod NOT LIKE 'Jul-Sep 2016' group by a.NOCPeriod order by a.NOCEnrolStartDt desc");

				?>
	  <!--form start-->
	  <form class="form-horizontal" action="" method="post">
  <div class="form-group">
	  <div class="col-sm-2"></div>
	  <label for="inputEmail3" class="col-sm-3 control-label"><h5><b>Exam Timeline</b></h5></label>
    <div class="col-sm-4">
     
		<select class="form-control" name="top_search" id="top_search" required>
  <option value="">Select</option>
 <?php
			
while($fetch_list=mysqli_fetch_array($list_query))
{
	echo '<option value="'.$fetch_list['NOCPeriod'].'">'.date('M-Y',strtotime($fetch_list['NOCExamDt1'])).'</option>';
}
			?>
</select>
		
	  </div> <div class="col-sm-3"></div>
  </div>
 
		  
		   <div class="form-group">
	  <div class="col-sm-2"></div>
	  <label for="exammonth" class="col-sm-3 control-label"><h5><b>Course Name</b></h5></label>
    <div class="col-sm-4">
     
		<input type="text" class="form-control" name="cname" id="cname" placeholder="Enter the course name" required>
  		
	  </div> <div class="col-sm-3"></div>
  </div>
		  <div class="form-group">
		  
		  <div class="col-sm-offset-4 col-sm-3">
     
			  <button class="form-control btn btn-warning btn-block" name="search" id="search" >Search</button>
  		
	  </div>
		  </div>
 

</form>
	  <!--end of form start-->
	  
	  
  </div>
</div>
	
				</div></div></div>
		
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				
			<?php
if(isset($_POST['search']))
{

	$id = $_POST['top_search'];
	$cname = $_POST['cname'];



	$nocperiod_query = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$id."' and a.NOCCourseName = '".$cname."' limit 1");
	
	if(mysqli_num_rows($nocperiod_query) > 0)
	{
		$period_check = mysqli_num_rows($nocperiod_query);
		while($fetch_nocperiod = mysqli_fetch_array($nocperiod_query))
		{
		$period = $fetch_nocperiod['NOCPeriod'];
		$courseId = $fetch_nocperiod['NOCCourseId'];

		echo $period;
echo $cname;
exit;
		
		?>
	<div class="panel panel-default">
		<div class="panel-heading text-center"><b><?php echo $fetch_nocperiod['NOCCourseName']; ?>&nbsp;&nbsp;<a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $fetch_nocperiod['NOCCourseId']; ?>">(Click here for more details)</a></b></div>
  <div class="panel-body" >
	  
	  <?php
		$arrynew = array();
	$toppers_querynew = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$courseId."' and FinalScore >=90 order by FinalScore desc");
	while($fetch_toppersnew = mysqli_fetch_array($toppers_querynew))
	{
		$arrynew[]=$fetch_toppersnew['FinalScore'];
	}
	$listnew = "'". implode("', '", $arrynew) ."'";
	$toppers_query = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseId."' and b.FinalScore IN($listnew) order by b.FinalScore desc");
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
		  <p style="font-size:11px;text-transform:uppercase"><b><?php echo $fetch_toppers['Name']; ?> <span class="badge"><?php echo $fetch_toppers['FinalScore'].'%'; ?></span></b></p>
		  <p style="font-size:11px; text-transform:uppercase"><b><?php echo $fetch_toppers['CollegeName']; ?></b></p>
        
      </div>
    </div>
	 
	<!--end of thumbnail start-->
				
	  <?php
		}
			
			
		}
		else
		{
			$arry = array();
	$toppers_query3 = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$courseId."' and FinalScore >=50 order by FinalScore desc limit 10 ");
	while($fetch_toppers3 = mysqli_fetch_array($toppers_query3))
	{
		$arry[]=$fetch_toppers3['FinalScore'];
	}
	$list = "'". implode("', '", $arry) ."'";
	
	$toppers_query2 = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseId."' and b.FinalScore IN($list) order by b.FinalScore desc ");
			
			while($fetch_toppers2 = mysqli_fetch_array($toppers_query2))
		{
				?>
	  <!--thumbnail start-->
			
  
    <div class="thumbnail" style="margin:5px; width:260px; height:180px; overflow: hidden; display:inline-block; font-size:14px;">
      <img src="<?php echo $fetch_toppers2['photopath']; ?>" alt="<?php echo $fetch_toppers2['Name']; ?>" id="logo" class="img-circle" style="border:1px solid #666;">
      <div class="caption text-center">
		  <p style="font-size:11px;"><b><?php echo $fetch_toppers2['Name']; ?> <span class="badge"><?php echo $fetch_toppers2['FinalScore'].'%'; ?></span></b></p>
		  <p style="font-size:11px;"><b><?php echo $fetch_toppers2['CollegeName']; ?></b></p>
        
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
	// else
	// 	{
	// 		echo '<div class="container"><div class="alert alert-info text-center" role="alert"><b>Sorry no results found !!</b></div></div>';
	// 	}
	}
}
				?>		
	

				
				
				
			</div></div></div>

	<!---jquery-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<?php
	$query2=mysqli_query($dbconn,"select NOCCourseName,NOCPeriod from noc_course group by NOCCourseId order by NOCCourseName");
?>
		
		 <script type="text/javascript">
  $(function() {
    var availableTags = [<?php	while($gg = mysqli_fetch_array($query2)){echo "'".$gg['NOCCourseName']."',";}?>];
    $( "#cname" ).autocomplete({
      source: availableTags
    });
  });
  </script>
	
</body>
</html>
