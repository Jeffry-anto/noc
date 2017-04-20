		<?php include('Connections/local_conn.php');
		$couseidArray = array();
		$sepcourse = mysqli_query($dbconn,"select NOCCourseId from noc_course where NOCPeriod LIKE '%Sep 2016'");
		while($seprow = mysqli_fetch_assoc($sepcourse))
		{
			$couseidArray[] = $seprow['NOCCourseId'];
		}

		$octcourse = mysqli_query($dbconn,"select NOCCourseId from noc_course where NOCPeriod LIKE '%Oct 2016'");
		while($octrow = mysqli_fetch_assoc($octcourse))
		{
			$couseidArray[] = $octrow['NOCCourseId'];
		}

		$mainArray = array();
		foreach ($couseidArray as $courseid1)
		{
			$nocperiod_query = mysqli_query($dbconn,"select a.NOCPeriod,NOCCourseId,NOCCourseName from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCCourseId='".$courseid1."' limit 1");
			if(mysqli_affected_rows($dbconn) > 0)
			{
				$period_check = mysqli_num_rows($nocperiod_query);
				if($period_check > 0)
				{
					while($fetch_nocperiod = mysqli_fetch_array($nocperiod_query))
					{
						$period = $fetch_nocperiod['NOCPeriod'];
						$courseId = $fetch_nocperiod['NOCCourseId'];
						if($period == 'Jul-Sep 2016' || $period == 'Jul-Oct 2016' || $period == 'Sep-Oct 2016')
						{



									$gettotalQuery = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and FinalScore >= 40");
									$certified_candidates = mysqli_num_rows($gettotalQuery);
									if($certified_candidates <= 10)
									{
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit 1");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$list = array();
												$list[] = $fetch_toppers2['RollNumber'];
												$list[] = 'Topper';
												$list[] = $fetch_toppers2['EmailId'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['FinalScore'];
												$list[] = $fetch_toppers2['CollegeName'];
												$list[] = $fetch_toppers2['NOCCourseName'];
												$list[] = $fetch_toppers2['MobileNumber'];
												$list[] = $fetch_toppers2['CollegeDistrictName'];
												$list[] = $fetch_toppers2['TestCenterCity'];
/*												$list[] = $fetch_toppers2['NOCPeriod'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['CollegeName'];*/
												$mainArray[] = $list;
											}
										}
									} else if($certified_candidates > 10 && $certified_candidates <=50){
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit 2");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$list = array();
												$list[] = $fetch_toppers2['RollNumber'];
												$list[] = 'Topper';
												$list[] = $fetch_toppers2['EmailId'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['FinalScore'];
												$list[] = $fetch_toppers2['CollegeName'];
												$list[] = $fetch_toppers2['NOCCourseName'];
												$list[] = $fetch_toppers2['MobileNumber'];
												$list[] = $fetch_toppers2['CollegeDistrictName'];
												$list[] = $fetch_toppers2['TestCenterCity'];
/*												$list[] = $fetch_toppers2['NOCPeriod'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['CollegeName'];*/
												$mainArray[] = $list;
											}
										}
									} else if($certified_candidates > 50 && $certified_candidates <=100)
									{
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit 5");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) >0)
										{
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$list = array();
												$list[] = $fetch_toppers2['RollNumber'];
												$list[] = 'Topper';
												$list[] = $fetch_toppers2['EmailId'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['FinalScore'];
												$list[] = $fetch_toppers2['CollegeName'];
												$list[] = $fetch_toppers2['NOCCourseName'];
												$list[] = $fetch_toppers2['MobileNumber'];
												$list[] = $fetch_toppers2['CollegeDistrictName'];
												$list[] = $fetch_toppers2['TestCenterCity'];
/*												$list[] = $fetch_toppers2['NOCPeriod'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['CollegeName'];*/
												$mainArray[] = $list;
											}
										}
									} else if($certified_candidates > 100)
									{
										$onepercent = round((1/100) * $certified_candidates);
										$topperMarksArray = array();
										$onePercentArray = array();
										$twoPercentArray = array();
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit $onepercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											echo "<div class='col-md-12 alert alert-success' style='text-align:center;font-weight:bold;font-size: 17px;'>Top 1 % of Candidates</div>";
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$onePercentArray[] = $fetch_toppers2['EmailId'];
												$list = array();
												$list[] = $fetch_toppers2['RollNumber'];
												$list[] = 'Top 1 %';
												$list[] = $fetch_toppers2['EmailId'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['FinalScore'];
												$list[] = $fetch_toppers2['CollegeName'];
												$list[] = $fetch_toppers2['NOCCourseName'];
												$list[] = $fetch_toppers2['MobileNumber'];
												$list[] = $fetch_toppers2['CollegeDistrictName'];
												$list[] = $fetch_toppers2['TestCenterCity'];
/*												$list[] = $fetch_toppers2['NOCPeriod'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['CollegeName'];*/
												$mainArray[] = $list;
											}
										}
										
										$twopercent = round((2/100) * $certified_candidates);
										$topperMarksArray = array();
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit $twopercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											echo "<br><div class='col-md-12 alert alert-success' style='text-align:center;font-weight:bold;font-size: 17px;'>Top 2 % of Candidates</div>";
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$twoPercentArray[] = $fetch_toppers2['EmailId'];
												if(in_array($fetch_toppers2['EmailId'],$onePercentArray)==0)
												{ 
													$list = array();
													$list[] = $fetch_toppers2['RollNumber'];
													$list[] = 'Top 2 %';
													$list[] = $fetch_toppers2['EmailId'];
													$list[] = $fetch_toppers2['CourseId'];
													$list[] = $fetch_toppers2['FinalScore'];
													$list[] = $fetch_toppers2['CollegeName'];
													$list[] = $fetch_toppers2['NOCCourseName'];
													$list[] = $fetch_toppers2['MobileNumber'];
													$list[] = $fetch_toppers2['CollegeDistrictName'];
													$list[] = $fetch_toppers2['TestCenterCity'];
/*													$list[] = $fetch_toppers2['NOCPeriod'];
													$list[] = $fetch_toppers2['CourseId'];
													$list[] = $fetch_toppers2['CollegeName'];*/
													$mainArray[] = $list;
												}
											}
										}
										
										$fivepercent = round((5/100) * $certified_candidates);
										$getCandidates = mysqli_query($dbconn,"select FinalScore from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' order by FinalScore DESC limit $fivepercent");
										while($topperMarks = mysqli_fetch_assoc($getCandidates))
										{
											if($topperMarks['FinalScore'] >= 60)
											{
												$topperMarksArray[] = $topperMarks['FinalScore'];
											}
										}
										if(count($topperMarksArray) > 0)
										{
											echo "<br><div class='col-md-12 alert alert-success' style='text-align:center;font-weight:bold;font-size: 17px;'>Top 5 % of Candidates</div>";
											$fivePercentArray = array();
											$listnew = "'". implode("', '", $topperMarksArray) ."'";
											$topperQuery = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and b.CourseId='".$courseId."' and b.FinalScore IN ($listnew) order by b.FinalScore desc");
											while($fetch_toppers2 = mysqli_fetch_array($topperQuery))
											{ 
												$fivePercentArray[] = $fetch_toppers2['EmailId'];
												if(in_array($fetch_toppers2['EmailId'],$twoPercentArray)==0)
												{ 
													$list = array();
													$list[] = $fetch_toppers2['RollNumber'];
													$list[] = 'Top 5 %';
													$list[] = $fetch_toppers2['EmailId'];
													$list[] = $fetch_toppers2['CourseId'];
													$list[] = $fetch_toppers2['FinalScore'];
													$list[] = $fetch_toppers2['CollegeName'];
												$list[] = $fetch_toppers2['NOCCourseName'];
												$list[] = $fetch_toppers2['MobileNumber'];
												$list[] = $fetch_toppers2['CollegeDistrictName'];
												$list[] = $fetch_toppers2['TestCenterCity'];
/*												$list[] = $fetch_toppers2['NOCPeriod'];
												$list[] = $fetch_toppers2['CourseId'];
												$list[] = $fetch_toppers2['CollegeName'];*/
													$mainArray[] = $list;
												}
											}
										}
									}
						} else {
							$toppers_query = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseid1."' and b.FinalScore >=90 order by b.FinalScore desc");
							if(mysqli_num_rows($toppers_query) > 0)
							{
								while($fetch_toppers = mysqli_fetch_array($toppers_query))
								{ 
									$list = array();
									$list[] = $fetch_toppers['RollNumber'];
									$list[] = 'Topper';
									$list[] = $fetch_toppers['EmailId'];
									$list[] = $fetch_toppers['CourseId'];
									$list[] = $fetch_toppers['FinalScore'];
									$list[] = $fetch_toppers['CollegeName'];
												$list[] = $fetch_toppers['NOCCourseName'];
												$list[] = $fetch_toppers['MobileNumber'];
												$list[] = $fetch_toppers['CollegeDistrictName'];
												$list[] = $fetch_toppers['TestCenterCity'];
/*												$list[] = $fetch_toppers['NOCPeriod'];
												$list[] = $fetch_toppers['CourseId'];
												$list[] = $fetch_toppers['CollegeName'];*/
									$mainArray[] = $list;
								}
/*									foreach ($mainArray as $main) {
										echo $main[0]."<br>";
									}*/
							} else {
								$arry = array();
								$toppers_query3 = mysqli_query($dbconn,"select FinalScore from noc_testscores where CourseId='".$courseId."' and FinalScore >=50 order by FinalScore desc limit 10 ");
								while($fetch_toppers3 = mysqli_fetch_array($toppers_query3))
								{
									$arry[]=$fetch_toppers3['FinalScore'];
								}
								$list = "'". implode("', '", $arry) ."'";
								$toppers_query2 = mysqli_query($dbconn,"select * from noc_course a, noc_testscores b where a.NOCCourseId=b.CourseId and a.NOCPeriod='".$period."' and b.CourseId='".$courseId."' and b.FinalScore IN($list) order by b.FinalScore desc");
								while($fetch_toppers2 = mysqli_fetch_array($toppers_query2))
								{ 
									$listt = array();
									$listt[] = $fetch_toppers2['RollNumber'];
									$listt[] = 'Topper';
									$listt[] = $fetch_toppers2['EmailId'];
									$listt[] = $fetch_toppers2['CourseId'];
									$listt[] = $fetch_toppers2['FinalScore'];
									$listt[] = $fetch_toppers2['CollegeName'];
												$listt[] = $fetch_toppers2['NOCCourseName'];
												$listt[] = $fetch_toppers2['MobileNumber'];
												$listt[] = $fetch_toppers2['CollegeDistrictName'];
												$listt[] = $fetch_toppers2['TestCenterCity'];
									/*			$listt[] = $fetch_toppers2['NOCPeriod'];
												$listt[] = $fetch_toppers2['CourseId'];
												$listt[] = $fetch_toppers2['CollegeName'];*/
									$mainArray[] = $listt;
								}
							}
						}
					}
				}
			}
		}
		
		$fp = fopen('toppers.csv', 'w');

foreach ($mainArray as $fields) {
    fputcsv($fp, $fields);
}