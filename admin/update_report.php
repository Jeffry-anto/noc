<?php
include('dbconnect.php');
session_start();
mysqli_select_db('NOC_db');
if(isset($_POST['remarks']))
{
	$rm = $_POST['remarks'];
	$st = $_POST['status'];
	$id = $_POST['id'];
	$user = $_SESSION['noc_loginuser'];
	$date = date('Y:m:d h:i:s');
	$sql = "UPDATE `issue_reporting` SET `status`='$st',`remarks`='$rm',`changes_made_by`='$user',`responded_date` = '$date' WHERE `issue_id`= $id";
	$res = mysqli_query($dbconn,$sql);
	header("Location:http://nptel.ac.in/noc/admin/");
}
?>
