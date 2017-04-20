<?php include('header.php');
session_start();
if(!isset($_SESSION['noc_loginuser']) && $_SESSION['noc_loginuser'] == '')
{
  $url = "Location: http://nptel.ac.in/noc/admin";
  header($url);
}
if($_SESSION['noc_loginuser'] != 'bharathi')
{
  $url = "Location: http://nptel.ac.in/noc/admin/home.php";
  header($url);
}
?>
	 <!--end of navbar section-->
<div class="containerrr" style="margin-top:90px;">
	<div class="containerr">		
		<div class="col-md-12">
			<div class="well"><center><h4>List of Issues - Opened</h4></center></div>
		  	<div class="table-responsive">          
			  	<table class="table">
			    	<thead>
			      		<tr>
			        		<th>Application Number</th>
			        		<th>Emailid</th>
			        		<th>Course Name</th>
			        		<th>Issue Type</th>
			        		<th>Exam Date</th>
			        		<th>Name</th>
			        		<th>status</th>
			        		<th>Allocation Status</th>
			        		<th>Allocate</th>
			      		</tr>
			    	</thead>
			    	<tbody>
				<?php 
				include('dbconnect.php');
				if(isset($_POST['allocatename']))
				{
					$uid = $_POST['allocatename'];
					$issid = $_POST['isid'];
					$upsql = "UPDATE `issue_reporting` SET `allocation_status`='$uid' WHERE `issue_id` = '$issid'";
					$uprow = mysqli_query($dbconn,$upsql);
					echo "<script>Allocated Successfully</script>";
				}
				$sql = "select * from issue_reporting where status = 'opened' order by reported_date asc";
				$res = mysqli_query($dbconn,$sql);
				$count = mysqli_num_rows($res);
				if($count > 0)
				{
					while($row = mysqli_fetch_assoc($res))
					{
						$id = $row['issue_id'];
						$st = $row['status'];
						if($st == 'opened')
						{
							$label = 'label-info';
						} else if($st == 'closed')
						{
							$label = 'label-success';
						} else if($st == 'pending'){
							$label = 'label-warning';
						}
						?>
					    <tr>
					        <td><?php echo $row['application_number'];?></td>
					        <td><?php echo $row['Emailid'];?></td>
					        <td><?php echo $row['course_name'];?></td>
					        <td><?php echo $row['issue_type'];?></td>
					        <td><?php echo $row['exam_date'];?></td>
					        <td><?php echo $row['name'];?></td>
					        <td><a href="./view_report?id=<?php echo $id;?>" class="openlink"><label class="link-label label <?php echo $label;?>"><?php echo strtoupper($row['status']);?></label></a></td>
					    	<td>
					    		<?php $ast = $row['allocation_status'];
					    			if($ast == 'N')
					    			{
					    				echo "<span class='label label-pill label-default'>Not Allocated</span>";
					    			} else {
					    				echo "<span class='label label-pill label-primary'>Allocated</span>";
					    			}

					    		?>
					    	</td>
					    	<td>Allocate to 
					    		<form action="" method ="post">
					    		<select id="allocateselect" name="allocatename" onchange="this.form.submit()" required>
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
					    		<input type="hidden" name="isid" value="<?php echo $id;?>">
					    	</form>
					    	</td>
					    </tr>
				<?php } 
				} else { ?>
				    <tr>
				       	<td><div class="alert alert-warning">Sorry ! all issues are closed now.</div></td>
				    </tr>
				<?php } ?>
			    	</tbody>
			  	</table>
		  	</div>
		</div>
	</div>

<script>
$(document).ready(function(){
	console.log("ok");
});
</script>
</body>
</html>
