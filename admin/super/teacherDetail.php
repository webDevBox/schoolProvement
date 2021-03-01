<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolProvement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
 <header class="header ">
         <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="superdash.php"> <img class="logo1" src="../images/logo1.png"> <img class="logo2" src="../images/logo2.png"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    
                </button>
              
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php"><img src="https://img.icons8.com/dotty/20/000000/export.png"> <span class="mx-1">SIGN OUT </span></a>
                      </li>
                      </ul>
                    
                  </div>
              </nav>
    </header>
    <div class="row">
    <?php include "sidebar.html"; ?>
  
    <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
        </div>
        <?php
        $email=$_GET['status'];
       
        $sql=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
        $query=mysqli_fetch_assoc($sql);
        $school_id=$query['school_id'];
        $teacher_id=$query['teacher_id'];
        $fname=$query['teacher_firstName'];
        $lastname=$query['teacher_lastName'];
        $teachername=$fname .' '. $lastname;
        $joining=strtotime($query['joining_date']);
        $percent=$query['attendance_percentage'];

        $sql1=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
        $query1=mysqli_fetch_assoc($sql1);
        $school=$query1['school_name'];

        $total=0;
        $sql2=mysqli_query($conn,"SELECT * FROM feedback WHERE teacher_feedback_id='$teacher_id'");
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
          $avr="Not Rated";
        }
        ?>
                <div class="container bg-info">
                  <img class="img-fluid rounded-circle mx-auto py-2 d-block" width="100"  src="../school/teacher/<?php echo $query['teacher_image']; ?>" alt="Image Not available"/>
                 <h1 class="text-center text-white"> <?php echo $teachername; ?> </h1>
                 <h5 class="text-center text-light"> <?php echo  $school; ?>  </h5>
                <div class="row">
                  <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <a href="teacherAbsence.php?status=<?php echo $email; ?>">
                      <div>
                    <h5 class="ml-3" style="color:white;"> <?php echo $query['teacher_absence']; ?>   </h5>
                 <small style="color:white; font-weight: bold;">Absences</small>
                      </div>
                </a>
                </div>
                  


                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                  
                 </div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                  <h5 class="ml-5" style="color:white;"> <?php echo $percent; ?> %  </h5>
                  <small style="color:white; font-weight: bold;">Teacher Attendance Rate</small>
                 </div>

                 <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                 
                 </div>


                 <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                     <div>
                  <h5 style="color:white;"> <?php echo $avr; ?>  </h5>
                  <small style="color:white; font-weight: bold;">Rating</small>
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
                $sql3=mysqli_query($conn,"SELECT feedback_rating FROM feedback WHERE teacher_feedback_id='$teacher_id'");
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
              <div class="container bg-info">
                <h3 class="h3 text-center text-white">Average Rating = <?php echo $avr; ?></h3>
                  <?php
                  if($avr != "Not Rated")
                  {
                    ?>
                    <div class="row">
                      <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                          <p>5 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
                      </div>
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: <?php echo $v5; ?>%;color:black;" > <?php echo $v5.'%'; ?> </div>
                    </div>
                      </div>
                  <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                        <p> <?php echo $star5;?> </p>
                    </div>
                  </div>
                    
                    <div class="row">
                      <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                          <p>4 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
                      </div>
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: <?php echo $v4; ?>%;color:black;" ><?php echo $v4.'%'; ?></div>
                    </div>
                      </div>
                  <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                    <p> <?php echo $star4;?> </p>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                        <p>3 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
                    </div>
                  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: <?php echo $v3; ?>%;color:black;" ><?php echo $v3.'%'; ?></div>
                  </div>
                    </div>
                <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                  <p> <?php echo $star3;?> </p>
                  </div>
                </div>
                  

                  <div class="row">
                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                        <p>2 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
                    </div>
                  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: <?php echo $v2; ?>%;color:black;" ><?php echo $v2.'%'; ?></div>
                  </div>
                    </div>
                <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                  <p> <?php echo $star2;?> </p>
                  </div>
                </div>
                  

                  <div class="row">
                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                        <p>1 <img src="https://img.icons8.com/color/15/000000/christmas-star.png"></p>
                    </div>
                  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: <?php echo $v1; ?>%;color:black;" ><?php echo $v1.'%'; ?></div>
                  </div>
                    </div>
                <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                  <p> <?php echo $star1;?> </p>
                  </div>
                </div>
                    <?php
                  }

                  $sql4=mysqli_query($conn,"SELECT * FROM feedback WHERE teacher_feedback_id='$teacher_id'");
                  $review_counter=mysqli_num_rows($sql4);
                  ?>
              </div>
           <h1 class="text-center text-white"> Reviews </h1>
              <div class="container bg-info">
                <div class="row d-flex justify-content-center">
                    <?php
                    if($review_counter > 0)
                    {
                    foreach($sql4 as $sub)
                    {
                      ?>
                      <div class="rounded shadow col-md-11 col-lg-11 col-sm-2 col-xs-2 mx-1 my-2 bg-white">
                        <div class="container">
                        <div class="row">
                          <img src="https://img.icons8.com/ios-glyphs/30/000000/head-massage-area.png">
                          <h4 class="ml-2"> Anonymous User </h4>
                          <?php
                              $how=$sub['feedback_rating'];
                          ?>
                          <span class="ml-auto">
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
                          </span>
                        </div> </div>
                        <br>
                        <div class="container">
                        <div class="row">
                         
                        <p class="block d-inline word-wrap">Comment: <?php echo $sub['feedback_review_text']; ?></p>
                        <?php 
                        $review_id=$sub['feedback_id']; 
                        
                        ?>
                        <span class="ml-auto">
                          <button onclick="{  var x = confirm('Are you sure you want to delete?'); if(x){window.location='delteacherreview.php?status=<?php echo $review_id; ?> & email=<?php echo $email; ?>';} }" type="button" class="rounded-pill btn btn-danger text-center" > Delete </button> 
                        </span>
                    </div>
                  </div>
                  </div>
                      <?php
                    }
                  }
                  else{
                     ?>
                     <h2 class="text-white">No Review yet</h2>
                     <?php
                  }
                    ?>
                </div>
              </div>
</div>
    </div>



</body>
</html>
<?php
}
else {
          ?>
          <script>
          window.location.href= 'index.html';
          </script>
        <?php
}
?>