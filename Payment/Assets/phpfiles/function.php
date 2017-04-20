<?php


include_once('Assets/phpfiles/dbconnect.php');


$conn = new DB_con();
class select_reg_open
{

 
 public function select()
 {
  $res=mysqli_query("SELECT * FROM Registration_form a, noc_course b where a.Reg_CourseId = b.NOCCourseId order by b.NOCCourseName");
  return $res;
 }
	
public function examdate()
 {
  $dat=mysqli_query("SELECT b.NOCExamDt1,b.NOCExamDt2 FROM Registration_form a, noc_course b where a.Reg_CourseId = b.NOCCourseId group by b.NOCExamDt1,b.NOCExamDt2");
  return $dat;
 }
	
public function subject($id1)
{
	$sub_query1 = mysqli_query("select Amount from Registration_form where Reg_CourseId= '".$id1."'") ;
	return $sub_query1;
}
	
	
public function course2amount($cid,$cid2)
{
	$select_amt2 = mysqli_query("select sum(Amount) as total from Registration_form where Reg_CourseId IN ('".$cid."', '".$cid2."')");
	return $select_amt2;
}

public function oneamount($cid)
{
	$select_amt1 = mysqli_query("select Amount from Registration_form where Reg_CourseId = '".$cid."'");
	return $select_amt1;
}

public function countdetails()
{
	$totalcount = mysqli_query("select * from Registration_details");
	$num_row = mysqli_num_rows($totalcount);
	return $num_row;
	
}

public function lastinsertid()
{
	$lastid = mysqli_query("select Application_number from Registration_details order by Application_number desc limit 1");
	return $lastid;
}
	
public function insert($table, $fields = array())
{
	if(count($fields))
	{
		$keys = array_keys($fields);
		$values = array_values($fields);
		
		
		$sql = mysqli_query("INSERT INTO Registration_details (`".implode('` ,`',$keys)."`) VALUES('".implode("' ,'",$values)."')");
		
	  if($sql > 0) {
            return true;
        }
		
	}
	return false;
}
  
  public function transinsert($table, $fields = array())
  {
    	if(count($fields))
	{
		$keys = array_keys($fields);
		$values = array_values($fields);
		
		
		$sql = mysqli_query("INSERT INTO $table (`".implode('` ,`',$keys)."`) VALUES('".implode("' ,'",$values)."')");
		
	  if($sql > 0) {
            return true;
        }
		
	}
	return false;
  }
  
  public function checksumupdate($checksum,$transactionkey,$appno)
  {
    $sql = mysqli_query("update noctransaction_table set applicationchecksum='".$checksum."',applicationpaymenttoken='".$transactionkey."' where ApplicationNumber='".$appno."' ");
    if($sql > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function checkapp($appid)
  {
    $sql=mysqli_query("SELECT applicationpaymenttoken, applicationchecksum FROM noctransaction_table where ApplicationNumber = '".$appid."'");
    if($sql > 0)
    {
      $num = mysqli_num_rows($sql);
      if($num > 0)
      {
        return 1;
      }
      else
      {
        return 0;
      }
    }
  }
  
  public function checksumvalidate($applicationpaymenttoken,$checksum)
  {
    $sql=mysqli_query("SELECT * FROM noctransaction_table where applicationpaymenttoken ='".$applicationpaymenttoken."'");
    if($sql > 0)
    {
      $num = mysqli_num_rows($sql);
      if($num > 0)
      {
        return 1;
      }
      else
      {
        return 0;
      }
    }
    
  }
  
  
  public function update($table,$appno, $fields = array())
{
	if(count($fields))
	{
		$keys = array_keys($fields);
		$values = array_values($fields);
		
		
		//$sql = mysqli_query("UPDATE bulkupload_students (`".implode('` ,`',$keys)."`) VALUES('".implode("' ,'",$values)."')");
		//$sql = "UPDATE bulkupload_students SET `".implode('` ,`',$keys)."` = $values where Emailid = '".$Email."' and CollegeId='".$cid."' ";
      
      $query = "UPDATE $table SET";

foreach ($fields as $name => $value) {
    $query .= ' '.$name.' = "'.$value.'",'; // the :$name part is the placeholder, e.g. :zip
   
}

     
$query = substr($query, 0, -1); // remove last , and add a ;
      
       $newquery = $query." WHERE ApplicationNumber='".$appno."' ";
	$sql = mysqli_query($newquery);
      if($sql > 0)
      {
	  
     return true;
      }
      else
      {
        return false;
      }
		
	}
  return false;
	
}
  
  
  public function checktoken($appno)
  {
     $sql=mysqli_query("SELECT * FROM Registration_details a, noctransaction_table b where a.Application_number=b.ApplicationNumber and a.Application_number = '".$appno."'");
      if($sql > 0)
      {
        return $sql;
      }
  }
	

	
	
}

?>
