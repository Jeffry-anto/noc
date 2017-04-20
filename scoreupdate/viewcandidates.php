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
          <!--       <li>
                    <a href="#">Course Data Upload</a>
                </li>-->
                <li>
                    <a href="scoreupload.php">Candidate and Score Data Upload</a>
                </li>
                 <li>
                    <a href="viewcandidates.php">View Candidate data</a>
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
                      <h1>Candidate Data</h1>
                      </div>
                      
                      
                      
                      <div class="row">
                        
                        <div class="col-md-offset-1 col-md-10">
                         
                         
                         <div class="container">
                           
  
    
                           
                         </div>
                          
                        <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    
        <li role="presentation" class="active"><a href="#viewthecoursecandidates" aria-controls="viewthecoursecandidates" role="tab" data-toggle="tab">View Candidates Exam Score</a></li>
                <li role="presentation"><a href="#viewtassihnment" aria-controls="viewtassihnment" role="tab" data-toggle="tab">View Assignemnt scores</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  
  
  
        
  <!--view candidates-->
  <div role="tabpanel" class="tab-pane active" id="viewthecoursecandidates">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			
			<div class="panel panel-default" style="width:1100px;">
  <div class="panel-body">
                 
                   
                  
    <div class="row">
        
        <div id="no-more-tables" >
            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="example" class="display" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset; margin:0px 10px 0px 10px;font-size:11px;">
        		<thead class="cf">
        			<tr>
        				<th>CourseId</th>
        				<th class="numeric">Name</th>
        				<th class="numeric">RollNumber</th>
        				<th class="numeric">EmailId</th>
                        <th class="numeric">DOB</th>
                        <th class="numeric">ScoreFromAssignment</th>
                        <th class="numeric">ExamScore</th>
                        <th class="numeric">FinalScore</th>

        			</tr>
        		</thead>
        		<tbody>
        		
        		         <?php
			$db_connectviewcanidate = new function_list();
           $dbnew = $db_connectviewcanidate->getcandidatesdata();	
		    $dbnewass = $db_connectviewcanidate->getcandidateassign();
			
foreach($dbnew as $key=>$value)
{
 
   
  echo '<tr>';
   echo '<td data-title="CourseId">'.$value['CourseId'].'</td>';
    echo '<td data-title="Name">'.$value['Name'].'</td>';
      echo '<td data-title="RollNumber">'.$value['RollNumber'].'</td>';
  echo '<td data-title="EmailId">'.$value['EmailId'].'</td>';
    echo '<td data-title="DOB">'.$value['DOB'].'</td>';
	  echo '<td data-title="ScoreFromAssignment">'.$value['ScoreFromAssignment'].'</td>';
	    echo '<td data-title="ExamScore">'.$value['ExamScore'].'</td>';
		  echo '<td data-title="FinalScore">'.$value['FinalScore'].'</td>';
        echo '</tr>';
 
}
    ?>  
  
        			
        		</tbody>
        	</table>
                  
        </div>
                     </div></div>
                    
      
          </div>
			
			
			
			
		 
		</div>

		
	</div>
      
      
              
      
     
       
        
      </div>
      
      
      
      
    </div>
  <!--end view candidate-->
  
  
  <!--view candidates assign-->
  <div role="tabpanel" class="tab-pane" id="viewtassihnment">
      
      <div class="row">
        
        <div class="container">
		<div class="row">
			
			
			<div class="panel panel-default" style="width:1100px;">
  <div class="panel-body">
                 
                   
                  
    <div class="row">
        
        <div id="no-more-tables" >
            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="example1" class="display" style="box-shadow: 5px 5px 5px rgba(0,0,0,.5), 0 0 10px rgba(255,255,255,.5) inset; margin:0px 10px 0px 10px;font-size:11px;">
        		<thead class="cf">
        			<tr>
        				<th>CourseId</th>
        				<th class="numeric">RollNumber</th>
        				<th class="numeric">EmailId</th>
                        <th class="numeric">A1</th>
                        <th class="numeric">A2</th>
                        <th class="numeric">A3</th>
                        <th class="numeric">A4</th>
                        <th class="numeric">A5</th>
                        <th class="numeric">A6</th>
                        <th class="numeric">A7</th>
                        <th class="numeric">A8</th>
                        <th class="numeric">A9</th>
                        <th class="numeric">A10</th>
                        <th class="numeric">A11</th>
                        <th class="numeric">A12</th>
                        <th class="numeric">A13</th>
                        <th class="numeric">A14</th>
                        <th class="numeric">A15</th>
                        <th class="numeric">A16</th>
                        <th class="numeric">A17</th>
                        <th class="numeric">A18</th>
                        <th class="numeric">A19</th>
                        <th class="numeric">A20</th>
                        <th class="numeric">A21</th>
                        <th class="numeric">A22</th>
                        <th class="numeric">A23</th>
                        <th class="numeric">A24</th>
                        <th class="numeric">A25</th>
                        <th class="numeric">A26</th>
                        <th class="numeric">A27</th>
                        <th class="numeric">A28</th>
                        <th class="numeric">A29</th>
                        <th class="numeric">A30</th>
                        <th class="numeric">A31</th>
                        <th class="numeric">A32</th>
                        <th class="numeric">A33</th>
                        <th class="numeric">A34</th>
                        <th class="numeric">A35</th>
                        <th class="numeric">A36</th>
                        <th class="numeric">A37</th>
                        <th class="numeric">A38</th>
                        <th class="numeric">A39</th>
                        <th class="numeric">A40</th>
                        <th class="numeric">A41</th>
                        <th class="numeric">A42</th>
                        <th class="numeric">A43</th>
                        <th class="numeric">A44</th>
                                             

               
                

        			</tr>
        		</thead>
        		<tbody>
        		
        		         <?php
			//$db_connectvassie = new function_list();
          // $dbnewass = $db_connectvassie->getcandidateassign();	
//var_dump($dbnewass);

foreach($dbnewass as $key=>$value)
{
 
   
  echo '<tr>';
   echo '<td data-title="CourseId">'.$value['NOCCourseId'].'</td>';
    echo '<td data-title="Name">'.$value['RollNumber'].'</td>';
	    echo '<td data-title="EmailId">'.$value['EmailId'].'</td>';
		
		$valsnew1 = $db_connectviewcanidate->getassign($value['NOCCourseId'],$value['RollNumber']);
		foreach($valsnew1 as $newh1=>$newkey1)
		{
			    echo '<td data-title="A1">'.$newkey1['A1'].'</td>';
				echo '<td data-title="A2">'.$newkey1['A2'].'</td>';
				echo '<td data-title="A3">'.$newkey1['A3'].'</td>';
				echo '<td data-title="A4">'.$newkey1['A4'].'</td>';
				echo '<td data-title="A5">'.$newkey1['A5'].'</td>';
				echo '<td data-title="A6">'.$newkey1['A6'].'</td>';
				echo '<td data-title="A7">'.$newkey1['A7'].'</td>';
				echo '<td data-title="A8">'.$newkey1['A8'].'</td>';
				echo '<td data-title="A9">'.$newkey1['A9'].'</td>';
				echo '<td data-title="A10">'.$newkey1['A10'].'</td>';
				echo '<td data-title="A11">'.$newkey1['A11'].'</td>';
				echo '<td data-title="A12">'.$newkey1['A12'].'</td>';
				echo '<td data-title="A13">'.$newkey1['A13'].'</td>';
				echo '<td data-title="A14">'.$newkey1['A14'].'</td>';
				echo '<td data-title="A15">'.$newkey1['A15'].'</td>';
				echo '<td data-title="A16">'.$newkey1['A16'].'</td>';
				echo '<td data-title="A17">'.$newkey1['A17'].'</td>';
				echo '<td data-title="A18">'.$newkey1['A18'].'</td>';
				echo '<td data-title="A19">'.$newkey1['A19'].'</td>';
				echo '<td data-title="A20">'.$newkey1['A20'].'</td>';
				echo '<td data-title="A21">'.$newkey1['A21'].'</td>';
				echo '<td data-title="A22">'.$newkey1['A22'].'</td>';
				echo '<td data-title="A23">'.$newkey1['A23'].'</td>';
				echo '<td data-title="A24">'.$newkey1['A24'].'</td>';
				echo '<td data-title="A25">'.$newkey1['A25'].'</td>';
				echo '<td data-title="A26">'.$newkey1['A26'].'</td>';
				echo '<td data-title="A27">'.$newkey1['A27'].'</td>';
				echo '<td data-title="A28">'.$newkey1['A28'].'</td>';
				echo '<td data-title="A29">'.$newkey1['A29'].'</td>';
				echo '<td data-title="A30">'.$newkey1['A30'].'</td>';
				echo '<td data-title="A31">'.$newkey1['A31'].'</td>';
				echo '<td data-title="A32">'.$newkey1['A32'].'</td>';
				echo '<td data-title="A33">'.$newkey1['A33'].'</td>';
				echo '<td data-title="A34">'.$newkey1['A34'].'</td>';
				echo '<td data-title="A35">'.$newkey1['A35'].'</td>';
				echo '<td data-title="A36">'.$newkey1['A36'].'</td>';
				echo '<td data-title="A37">'.$newkey1['A37'].'</td>';
				echo '<td data-title="A38">'.$newkey1['A38'].'</td>';
				echo '<td data-title="A39">'.$newkey1['A39'].'</td>';
				echo '<td data-title="A40">'.$newkey1['A40'].'</td>';
				echo '<td data-title="A41">'.$newkey1['A41'].'</td>';
				echo '<td data-title="A42">'.$newkey1['A42'].'</td>';
				echo '<td data-title="A43">'.$newkey1['A43'].'</td>';
				echo '<td data-title="A44">'.$newkey1['A44'].'</td>';

			
				
		}
			
								
								
  
  
   echo '</tr>';
  
}
    ?>  
    
  
        			
        		</tbody>
        	</table>
                  
        </div>
                     </div></div>
                    
      
          </div>
			
			
			
			
		 
		</div>

		
	</div>
      
      
              
      
     
       
        
      </div>
      
      
      
      
    </div>
  <!--end view candidate assign-->
  
  
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