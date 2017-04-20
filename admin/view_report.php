<?php 
include('header.php');
include('dbconnect.php');
session_start();
if(!isset($_SESSION['noc_loginuser']) && $_SESSION['noc_loginuser'] == '')
{
  $url = "Location: http://nptel.ac.in/noc/admin";
  header($url);
}
if(isset($_GET['id']) && $_GET['id'] != '')
{
	$id = $_GET['id'];
} else { ?>
	<script type="text/javascript">window.location.href="http://nptel.ac.in/noc/admin/"</script>
<?php } ?>
<style type="text/css">
.controll-label {
    margin-bottom: 10px;
    font-size: 17px;
	min-height: 40px;
    font-size: 17px;
}
#remarks {
    line-height: 20px;
}
#allocateselect,.loaderarea {
	float:left;
}
.loaderimg {
    width: 40px;
    height: 40px;
    margin-left: 40px;
    display: none;
}
</style>
	<div class="container" style="margin-top:90px;">
	<div class="container">
		<div class="col-md-12" >
			<div class="bootstrap-iso">
			 	<div class="container-fluid">
			  		<div class="row">
			  			<div class="well"><center><h4>Report an Issue</h4></center></div>
			  			<?php if(isset($error) && $error != ''){ ?>
			  				<div class="alert alert-danger"><center><?php echo $error;?></center></div>
			  			<?php } else if(isset($msg) && $msg != ''){ ?>
			  				<div class="alert alert-success"><center><?php echo $msg;?></center></div>
			  			<?php }
			  				$sql = "SELECT * from issue_reporting where issue_id = $id";
			  				$result = mysqli_query($dbconn,$sql);
			  				$row = mysqli_fetch_assoc($result);
			  				$cn = $row['contact_number'];
			  				if($cn == '')
			  				{
			  					$cn = 'NOT SPECIFIED';
			  				}
			  			 ?>
						<form method="post" action="update_report.php">
							<div class="col-md-10">
							     	<div class="form-group ">
								      	<label class="col-md-6 control-label">Hall Ticket number / Application Seq.Number</label>
								      	<label class="col-md-6 control-label"><?php echo $row['application_number'];?></label>
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Registered EmailID</label>
								      	<label class="col-md-6 control-label"><?php echo $row['Emailid'];?></label>
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Course Name</label>
								      	<label class="col-md-6 control-label"><?php echo $row['course_name'];?></label>
							     	</div>
							     	<div class="form-group ">
								      	<label class="col-md-6 control-label">Type of issue</label>
								      	<label class="col-md-6 control-label"><?php echo $row['issue_type'];?></label>
							     	</div>
							     	<div class="form-group ">
								      	<label class="col-md-6 control-label">Exam Date</label>
								      	<label class="col-md-6 control-label"><?php echo $row['exam_date'];?></label>
							     	</div>
							    
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Name</label>
								      	<label class="col-md-6 control-label"><?php echo $row['name'];?></label>
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Contact Number</label>
								      	<label class="col-md-6 control-label"><?php echo $cn;?></label>
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Issue Description</label>
								      	<label class="col-md-6 controll-label"><?php echo $row['issue_description'];?></label>
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Remarks</label>
								      	<textarea class="col-md-6 control-label" id="remarks" name="remarks" maxlength="500" placeholder="Post your remarks"><?php echo $row['remarks'];?></textarea>
							     		<input type="hidden" name="id" value="<?php echo $id;?>">
							     	</div>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Change Status</label>
							      		<select class="col-md-6 control-label" id="status" name="status" required>
							      				<?php $status = $row['status'];?>
								       			<option value="opened" <?=$status == 'opened' ? ' selected="selected"' : '';?>>OPENED</option>
								       			<option value="pending" <?=$status == 'pending' ? ' selected="selected"' : '';?>>PENDING</option>
								       			<option value="closed" <?=$status == 'closed' ? ' selected="selected"' : '';?>>CLOSED</option>
							      		</select>
							     	</div>
							     	<?php if($row['issue_doc'] != 'N')
							     	{ ?>
							     	<div class="form-group ">
							      		<label class="col-md-6 control-label">Download Issue Document</label>
								      	<a href="./issue_files/<?php echo $row['issue_doc'];?>" class="control-label" download>Download the Attachment</a>
							     	</div>
							     	<?php }
							     	if($_SESSION['noc_loginuser'] == 'bharathi')
							     	{
								     	if($row['allocation_status'] == 'N')
								     	{
								     		$ast = "Not allocated";
								     	} else {
								     		$urid = $row['allocation_status'];
								     		$nmres=  mysqli_query($dbconn,"SELECT Username from noc_admin where userId = '$urid'");
								     		$nmrow = mysqli_fetch_assoc($nmres);
								     		$ast = "Allocated to ".$nmrow['Username'];
								     	} ?>
								     	<div class="form-group ">
								      		<label class="col-md-6 control-label">Allocation Status</label>
									      	<label class="col-md-6 control-label" id="alname"><?php echo $ast;?></label>
								     	</div>
								     	<div class="form-group ">
								      		<label class="col-md-6 control-label">Allocate To</label>
									      	<label class="col-md-6 control-label">
												<form action="" method ="post" id="alform">
										    		<select class="control-label" id="allocateselect" name="allocatename" required>
										    			<option value=''>--Select--</option>
										    			<?php $usres = mysqli_query($dbconn,"SELECT * from noc_admin");
										    			while($userrow = mysqli_fetch_assoc($usres))
										    			{
										    				if ($row['allocation_status'] == $userrow['userId'])
										    				{ 
										    					$selected="selected";
										    				} else {
										    					$selected = '';
										    				}
										    				echo "<option value='".$userrow['userId']."' ".$selected.">".$userrow['Username']."</option>";
										    			} ?>
										    		</select>
										    		<div class="loader-area"><img src="./images/loader.gif" class="loaderimg"></div>
										    	</form>
									      	</label>
								     	</div>
								    <?php } ?>


								    <div class="form-group col-md-12">
						      			<div>
						       				<button class="btn btn-primary" name="btnsubmit" type="submit">Submit</button>
						      			</div>
					     			</div>
							    
							</div>
						</form>
			  		</div>
			 	</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
$(document).ready(function(){
    $('#allocateselect').change(function() {
    	$('.loaderimg').css('display','block');
    	var usrval = $(this).val();
    	var is_id = <?php echo $id;?>;
            $.ajax({
                type: "POST",
                dataType: "json",
                url :"ajax_process.php",
                data:{allocatename:usrval,isid:is_id},
                success: function(data) {
                	if(data.result != 'error')
                	{
                		setTimeout(function(){
	                		$('.loaderimg').css('display','none');
	                		$('#alname').text('Allocated to '+data.result);
                		},1000);
                	}
                	if(data.result === null)
                	{
                		setTimeout(function(){
	                		$('.loaderimg').css('display','none');
	                		$('#alname').text('Not Allocated');
                		},1000);
                	}
                }
            });
        $('#alform').submit();
    });
});
	</script>
</body>
</html>
