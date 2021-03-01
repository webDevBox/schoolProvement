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
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
           </div>
          </div>
        </div>

        <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
          <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
            <thead>
                <tr> <th colspan="6" class="text-center" scope="col">Habit List</th> </tr>
                <tr>
                <th class="text-center" scope="col">Serial</th>
                <th class="text-center" scope="col">Status </th>
                <th class="text-center" scope="col">Completed Days</th>
                <th class="text-center" scope="col"> User Type</th>
                <th class="text-center" scope="col">  User </th>
                </tr>
            </thead>
  
           
  
            <tbody>
                 <?php
                    $id=$_GET['status'];
            $sub=0;
            $query = "SELECT * FROM habitstatus WHERE habit_id='$id'";
            $query_run = mysqli_query($conn,$query);
            
            if($query_run)
            {
                foreach($query_run as $row)
                {
                  $sub=$sub+1;
                  $user=$row['user_id'];
            ?>
                <tr>
                <td class="text-center"> <?php echo $sub; ?> </td>
                <td class="text-center"> <?php echo $row['status']; ?> </td>
                <td class="text-center"> <?php echo $row['completed_days']; ?> </td>
                <td class="text-center"> <?php echo $row['user_role']; ?> </td> 
                <?php
                if($row['user_role'] == 'teacher')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['teacher_firstName']; echo " "; echo $query1['teacher_lastName']; ?> </td> <?php
                }

                if($row['user_role'] == 'student')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM student WHERE student_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['student_anonymous_name']; ?> </td> <?php
                }

                if($row['user_role'] == 'parent')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM parent WHERE parent_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['parent_anonymous_name']; ?> </td> <?php
                }

                if($row['user_role'] == 'principal')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM principal WHERE principal_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['principal_name']; ?> </td> <?php
                }

                if($row['user_role'] == 'communityMember')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM communitymember WHERE communityMember_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['communityMember_anonymous_name']; ?> </td> <?php
                }

                if($row['user_role'] == 'districtAdmin')
                {
                  $sql1=mysqli_query($conn,"SELECT * FROM district WHERE dist_id='$user'");
                  $query1=mysqli_fetch_assoc($sql1);
                 ?> <td class="text-center"> <?php echo $query1['dist_name']; ?> </td> <?php
                }

                ?>  
               
                            
                </tr>
                <?php
                }
                ?>
                
            </tbody>
            
            <?php
            }
            else
            {
                echo "No record Found";
            }
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
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        function signup() {
          document.getElementById("signup").style.display = "block";
        }
        
        function closeForm1() {
          document.getElementById("myForm").style.display = "none";
        }
        function closeForm2() {
          document.getElementById("signup").style.display = "none";
        }
        </script>
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
          window.location.href= 'index.html';
          </script>
        <?php
}
?>