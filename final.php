<?php


require "Connections/dbconnection.php";

mysqli_select_db($database_local_conn);
$find_total_weeks = mysqli_query("select * from assignment_week where NOCCourseId='noc15-cs07' ");

if($find_total_weeks > 0)
{
	$total_weeks = mysqli_num_rows($find_total_weeks);
}

$find_highest_record = mysqli_query("select MAX(LENGTH(Assignment_map) - LENGTH(REPLACE(Assignment_map, ',', ''))) as cnt from assignment_week where NOCCourseId='noc15-cs07' ");
if($find_highest_record > 0)
{
while($fetch_highest_record = mysqli_fetch_array($find_highest_record))
{
	$highest_record = $fetch_highest_record['cnt'] + 1;
}
}



?>

<table width="100%" cellpadding="5">
	<tr>
		<?php
	for($header=0; $header<=$highest_record; $header++)
	{
		?>
		<td><?php echo 'Assignment '.$header; ?></td>
		<?php
	}
		?>
	</tr>
	

	
	<?php
	for($body=1; $body<=$total_weeks; $body++)
	{
		?>
	<tr>
		<?php
		$find_display_weeks = mysqli_query("select * from assignment_week where NOCCourseId='noc15-cs07' and Weeks='".$body."' ");

			if($find_display_weeks > 0)
			{

				while($fetch_display_weeks = mysqli_fetch_array($find_display_weeks))
			{
					
					?>
		<td><?php echo 'Week '.$body;l ?></td>
		<?php $assignment_names_unique= $fetch_display_weeks['Assignment_map'];
		
					$marks = mysqli_query("select $assignment_names_unique from assignment_scores where NOCCourseId='noc15-cs07' and RollNumber='NPTEL15CS070512006' ");
					$fetch_marks=mysqli_fetch_row($marks);
					
					$obj = $fetch_marks;
				foreach($obj as $key=>$value)
				{
					?>
		<td><?php if($value ==''){echo '-';}else{echo $value;} ?></td>
		<?php
				}
		
		?>
		<?php
			}
		
			}
		?>
	</tr>
	<?php
	}
	?>
</table>
<?php








/*$find_display_weeks = mysqli_query("select * from assignment_week where NOCCourseId='noc15-cs07' order by Weeks ");

if($find_display_weeks > 0)
{
	
	while($fetch_display_weeks = mysqli_fetch_array($find_display_weeks))
{
	
}
	
}*/


/*$find_total_weeks = mysqli_query("select * from assignment_week where NOCCourseId='noc15-cs07' ");
$find_total_weeks = mysqli_query("select * from assignment_week where NOCCourseId='noc15-cs07' ");*/




?>
