<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NOC Home Page</title>
	<link rel="stylesheet" href="./css/jquery-ui.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style_final.css" type="text/css">
	<script type="text/javascript" src="./js/modernizr-latest.js"></script>
<style type="text/css">
.navbar {
    min-height: 60px!important;
}
.navbar-brand {
    line-height: 34px!important;
    height: 60px!important;
}
.navbar-nav>li>a {
    line-height: 36px!important;
}
.navbar-default {
    background-color: rgb(63,81,181)!important;
    border-color: rgb(63,81,181)!important;
}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
    background-color: #323c73 !important;
}
.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus {
    background-color: #323c73 !important;
}
</style>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="#"><b>NPTEL Online Certification</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
			<ul class="nav navbar-nav navbar-right">
            <li><a href="aboutnoc.php"><b>About Us</b></a></li>
            <li><a href="./faq"><b>FAQ</b></a></li>
			<li><a href="contact.html"><b>Contact Us</b></a></li>
				
        <li class="dropdown" style="margin-right:10px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Exam Results Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu" >
				<li>
					<div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" name="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2" placeholder="Date of Birth (ddmmyyyy)" required>
                                            
										</div>
										<div class="form-group">
											 <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
								 </form>
							</div>
                            <div class="bottom"><b>Note: Only candidates who have appeared for certification exam and its scores are published, will be able to login here </b></div>
							<div class="bottom text-center">
								New here ? <a href="https://onlinecourses.nptel.ac.in/"><b>Join Us</b></a>
							</div>          
					</div>
				</li>
			</ul>	
		</li>
     </ul>
    </div>
  </div>
</nav>
<!--end navbar-->
<div class="container" style="margin-top:30px;">
		<p>&nbsp;</p>
</div>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading faqphead"><h3>FREQUENTLY ASKED QUESTIONS</h3></div>
			
		<div class="panel-body">
			<div class="col-md-5">
				<ul>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink1" data-toggle="collapse" data-target="" data-parent="#accordion">What is NPTEL?</li>
								</h4>
							</div>
						</div>	
						<div class="panel panel-default npacc">
							<div class="acc_heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink2" data-toggle="collapse" data-target="#noc" data-parent="#accordion"><i class="glyphicon glyphicon-plus pull-right"> </i> What is NOC?</li>
								</h4>
							</div>	
							<div id="noc" class="panel-collapse collapse">
								<ul class="cscroll">
									<li class="faqlist qlist" id="hlink3"><i class="falist fa fa-check-square"></i>Where do I get information about up-coming certification courses?</li>
									<li class="faqlist qlist" id="hlink4"><i class="falist fa fa-check-square"></i> I just came to know that an online course that I wanted to join has concluded its run. Is there any chance of this course being offered again?</li>
									<li class="faqlist qlist" id="hlink5"><i class="falist fa fa-check-square"></i> How do I enroll/join for an NPTEL online course?</li>	
									<li class="faqlist qlist" id="hlink6"><i class="falist fa fa-check-square"></i> Is there a fee to join/register for an online course?</li>
									<li class="faqlist qlist" id="hlink7"><i class="falist fa fa-check-square"></i> What is the eligibility criterion for registering for an online course?</li>
									<li class="faqlist qlist" id="hlink8"><i class="falist fa fa-check-square"></i> How old should I be to register for an online course?</li>
									<li class="faqlist qlist" id="hlink9"><i class="falist fa fa-check-square"></i> Can I enroll/join for more than one course at a time?</li>
									<li class="faqlist qlist" id="hlink10"><i class="falist fa fa-check-square"></i> Enrolled for a course but now I want to withdraw from this course and join another course. How should I do this?</li>
									<li class="faqlist qlist" id="hlink11"><i class="falist fa fa-check-square"></i> I have enrolled for an online course. What is the next step?</li>
									<li class="faqlist qlist" id="hlink12"><i class="falist fa fa-check-square"></i> It is difficult to watch all the videos online. Can I download notes for these video lectures?</li>
									<li class="faqlist qlist" id="hlink13"><i class="falist fa fa-check-square"></i> If I were to suggest a particular subject/topic for an NPTEL online course, will you take that into consideration?</li>
									<li class="faqlist qlist" id="hlink14"><i class="falist fa fa-check-square"></i> How will I come to know about assignments and deadlines?</li>
									<li class="faqlist qlist" id="hlink15"><i class="falist fa fa-check-square"></i> How do I find out my score in each assignment?</li>
									<li class="faqlist qlist" id="hlink16"><i class="falist fa fa-check-square"></i> Will there be self-assessment assignments?</li>
									<li class="faqlist qlist" id="hlink17"><i class="falist fa fa-check-square"></i> Will the score that I get for the assignment(s) be counted along with my exam marks for the final score?</li>
									<li class="faqlist qlist" id="hlink18"><i class="falist fa fa-check-square"></i> I may not be able to submit all the assignments. Will this hinder my final score?</li>
									<li class="faqlist qlist" id="hlink19"><i class="falist fa fa-check-square"></i> What if I have limited internet access? How do I watch videos online?</li>
									<li class="faqlist qlist" id="hlink20"><i class="falist fa fa-check-square"></i> How will these online courses fit into my curriculum?</li>
									<li class="faqlist qlist" id="hlink21"><i class="falist fa fa-check-square"></i> I live outside India. Can I still enroll for NPTEL online courses?</li>
									<li class="faqlist qlist" id="hlink22"><i class="falist fa fa-check-square"></i> I live outside India. Can I take the certification exam?</li>
								</ul>
							</div>	
						</div>
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink44" data-toggle="collapse" data-target="" data-parent="#accordion">Fees</li>
								</h4>
							</div>
						</div>	
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink41" data-toggle="collapse" data-target="#cexam" data-parent="#accordion"><i class="glyphicon glyphicon-plus pull-right"> </i> Certification Exam</li>
								</h4>
							</div>
							<div id="cexam" class="panel-collapse collapse">
								<ul id="" class="cscroll">
									<li class="faqlist qlist" id="hlink23"><i class="falist fa fa-check-square"></i> How do I register for the online exam?</li>
									<li class="faqlist qlist" id="hlink24"><i class="falist fa fa-check-square"></i> Since it is an online exam, can I take the exam from home on any day/date?</li>
									<li class="faqlist qlist" id="hlink25"><i class="falist fa fa-check-square"></i> Due to other commitments, I cannot appear for the exam on the date you had prescribed. Can I take the same exam on another date?</li>
									<li class="faqlist qlist" id="hlink26"><i class="falist fa fa-check-square"></i> I registered for one online certification exam, but I’ve changed my mind. Now I want to register for another exam on the same day. Can I change it?</li>
									<li class="faqlist qlist" id="hlink27"><i class="falist fa fa-check-square"></i> Can I register for more than one online exam?</li>
									<li class="faqlist qlist" id="hlink28"><i class="falist fa fa-check-square"></i> If I request for any specific city as exam centre that is not already in your list, will you agree to that?</li>
									<li class="faqlist qlist" id="hlink29"><i class="falist fa fa-check-square"></i> I made on-line payment for the exam. How do I know for sure that the processing was successful and I'll get an Admit Card for the exam?</li>
								</ul>
							</div>
						</div>	
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink42" data-toggle="collapse" data-target="#pexam" data-parent="#accordion"><i class="glyphicon glyphicon-plus pull-right"> </i> Post Exam</li>
								</h4>
							</div>
							<div id="pexam" class="panel-collapse collapse">
								<ul id="" class=" cscroll">
									<li class="faqlist qlist" id="hlink30"><i class="falist fa fa-check-square"></i> Will you upload the answers to the questions that we attempted during the online exam(s)? If so,when?</li>
									<li class="faqlist qlist" id="hlink31"><i class="falist fa fa-check-square"></i> When will the exam results be published?</li>
									<li class="faqlist qlist" id="hlink32"><i class="falist fa fa-check-square"></i> I want to contest my exam score. How would I do this?</li>
									<li class="faqlist qlist" id="hlink33"><i class="falist fa fa-check-square"></i> When can I expect to receive the hard copy of my certificate?</li>
									<li class="faqlist qlist" id="hlink34"><i class="falist fa fa-check-square"></i> Will I receive a certificate showing my exam score?</li>
									<li class="faqlist qlist" id="hlink35"><i class="falist fa fa-check-square"></i> I have an up-coming job interview and I need to show the potential employer my certificate. But I have not received the hard copy of my certificate yet. Can you help me out?</li>
									<li class="faqlist qlist" id="hlink36"><i class="falist fa fa-check-square"></i> I have shifted my residence to another location recently. Will you please arrange to send the hard copy of my certificate to the new address?</li>
									<li class="faqlist qlist" id="hlink37"><i class="falist fa fa-check-square"></i> There are mistakes in my certificate. How do I get these errors corrected?</li>
								</ul>
							</div>
						</div>
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink43" data-toggle="collapse" data-target="#refund" data-parent="#accordion"><i class="glyphicon glyphicon-plus pull-right"> </i> Refunds</li>
								</h4>
							</div>
							<div id="refund" class="panel-collapse collapse">
								<ul>
									<li class="faqlist qlist" id="hlink38"><i class="falist fa fa-check-square"></i> After registering for an online exam, I realized that I cannot take the exam on that date. Will you refund my money? If so, how soon should I notify you?</li>
									<li class="faqlist qlist" id="hlink39"><i class="falist fa fa-check-square"></i> I registered for an online certification exam, but I’ve changed my mind. Now I want to withdraw from this exam. Will you refund my money?</li>
								</ul>
							</div>
						</div>
						<div class="panel panel-default npacc">
							<div class="acc-heading">
								<h4 class="panel-title">
									<li class="qhead faqlist" id="hlink40" data-toggle="collapse" data-target="" data-parent="#accordion">Important Links</li>
								</h4>
							</div>
						</div>	
					</div>
				</ul>
			</div>	
			<div class="col-md-7">
				<!--<input type="text" id="searchfor"/>
				<!-- about nptel -->
				<div class="jumbotron faqjumbo faqdata" id="link1">
					NPTEL is an acronym for <b> National Programme on Technology Enhanced Learning</b> which is an initiative
					by seven Indian Institutes of Technology (IIT Bombay, Delhi, Guwahati, Kanpur, Kharagpur, Madras and
					Roorkee) and Indian Institute of Science (IISc) for creating course contents in engineering and science.
					NPTEL provides E-learning through online Web and Video courses in Engineering, Science and humanities streams.
				</div>
				<!--about noc---->
				<div class="faqdata" id="link2">
					<div class="jumbotron faqjumbo">
						NOC stands for <b>NPTEL Online Certification</b>. NPTEL has started offering online certification courses
						through its portal https://onlinecourses.nptel.ac.in. There are 10 hours, 20 hour as well as 40 hour courses offered
						twice a year.
					</div>	
				</div>	
				<div class="faqdata" id="link3">
					<div class="jumbotron faqjumbo">
						Please go to the following link <a href="http://nptel.ac.in/noc/" target="_blank">http://nptel.ac.in/noc/</a> 
						for information on NPTEL online certification courses.
					</div>
				</div>	
				<div class="faqdata" id="link4">
					<div class="jumbotron faqjumbo">
						Depending upon the demand of students and logistics, NPTEL may offer the course again. 
						Kindly keep checking our website for latest news.
					</div>
				</div>
				<div class="faqdata" id="link5">
					<div class="jumbotron faqjumbo">
						Step 1 – Go to the following link -<a href="https://onlinecourses.nptel.ac.in" target="_blank"> https://onlinecourses.nptel.ac.in</a><br>
						Step 2 – Click on the tab "Login" seen on the top right-hand corner.<br>
						Step 3 - Use a google account enabled email id to login.<br>
						Step 4 – Choose your desired course and click on the Join button or Click on the course to see the Introduction page of the course and if interested, click on the "Register" button.<br>
						Step 5 – If the course has content uploaded, you will now be able to see it.<br>
						Once these steps are carried out, you will receive a confirmation e-mail.
					</div>
				</div>	
				<div class="faqdata" id="link6">				
					<div class="jumbotron faqjumbo">
						<b>No. joining/enroling for an NPTEL online course is free</b>. The videos and associated study material may
						also be downloaded for free. Learning from the course, submitting assignments, participating in the
						discussion forum is free. To write the final exam, you need to pay a nominal fee.
					</div>
				</div>	
				<div class="faqdata" id="link7">		
					<div class="jumbotron faqjumbo">
						There is no specific eligibility criterion for any of the NPTEL online courses.
						The faculty of a particular course may recommend some basic knowledge of certain topics for a person to fully grasp the contents of a course. 
					</div>
				</div>	
				<div class="faqdata" id="link8">	
					<div class="jumbotron faqjumbo">Anyone 13 yrs and above may join an online course.</div>
				</div>
				<div class="faqdata" id="link9">	
					<div class="jumbotron faqjumbo">
						You may enroll/join for as many online courses that you like. For the number of exams that can be written, if we have 2 dates, 
						then you can give exams for 2 courses.
					</div>
				</div>	
				<div class="faqdata" id="link10">	
					<div class="jumbotron faqjumbo">
							For withdrawing from a course to which you have enrolled, login to the<a href="https://onlinecourses.nptel.ac.in" target="_blank"> https://onlinecourses.nptel.ac.in</a>
							portal using your email id used to enroll to the course. Click on the email id seen on the right top of the
							page. You will get a drop down in which there will be an option to unenroll from the course.
							To join another course, just go to the course you are interested in and click<b> Register </b>button.
					</div>
				</div>	
				<div class="faqdata" id="link11">	
					<div class="jumbotron faqjumbo">
						Those who have enrolled for a course will receive a confirmation welcome mail. After that, when the
						course begins and the weekly lessons are released, you will be notified via e-mail. Also, any news,
						announcements, etc. will be posted in the Announcement Page of the course. You can now start
						watching the videos. Please keep checking your course page for updates.
					</div>
				</div>	
				<div class="faqdata" id="link12">
					<div class="jumbotron faqjumbo">
						Yes. For certain online courses, the text transcription of the video material has been made available for
						free download at the following link.<a href="http://textofvideo.nptel.iitm.ac.in/" target="_blank">http://textofvideo.nptel.iitm.ac.in/</a>Please click on Courses. Here, you
						may search for your desired course and download PDF, MP3 or SRT files. If you do not find your choice
						of course in that list, please understand that the transcription work is in progress. Kindly bear with us.
					</div>
				</div>	
				<div class="faqdata" id="link13">
					<div class="jumbotron faqjumbo">
						We will most definitely take a note of your suggestion and consider that while designing future online certification courses.
					</div>
				</div>	
				<div class="faqdata" id="link14">
					<div class="jumbotron faqjumbo">
						All announcements and other vital information are posted in the Announcement page of the course. 
						Also,e-mail and sms alerts will be sent periodically.
					</div>
				</div>	
				<div class="faqdata" id="link15">
					<div class="jumbotron faqjumbo">
						Your score will be posted online as soon as you submit the assignment. 
						Using your unique password and log in id, you may check your score any time you like.
					</div>
				</div>	
				<div class="faqdata" id="link16">
					<div class="jumbotron faqjumbo">
						Yes. Certain online courses will have these types of assignments. 
						These are meant only for assessing your learning from the course. 
						Typically, these assessments will not carry any marks. The answers for
						such assignments will also be posted in the course page. Please note that the faculty decides on the type of assignments for each course.
					</div>
				</div>	
				<div class="faqdata" id="link17">
					<div class="jumbotron faqjumbo">
						Yes, the assignment scores also contribute to the overall score. 
						The faculty will decide the percentage contribution of the assignments.
					</div>
				</div>	
				<div class="faqdata" id="link18">
					<div class="jumbotron faqjumbo">
						See answer to the previous question. The final score may be affected if the faculty member announces that the assignment scores are going to be counted. 
						But this will not hamper your writing the certification exam.
					</div>
				</div>	
				<div class="faqdata" id="link19">
					<div class="jumbotron faqjumbo">
						You may download the videos and watch them offline. We have files of smaller formats - flv and 3gp -available at <a href="http://nptel.ac.in" target="_blank">http://nptel.ac.in</a> website where the same content will be posted. Also, for certain
						courses, transcripts are available which are relatively smaller in file size and easier to download. MP3
						files (audio) of all online courses are also made available. Please go to the following link to access these
						files for free.<a href="http://textofvideo.nptel.iitm.ac.in/" target="_blank"> http://textofvideo.nptel.iitm.ac.in/</a>
					</div>
				</div>	
				<div class="faqdata" id="link20">
					<div class="jumbotron faqjumbo">
						You have to check with your college/Univerisity if they will take this into consideration and incorporate it into your certificate.
					</div>
				</div>	
				<div class="faqdata" id="link21">
					<div class="jumbotron faqjumbo">
						Yes. You may enroll for any online course no matter where you live and go through the course material.
					</div>
				</div>
				<div class="faqdata" id="link22">
					<div class="jumbotron faqjumbo">
						No. Currently, we do not have any provision to conduct certification exams outside India.
					</div>
				</div>
				<!-- about certification exam -->
				<div class="faqdata" id="link41">
					<div class="jumbotron faqjumbo">
						 NPTEL has begun the initiative of certification for online courses so that students may see tangible end result in the form of a certificate, from the Centre for Continuing Education, IIT for their effort.
					</div>
				</div>	
				<div class="faqdata" id="link23">		
					<div class="jumbotron faqjumbo">
						For candidates enrolled in a course, a link will be published for exam registration. 
						Kindly follow the guidelines posted there.
					</div>
				</div>	
				<div class="faqdata" id="link24">	
					<div class="jumbotron faqjumbo">
						No. Certification exams will be conducted on two consecutive Sundays from 2:00 p.m. to 5:00 p.m. You
						will have to appear at the allotted exam centre and produce your Admit Card and Identification Card for
						verification and take the exam in person.
					</div>
				</div>	
				<div class="faqdata" id="link25">
					<div class="jumbotron faqjumbo">
						At the time of exam registration, you will be choosing exam date and centre. Once this data is submitted,
						you will not be able to go back and change this input. So if you miss the exam, you cannot take it on
						another date.
					</div>
				</div>	
				<div class="faqdata" id="link26">
					<div class="jumbotron faqjumbo">
						Once you have registered for a particular exam, it is final as the form will become uneditable. 
						So please think and choose the subject carefully while you register for the exam. It cannot be changed once registered
					</div>
				</div>
				<div class="faqdata" id="link27">	
					<div class="jumbotron faqjumbo">
						Yes. You may participate in 2 online certification exams. The exams are conducted on 2 consecutive
						Sundays. So, you can take one exam per Sunday.
					</div>
				</div>
				<div class="faqdata" id="link28">
					<div class="jumbotron faqjumbo">Currently, only the centres in the form can be chosen by individuals. 
						If you belong to a college and more than 50 students are appearing for exams on the same date, the college Principal can write to us
						requesting for a centre in your city and we can try to arrange the same.
					</div>
				</div>
				<div class="faqdata" id="link29">				
					<div class="jumbotron faqjumbo">If the payment is successful, you will get an email saying so. 
						Also, the registration form should become non-editable after that. You can go to <a href="http://nptel.ac.in/noc" target="_blank">http://nptel.ac.in/noc</a> and check your status in the tab 
						"Payment tracking". If your name is in the success list, it means your payment is confirmed.
					</div>
				</div>	
				<!--post exam-->
				<div class="faqdata" id="link42">
					<div class="jumbotron faqjumbo">
						After the certification exam concludes, the results and the e-certificate are made available online, about 4 weeks after the exam date. The students will receive an e-mail alert as soon as the results are published.
					</div>
				</div>	
				<div class="faqdata" id="link30">
					<div class="jumbotron faqjumbo">
						Normally the final question paper is not released and hence the solutions also will not be released. 
						If you have any specific doubts, you can write to the course instructor on the discussion forum of the course.
					</div>
				</div>	
				<div class="faqdata" id="link31">
					<div class="jumbotron faqjumbo">
						For an objective online exam, results and the e-certificate (go to the course at <a href="http://nptel.ac.in/noc" target="_blank"> nptel.ac.in/noc</a>) will be available 2-3 weeks after the exam date.<br>
						For an offline subjective exam (paper and pen), the results and the e-certificate will be made available 5 weeks after the exam.
					</div>
				</div>	
				<div class="faqdata" id="link32">	
					<div class="jumbotron faqjumbo">
						Please write to us explaining the reasons behind your contest. Give us the name of the course, date of
						exam, roll number and email id. We will forward it to the course instructor and his decision will be
						implemented.
					</div>
				</div>
				<div class="faqdata" id="link33">
					<div class="jumbotron faqjumbo">
						The laminated hard copy of the certificate is usually sent by speed-post 2 to 3 weeks after the exam
						results are published. An email will be sent to the candidates saying that the certificates have been dispatched.
					</div>
				</div>	
				<div class="faqdata" id="link34">	
					<div class="jumbotron faqjumbo">
						Yes. The score may be a combination of assignment and final exam scores, as the course instructor decides.
					</div>
				</div>	
				<div class="faqdata" id="link35">
					<div class="jumbotron faqjumbo">
						The e-certificate can be downloaded and printed and used. It is anyway e-verifiable.
					</div>
				</div>	
				<div class="faqdata" id="link36">
					<div class="jumbotron faqjumbo">
						At the time of registration of the exam, you will be asked to provide the address where the certificates
						need to be sent by post. Any request for change in address will not be entertained thereafter. So please
						give a permanent address while you register for the exam. It cannot be changed once registration is
						complete.
					</div>
				</div>
				<div class="faqdata" id="link37">
					<div class="jumbotron faqjumbo">
						Please take a screen-shot of your certificate and send us an e-mail describing the error. If the error is genuine, we will send you another certificate.
					</div>
				</div>
				<!-- refunds -->
				<div class="faqdata" id="link43">
					<div class="jumbotron faqjumbo">
						As a general policy, NPTEL will not refund exam fees.
					</div>
				</div>	
				<div class="faqdata" id="link38">
					<div class="jumbotron faqjumbo">
						Once the exam fee is paid, arrangements will be made for you to take the exam. 
						Please try to take the exam as we will be unable to give a refund in case you cannot.
					</div>
				</div>	
				<div class="faqdata" id="link39">
					<div class="jumbotron faqjumbo">
						Sorry. Once you have registered for an exam, refunds will not be done.
					</div>
				</div>	
				<div class="faqdata" id="link40">
					<div class="col-md-12 ">
						<ul class="link">
							<li>E-Mail : <a href="mailto:nptel@iitm.ac.in" target="_top">nptel@iitm.ac.in</a></li>
							<li>NPTEL :&nbsp;<a href="http://nptel.ac.in/" target="_blank">http://nptel.ac.in/</a></li>
							<li>NPTEL ONLINE COURSE REGISTRATION: <a href="https://onlinecourses.nptel.ac.in/" target="_blank">https://onlinecourses.nptel.ac.in/</a></li>
							<li>Local Chapter (For Colleges) : <a href="http://nptel.ac.in/LocalChapter" target="_blank">http://nptel.ac.in/LocalChapter</a></li>							
							<li>YOUTUBE : <a href="http://www.youtube.com/iit" target="_blank">http://www.youtube.com/iit</a></li>
							<li>TEXT OF VIDEOS : <a href="http://textofvideo.nptel.iitm.ac.in/" target="_blank">http://textofvideo.nptel.iitm.ac.in/</a></li>
						
						</ul>	
					</div>	
				</div>
				<div class="faqdata" id="link44">
					<div class="jumbotron faqjumbo">
						<ul>
							<li>Joining/enroling for an NPTEL online course is <b>free</b>.</li> 
							<li>The videos and associated study material may also be downloaded for <b>free.</b></li>
							<li>Learning from the course, submitting assignments, participating in the discussion forum is <b>free.</b></li> 
							<li>To write the final exam, you need to pay a nominal fee.</li>
						</ul>
					</div>
					<div class="jumbotron faqjumbo">
						<ul>
							<li>The certification exam is optional.</li> 
							<li>You will have to pay <b>Rs. 1000</b> for all certification exams (except for exams on courses in programming).</li>
							<li>For exams on programming courses, the fees will be <b>Rs. 1250.</b></li> 
						</ul>
					</div>
				</div>	
			</div>	
		</div>	
	</div>
</div>
<!---jquery-->
<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});
$(document).ready(function(){
	$(".faqdata").hide();
	$('#link1').show();
	$('#hlink1').addClass('faqactive');
	$('.faqlist').click(function(){
	$('.faqlist').removeClass('faqactive');
	$(this).addClass('faqactive');
	var thisid = $(this).attr('id');
	thisid = thisid.substr(1);
	$(".faqdata").hide();
	$('#'+thisid).slideDown();
	 $("body").scrollTop(0);
	});
	$('.qlist').click(function(){ 
	$('.qlist').removeClass('qlistactive');
	$(this).addClass('qlistactive');
	});
});
</script>
</body>
</html>