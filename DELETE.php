<?php


 
 
  include_once('Connections/dbconnection.php');

if(isset($_POST['roll'])!='')
{
	

  	$status=$_POST['status'];
  	$courseid=$_POST['courseid'];
   	$rollnol=$_POST['roll'];
 
 
 
 
  mysqli_select_db($database_local_conn, $local_conn);
  $sql123=mysqli_query("delete from `occ_certificate_tracking` where RollNumber='".$rollnol."' and occ_CourseId='".$courseid."' and status_date='".$status."' ");
  
 
  
  if($sql123)
  {
	//echo $cert_status."\n";
  	echo $courseid."\n";
   	echo $rollnol."\n";
	
	  
  }
  else
  {
	  echo "No data";
  }
	
}
?>
