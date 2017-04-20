<?php 
if(session_id() == '') {
session_start();
}
if(!session_id())
{
 
  header("Location:http://nptel.ac.in/noc/Payment/");
}


include_once("Assets/phpfiles/function.php"); ?>
<?php
$msg="";
echo "<br><br><br>";
echo "<center><strong>Just a moment...! You are being redirected to application site.</strong></center><br>";
echo "<center>[Please do not close/refresh this window]</center>";

if($_POST['msg']){
   $msg = $_POST['msg'];
    $msgdata = explode("|", $msg);
/*    for($i = 0; $i < count($msgdata); $i++){
	echo $i." :: ".$msgdata[$i]."<br>";
    }
*/

$applicationnumber = $msgdata[1];
$paymentrefid = $msgdata[2];
$paymentdate =  date('Y-m-d h:m:s',strtotime($msgdata[13]));
$paymentamount =  $msgdata[4];
$applicationpdate = strtotime("now");
$applicationpaymentreturncode =  $msgdata[14];
$applicationpaymenttoken = $msgdata[16];
$paymenttype = $msgdata[22];
$applicationpaymentremarks = $msgdata[24];
$responsechecksum = $msgdata[25];
$msg_without_Checksum = substr($msg,0,strpos($msg, $responsechecksum));
$common_string="ucmzUBAnW83W";
$string_new=$msg_without_Checksum.$common_string;
$checksum = crc32($string_new);
 
  $finalcheck = new select_reg_open();
  $finalcheck_query = $finalcheck->checkapp($applicationnumber);

    if($finalcheck_query == '1'){
	if ($applicationpaymentreturncode == '0300'){
		$paymentstatus = '1';
	}else{
		$paymentstatus = '0';
	} 
    $random = rand();
    $transactionkey = md5($applicationnumber.$applicationpdate.$random);
      
  $checksumvalidate = new select_reg_open();
  $checksumvalidate_query = $finalcheck->checksumvalidate($applicationpaymenttoken,$checksum);
      
     if ( ($checksumvalidate_query == '1') && ($responsechecksum == $checksum)){
   
       
      $newsql = array('TxnAmount' => $paymentamount, 'applicationpaymenttoken' => $transactionkey, 'applicationpaymentreturncode' => $applicationpaymentreturncode, 'applicationpaymentremarks' => $applicationpaymentremarks, 'applicationpaymentstatus' => $paymentstatus, 'paymentdate' => $paymentdate, 'paymentamount' => $paymentamount, 'paymentrefid' => $paymentrefid, 'paymenttype' => $paymenttype, 'checksumvalue' => $responsechecksum);
       
     }else{
        
       
  $newsql = array('TxnAmount' => $paymentamount, 'applicationpaymenttoken' => $transactionkey, 'applicationpaymentreturncode' => $applicationpaymentreturncode, 'applicationpaymentremarks' => 'Token Mismatch', 'applicationpaymentstatus' => '-1', 'paymentdate' => $paymentdate, 'paymentamount' => $paymentamount, 'paymentrefid' => $paymentrefid, 'paymenttype' => $paymenttype,'checksumvalue' => $responsechecksum);
       
     }  
    $checksumvalidate = new select_reg_open();
    $checksumvalidate_query = $finalcheck->update('noctransaction_table',$applicationnumber,$newsql);
	
	if($paymentstatus == '1')
	{
           echo "<html><head>";
    echo "<script>window.history.forward(0);";
    echo "function gosubmit(){";
    echo "document.frm.submit();";
    echo "}";
    echo "</script></head>";
    echo "<body onload=\"gosubmit()\"><form name=\"frm\" method=post action=\"http://nptel.ac.in/noc/Payment/nocpayment_result.php\">";
    echo "<input type=\"hidden\" value=\"".$transactionkey."\" name=\"applicationpaymenttoken\">";
    echo "<input type=\"hidden\" value=\"".$applicationnumber."\" name=\"applicationnumber\">";
    echo "</form></body></html>";
 
	}
	else{
            
        echo "<html><head>";
    echo "<script>window.history.forward(0);";
    echo "function gosubmit(){";
    echo "document.frm.submit();";
    echo "}";
    echo "</script></head>";
    echo "<body onload=\"gosubmit()\"><form name=\"frm\" method=post action=\"http://nptel.ac.in/noc/Payment/nocpayment_result.php\">";
    echo "<input type=\"hidden\" value=\"".$transactionkey."\" name=\"applicationpaymenttoken\">";
    echo "<input type=\"hidden\" value=\"".$applicationnumber."\" name=\"applicationnumber\">";
    echo "</form></body></html>";
	
	/*$redir1="Location: http://nptel.ac.in/noc/NOC_Registration/error.php";
          header($redir1);
          exit;*/
      
      ?>
<!--<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/NOC_Registration/error.php";</script>-->
<?php
      
	
	}
	
	
    }else{
       
      ?>
<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/Payment/";</script>
<?php
    }
	
    }else{
          
  ?>
<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/Payment/";</script>
<?php
   }
?>
