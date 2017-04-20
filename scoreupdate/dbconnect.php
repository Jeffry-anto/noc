<?php
$hostname = 'localhost';
$username = 'root';
$pass = 'ZDcwZGUyMmRlNzAzYmY3ODlhODU5Njg3';

$dbconn = mysqli_connect($hostname,$username,$pass);
if(!$dbconn)
{
	echo "Connection Error";
} else {
	$connection=mysqli_select_db($dbconn,'NOC_db');
}

 // $dbhost = 'localhost';
 //   $dbuser = 'root';
 //   $dbpass = '';
 //   $dbname = 'NOC_db';
 //   $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
 //   if(! $conn )
 //   {
 //     die('Could not connect: ' . mysql_error());
 //   }
 //   echo 'Connected successfully';
 //   mysql_close($conn);
?>
