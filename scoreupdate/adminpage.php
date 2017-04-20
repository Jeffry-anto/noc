<?php
session_start();

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
                <!-- <li>
                    <a href="#">Course Data Upload</a>
                </li> -->
                <li>
                    <a href="scoreupload.php">Course Score Upload</a>
                </li>
              <!--       <li>
                    <a href="viewcandidates.php">View Candidate data</a>
                </li> -->
                   <li>
                  <a href="test_score.php">Search Courseid</a>
                </li>
                 <li>
                  <a href="delete_course.php">Delete Courseid</a>
                </li>
            <!--     <li>
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
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                       
                       <div ng-view></div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



<?php include('phpfiles/footer.php'); ?>