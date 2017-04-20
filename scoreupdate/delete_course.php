<?php
session_start();
error_reporting(0);

if(!($_SESSION['admin_email']))
{
  header('location:index.php');
}
else
{
  $admin_email = $_SESSION['admin_email'];
}

?>
<?php include('phpfiles/header.php'); ?>
<?php 

require('dbconnect.php');
?>


<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <div class="page-header">
                    <a href="index.php">
                          NOC Admin Page
                      </a>
                    </div>
                </li>
              <!--   <li>
                    <a href="#">Course Data Upload</a>
                </li> -->
                <li>
                    <a href="scoreupload.php">Course Score Upload</a>
                </li>
              <!--      <li>
                    <a href="viewcandidates.php">View Candidate data</a>
                </li> -->
                <li>
                  <a href="test_score.php">Search Courseid</a>
                </li>
                 <li>
                  <a href="delete_course.php">Delete Courseid</a>
                </li>
             <!--    <li>
                    <a href="#">Analytics</a>
                </li>
                <li>
                    <a href="#">Files</a>
                </li> -->
              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand btn btn-default" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
       
        
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo  $_SESSION['admin_email']; ?></a></li>
        <li><a href="logout.php">Sign Out</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


              <div class="page-header">
                      <h1> Delete Courseid</h1>
                      </div>
                      
                      
                      
                      <div class="row">
                        
                        <div class="col-md-offset-1 col-md-10">
                         
                         
                         <div class="containersds">


    <div class="row">
      
      <div id="form-login">
        <form class="form-horizontal well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
        
          <fieldset>
          <div class="col-md-6">
            <legend>Delete Courseid</legend>
           <div class="form-group">
             <label for="CourseId">Enter CourseId</label>
             <input type="text" class="form-control" id="CourseId" name="CourseId" placeholder="Enter CourseId" maxlength="20" max="15" required>
            </div>

            <br>
            <div class="form-group">
              
              <button type="submit" id="ImportAssignment" name="ImportAssignment" class="btn btn-primary button-loading" data-loading-text="Loading...">Search</button>
              
            </div>
            </div><!--end of col-md-6-->
          </fieldset>
          
        </form>
      </div>
      
    
    </div>
 


<?php

//start deletd
if(isset($_POST['delete']))
{
 $deletecourseid=$_POST['courseiddelete'];

 $sqls="DELETE FROM noc_testscores WHERE CourseId='$deletecourseid'";
 $deleted=mysqli_query($dbconn,$sqls);

 if($deleted == true)
 {
   echo "<script>alert('Successfully deleted')</script";
 }

}


//start search course
 
 if(isset($_POST['ImportAssignment']))
 {


 $courseids=$_POST["CourseId"];
 //$resultd=$db['CourseId'];

$test="SELECT * FROM `noc_testscores` where CourseId='$courseids'";
$selectdate=mysqli_query($dbconn,$test);
//$fetch=mysqli_fetch_array($selectdate);

 // $result=mysql_query("SELECT * FROM wp_posts where post_title like '%$title%' and post_status='publish'");

 $count = 1;
 //$found=mysqli_fetch_assoc($result);


 
?>
 <div class="containerzc" style="margin-top: 110px;">

       <!--    <style type="text/css">
              .well {
              min-height: 20px;
              padding: 19px;
              margin-bottom: 20px;
              background-color: #e0c7cb;
              border: 1px solid #e8e8e8;
              border-radius: 0;
              -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
              box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
          }
            </style> -->       

<div class="col-md-4" style="margin: 10px 0;">
<form method="post" action="#">
<div class="col-md-6">
<input type="text" name="courseiddelete" class="form-control" value="<?= $courseids ?>">
</div>
<button type="submit"  name="delete" class="btn btn-primary button-loading" data-loading-text="Loading..." onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
</form>
</div>
        

  <div class="well mwell"><b>Candidate Score</b></div>

      <form method="post" action="#">
      <table id="enrolment" class="display" cellspacing="0" width="100%" >
              <thead>
                  <tr>
                 <!--  <th></th> -->
                    <th>S.No.</th>
                    <th>Course ID</th>
                    <th>Name</th>
                    <th>Email ID</th>                    
                    <th>Roll Number</th>
                    <th>DOB</th>
                    <th>Score From Assignment</th>
                    <th>Exam Score</th>
                    <th>Final Score</th>

                  </tr>
                </thead>
              <tbody>
                    <?php 
                 if(mysqli_num_rows($selectdate) > 0)
                 {
                    while($enresult = mysqli_fetch_assoc($selectdate))
                    { ?>
                    <tr>
                     <!--  <td align="center" bgcolor="#FFFFFF"><input name="checkbox" type="checkbox" value="<?php echo $enresult['RollNumber']; ?>"></td> -->
                      <td><?php echo $count;?></td>
                      <th><?php echo $enresult['CourseId'];?></th>
                      <td><?php echo $enresult['Name'];?></td>
                      <td><?php echo $enresult['EmailId'];?></td>
                      <td><?php echo $enresult['RollNumber'];?></td>
                      <td><?php echo $enresult['DOB'];?></td>
                      <td><?php echo $enresult['ScoreFromAssignment'];?></td>
                      <td><?php echo $enresult['ExamScore'];?></td>
                      <td><?php echo $enresult['FinalScore'];?></td>
                      
                    </tr>
                    <?php

                    $count++;
                     } 

                   }
                     else
                     {
                      echo "<td>The CourseId Not in the DB List!</td>";
                     }
                      }

                    ?>

                  </tbody>
                   <!--  <label colspan="4" style="float: left;display:inline; margin: 0;" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" value="Delete"></label> -->
                </table>
                </form>
               </div>


            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



<?php include('phpfiles/footer.php'); ?>

<link href="report_css/jquery.dataTables.min.css" rel="stylesheet">
<link href="report_css/buttons.dataTables.min.css" rel="stylesheet">
<script src='report_js/jquery-1.12.3.js'></script>
<script src='report_js/jquery.dataTables.min.js'></script>
<script src='report_js/dataTables.buttons.min.js'></script>
<script src='report_js/buttons.flash.min.js'></script>
<script src='report_js/jszip.min.js'></script>
<script src='report_js/pdfmake.min.js'></script>
<script src='report_js/vfs_fonts.js'></script>
<script src='report_js/buttons.html5.min.js'></script>
<script src='report_js/buttons.print.min.js'></script>
<script>
$(document).ready(function() {
    $('#enrolment').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ]
    } );
} );
</script>