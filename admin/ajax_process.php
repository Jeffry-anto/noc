<?php
include('dbconnect.php');
if(isset($_POST['allocatename']))
{
	if($_POST['allocatename'] == '')
	{
		$uid = 'N';
	} else {
		$uid = $_POST['allocatename'];
	}
	$iid = $_POST['isid'];
	$upsql = "UPDATE `issue_reporting` SET `allocation_status`='$uid' WHERE `issue_id` = '$iid'";
	$uprow = mysqli_query($dbconn,$upsql);
	if($uprow > 0)
	{
		$selres = mysqli_query($dbconn,"SELECT Username from noc_admin where userId = '$uid'");
		$selrow = mysqli_fetch_assoc($selres);
		$dt['result'] = $selrow['Username'];
	} else {
		$dt['result'] = "error";
	}
	echo json_encode($dt);
}
?>
