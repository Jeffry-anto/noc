<?php
session_start();
require('Connections/dbconnection.php');
?>
<?php 

if(!empty($_SESSION['username']))
{
	
$user = $_SESSION['username'];

	
}
else
{
	$user='';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NOC Home Page</title>

</head>

   <!---jquery-->
<!-- <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <script src="js/jquery-ui.js"></script> -->
<?php
	$query2=mysqli_query($dbconn,"select NOCCourseName,NOCPeriod from noc_course order by NOCCourseName");
	echo "After query";
?>
<body>

</body>
</html>
