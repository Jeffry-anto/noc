<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOC Payment check</title>
	<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/formValidation.css"/>

  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!--bootstrap css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css">
    <script type="text/javascript" src="js/formValidation.js"></script>
    <script type="text/javascript" src="js/framework/bootstrap.js"></script>
	
	  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
  <link rel="stylesheet" type="text/css" href="resources/demo.css">
 
  

  <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
  </script>
  <script type="text/javascript" language="javascript" src="resources/syntax/shCore.js">
  </script>
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
	

	
	
</style>
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
      $('#example').dataTable( {
		"order": [[ 1, "desc" ]]
	}
                           );
	}
                     );
      
  </script>


</head>

<body>
	
	<!---nav bar section -->
	  
	  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="index.php">NPTEL Online Certification - Exam Registration Payment Tracking</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
          </div>
  </div>
</nav>
	  
	  <!--end of navbar section-->
	
	
	
		  <div style="margin-top:100px;"></div>

		  <div class="container">
			
			  
						  
			  <div class="col-xs-12">
				  <?php
if(isset($error))
{
 echo '<div class="alert alert-danger" role="alert">$error</div>';
}
				  ?>
			  
				  <div class="panel panel-default" style="box-shadow: 10px 10px 10px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset;">
  <div class="panel-body">
	  
	  <div class="page-header text-center">
  <h1 style="font-family:arial;">NOC Payment tracking</h1>
</div>
	  
	  <!--update form-->
	
	  <form class="form-horizontal" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data" data-fv-framework="bootstrap"   data-fv-icon-valid="glyphicon glyphicon-ok"    data-fv-icon-invalid="glyphicon glyphicon-remove"    data-fv-icon-validating="glyphicon glyphicon-refresh">
 		  
	<div class="form-group">
      	<label for="mentor1_name" class="col-sm-4 control-label">Exam Date</label>
		 <div class="col-sm-6">
     <input type="text" class="form-control" id="examdate" name="examdate" placeholder="DD/MM/YYYY" required value="<?php if(isset($_POST['examdate']) != ''){ echo $_POST['examdate'];}?>">
		</div><div class="col-sm-2"></div>
  	</div>	
		  
		  
	<div class="form-group">
      	<label for="mentor1_name" class="col-sm-4 control-label">Course Name</label>
		 <div class="col-sm-6">
     <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Search courses" required value="<?php if(isset($_POST['coursename']) != ''){ echo $_POST['coursename'];}?>">
		</div><div class="col-sm-2"></div>
  	</div>
  
<div class="form-group">
	<label for="choosetype" class="col-sm-4 control-label">Payment Status</label>
	<div class="col-sm-6">
		<select class="form-control" name="choosetype" id="choosetype" required>
        <?php if(isset($_POST['choosetype']) != ''){ if($_POST['choosetype'] == 'S'){echo '<option value="S">Success</option>'; }
		if($_POST['choosetype'] == 'F'){echo '<option value="F">Failure</option>'; }
		if($_POST['choosetype'] == 'B'){echo '<option value="B">Form not submitted</option>'; }
		
		
		}else{
			?>
            <option value="">Choose</option>
            <?php
			
			 }?>
  
  <option value="S">Success</option>
  <option value="F">Failure</option>
  <option value="B">Form not submitted</option>
  
</select>
	</div><div class="col-sm-2"></div>
		  </div>
		  
		  
		  
    
					  
					  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="searchicon" id="searchicon" class="btn btn-warning">Check</button>
    </div>
  </div>
					  
</form>
	  
	  <!--end of update form-->
	  
	  
	  
	  
	  
	  
	  
	  
					  </div></div><!--end of panel-->
			  
			  
			  
			  
			  </div>
			  
			  
			
		  </div>
	
	
		<div class="row">
	<!--display table-->
	
	<?php
include('Connections/dbconnection.php'); 
if(isset($_POST['searchicon']))
{
	
	$co=$_POST['coursename'];
	$date=$_POST['examdate'];
	

		
/*echo $day = substr($date,0,2);
echo $month = substr($date,3,2);
echo $year = substr($date,6,4);*/
	

	
	
	$type=$_POST['choosetype'];

	

	?>
		<div class="col-md-12">
  
	<!--start of section-->
	<?php
	
	//if($num > 0)
	//	{
		
				//mysqli_select_db($database_local_conn, $local_conn);
		$payment = "select * from nocpaymentcheck WHERE TCSPaymentStatus='".$type."' AND ExamDate1 IN ('".$date."','".$date."') AND Course1 like '%".$co."%' UNION ALL select * from nocpaymentcheck WHERE TCSPaymentStatus='".$type."' AND ExamDate2 IN ('".$date."','".$date."') AND Course2 like '%".$co."%' ";
			$payment_query = mysqli_query($dbconn,$payment) or die('404 error');
			if($payment_query > 0)
			{
				$num2 = mysqli_num_rows($payment_query);
			}
			
			?>
    
	
	

	<table class="table table-striped" id="example" class="display">
      <thead>
        <tr>
          
           <th >
            Course Name 1
          </th>
			<th >
            Course Name 2
          </th>
            <th >
            Payment Status
          </th>
          <th >
            Application Number
          </th>
          <th >
            Candidate Name
          </th>
         
          <th >
            Exam Date 1
          </th>
			
			 <th >
            Exam Date 2
          </th>
			
          <th >
            Transaction Date
          </th>
        
             
        
        <th >
            Remarks
          </th>
        
        
          
          
          
        </tr>
		</thead>
		
		  <tbody>
		
		<?php if($num2 > 0)
			{ 
				while($fetch_data = mysqli_fetch_array($payment_query))
				{
				?>
		<tr>
          
          
         
          
          <td>
            <?php  echo $fetch_data['Course1']; ?>
          </td>
			  <td>
            <?php  if($fetch_data['Course2'] != '') { echo $fetch_data['Course2'];} else{ echo 'Nil';} ?>
          </td>
            <td>
            <?php if($fetch_data['TCSPaymentStatus'] == 'S'){echo 'Success';}elseif($fetch_data['TCSPaymentStatus'] == 'F'){echo 'Failed';}else{ echo 'Pending';} ?>
          </td>
          
          <td>
            <?php echo $fetch_data['ApplicationNumber']; ?>
          </td>
          
          <td>
            <?php echo $fetch_data['Name'];  ?>
          </td>
          
          <td>
            <?php if($fetch_data['ExamDate1'] != ''){echo $fetch_data['ExamDate1'];} ?>
          </td>
          <td>
            <?php if($fetch_data['ExamDate2'] != ''){echo $fetch_data['ExamDate2'];} ?>
          </td>
          <td>
            <?php echo $fetch_data['TCS_transaction_date']; ?>
          </td>
          
           <td>
            <?php if(($fetch_data['billdesk_status'] == 'S')&&($fetch_data['TCSPaymentStatus'] == 'S')){echo 'Payment received';}elseif(($fetch_data['billdesk_status'] == '')&&($fetch_data['TCSPaymentStatus'] == 'F')){ echo '';}else{ echo 'Confirmation Pending';} ?>
          </td>
        
        
          
        </tr>
			  <?php
				
				}
				?>
				
		</tbody>
		
		
		</table>
	
	<?php			
	
				
			}
			
?>
	<!--end of section-->
	
	<?php
	
		//}
		//else
		//{
		//echo '<div class="alert alert-warning text-center" role="alert">nothing found !</div>';
		//}

}
?>
		  
	
	
	<!---end of display table-->
		</div>
	
		  <script src="js/jquery-ui.js"></script>
	
	
	
	<?php
include('Connections/local_conn.php'); 
	mysqli_select_db($database_local_conn, $local_conn);
	$query2=mysqli_query($dbconn,"select Course1 from nocpaymentcheck where Course1 !='' and Course1 !='Not Applied' UNION select Course2 from nocpaymentcheck where Course2 !='' and Course2 !='Not Applied' ");
?>

 <script type="text/javascript">
  $(function() {
    var availableTags = [<?php	while($gg = mysqli_fetch_array($query2)){echo " '".$gg['Course1']."',";}?>];
    $( "#coursename" ).autocomplete({
      source: availableTags
    });
  });
  </script>
	
			
			
			
			<script>
$(document).ready(function() {
    $('#form1').formValidation({
        framework: 'bootstrap',
		icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            coursename: {
                message: 'Coursename required',
				trigger: 'blur',
                validators: {
                    // Send { username: 'its value', type: 'username' } to the back-end
                    remote: {
                        message: 'The Course name is not available',
                        url: 'validate.php',
                        data: {
                            type: 'coursename'
                        },
                        type: 'POST'
                    }
                }
            },
            examdate: {
                message: 'Exam date required',
				trigger: 'blur',
                validators: {
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date format'
                    },
                    // Send { email: 'its value', type: 'email' } to the back-end
                    remote: {
                        message: 'Exam date not available',
                        url: 'validate.php',
                        data: {
                            type: 'examdate'
                        },
                        type: 'POST'
                    }
                }
            }
        }
    });
});
</script>
	
			
			
	
		

		 
		  </body></html>
