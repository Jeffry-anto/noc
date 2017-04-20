<?php
session_start();
include('Connections/dbconnection.php');
//$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
?>
<?php 

if(($_SESSION['username'] != '')&&($_SESSION['password'] != ''))
{
	
$user = $_SESSION['username'];
$pass = $_SESSION['password'];
	
}
else
{
	?>
	<script>window.location.href="index.php";</script>
	<?php
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC Candidate Login</title>
	
	
<!----bootstrap css-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">


<!----naveen stylesheet-->
<link href="css/style.css" rel="stylesheet">
<!---include modernizer before other javascript-->
<script type="text/javascript" src="js/modernizr-latest.js"></script>

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
			background-color:#fff;
			color:#545454;
		}
		</style>
</head>

<body>
	
		
	<div style="margin-top:60px;"></div>
<!--google_login-->
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	
		<!--profile-->
		<?php

if(isset($_GET['id']))
{
	$first_get = $_GET['id'];
	if($first_get != '')
	{
		$id = $first_get;
	}
	else
	{
		?>
	<script>window.location.href="candidatelogin.php";</script>
	<?php
	}
}
else
{
	?>
	<script>window.location.href="candidatelogin.php";</script>
	<?php
}

$query = "select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b. EmailId='".$user."' and a.NOCCourseId='".$id."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);

$aprow = mysqli_fetch_assoc(mysqli_query($dbconn,"select b.Application_number from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b. EmailId='".$user."' and a.NOCCourseId='".$id."' limit 1 "));
if($totalRows_OCCrecordset == 0)
{
	?>
	<script>window.location.href="candidatelogin.php";</script>
	<?php
}
?>
		
		
		<div class="row">

<div class="col-md-6">
</div>
<div class="col-md-6" >

	<a href="candidatelogin.php"><button class="btn btn-warning pull-right">Back</button></a>
</div>
</div>
		<div class="container" id="welcome">
			
		<div class="panel panel-default" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
			<div class="panel-heading" style="text-align:center; font-weight:bold;"><?php echo $fetch['NOCCourseName'] ?></div>
  <div class="panel-body">	
	  <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Candidate Profile</p>
    <div class="row">
        <div class="col-sm-2 col-md-2">
        	<?php
        	$examperiod = substr($fetch['NOCPeriod'],-8);
        	if($examperiod == 'Sep 2016' || $examperiod == 'Oct 2016')
        	{ ?>
        		<img src="./Candidate_photopath/<?php echo "Jul-".$examperiod."/".$fetch['photopath'];?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/>
        	<?php } else {?>
        		<img src="<?php if($fetch['photopath'] != ''){ echo $fetch['photopath']; }else{ echo 'images/Example Photo.jpg';} ?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/>
        	<?php }
            ?>
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?php echo $fetch['Name'] ?></p>
            </blockquote>
            <p> 
				
				<i class="glyphicon glyphicon-cloud"></i> <?php echo $fetch['RollNumber'] ?>
				
                <br />
				<i class="glyphicon glyphicon-envelope"></i> <?php echo $user; ?>
				
               <?php if($fetch['Gender'] != '' ){?>
                <br /> <?php if($fetch['Gender'] == 'M'){ ?>
                <i class="glyphicon glyphicon-user"></i> <?php echo 'Male'; 
				}
				else if($fetch['Gender'] == 'F')
				{ ?>
                <i class="fa fa-female"></i> <?php echo 'Female'; 
				}
				else
				{
					echo '-';
				}
				}?></p>
              
                
                <br /> <i class="glyphicon glyphicon-gift"></i> <?php if($fetch['DOB'] == '1900-01-01'){ echo 'Jan 01, 1900'; }else { echo date('M d, Y ',strtotime($fetch['DOB'])); } ?></p>
        </div>
         <div class="col-sm-6 col-md-6"></div>
    </div><!--end of row-->
	  
	  <hr>
	 
			 
		 <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Scores Details</p>
				
          <?php
          if(($fetch['NOCEnableExamScores'] == 'Y')&&($fetch['NOCCourseId'] != 'noc15-hs12')&&($fetch['NOCCourseId'] != 'noc15-mg08'))
          {
          
          ?>
          <!---assignmnet marks table -->
          <?php
$today = date("Y-m-d");
?>
          <?php
          
          if($today >= '2015-07-12')
          {
          
            
            
            $select_assignment = mysqli_query($dbconn,"select * from assignment_scores where NOCCourseId='".$id."' and RollNumber = '".$fetch['RollNumber']."' ");
            if(mysqli_affected_rows($dbconn) > 0)
            {
              $assi_num = mysqli_num_rows($select_assignment);
              if($assi_num > 0)
              {
         
                
                
                // start of assignment table

$find_total_weeks = mysqli_query($dbconn,"select * from assignment_week where NOCCourseId='".$id."' ");

if(mysqli_affected_rows($dbconn) > 0)
{
	$total_weeks = mysqli_num_rows($find_total_weeks);
}

$find_highest_record = mysqli_query($dbconn,"select MAX(LENGTH(Assignment_map) - LENGTH(REPLACE(Assignment_map, ',', ''))) as cnt from assignment_week where NOCCourseId='".$id."' ");
if(mysqli_affected_rows($dbconn) > 0)
{
while($fetch_highest_record = mysqli_fetch_array($find_highest_record))
{
	$highest_record = $fetch_highest_record['cnt'] + 1;
}
}



?>

<table class="table" width="100%" cellpadding="5">
	<tr>
		<?php
	for($header=0; $header<=$highest_record; $header++)
	{
      if($header == 0)
      {
        ?>
		<td><?php echo '<b>Assignment/Weeks</b>'; ?></td>
		<?php
      }
      else
      {
		?>
		<td><?php echo '<b>Assignment '.$header.'</b>'; ?></td>
		<?php
      }
	}
		?>
	</tr>
	

	
	<?php
	for($body=1; $body<=$total_weeks; $body++)
	{
		?>
	<tr>
		<?php
		$find_display_weeks = mysqli_query($dbconn,"select * from assignment_week where NOCCourseId='".$id."' and Weeks='".$body."' ");

			if(mysqli_affected_rows($dbconn) > 0)
			{

				while($fetch_display_weeks = mysqli_fetch_array($find_display_weeks))
			{
					
					?>
		<td><?php if(($id == 'noc15-ce04')&&($body == '9')){ echo '<b>Week '.$body.' (Midterm Exam)</b>'; }else{ echo '<b>Week '.$body.'</b>'; }  ?></td>
		<?php $assignment_names_unique= $fetch_display_weeks['Assignment_map'];
		
					$marks = mysqli_query($dbconn,"select $assignment_names_unique from assignment_scores where NOCCourseId='".$id."' and RollNumber='".$fetch['RollNumber']."' ");
					//echo "select $assignment_names_unique from assignment_scores where NOCCourseId='".$id."' and RollNumber='".$fetch['RollNumber']."'";
					$fetch_marks=mysqli_fetch_row($marks);
					
					$obj = $fetch_marks;
				foreach($obj as $key=>$value)
				{
					?>
		<td><?php if($value ==''){echo '-';}else{echo $value;} ?></td>
		<?php
				}
		
		?>
		<?php
			}
		
			}
		?>
	</tr>
	<?php
	}
	?>
</table>
                
                
                
                <?php
              // end of assignment table

                
              }
              
            }
          }
            
            
            
            
          
          ?>
          
          
          <!---assignmnet marks end table --->
          <?php }?>
          
          
<!-- scores list-->
			<?php 

if($id != '')
{
	$query=mysqli_query($dbconn,"select * from noc_testscores where EmailId='".$user."' and DOB='".$pass."' and CourseId='".$id."' ");
    $fetch_scores=mysqli_fetch_array($query);
	
	$query2=mysqli_query($dbconn,"select * from noc_course where NOCCourseId='".$id."' ");
    $fetch_course=mysqli_fetch_array($query2);
}
$examperiod = substr($fetch_course['NOCPeriod'],-8);
if($examperiod == 'Sep 2016' || $examperiod == 'Oct 2016')
{
									$gettotalQuery = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' and FinalScore >= 40");
									$certified_candidates = mysqli_num_rows($gettotalQuery);
									if($certified_candidates <= 10)
									{
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit 1");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
											{ ?>
											  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
												<?php
											}
										}
									} else if($certified_candidates > 10 && $certified_candidates <=50){
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit 2");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
											{ ?>
											  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
												<?php
											}
										}
									} else if($certified_candidates > 50 && $certified_candidates <=100)
									{
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit 5");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
											{ ?>
											  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
												<?php
											}
										}
									} else if($certified_candidates > 100)
									{
										$onepercent = round((1/100) * $certified_candidates);
										$topperMarksArray = array();
										$onePercentArray = array();
										$twoPercentArray = array();
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit $onepercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
												$onePercentArray[] = $fetch_scores['EmailId'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
											{ ?>
											  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are topper 1 % in this course!</b></h5></a></div>
												<?php
											}
										}
										
										$twopercent = round((2/100) * $certified_candidates);
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit $twopercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
												$twoPercentArray[] = $fetch_scores['EmailId'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											if(in_array($fetch_scores['EmailId'],$onePercentArray) == 0)
											{
												if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
												{ ?>
												  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are topper 2 % in this course!</b></h5></a></div>
													<?php
												}
											}
										}
										
										$fivepercent = round((5/100) * $certified_candidates);
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$id."' order by FinalScore DESC limit $fivepercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											if(in_array($fetch_scores['EmailId'],$twoPercentArray) == 0)
											{
												if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
												{ ?>
												  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are topper 5 % in this course!</b></h5></a></div>
													<?php
												}
											}
										}
									}
}
/*	if($fetch_course['NOCPeriod'] == 'Jul-Sep 2016' || $fetch_course['NOCPeriod'] == 'Jul-Oct 2016' || $fetch_course['NOCPeriod'] == 'Sep-Oct 2016')
	{
		$gettotalQuery = mysqli_query($dbconn,"select FinalScore from noc_testscores WHERE CourseId='".$id."'");
		$total_candidates = mysqli_num_rows($gettotalQuery);
		$tenpercent = round((10 / 100) * $total_candidates);
		$topperMarksArray = array();
		$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_testscores WHERE CourseId='".$id."' order by FinalScore DESC limit $tenpercent");
		while($topperMarks = mysqli_fetch_assoc($getCandidates))
		{
			if($topperMarks['FinalScore'] >= 60)
			{
				$topperMarksArray[] = $topperMarks['FinalScore'];
			}
		}
		if(count($topperMarksArray) >0)
		{
			if(in_array($fetch_scores['FinalScore'],$topperMarksArray))
			{ ?>
			  	<div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
				<?php
			} 
		}
	} else {*/
		if($fetch_course['NOCPeriod'] != 'Jul-Sep 2016' && $fetch_course['NOCPeriod'] != 'Jul-Oct 2016' && $fetch_course['NOCPeriod'] != 'Sep-Oct 2016')
		{
			$arrynew = array();
			$toppers_querynew = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$id."' and FinalScore >=90 order by FinalScore desc");
			while($fetch_toppersnew = mysqli_fetch_array($toppers_querynew))
			{
				$arrynew[]=$fetch_toppersnew['FinalScore'];
			}
			if(in_array($fetch_scores['FinalScore'],$arrynew))
			{ ?>
			  <div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
			  <?php
			} else {
				$arry = array();
				$toppers_query3 = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$id."' and FinalScore >=50 order by FinalScore desc limit 10 ");
				while($fetch_toppers3 = mysqli_fetch_array($toppers_query3))
				{
					$arry[]=$fetch_toppers3['FinalScore'];
				}
			  	if(in_array($fetch_scores['FinalScore'],$arry))
				{
					?>
				  <div class="alert alert-success text-center" role="alert"><a href="http://nptel.ac.in/noc/individual_course.php?id=<?php echo $id; ?>"><h5><b> <i class="glyphicon glyphicon-tag"></i>&nbsp;Congrats! you are a topper in this course!</b></h5></a></div>
				  <?php
				}  
			}
		}
	//}

?>

<div class="well">
<?php
if(($fetch_course['NOCEnableExamScores'] == 'Y')&&($fetch_scores['Ecert_notwritten'] != 'Y'))
{
	
?>
<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<?php 
	if(($fetch_course['NOCNameAssignment1'] != '')&&($fetch_course['NOCNameAssignment2'] != '')&&($fetch_course['NOCNameAssignment3'] != '')){ ?><a href="#" data-toggle="modal" data-target="#myModal">Assignment Score</a>,<?php } ?>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal1">Exam Score</a></h4>
<?php
}
?>

<?php

if($fetch_course['NOCEnableCertificatestatus'] == 'Y')
{
	if($fetch_scores['CertificateEligible'] == 'Y'){
		
?>
<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal3">View certificate status</a></h4>
<?php
	}
}
?>
<?php
if($fetch_course['NOCEnableDownloadCertificate'] == 'Y'){
	if($fetch_scores['CertificateEligible'] == 'Y'){
		
?>
<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="<?php echo 'E_Certificate/'.$fetch_scores['CourseId'].'/'.$fetch_scores['RollNumber'].'.jpg'; ?>" download>Download E-Certificate</a></h4>
<?php
	}
}

?>

<?php
if($fetch_course['NOCEnablePercentileScores'] == 'Y'){
	
?>
<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="<?php echo 'percentilecertificates/'.$fetch_scores['CourseId'].'/'.$fetch_scores['RollNumber'].'_P.jpg'; ?>" download>Download course completion certificate</a></h4>
<?php
}
$apnum = $aprow['Application_number'];
$tl = $fetch_course['NOCPeriod'];
if(strlen($apnum) > 0)
{ 
	if($tl == 'Jul-Sep 2016' || $tl == 'Jul-Oct 2016' || $tl == 'Sep-Oct 2016') { ?>
		<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="./download_receipt_sep_2016.php?app=<?php echo $apnum;?>">Download Payment Receipt</a></h4>
<?php } else { ?>
		<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="./download_receipt.php?app=<?php echo $apnum;?>">Download Payment Receipt</a></h4>
<?php }
} else { ?>
<h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;<a href="./receipt.php?uid=<?php echo $user;?>&tl=<?php echo $tl;?>">Download Payment Receipt</a></h4>
<?php } ?>





</div>
			<hr>
			<?php
			$Agraph = 'graph/'.$fetch_course['NOCCourseId'].'(A).jpg';
		$Egraph = 'graph/'.$fetch_course['NOCCourseId'].'(E).jpg';
if(file_exists($Agraph) || file_exists($Egraph))
{
?>
			<div class="well">
				
				<?php
		
	
	if (file_exists($Agraph)) {
    
 
	?>
<div class="container" id="agraph">
<h2 style="font-size:21px; text-align:center; text-decoration:underline;">Assignment Score distribution<p style="font-size:18px;">(for candidates who registered for the exam)</p></h2>
<img src="<?php echo 'graph/'.$fetch_course['NOCCourseId'].'(A).jpg'; ?>" width="450px" height="350px">
</div>
				
				<?php
	}
		?>
			<?php 
 if (file_exists($Egraph)) {
    
	?>	
<div id="egraph">
<h2 style="font-size:21px; text-align:center; text-decoration:underline;">Exam Score distribution</h2>
<img src="graph/<?php echo $fetch_course['NOCCourseId'].'(E).jpg'; ?>" width="450px" height="350px" >
</div>
				<?php 
 }
	 ?>
<div style="clear:both;">
</div>
</div>
			<?php
}
 ?>
			
<!-- end of scores list-->

	
	  
			</div></div>
</div>
		<!--end of profile-->
		
		
		
			
	

				
			
				
			</div><!--end of col-md12-->
		</div><!--end of row-->
	</div><!--end of container-->
<!--end of google_login-->
	
	
	
	
	
	
	<!---modell all-->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Certificate Status</h4>
      </div>
      <div class="modal-body">
        
        <table class="table table-bordered">
          
          
<tr class="text-center"> 
 <td colspan="4"><strong>History</strong></td>         
</tr>
            <tr class="table-striped" >
        
         
            <td ><strong>RollNumber</strong></td>
           
           
            <td ><strong>Cetificate status</strong></td>
            <td ><strong>Status Date</strong></td>
            
                    
            </tr>
            
    		<?php 
			$query_Recordset1 = "select occ_CourseId,RollNumber,status_date,Certificate_status from occ_certificate_tracking where occ_CourseId = '".$fetch_scores['CourseId']."' and RollNumber='".$fetch_scores['RollNumber']."' and Eligibilty='ELIGIBLE' and Certificate_status IN ('DISPATCHED','NOT RECEIVED','REPOST') order by Certificate_status desc";
			$Recordset1 = mysqli_query($dbconn,$query_Recordset1) or die(mysqli_error($dbconn));
			
			
		
			$totalRows_Recordset1 = mysqli_num_rows($Recordset1);?>
    		<?php while ($row_Recordset1 = mysqli_fetch_array($Recordset1)) { ?>
            <tr >
           
            <td ><?php echo $row_Recordset1['RollNumber']; ?></td>
            <td ><?php echo $row_Recordset1['Certificate_status']; ?></td>
            <td ><?php echo date('d M, Y', strtotime($row_Recordset1['status_date'])); ?></td>    
            
      		</tr>
      		<?php }  ?>
  			</table>
            
            <br />
            <?php
            $date = '';
            $cur_date = '';
            $rno = '';
            $cno = '';
			$query22="select occ_CourseId,RollNumber,status_date from occ_certificate_tracking where occ_CourseId = '".$fetch_scores['CourseId']."' and RollNumber='".$fetch_scores['RollNumber']."' and Eligibilty='ELIGIBLE' and Certificate_status='DISPATCHED'";
			$Recordset22222222 = mysqli_query($dbconn,$query22) or die(mysqli_error($dbconn));
			while($rre=mysqli_fetch_array($Recordset22222222))
			{
				$st_date=$rre['status_date'];
				$rno=$rre['RollNumber'];
				$cno=$rre['occ_CourseId'];
				//echo ($st_date)+'0000-00-05';
				$add_days = 5;
				$date = date('Y-m-d',strtotime($st_date) + (24*3600*$add_days));
				//echo $date;
				$cur_date=date('Y-m-d');
			}
			?>
            <?php
			if($cur_date >= $date)
			{ ?>
	            <div align="center">
		            <h5>If you not received the certificate from the 5 business days after dispatched date click the<br /> <strong>"Not received Button"</strong></h5>
		            <br />
		            <form action=""  method="post">
						<input name="roll" id="roll" type="hidden" value="<?php echo $rno; ?>" />
						<input name="courseid" id="courseid" type="hidden" value="<?php echo $cno; ?>"/>
						<input type="button" id="searchForm" onClick="SubmitForm();" value="Not Received" class="btn btn-warning"/>
					</form> 
            	</div>
            <?php
			}
			?>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">NOC Assignment Scores</h4>
      </div>
      <div class="modal-body">
       
        <table class="table table-condensed">

<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment1']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment1']; ?></td></tr>

<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment2']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment2']; ?></td></tr>

<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment3']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment3']; ?></td></tr>

<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment4']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment4']; ?></td></tr>

<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment5']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment5']; ?></td></tr>

<?php

if($fetch_course['NOCNameAssignment6']!= '')
{
?>
<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment6']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment6']; ?></td></tr>
<?php
}
?>

<?php
if($fetch_course['NOCNameAssignment7']!= '')
{
?>
<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment7']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment7']; ?></td></tr>
<?php
}
?>

<?php
if($fetch_course['NOCNameAssignment8']!= '')
{
?>
<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment8']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment8']; ?></td></tr>
<?php
}
?>

<?php
if($fetch_course['NOCNameAssignment9']!= '')
{
?>
<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment9']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment9']; ?></td></tr>
<?php
}
?>

<?php
if($fetch_course['NOCNameAssignment10']!= '')
{
?>
<tr><td width="550px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $fetch_course['NOCNameAssignment10']; ?></td><td width="10px">:</td><td width="50px;"><?php echo $fetch_scores['ScoreAssignment10']; ?></td></tr>
<?php
}
?>

</table>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Exam Score</h4>
      </div>
      <div class="modal-body">
  <div id="final_examscore">

<table class="table table-condensed">

<?php
if($fetch_scores['Ecert_notwritten'] != 'Y')
{
?>

	<?php if($fetch_scores['ScoreFromAssignment'] != '') {
	
	
	
		if(($fetch_scores['CourseId'] != 'noc15-me07') && ($fetch_scores['CourseId'] != 'noc15-hs12')&& ($fetch_scores['CourseId'] != 'noc15-ma04')&& ($fetch_scores['CourseId'] != 'noc15-hs15')){
		
		if(($fetch_course['NOCPeriod'] == 'Jul-Nov 2015')||($fetch_course['NOCPeriod'] == 'Sep-Nov 2015')||($fetch_course['NOCPeriod'] == 'Jan-Mar 2016')||($fetch_course['NOCPeriod'] == 'Mar-Apr 2016')||($fetch_course['NOCPeriod'] == 'Jan-Apr 2016'))
		{
		
		?>
        
        
<tr><td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;<?php if($fetch_scores['CourseId'] == 'noc15-mg08'){ echo 'Mid term exam score'; }else { echo 'Average assignment score out of 100';} ?></td><td width="10px">:</td><td ><?php echo $fetch_scores['ScoreFromAssignment']; ?></td></tr>

<?php 

}
else
{
?>
<tr><td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;<?php if($fetch_scores['CourseId'] == 'noc15-mg08'){ echo 'Mid term exam score'; }else { echo 'Average assignment score out of 100';} ?></td><td width="10px">:</td><td ><?php echo $fetch_scores['ScoreFromAssignment']; ?></td></tr>
<?php
}

}




} ?>
<?php if($fetch_scores['Mock_exam_score'] != '') {?>
<tr><td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Mock exam score</td><td width="10px">:</td><td ><?php echo $fetch_scores['Mock_exam_score']; ?></td></tr><?php } ?>
<?php
if(($fetch_course['NOCPeriod'] == 'Jul-Nov 2015')||($fetch_course['NOCPeriod'] == 'Sep-Nov 2015')||($fetch_course['NOCPeriod'] == 'Jan-Mar 2016')||($fetch_course['NOCPeriod'] == 'Mar-Apr 2016'))
{


?>
<tr><td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Certification exam score out of 100</td><td width="10px">:</td><td ><?php echo $fetch_scores['ExamScore']; ?></td></tr>

<?php
}
else
{
?>
<tr><td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Certification exam score out of 100</td><td width="10px">:</td><td ><?php echo $fetch_scores['ExamScore']; ?></td></tr>
<?php
}
}
?>
</table>

<?php
if($fetch_course['NOCAssignmentLogicRemarks'] != '')
{
	?>
    <div class="alert alert-info">
    <h4 style="font-weight:bold; text-decoration:underline;">Calculation Logic</h4>
    <?php echo $fetch_course['NOCAssignmentLogicRemarks'];?>
    
    </div>
    <?php
}
?>

 

<div class="well" align="left" style="padding-left:150px;">
<h3><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;<?php echo 'Final score - '.$fetch_scores['FinalScore'].'%'; ?></h3>

<?php /*?><?php

if($fetch_course['NOCEnablePercentileScores'] == 'Y')
{
?>
<h4><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;<?php echo 'Percentile score - '.$fetch_scores['NOCPercentile_score']; ?></h4>
<?php
}
?><?php */?>

</div>


<!--Assignment Score Disclaimer Start-->
      
      <?php
if(($fetch_course['NOCPeriod'] == 'Jul-Sep 2015')&&($fetch_course['NOCCourseId'] != 'noc15-hs12') && ($fetch_scores['ScoreFromAssignment'] <= 0))
{
	?>
    <div class="alert alert-danger">
    <h4 style="font-weight:bold; text-decoration:underline;">Assignment Score Disclaimer</h4>
    <?php echo 'If your enrolled email id (in online courses portal) did not match your exam registered email id, then we would not have been able to map your assignment marks for this course.Please send us the screen shot of your progress tab and both your enrolled as well as registered email id to nptel@iitm.ac.in.Unless you send us the screenshot, the assignment scores will not be changed'?>
    
    </div>
    <?php
}

?>
      
      <!--Assignment Score Disclaimer End-->


<div>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



	<!---end modell all-->
	
		
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<!---js function-->
	
	
	<script>
function SubmitForm() {
//var name = $("#name").val();

//alert('fdfdf');
var courseid = $("#courseid").val();
var roll = $("#roll").val();
//alert("Data Loaded: "+name+"\n"+courseid+"\n"+roll+"\nAll Data Submitted Sucessfully!");
$.post("not_receive.php", { courseid: courseid, roll: roll },
   function(data) {
    alert(data);
	window.location.reload();
   });
}
</script>
	
		
</body>
</html>
