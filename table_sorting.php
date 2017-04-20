<?php require_once('Connections/dbconnection.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  //$_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
 // unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "main.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "main.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	

	<title>NOC Certificates admin module</title>
	<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="resources/demo.css">
    <link rel="stylesheet"  href="css/php_checkbox.css" />
    
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
    
  <script>
function SubmitForm() {
var status = $("#statusdat").val();


var courseid = $("#course").val();
var roll = $("#rrl").val();
//alert(roll);
//alert("Data Loaded: "+name+"\n"+courseid+"\n"+roll+"\nAll Data Submitted Sucessfully!");
$.post("DELETE.php", { status: status, courseid: courseid, roll: roll },
   function(data) {
    //alert("Data Loaded: " + data);
	window.location.reload();
   });
}
</script>
    

    
	<script type="text/javascript" language="javascript" class="init">
	
	
	
	
	
	

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
	} );
} );

	</script>
    
    <style>
	
	
.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 10px 0px;
padding:15px 10px 15px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('info.png');
}
.success {
	text-align:center;
	font-weight:bold;
	font-size:16px;
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
}
.warning {
	text-align:center;
	font-weight:bold;
	font-size:16px;
color: #9F6000;
background-color: #FEEFB3;
background-image: url('warning.png');
}
.error {
	text-align:center;
	font-weight:bold;
	font-size:16px;
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
}
#display
{
	border:2px solid #515151;
	padding:15px 15px;
	background-color:#E8E8FF;
	font-family:Verdana, Geneva, sans-serif;
	font-size:18px;
	font-weight:bold;
}
#welcome
{
	float:left;
	font-weight:bold;
	font-size:18px;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	padding-left:10px;
}
	</style>
</head>

<body class="dt-example">
	<br />
    <div><p style="float:left; padding-left:10px;">User Login: <?php $userloginname=$_SESSION['MM_Username'];
	
	if($userloginname == 'anu@!@#')
	{
		echo "Anushree";
	}
	if($userloginname == 'nptel@123')
	{
		echo "NPTEL";
	}
	
	 ?></p>
<p style="float:right; padding-right:15px;"><a href="<?php echo $logoutAction ?>">Logout</a></p></div>
    	<br />
        <?php


 require_once('Connections/local_conn.php'); 
 
 mysqli_select_db($database_local_conn, $local_conn);
$sql=mysqli_query("select count(*)  as disp from occ_certificate_tracking where Certificate_status='DISPATCHED' and Eligibilty='ELIGIBLE' ");

while($row=mysqli_fetch_array($sql))

{
	$disp=$row['disp'];
}
 mysqli_select_db($database_local_conn, $local_conn);
$sql1=mysqli_query("select count(*)  as nr from occ_certificate_tracking where Certificate_status='NOT RECEIVED' and Eligibilty='ELIGIBLE' ");

while($row1=mysqli_fetch_array($sql1))

{
	$not_rec=$row1['nr'];
}
 mysqli_select_db($database_local_conn, $local_conn);
$sql3=mysqli_query("select count(*)  as rep from occ_certificate_tracking where Certificate_status='REPRINT' and Eligibilty='ELIGIBLE' ");

while($row3=mysqli_fetch_array($sql3))

{
	$rep=$row3['rep'];
}
 mysqli_select_db($database_local_conn, $local_conn);
$sql4=mysqli_query("select count(*)  as repo from occ_certificate_tracking where Certificate_status='REPOST' and Eligibilty='ELIGIBLE' ");

while($row4=mysqli_fetch_array($sql4))

{
	$repo=$row4['repo'];
}
 mysqli_select_db($database_local_conn, $local_conn);
$sql6=mysqli_query("select count(DISTINCT RollNumber)  as eligible from occ_certificate_tracking where Eligibilty='ELIGIBLE' ");

while($row6=mysqli_fetch_array($sql6))

{
	$eligible=$row6['eligible'];
}
 mysqli_select_db($database_local_conn, $local_conn);
$sql7=mysqli_query("select count(DISTINCT RollNumber)  as nteligible from occ_certificate_tracking where Eligibilty='NOT ELIGIBLE' ");

while($row7=mysqli_fetch_array($sql7))

{
	$nteligible=$row7['nteligible'];
}
?>




<br />
<br />
<div id="display">
<table width="250" cellpadding="5" align="center"
>

<tr>
    <td>Eligible</td>
    <td><?php echo $eligible;  ?></td>
  </tr>
  
  <tr>
    <td>Not Eligible</td>
    <td><?php echo $nteligible;  ?></td>
  </tr>
  
  <tr>
    <td>Dispatched</td>
    <td><?php echo $disp;  ?></td>
  </tr>
  <tr>
    <td>Not Received</td>
    <td><?php echo $not_rec;  ?></td>
  </tr>
  <tr>
    <td>Reprint</td>
    <td><?php echo $rep;  ?></td>
  </tr>
  <tr>
    <td>Repost</td>
    <td><?php echo $repo;  ?></td>
  </tr>
  
</table>

</div>




        	<br />
            
  <?php 
  if($userloginname == 'anu@!@#')
  {
  ?>          
<form action="" method="post">
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>RollNumber</th>
						
						
						<th>Status Date</th>
                        <th>Not Received</th>
                          <th>Reprint</th>
                            <th>Repost</th>
                            <th>Final</th>
                            <th>Delete</th>
                     
						
					</tr>
				</thead>

				<?php
				
 require_once('Connections/local_conn.php'); 
				 mysqli_select_db($database_local_conn, $local_conn);
				 $sql=mysqli_query("select occ_CourseId,RollNumber,MAX(status_date) AS mxdate,Certificate_status,Eligibilty from occ_certificate_tracking where Eligibilty = 'ELIGIBLE'   GROUP BY RollNumber order by MAX(status_date) DESC");

?>


				<tbody>
                
                <?php
				
 while($row=mysqli_fetch_array($sql))
	{
		$occ_CourseId=$row['occ_CourseId'];
		$rollnumber=$row['RollNumber'];
		$status=$row['mxdate'];
		$eligible=$row['Eligibilty'];
		
		
		$cert_status=$row['Certificate_status'];
		
		?>
					<tr>
                    
                    
						<td><?php echo $rollnumber; ?> <input type="hidden" name="rollno" id="rollno" value="<?php echo $rollnumber; ?>"></td>
						
						
						<td><?php echo $status; ?> <input type="hidden" name="status" id="status" value="<?php echo $status; ?>"><input type="hidden" name="occid" id="occid" value="<?php echo $occ_CourseId; ?>"> </td>
                        
                        <?php
						 mysqli_select_db($database_local_conn, $local_conn);
						$fff1=mysqli_query("select Certificate_status as res from occ_certificate_tracking where RollNumber='".$rollnumber."' and Certificate_status='NOT RECEIVED' and Eligibilty = 'ELIGIBLE'");
						$ttt=mysqli_fetch_array($fff1);
						?>
                        <td><?php if($ttt['res'] == 'NOT RECEIVED'){ echo '<img src="images/Alert-Icon-.png" width="20" height="15">';  } else { echo '<input name="check_list[]" type="checkbox" value="'.$rollnumber.'-notreceive'. '" style="cursor:pointer; " >'; } ?></td>
                        
                          <?php
						   mysqli_select_db($database_local_conn, $local_conn);
						$fff2=mysqli_query("select Certificate_status as res2 from occ_certificate_tracking where RollNumber='".$rollnumber."' and Certificate_status='REPRINT' and Eligibilty = 'ELIGIBLE'");
						$ttt2=mysqli_fetch_array($fff2);
						?>
                        
                        
                        <td><?php if($ttt2['res2'] == 'REPRINT'){ echo '<img src="images/12.png" width="30" height="25">';  } else { echo '<input name="check_list[]" type="checkbox" value="'.$rollnumber.'-reprint'. '" style="cursor:pointer;" >'; } ?></td>
                        
                        
                         <?php
						  mysqli_select_db($database_local_conn, $local_conn);
						$fff3=mysqli_query("select Certificate_status as res3 from occ_certificate_tracking where RollNumber='".$rollnumber."' and Certificate_status='REPOST' and Eligibilty = 'ELIGIBLE'");
						$ttt3=mysqli_fetch_array($fff3);
						?>
                        
                         <td><?php if($ttt3['res3'] == 'REPOST'){ echo '<img src="images/12.png" width="30" height="25">';  } else { echo '<input name="check_list[]" type="checkbox" value="'.$rollnumber.'-repost'. '" style="cursor:pointer;">'; } ?></td>
                       
                       
                       
                       <td><?php 
	  mysqli_select_db($database_local_conn, $local_conn);
	 $sql123=mysqli_query("select COUNT(Certificate_status) AS CCD from occ_certificate_tracking where RollNumber='".$rollnumber."' ");
	 
	 while($rr=mysqli_fetch_array($sql123))
	 if(($rr['CCD'] == '4')||($rr['CCD'] == '1'))
	 {
		 echo "Complete";
	 }
	 else
	 {
		 echo "InComplete";
	 }
	 
	  ?></td>
                       
                       
                       
                       <td><form action="DELETE.php" method="post"> <input type="hidden" name="course" id="course" value="<?php echo $occ_CourseId; ?>" >
                       <input type="hidden" name="rrl" id="rrl" value="<?php echo $rollnumber; ?> ">
                       
                       <input type="hidden" name="statusdat" id="statusdat" value="<?php echo $status; ?> ">
                       
                       <input type="image" id="searchForm" onclick="SubmitForm();" src="images/DeleteRed.png" width="30" height="25"/> </form></td>
						
					</tr>
					<?php
	}
					?>
				</tbody>
                 
			</table>

			<input type="submit" name="submit" id="submit" value="update">
                
               
                </form>
            <br />
                        <br />
           <?php
		   
 require_once('Connections/local_conn.php'); 
		   
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);

$courseid = $_POST['occid'];

//echo "You have Inserted following ".$checked_count." row <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {


$str=explode('-',$selected);

if($str[1] == 'notreceive')
{
 mysqli_select_db($database_local_conn, $local_conn);
$try123=mysqli_query("select count(Certificate_status) as not_rec from occ_certificate_tracking where Certificate_status='NOT RECEIVED' and RollNumber='".$str[0]."' and Eligibilty='ELIGIBLE' ");
while($try1=mysqli_fetch_array($try123))
{
	$nnn=$try1['not_rec'];
	//echo $nnn;
	
	
}
//echo '<p>'.$courseid.''.$str[0].''.$str[1].'</p>';
if($nnn < 1)
{
	 mysqli_select_db($database_local_conn, $local_conn);
$query=mysqli_query("INSERT INTO `occ_certificate_tracking` (`occ_CourseId`, `RollNumber`, `Certificate_status`, `status_date`, `Eligibilty`) VALUES('".$courseid."', '".$str[0]."', 'NOT RECEIVED', NOW(), 'ELIGIBLE')");
}
else
{
	$query = 0;
	?>
    <script>alert('You have already inserted not received to this Id');</script>
    <?php
}

}

else if($str[1] == 'reprint')
{

//echo '<p>'.$courseid.''.$str[0].''.$str[1].'</p>';
 mysqli_select_db($database_local_conn, $local_conn);
$try1234=mysqli_query("select count(Certificate_status) as rep from occ_certificate_tracking where Certificate_status='REPRINT' and RollNumber='".$str[0]."' and Eligibilty='ELIGIBLE' ");
while($try123=mysqli_fetch_array($try1234))
{
	$nnn2=$try123['rep'];
	
	
}
//echo '<p>'.$courseid.''.$str[0].''.$str[1].'</p>';
if($nnn2 < 1)
{
 mysqli_select_db($database_local_conn, $local_conn);
$query=mysqli_query("INSERT INTO `occ_certificate_tracking` (`occ_CourseId`, `RollNumber`, `Certificate_status`, `status_date`, `Eligibilty`) VALUES('".$courseid."', '".$str[0]."', 'REPRINT', NOW(), 'ELIGIBLE')");
}
else
{
	$query = 0;
	?>
    <script>alert('You have already inserted Reprint to this Id');</script>
    <?php
}

}

else if($str[1] == 'repost')
{
 mysqli_select_db($database_local_conn, $local_conn);
$try12345=mysqli_query("select count(Certificate_status) as repo from occ_certificate_tracking where Certificate_status='REPOST' and RollNumber='".$str[0]."' and Eligibilty='ELIGIBLE'");
while($try1234=mysqli_fetch_array($try12345))
{
	$nnn3=$try1234['repo'];
	
	
}
//echo '<p>'.$courseid.''.$str[0].''.$str[1].'</p>';
if($nnn3 < 1)
{
//echo '<p>'.$courseid.''.$str[0].''.$str[1].'</p>';
 mysqli_select_db($database_local_conn, $local_conn);
$query=mysqli_query("INSERT INTO `occ_certificate_tracking` (`occ_CourseId`, `RollNumber`, `Certificate_status`, `status_date`, `Eligibilty`) VALUES('".$courseid."', '".$str[0]."', 'REPOST', NOW(), 'ELIGIBLE')");

}

else
{
	$query = 0;
	?>
    <script>alert('You have already inserted Repost to this Id');</script>
    <?php
	
}

}

if($query > 0)
{
	echo '<div class="success">Successful Inserted. Refresh the page.</div>';
	
}
else
{

echo '<div class="error">Failed to Insert. Refresh the page.</div>';
}

}

}
else{
echo '<div class="error">Please Select Atleast One Option to update. Refresh the page.</div>';
}


    


}
?>

		<?php
  }
		?>
	
</body>
</html>
