<!DOCTYPE html>
<html lang="zxx">
<?php  
include 'conn.php';

// $search = $_GET['v'];
// $sq = mysqli_query($con,"SELECT * FROM district where dist_id = '$search'");

// if(mysqli_num_rows($sq) !== 0){
// $rrr = mysqli_fetch_assoc($sq);
// $sch=$rrr['dist_name'];
//}

?>
<!-- 
	Mirrored from keenitsolutions.com/products/html/SchoolProvement/SchoolProvement-demo/teachers.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 26 Mar 2020 14:43:39 GMT -->

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
		.form-group label {

			font-weight: bold;

		}
	</style>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174450032-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174450032-1');
</script>
</head>

<body class="inner-page">
	<!--Preloader area start here-->
	<!--// <?php 
	//if($search == 0)
//	{
	?> -->
	<div class="book_preload">
		<div class="book">
			<div class="book__page"></div>
			<div class="book__page"></div>
			<div class="book__page"></div>
		</div>
	</div>

	<?php// }?>
	<!--Preloader area end here-->

	<!--Full width header Start-->
	<div class="full-width-header">
		<!-- Toolbar Start -->
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
										<li class="menu-item-has-children"> <a href="index.php" class="home">Home</a>

										</li>
										<!-- End Home -->

										<!--About Menu Start-->
										<li class=" menu-item-has-children"><a href="about-us.html">About Us</a>

										</li>
										<!--About Menu End-->

										<!-- Drop Down -->
										<li class="current-menu-item current_page_item  menu-item-has-children"> <a
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
							<div class="searce-box ">
                             
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
						<h1 class="page-title">Our Schools & Teachers</h1>
						<ul>
							<li>
								<a class="active" href="index.php">Home</a>
							</li>
							<li>Our Schools & Teachers</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumbs End -->

	<!-- Team Start -->
	<div id="rs-team-2" class="rs-team-2 team-page sec-spacer">
		<div class="row">
			<div class="col-md-12">
				<div class="container">
					<center>
						<div class="contact-comment-section ">
							<h2 class="text-center">Find and Compare Schools</h2>
							<div id="form-messages"></div>
							<form id="contact-form" method="post" action="search.php">
								<fieldset>
									<div class="row">

										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label for="country">Country</label>
												<select name="country" class="form-control" id="country" style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;" required>
													<option value=""> None</option>

													<?php 
													
													$disp=mysqli_query($con,"SELECT * FROM country ");
														while($r=mysqli_fetch_assoc($disp))
														{
									
													?>
													<option value="<?php echo $r['country_name'] ;?>">
														<?php echo $r['country_name'] ;?></option>


													<?php } ?>
												</select>
											</div>
										</div>

										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label for="district">District</label>
												<select name="district" id="district" class="form-control" style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;" required>
													<option value=""> None</option>
													<?php 
													
													$disp2=mysqli_query($con,"SELECT * FROM district");
														while($r2=mysqli_fetch_assoc($disp2))
														{
									
													?>
													<option value="<?php echo $r2['dist_name'] ;?>">
														<?php echo $r2['dist_name'] ;?></option>


													<?php } ?>

												</select>
											</div>
										</div>
										<!-- <div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label for="state">State</label>
												<select name="state" id="state" class="form-control" placeholder=""
													style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;" required>
													<option value=""> None</option>
													<?php 
													
													$disp3=mysqli_query($con,"SELECT school_state FROM school GROUP BY school_state");
														while($r3=mysqli_fetch_assoc($disp3))
														{
									
													?>
														<option value="<?php //echo $r3['school_state'] ;?>"><?php //echo $r3['school_state'] ;?></option>


														<?php } ?>	

												</select>
											</div>
										</div>
										 -->
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Rating</label>
												<select name="rateing" id="fname" class="form-control" placeholder=""
													style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;">
													<option value="none"> None</option>
													<option value="l-h"> Lowest to Highest</option>
													<option value="h-l">Highest to Lowest</option>

												</select>
											</div>
										</div>



										<div class="col-md-4 col-sm-12">
											<div class="form-group">

												<label>Alphabetically</label>
												<select name="alpha" id="fname" class="form-control" placeholder=""
													style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;">
													<option value="none"> None</option>
													<option value="a-z"> A - Z</option>
													<option value="z-a">Z - A</option>

												</select>
											</div>
										</div>




										<div class="col-md-4 col-sm-12">
											<div class="form-group">

												<label>Teacher Attendance Rate</label>
												<select name="absence" id="fname" class="form-control" style="border: none;
										background: #f5f5f5;
										border-radius: 0;
										box-shadow: none;">
													<option value="none"> None</option>
													<option value="low">Best to Worst </option>
													<option value="high">Worst to Best </option>

												</select>
											</div>
										</div>

										<div class="col-md-12 text-center">
											<div class="form-group ">
												<button class="btn"
													style="background-color: rgb(39, 109, 196); color:white; margin-top: 5px;;">Apply</button>
											</div>
										</div>

									</div>
								</fieldset>
							</form>
						</div>
					</center>
				</div>
			</div>
			<div class="col-md-12">
				<div class="container">
					<div class="row">


						<?php 
				$school1=mysqli_query($con,"SELECT * FROM school");
				while($rschool=mysqli_fetch_assoc($school1))
				{
				?>

						<?php
				
				$school_id=$rschool['school_id'];
				$total=0;
        $sql2=mysqli_query($con,"SELECT * FROM schoolfeedback WHERE school_id=' $school_id'");
        while($query2=mysqli_fetch_assoc($sql2))
        {
          $value=$query2['schoolFeedback_rating'];
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






						<div class="col-lg-3 col-md-6 col-xs-6 grid-item ">
							<div class="team-item">
								<div class="team-img">
									<?php
									if($rschool['school_image'] == null)
									{

									?>
									<a href="#"><img src="image/school.png" alt="" /></a>
									<?php }else
									{
										?>
									<a href="#"><img src="admin/school/image/<?php echo $rschool['school_image'] ?>"
											height="210" class="img-fluid" alt="" /></a>
									<?php			}
										?>


									<div class="social-icon">
										<a href="teachers-single.php?v=<?php echo $rschool['school_name']; ?>"><i
												class="fa fa-list"> <span style="font-family:Roboto Condensed"> School
													Detail</span></i></a>
										<!-- <a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a> -->
										<a href="teacher_li.php?v=<?php echo $rschool['school_id']; ?>"><i
												class="fa fa-list">&nbsp;&nbsp; <span
													style="font-family:Roboto Condensed">Teacher
													List</span></i></a>
									</div>
								</div>
								<div class="team-body">
									<a href="teachers-single.php?v=<?php echo $rschool['school_name']; ?>">
										<h3 class="name"><?php echo $rschool['school_name']; ?></h3>
									</a>
									<span class="designation"><?php echo $rschool['school_district']; ?></span>
									<br>
									<span style="text-align: right;" class="text-right">Rating
										<?php echo $avr.'/5'; ?></span>
										<br>
									<span style="text-align: right;" class="text-right">Teachers’ Attendance Rate
										<?php
										
										if($rschool['attendance_percentage']==null)
										{
											echo "0%";
										}else{

											echo $rschool['attendance_percentage']."%";
										}
										
										
										 ?></span>

								</div>
							</div>
						</div>

						<?php }
					?>
					</div>
				</div>
			</div>

		</div>
	</div>



	<!-- Footer Start -->
	<footer id="rs-footer" class="bg3 rs-footer mt-0">


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
	<script src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
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
	<script>
		$(document).ready(function () {
			$('#My_Table').DataTable();
		});

		// $("#createlink,.dgbtn-edit,.dgbtn-delete").click(function (event) {
		// 	event.preventDefault();
		// 	var myurl = $(this).attr("value");
		// 	$.ajax({
		// 		// url: search.php ? v = myurl,
		// 		// type: GET;
		// 		datatype:
		// 	}).done(function (result) {

		// 		$("#mydialog-body").html(result);

		// 	});
		// });
	</script>
</body>

<!-- Mirrored from keenitsolutions.com/products/html/SchoolProvement/SchoolProvement-demo/teachers.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 26 Mar 2020 14:43:50 GMT -->

</html>