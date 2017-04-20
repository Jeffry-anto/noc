<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOC Course Statistics</title>
	<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/formValidation.css"/>

  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!----bootstrap css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
    <script type="text/javascript" src="js/formValidation.js"></script>
    <script type="text/javascript" src="js/framework/bootstrap.js"></script>
	


<style>

@-moz-document url-prefix() {
  fieldset {
	   display: table-cell;
	    }
}
	

	
	
</style>



</head>

<body>
	
	<!---nav bar section ----->
	  
	  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="index.php">NPTEL Online Certification - Statistics</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
          </div>
  </div>
</nav>
	  
	  <!--end of navbar section-->
	
	
	
		  <div style="margin-top:100px;"></div>


	
		<div class="row">
	<!--display table--->
	

		<div class="col-md-12">
  
	<!--start of section-->
	<?php
	
	//if($num > 0)
	//	{
include('Connections/dbconnection.php'); 
		
		$payment = "select a.NOCPeriod,c.DisciplineName,a.NOCCourseName,b.CourseType,a.NOCCoordinatorNames,a.NOCInstitute,b.Examfee,b.Enrolled,b.Registered,b.Certified,b.Type_of_exam,a.NOCExamDt1,a.NOCExamDt2,a.NOCExamDt3 from noc_course a, statistics b,discipline c where a.NOCCourseId=b.NOCCourseId and a.disciplineid=c.disciplineid and a.CourseStatus='comp' order by a.NOCExamDt2,c.DisciplineName";
			$payment_query = mysqli_query($dbconn,$payment) or die('404 error');
			if(mysqli_affected_rows($dbconn) > 0)
			{
				$num2 = mysqli_num_rows($payment_query);
			}
			
			?>
    
	<div class="panel panel-default" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset; margin:0px 10px 0px 10px;">
  <div class="panel-body">
	

	<table class="table table-responsive table-striped">
      <thead style="font-size:14px;">
        <tr>
          
           <th class="col-sm-1">
            Duration
          </th>
			<th class="col-sm-1">
            Discipline
          </th>
            <th class="col-sm-1">
            Name Of Course
          </th>
          <th class="col-sm-1">
            Type of Course
          </th>
          <th class="col-sm-1">
            Faculty
          </th>
         
          <th class="col-sm-1">
            Institute
          </th>
			
			 <th class="col-sm-1">
            Exam Fee (INR)
          </th>
			
          <th class="col-sm-1">
            Enrolled
          </th>
        
             
        
        <th class="col-sm-1">
            Registered
          </th>
        <th class="col-sm-1">
            Certified
          </th>
			<th class="col-sm-1">
            Type of exam
          </th>
        
          <th class="col-sm-1">
            Exam Dates
          </th>
          
          
        </tr>
		</thead>
		
		  <tbody>
		
		<?php 
				while($fetch_data = mysqli_fetch_array($payment_query))
				{
				?>
		<tr>
          
          
         
          
          <td>
            <?php  echo $fetch_data['NOCPeriod']; ?>
          </td>
			  <td>
            <?php  echo $fetch_data['DisciplineName']; ?>
          </td>
            <td>
            <?php echo $fetch_data['NOCCourseName']; ?>
          </td>
          <td>
            <?php echo $fetch_data['CourseType']; ?>
          </td>
			<td>
            <?php echo $fetch_data['NOCCoordinatorNames']; ?>
          </td>
			<td>
            <?php echo $fetch_data['NOCInstitute']; ?>
          </td>
			<td>
            <?php echo $fetch_data['Examfee']; ?>
          </td>
			<td>
            <?php echo $fetch_data['Enrolled']; ?>
          </td>
			<td>
            <?php echo $fetch_data['Registered']; ?>
          </td>
          <td>
            <?php echo $fetch_data['Certified']; ?>
          </td>
			<td>
            <?php echo $fetch_data['Type_of_exam']; ?>
          </td>
			<td>
            <?php if(($fetch_data['NOCExamDt1'] != '')&&($fetch_data['NOCExamDt2'] != '')&&($fetch_data['NOCExamDt3'] != '')){echo date('M d Y',strtotime($fetch_data['NOCExamDt1'])).'/'.date('M d Y',strtotime($fetch_data['NOCExamDt2'])).'/'.date('M d Y',strtotime($fetch_data['NOCExamDt3']));}else
				{
					echo date('M d Y',strtotime($fetch_data['NOCExamDt1'])).'/'.date('M d Y',strtotime($fetch_data['NOCExamDt2']));
				}?>
          </td>
        
        
          
        </tr>
			  <?php
				
				}
				?>
				
		</tbody>
		
		
		</table>
			</div>

	<!--end of section-->
	

		  
	
	
	<!---end of display table--->
		</div>
			</div></div>
		  <script src="js/jquery-ui.js"></script>
	
	
	 
		  </body></html>
