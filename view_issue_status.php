<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPTEL Online Certification</title>
	<!----bootstrap css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
</head>
<style type="text/css">
.stlink {
	float: right;
	font-weight: bold;
	font-style: italic;
}
.incontainer {
	margin-left: 10%;
	margin-right: 10%;
}
</style>
<body>
	
	<!---nav bar section -->
	  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="http://nptel.ac.in/noc/">NPTEL Online Certification</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php"><b>Home</b></a></li>
		<!--<li><a href="pdf/NOC - FREQUENTLY ASKED QUESTIONS.pdf"><b>FAQ</b></a></li>-->
		<li><a href="./faq.php"><b>FAQ</b></a></li>
				<li><a href="contact.html"><b>Contact Us</b></a></li>
       
		  
		</ul>
    </div>
  </div>
</nav>
<div class="containerr" style="margin-top:90px;">
	<div class="incontainer">		
		<div class="col-md-12">
			<div class="well"><center><h4>View closed Issue details</h4></center></div>
		  	<div class="table-responsive">          
			  	<table class="table" id="issuetable">
			    	<thead>
			      		<tr>
			        		<th>Application Number</th>
			        		<th>Emailid</th>
			        		<th>Issue Description</th>
			        		<th>Reported Date</th>
			        		<th>Remarks</th>
			        		<th>Response Date</th>
			        		<th>Status</th>
			      		</tr>
			    	</thead>
			    	<tbody>
				<?php 
				include('Connections/dbconnection.php');
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
						$rm = $row['remarks'];
						if($rm == 'NULL')
						{
							$rm = "Issue not yet viewed";
						} else {
							$rm = $row['remarks'];
						}
						$resdt = substr($row['responded_date'],0,10);
						if($resdt == '0000-00-00')
						{
							$resdt = '*';
						}
						?>
					    <tr>
					        <td><?php echo $row['application_number'];?></td>
					        <td><?php echo $row['Emailid'];?></td>
					        <td><?php echo $row['issue_description'];?></td>
					        <td><?php echo substr($row['reported_date'],0,10);?></td>
					        <td><?php echo $rm;?></td>
					        <td><?php echo $resdt;?></td>
					        <td><label class="link-label label <?php echo $label;?>"><?php echo strtoupper($row['status']);?></label></td>
					        
					    </tr>
				<?php } 
				} else { ?>
				    <tr>
				       	<td><div class="alert alert-default">Sorry ! no results available.</div></td>
				    </tr>
				<?php } ?>
			    	</tbody>
			  	</table>
		  	</div>
		</div>
	</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#issuetable').DataTable();
});
</script>
</body>
</html>
