<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NOC ADMIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
.control-label {
    height: 40px;
    line-height: 40px;
    margin-bottom: 10px;
    font-size: 17px;
}
textarea#remarks {
  height:100px;
}
</style>
</head>
<body>
<?php 
include('dbconnect.php');
include('datafilter.php');
session_start();
if(isset($_SESSION['noc_loginuser']) && $_SESSION['noc_loginuser'] != '')
{
  $url = "Location: http://nptel.ac.in/noc/admin/home.php";
  header($url);
} else {
    if(isset($_POST['loginuser']))
    {
      $uname = $_POST['loginuser'];
      $pass = $_POST['loginpass'];
	  
	$safe_uname = data_filter($_POST['loginuser'],$dbconn);
	$safe_pass = data_filter($_POST['loginpass'],$dbconn);
	
#	  $safe_uname = mysqli_real_escape_string($dbconn, $_POST['loginuser']);
#	  $safe_pass = mysqli_real_escape_string($dbconn, $_POST['loginpass']);
	  
      $sql = "SELECT * FROM noc_admin WHERE Username = '$safe_uname' AND Password =  '$safe_pass'";
      $query = mysqli_query($dbconn,$sql);
      $result = mysqli_fetch_assoc($query);
      if(sizeof($result) > 1)
      {

        $_SESSION['noc_loginuser'] = $result['Username'];
        $_SESSION['noc_userid'] = $result['userId'];
        $date = date('Y-m-d H:i:s');
        $update_login = mysqli_query($dbconn,"UPDATE noc_admin set last_login_date = '$date'");
        $url = "Location: http://nptel.ac.in/noc/admin/home.php";
        header($url); 
      } else {
        $ermsg = "Sorry, Username and Password mismatch";
      }
    }
}
?>
<div class="login-wrapper">
<div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4 logincontainer">
    <form class="form-signin" method="post" action="">
      <?php if(isset($ermsg)) { ?>
      <div class="alert alert-danger alert-login" role="alert"><?php echo $ermsg; ?></div>
      <?php } ?>
      <h2 class="form-signin-heading">Please Log in</h2>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" name="loginuser" class="form-control logininput" placeholder="Username" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="loginpass" class="form-control logininput" placeholder="Password" required=""><br />
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    </form>
  </div>
  <div class="col-md-4"></div>
</div>
</div>
</body>
</html>
