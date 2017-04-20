<?php
    session_start();
   
	session_destroy();
    header("location:certif_login.php");
?>