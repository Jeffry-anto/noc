<?php
// The back-end then will determine if the username is available or not,
// and finally returns a JSON { "valid": true } or { "valid": false }
// The code bellow demonstrates a simple back-end written in PHP

// Get the username from request


if(isset($_POST['coursename']))
{
$getvalue = $_POST['coursename'];


include('Connections/local_conn.php'); 


	
	//mysqli_select_db($database_local_conn, $local_conn);
	$query = mysqli_query($dbconn,"select Course1 from nocpaymentcheck where Course1 !='' and Course1 !='Not Applied' and Course1='".$getvalue."' UNION select Course2 from nocpaymentcheck where Course2 !='' and Course2 !='Not Applied' and Course2='".$getvalue."' ");
	if($query > 0)
		{
	while($dd=mysqli_fetch_array($query))
	{
		 
			$num=mysqli_num_rows($query);
			$ff=$dd['Course1'];
		
		
		
		}
		
	}


if($ff != '')
		{
			$isAvailable = true;
		}
		else
		{
			$isAvailable = false;
		}


echo json_encode(array(
    'valid' => $isAvailable,
));
}
?>


<?php
// The back-end then will determine if the username is available or not,
// and finally returns a JSON { "valid": true } or { "valid": false }
// The code bellow demonstrates a simple back-end written in PHP

// Get the username from request


if(isset($_POST['examdate']))
{
$getvalue = $_POST['examdate'];
//substr($getvalue,-4)."-".substr($getvalue,3,2)."-".substr($getvalue,0,2);exit;
include('Connections/local_conn.php'); 
	//mysqli_select_db($database_local_conn, $local_conn);
	$query = mysqli_query($dbconn,"select * from nocpaymentcheck where ExamDate1='".$getvalue."' or ExamDate2='".$getvalue."' ");
	if($query > 0)
		{
	while($dd=mysqli_fetch_array($query))
	{
		 
			$num=mysqli_num_rows($query);
			$ff1=$dd['Name'];
		
		
		
		}
		
	}


if($ff1 != '')
		{
			$isAvailable = true;
		}
		else
		{
			$isAvailable = false;
		}


echo json_encode(array(
    'valid' => $isAvailable,
));
}
?>

