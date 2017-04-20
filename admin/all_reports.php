<?php include('header.php');
session_start();
if(!isset($_SESSION['noc_loginuser']) && $_SESSION['noc_loginuser'] == '')
{
  $url = "Location: http://nptel.ac.in/noc/admin";
  header($url);
}
?>
	 <!--end of navbar section-->
<div class="container" style="margin-top:90px;">
	<div class="container">		
		<div class="col-md-12">
			<div class="well"><center><h4>List of Issues - ALL REPORTS</h4></center></div>
		  	<div class="">          
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
			        		<?php if($_SESSION['noc_loginuser'] == 'bharathi') { ?>
			        			<th>Allocation Status</th>
			        		<?php } ?>
			      		</tr>
			    	</thead>
			    	<tbody>
				<?php 
				include('dbconnect.php');
				$sql = "select * from issue_reporting order by reported_date asc";
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
			        		<?php if($_SESSION['noc_loginuser'] == 'bharathi') { 
									if($row['allocation_status'] == 'N')
								    {
								    	$ast = "-";
								    } else {
								    	$urid = $row['allocation_status'];
								    	$nmres=  mysqli_query($dbconn,"SELECT Username from noc_admin where userId = '$urid'");
								    	$nmrow = mysqli_fetch_assoc($nmres);
								    	$ast = "Allocated to ".$nmrow['Username'];
								    }
			        				echo "<td>".$ast."</td>";
			        		} ?>
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

	
	
	
	<!---jquery-->
<script type="text/javascript" src="../Assets/js/jquery-1.11.2.min.js"></script>
<script src="../Assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
	<script>
		$(function () {
  $('[data-toggle="popover"]').popover()
})
		</script>
</body>
</html>
