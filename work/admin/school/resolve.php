<?php
session_start();
include "conn.php";
include "config.php";
if(isset($_SESSION['id1']))
{

if(isset($_GET['status']))
{
    $teacher_id=$_GET['status'];
    $principal_id=$_SESSION['id1'];
    $school=mysqli_query($conn,"SELECT * FROM principal WHERE principal_id='$principal_id'");
    $school_fetch=mysqli_fetch_assoc($school);
    $school_id=$school_fetch['school_id'];
    $sql2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'"));
    $schoolName=$sql2['school_name'];
}

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
    <script src="../jquery.js" type="text/javascript"></script>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>

    <header class="header ">
       
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="principaldash.php"> <img class="logo1" src="../images/logo1.png"> <img class="logo2" src="../images/logo2.png"> </a>
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
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <h1 class="text-center dash"><?php echo $schoolName; echo " "; echo $lang['dad']; ?></h1>
           </div>
          
          </div>

          <div class="container bg-info">
              <?php
                 $sql=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id='$teacher_id'");
                 $fetching=mysqli_fetch_assoc($sql);
                 $first=$fetching['teacher_firstName'];
                 $last=$fetching['teacher_lastName'];

                 ?>
            <h1 class="text-center text-white"> <?php echo $first; echo " "; echo $last; ?> </h1>
            
          <?php
          $present="Teacher Negated Absence";
          $absence="absent";
          $sql1=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id' && teacher_claim='$present' && attendance_status='$absence' && resolve='no'");
          
            $num=mysqli_num_rows($sql1);
            if($num>0)
            {
          ?>
               
           <?php
           while($row=mysqli_fetch_assoc($sql1))
           {
?>            
<form action="resolveprocess.php" method="post">
    <div class="row">
<div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
    <div class="form-group">
        <label for="exampleFormControlInput1"><?php echo $lang['report d']; ?></label>
        <input type="text" class="form-control" value="<?php echo $row['reportAbsence_date']; ?> " disabled>
      </div>
                <?php
                $date=$row['reportAbsence_date'];
                ?>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><?php echo $lang['select a']; ?></label> <br>
                    <button type="button" id="present" class="btn btn-primary" onclick="window.location='resolveprocess.php?action=1 & status=<?php echo $date; ?> & teacher=<?php echo $teacher_id; ?>'"><?php echo $lang['Present']; ?></button>
                    <button type="button" id="absent" class="btn btn-danger" onclick="window.location='resolveprocess.php?action=0 & status=<?php echo $date; ?> & teacher=<?php echo $teacher_id; ?>'"><?php echo $lang['Absent']; ?></button>
                  </div>
                
            </div>
            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
            </div>
        </div>
      
    </form>
            <?php
        }
            ?>
            
      
<?php
    }
    else
    {
        ?>
        <script>
        window.alert("No Record Found");
        window.location.href='conflict.php';
        </script>
        <?php
    }
    
?>
         </div>
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