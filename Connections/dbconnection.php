<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_local_conn = "127.0.0.1";
$database_local_conn = "NOC_db";
$username_local_conn = "nocwebpage";
$password_local_conn = "nocnptel@iitm";

$dbconn = getDBconnection();
function getDBconnection()
{
	if(isset($dbconn) && $dbconn !=0)
	{
		return $dbconn;
	} else {
		$dbconn = mysqli_connect("localhost", "nocwebpage", "nocnptel@iitm","NOC_db") or trigger_error(mysqli_error($dbconn),E_USER_ERROR);
		if($dbconn)
		{
			return $dbconn;
		} else {
			return "Error".mysqli_error($dbconn);
		}
	}
}
?>
