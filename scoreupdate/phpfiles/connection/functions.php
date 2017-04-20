<?php



class function_list
{
  public function checkuserlogin($username,$password)
  {
    include('config.php');
    include('opendb.php');
    $user = strip_tags($username);
    $pass = strip_tags($password);
    $sql = mysqli_query($dbconn,"select * from admin_account where admin_username='".$user."' and admin_password='".$pass."' limit 1 ");
    if(mysqli_affected_rows($dbconn) > 0)
    {
      $row = mysqli_num_rows($sql);
      if($row == 1)
      {
      return true;
      }
      else
      {
        return false;
      }
    }

    include('closedb.php');
  }



//   public function scoreupload_old($filename)
//   {
//     include('config.php');
//     include('opendb.php');

//     $file = fopen($filename, "r");

//     $firstline = 0;
// 	  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
// 	 {
//     		$emp0 =	trim($emapData[0]);
//       	$emp1 =	trim($emapData[1]);
//       	$emp2 =	trim($emapData[2]);
//       	$emp3 =	trim($emapData[3]);
//       	$emp4 =	trim($emapData[4]);
//       	$emp5 =	trim($emapData[5]);
//       	$emp6 =	trim($emapData[6]);
//       	$emp7 =	trim($emapData[7]);
//       	$emp8 =	trim($emapData[8]);
//         $emp9 = trim($emapData[9]);
//         $emp10 = trim($emapData[10]);
//         $emp11 = trim($emapData[11]);
//         $emp12 = trim($emapData[12]);
//       	$emp13 = trim($emapData[13]);
//       	$emp14 = trim($emapData[14]);
//       	$emp15 = trim($emapData[15]);
//       	$emp16 = trim($emapData[16]);
//       	$emp17 = trim($emapData[17]);
//       	$emp18 = trim($emapData[18]);
//       	$emp19 = trim($emapData[19]);
//         $emp20 = trim($emapData[20]);
//         $emp21 = trim($emapData[21]);
//         $emp22 = trim($emapData[22]);
//         $emp23 = trim($emapData[23]);
//         $emp24 = trim($emapData[24]);
//         $emp25 = trim($emapData[25]);
//         $emp26 = trim($emapData[26]);
//         $emp27 = trim($emapData[27]);
//         $emp28 = trim($emapData[28]);
// /*      	$emp20 =	$emapData[20];
//       	$emp21 =	$emapData[21];
//       	$emp22 =	$emapData[22];
//       	$emp23 =	$emapData[23];
//       	$emp24 =	$emapData[24];
//       	$emp25 =	$emapData[25];
//       	$emp26 =	$emapData[26];*/


// 	      $firstline++;
//         if($firstline != 1)
//         {
//             //$sql = "INSERT INTO `users`(`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL,'".$emp1."','".$emp21."',NOW(),NOW())";
//             $sql2 = "INSERT INTO `userprofiles`(`id`, `Name`, `RollNumber`, `DOB`, `user_id`, `Photo_path`, `Gender`, `Role`, `CollegeName`, `CollegeStateName`, `CollegeDistrictName`, `OrganizationName`, `MobileNumber`, `AlternateMobileNumber`, `AddressLine1`, `AddressLine2`, `AddressLine3`, `AddressStateName`, `AddressDistrictName`, `AddressPincode`, `CollegeId`, `Registered_type`, `created_at`, `updated_at`) VALUES (NULL,'".$emp0."','".$emp1."','".$emp2."','".$emp3."','".$emp4."','".$emp5."','".$emp6."','".$emp7."','".$emp8."','".$emp9."','".$emp10."','".$emp11."','".$emp12."','".$emp13."','".$emp14."','".$emp15."','".$emp16."','".$emp17."','".$emp18."','".$emp19."','".$emp20."',NOW(),NOW())";
//             //return $sql2;exit;
//             //$sql3 = "INSERT INTO `UserCourseExamScores`(`id`, `user_id`, `CourseId`, `RollNumber`, `ScoreFromAssignment`, `ExamScore`, `FinalScore`, `KnowAboutCourse`, `TestCenterename`, `TestCenterCity`, `TestCenterState`, `Amountpaid`, `Application_number`, `created_at`, `updated_at`) VALUES (NULL,'".$emp3."','".$emp22."','".$emp1."','0','0','0','".$emp23."','".$emp24."','".$emp25."','".$emp26."','".$emp27."','".$emp28."',NOW(),NOW())";
//             //$result = mysqli_query($dbconn,$sql);
// 	          $result2 = mysqli_query($dbconn,$sql2);
//             //$result3 = mysqli_query($dbconn,$sql3);
//             if(mysqli_affected_rows($dbconn) == 0)
// 				    {
//               return mysqli_error($dbconn);

// 				    }
//         }
//       }
// 			fclose($file);
// 	    return true;
//       include('closedb.php');
//     }



         public function asignmentscore_updated($filenameschore)
          {
           // error_reporting(0);

            include('config.php');
            include('opendb.php');

            $asignmentscore = fopen($filenameschore, "r");

            while (($data = fgetcsv($asignmentscore, 10000, ",")) !== FALSE)
            {

              $courseid=trim($data[0]);
              $rolenumber=trim($data[1]);
              $Emailid=trim($data[2]);
              $a1=trim($data[3]);
              $a2=trim($data[4]);
              $a3=trim($data[5]);
              $a4=trim($data[6]);
              $a5=trim($data[7]);
              $a6=trim($data[8]);
              $a7=trim($data[9]);
              $a8=trim($data[10]);
              $a9=trim($data[11]);
              $a10=trim($data[12]);
              $a11=trim($data[13]);
              $a12=trim($data[14]);
              // $a13=trim($data[15]);
              // $a14=trim($data[16]);
              // $a15=trim($data[17]);
              // $a16=trim($data[18]);
              // $a17=trim($data[19]);
              // $a18=trim($data[20]);
              // $a19=trim($data[21]);
              // $a20=trim($data[22]);
              // $a21=trim($data[23]);
              // $a22=trim($data[24]);
              // $a23=trim($data[25]);
              // $a24=trim($data[26]);
              // $a25=trim($data[27]);
              // $a26=trim($data[28]);
              // $a27=trim($data[29]);
              // $a28=trim($data[30]);
              // $a29=trim($data[31]);
              // $a30=trim($data[32]);
              // $a25=trim($data[27]);
              // $a25=trim($data[27]);
              // $a25=trim($data[27]);
              // $a25=trim($data[27]);
              // echo $a2;
              // exit;



             // $sqls="INSERT INTO assignment_scores(`NOCCourseId`, `RollNumber`, `EmailId`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, A9, A10, A10, A11, A12, A13, A14, A15, A16, A17, A18, A19, A20, A21, A22, A23, A24, A25, A26, A27, A28, A29, A30) VALUES ('$courseid','$rolenumber','$Emailid','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30')";
              $sqls="INSERT INTO assignment_scores(`NOCCourseId`, `RollNumber`, `EmailId`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`) VALUES ('$courseid','$rolenumber','$Emailid','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8')";

             //'$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30'

             //


              //$sqls="INSERT INTO assignment_scores(`NOCCourseId`, `RollNumber`, `EmailId`) VALUES ('$courseid','$rolenumber','$Emailid')";
              $insertvalues=mysqli_query($dbconn,$sqls);
                    if($insertvalues == true)
                    {
                      echo "Successfully updated";
                      echo $rolenumber;

                    }

            }

            fclose($asignmentscore);
          return true;
          include('closedb.php');


       }


      public function scoreupload($filename)
      {
        include('config.php');
        include('opendb.php');



        $handle = fopen($filename, "r");
        // loop over rows in data file
        while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
        // trim the first column
        $emp0 = trim($data[0]);
        $emp1 = trim($data[1]);
        $emp2 = trim($data[2]);
        $emp3 = trim($data[3]);
        $emp4 = trim($data[4]);
        $emp5 = trim($data[5]);
        $emp6 = trim($data[6]);
        $emp7 = trim($data[7]);
        // $emp8 = trim($data[8]);
        // $emp9 = trim($data[9]);
        // $emp10 = trim($data[10]);
        // $emp11 = trim($data[11]);
        // $emp12 = trim($data[12]);
        // $emp13 = trim($data[13]);
        // $emp14 = trim($data[14]);
        // $emp15 = trim($data[15]);
        // $emp16 = trim($data[16]);
        // $emp17 = trim($data[17]);
        // $emp18 = trim($data[18]);
        // $emp19 = trim($data[19]);
        // $emp20 = trim($data[20]);
        // $emp21 = trim($data[21]);
        // $emp22 = trim($data[22]);

        $selectreg="SELECT * FROM registration_details where Application_number ='$emp2'";
        $select_db=mysqli_query($dbconn,$selectreg);
        $fetchdata=mysqli_fetch_assoc($select_db);
        $names=$fetchdata['Name'];
        $email=$fetchdata['Emailid'];
        $dob=$fetchdata['DOB'];
        $gender=$fetchdata['Gender'];

        $mobno=$fetchdata['Mobno'];
        $amobno=$fetchdata['Amobno'];
        $role=$fetchdata['Role'];
        $collegename=str_replace("'", "",$fetchdata['Name_of_organization']);
        $collegestate=$fetchdata['oraganization_state'];
        $collegecity=$fetchdata['oraganization_city'];
        $collegeothercity=$fetchdata['organization_othercity'];

        $Certificate_addressline1=str_replace("'", "",$fetchdata['Certificate_addressline1']);
        $state=$fetchdata['State'];
        $city=$fetchdata['City'];
        $pincode=$fetchdata['pincode'];
        $colegeid=$fetchdata['colegeid'];
        $testcity=$fetchdata['primarycity1'];
        $teststate=$fetchdata['primarystate1'];
        $KnowAboutCourse=$fetchdata['Know_about_course'];
        $paymentmethod=$fetchdata['Payment_method'];
        $amount=$fetchdata['Amount'];
        $timeline=$fetchdata['Timeline'];

        $photo=$fetchdata['photo'];

        $str = str_replace("'", "", $str);
        // SQL

        // $SQL="INSERT INTO noc_testscores(`CourseId`, `RollNumber`,`Name`, `EmailId`, `DOB`, `photopath`,`Mock_exam_score`, `ScoreAssignment1`, `ScoreAssignment2`, `ScoreAssignment3`, `ScoreAssignment4`, `ScoreAssignment5`, `ScoreAssignment6`, `ScoreAssignment7`, `ScoreAssignment8`, `ScoreAssignment9`, `ScoreAssignment10`,`ScoreFromAssignment`,`ExamScore`, `FinalScore`, Gender, Role, CollegeName, CollegeStateName, CollegeDistrictName, MobileNumber, AlternateMobileNumber, AddressLine1, AddressStateName, AddressDistrictName, AddressPincode, CollegeId, Amount, Timeline) VALUES ('$emp0','$emp1','$emp2','$emp3','$dob','$photo','$emp6','$emp7','$emp8','$emp9','$emp10','$emp11','$emp12','$emp13','$emp14','$emp15','$emp16','$emp17','$emp18','$emp19','$gender','$role','$collegename','$collegestate','$collegecity','$mobno','$amobno','$Certificate_addressline1','$state','$city','$pincode','$colegeid','$amount', '$timeline')";

        $SQL="INSERT INTO noc_testscores(`CourseId`, `RollNumber`,`Name`, `EmailId`, `DOB`, `photopath`,`ScoreFromAssignment`,`ExamScore`, `FinalScore`, Gender, Role, CollegeName, CollegeStateName, CollegeDistrictName, MobileNumber, AlternateMobileNumber, AddressLine1, AddressStateName, AddressDistrictName, AddressPincode, Application_number, CollegeId, Amount, Timeline) VALUES ('$emp0','$emp3','$emp1','$emp4','$dob','$photo','$emp5','$emp6','$emp7','$gender','$role','$collegename','$collegestate','$collegecity','$mobno','$amobno','$Certificate_addressline1','$state','$city','$pincode','$emp2','$colegeid','$amount','$timeline')";



        // insert into database
          $result3 = mysqli_query($dbconn,$SQL);

                if($result3 == true)
                {
                  echo "Successfully updated";

                }




        }


        fclose($handle);

        //exit;



    //     $file = fopen($filename, "r");

    //     $firstline = 0;
    //     while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
    //    {
    //         $emp0 = trim($emapData[0]);
    //         $emp1 = trim($emapData[1]);
    //         $emp2 = trim($emapData[2]);
    //         $emp3 = trim($emapData[3]);
    //         $emp4 = trim($emapData[4]);
    //         $emp5 = trim($emapData[5]);
    //         $emp6 = trim($emapData[6]);
    //         $emp7 = trim($emapData[7]);
    //         $emp8 = trim($emapData[8]);
    //         $emp9 = trim($emapData[9]);
    //         $emp10 = trim($emapData[10]);
    //         $emp11 = trim($emapData[11]);
    //         $emp12 = trim($emapData[12]);
    //         $emp13 = trim($emapData[13]);
    //         $emp14 = trim($emapData[14]);
    //         $emp15 = trim($emapData[15]);
    //         $emp16 = trim($emapData[16]);
    //         $emp17 = trim($emapData[17]);
    //         $emp18 = trim($emapData[18]);
    //         $emp19 = trim($emapData[19]);
    //         $emp20 = trim($emapData[20]);
    //         $emp21 = trim($emapData[21]);
    //         $emp22 = trim($emapData[22]);
    //         //$emp23 = trim($emapData[23]);
    //         //$emp24 = trim($emapData[24]);
    //         // $emp25 = trim($emapData[25]);
    //         // $emp26 = trim($emapData[26]);
    //         // $emp27 = trim($emapData[27]);
    //         // $emp28 = trim($emapData[28]);
    // /*      $emp20 =  $emapData[20];
    //         $emp21 =  $emapData[21];
    //         $emp22 =  $emapData[22];
    //         $emp23 =  $emapData[23];
    //         $emp24 =  $emapData[24];
    //         $emp25 =  $emapData[25];
    //         $emp26 =  $emapData[26];*/

    //         $selectreg="SELECT * FROM registration_details where Application_number ='$emp22'";
    //         $select_db=mysqli_query($dbconn,$selectreg);
    //         $fetchdata=mysqli_fetch_assoc($select_db);
    //         $names=$fetchdata['Name'];
    //         $email=$fetchdata['Emailid'];
    //         $dob=$fetchdata['DOB'];
    //         $gender=$fetchdata['Gender'];

    //         $mobno=$fetchdata['Mobno'];
    //         $amobno=$fetchdata['Amobno'];
    //         $role=$fetchdata['Role'];
    //         $collegename=$fetchdata['Name_of_organization'];
    //         $collegestate=$fetchdata['oraganization_state'];
    //         $collegecity=$fetchdata['oraganization_city'];
    //         $collegeothercity=$fetchdata['organization_othercity'];

    //         $Certificate_addressline1=$fetchdata['Certificate_addressline1'];
    //         $state=$fetchdata['State'];
    //         $city=$fetchdata['City'];
    //         $pincode=$fetchdata['pincode'];
    //         $colegeid=$fetchdata['colegeid'];
    //         $testcity=$fetchdata['primarycity1'];
    //         $teststate=$fetchdata['primarystate1'];
    //         $KnowAboutCourse=$fetchdata['Know_about_course'];
    //         $paymentmethod=$fetchdata['Payment_method'];
    //         $amount=$fetchdata['Amount'];

    //         $photo=$fetchdata['photo'];

    //         $firstline++;

    //         // if($firstline = 1)
    //         // // if($firstline != 1)
    //         // {


    //             //$sql = "INSERT INTO `users`(`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL,'".$emp1."','".$emp21."',NOW(),NOW())";
    //             //$sql2 = "INSERT INTO `noc_testscores`(`id`, `Name`, `RollNumber`, `DOB`, `user_id`, `Photo_path`, `Gender`, `Role`, `CollegeName`, `CollegeStateName`, `CollegeDistrictName`, `OrganizationName`, `MobileNumber`, `AlternateMobileNumber`, `AddressLine1`, `AddressLine2`, `AddressLine3`, `AddressStateName`, `AddressDistrictName`, `AddressPincode`, `CollegeId`, `Registered_type`, `created_at`, `updated_at`) VALUES (NULL,'".$emp0."','".$emp1."','".$emp2."','".$emp3."','".$emp4."','".$emp5."','".$emp6."','".$emp7."','".$emp8."','".$emp9."','".$emp10."','".$emp11."','".$emp12."','".$emp13."','".$emp14."','".$emp15."','".$emp16."','".$emp17."','".$emp18."','".$emp19."','".$emp20."',NOW(),NOW())";



    //           $sql3="INSERT INTO noc_testscores(`CourseId`, `RollNumber`,`Name`, `EmailId`, `DOB`, `photopath`,`Mock_exam_score`, `ScoreAssignment1`, `ScoreAssignment2`, `ScoreAssignment3`, `ScoreAssignment4`, `ScoreAssignment5`, `ScoreAssignment6`, `ScoreAssignment7`, `ScoreAssignment8`, `ScoreAssignment9`, `ScoreAssignment10`,`ScoreFromAssignment`,`ExamScore`, `FinalScore`, Gender, Role, CollegeName, CollegeStateName, CollegeDistrictName, MobileNumber, AlternateMobileNumber, AddressLine1, AddressStateName, AddressDistrictName, AddressPincode) VALUES ('$emp0','$emp1','$emp2','$emp3','$dob','$photo','$emp6','$emp7','$emp8','$emp9','$emp10','$emp11','$emp12','$emp13','$emp14','$emp15','$emp16','$emp17','$emp18','$emp19','$gender','$role','$collegename','$collegestate','$collegecity','$mobno','$amobno','$Certificate_addressline1','$state','$city','$pincode')";

    //             $result3 = mysqli_query($dbconn,$sql3);

    //             if($result3 == true)
    //             {
    //               echo $mobno;

    //             }
    //             // if(mysqli_affected_rows($dbconn) == 0)
    //             // {
    //             //   return mysqli_error($dbconn);

    //             // }

    //         //}

    //       }
    //       fclose($file);


          return true;
          include('closedb.php');
        }



    public function scoreupdate($filename)
  {
    include('config.php');
    include('opendb.php');

    $file = fopen($filename, "r");

    $firstline = 0;
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                $firstline++;
                if($firstline != 1)
           {
            $sql = "update UserCourseExamScores set ScoreFromAssignment='".$emapData[2]."',ExamScore='".$emapData[3]."',FinalScore='".$emapData[4]."' where RollNumber='".$emapData[1]."' and CourseId='".$emapData[0]."' ";
            $result = mysqli_query($dbconn,$sql);
            if(! $result )
				  {
            return mysqli_error();
				  }
        }

	         }
	         fclose($file);
	         return true;

    include('closedb.php');

  }



    public function assignmentupdate($filename,$total_assign,$CourseId)
  {
    include('config.php');
    include('opendb.php');
      $file = fopen($filename, "r");

    $firstline = 0;
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                 $assign_valuearray = '';


      for($x = 1; $x<=$total_assign; $x++)
      {


        $assign_valuearray .= "A".$x."=".$emapData[$x].",";

      }
    $val = substr($assign_valuearray,0,-1);



                $firstline++;
                if($firstline != 1)
           {

    //$sql = "update UserCourseAssignmentSelection set $val where RollNumber='$emapData[0]' and NOCCourseId='$CourseId'  ";

            $sql = "update assignment_scores set $val where RollNumber='$emapData[0]' and NOCCourseId='$CourseId'  ";

      $result = mysqli_query($dbconn,$sql);



     if(! $result )
				{

       return mysqli_error($dbconn);

				}
                }

	         }
	         fclose($file);
	         return true;

    include('closedb.php');

  }


    public function assignmentweekupdate($total_assign,$CourseId,$total_week,$field_array)
  {
    include('config.php');
    include('opendb.php');

    // echo $total_assign."dgsdg<br>".$CourseId."dgsdg<br>".$total_week;
    // exit;




for($i = 1; $i <=$total_week; $i++ )
{
  $y = $i - 1;
      $sql = "INSERT INTO assignment_week (NOCCourseId,Total_assignments,Weeks,Assignment_map)values('".$CourseId."','".$total_assign."','".$i."','".$field_array[$y]."')";
  $result = mysqli_query($dbconn,$sql);

  if(! $result)
  {
    return mysqli_error();
  }
}
    return true;
    include('closedb.php');

  }

  public function Logicforcourses($CourseId,$logiccourse)
  {
    include('config.php');
    include('opendb.php');

      $logic_count = count($logiccourse);
    $li_link='';
    for($i=1; $i<=$logic_count; $i++)
    {
      $y = $i-1;
      $li_link .= '<li>'.$logiccourse[$y].'</li>';
    }

    $list_concat = '<ul>'.$li_link.'</ul>';


      $sql = "update noc_course set NOCAssignmentLogicRemarks= '".$list_concat."' where NOCCourseId='".$CourseId."' ";
  $result = mysqli_query($dbconn,$sql);

  if(! $result)
  {
    return mysqli_error();
  }

    return true;
    include('closedb.php');

  }

  public function getcourselist($courseid)
  {
     include('config.php');
     include('opendb.php');

    $sql = "select * from noc_course where NOCCourseId like '".$courseid."'";
  $result = mysqli_query($dbconn,$sql);

    if(mysqli_affected_rows($dbconn) > 0)
    {
      if(mysqli_num_rows($result) > 0)
      {
    while($rows = mysqli_fetch_array($result))
    {
      return $rows;
    }
      }
      else
    {
      return false;
    }
    }



     include('closedb.php');



  }


   public function getcandidatesdata()
  {
     include('config.php');
    include('opendb.php');

    $sql = "select CourseId, RollNumber, Name, EmailId,DOB,ScoreFromAssignment, ExamScore, FinalScore from noc_testscores";
  $result = mysqli_query($dbconn,$sql);

    if(mysqli_affected_rows($dbconn) > 0)
    {
		$newrow = array();
      if(mysqli_num_rows($result) > 0)
      {
    while($rows = mysqli_fetch_array($result))
    {
      $newrow[] = $rows;
    }

	return $newrow;
      }
      else
    {
      return false;
    }
    }

     include('closedb.php');

  }

  public function viewcoursees($courseid)
  {
    include('config.php');
    include('opendb.php');


  $sql = "select * from noc_testscores where CourseId='$courseid'";
  $result = mysqli_query($dbconn,$sql);
  while($rows=mysqli_fetch_assoc($result))
  {
    $values=$rows['CourseId'];
  }

  //print_r($values);
  //exit;




  include('closedb.php');

  }


     public function getcandidateassign()
  {
     include('config.php');
    include('opendb.php');

    $sql = "SELECT NOCCourseId,RollNumber,EmailId FROM assignment_scores";
  $result = mysqli_query($dbconn,$sql);

    if(mysqli_affected_rows($dbconn) > 0)
    {
		$newrow = array();
      if(mysqli_num_rows($result) > 0)
      {
    while($rows = mysqli_fetch_array($result))
    {
      $newrow[] = $rows;
    }

	return $newrow;
      }
      else
    {
      return mysqli_error();
    }
    }



     include('closedb.php');



  }

   public function getassign($courseId,$rollnumber)
  {
     include('config.php');
    include('opendb.php');

    $sql = "SELECT A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,A11,A12,A13,A14,A15,A16,A17,A18,A19,A20,A21,A22,A23,A24,A25,A26,A27,A28,A29,A30,A31,A32,A33,A34,A35,A36,A37,A38,A39,A40,A41,A42,A43,A44,A45,A46,A47,A48,A49,A50,A51 FROM assignment_scores where RollNumber='".$rollnumber."' and NOCCourseId='".$courseId."' ";
  $result = mysqli_query($dbconn,$sql);

    if(mysqli_affected_rows($dbconn) > 0)
    {
		$newrow = array();
      if(mysqli_num_rows($result) > 0)
      {
    while($rows = mysqli_fetch_array($result))
    {
      $newrow[] = $rows;
    }

	return $newrow;
      }
      else
    {
      return mysqli_error();
    }
    }



     include('closedb.php');



  }

  // public function courseverify($courseId)
  // {
  //   include('config.php');
  //   include('opendb.php');

  //   $sql = "SELECT * FROM `noc_testscores` WHERE CourseId = '$courseId'"
  //   $result = mysql_query($dbconn,$sql);
  // }





   public function enabledisable($courseid,$fieldtype,$newstatus)
  {
     include('config.php');
    include('opendb.php');

     if($fieldtype == 'examscore')
     {

       $sql = "update noc_course set NOCEnableExamScores='".$newstatus."' where NOCCourseId like '".$courseid."'";
     }

         if($fieldtype == 'clogin')
     {

       $sql = "update noc_course set NOCEnableCandidateLogin='".$newstatus."' where NOCCourseId like '".$courseid."'";
     }

       if($fieldtype == 'download')
     {

       $sql = "update noc_course set NOCEnableDownloadCertificate:='".$newstatus."' where NOCCourseId like '".$courseid."'";
     }

       if($fieldtype == 'cstatus')
     {

       $sql = "update noc_course set NOCEnableCertificatestatus:='".$newstatus."' where NOCCourseId like '".$courseid."'";
     }



  $result = mysqli_query($dbconn,$sql);

    if(mysqli_affected_rows($dbconn) > 0)
    {
      $affected = mysqli_affected_rows($dbconn);
      if($affected > 0)
      {
      return 1;
      }
      else
    {
      return 0;
    }

    }



     include('closedb.php');



  }

}


?>
