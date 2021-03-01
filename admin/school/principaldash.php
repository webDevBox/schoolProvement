<?php
session_start();
include "conn.php";
include "config.php";
if(isset($_SESSION['id1']))
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
    <?php
$p=$_SESSION['id1'];
$sql=mysqli_query($conn,"SELECT * FROM principal WHERE principal_id = '$p'");
$row=mysqli_fetch_assoc($sql);
$a=$row['school_id'];

    $sql1=mysqli_query($conn,"SELECT * FROM student WHERE school_id = '$a' ");
      $query1=mysqli_num_rows($sql1);

      $sql2=mysqli_query($conn,"SELECT * FROM teacher WHERE school_id = '$a'");
      $query2=mysqli_num_rows($sql2);

      $sql3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM school WHERE school_id = '$a'"));
      $school=$sql3['school_name'];
    ?>
      <div class="row">
    <?php include "sidebar.php"; ?>
  
    <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <h1 class="text-center dash"><?php echo $school; echo" "; echo $lang['dad']; ?></h1>
           </div>
          

          </div>
        </div>
            
        <div class="row d-flex justify-content-center">
           
           <!-- <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
             <a href="student.php">
             <h2 class="text-center text-white h3"> Students </h2>
                   <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query1; ?> </h3>
                   </a>
           </div> -->

              
           <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
             <a href="teacher.php">
             <h2 class="text-center text-white h2"> <?php echo $lang['teacher']; ?> </h2>
             <h3 class="text-center mt-5 text-white"> <?php echo $lang['t']; ?>:  <?php echo $query2; ?> </h3>
           </a>
     </div>
     <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
             
             <h2 class="text-center text-white h2"> <?php echo $lang['ed']; ?> </h2>
             <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
             <a href="schoolreport.php?status=<?php echo $a ?>  " class="btn btn-success " name="school"> <?php echo $lang['sr']; ?> </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
             <a href="teacherreport.php" class="btn btn-success" name="teacher"> <?php echo $lang['tr']; ?> </a>
  </div>
             </div>
     </div>
              
              
        <!--Data here-->
    </div>
        
  </div>
  <div class="container">
      <div class="row">
          <center style="margin-top: 20px;margin-left:350px">                            <a href="principaldash.php?lang=en" class="btn btn-danger"><?php echo $lang['lang_en']; ?></a> | <a href="principaldash.php?lang=hi" class="btn btn-danger"><?php echo $lang['lang_hi']; ?></a> | <a href="principaldash.php?lang=fr" class="btn btn-danger"><?php echo $lang['lang_fr']; ?></a> | <a href="principaldash.php?lang=sp" class="btn btn-danger"><?php echo $lang['lang_sp']; ?></a></center>
          
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