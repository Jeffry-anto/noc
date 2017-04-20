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
.link-label {
  cursor: pointer!important;
}
.link-label:hover {
  text-decoration: none;
  font-weight: bold;
}
.openlink {
  text-decoration: none!important;
}
textarea#remarks {
  height:100px;
}
</style>
</head>
<body>
<!---nav bar section -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="http://nptel.ac.in/noc/admin">NOC ADMIN</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php"><b>Home</b></a></li>
          <?php session_start();
/*          $uname = $_SESSION['noc_loginuser'];
          if($uname == 'bharathi')
          {
            echo "<li><a href='./allocate_reports.php'><b>Allocate Issues</b></a></li>";
          } else {
            echo "<li><a href='./my_issues.php'><b>My Issues</b></a></li>";
          }*/
          ?>
          <li><a href='./my_issues.php'><b>My Issues</b></a></li>
          <li><a href="./all_reports.php"><b>All Reports</b></a></li>
        <li><a href="./closed_reports.php"><b>Closed Reports</b></a></li>
        <li><a href="./logout.php"><b>Logout</b></a></li>
      </ul>
      </div>
    </div>
</nav> 
   <!--end of navbar section-->