<?php
if( $_REQUEST["name"] ) {

  include('connection/config.php');
    include('connection/opendb.php');
    include('connection/functions.php');
   $name = $_REQUEST['name'];
   
  
   	        $db_connect = new function_list();
           $db = $db_connect->getcourselist($name);	
  if($db != false)
  {
            echo json_encode($db);
  }
  
  include('connection/closedb.php');
    
  
}

?>