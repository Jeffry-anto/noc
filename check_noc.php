<?php session_start(); ?>
<?php
require_once('Connections/local_conn.php');

if(isset($_POST['emailid']))
{
	$mainvalue=$_POST['emailid'];
}



mysqli_select_db($database_local_conn, $local_conn);
$query_OCCrecordset = "SELECT * FROM noc_testscores WHERE Emailid = '".$mainvalue."'";
$OCCrecordset = mysqli_query($query_OCCrecordset, $local_conn) or die(mysql_error());
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);

while($row = mysqli_fetch_array($OCCrecordset))
{

	
	

	if($totalRows_OCCrecordset > 0)
	{
		$_SESSION['nocstudent'] =  $row['EmailId'];
		echo $totalRows_OCCrecordset;
	}
	else
	{
		echo $totalRows_OCCrecordset;
	}
}

?>
