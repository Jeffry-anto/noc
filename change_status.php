<?php
session_start();

?>
<?php 
if(!empty($_SESSION['username']))
{
	
$user = $_SESSION['username'];
  $today = date("Y-m-d");
	
}
else
{
	?>
	<script>
		
		window.location.href="index.php";</script>
	<?php
}

?>


<?php

if(isset($_POST['prop1']))
{
  $posted1 = $_POST['prop1'];
  
$title = "Can we share your contact information with potential employers?";
include('Connections/local_conn.php');
$query = "select * from contact_sharing where Emailid='".$user."' and title='".$title."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysql_error());
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);
  
  if($totalRows_OCCrecordset == '0')
  {
    $insert1 = "insert into contact_sharing values(NULL,'".$user."','".$title."','Y','".$today."')";
    $res = mysqli_query($dbconn,$insert1);
  }
  if($totalRows_OCCrecordset > '0')
  {
    if($posted1 == 'true')
    {
    $update1 = "update contact_sharing set Opted='Y',Last_updated_date='".$today."' where title = '".$title."' and Emailid='".$user."'";
    }
    if($posted1 == 'false')
    {
      $update1 = "update contact_sharing set Opted='N',Last_updated_date='".$today."' where title = '".$title."' and Emailid='".$user."'";
    }
    
     $res = mysqli_query($dbconn,$update1);
    
  }
  
  if($res > 0)
  {
    echo 'Success 1';
  }
  else
  {
    echo 'Failed 1';
  }

  
  mysqli_close($dbconn);
}


if(isset($_POST['prop2']))
{
  $posted2 = $_POST['prop2'];
  
 $title = "Can we share your score information with your college?";
include('Connections/local_conn.php');
$query = "select * from contact_sharing where Emailid='".$user."' and title='".$title."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysql_error());
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);
  
  if($totalRows_OCCrecordset == '0')
  {
    $insert1 = "insert into contact_sharing values(NULL,'".$user."','".$title."','Y','".$today."')";
    $res = mysqli_query($dbconn,$insert1);
  }
  if($totalRows_OCCrecordset > '0')
  {
    if($posted2 == 'true')
    {
    $update1 = "update contact_sharing set Opted='Y',Last_updated_date='".$today."' where title = '".$title."' and Emailid='".$user."'";
    }
    if($posted2 == 'false')
    {
      $update1 = "update contact_sharing set Opted='N',Last_updated_date='".$today."' where title = '".$title."' and Emailid='".$user."'";
    }
    
     $res = mysqli_query($dbconn,$update1);
    
  }
  
  if($res > 0)
  {
    echo 'Success 2';
  }
  else
  {
    echo mysqli_error();
  }

  
  mysqli_close($dbconn);
  
  
  
  
}



if(isset($_POST['propnew1']))
{
  $posted1 = $_POST['propnew1'];
  
 $title = "Can we share your contact information with potential employers?";
include('Connections/local_conn.php');
$query = "select * from contact_sharing where Emailid='".$user."' and title='".$title."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysql_error());
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);
  
  if($totalRows_OCCrecordset == '0')
  {
    echo '0';
  }
  else
  {
    if($fetch['Opted'] == 'Y')
    {
       echo '1';
    }
    else
    {
      echo '0';
    }
  }
  

  
  mysqli_close($dbconn);
  
  
  
  
}


if(isset($_POST['propnew2']))
{
  $posted2 = $_POST['propnew2'];
  
 $title = "Can we share your score information with your college?";
include('Connections/local_conn.php');
$query = "select * from contact_sharing where Emailid='".$user."' and title='".$title."' limit 1 ";
$OCCrecordset = mysqli_query($dbconn,$query) or die(mysql_error());
$fetch = mysqli_fetch_array($OCCrecordset);
$totalRows_OCCrecordset = mysqli_num_rows($OCCrecordset);
  
  if($totalRows_OCCrecordset == '0')
  {
    echo '0';
  }
  else
  {
    if($fetch['Opted'] == 'Y')
    {
       echo '1';
    }
    else
    {
      echo '0';
    }
  }
  

  
  mysqli_close($dbconn);
  
  
  
  
}

?>
