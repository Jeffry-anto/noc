<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_local_conn = "localhost";
$database_local_conn = "NOC_db";
$username_local_conn = "nocwebpage";
$password_local_conn = "nocnptel@iitm";
$dbconn = mysqli_connect($hostname_local_conn, $username_local_conn, $password_local_conn) or trigger_error(mysqli_error($dbconn),E_USER_ERROR); 
$local_conn = mysqli_select_db($dbconn,$database_local_conn);
?>
