<?php


 include "OCCconfig/occconfig.php";
 include "OCCconfig/openconfigdb.php";


if(isset($_POST['name'])!='')
{
	

  	$cert_status=$_POST['name'];
  	$courseid=$_POST['courseid'];
   	$rollnol=$_POST['roll'];
 
  
  $sql123=mysqli_query("INSERT INTO `occ_certificate_tracking` (`occ_CourseId`, `RollNumber`, `Certificate_status`, `status_date`, Eligibilty) VALUES('$courseid', '$rollnol', '$cert_status',NOW(),'ELIGIBLE') ");
  
 
  
  if($sql123)
  {
	echo $cert_status."\n";
  	echo $courseid."\n";
   	echo $rollnol."\n";
	
	  
  }
  else
  {
	  echo $sql123;
  }
}
?>
