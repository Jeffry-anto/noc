<?php
if(session_id() == '') {
    session_start();
}

if(!session_id())
{
 
  header("Location:http://nptel.ac.in/noc/Payment/");
}
else
{
  //echo $_SESSION['id'];


include_once("Assets/phpfiles/function.php"); ?>
<?php
if(isset($_POST['register']))
{
	
	

	
	
	//mysqli_real_escape_string
$name = $_POST['applicant_name'];
$dobirth = $_POST['dob'];
$dob = date('Y-m-d',strtotime($dobirth));
$gender = $_POST['gender'];
$mobno = $_POST['mobno'];
$altmbno = $_POST['altermobno'];

$disability = $_POST['disablity'];
$disability_reason = $_POST['disablity_reason'];
$isscst = $_POST['isscst'];
$isscst_file = stripslashes($_FILES['scstfile']['name']);
	
	
	
	$role = $_POST['role'];
	if($role == 'Student')
	{
		$role_college_name = $_POST['role_college_name'];
		$other_role ='';
	}
	if($role == 'Faculty')
	{
		$role_college_name = $_POST['faculty_organization'];
		$other_role = '';
	}
	if($role == 'Others')
	{
		$role_college_name = $_POST['role_organization'];
		$other_role = $_POST['other_role'];
	}




$role_state = $_POST['role_state'];
$role_city = $_POST['role_city'];
	
	if($role_city == 'Others')
	{
		$role_city_others = $_POST['role_otherscity'];
	}
	else
	{
		$role_city_others ='';
	}
$cert_addr1 = $_POST['certificate_addr1'];
$cert_addr2 = $_POST['certificate_addr2'];
$cert_addr3 = $_POST['certificate_addr3'];
$cert_state = $_POST['certificate_state'];
$cert_city = $_POST['certificate_city'];
	
	if($cert_city == 'Others')
	{
		$cert_city_others =$_POST['certificate_othercityname'];
	}
	else
	{
		$cert_city_others='';
	}
	
$cert_pin = $_POST['certificate_pincode'];
$email = trim($_POST['emailid']);
	

	
$examdt1 = $_POST['examdate1'];

$subject1 = $_POST['subject1'];
$state1 = $_POST['state1'];
$city1 = $_POST['city1'];
$second_state1 = $_POST['second_state1'];
$second_city1 = $_POST['second_city1'];



			$total_row = new select_reg_open();
	$count = $total_row->countdetails();
	if($count == 0)
	{
		$startup = "STSEP15";
		$appno ="STNOV15100001";
	}
	else
	{
	
		$lid = new select_reg_open();
		$lastid = $lid->lastinsertid();
		
		while($id = mysqli_fetch_array($lastid))
		{
			$oldid = $id['Application_number'];
			
		}
		
		$startup ="STNOV15";
		$newfirstvalueid = substr($oldid,7,13);
		$value = $newfirstvalueid + 1;
		
		$appno = $startup.$value;
		
	}
	
	
	if($isscst == 'Y')
	{
		$scstfile_tmp=$_FILES['scstfile']['tmp_name'];
		
		$scstfile_filepath = '/nptel_data1/mhrd/noc/Payment/Assets/candidate_files/scstfile/Jul-Sep 2015/';
		
		$scstfileextension = pathinfo($isscst_file, PATHINFO_EXTENSION);
 		$scstfileextension = strtolower($scstfileextension);
		
		$scstfile_filename = $appno.'_scstpdf.'.$scstfileextension;
		
		$scstfile_upload = move_uploaded_file($scstfile_tmp,$scstfile_filepath.$scstfile_filename);
	}
		
		
		
		
	
	

$photo = stripslashes($_FILES['photo']['name']);
$signature = stripslashes($_FILES['signature']['name']);


	if(($photo != '')&&($signature != ''))
	{
		
		$photo_tmp=$_FILES['photo']['tmp_name'];
		$signature_tmp=$_FILES['signature']['tmp_name'];
		
		$photo_filepath = '/nptel_data1/mhrd/noc/Payment/Assets/candidate_files/photos/Jul-Sep 2015/';
		$signature_filepath = '/nptel_data1/mhrd/noc/Payment/Assets/candidate_files/signature/Jul-Sep 2015/';
		
		$pextension = pathinfo($photo, PATHINFO_EXTENSION);
 		$photoextension = strtolower($pextension);
		
		$sextension = pathinfo($signature, PATHINFO_EXTENSION);
 		$signatureextension = strtolower($sextension);
		
		$photo_filename = $appno.'_photo.'.$photoextension;
		$signature_filename = $appno.'_signature.'.$signatureextension;
		
		$photo_upload = move_uploaded_file($photo_tmp,$photo_filepath.$photo_filename);
		$signature_upload = move_uploaded_file($signature_tmp,$signature_filepath.$signature_filename);
		
		
		
		
	}
	
	
	
$know_abt_course = $_POST['know_abt_course'];
	
	if($know_abt_course == 'Others')
	{
		$know_others = $_POST['know_abt_course_others'];
	}
	else
	{
		$know_others = '';
	}
$dt = new DateTime();
$time = $dt->format('Y-m-d H:i:s');
	
	
$checkfor2exam = $_POST['checkfor2exam'];
	if($checkfor2exam == 'Y')
	{
		$capplied =2;
		
		$check2course = new select_reg_open();
		$select_amt2 = $check2course->course2amount($subject1,$subject2);
		
		while($coursetwo = mysqli_fetch_array($select_amt2))
		{
			$amount = $coursetwo['total'];
			
			if($isscst == 'Y')
			{
				$total_amount = $amount/2 ;
			}
			if($isscst == 'N')
			{
				$total_amount = $amount ;
			}
		}
		
$subject2 = $_POST['subject2'];
$state2 = $_POST['state2'];
$city2 = $_POST['city2'];
$second_state2 = $_POST['second_state2'];
$second_city2 = $_POST['second_city2'];
$examdt2 = $_POST['examdate2'];	
	
			
		
	}
	else
	{
		$capplied =1;
		
		$check1course = new select_reg_open();
		$select_amt1 = $check1course->oneamount($subject1);
		
			while($courseone = mysqli_fetch_array($select_amt1))
		{
			$oneamount = $courseone['Amount'];
			
			if($isscst == 'Y')
			{
				$total_amount = $oneamount/2 ;
			}
			if($isscst == 'N')
			{
				$total_amount = $oneamount ;
			}
		}
$examdt2 = '';		
$subject2 = '';
$state2 = '';
$city2 = '';
$second_state2 = '';
$second_city2 = '';
	}
	
	
	

$insertrun = new select_reg_open();
$insert_query = $insertrun->insert('Registration_details', array(

'Application_number' => $appno,
'Name' => $name,
'Emailid' => $email,
'DOB' => $dob,
'Gender' => $gender,
'Mobno' => $mobno,
'Amobno' => $altmbno,
'Disablity' => $disability,
'Disability_reason' => $disability_reason,
'SC_ST' => $isscst,
'SC_ST_Certificate_file' => $scstfile_filename,
'Role' => $role,
'Other_role' => $other_role,
'Name_of_organization' => $role_college_name,
'oraganization_state' => $role_state,
'oraganization_city' => $role_city,
'organization_othercity' => $role_city_others,
'Certificate_addressline1' => $cert_addr1,
'Certificate_addressline2' => $cert_addr2,
'Certificate_addressline3' => $cert_addr3,
'State' => $cert_state,
'City' => $cert_city,
'Cert_other_city' => $cert_city_others,
'pincode' => $cert_pin,
'Courses_applied' => $capplied,
'Course1' => $subject1,
'ExamDate1' => $examdt1,
'primarycity1' => $city1,
'primarystate1' => $state1,
'secondarycity1' => $second_city1,
'secondarystate1' => $second_state1,
'Course2' => $subject2,
'ExamDate2' => $examdt2,
'primarycity2' => $city2,
'primarystate2' => $state2,
'secondarycity2' => $second_city2,
'secondarystate2' => $second_state2,
'photo' =>$photo_filename,
'signature' =>$signature_filename,
'Amount' => $total_amount,
'Know_about_course' => $know_abt_course,
'know_abt_others_details' => $know_others,
'inserted_time' => $time	

));
	
	if($insert_query > 0)
	{
      $timevalue1 = str_replace('-', '', $time);
      $timevalue2 = str_replace(':', '', $timevalue1);
      $timevalue3 = str_replace(' ', '', $timevalue2);
      
    
      $customerid = $appno.$timevalue3;
      
      $applicationpdate = strtotime("now");
      $random = rand();
      $transactionkey = md5($appno.$applicationpdate.$random);
      $total_amount = '1.00';
      $msg_without_Checksum =
"IITM|".$appno."|NA|".$total_amount."|NA|NA|NA|INR|NA|R|iitm|NA|NA|F|".$transactionkey."|NA|NA|NA|NA|NA|noc|http://nptel.ac.in/noc/Payment/paymentresponse.php";
      
      $transactrun = new select_reg_open();
$transact_query = $transactrun->transinsert('noctransaction_table', array('ApplicationNumber' => $appno,
                                                                         'MerchantId' => 'IITM',
                                                                          'CustomerId' => $customerid,
                                                                          'Wchecksum' => $msg_without_Checksum,
                                                                          'Requeste_initated_time' => $time
                                                                         ));
                                            
                                            
                                            if($transact_query > 0)
                                            {
                                              
											  
											 echo "<br><br><br>";
echo "<center><strong>Just a moment...! You are being redirected to merchant site.</strong></center><br>";
echo "<center>[Please do not close/refresh this window]</center>";

                                              

    $common_string="ucmzUBAnW83W";
    $string_new=$msg_without_Checksum."|".$common_string;
    $checksum = crc32($string_new);
    $msg_with_Checksum = $msg_without_Checksum."|".$checksum;
                                              
 /*   $sql = "UPDATE tbl_application SET applicationchecksum='".$checksum."', applicationpaymenttoken='".$transactionkey."' WHERE ApplicationNumber = '".$appno."'";  */
  
        $updatechecksum = new select_reg_open();
        $checksumupdate_query = $updatechecksum->checksumupdate($checksum,$transactionkey,$appno);
                                              
                                              

	echo "<html><head>";
    echo "<script>window.history.forward(0);";
    echo "function gosubmit(){";
    echo "document.frm.submit();";
    echo "}";
    echo "</script></head>";
    echo "<body onload=\"gosubmit()\"><form name=\"frm\" method=post action=\"https://www.billdesk.com/pgidsk/pgmerc/IITMPaymentoption.jsp\">";
    echo "<input type=\"hidden\" value=\"".$msg_with_Checksum."\" name=\"msg\">";
    echo "</form></body></html>";


                                              
                                              
                                              
                                            
                                              
                                              
                                            }
      
      
      
		?>
<!--<script type="text/javascript">window.location.href="payment.php";</script>-->
<?php
	}
	else
	{
		//header("location:index.php");
      ?>
<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/Payment/";</script>
<?php
	}
	
	


}
else
{
	//header("location:index.php");
  ?>
<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/Payment/";</script>
<?php
}
  
}
?>
