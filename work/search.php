<?php  
include 'conn.php';


$error=0;
$county = $_POST['country'];
$district = $_POST['district'];
//$state = $_POST['state'];
$rating = $_POST['rateing'];
$Alphtbatic = $_POST['alpha'];
$absenseRate = $_POST['absence'];

	//die($district);



$array=[];
$counter=0;

$school=mysqli_query($con,"SELECT * FROM school where (country_name = '$county'  && school_district = '$district' )");


if(mysqli_num_rows($school) != 0){
				while($rschool=mysqli_fetch_assoc($school))
				{
					$ar1=0;$ar2=0;
					$ar1= $rschool['school_id'];
					$img=$rschool['school_image'];
					$ar2=$rschool['school_name'];
					$rat=0;
					if($rschool['attendance_percentage']==null){
						$abs1=0;
					}else{

						$abs1=$rschool['attendance_percentage'];

					}
					
					$sid=$rschool['school_id'];
					//$absense=mysqli_query($con,"SELECT * FROM teacher WHERE school_id = '$sid'");
					$feedback=mysqli_query($con,"SELECT * FROM schoolfeedback WHERE school_id='$sid'");
					//$absense1=mysqli_num_rows($absense);
					$feedback1=mysqli_num_rows($feedback);

					if($feedback1>0)
					{
						$va=0;
						$value=0;	
						while($query2=mysqli_fetch_assoc($feedback))
						{ 

						  $value=$query2['schoolFeedback_rating'];
						   
						  $va=$va+$value;
						  
						  
						}
						
						
						  $avr=$va/$feedback1;
						  
						  $rat=$avr;
					}
					else{
						$rat=0;
					}


					// if($absense1>0){
					// 	$abs=0;
					// 	while($query1=mysqli_fetch_assoc($absense))
					// 	{
					// 	  $abs=$abs+$query1['teacher_absence'];
					// 	}
					// 	$abs1=$abs;

					// }else{
					// 	$abs1=0;
					// }


					$array[]= array('id' => $ar1, 'schools' => $ar2,'rate' => $rat,'absences' => $abs1,'images' => $img);
					$counter++;


				}

					//array_multisort( array_column($array, "school"), SORT_ASC, $array );
				foreach ($array as $key => $row2) {
					
					$schools[$key] = $row2['schools'];
					$rate[$key] = $row2['rate'];
					$absences[$key] = $row2['absences'];
				}
				
				// as of PHP 5.5.0 you can use array_column() instead of the above code
				
				$schools = array_column($array, 'schools');
				$rate = array_column($array, 'rate');
				$absences = array_column($array, 'absences');

				//low serach 
			// if($rating == 'l-h' && $Alphtbatic == 'z-a' && $absenseRate= 'low'){
			// 	array_multisort($schools, SORT_DESC, $rate, SORT_DESC,$absences,SORT_DESC, $array);
			// 	}
				if($rating == 'l-h' && $Alphtbatic == 'none' && $absenseRate=='none'){
					
					array_multisort( $rate, SORT_ASC,$array);
					
					}
					if($rating == 'none' && $Alphtbatic == 'z-a' && $absenseRate=='none'){
						array_multisort($schools, SORT_DESC,$array);
						}
						if($rating == 'none' && $Alphtbatic == 'none' && $absenseRate== 'low'){
							
							array_multisort($absences,SORT_DESC,$array);
							}
				
				//high search
				if($rating == 'h-l' && $Alphtbatic == 'none' && $absenseRate=='none'){
					
					array_multisort( $rate, SORT_DESC,$array);
					
					}
					if($rating == 'none' && $Alphtbatic == 'a-z' && $absenseRate=='none'){
						array_multisort($schools, SORT_ASC,$array);
						}
						if($rating == 'none' && $Alphtbatic == 'none' && $absenseRate=='high'){
							array_multisort($absences,SORT_ASC,$array);
							}
				
				

			}else{
			
				$error=1;
				
			}



				
				
				// Sort the data with volume descending, edition ascending
				// Add $data as the last parameter, to sort by the common key
				
				// foreach ($array as $row) {
				// 	echo $row['id'].'<br>';
				// 	echo $row['schools'].'<br>';
				// 	echo $row['rate'].'<br>';
				// 	echo $row['absences'].'<br>';
				// 	echo $row['images'].'<br>';
				// 	echo '<br><br><br><br><br>';
					
				// }

				
?>
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
						<h1 class="page-title">OUR SCHOOLS</h1>
						<ul>
							<li>
								<a class="active" href="index.php">Home</a>
							</li>
							<li>Our Schools</li>
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
						<div class="contact-comment-section " style="margin-left:30px; ;">
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
															foreach ($array as $rschool) {
																
?>
						<div class="col-lg-3 col-md-6 col-xs-6 grid-item ">
							<div class="team-item">
								<div class="team-img">
									<?php
									if($rschool['images'] == null)
									{

									?>
									<a href="#"><img src="image/school.png" alt="" /></a>
									<?php }else
									{
										?>
									<a href="#"><img src="admin/school/image/<?php echo $rschool['images'] ?>"
											height="210" class="img-fluid" alt="" /></a>
									<?php			}
										?>


									<div class="social-icon">
										<a href="teachers-single.php?v=<?php echo $rschool['schools']; ?>"><i
												class="fa fa-list"> <span style="font-family:Roboto Condensed"> School
													Details</span></i></a>
										<!-- <a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a> -->
										<a href="teacher_li.php?v=<?php echo $rschool['id']; ?>"><i
												class="fa fa-list">&nbsp;&nbsp; <span
													style="font-family:Roboto Condensed">Teacher
													List</span></i></a>
									</div>
								</div>
								<div class="team-body">
									<a href="teachers-single.php?v=<?php echo $rschool['schools']; ?>">
										<h3 class="name"><?php echo $rschool['schools']; ?></h3>
									</a>
									<span class="designation"><?php echo $district ?></span>
									<br>
									<span style="text-align: right;" class="text-right">Rating
										<?php echo round($rschool['rate'],2); ?></span>
										<br>
									<span style="text-align: right;" class="text-right">Teachers’ Attendance Rate
										<?php echo $rschool['absences']; ?>%</span>

								</div>
							</div>
						</div>

						<?php }
				
					if($error===1)
					{
					?>
						<div><center><h1>No Record Found Against Counrty and District</h1></center></div>

					<?php }?>

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
				






























<!-- 

<div class="team-item">
						<div class="team-img">
							<a href="#"><img src="images/teachers/1.jpg" alt="" /></a>
							<div class="social-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-body">
							<a href="teachers-single.html">
								<h3 class="name"><?php //echo $rschool['school_name']; ?></h3>
							</a>
							<span class="designation"><?php// echo $rschool['school_district']; ?></span>
						</div>
					</div> -->