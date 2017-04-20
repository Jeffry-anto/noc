<?php include_once("Assets/phpfiles/function.php"); ?>

<?php




if(isset($_POST['subject']))
{
	$subject1 = $_POST['subject'];
$select_subject1amount = new select_reg_open();
$fetch_record = $select_subject1amount->subject($subject1);

while($final_record = mysqli_fetch_array($fetch_record))
{
	echo $final_record['Amount'];
		
	//$option_coursename[] = '<option value="'.$coursename.'">'.$coursename.'</option>';
}
}
else
{
  ?>
<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/Payment/";</script>
<?php
}

?>
