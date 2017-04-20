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
			<div class="well"><center><h4>List of Issues - Allocated to You</h4></center></div>
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
			      		</tr>
			    	</thead>
			    	<tbody>
				<?php 
				$myid = $_SESSION['noc_userid'];
				include('dbconnect.php');
				$sql = "select * from issue_reporting where allocation_status = '$myid' and status !='closed' order by reported_date asc";
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
					    </tr>
				<?php } 
				} else { ?>
				    <tr>
				       	<td><div class="alert alert-warning">No issues allocated to you</div></td>
				    </tr>
				<?php } ?>
			    	</tbody>
			  	</table>
		  	</div>
		</div>
	</div>

</body>
</html>
