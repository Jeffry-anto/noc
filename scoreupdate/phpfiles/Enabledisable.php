<?php
if( ($_REQUEST["courseid"])&& ($_REQUEST["fieldtype"])&& ($_REQUEST["status"]) ) {

  include('connection/config.php');
    include('connection/opendb.php');
    include('connection/functions.php');
   $courseid = $_REQUEST['courseid'];
   $fieldtype = $_REQUEST['fieldtype'];
   $status = $_REQUEST['status'];

  
   
  
   	        $db_connect = new function_list();
           $db = $db_connect->enabledisable($courseid,$fieldtype,$status);	
            echo $db;
  
  include('connection/closedb.php');
    
  
}

?>