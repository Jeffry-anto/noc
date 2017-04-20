<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOC Payment Receipt</title>
	<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/formValidation.css"/>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!----bootstrap css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css">
<script type="text/javascript" src="js/formValidation.js"></script>
<script type="text/javascript" src="js/framework/bootstrap.js"></script>	
<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="resources/demo.css">
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="resources/demo.js"> </script>
<style>
	body
	{
		font-size:14px;
	}
#coursename
    {
		
      box-shadow:0px 0px 5px rgba(210,210,210,210);
      display:block;
    }
    .receipt-container {
    	border:1px solid #C13332;
    	padding: 0;
    }
    .list-groupp {
    	padding: 30px;
    }
/*    #print {
    	display: none;
    }
    .receipt-container:hover + #print {
    	display: block;
    }*/
</style>
</head>
<body>
		<?php if(isset($_GET['uid'])) 
		{
			$uid = $_GET['uid'];
			$tl = urldecode($_GET['tl']);
			$conn = mysqli_connect('localhost','devopts','bQ8JdWxzwNdFNdt#Ok5XV');
			mysqli_select_db($conn,'NOC_db');
			$sql = "SELECT * FROM nocpaymentcheck where	EmailId = '$uid' AND Status_period = '$tl' AND 	TCSPaymentStatus = 'S'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row))
			{
				$appnum = $row['ApplicationNumber'];
				if(strlen($appnum) == 0)
				{
					echo '<div class="container"><div class="alert alert-danger" role="alert">Sorry! Your payment receipt expired.</div></div>';exit;
				}
				$name = $row['Name'];
				$course1 = $row['Course1'];
				$course2 = $row['Course2'];
				$dt1 = $row['ExamDate1'];
				$dt2 = $row['ExamDate2'];
				$city1 = $row['City1'];
				$city2 = $row['City2'];
				$paydate = substr($row['TCS_transaction_date'],0,10);
				$amount = $row['PaymentAmount'];
/*				$amtsql = mysqli_query("SELECT paymentamount FROM NOCPayment.noctransaction_table where ApplicationNumber = '$appnum'");
				$amtrow = mysqli_fetch_assoc($amtsql);
				$amount = $amtrow['paymentamount'];*/
		if(isset($amount)) { ?>
		<div class="container">
		<div style="margin-top:50px;"></div>
		<button type="submit" name="print" id="print" class="btn btn-success" style="float:right">PRINT</button>
		<div class="col-md-12 receipt-container" id="receipt-container">
			<div class="recp-image"><img src="../images/banner.jpg" style="width:100%"></div>
			<div class="list-groupp" styele="margin-top:10px;">
			  <!-- <div class="list-group-itemm"><b>Name : </b><?php echo $name;?></div><br>
			  	<div class="list-group-itemm"> -->
			  	<?php if(strlen($course2) > 0) { ?>
				<div class="receiptcontent">
					<h4><center><b>National Programme on Technology Enhanced Learning (NPTEL)</b></center></h4><br>
					<center><b>Receipt for successful payment of fees for online courses conducted by NPTEL<br>Course Run: Jan to March, 2016</b></center><br><br>
					<div>&nbsp;&nbsp;Name of candidate :  <b><?php echo $name;?></b></div><br>
					<div>&nbsp;&nbsp;No.of courses taken :  <b>2</b></div><br>
					<div>&nbsp;&nbsp;Courses name : <b><?php echo $course1," & ".$course2;?></b></div><br>
					<div>&nbsp;&nbsp;Date of exam : <b><?php echo $dt1," & ".$dt2;?></b></div><br>
					<div>&nbsp;&nbsp;City of exam : <b><?php if($city1 == $city2) echo $city1; else echo $city1," & ".$city2;?></b></div><br>
					<div>&nbsp;&nbsp;Date of payment : <b><?php echo $paydate;?></b></div><br>
					<div>&nbsp;&nbsp;Amount paid : <b>Rs.<?php echo $amount;?></b></div><br><br><br>

					<i>&nbsp;&nbsp;We hereby acknowledge with thanks, the receipt of <b>Rs.<?php echo $amount;?></b> from the afore-mentioned candidate towards payment for NPTEL Online Certification Exam, details of which are shown above.</i><br></br>
					
				</div>
			  	<?php } else { ?>
				<div class="receiptcontent">
					<h4><center><b>National Programme on Technology Enhanced Learning (NPTEL)</b></center></h4><br>
					<center><b>Receipt for successful payment of fees for online courses conducted by NPTEL<br>Course Run: Jan to March, 2016</b></center><br><br>
					<div>&nbsp;&nbsp;Name of candidate :  <b><?php echo $name;?></b></div><br>
					<div>&nbsp;&nbsp;Course name : <b><?php echo $course1;?></b></div><br>
					<div>&nbsp;&nbsp;Date of exam : <b><?php echo $dt1;?></b></div><br>
					<div>&nbsp;&nbsp;City of exam : <b><?php echo $city1;?></b></div><br>
					<div>&nbsp;&nbsp;Date of payment : <b><?php echo $paydate;?></b></div><br>
					<div>&nbsp;&nbsp;Amount paid : <b>Rs.<?php echo $amount;?></b></div><br><br><br>

					<i>We hereby acknowledge with thanks, the receipt of <b>Rs.<?php echo $amount;?></b> from the afore-mentioned candidate towards payment for NPTEL Online Certification Exam, details of which are shown above.</i><br></br>
					
				</div>
			  	<?php } ?>
				<div class="recp-sign" style="float:right">
					Authority Signature<br>
					<img src="../images/sign.png" style="width:200px;height:100px;">
				</div>
			</div>
		</div>
		<?php } else {
					echo '<div class="container"><div class="alert alert-danger" role="alert">Sorry! Your payment receipt expired.</div></div>';
				}
			} else {
				echo '<div class="alert alert-danger" role="alert">Sorry! Your payment receipt expired</div>';
			}
		} else if($_GET['app']){
			
		} else { 
			header("Location:http://nptel.ac.in/noc/candidatelogin.php");
		 } ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#print').click(function(){
           var divToPrint = document.getElementById('receipt-container');
           var popupWin = window.open('', '_blank', 'width=900,height=900');
           popupWin.document.open();
           popupWin.document.write('<html><head><title>NPTEL RECEIPT</title><style>#receipt-container{border:1px solid #C13332;}.list-groupp {padding: 30px;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();

	})
});
</script>
	</body>
</html>
