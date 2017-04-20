<?php

$dbconn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Connection Failure to Database");

$conn = mysqli_select_db($dbconn,$dbname) or die ($dbname . " Database not found." . $dbuser);

?>
