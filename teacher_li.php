<!DOCTYPE html>
<html lang="zxx">
    <?php
    $school = $_GET['v'];
    include'conn.php';

    $result1 = mysqli_query($con, "SELECT * FROM teacher where school_id = '$school'");
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
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
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
    </head>

    <body class="inner-page">
        <!--Preloader area start here-->
        <!-- <div class="book_preload">
                <div class="book">
                        <div class="book__page"></div>
                        <div class="book__page"></div>
                        <div class="book__page"></div>
                </div>
        </div> -->
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
                            <a href="index.php"><img src="image/as.png" class="img-fluid" style="height: 60px;" alt="logo"></a>
                                        
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
                                        <li class=" menu-item-has-children"><a
                                                href="about-us.html">About Us</a>

                                        </li>
                                        <!--About Menu End-->

                                        <!-- Drop Down -->
                                        <li class="current-menu-item current_page_item menu-item-has-children"> <a href="schools-and-teachers.php">Schools</a>
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
                            <h1 class="page-title">School</h1>
                            <ul>
                                <li>
                                    <a class="active" href="index.php">Home</a>
                                </li>
                                <li>List of Teachers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Team Single Start -->
        <!-- Team Single End -->

        <!-- Team Start -->
        <div id="rs-team-2" class="rs-team-2 pt-70 pb-70">
            <div class="container">
                <div class="sec-title-2 mb-50">
                    <h2>    list of  TEACHERS</h2>
                    <!-- <p>Fusce sem dolor, interdum in fficitur at, faucibus nec lorem.</p> -->
                </div>
                <div class="row">
<?php
while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>





                        <div class="col-lg-3 col-md-6">
                            <div class="team-item">
                                <div class="team-img">
                                   <?php if($row1['teacher_image'] == null){  ?>
                                        <a href="#"><img src="image/users.png" alt="" /></a> 
                                   <?php }else {?>
                                    <a href="#"><img src="admin/school/teacher/<?php echo $row1['teacher_image']?>" height="210"  class="img-fluid rounded-circle " alt="" /></a>
						<?php			}
										?>
                                
                                <?php
                      $teacher_id=$row1['teacher_id'];
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
                                
                                
                                
                                <!-- <div class="social-icon">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div> -->
                                </div>
                                <div class="team-body">
                                <a href="teacherDetails.php?v=<?php echo $row1['teacher_id'] ?>">    
                                <h3 class="name"> <?php echo $row1['teacher_firstName'] . ' ' . $row1['teacher_lastName']; ?></h3></a>
                                     <span class="designation">Attendance: <?php echo $row1['attendance_percentage']; ?>%</span> <br>
                                     <span class="designation">Average Rating: <?php echo $avr; ?>/5</span> 
                                     
                                </div>
                            </div>
                        </div>


<?php } ?>
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
        				
        
        
        <footer id="rs-footer" class="bg3 rs-footer mt-0" style="radius-top: 1000px;" >
            <div class="container" style="margin-top: 50px;">
                <!-- Footer Address -->
            <!--    <div>-->
            <!--        <div class="row footer-contact-desc" >-->
            <!--            <div class="col-md-4">-->
            <!--                <div class="contact-inner">-->
            <!--                    <i class="fa fa-map-marker"></i>-->
            <!--                    <h4 class="contact-title">Address</h4>-->
            <!--                    <p class="contact-desc">-->
            <!--                        239/B, Commercial Block, Sector – C Near Grand Jamia Masjid, Bahria Town, Lahore, Pakistan-->
            <!--                    </p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-md-4">-->
            <!--                <div class="contact-inner">-->
            <!--                    <i class="fa fa-phone"></i>-->
            <!--                    <h4 class="contact-title">Phone Number</h4>-->
            <!--                    <p class="contact-desc">-->
            <!--                        (042) 35133497-->
            <!--                    </p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-md-4">-->
            <!--                <div class="contact-inner">-->
            <!--                    <i class="fa fa-map-marker"></i>-->
            <!--                    <h4 class="contact-title">Email Address</h4>-->
            <!--                    <p class="contact-desc">-->
            <!--                        info@digitalinnovation.pk-->
            <!--                    </p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Footer Top -->
          <!--  <div class="footer-top">
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

    <!-- Mirrored from keenitsolutions.com/products/html/SchoolProvement/SchoolProvement-demo/teachers-single.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 26 Mar 2020 14:43:51 GMT -->

</html> 