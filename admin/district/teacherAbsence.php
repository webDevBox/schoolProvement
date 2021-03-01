<?php
session_start();
include "conn.php";
include "config.php";
if(isset($_SESSION['id2']))
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
          <h1 class="text-center dash"><?php echo $lang['tpp'];?></h1>
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
                <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                <h5 class="text-center" style="color:white;"> <?php echo  $query['teacher_absence']; ?>   </h5>
                 <small style="color:white;">Absences</small>
                </div>
                  


                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                  
                 </div>
                 <?php
                  $date=strtotime(date("Y-m-d"));
                 $diff=abs(round(($joining-$date)/86400));
                 $weekends=($diff/30)*8;
                 $workdays=round($diff-$weekends);

                  ?>

                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                  <h5 class="text-center" style="color:white;"> <?php echo  $workdays; ?> %  </h5>
                  <small style="color:white;">Teacher Attendance Rate</small>
                 </div>

                 <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                 
                 </div>


                 <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                   <a href="teacherDetail.php?status=<?php echo $email; ?>">
                     <div>
                  <h5 class="text-center" style="color:white;"> <?php echo $avr; ?>  </h5>
                  <small style="color:white;">Rating</small>
                     </div> 
                   </a>
                </div>

              </div>
              </div> 

              <br>

              <?php
              $sql3=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id'");
              ?>
              <div class="container">
                <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
                  <table id="tableid" class="table bg-info table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
                   <thead>
              <tr> <th colspan="10" class="text-center text-white" scope="col">Teacher Details</th> </tr>
              <tr>
              <th class="text-center text-white" scope="col">Serial</th>
              <th class="text-center text-white" scope="col">Report Date</th>
              <th class="text-center text-white" scope="col">Shift</th>
              <th class="text-center text-white" scope="col">Attendance Status</th>
              <th class="text-center text-white" scope="col">Teacher Claim</th>
              <th class="text-center text-white" scope="col">Who Reported</th>
              <th class="text-center text-white" scope="col">Voting List</th>

              
              </tr>
          </thead>
          <tbody>
          <?php
          $serial=0;
              foreach($sql3 as $row)
              {
                if($sql3)
              {
                $serial++;
                ?>
                      <tr class="">
              <td class="text-center text-white"> <?php echo $serial; ?> </td>
              <td class="text-center text-white"> <?php echo $row['reportAbsence_date']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['reportAbsence_shift']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['attendance_status']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['teacher_claim']; ?> </td>
              <?php
                $role=$row['reporter_role'];
                $id=$row['reporter_id'];
                $status=$row['reportAbsence_id'];
                if($role == 'student')
                {
                  $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE student_id='$id'"));
                  $name=$sql4['student_anonymous_name'];
                }
               else if($role == 'teacher')
                {
                  $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id='$id'"));
                  $name=$sql4['teacher_firstName']." ".$sql4['teacher_lastName'];
                }
                else if($role == 'parent')
                {
                  $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM parent WHERE parent_id='$id'"));
                  $name=$sql4['parent_anonymous_name'];
                }
               else if($role == 'community')
                {
                  $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM communitymember WHERE communityMember_id='$id'"));
                  $name=$sql4['communityMember_anonymous_name'];
                }
                else if($role == 'principal')
                {
                  $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM principal WHERE principal_id='$id'"));
                  $name=$sql4['principal_name'];
                }

              ?>
              <td class="text-center text-white"> <?php echo "Role: "; echo $role; ?> <br>
             <?php echo "Name: "; echo $name; ?>
            </td>
            <td> <button onclick="window.location='vote.php?status=<?php echo $status; ?>'" type="button" class="rounded-pill btn btn-primary text-center" > Votings </button>  </td>   
                    
               
              
              
              </tr>
                <?php
                }
                else
                {
                    echo "No record Found";
                }
              }
          ?>
    </tbody>
          
          <?php
          
      ?>
      </table>
              </div>
    </div>


              </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
     <script>
 
       $(document).ready(function() {
           $('#tableid').DataTable();
       } );
       
       </script>

</body>
</html>
<?php
}
else {
          ?>
          <script>
          window.location.href= '../index.html';
          </script>
        <?php
}
?>