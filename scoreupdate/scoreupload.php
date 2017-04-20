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
<?php require('phpfiles/connection/functions.php'); ?>





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
               <!--     <li>
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
                      <h1> Score upload</h1>
                      </div>
                      
                      
                      
                      <div class="row">
                        
                        <div class="col-md-offset-1 col-md-10">
                         
                         
                         <div class="container">
                           
                           <?php

  if(isset($_POST["Import"])){
		

		$filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$db_connect = new function_list();
           $db = $db_connect->scoreupload($filename);
            if($db == 1)
            {
              $success = "Successfully data Inserted";
            }
           else
           {
            $error = $db;
           }
		 	
			
		 }
	}	
        ?>
        
        
           <?php

  if(isset($_POST["updatescore"])){
		

		$filename=$_FILES["updatescorefile"]["tmp_name"];
		

		 if($_FILES["updatescorefile"]["size"] > 0)
		 {

		  	$db_connect = new function_list();
           $db = $db_connect->scoreupdate($filename);	
            if($db == 1)
            {
              $success = "Successfully updated";
            }
           else
           {
            $error = $db;
           }
		 	
			
		 }
	}	
        ?>
        
        
        <?php

  if(isset($_POST["ImportAssignment"])){
		

      // $total_assign = $_POST["totalassignments"];
      // $CourseId = $_POST["CourseId"];
		$filename=$_FILES["assignmentfile"]["tmp_name"];
		
     if($_FILES["assignmentfile"]["size"] > 0)
		 {

		  	$db_connect = new function_list();
        //$db = $db_connect->assignmentupdate($filename,$total_assign,$CourseId);	
        $db = $db_connect->asignmentscore_updated($filename);
           
          if($db == 1)
          {
              $success = "Successfully updated";
          }
           else
           {
            $error = $db;
           }
		 	
			
		 }
   
		
	}	
        ?>
        
        <?php

  if(isset($_POST["Updateassignmentweek"])){
		

      $total_assign = $_POST["totalassignment"];
      $CourseId = $_POST["CourseId"];
      $total_week = $_POST["totalassignmentweek"];
      $field_array = $_POST["mytext"];

    
		  	$db_connect = new function_list();
           $db = $db_connect->assignmentweekupdate($total_assign,$CourseId,$total_week,$field_array);	
       
    
        
          if($db == 1)
          {
              $success = "Successfully updated";
          }
           else
           {
            $error = $db;
           }
		 	
   
		
	}	
        ?>
                <?php

  if(isset($_POST["Updatelogic"])){
		

      $CourseId= $_POST["CourseId"];
      $logiccourse = $_POST["logictext"];
      

    
		  	$db_connect = new function_list();
           $db = $db_connect->Logicforcourses($CourseId,$logiccourse);	
       
    
        
          if($db == 1)
          {
              $success = "Successfully updated";
          }
           else
           {
            $error = $db;
           }
		 	
   
		
	}	
        ?>
        
        <?php
    if(isset($success))
    {
      ?>
      <div class="alert alert-success alert-dismissible text-center col-md-offset-2 col-md-6" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon-thumbs-up"></span>
  <span class="sr-only"></span><b>Successfully updated !!!</b></div>
      <?php
    }

        ?>
        
         <?php
    if(isset($error))
    {
      ?>
      <div class="alert alert-danger alert-dismissible text-center col-md-offset-2 col-md-6" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon-warning-sign"></span>
  <span class="sr-only"></span><b><?php echo $error; ?></b></div>
      <?php
    }

        ?>
                           
                         </div>
                          
                        <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#testscore" aria-controls="testscore" role="tab" data-toggle="tab">Candidate Data/Score Upload</a></li>
    <!-- <li role="presentation"><a href="#updatescores" aria-controls="updatescores" role="tab" data-toggle="tab">Update Candidate scores</a></li> -->
    <li role="presentation"><a href="#assignmentscore" aria-controls="assignmentscore" role="tab" data-toggle="tab">AssignmentScore Upload</a></li>
    <li role="presentation"><a href="#assignmentweek" aria-controls="assignmentweek" role="tab" data-toggle="tab">Weeks count Update</a></li>
    <li role="presentation"><a href="#Logic_remarks" aria-controls="Logic_remarks" role="tab" data-toggle="tab">Logic Remarks</a></li>
    <li role="presentation"><a href="#enablingscoreandlogin" aria-controls="enablingscoreandlogin" role="tab" data-toggle="tab">Enable/Disable Scores</a></li>

    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="testscore">
      
      <div class="row">
        
       <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						<br>
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			
		</div>
		

		
	</div>
       
       
        
      </div>
      
      
      
    </div>
    
    <!--update scores-->
    <div role="tabpanel" class="tab-pane" id="updatescores">
      
      <div class="row">
        
       <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file to update scores</legend>
						<div class="control-group">
							
							<div class="controls">
								<input type="file" name="updatescorefile" id="updatescorefile" class="input-large">
							</div>
						</div>
						<br>
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="updatescore" name="updatescore" class="btn btn-primary button-loading" data-loading-text="Loading...">Update</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			
		</div>
		

		
	</div>
       
    
        
      
        
      </div>
      
      
      
    </div>
    <!--end update scores-->
    <div role="tabpanel" class="tab-pane" id="assignmentscore">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
				
					<fieldset>
					<div class="col-md-6">
						<legend>Import CSV/Excel file for assignment scores</legend>
	<!-- 					<div class="form-group">
    <label for="CourseId">Enter CourseId</label>
    <input type="text" class="form-control" id="CourseId" name="CourseId" placeholder="Enter CourseId" maxlength="20" max="15" required>
  </div>
  <div class="form-group">
    <label for="totalassignments">Enter total number of assignments</label>
    <input type="number" class="form-control" id="totalassignments" name="totalassignments" placeholder="Enter Total number of assignments" maxlength="2" max="50" required>
  </div> -->
  <div class="form-group">
    <label for="assignmentfile">Upload excel</label>
    <input type="file" id="assignmentfile" name="assignmentfile" required>
    <p class="help-block">Upload only csv file</p>
  </div>
						<br>
						<div class="form-group">
							
							<button type="submit" id="ImportAssignment" name="ImportAssignment" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							
						</div>
						</div><!--end of col-md-6-->
					</fieldset>
					
				</form>
			</div>
			
		
		</div>

		
	</div>
      
      
               
      
     
       
        
      </div>
      
      
      
      
    </div>
    
    <!--assignment week -->
    
    <div role="tabpanel" class="tab-pane" id="assignmentweek">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel_week" enctype="multipart/form-data">
				
					<fieldset>
					<div class="col-md-6">
						<legend>Update the weeks count for assignment</legend>
						
						<div class="form-group">
    <label for="CourseId">CourseId</label>
    <input type="text" class="form-control" id="CourseId" name="CourseId" maxlength="20" required>
  </div>
          
						<div class="form-group">
    <label for="CourseId">Total assignment</label>
    <input type="number" class="form-control" id="totalassignment" name="totalassignment" maxlength="2" required>
  </div>
						<div class="form-group">
    <label for="CourseId">Total weeks for assignment</label>
    <input type="text" class="form-control" id="totalassignmentweek" name="totalassignmentweek" maxlength="2" required>
  </div>
  <div class="input_fields_wrap">
   <button class="add_field_button btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add More Weeks</button><br><br>
  <div class="form-group">
    <label for="totalassignments">Assignment Field name in Order</label>
    <input type="text" class="form-control" id="mytext[]" name="mytext[]" placeholder="Eg: A1,A2" required>
  </div>
  </div>
  
						<br>
						<div class="form-group">
							
							<button type="submit" id="Updateassignmentweek" name="Updateassignmentweek" class="btn btn-primary button-loading" data-loading-text="Loading...">Update</button>
							
						</div>
						</div><!--end of col-md-6-->
					</fieldset>
					
				</form>
			</div>
			
		
		</div>

		
	</div>
      
      
               
      
     
       
        
      </div>
      
      
      
      
    </div>
    
    <!--end of assignment week -->
  
  <!-- logic Remarks -->
  <div role="tabpanel" class="tab-pane" id="Logic_remarks">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel_logic" enctype="multipart/form-data">
				
					<fieldset>
					<div class="col-md-6">
						<legend>Update Logic Remarks for the Course</legend>
						
						<div class="form-group">
    <label for="CourseId">CourseId</label>
    <input type="text" class="form-control" id="CourseId" name="CourseId" maxlength="20" required>
  </div>
        
			<div class="logic_fields_wrap">
   <button class="logic_field_button btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Points</button><br><br>
  <div class="form-group">
    <label for="logictext">Remarks Points</label>
    <input type="text" class="form-control" name="logictext[]" id="logictext[]" required>
  </div>
  </div>
  
  
						<br>
						<div class="form-group">
							
							<button type="submit" id="Updatelogic" name="Updatelogic" class="btn btn-primary button-loading" data-loading-text="Loading...">Update</button>
							
						</div>
						</div><!--end of col-md-6-->
					</fieldset>
					
				</form>
			</div>
			
		
		</div>

		
	</div>
      
      
               
      
     
       
        
      </div>
      
      
      
      
    </div>
  <!-- end logic Remarks -->
  
  <!--enable scores-->
  <div role="tabpanel" class="tab-pane" id="enablingscoreandlogin">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			<div id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel_logic" enctype="multipart/form-data">
				
					<fieldset>
					<div class="col-md-6">
						<legend>Enable/Disable Candidate Login and scores</legend>
						
						<div class="form-group">
    <label for="CourseId">CourseId</label>
    <input type="text" class="form-control" id="SearchCourseId" name="SearchCourseId" maxlength="20" required>
  </div>
        
			
						<br>
						
						</div><!--end of col-md-6-->
					</fieldset>
					
				</form>
			</div>
			
		 <div>
		   
		   <div class="table-responsive" id="enablediv" style="display:none;">
  <table class="table">
    <thead style="font-weight:bold;">
      <tr>
        <td>CourseId</td>
        <td>CourseName</td>
        <td>Exam Run</td>
        <td>Candidate Login</td>
        <td>Exam Score</td>
        <td>Download Certificate</td>
        <td>Certificate Status</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="hashcourseid"></td>
        <td id="hashcoursename"></td>
        <td id="hashexamrun"></td>
        <td ><input type="checkbox" name="hasclogin" id="hasclogin"></td>
        <td ><input type="checkbox" name="hasexamscore" id="hasexamscore"></td>
        <td ><input type="checkbox" name="hasdownload" id="hasdownload"></td>
        <td ><input type="checkbox" name="hascertifistatus" id="hascertifistatus"></td>
      </tr>
    </tbody>
  </table>
</div>
		   
		   
		 </div>
		</div>

		
	</div>
      
      
              
      
     
       
        
      </div>
      
      
      
      
    </div>
  <!--end nable scores-->
  
        
  
  
  
  </div>

</div>
                          
                          
                        </div>
                        
                      </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



<?php include('phpfiles/footer.php'); ?>