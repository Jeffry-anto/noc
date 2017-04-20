<?php session_start(); ?>
<?php
if(isset($_SESSION['admin_email']))
{
  header('location:adminpage.php');
}
?>
<?php include('phpfiles/header.php'); ?>


<?php

require('phpfiles/connection/functions.php');


if(isset($_POST['login_btn']))
{
  $email = $_POST['exampleInputEmail1'];
  $passwd = $_POST['exampleInputPassword1'];
  
$db_connect = new function_list();
$db = $db_connect->checkuserlogin($email,$passwd);

if($db == true)
{
  $_SESSION['admin_email'] = $email;
 // header('location:adminpage.php');
 ?>
<script type="text/javascript"> window.location.href="index.php";</script>
 <?php
}
else
{
  $error = 'Invalid Username or Password !!!';
}
    
  
}
?>


<div class="container" id="top_margin">
  
  <div class="row">
  
  <div class="col-md-offset-3 col-md-6">
 <?php if(isset($error)){ ?> <div class="alert alert-danger" role="alert" id="indexalert">
  <span class="glyphicon glyphicon-warning-sign"></span>
  <span class="sr-only">Error:</span><?php echo $error; ?></div><?php }?>
  <div class="panel panel-default" id="indexpanel">
  <div class="panel-body">
  <form name="nocadmin_form" id="nocadmin_form" method="post" action="">
  <div class="input-group input-group-lg">
   <span class="input-group-addon">
    <span class="glyphicon glyphicon-envelope"></span>
  </span>
    <input type="text" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1" placeholder="Email address" required>
  </div>
  <div class="input-group input-group-lg">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-lock"></span>
  </span>
    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password" required>
  </div>
 
  <button type="submit" name="login_btn" class="col-md-offset-3 col-md-4 btn btn-info btn-default">Login</button>
</form>
  
  
  
   
   
    </div><!--end of panel body-->
  </div><!--end of panel-->
  </div><!--end of col-md-offset-3-->
  
  </div><!--end of row-->
  
</div><!--end of container-->


<?php include('phpfiles/footer.php'); ?>
  
