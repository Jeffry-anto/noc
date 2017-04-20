<?php require('Connections/dbconnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC Course Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/spacelab/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<style>
		.container{
    margin-top:30px;
}
.filter-col{
    padding-left:10px;
    padding-right:10px;
}
		</style>
	
	<style>
		.nav-side-menu {
  overflow: auto;
  font-family: verdana;
  font-size: 12px;
  font-weight: 200;
  background-color: #2e353d;
  position: fixed;
  top: 0px;
  width: 300px;
  height: 100%;
  color: #e1ffff;
}
.nav-side-menu .brand {
  background-color: #23282e;
  line-height: 50px;
  display: block;
  text-align: center;
  font-size: 14px;
}
.nav-side-menu .toggle-btn {
  display: none;
}
.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
  /*    
    .collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
*/
}
.collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
  font-family: FontAwesome;
  content: "\f078";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  float: right;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #181c20;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0px;
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #020203;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: FontAwesome;
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
}
.nav-side-menu li {
  padding-left: 0px;
  border-left: 3px solid #2e353d;
  border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #e1ffff;
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff;
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
body {
  margin: 0px;
  padding: 0px;
}

		</style>
</head>
<body>
	


<div class="nav-side-menu">
	<a href="index.php"> <div class="brand">NOC Course Page</div></a>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="index.php">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#upcoming" class="collapsed" >
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Upcoming Courses <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse in" id="upcoming">
                	<li role="presentation"><a href="#" id="upcoming_tenhrcourses">10 hour courses</a></li>
                    <li role="presentation"><a href="#" id="upcoming_shortterm" >20 hour courses</a></li>
                    <li role="presentation"><a href="#" id="upcoming_longterm">30 hour courses</a></li>
                    
                                        
                </ul>
				
				 <li  data-toggle="collapse" data-target="#ongoing" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Ongoing Courses <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse in" id="ongoing" >
                <li role="presentation"><a href="#" id="ongoing_tenhrcourses">10 hour courses</a></li>
                   <li role="presentation"><a href="#" id="ongoing_shortterm">20 hour courses</a></li>
                    <li role="presentation"><a href="#" id="ongoing_longterm">30 hour courses</a></li>
                </ul>

                     <li role="presentation">
					 <a href="#" id="completed">
                  <i class="fa fa-user fa-check-circle fa-lg"></i> Completed courses
						 </a></li>

           
            </ul>
     </div>
</div>	
	
	
	
<div class="container" style="margin-top:60px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			
<?php
$discipline_query = mysqli_query($dbconn,"select * from discipline order by DisciplineId");
$period_query = mysqli_query($dbconn,"select NOCPeriod,NOCExamDt1 from noc_course group by NOCPeriod order by NOCEnrolStartDt desc");
?><!--start search-->
			
			<div class="container">
	<div class="row">
       
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-inline" role="form" action="" method="post" onsubmit="myFunction()">
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-perpage">Discipline:</label>
                            <select id="discipline" name="discipline" class="form-control">
                                <option value="">Choose the Discipline</option>
                                <?php

while($discp_record = mysqli_fetch_array($discipline_query))
{
	echo '<option value="'.$discp_record['DisciplineId'].'">'.$discp_record['DisciplineName'].'</option>';
}
								?>
                            </select>                                
                        </div> <!-- form group [rows] -->
						
						<div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-search">Exam Month (Course Run):</label>
                            <select class="form-control" id="timeline" name="timeline">
								 <option value="">Select</option>
								 <?php

while($period_record = mysqli_fetch_array($period_query))
{
	?>
	<option value="<?php echo $period_record['NOCPeriod']; ?>"><?php echo date('M-Y',strtotime($period_record['NOCExamDt1'])).' ('.$period_record['NOCPeriod'].')'; ?></option>
    <?php
}
								?>
							</select>
                        </div><!-- form group [search] -->
						<br>
						<br>
						<div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-search">Type of Course:</label>
                            <select class="form-control" id="status" name="status">
								 <option value="">Select</option>
                              <option value="uptc">Upcoming Courses - 10 hour</option>
								<option value="upsc">Upcoming Courses - 20 hour</option>
								<option value="uplc">Upcoming Courses - 30 hour</option>
                              <option value="octc">Ongoing Courses - 10 hour</option>
								<option value="ocsc">Ongoing Courses - 20 hour</option>
								<option value="oclc">Ongoing Courses - 30 hour</option>
								
								<option value="comp">Completed Courses</option>
								
						</select>
                        </div>
						
					
						<!-- form group [search] -->
						
						
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-search">Course name:</label>
                            <input type="text" class="form-control" id="pref-search" name="pref-search" style="width:250px;" placeholder="Enter the course name">
                        </div><!-- form group [search] -->
                    
                        <div class="form-group">    
                            
                            <button type="submit" id="search" name="search" class="btn btn-info filter-col">
                             &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-search fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                            </button>  
                        </div>
						
                    </form>
                </div>
            </div>
   
		<br>
	
        
	</div>
</div>
			
			<!--end start search-->
			
		<!--searcg-->
		
		<?php

if(isset($_GET['panel']))
{
	$panel = $_GET['panel'];
	
	if(($panel == 'completed')||($panel == 'ongoing')||($panel == 'upcoming'))
	{
		echo "<input type=\"hidden\" name=\"panel\" id=\"panel\" value=\"$panel\">";
		
	}
	else
	{
		echo '<input type="hidden" name="panel" id="panel" value="emptyone">';
	}
		
}
else
{
	echo '<input type="hidden" name="panel" id="panel" value="emptyone">';
}

?>
  <div id="searchpanel">
	  
	  
	  
			<?php
if(isset($_POST['search']))
{
	echo '<input type="hidden" name="check" id="check" value="1">';
	$dis =  $_POST['discipline'];
	$search= $_POST['pref-search'];
	$time =  $_POST['timeline'];
	$status =  $_POST['status'];
	
	$query1="";
	if($dis != '')
	{	
		$query1 .= "disciplineid='".$dis."'";
	}
	if($time != '')
	{
		$query1 .= " and ";
		$query1 .= "NOCPeriod='".$time."'" ;
	}
	
	if($status != '')
	{
		$query1 .= " and ";
		$query1 .= "CourseStatus='".$status."'" ;
	}
	
	if($search != '')
	{
		$query1 .= " and ";
		$query1 .= "NOCCourseName LIKE '%".$search."%'" ;
	}
	
	
	
	if($query1 != '')
	{
		//$short1 = substr($query1,0,5);
		//$short = substr_replace($query1, '',0 , 5);
		
		$str = strpos($query1, 'and');
		$replace = ' where ';
		if($str == 1)
		{
			$replace .= substr_replace($query1, '',$str , 3);
		}
		else
		{
			$replace .= $query1;
		}
		//echo $replace;
	
	}
	
	
	
	if($replace != '')
	{
	  $querySQL = "select * from noc_course ".$replace." order by NOCCourseName";
  $Result1 = mysqli_query($dbconn,$querySQL) or die(mysqli_error($dbconn));
  if (isset($_SERVER['QUERY_STRING'])) {
	  ?>
	  
	  <div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-search fa-lg"></i> Searched Results</h5></div>
  	<div class="panel-body">
		
	  <?php
	  $total_rows = mysqli_num_rows($Result1);
	  if($total_rows > 0)
	  {
	  while($query_ss = mysqli_fetch_array($Result1))
	  {
		 
		  
		 ?>
		 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $query_ss['NOCCourseId']; ?>"  style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $query_ss['disciplineid']; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $query_ss['NOCCourseName']; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $query_ss['NOCCoordinatorNames']; ?></p>
       
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $query_ss['NOCInstitute']; ?></p>
       <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$query_ss['NOCPeriod']; ?></p>
       
       <?php
	   //include('Connections/local_conn.php'); 
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$query_ss['NOCCourseId']."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
       
       
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
		  echo '<div class="alert alert-danger" role="alert" style="text-align:center; font-weight:bold;">No results found !!</div>';
	  }
	  ?>
	  </div></div>
	  <?php
  }
		
	}
	else
	{
		echo '<div class="alert alert-danger" role="alert" style="text-align:center; font-weight:bold;">No results found !!</div>';
	}



  
	  ?>
	  <?php
}
else
{
	echo '<input type="hidden" name="check" id="check" value="0">';
}


?>
				</div>
		<!-- end searcg-->	
			
			

	<div id="upcoming_st">
	
	
	<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 20 Hours Upcoming Courses</h5></div>
  <div class="panel-body">
	  
	  <?php
$period_querynew1 = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'upsc' group by NOCPeriod order by NOCEnrolStartDt desc" );
$period_query1 = mysqli_fetch_assoc($period_querynew1);
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch1 = mysqli_num_rows($period_querynew1);
	if($num_fetch1 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period1 = mysqli_fetch_array($period_querynew1))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period1['NOCPeriod']; ?></div>
			  <div class="panel-body">
	 <?php 
	  //include('Connections/local_conn.php'); 
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'upsc' and NOCPeriod='".$fetch_period1['NOCPeriod']."' order by NOCCourseName" );
	
	if($query > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?></p>
        <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
       <?php
	   //include('Connections/local_conn.php'); 
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if($sponser > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
      
       
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
	
	  
	  ?>
	  
	</div></div>
	  <?php
}
 ?>
		</div></div><!--end of panel-->
	
	
	</div>
		<div id="upcoming_lt">
	
	
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 30 Hours Upcoming Courses</div>
  <div class="panel-body">
	  
	   <?php
$period_query2 = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'uplc' group by NOCPeriod order by NOCEnrolStartDt desc" );
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch2 = mysqli_num_rows($period_query2);
	if($num_fetch2 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period2 = mysqli_fetch_array($period_query2))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period2['NOCPeriod']; ?></div>
			  <div class="panel-body">

	   <?php 
	  //include('Connections/local_conn.php'); 
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'uplc' and NOCPeriod='".$fetch_period2['NOCPeriod']."' order by NOCCourseName" );
	
	if($query > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?></p>
	   <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
	   <?php
	   //include('Connections/local_conn.php'); 
	    
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if($sponser > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
       
       
       
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
	
	  
	  ?>
	  
			</div></div>
			<?php
}
	?>
	  
		</div></div><!--end of panel-->
	
	</div>
          
          <div id="upcoming_tc">
	
	
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 10 Hours Upcoming Courses</div>
  <div class="panel-body">
	  
	   <?php
$period_query2 = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'uptc' group by NOCPeriod order by NOCEnrolStartDt desc" );
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch2 = mysqli_num_rows($period_query2);
	if($num_fetch2 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period2 = mysqli_fetch_array($period_query2))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period2['NOCPeriod']; ?></div>
			  <div class="panel-body">

	   <?php 
	  //include('Connections/local_conn.php'); 
		
		
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'uptc' and NOCPeriod='".$fetch_period2['NOCPeriod']."' order by NOCCourseName" );
	
	if(mysqli_affected_rows($dbconn) > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?></p>
	   <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
	   <?php
	   //include('Connections/local_conn.php'); 
	 
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
       
       
       
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
	
	  
	  ?>
	  
			</div></div>
			<?php
}
	?>
	  
		</div></div><!--end of panel-->
	
	</div>
          
          
          
          
		<div id="ongoing_st">
	
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 20 Hours Ongoing Courses</div>
  <div class="panel-body">
	  
	  <?php
$period_query3 = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'ocsc' group by NOCPeriod order by NOCEnrolStartDt desc" );
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch3 = mysqli_num_rows($period_query3);
	if($num_fetch3 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period3 = mysqli_fetch_array($period_query3))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period3['NOCPeriod']; ?></div>
			  <div class="panel-body">
	  <?php 
	  //include('Connections/local_conn.php'); 
	
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'ocsc' and NOCPeriod = '".$fetch_period3['NOCPeriod']."' order by NOCCourseName" );
	
	if(mysqli_num_rows($query) > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?></p>
       <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
       <?php
	   //include('Connections/local_conn.php'); 
	   
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if(mysqli_num_rows($sponser) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
       
       
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
	
	  
	  ?>
			
		</div>
	</div>
	<?php
}
	?>	
			
		</div></div><!--end of panel-->
	
	</div>
	
		<div id="ongoing_lt">
	
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 30 Hours Ongoing Courses</div>
			
			
			
  <div class="panel-body">
	  
	  
	  <?php
$period_query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'oclc' group by NOCPeriod order by NOCEnrolStartDt desc" );
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch4 = mysqli_num_rows($period_query);
	if($num_fetch4 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period = mysqli_fetch_array($period_query))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period['NOCPeriod']; ?></div>
			  <div class="panel-body">
			
	   <?php 
	  //include('Connections/local_conn.php'); 
	
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus='oclc' and NOCPeriod = '".$fetch_period['NOCPeriod']."' order by NOCCourseName" );
	
	if(mysqli_affected_rows($dbconn) > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?>   
       </p>
       <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
       <?php
	   //include('Connections/local_conn.php'); 
	    
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		   
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
	   
	   }
	   ?>
       
       
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
	
	  
	  ?>
	
	</div>
	</div>
	<?php
}
	?>
	
		</div></div><!--end of panel-->
	
	</div>
          
          <div id="ongoing_tc">
	
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i> 10 Hours Ongoing Courses</div>
			
			
			
  <div class="panel-body">
	  
	  
	  <?php
$period_query = mysqli_query($dbconn,"select * from noc_course where CourseStatus = 'octc' group by NOCPeriod order by NOCEnrolStartDt desc" );
if(mysqli_affected_rows($dbconn) > 0)
{
	$num_fetch4 = mysqli_num_rows($period_query);
	if($num_fetch4 == 0)
	{
		echo '<div>Will be announce shortly</div>';
	}
}
while($fetch_period = mysqli_fetch_array($period_query))
{
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
		<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><?php echo $fetch_period['NOCPeriod']; ?></div>
			  <div class="panel-body">
			
	   <?php 
	  //include('Connections/local_conn.php'); 
	
	$query = mysqli_query($dbconn,"select * from noc_course where CourseStatus='octc' and NOCPeriod = '".$fetch_period['NOCPeriod']."' order by NOCCourseName" );
	
	if(mysqli_num_rows($query) > 0)
	{
		$num=mysqli_num_rows($query);
		if($num > 0)
		{
	while($row = mysqli_fetch_array($query))
	{
		
	 $courseid=$row['NOCCourseId'];
	 $did=$row['disciplineid'];
	
	 $displinequery = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$did."'" );
	 while($ddd=mysqli_fetch_array($displinequery))
	 {
		 $dname = $ddd['DisciplineName'];
	 }
	
	 	$NOCCourseName=$row['NOCCourseName'];
	 	 $NOCCoordinatorNames=$row['NOCCoordinatorNames'];
		  $NOCPeriod=$row['NOCPeriod'];
		 $NOCins=$row['NOCInstitute'];
		
	
	?>
 <div class="col-md-4">
    <div style="float:left; position:relative;">
 
 <a href="individual_course.php?id=<?php echo $courseid; ?>" style="text-decoration:none;">
    <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $did; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
      
       <h3 style="color:#069; float:left; font-weight:bolder; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $NOCCourseName; ?></h3>
        
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:220px;"><?php echo $NOCCoordinatorNames; ?></p>
       <p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $NOCins; ?>   
       </p>
       <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration: '.$NOCPeriod; ?></p>
       <?php
	   //include('Connections/local_conn.php'); 
	   
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$courseid."'");
	   if(mysqli_num_rows($sponser) > 0)
	   {
		   $sponser_num = mysqli_num_rows($sponser);
		   if($sponser_num > 0)
		   {
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   }
	   
	   }
	   ?>
       
       
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
	
	  
	  ?>
	
	</div>
	</div>
	<?php
}
	?>
	
		</div></div><!--end of panel-->
	
	</div>
	
	
	
	
		<div id="complet">
	
	
		
		<?php
//require_once('Connections/local_conn.php'); 
$query=mysqli_query($dbconn,"select * from noc_course where CourseStatus='comp' group by NOCPeriod order by NOCEnrolStartDt desc");
//$fetching=mysqli_fetch_array($query);


?>

<?php
while($fetching = mysqli_fetch_assoc($query))
{
$query2=mysqli_query($dbconn,"select * from noc_course where NOCPeriod='".$fetching['NOCPeriod']."' and CourseStatus='comp' order by NOCCourseName ");
//$fetching2=mysqli_fetch_array($query2);
?>
<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
<div class="panel-heading" style="text-align:center;background:#2e353d;"><h5 style="color:#e1ffff;font-family: verdana;font-size: 12px;font-weight:bold;"><i class="fa fa-book fa-lg"></i>
<?php
	echo $fetching['NOCPeriod'].'<br />';
	
	 
	?></div>
  <div class="panel-body">
	  
	  
    
    <?php
	while($fetching2=mysqli_fetch_array($query2))
	{
		$fff = $fetching2['disciplineid'];
		$displinequery3 = mysqli_query($dbconn,"select * from discipline where DisciplineId = '".$fff."'" );
	 while($ddd=mysqli_fetch_array($displinequery3))
	 {
		 $dname3 = $ddd['DisciplineName'];
	 }
		?>
        
        <div class="col-md-4">
        
         <a href="individual_course.php?id=<?php echo $fetching2['NOCCourseId']; ?>" style="text-decoration:none;">
           <div class="thumbnail" style="width:250px; height:360px; margin:5px;box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
      <img src="images/Discipline Images/<?php echo $fff; ?>.jpg" alt="..." width="820" height="150">
      <div class="caption" style="word-break: keep-all;">
        <h3 style="color:#069; float:left; font-weight:bold; margin-bottom:25px; font-size:13px; height:20px; width:220px;"><?php echo $fetching2['NOCCourseName']; ?></h3>
        <p style="font-weight:bold;margin-bottom:2px; font-size:12px; width:200px;"><?php echo $fetching2['NOCCoordinatorNames']; ?></p>
       	<p style="font-weight:bold;margin-bottom:2px; font-size:12px;"><?php echo $fetching2['NOCInstitute']; ?></p>
         <p style="margin-top:15px; font-size:12px; font-weight:bold;"><?php echo 'Course Duration : '.$fetching2['NOCPeriod']; ?></p>
        <?php
	   //include('Connections/local_conn.php'); 
	    
	   $sponser = mysqli_query($dbconn,"select * from sponser_list where course_sponsered='".$fetching2['NOCCourseId']."'");
	   if(mysqli_affected_rows($dbconn) > 0)
	   {
		  
		   
			   while($fetch_sponser=mysqli_fetch_array($sponser))
			   {
				   ?>
                   <h4 style="font-weight:bold;margin-bottom:2px; font-size:12px; font-color:#2B1B17;"><?php echo '<img src="'.$fetch_sponser['sponser_image'].'" width="180" height="30">';  ?></h4>
                   <?php
			   }
		   
	   
	   }
	   ?>
       
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

	  
	  
		</div><!--end of panel-->
	
	
			
		
	</div>
	
	
	
	
	
	
		 
</div>
		</div><!--end of col-->
		</div><!--end of row-->
	</div><!--end of container-->


<script>

/*$('[data-toggle=tab]').click(function(){
  if ($(this).parent().hasClass('active')){
	$($(this).attr("href")).toggleClass('active');
  }
})*/
</script>


	



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	
	
	$(function() {
   
			
			
		
		
        
        $('#upcoming_tenhrcourses').click(function(){
			
			$('#upcoming_tc').fadeIn(1000);
			$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
          $('#ongoing_tc').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
			
		
		});
		$('#upcoming_shortterm').click(function(){
			
			$('#upcoming_tc').hide();
			$('#upcoming_st').fadeIn(1000);
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
          $('#ongoing_tc').hide();
			$('#searchpanel').hide();
			
		
		});
		$('#upcoming_longterm').click(function(){
          
			$('#upcoming_tc').hide();
			$('#upcoming_st').hide();
			$('#upcoming_lt').fadeIn(1000);
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#ongoing_tc').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
			
		
		});
      
      $('#ongoing_tenhrcourses').click(function(){
			
            $('#upcoming_tc').hide();
			$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_tc').fadeIn(1000);
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
			
		
		});
		$('#ongoing_shortterm').click(function(){
			
          $('#upcoming_tc').hide();
          $('#ongoing_tc').hide();
			$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').fadeIn(1000);
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
			
		
		});
		$('#ongoing_longterm').click(function(){
			
          $('#upcoming_tc').hide();
          $('#ongoing_tc').hide();
			$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').fadeIn(1000);
			$('#complet').hide();
			$('#searchpanel').hide();
		
		});
		
		$('#completed').click(function(){
			
          $('#upcoming_tc').hide();
			$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').fadeIn(1000);
			$('#searchpanel').hide();
          $('#ongoing_tc').hide();
		
		});
		
		
});
	
	</script>
<script>
$(document).ready(function(){
    
	var aa = document.getElementById('check').value;
	var bb = document.getElementById('panel').value;
	
	if(aa == 1)
	{
       $('#ongoing_tc').hide();
      $('#upcoming_tc').hide();
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').fadeIn(1000);
	}
	if(bb == 'emptyone')
	{
			
	if(aa == 0)
	{
        $('#ongoing_tc').hide();
      $('#upcoming_tc').fadeIn(1000);
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
		
	}
	if(aa == 1)
	{
        $('#ongoing_tc').hide();
      $('#upcoming_tc').hide();
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').fadeIn(1000);
	}
	}
	else if((bb == 'ongoing')&&(aa == 0))
	{
       $('#ongoing_tc').fadeIn(1000);
      $('#upcoming_tc').hide();
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
	}
	else if((bb == 'upcoming')&&(aa == 0))
	{
      
      $('#ongoing_tc').hide();
      $('#upcoming_tc').fadeIn(1000);
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').hide();
			$('#searchpanel').hide();
	}
   else if((bb == 'completed')&&(aa == 0))
	{
        $('#ongoing_tc').hide();
      $('#upcoming_tc').hide();
		$('#upcoming_st').hide();
			$('#upcoming_lt').hide();
			$('#ongoing_st').hide();
			$('#ongoing_lt').hide();
			$('#complet').fadeIn(1000);
			$('#searchpanel').hide();
	}
	
	else
	{
	
	
	
		
		
	}
	
	
});
</script>



</body>
</html>
