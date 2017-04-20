<?php 
session_start();

session_id();

if(!session_id())
{
  header("Location:http://nptel.ac.in/noc/Payment/");
}


require 'Assets/phpfiles/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>NOC Registration form</title>
	
		<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
<script src="Assets/js/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link href="Assets/css/formValidation.css" rel="stylesheet">
<script src="Assets/js/jquery-1.11.2.min.js" ></script>
	<!--==bootstrap css-->
  
<link href="Assets/css/boot.css" rel="stylesheet">
  <link href="Assets/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="Assets/js/formValidation.js" type="text/javascript"></script>

<script src="Assets/js/framework/bootstrap.js" type="text/javascript"></script>
	
	<script src="Assets/scripts/state.js" type="text/javascript"></script>
	<script src="Assets/scripts/formvalidation_script.js" type="text/javascript"></script>
	<script src="Assets/scripts/script.js" type="text/javascript"></script>
	<script src="Assets/scripts/examcity.js" type="text/javascript"></script>
	
	
		<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="Assets/scripts/crop.js"></script>-->
	<!-- Include Bootstrap Datepicker -->
<link href="Assets/css/datepicker.min.css" rel="stylesheet">
<link href="Assets/css/datepicker3.min.css" rel="stylesheet">
<script src="Assets/js/bootstrap-datepicker.min.js"></script>
	


	<script src="Assets/js/modernizr-latest.js" type="text/javascript"></script>
	
<style>

body
	{
		
		background-color:#2c3e50;
		/*font-family: 'Open Sans', sans-serif;*/
	}
	#alertinfo
	{
		background-color:#95a5a6;
		border:none;
		color:#fff;
		font-weight:bold;
	}
	
	

</style>
</head>
<body>
<?php
$list = array('Andaman and Nicobar','Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chandigarh','Chhattisgarh','Dadra and Nagar Haveli','Daman and Diu','Delhi','Goa','Gujarat','Haryana','Himachal Pradesh','Jammu and Kashmir','Jharkhand','Karnataka','Kerala','Lakshadweep','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Orissa','Puducherry','Punjab','Rajasthan','Sikkim','Tamil Nadu','Tripura','Uttarakhand','Uttar Pradesh','West Bengal');

$examlist = array('Andhra Pradesh' ,'Assam' ,'Bihar' ,'Chhattisgarh','Delhi','Gujarat','Jammu and Kashmir' ,'Jharkhand' ,'Karnataka','Kerala','Madhya Pradesh','Maharashtra','Orissa' ,'Punjab' ,'Rajasthan','Tamil Nadu' ,'Uttar Pradesh','uttarakhand');

?>
<div class="container">
<p><br></p>
<p><br></p>
</div>
	
	
	<div class="container">
		
		
		
		<div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 10px 0 10px rgba(255,255,255,.5) inset;">
			
			<!--header logo-->
			<div class="row">
				<div class="panel-title">
					<div class="col-md-2"><img class="img-responsive" src="Assets/images/TAB.png"></div>
					<div class="col-md-8"><img class="img-responsive" height="100" src="Assets/images/LOGOS_1.jpg" width="800"></div>
						<div class="col-md-2"></div>
				</div>
			</div>
			<!--end header logo-->
			
			<div class="panel-body">
				
				<div class="page-header">
					<h2 class="text-center">Exam Registration Form for November 2015</h2>
				</div>
				
				
				<div class="alert alert-info" id="alertinfo">
						<ul>
						<li style="list-style: none; display: inline">
						<h5 style="font-weight: bold; text-decoration: underline">Note:</h5>
						</li>
						<li><b>Kindly use Internet Explorer(version 7 to 11) or Mozilla Firefox(14 to
						34) or Google Chrome(20 to 36) to fill in the Application Form.</b></li>
						<li>Use Mouse to move between fields for entry of data instead of using Tab
						Key.</li>
						<li>Fields marked with*are mandatory.</li>
						<li>Certificate will be awarded to candidates who register and attend the
						certification exam.</li>
						<li><b>Change in course, exam center and exam date will not be
						entertained.</b></li>
						</ul>
				</div>

				
				<form class="form-horizontal" action="process.php" enctype="multipart/form-data" id="form1" method="post" name="form1">
					
				<fieldset id="name">
					
					<legend>Personal Details</legend>
					
					<div class="row">
						<div class="col-md-12">
						<div class="form-group">
							<h5><label for="applicant_name" class="col-md-4 control-label"><span class="text-danger">*</span>ApplicantName</label></h5>
						<div class="col-md-6">
						<input class="form-control" id="applicant_name" name="applicant_name" placeholder="Full Name" required type="text" onkeypress="return onlyAlpha(this,event);">
						</div>
							<div class="col-md-2"></div>
						</div>
						</div>
					</div>
										
				</fieldset>
					
					<div class="alert alert-info" id="alertinfo"><span style="font-weight: bold; text-decoration: underline">Note:</span> The name entered here will appear in your certificate. No further changes will be entertained.</div>
					
					
					<fieldset id="dob_gender">
						
						<div class="row">
							
							<div class="col-md-6">
							<div class="form-group">
							<div class="date">
							<h5><label for="dob" class="col-md-4 control-label"><span class="text-danger">*</span>Date of
							Birth</label></h5>
								<div class="col-md-6">
							<div class="input-group input-append date" id="datePicker"><input class="form-control" id="dob" name="dob" type="text" > 								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span></div>
								</div>
								<div class="col-md-2"></div>
							</div>
							</div>
							</div>
							
							<div class="col-md-6">

							<div class="form-group">
							<h5><label for="gender" class="col-md-4 control-label"><span class="text-danger">*</span>Gender</label></h5>
								<div class="col-md-6">
							<label class="radio-inline"><input checked id="inlineRadio1" name="gender"
							type="radio" value="M"> Male</label> <label class="radio-inline"><input id=
							"inlineRadio2" name="gender" type="radio" value="F"> Female</label>
							<label class="radio-inline"><input id="inlineRadio3" name="gender" type="radio"
							value="O"> Others</label>
								</div>
								<div class="col-md-2"></div>
							</div>
							</div>

						</div>
						
						
					</fieldset>
					
					<fieldset id="mob_mobno">
						
								<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<h5><label for="mobno" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile	No.</label></h5>
									<div class="col-md-6">
								<input class="form-control" id="mobno" name="mobno" required="" type="text">
									</div>
									<div class="col-md-2"></div>
								</div>
								</div>
								
						
								<div class="col-md-6">
								<div class="form-group">
								<h5><label for="altermobno" class="col-md-4 control-label">Alternate Contact No.</label></h5>
									<div class="col-md-6">
								<input class="form-control" id="altermobno" name="altermobno" type="text">
									</div>
									<div class="col-md-2"></div>
								</div>
								</div>
						
								</div>
						
					</fieldset>
					
					
					<fieldset id="confmob_disability">
						
						
						<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<h5><label for="conformmobno" class="col-md-4 control-label"><span class="text-danger">*</span>Confirm Mobile No.</label></h5>
								<div class="col-md-6">
							<input class="form-control" id="conformmobno" name="conformmobno" required
							type="text">
								</div>
								<div class="col-md-2"></div>
								
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
							<h5><label for="disablity" class="col-md-4 control-label"><span class="text-danger">*</span>Person with disability</label></h5>
								<div class="col-md-6">
								<label class="radio-inline"><input type="radio" name="disablity" id="disablity" value="Y"> Yes</label>
								<label class="radio-inline"><input type="radio" name="disablity" id="disablity" value="N" checked> No</label>
								</div>
								<div class="col-md-2"></div>

							</div>
							</div>
						</div>
						
					</fieldset>
					
					
					<fieldset id="scst_disreason">
						
						<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<h5><label for="isscst" class="col-md-4 control-label"><span class="text-danger">*</span>If you are a SC/ST
								candidate select here</label></h5>

									<div class="col-md-6">
								<label class="radio-inline"><input id="isscst1" name="isscst" type="radio"
								value="Y">Yes</label> <label class="radio-inline"><input checked id="isscst2"
								name="isscst" type="radio" value="N"> No</label>
									</div>
									<div class="col-md-2"></div>
									
								</div>
								</div>
							
								<div class="col-md-6" id="disablity_reason_js">
								<div class="form-group">
								<h5><label for="disablity_reason" class="col-md-4 control-label"><span class="text-danger">*</span>Type</label></h5>
									<div class="col-md-6">
								<select class="form-control" id="disablity_reason" name="disablity_reason" >
								<option value="">----Select----</option>
								<option title='Orthopaedically Handicapped' value=
								"Orthopaedically Handicapped">Orthopaedically Handicapped</option>
								<option title='Visually Impaired with scribe' value=
								"Visually Impaired with scribe">Visually Impaired with scribe</option>
								<option title='Visually Impaired with scribe' value=
								"Visually Impaired without scribe">Visually Impaired without scribe</option>
								<option title='Visually Impaired with scribe' value="Hearing Impaired">Hearing
								Impaired</option>
								</select>
									</div>
									<div class="col-md-2"></div>
								</div>
								</div>
						</div>
						
					</fieldset>
					
					<fieldset id="scst_js">
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
						<div class="form-group">
							
							<h5><label for="scstfile" class="col-md-4 control-label"><span class="text-danger">*</span>Please upload your valid SC/ST certificate.</label></h5>
							<div class="col-md-6">
							<input type="file" id="scstfile" name="scstfile">
		<p class="help-block">Please upload your valid SC/ST certificate here (Maximum 150KB Size, Only PDF or JPG/JPEG files).</p>
							</div>
							<div class="col-md-2"></div>
						</div>
							</div>
							<div class="col-md-3"></div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="well well-md"><p class="text-justify">"Applicants who claim to be in any of the
category SC/ST/PwD have to submit valid document issued by competent authority,
to qualify for the reduced fee. Authorities Empowered to Issue Certificates
(SC/ST): District Magistrate/ Additional District Magistrate/ Collector/ Deputy
Collector/ Deputy Commissioner/ Additional Deputy Commissioner/ 1st Class
Stipendiary Magistrate/ City Magistrate/ Sub-Divisional Magistrate/ Taluk
Magistrate/ Executive Magistrate/ Extra Assistant Commissioner. Chief
Presidency Magistrate/ Additional Chief Presidency Magistrate/ Presidency
Magistrate Revenue Officer not below the rank of Tahsildar Sub-Divisional
Officer of the area where the Candidate and/or her/his family normally resides
Administrator/ Secretary to Administrator/ Development Officer (Lakshadweep
Islands) Certificate issued by any other official will not be accepted.</p></div>
							</div>
						</div>
						
						
					</fieldset>
					
					<div class="alert alert-info" id="alertinfo">
						<ul>
						<li style="list-style: none"><span style=
						"font-weight: bold; text-decoration: underline">Note</span></li>
						<li>Date of birth will be verified against a Govt. issued Id card. Ensure that
						the year you have chosen in your 'date of birth' is correct. No changes will be
						entertained, after this form is submitted.</li>
						<li>The mobile number entered here, will be used for sending important SMS
						regarding the exam.</li>
						</ul>
					</div>
					
					<fieldset id="college_org_details">
					
					<legend>College / Organization Details</legend>
						
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
							
								<div class="form-group">
										<h5><label for="role" class="col-md-4 control-label"><span class="text-danger">*</span>Your Current Role</label></h5>
									<div class="col-md-6">
										<label class="radio-inline"><input id="role1" name="role" type="radio" value=
										"Student">Student</label> <label class="radio-inline"><input id="role2"
										name="role" type="radio" value="Faculty">Faculty</label> <label class=
										"radio-inline"><input id="role3" name="role" type="radio" value=
										"Others">Others</label>
									</div>
									<div class="col-md-2"></div>
								</div>
							
							
							</div>
							<div class="col-md-3"></div>
						</div>
						
					</fieldset>
					
					<fieldset id="college_org_textbox">
						
						<div class="row">
							<div class="col-md-12">
													
							<div class="form-group" id="name_college">
<h5><label for="role_college_name" class="col-md-4 control-label"><span class="text-danger">*</span>Name of
College</label></h5>
								<div class="col-md-4">
<input class="form-control" id="role_college_name" name="role_college_name"
	   type="text" onkeypress="return onlyAlpha(this,event);"></div><div class="col-md-4"></div>
								
								</div>
							</div>
				    	</div>
						<div class="row">
							<div class="col-md-12">
							
							<div class="col-md-6">
							<div class="form-group" id="other_role">
<h5><label for="other_role" class="col-md-4 control-label"><span class="text-danger">*</span>Other
Role</label></h5>
								<div class="col-md-6">
<input class="form-control" id="other_role" name="other_role" type=
	   "text" onkeypress="return onlyAlpha(this,event);"></div><div class="col-md-2"></div>
								</div></div>
	
	<div class="col-md-6">						
<div class="form-group" id="organization">
<h5><label for="role_organization" class="col-md-4 control-label"><span class="text-danger">*</span>Name of
Organization</label></h5>
	<div class="col-md-6">
<input class="form-control" id="role_organization" name="role_organization"
	   type="text" onkeypress="return onlyAlpha(this,event);"></div><div class="col-md-2"></div>
		</div></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							
							
							<div class="form-group" id="facultyrole">
<h5><label for="faculty_organization" class="col-md-4 control-label"><span class="text-danger">*</span>Name of
College</label></h5>
								<div class="col-md-4">
<input class="form-control" id="faculty_organization" name="faculty_organization"
	   type="text" onkeypress="return onlyAlpha(this,event);"></div></div>
								<div class="col-md-4"></div>
							</div>
						</div>
						
					</fieldset>
					
					<fieldset id="college_org_statecity">
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">
<div class="form-group">
<h5><label for="role_state" class="col-md-4 control-label"><span class="text-danger">*</span>State(College / Organization location)</label></h5>
	<div class="col-md-6">
<select class="form-control" id="role_state" name="role_state" required onchange="populate('role_state','role_city')">
<option value="">---Select---</option>
<?php
foreach ($list as $key) {
   echo '<option value="'.$key.'">'.$key.'</option>';
}
?>
</select>
	</div><div class="col-md-2"></div>
	
	</div>
</div>
<div class="col-md-6">
<div class="form-group">
<h5><label for="role_city" class="col-md-4 control-label"><span class="text-danger">*</span>City(College / Organization location)</label></h5>
	<div class="col-md-6">
<select class="form-control" id="role_city" name="role_city" required >
<option value="">---Select---</option>
</select>
	</div><div class="col-md-2"></div>
	</div>
</div>
								
								
								
							</div>
						</div>
						
					</fieldset>
					
					<fieldset id="college_org_otherscityname">
						
						
							<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">

								</div>
								<div class="col-md-6" id="role_otherscitydiv">
										<div class="form-group">
										<h5><label for="role_otherscity" class="col-md-4 control-label"><span class="text-danger">*</span>City Name</label></h5>
											<div class="col-md-6">
										<input class="form-control" type="text" name="role_otherscity" id="role_otherscity" placeholder="Enter the city name" onkeypress="return onlyAlpha(this,event);">
											</div><div class="col-md-2"></div>
											</div>
								</div>
								
								
								
							</div>
						</div>
						
					</fieldset>
					
					
					<fieldset id="cert_mailing_address">
						<legend>Certificate Mailing Address Details</legend>
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">
									
<div class="form-group">
<h5><label for="certificate_addr1" class="col-md-4 control-label"><span class="text-danger">*</span>Address
Line 1</label></h5>
	<div class="col-md-6">
<input class="form-control" id="certificate_addr1" name="certificate_addr1" type="text" required>
	</div><div class="col-md-2"></div>
							</div>
</div>
<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_country" class="col-md-4 control-label"><span class="text-danger">*</span>Country</label></h5>
	<div class="col-md-6">
<input class="form-control" readonly type="text" value="India">
	</div><div class="col-md-2"></div>
	</div>
</div>
								
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_addr2" class="col-md-4 control-label"><span class="text-danger">*</span>Address Line 2</label></h5>
	<div class="col-md-6">
<input class="form-control" id="certificate_addr2" name="certificate_addr2" required type="text">
	</div><div class="col-md-2"></div>
	</div>
								</div>
								<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_state" class="col-md-4 control-label"><span class="text-danger">*</span>State</label></h5>
	<div class="col-md-6">
<select class="form-control" id="certificate_state" name="certificate_state"
required="" onchange="populate('certificate_state','certificate_city')">
<option value="">---Select---</option>
<?php
foreach ($list as $key) {
   echo '<option value="'.$key.'">'.$key.'</option>';
}
?>
</select>
	</div>
	<div class="col-md-2"></div>
									</div>
								</div>
								
								
								
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_addr3" class="col-md-4 control-label">Address Line 3</label></h5>
	<div class="col-md-6">
<input class="form-control" id="certificate_addr3" name="certificate_addr3" type="text">
	</div><div class="col-md-2"></div>
	</div>
</div>
<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_city" class="col-md-4 control-label"><span class="text-danger">*</span>City</label></h5>
	<div class="col-md-6">
<select class="form-control" id="certificate_city" name="certificate_city" required>

</select>
	</div><div class="col-md-2"></div>
	</div>
		</div>
							</div>
						</div>
						
						<div class="row" id="certificate_othercitynamediv">
							<div class="col-md-12">
								
								<div class="col-md-6">

								</div>
								<div class="col-md-6" >
<div class="form-group">
<h5><label for="certificate_othercityname" class="col-md-4 control-label"><span class="text-danger">*</span>City Name</label></h5>
	<div class="col-md-6">
<input type="text" name="certificate_othercityname" id="certificate_othercityname" class="form-control" placeholder="Fill the city name" onkeypress="return onlyAlpha(this,event);">
	</div><div class="col-md-2"></div>
	</div>
								</div>
								
								
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6">
<div class="form-group">
<h5><label for="certificate_pincode" class="col-md-4 control-label"><span class="text-danger">*</span>Pincode</label></h5>
	<div class="col-md-6">
<input class="form-control" id="certificate_pincode" name="certificate_pincode" required="" type="text">
	</div><div class="col-md-2"></div>
	</div>
</div>
								
<div class="col-md-6">
<div class="form-group">
<h5><label for="emailid" class="col-md-4 control-label"><span class="text-danger">*</span>Email
ID</label></h5>
	<div class="col-md-6">
<input class="form-control" id="emailid" name="emailid" required="" type="text">
<p class="help-block text-justify">(Please enter your correct,valid email-id
that you regularly access and check. This email-id will be used for sending
	important information regarding the exam.)</p></div><div class="col-md-2"></div>
</div>
		</div>
								
								
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-6"><!--blank type for css fill--></div>
<div class="col-md-6">
<div class="form-group">
<h5><label for="confirm_emailid" class="col-md-4 control-label"><span class="text-danger">*</span>Confirm Email ID</label></h5>
	<div class="col-md-6">
<input class="form-control" id="confirm_emailid" name="confirm_emailid" required="" type="text">
	</div><div class="col-md-2"></div>
	</div>
</div>
								
								
								
							</div>
						</div>
						
					</fieldset>
					
					<div class="alert alert-info" id="alertinfo">
<ul>
<li style="list-style: none"><span style=
"font-weight: bold; text-decoration: underline">Note</span></li>
<li>Certificate and all postal communication will use this address only. No
further changes will be entertained.</li>
</ul>
</div>
					
					<fieldset id="examdetails">
						<legend>Exam Details</legend>
					</fieldset>
					
					
					<div class="alert alert-info" id="alertinfo">
<ul>
<li style="list-style: none"><span style="font-weight: bold; text-decoration: underline">Note</span></li>
<li>Once this registration form is submitted after payment, no changes like
adding or removing the chosen course, exam date, city is possible. So, if you
are choosing to write 2 course exams, please choose suitably and make the
payment. Its not possible to pay later for the second course. Once the payment
is made, the registration form will be non-editable.</li>
</ul>
					</div>
					
						<?php 
	
$reg_record = new select_reg_open();
$fetch_record = $reg_record->select();



$date_record = new select_reg_open();
$fetch_date_record = $date_record->examdate();

while($final_date_record = mysqli_fetch_array($fetch_date_record))
{
	$NOCExamDt1[] = $final_date_record['NOCExamDt1'];
	$NOCExamDt2[] = $final_date_record['NOCExamDt2'];
		
	//$option_coursename[] = '<option value="'.$coursename.'">'.$coursename.'</option>';
}
	?>
					
					
					<fieldset id="examdetails_table">
						<div class="well well-lg">
						<div class="row">
							
							
							<div class="col-md-12">
								
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Exam Date</h5>
										<select class="form-control" id="examdate1" name="examdate1" required="" onChange="datecheck()">
										<option value="">---Select---</option>

										<?php
										foreach($NOCExamDt1 as $option_date1)
										{
											echo '<option value="'.$option_date1.'">'.$option_date1.'</option>';
										}
										?>
										<?php
										foreach($NOCExamDt2 as $option_date2)
										{
											echo '<option value="'.$option_date2.'">'.$option_date2.'</option>';
										}
										?>
										</select>
										</div>
									</div>
								
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Subject</h5>
								<select class="form-control" id="subject1" name="subject1" required>
										<option value="">---Select---</option>
										<?php
										while($final_record = mysqli_fetch_array($fetch_record))
										{
											echo '<option value="'.$final_record['NOCCourseId'].'">'.$final_record['NOCCourseName'].'</option>';

											//$option_coursename[] = '<option value="'.$coursename.'">'.$coursename.'</option>';
										}
										?>
										</select>
										</div>
									</div>
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Exam State</h5>
										<select class="form-control" id="state1" name="state1"required onchange="examcity('state1','city1')">
										<option value="">---Select---</option>
										<?php
										foreach ($examlist as $key) {
										   echo '<option value="'.$key.'">'.$key.'</option>';
										}
										?>
										</select>
										</div>
										</div>
								
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Exam City</h5>
										<select class="form-control" id="city1" name="city1" required>
<option value="">---Select---</option>
										</select>
										</div>
									</div>
								
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Secondary State</h5>
									<select class="form-control" id="second_state1" name="second_state1" required onchange="examcity('second_state1','second_city1')">
		<option value="">---Select---</option>
		<?php
		foreach ($examlist as $key) {
		   echo '<option value="'.$key.'">'.$key.'</option>';
		}
		?>
										</select>
										</div>
									</div>
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Secondary City</h5>
								<select class="form-control" id="second_city1" name="second_city1" required="">
<option value="">---Select---</option>

										</select>
										</div>
									</div>
								
								
								</div>

							</div>
							
							
							</div>
						</div>
					</fieldset>
					
					<fieldset id="checkexam2">
						<div class="row">
								<div class="col-md-12">
		
		

		
		<div class="form-group">
<h5><label for="isscst" class="col-md-4 control-label"><span class="text-danger">*</span>Apply for two course exams</label></h5>

	<div class="col-md-8">		
<label class="radio-inline"><input id="checkfor2exam1" name="checkfor2exam" type="radio"
value="Y">Yes</label> <label class="radio-inline"><input checked id="checkfor2exam2"
name="checkfor2exam" type="radio" value="N"> No</label>
			</div>
			
			
		</div>
	</div>
						</div>
					</fieldset>
					
					<fieldset id="seondonerow">
						<div class="well well-lg">
						<div class="row">
							
							<div class="col-md-12" id="secondone">

								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Exam Date</h5>
									<select class="form-control" id="examdate2" name="examdate2" onChange="datecheck()">
											<option value="">---Select---</option>
											<?php
											foreach($NOCExamDt2 as $option_date2)
											{
												echo '<option value="'.$option_date2.'">'.$option_date2.'</option>';
											}
											?>
												<?php
											foreach($NOCExamDt1 as $option_date1)
											{
												echo '<option value="'.$option_date1.'">'.$option_date1.'</option>';
											}
											?>
										</select>
										</div>
									</div>
								
								
								</div>
								<?php
				$reg_record2 = new select_reg_open();
				$fetch_record2 = $reg_record2->select();
								?>
								<div class="col-md-2">
								
									
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Subject</h5>
										<select class="form-control" id="subject2" name="subject2">
												<option value="">---Select---</option>
												<?php
												while($final_record2 = mysqli_fetch_array($fetch_record2))
												{
													echo '<option value="'.$final_record2['NOCCourseId'].'">'.$final_record2['NOCCourseName'].'</option>';

													//$option_coursename[] = '<option value="'.$coursename.'">'.$coursename.'</option>';
												}
												?>
										</select>
										</div>
									</div>
								
								
								</div>
								<div class="col-md-2">
								
								<div class="form-group">
									<div class="col-md-12">
										<h5><span class="text-danger">*</span>Exam State</h5>
									<select class="form-control" id="state2" name="state2" onchange="examcity('state2','city2')">
													<option value="">---Select---</option>
													<?php
													foreach ($examlist as $key) {
													   echo '<option value="'.$key.'">'.$key.'</option>';
													}
													?>
									</select>
									</div>
									</div>
								
								
								</div>
								<div class="col-md-2">
								<div class="form-group">
									<div class="col-md-12">
										<h5><span class="text-danger">*</span>Exam City</h5>
									<select class="form-control" id="city2" name="city2">
											<option value="">---Select---</option>
									</select>
									</div>
									</div>
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Secondary State</h5>
									<select class="form-control" id="second_state2" name="second_state2" onchange="examcity('second_state2','second_city2')">
											<option value="">---Select---</option>
											<?php
											foreach ($examlist as $key) {
											   echo '<option value="'.$key.'">'.$key.'</option>';
											}
											?>
										</select>
										</div>
									</div>
								
								</div>
								<div class="col-md-2">
								
									<div class="form-group">
										<div class="col-md-12">
											<h5><span class="text-danger">*</span>Secondary City</h5>
								<select class="form-control" id="second_city2" name="second_city2">
<option value="">---Select---</option>
										</select>
										</div>
									</div>
								
								
								</div>
								
								
							</div>
						</div>
						</div>
					</fieldset>
					
						
<div class="alert alert-info" id="alertinfo">
<ul>
<li style="list-style: none"><span style=
"font-weight: bold; text-decoration: underline">Note</span></li>
<li>Please choose your exam city and secondary exam city carefully as one of them is will be your final city, for which your hall ticket will be generated. No changes in your choice will be entertained, after this form is submitted.</li>
</ul>
</div>

					
					<fieldset id="photofieldset">
						<legend>Photo and Signature Upload</legend>
						
						<div class="row">
							<div class="col-md-12">
								
							
		<p><span class="text-danger">*</span>Please upload scanned copies of your photo and signature 
		</p>
								</div>
							</div>

		 <div class="row">
			 <div class="col-md-12">
<div class="col-md-6">
	
			<div class="form-group">
        
       
			<label for="photo" class="col-md-4 control-label">Choose photo</label>
				<div class="col-md-6">
            <input type="file" name="photo" id="photo" onchange="readURL(this);" required />
				</div><div class="col-md-2"></div>
        </div>
			 </div>
			 <div class="col-md-6">
			<div class="form-group">
        
       
			<label for="signature" class="col-md-4 control-label">Choose Signature</label>
				<div class="col-md-6">
            <input type="file" name="signature" id="signature" onchange="readURL1(this);" required />
				</div><div class="col-md-3"></div>
        </div>
			 </div>
			 </div>
		</div>
						<div class="row">
							
							<div class="col-md-12">
								
								
								 
									 <div class="col-md-6">
										 
										 <div class="col-md-3"></div>
										 <div class="col-md-6">
										 <img src="#" id="imgpreview" class="img-thumbnail" width="99" height="128" style="display:none;">
										 </div><div class="col-md-3"></div>
									 </div>
								
								
									 <div class="col-md-6">
										 <div class="col-md-3"></div>
										 <div class="col-md-6">
										 <img src="#" id="signatureimgpreview" class="img-thumbnail" width="227" height="99" style="display:none;">
										 </div><div class="col-md-3"></div>
									 </div>
								
							</div>
							
						</div>
		 

						
					</fieldset>
					
					<div class="alert alert-info" id="alertinfo">
<ul>
<li style="list-style: none"><span style=
"font-weight: bold; text-decoration: underline">Note</span></li>
<li>Please upload a clear 35 × 45 mm photograph. The photograph which you upload here will appear on your hall-ticket, certificate and must be verifiable against a Govt. issued Photo ID.</li>
	<li>The signature will be verified at the exam venue.</li>
</ul>
</div>
					
					<fieldset id="otherknowabt">
						
						<legend>Other Details</legend>
						<div class="row">
							<div class="col-md-12">
								
								
		
		<div class="col-md-6">
		<div class="form-group">
			
			<h5><label for="know_abt_course" class="col-md-4 control-label"><span class="text-danger">*</span>How did you know about these courses?</label></h5>
			<div class="col-md-6">
			<select class="form-control" id="know_abt_course" name=
"know_abt_course" required="">
<option value="">---Select---</option>
<option value="College">College</option>
<option value="Friends">Friends</option>
<option value="Others">Others</option>
</select>
			</div><div class="col-md-2"></div>
			</div>
			</div>
						</div>
						</div>			
			
				<div class="row">
							<div class="col-md-12">		
			<div class="col-md-6" id="know_others_div">
		
		<div class="form-group">
			<h5><label for="know_abt_course_others" class="col-md-4 control-label">Others</label></h5>
			<div class="col-md-6">
		<input class="form-control" type="text" name="know_abt_course_others" id="know_abt_course_others" onkeypress="return onlyAlpha(this,event);">	
			</div><div class="col-md-2"></div>
		</div>
		</div>
					</div></div>
		
							
						
						
					</fieldset>
					
					<fieldset id="Netbanking">
						<legend>Netbanking / Credit card / Debit card</legend>
						
						<div class="row">
							<div class="col-md-12">
							
								<h5>TO PROCEED WITH PAYMENT PLEASE VERIFY THE DETAILS BELOW BEFORE GOING TO PAYMENT GATEWAY</h5>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							
								<h5 style="font-weight:bold;">Amount(RS):<span id="amount"></span></h5>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								
								<div class="col-md-3"></div>				
			
	<div class="form-group">
    <div class="col-md-6">
    <div class="input-group">
		<div class="input-group-addon"><span id="captchaOperation"></span></div>
      <input type="text" class="form-control" name="captcha" placeholder="fill the captcha" required/> 
     
    </div>
		</div><div class="col-md-3"></div>
				</div>
								
								
							</div>
						</div>
						
						
					</fieldset>
					
					
					<div class="alert alert-info" id="alertinfo">
<ul>
<li style="list-style: none"><span style=
"font-weight: bold; text-decoration: underline">Note</span></li>
<li>Certificate will be awarded to candidates who register and attend the certification exam. </li>
	<li>Change in course, exam center and exam date will not be entertained. </li>
</ul>
</div>
					
					<fieldset id="declaration">
						
						<legend>Declaration</legend>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="form-group">
									<div class="col-md-2"></div>
							<div class="col-md-8">		
		<div class="checkbox">
    <label>
		<input type="checkbox" name="agree" value="agree"> I Agree<p class="text-justify">I am above 18 years of age or I am below 18 years and have my parent's / guardian's consent.I hereby declare that I have carefully read the instructions and all the particulars stated in this application form are true and correct to the best of my knowledge and belief. If the information provided is found false / incorrect, I shall abide by any action and / or decision taken by NPTEL. </p>
    </label>
			
			
  </div>
									</div><div class="col-md-2"></div>
		</div>
								
								
							</div>
						</div>
					</fieldset>
					
					<fieldset id="submitpay">
						
						<div class="row">
							<div class="col-md-12">
								
								
		
			<div class="col-md-3"></div>
			<div class="col-md-6">
		<button type="submit" name="register" id="register" class="btn btn-primary" value="register">Submit and Pay</button>
			</div>
			<div class="col-md-3"></div>
		

								
							</div>
						</div>
						
					</fieldset>
					
					
					
				</form>
				
			</div><!--end of panel body-->
			
			
			
		</div><!--- end of panel-->
		
		
		
		
	</div><!--main container closed--->

	

	
	
	
	

  

    <script src="Assets/js/bootstrap.min.js"></script>
  <script src="Assets/js/bootswatch.js"></script>

	
</body>
</html>
