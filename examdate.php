<!---date validation-->


<?php
if(isset($_POST['examdate']))
{
$date = $_POST['examdate'];


include('Connections/dbconnection.php'); 


	
	mysqli_select_db($database_local_conn, $local_conn);
	$query22 = mysqli_query("select * from nocpaymentcheck where ExamDate1='".$date."' or ExamDate2='".$date."' ");
	if($query22 > 0)
	{
		$exam_num=mysqli_num_rows($query);
	
		
	}
	
$isAvailable = true;




echo json_encode(array(
    'valid' => $isAvailable,
));
}
?>
