<?php
session_start();
$_SESSION['noc_loginuser'] = '';
$_SESSION['noc_userid'] = '';
session_destroy();
header('Location:http://nptel.ac.in/noc/admin');
?>