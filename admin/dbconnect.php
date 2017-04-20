<?php 
$hostname_local_conn = "localhost";
$database_local_conn = "NOC_db";
$username_local_conn = "nocwebpage";
$password_local_conn = "nocnptel@iitm";
$dbconn = mysqli_connect($hostname_local_conn, $username_local_conn, $password_local_conn,'NOC_db') or trigger_error(mysql_error(),E_USER_ERROR);
?>
