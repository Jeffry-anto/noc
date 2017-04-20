<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPTEL Online Certification</title>
	<!----bootstrap css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">

<link rel="stylesheet" href="Assets/css/bootstrap.vertical-tabs.css">

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!----naveen stylesheet-->
<link href="Assets/css/stylenew.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> 	
<!---include modernizer before other javascript-->
<script type="text/javascript" src="Assets/js/modernizr-latest.js"></script>


 <link rel="stylesheet" href="Assets/css/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="Assets/js/jquery-1.11.2.min.js"></script>
</head>
<style type="text/css">
.stlink {
	float: right;
	font-weight: bold;
	font-style: italic;
}
</style>
<body>
	
	<!---nav bar section -->
	  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="http://nptel.ac.in/noc/">NPTEL Online Certification</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php"><b>Home</b></a></li>
		<!--<li><a href="pdf/NOC - FREQUENTLY ASKED QUESTIONS.pdf"><b>FAQ</b></a></li>-->
		<li><a href="./faq.php"><b>FAQ</b></a></li>
				<li><a href="contact.html"><b>Contact Us</b></a></li>
       
		  
		</ul>
    </div>
  </div>
</nav>
<div class="container" style="margin-top:90px;">	  
	  
	  <!--end of navbar section-->
<?php
include('Connections/dbconnection.php');
if(isset($_POST['apnum'])) {
	$apnum = $_POST['apnum'];
	$email = $_POST['email'];
	$csname = $_POST['csname'];
	$issuetype = $_POST['issuetype'];
	$examdate = $_POST['examdate'];
	$name = $_POST['name'];
	$mob = $_POST['mob'];
	$issuedesc = $_POST['issuedesc'];
	$date = date('Y:m:d h:i:s');
	$issue_doc = 'N';
	$sql = "INSERT INTO `issue_reporting`(`issue_id`, `application_number`, `Emailid`, `course_name`, `issue_type`, `exam_date`, `name`, `contact_number`, `issue_description`, `status`, `remarks`, `reported_date`, `changes_made_by`,`responded_date`,`issue_doc`, `allocation_status`) VALUES ('0','$apnum','$email','$csname','$issuetype','$examdate','$name','$mob','$issuedesc','opened','NULL','$date','',NULL,'$issue_doc','N')";
	$result = mysqli_query($dbconn,$sql);
	$selres = mysqli_query($dbconn,"SELECT * FROM `issue_reporting` where `Emailid` = '$email' AND `application_number` = '$apnum' order by `reported_date` desc limit 1");
	$selrow = mysqli_fetch_assoc($selres);
	$issue_id = $selrow['issue_id'];
	if(!$result) {
	   	$error = $error."Error ! while adding report.<br>";
	    $error = $error.mysqli_error($dbconn);
	    echo $error;exit;
	} else {
	   	$msg = "Your request has been saved. The NPTEL Team will look at the issue and perform the necessary changes<br>";
	   	if(isset($_FILES["issue_file"]))
	   	{
			$target_dir = "/var/www/html/mhrd/noc/admin/issue_files/";
			$target_file = $target_dir . basename($_FILES["issue_file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($_FILES["issue_file"]["name"] == '')
			{
				$error = $error."No Issue File<br>";
			} else if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				$error = $error."Issue File Not a valid Format<br>";
			} else {
				if (move_uploaded_file($_FILES["issue_file"]["tmp_name"], $target_file)) {
				    $msg = $msg."Successfully uploaded Issue Document.<br>";
					$temp = explode(".", $_FILES["issue_file"]["name"]);
					$rsql = "SELECT * FROM `issue_reporting` ORDER BY `reported_date` desc";
					$res = mysqli_query($rsql);
					$row = mysqli_fetch_assoc($res);

					$req = $row['issue_id'].".".end($temp);
					$oldname = "/var/www/html/mhrd/noc/admin/issue_files/".$_FILES["issue_file"]["name"];
					$newname = "/var/www/html/mhrd/noc/admin/issue_files/".$req;
					rename($oldname, $newname);
					$issue_doc = $req;
					$upsql = "UPDATE `issue_reporting` SET `issue_doc`='$issue_doc' WHERE `issue_id` = '$issue_id'";
					$upres = mysqli_query($dbconn,$upsql);
				} else {
				    $error = $error."Error while uploading Issue Document.";
				}
			}
	   	}
	}
}
?>
	<div class="container">
		<div class="col-md-12" >
			<div class="bootstrap-iso">
			 	<div class="container-fluid">
			  		<div class="row">
			  			<div class="well"><center><h4>Report an Issue</h4></center></div>
			  			<?php if(isset($error) && $error != ''){ ?>
			  				<div class="alert alert-danger"><center><?php echo $error;?></center></div>
			  			<?php }
			  				 if(isset($msg) && $msg != ''){ ?>
			  				<div class="alert alert-success"><center><?php echo $msg;?></center></div>
			  			<?php } ?>
						<form method="post" action="" enctype="multipart/form-data">
							<div class="col-md-6">
						     	<div class="form-group ">
							      	<label class="control-label requiredField" for="apnum">Hall Ticket number / Application Seq.Number<span class="asteriskField">*</span></label>
							      	<input class="form-control" id="apnum" name="apnum" type="text" required/>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label requiredField" for="email">Registered Email ID <span class="asteriskField">*</span></label>
						      		<input class="form-control" id="email" name="email" type="text" required/>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label requiredField" for="csname">Course Name<span class="asteriskField">*</span></label>
						      		<select class="select form-control" id="csname" name="csname" required>
						       			<?php $sql2 = "SELECT NOCCourseName from noc_course where NOCPeriod IN ('Jan-Apr 2016','Jan-Mar 2016','Mar-Apr 2016')";
						       			$res = mysqli_query($dbconn,$sql2);
						       			while($row = mysqli_fetch_assoc($res))
						       			{ ?>
						       				<option value="<?php echo $row['NOCCourseName'];?>"><?php echo $row['NOCCourseName'];?></option>
						       			<?php } ?>
						      		</select>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label requiredField" for="issuetype">Type of Issue<span class="asteriskField">*</span></label>
						      		<select class="select form-control" id="issuetype" name="issuetype" required>
						      			<option value="">--Select One --</option>
						       			<option value="name change">Name Change</option>
						       			<option value="dob change">DOB Change</option>
						       			<option value="exam date change">Exam Date Change</option>
						       			<option value="exam city change">Exam City Change</option>
						       			<option value="photo missed in hallticket">Photo missed in Hallticket</option>
						       			<option value="not received hallticket">Not received Hallticket</option>
						       			<option value="assignment score issue">Assignment Score Issue</option>
						       			<option value="certificate softcopy issue">Certificate Softcopy Issue</option>
						       			<option value="certificate softcopy issue">Login Issue</option>
						       			<option value="certificate softcopy issue">Problem in Exam score</option>
						       			<option value="name change">Others</option>
						      		</select>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label requiredField" for="examdate">Exam Date<span class="asteriskField">*</span></label>
						      		<select class="select form-control" id="examdate" name="examdate" required>
						       			<option value="march 20th">March 20th</option>
						       			<option value="march 27th">March 27th</option>
						       			<option value="april 24th">April 24th</option>
						       			<option value="april 30th">April 30th</option>
						      		</select>
						     	</div>
						    </div>
						    <div class="col-md-6">
						     	<div class="form-group ">
						      		<label class="control-label requiredField" for="name">Name <span class="asteriskField">*</span></label>
						      		<input class="form-control" id="name" name="name" type="text" required/>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label " for="mob">Contact phone number</label>
						      		<input class="form-control" id="mob" name="mob" type="text"/>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label " for="issuedesc">Description of the issue<span class="asteriskField">*</span></label>
						      		<textarea class="form-control" id="issuedesc" name="issuedesc" maxlength="200" placeholder="Please specify clearly a description of the change required" required></textarea>
						     	</div>
						     	<div class="form-group ">
						      		<label class="control-label " for="issue_file">Upload Relevent file ( if needed )</label>
						      		<input class="form-control" id="issue_file" name="issue_file" type="file"/>
						     	</div>
							    <div class="form-group">
					      			<div>
					       				<button class="btn btn-primary" name="submit" type="submit">Submit</button>
					      			</div>
				     			</div>
						    </div>
						</form>
			  		</div>
			 	</div>
			</div>
		</div>
		<a href="view_issue_status.php" class="stlink btn btn-success">View status of issues</a>
	</div>
	<!---jquery-->
	<script type="text/javascript" src="Assets/js/jquery-1.11.2.min.js"></script>
	<script src="Assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="Assets/js/bootstrap.min.js"></script>
		<script>
			$(function () {
	  $('[data-toggle="popover"]').popover()
	})
	</script>
</body>
</html>
