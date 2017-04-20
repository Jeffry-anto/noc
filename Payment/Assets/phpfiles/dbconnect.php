<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'nptelp2');
define('DB_NAME', 'NOC_db');

class DB_con
{
 function __construct()
 {
  $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysqli_error($conn));
  mysqli_select_db(DB_NAME, $conn);
 }
 

}

?>
