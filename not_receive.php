<?php



require_once('Connections/dbconnection.php'); 
 
 
if(isset($_POST['roll'])!='')
{
	

  	
  	$courseid=$_POST['courseid'];
   	$rollnol=$_POST['roll'];
 
 mysqli_select_db($database_local_conn, $local_conn);
 $query12="select count(Certificate_status) as main from occ_certificate_tracking where occ_CourseId='".$courseid."' and RollNumber='".$rollnol."' ";
 $Record33 = mysqli_query($query12) or die(mysql_error());
 while($rro=mysqli_fetch_array($Record33))
 {
	 $scn=$rro['main'];
 }
 
 if($scn > 1)
 {
	 echo "Your limitation is one time.";
 }
 else
 {
  mysqli_select_db($database_local_conn, $local_conn);
  $sql123="INSERT INTO `occ_certificate_tracking` (`occ_CourseId`, `RollNumber`, `Certificate_status`, `status_date`, `Eligibilty`) VALUES('".$courseid."','".$rollnol."','NOT RECEIVED',NOW(),'ELIGIBLE') ";
  $Reco34 =mysqli_query($sql123) or die(mysql_error());
  
 
  
  if($Reco34)
  {
	//echo $cert_status."\n";
  echo "Thanks for your Information.";
  
	
	  
  }
  else
  {
	  
	  echo "No data";
  }
 }

	
}
?>
