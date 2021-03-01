<?php
session_start();
include "conn.php";
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
          <h1 class="text-center dash">District Admin Dashboard</h1>
        </div>
        <?php
        $school=$_GET['status'];
      
        $sql=mysqli_query($conn,"SELECT * FROM school WHERE school_name='$school'");
        $query=mysqli_fetch_assoc($sql);
        $school_id=$query['school_id'];
        
        $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE school_id='$school_id'");
        $abs=0;
        while($query1=mysqli_fetch_assoc($sql1))
        {
          $abs=$abs+$query1['teacher_absence'];
        }
        
        
        $total=0;
        $sql2=mysqli_query($conn,"SELECT * FROM schoolfeedback WHERE school_id=' $school_id'");
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
          $avr="Not Rated";
        }
        ?>
                <div class="container bg-info">
                 
                 <h1 class="text-center text-white"> <?php echo $school; ?> </h1>
                 <h5 class="text-center text-light" style="color:white;"> <?php echo  $query['school_district'].' , '.$query['country_name']; ?>  </h5>
                <div class="row">
                  <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                  
                      <div>
                 <h5 class="ml-3" style="color:white;  font-weight: bold;"> <?php echo  $abs; ?>   </h5>
                 <small style="color:white;">Absences</small>
                </div>
      
      </div>

                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                  
                 </div>


                 <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                  <h5 class="text-center" style="color:white;"> <?php echo  $abs; ?>   </h5>
                  <small style="color:white;">School Attendance Rate</small>
                 </div>

                 <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                 
                 </div>


                 <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                   <a href="schoolDetail.php?status=<?php echo $school; ?>">
                     <div>
                  <h5 style="color:white;  font-weight: bold;"> <?php echo $avr; ?>  </h5>
                  <small style="color:white;">Rating</small>
                 </div>
      </a>
      </div>

              </div>
              </div> 
              <br> 
             
              <?php
              $sql3=mysqli_query($conn,"SELECT * FROM reportabsence WHERE school_id='$school_id'");
              ?>
              <div class="container">
              <table id="tableid" class="table bg-info table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
          <thead>
              <tr> <th colspan="10" class="text-center text-white" scope="col">Teacher Details</th> </tr>
              <tr>
              <th class="text-center text-white" scope="col">Serial</th>
              <th class="text-center text-white" scope="col">Teacher Name</th>
              <th class="text-center text-white" scope="col">Report Absence Date</th>
              <th class="text-center text-white" scope="col">Shift</th>
              <th class="text-center text-white" scope="col">Attendance Status</th>
              <th class="text-center text-white" scope="col">Absence Reason</th>
              <th class="text-center text-white" scope="col">Teacher Claim</th>
              
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
              <?php
              $teacher_id=$row['teacher_id'];
              $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id='$teacher_id'"));
              $teacherName=$sql4['teacher_firstName'].' '.$sql4['teacher_lastName'];
              ?>
              <td class="text-center text-white"> <?php echo $teacherName; ?> </td>
              <td class="text-center text-white"> <?php echo $row['reportAbsence_date']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['reportAbsence_shift']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['attendance_status']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['teacher_reason']; ?> </td>
              <td class="text-center text-white"> <?php echo $row['teacher_claim']; ?> </td>

               
              
              
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