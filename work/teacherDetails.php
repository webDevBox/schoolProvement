<!DOCTYPE html>
<html lang="zxx">
<?php
$id= $_GET['v'];
include'conn.php';

$result1 = mysqli_query($con,"SELECT * FROM teacher where teacher_id = '$id'");
$row3 = mysqli_fetch_assoc($result1); 


?>



<!-- Mirrored from keenitsolutions.com/products/html/SchoolProvement/SchoolProvement-demo/teachers-single.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 26 Mar 2020 14:43:50 GMT -->

<head>
	<!-- meta tag -->
	<meta charset="utf-8">
	<title>SchoolProvement</title>
	<meta name="description" content="">
	<!-- responsive tag -->
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon -->
	<link rel="apple-touch-icon" href="apple-touch-icon.html">
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.png">
	<!-- bootstrap v4 css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- font-awesome css -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!-- animate css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- owl.carousel css -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<!-- slick css -->
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<!-- rsmenu CSS -->
	<link rel="stylesheet" type="text/css" href="css/rsmenu-main.css">
	<!-- rsmenu transitions CSS -->
	<link rel="stylesheet" type="text/css" href="css/rsmenu-transitions.css">
	<!-- magnific popup css -->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<!-- flaticon css  -->
	<link rel="stylesheet" type="text/css" href="fonts/flaticon.css">
	<!-- timeline css -->
	<link rel="stylesheet" type="text/css" href="css/timeline.css">
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- responsive css -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->
	<style>
		th {
			color: white;
		}

		td {
			color: white;
		}

		#myDIV1 {
			display: none;
			width: 100%;


			overflow-y: scroll;

		}



		#myDIV p {
			color: white;

		}
	</style>



</head>

<body class="inner-page">
	<!--Preloader area start here-->
	<!-- <div class="book_preload">-->
	<!--	<div class="book">-->
	<!--		<div class="book__page"></div>-->
	<!--		<div class="book__page"></div>-->
	<!--		<div class="book__page"></div>-->
	<!--	</div>-->
	<!--</div>-->
	<!--Preloader area end here-->

	<!--Full width header Start-->
	<div class="full-width-header">

		<!-- Toolbar Start -->
		<div class="rs-toolbar">
			<div class="rs-toolbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="rs-toolbar-left">
								<div class="welcome-message">
									<i class="fa fa-bank"></i><span>Welcome to SchoolProvement</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="rs-toolbar-right">
								<div class="toolbar-share-icon">
									<ul>
										<li><a href="https://www.facebook.com/SchoolProvement"><i class="fa fa-facebook"></i></a></li>
									
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Toolbar End -->

			<!--Header Start-->
			<header id="rs-header-2" class="rs-header-2">
				<!-- Menu Start -->
				<div class="menu-area menu-sticky">
					<div class="container">
						<div class="row rs-vertical-middle">
							<div class="col-lg-3 col-md-12">
								<div class="logo-area">
									<a href="index.php"><img src="image/as.png" class="img-fluid" style="height: 60px;"
											alt="logo"></a>
								</div>
							</div>
							<div class="col-lg-9 col-md-12">
								<div class="main-menu">
									<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
									<nav class="rs-menu">
										<ul class="nav-menu">
											<!-- Home -->
											<li class="menu-item-has-children"> <a href="index.php"
													class="home">Home</a>

											</li>
											<!-- End Home -->

											<!--About Menu Start-->
											<li class=" menu-item-has-children"><a href="about-us.html">About Us</a>

											</li>
											<!--About Menu End-->

											<!-- Drop Down -->
											<li class="current-menu-item current_page_item menu-item-has-children"> <a
													href="schools-and-teachers.php">Schools</a>
												<ul class="sub-menu">

												</ul>
											</li>
											<!--End Icons -->

											<!--Courses Menu Start-->
											<li class="menu-item-has-children"> <a href="news.php">News</a>

											</li>
											<!--Courses Menu End-->



											<!--blog Menu Start-->
											<li class="menu-item-has-children"> <a href="blog.php">Blog</a>

											</li>
											<!--blog Menu End-->

											<!--Contact Menu Start-->

											<!--Contact Menu End-->
										</ul>
									</nav>
								</div>
								<div class="searce-box">
									<a class=" ml-2" style="color:white" onclick="window.location='admin/index.html'"><i
                                        class="fa fa-user-circle"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Menu End -->
			</header>
			<!--Header End-->

		</div>
		<!--Full width header End-->

		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
			<div class="breadcrumbs-inner">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="page-title">Teacher Profile</h1>
							<ul>
								<li>
									<a class="active" href="index.php">Home</a>
								</li>
								<li>Profile of Teacher <?php echo $row3['teacher_firstName'];  ?> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumbs End -->
		<?php
	
	$sql=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id='$id'");
	$query=mysqli_fetch_assoc($sql);
	$school_id=$query['school_id'];
	$teacher_id=$query['teacher_id'];
	$fname=$query['teacher_firstName'];
	$lastname=$query['teacher_lastName'];
	$teachername=$fname .' '. $lastname;

	$sql1=mysqli_query($con,"SELECT * FROM school WHERE school_id='$school_id'");
	$query1=mysqli_fetch_assoc($sql1);
	$school=$query1['school_name'];

	$total=0;
	$sql2=mysqli_query($con,"SELECT * FROM feedback WHERE teacher_feedback_id='$teacher_id'");
	while($query2=mysqli_fetch_assoc($sql2))
	{
	  $value=$query2['feedback_rating'];
	  $total=$total+$value;
	}
	$counter=mysqli_num_rows($sql2);
	if($counter > 0)
	{
	  $val=$total/$counter;
	$avr=round($val,2);
	}
	else{
	  $avr=0;
	}






	?>

		<!-- Team Single Start -->
		<div class="rs-team-single pt-100 mb-5">
			<div class="container">
				<div class="row team">
					<div class="col-lg-4 col-md-12">
						<div class="team-photo mobile-mb-40">
							<center> <?php if($row3['teacher_image'] == null){  ?>
								<a href="#"><img src="image/users.png" alt="" /></a>
								<?php }else {?>
								<a href="#"><img src="admin/school/teacher/<?php echo $row3['teacher_image']?>"
										class="rounded-circle " alt="" style="height:256px;" /></a>
								<?php			}
										?></center>

							<div class="team-title" style="text-align:center; margin-top: 10px;;">
								<h3 class="team-name" style="text-transform: capitalize;">
									<?php echo $row3['teacher_firstName'].' '.$row3['teacher_lastName'] ;?></h3>
								<p><span class="fa fa-map-marker"> <b style="text-transform: capitalize;"> &nbsp;
											<?php echo $school.','; ?><?php echo $row3['teacher_district'].',';;?>

											<?php echo $row3['teacher_state'].'';?><?php echo $row3['country_name'].'';?></b>
									</span>
								</p>

							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-12">

						<p>

						</p>
						<!-- <p class="team-contact">
						<i class="fa fa-mobile"></i> (+088) 2957 439 <i class="ml-15 fa fa-envelope-o"></i>
						sarlinemail@gmail.com
					</p>
					<p>
						Vestibulum eu turpis risus. Nullam fringilla diam tellus, eu volutpat massa ullamcorper non.
						Nullam lorem felis, sollicitudin vitae semper sit amet, facilisis sit amet lacus. Suspendisse ut
						ligula varius, dignissim velit sit amet, maximus est. Etiam nec mauris augue. Ut viverra tortor
						orci, ac ultricies magna molestie ut
					</p> -->
						<div class="team-skill">
							<h3 class="skill-title" style="text-align: center;">Overall Rating of Teacher</h3>

							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3" onclick="myFunction1()">
										<p style="margin-top:120px; font-size:60px; text-align:center">
											<?php 
											
											if($query['teacher_absence']==null)
											{echo 0;}else{echo  $query['teacher_absence'];}
											 ?>
										</p>
										<p style="margin-top: 80px;"><b style=""><center><a
													style="text-decoration: none; color:black" href="#display"
													onclick="myFunction1()">Click To See Absences </a></center>
											</b></p>
									</div>


									<?php  
								if($avr == 0){
										$dd=0.0;
								}else{
										
										$t1= ($avr*100)/5;
										$dd= $t1/100;


								}
								
								
								
								
								
								
								
								?>

									<div class="col-md-6" style="margin-top:60px;">


										<div class="round" data-value="<?php
										
										if($query['attendance_percentage']==null)
										{
										 $ss=.0;
										 echo $ss;
										}else{
											$ss=$query['attendance_percentage'];
											if($ss==100)
											{
											   $s=1;
											   echo $ss;
											}else{
											    
											 echo ".".$ss;
											    
											}
										}
										
										
										//echo '.'.$ss ?>"
											data-size="150" data-thickness="10">
											<strong><?php echo  $ss; ?>%</strong>



										</div>
										<h3 style="text-align:center;">Total Attendance Rate</h3>


									</div>

									<div class="col-md-3" onclick="myFunction()">

										<p style="margin-top:120px; font-size:60px; text-align:center">
											<?php echo $avr; ?>/5
											<br><span style="font-size: medium;">Rating</span>
										</p>
										<p style="margin-top:35px;"><b style="text-align:left;"><center><a
													style="text-decoration: none; color: black;" href="#display"
													onclick="myFunction()">Click To See Rating </a></center>
											</b></p>
									</div>




								</div>


							</div>
						</div>
						<!-- <div class="col-md-6">
							<!-- <div class="progress rs-progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88"
										aria-valuemin="0" aria-valuemax="100" style="width:88%">
										<span class="pb-label">Writing</span>
										<span class="pb-percent">88%</span>
									</div>
								</div>
								<div class="progress rs-progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75"
										aria-valuemin="0" aria-valuemax="100" style="width:75%">
										<span class="pb-label">Speaking</span>
										<span class="pb-percent">75%</span>
									</div>
								</div> -->
						<!--</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$v1=0;
	$v2=0;
	$v3=0;
	$v4=0;
	$v5=0;
	  $sql3=mysqli_query($con,"SELECT feedback_rating FROM feedback WHERE teacher_feedback_id='$teacher_id'");
	  $sum=mysqli_num_rows($sql3);
	  foreach($sql3 as $row)
	  {
		if($row['feedback_rating'] == 1)
		{
		  $v1=$v1+1;
		}

		if($row['feedback_rating'] == 2)
		{
		  $v2=$v2+1;
		}

		if($row['feedback_rating'] == 3)
		{
		  $v3=$v3+1;
		}

		if($row['feedback_rating'] == 4)
		{
		  $v4=$v4+1;
		}

		if($row['feedback_rating'] == 5)
		{
		  $v5=$v5+1;
		}

	  }
	  if($sum > 0)
	  {
		$star1=$v1;
		$star2=$v2;
		$star3=$v3;
		$star4=$v4;
		$star5=$v5;
	  $v1=round(($v1/$sum)*100,0);
	  $v2=round(($v2/$sum)*100,0);
	  $v3=round(($v3/$sum)*100,0);
	  $v4=round(($v4/$sum)*100,0);
	  $v5=round(($v5/$sum)*100,0);
	  }
	?>


	<div class="col-md-12">
		<div class="row">
			<div class="container" id="myDIV"
				style="padding-top:30px;background-color:rgb(39, 109, 196);border-radius:5px;">
				<h3 class="h3 text-center text-white">Average Rating = <?php echo $avr; ?>
				</h3>
				<?php
					if($avr != "Not Rated")
					{
			  ?>
				<div class="col-md-12 col-sm-12">
					<div>
						<div class="row">
							<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
								<p>5 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
							</div>
							<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
										role="progressbar" style="width: <?php echo $v5; ?>%;color:white;">
										<?php echo $v5.'%'; ?>
									</div>
								</div>
							</div>
							<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
								<p> (<?php echo $star5;?>) </p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p>4 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
									role="progressbar" style="width: <?php echo $v4; ?>%;color:white;">
									<?php echo $v4.'%'; ?>
								</div>
							</div>
						</div>
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p> (<?php echo $star4;?>) </p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p>3 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
									role="progressbar" style="width: <?php echo $v3; ?>%;color:white;">
									<?php echo $v3.'%'; ?>
								</div>
							</div>
						</div>
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p> (<?php echo $star3;?>) </p>
						</div>
					</div>


					<div class="row">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p>2 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
									role="progressbar" style="width: <?php echo $v2; ?>%;color:white;">
									<?php echo $v2.'%'; ?></div>
							</div>
						</div>
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p>(<?php echo $star2;?>) </p>
						</div>
					</div>


					<div class="row">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p>1 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
									role="progressbar" style="width: <?php echo $v1; ?>%;color:white;">
									<?php echo $v1.'%'; ?></div>
							</div>
						</div>
						<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
							<p> (<?php echo $star1;?>) </p>
						</div>
						<?php }else{
						
						?>
						<div style="height: 350px;;"></div>
						<?php 
						}
						?>


					</div>
				</div>


			</div>
			<div class="container" id="myDIV1"
				style="padding-top:30px;height:350px; background-color:rgb(39, 109, 196); border-radius:5px; ">
				<?php 
					$ab1=mysqli_query($con,"SELECT * FROM reportabsence WHERE teacher_id = '$id' AND attendance_status = 'absent' ");
					$count=mysqli_num_rows($ab1);
		


					?>
				<div>
					<h3 class="h3 text-center text-white">Absences
					</h3>
					<?php 
					if($count > 0)
					{
					?>

					<table class="table" style="border-color:white; text-align:center">
						<tr>
							<th>Absences Date</th>
							<th>Shift</th>
							<th>Remarks</th>

						</tr>
						<tbody class="t-s">
							<?php
								while($ab_row=mysqli_fetch_assoc($ab1))
									{
							?>

							<tr>
								<td><?php echo $ab_row['reportAbsence_date']; ?></td>
								<td><?php echo $ab_row['reportAbsence_shift']; ?></td>
								<td><?php echo $ab_row['teacher_claim']; ?></td>

							</tr>

						<tbody>
							<?php } ?>


					</table>
					<?php }else {

							echo '<h3 style="color:white; text-align:center;"> NO RECORD FOUND</h3>';

							}?>

				</div>




			</div>
		</div>
	</div>








	<!-- Team Single End -->
	<?php

$sql4=mysqli_query($con,"SELECT * FROM feedback WHERE teacher_feedback_id='$teacher_id'");
$review_counter=mysqli_num_rows($sql4);

?>

	<div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer" style="margin-top:80px;">
		<div class="container">
			<div class="sec-title mb-50 text-center">
				<h2 class="white-color">Feedback About
					<?php echo $row3['teacher_firstName'].' '.$row3['teacher_lastName'] ;?> <?php   ?></h2>

			</div>
			<?php if($review_counter > 0)
                    {?>
			<div class="row">
				<div class="col-md-12">
					<div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
						data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true"
						data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true"
						data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true"
						data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true"
						data-md-device-dots="true">

						<?php
										foreach($sql4 as $sub)
                    {
										?>

						<div class="testimonial-item">
							<div class="testi-img">
								<img src="images/testimonial/user.png" alt="Jhon Smith">
							</div>
							<div class="testi-desc">
								<?php
                              $how=$sub['feedback_rating'];
                          ?>
								<div class="mr-auto img-customer float-right">
									<div class="row">
										<?php 
                               $check=$how;
                               while($check!=0)
                               {
                                 ?>
										<img src="https://img.icons8.com/color/15/000000/christmas-star.png">
										<?php
                                 $check--;
                               }
                               if($how==4)
                               {
								   
                                 echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                               }
                               if($how==3)
                               {
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                               }
                               if($how==2)
                               {
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                               }
                               if($how==1)
                               {
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                                echo '<img src="https://img.icons8.com/color/15/000000/star--v1.png">';
                               }
							   ?>
									</div>
								</div>





								<div class="com1">
									<?php
									// strip tags to avoid breaking any html
									$string = $sub['feedback_review_text'];;
									if (strlen($string) > 50) {
									
										// truncate string
										$stringCut = substr($string, 0, 50);
										$endPoint = strrpos($stringCut, ' ');
									
										//if the string doesn't contain any space then it will cut without word basis.
										$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
										$string .= '... <a class="hello" href="#">Read More</a>';
									}
								?> <p> <?php	echo $string;
?></p>
								</div>
								<div class="com2" style="display:none">
									<p> <?php	echo $sub['feedback_review_text'];
?></p>
								</div>

							</div>
						</div>


						<?php }?>


						<!-- <div class="testimonial-item">
											<div class="testi-img">
												<img src="images/testimonial/2.jpg" alt="Jhon Smith">
											</div>
											<div class="testi-desc">
												<h4 class="testi-name">M Moeez</h4>
												<p>
													Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus
													eget lorem ut
													malesuada. Phasellus dictum est sed libero posuere dignissim.
												</p>
											</div>
										</div>
										<div class="testimonial-item">
											<div class="testi-img">
												<img src="images/testimonial/3.jpg" alt="Jhon Smith">
											</div>
											<div class="testi-desc">
												<h4 class="testi-name">Owais</h4>
												<p>
													Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus
													eget lorem ut
													malesuada. Phasellus dictum est sed libero posuere dignissim.
												</p>
											</div>
										</div>
										<div class="testimonial-item">
											<div class="testi-img">
												<img src="images/testimonial/4.jpg" alt="Jhon Smith">
											</div>
											<div class="testi-desc">
												<h4 class="testi-name">Kamiran</h4>
												<p>
													Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus
													eget lorem ut
													malesuada. Phasellus dictum est sed libero posuere dignissim.
												</p>
											</div>
										</div>
										<div class="testimonial-item">
											<div class="testi-img">
												<img src="images/testimonial/5.jpg" alt="Jhon Smith">
											</div>
											<div class="testi-desc">
												<h4 class="testi-name">Raheel</h4>
												<p>
													Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus
													eget lorem ut
													malesuada. Phasellus dictum est sed libero posuere dignissim.
												</p>
											</div>
										</div> -->
					</div>
				</div>
			</div>

			<?php }
					else{
					?>

			<h2 style="color:white;">
				<center>No Feedback Is Avalible Right Now</center>
			</h2>


			<?php } ?>
		</div>
	</div>




























	<!-- Team Start -->
	<div id="rs-team-2" class="rs-team-2 pt-70 pb-70">
		<div class="container">
			<div class="sec-title-2 mb-50">
				<!-- <p>Fusce sem dolor, interdum in fficitur at, faucibus nec lorem.</p> -->
			</div>
			<div class="row">
				<!-- <div class="col-lg-3 col-md-6">
					<div class="team-item">
						<div class="team-img">
							<a href="#"><img src="images/teachers/6.jpg" alt="" /></a>
							<div class="social-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-body">
							<h3 class="name">Naila Naime</h3>
							<span class="designation">Business Studies</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="team-item">
						<div class="team-img">
							<a href="#"><img src="images/teachers/7.jpg" alt="" /></a>
							<div class="social-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-body">
							<h3 class="name">Shoykot Hassan</h3>
							<span class="designation">Arts</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="team-item">
						<div class="team-img">
							<a href="#"><img src="images/teachers/8.jpg" alt="" /></a>
							<div class="social-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-body">
							<h3 class="name">Eyamin Hossain</h3>
							<span class="designation">Diploma</span>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Team End -->

	<!-- Partner Start -->
	<!-- <div id="rs-partner" class="rs-partner pt-70 pb-170 sec-color">
		<div class="container">
			<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true"
				data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false"
				data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false"
				data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false"
				data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
				<div class="partner-item">
					<a href="#"><img src="images/partner/1.png" alt="Partner Image"></a>
				</div>
				<div class="partner-item">
					<a href="#"><img src="images/partner/2.png" alt="Partner Image"></a>
				</div>
				<div class="partner-item">
					<a href="#"><img src="images/partner/3.png" alt="Partner Image"></a>
				</div>
				<div class="partner-item">
					<a href="#"><img src="images/partner/4.png" alt="Partner Image"></a>
				</div>
				<div class="partner-item">
					<a href="#"><img src="images/partner/5.png" alt="Partner Image"></a>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Partner End -->

	<!-- Footer Start -->
	<footer id="rs-footer" class="bg3 rs-footer mt-9">
		<div class="container" style="margin-top: 50px;">
			<!-- Footer Address -->
			<!-- <div>
				<div class="row footer-contact-desc">
					<div class="col-md-4">
						<div class="contact-inner">
							<i class="fa fa-map-marker"></i>
							<h4 class="contact-title">Address</h4>
							<p class="contact-desc">
                            239/B, Commercial Block, Sector – C Near Grand Jamia Masjid, Bahria Town, Lahore, Pakistan
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-inner">
							<i class="fa fa-phone"></i>
							<h4 class="contact-title">Phone Number</h4>
							<p class="contact-desc">
                            (042) 35133497
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-inner">
							<i class="fa fa-map-marker"></i>
							<h4 class="contact-title">Email Address</h4>
							<p class="contact-desc">
                            info@digitalinnovation.pk
							</p>
						</div>
					</div>
				</div>
			</div>
		</div> -->

			<!-- Footer Top -->
			<!-- <div class="footer-top mt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<div class="about-widget">
							<img src="image/logo1.png" alt="Footer Logo">
							<p>We create Premium Html Themes for more than three years. Our team goal is to reunite the
								elegance of unique.</p>
							<p class="margin-remove">We create Unique and Easy To Use Flexible Html Themes.</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<h5 class="footer-title">RECENT POSTS</h5>
						<div class="recent-post-widget">
							<div class="post-item">
								<div class="post-date">
									<span>28</span>
									<span>June</span>
								</div>
								<div class="post-desc">
									<h5 class="post-title"><a href="#">While the lovely valley team work</a></h5>
									<span class="post-category">Keyword Analysis</span>
								</div>
							</div>
							<div class="post-item">
								<div class="post-date">
									<span>28</span>
									<span>June</span>
								</div>
								<div class="post-desc">
									<h5 class="post-title"><a href="#">I must explain to you how all this idea</a></h5>
									<span class="post-category">Spoken English</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<h5 class="footer-title">OUR SITEMAP</h5>
						<ul class="sitemap-widget">
							<li class="active"><a href="index.php"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Home</a></li>
							<li><a href="about-us.html"><i class="fa fa-angle-right" aria-hidden="true"></i>About</a></li>
							<li><a href="courses.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Courses</a>
							</li>
							<li><a href="courses-details.html"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Courses Details</a></li>
							<li><a href="events.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Events</a>
							</li>
							<li><a href="events-details.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Events
									Details</a></li>
							<li><a href="blog.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog</a></li>
							<li><a href="blog-details.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog
									Details</a></li>
							<li><a href="teachers.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Teachers</a>
							</li>
							<li><a href="teachers-single.html"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Teachers Details</a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a>
							</li>
							<li><a href="error-404.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Error
									404</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-12">
						<h3 class="footer-title">FLICKR FEED</h3>
						<ul class="flickr-feed">
							<li><a href="#"><img src="images/flickr/1.jpg" alt="Project Image"></a></li>
							<li><a href="#"><img src="images/flickr/2.jpg" alt="Project Image"></a></li>
							<li><a href="#"><img src="images/flickr/3.jpg" alt="Project Image"></a></li>
							<li><a href="#"><img src="images/flickr/4.jpg" alt="Project Image"></a></li>
							<li><a href="#"><img src="images/flickr/5.jpg" alt="Project Image"></a></li>
							<li><a href="#"><img src="images/flickr/6.jpg" alt="Project Image"></a></li>
						</ul>
					</div>
				</div>
				<div class="footer-share">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
						<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
					</ul>
				</div>
			</div>
		</div> -->

			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="copyright">
						<p>© 2020 SchoolProvement. All Rights Reserved Site by <a href="https://digitalinnovation.pk/">
								Digital Innovation</a>.
						</p>
					</div>
				</div>
			</div>
	</footer>
	<!-- Footer End -->

	<!-- start scrollUp  -->
	<div id="scrollUp">
		<i class="fa fa-angle-up"></i>
	</div>

	<!-- Search Modal Start -->
	<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true" class="fa fa-close"></span>
		</button>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="search-block clearfix">
					<form>
						<div class="form-group">
							<input class="form-control" placeholder=" " type="text">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Search Modal End -->

	<!-- modernizr js -->
	<script src="js/modernizr-2.8.3.min.js"></script>
	<!-- jquery latest version -->
	<script src="js/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- owl.carousel js -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- slick.min js -->
	<script src="js/slick.min.js"></script>
	<!-- isotope.pkgd.min js -->
	<script src="js/isotope.pkgd.min.js"></script>
	<!-- imagesloaded.pkgd.min js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- wow js -->
	<script src="js/wow.min.js"></script>
	<!-- counter top js -->
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<!-- magnific popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- rsmenu js -->
	<script src="js/rsmenu-main.js"></script>
	<!-- plugins js -->
	<script src="js/plugins.js"></script>
	<!-- main js -->
	<script src="js/main.js"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js"
	integrity="sha256-4JN7vB4y2U6yxDcrOoX3H9qg/QNNp1wB0MNpBaWBvsU=" crossorigin="anonymous"></script>
<!-- Mirrored from keenitsolutions.com/products/html/SchoolProvement/SchoolProvement-demo/teachers-single.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 26 Mar 2020 14:43:51 GMT -->
<script>
	function Circlle(el) {
		$(el).circleProgress({
			fill: {
				color: 'rgb(39, 109, 196)'
			}
		}).on('circle-animation-progress', function (event, progress, stepValue) {


			// $(this).find('strong').text(String(stepValue.toFixed(.0))+'%');
		})

	}

	Circlle('.round');
</script>


<script>
	$(".progress-bar").loading();
	$('input').on('click', function () {
		$(".progress-bar").loading();
	});



	$("#clickRate").on('click', function () {

		$('.Rateing').fadeOut();


	});
</script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36251023-1']);
	_gaq.push(['_setDomainName', 'jqueryscript.net']);
	_gaq.push(['_trackPageview']);

	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
			'.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
</script>
<script>
	function myFunction() {
		var x = document.getElementById("myDIV");
		var y = document.getElementById("myDIV1");
		if (x.style.display === "none") {
			x.style.display = "block";
			y.style.display = "none";
		} else {
			x.style.display = "block";
			y.style.display = "none";
		}
	}

	function myFunction1() {
		var y = document.getElementById("myDIV");
		var x = document.getElementById("myDIV1");
		if (x.style.display === "none") {
			x.style.display = "block";
			y.style.display = "none";
		} else {
			x.style.display = "block";
			y.style.display = "none";
		}
	}
</script>
<script>
	$(document).ready(function () {
		$('.hello').click(function (event) {
			event.preventDefault();
			$('.com1').hide();
			$('.com2').show();
		});
	});
</script>

</html>