<?php
$hostname = 'localhost';
$username = '';
$pass = '';
// $username = 'root';
// $pass = 'ZDcwZGUyMmRlNzAzYmY3ODlhODU5Njg3';
$dbconn = mysqli_connect($hostname,$username,$pass);
if(!$dbconn)
{
	echo "Connection Error";
} else {
	mysqli_select_db($dbconn,'NOC_db');
}
?>
