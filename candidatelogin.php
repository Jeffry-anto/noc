<?php
session_start();
include('Connections/dbconnection.php');
?>
<?php 
if(!empty($_SESSION['username']))
{
	
$user = $_SESSION['username'];
$pass = $_SESSION['password'];
	
}
else
{
	?>
	<script>
		
		window.location.href="index.php";</script>
	<?php
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC Candidate Login</title>
	
	<link rel="stylesheet" href="css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
    <script src="js/custom.js"></script>

	
	

	<style>
		body
		{
		
			color:#545454;
		}
		.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
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
      <a class="navbar-brand" href="#">NPTEL Online Certification</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php"><b>Home</b></a></li>
      </ul>
    </div>
  </div>
</nav>
	<!--end navbar-->
	
	<div style="margin-top:60px;"></div>
<!--google_login-->
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	
			
	
		<!--profile-->
		<?php
$query = "select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.EmailId='".$user."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysql_error());
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);
?>
		
		
		<div class="row">

<div class="col-md-6">
</div>
<div class="col-md-6" >

	<a href="logout.php"><button class="btn btn-warning pull-right">Logout</button></a>
</div>
</div>
		<div class="container" id="welcome">
			
		<div class="panel panel-default" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
			
  <div class="panel-body">	
	  <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Candidate Profile</p>
    <div class="row">
        <div class="col-sm-2 col-md-2">
        	<?php

            $examperiod = substr($fetch['NOCPeriod'],-8);

            if($examperiod =='Feb 2017')
            {
                
                $examperiod='Mar 2017';
                
            }

        	if($examperiod == 'Sep 2016' || $examperiod == 'Oct 2016' )
        	{ ?>
        		<img src="./Candidate_photopath/<?php echo "Jul-".$examperiod."/".$fetch['photopath'];?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/>
        	<?php }
            elseif($examperiod == 'Mar 2017' || $examperiod == 'Apr 2017' || $examperiod == 'Feb 2017')
            {
                ?>
                <img src="./Candidate_photopath/<?php echo "Jan-".$examperiod."/".$fetch['photopath'];?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/>
                <?php
            }

             else { ?>
        		<img src="<?php if($fetch['photopath'] != ''){ echo $fetch['photopath']; }else{ echo 'images/Example Photo.jpg';} ?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/>
        	<?php }
            ?>
            <!-- <img src="<?php if($fetch['photopath'] != ''){ echo $fetch['photopath']; }else{ echo 'images/Example Photo.jpg';} ?>" alt="" class="img-responsive img-thumbnail" width="150" height="150"/> -->
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?php echo $fetch['Name'] ?></p>
            </blockquote>
            <p> 
				
				
				<i class="glyphicon glyphicon-envelope"></i> <?php echo $user; ?><br>
				<i class="glyphicon glyphicon-gift"></i> <?php echo date('M d, Y ',strtotime($fetch['DOB'])); ?>
                <!--<br /> <?php //if($fetch['Gender'] == 'M'){ ?><i class="fa fa-male"></i> <?php //echo 'Male'; }else{ ?><i class="fa fa-female"></i> <?php //echo 'Female'; }?>--></p>
                
                 
        </div>
         <div class="col-sm-6 col-md-6"></div>
    </div><!--end of row-->
	  <hr>
      <div class="container">
      <div class="col-md-1"></div>
      					<div class="col-md-5">
      					
                        
                        <div class="material-switch pull-right">
                        Can we share your contact information with potential employers?&nbsp;&nbsp;<span id="statusnew1"></span>&nbsp;
                            <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionSuccess1" class="label-success"></label>
                        </div>
                        </div>
                        
                        <div class="col-md-5">
      					
                        <div class="material-switch pull-right">
                        Can we share your score information with your college?<br>&nbsp;&nbsp;&nbsp;<span id="statusnew2"></span>&nbsp;
                            <input id="someSwitchOptionSuccess2" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionSuccess2" class="label-success"></label>
                        </div>
                        </div>
                              <div class="col-md-1"></div>
                        
                        
      
      </div>
	  <hr>
	 
			 
		 <p class="bg-primary" style="padding:5px; border-radius:3px; text-align:center; font-weight:bold;">Courses Certified</p>
				
<?php

$select = "select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.EmailId='".$user."' and a.NOCEnableCandidateLogin='Y' ";
$fetch_coursedetails = mysqli_query($dbconn,$select) or die(mysql_error());
?>
<div class="list-group">
<!---fetching noc record---->
			<?php while ($row_Recordset1 = mysqli_fetch_assoc($fetch_coursedetails)) { 
	

if($row_Recordset1['Ecert_notwritten'] != 'Y')
{
		
		?>
			
			

	<a href="scores.php?id=<?php echo $row_Recordset1['NOCCourseId']; ?>" class="list-group-item"><h4><span class="glyphicon glyphicon-link"></span>&nbsp;<?php echo '<b>'.$row_Recordset1['NOCCourseName'].'</b> - Click to view scores'; ?></h4></a>


		
   
     
    <?php
}
	
	}  ?>
<!---end of fetching noc record---->
	  </div>
			</div></div>
</div>
		<!--end of profile-->
		
		
		
			
	

				
			
				
			</div><!--end of col-md12-->
		</div><!--end of row-->
	</div><!--end of container-->
<!--end of google_login-->
	
	
	
		
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	
	
	










	
	

	
</body>
</html>
