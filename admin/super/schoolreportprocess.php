<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_GET['status']))
    {
    $status=$_GET['status'];
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
    <?php 
    include "sidebar.html"; 
    ?>
    <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
           </div>
           <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
           <form action="superreport.php" method="post">
            <div class="form-group d-none">
              <input type="text" name="school" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $status; ?>">
             
           </div>
           <input type="submit" name="fullschool" value="All Records" class="btn btn-primary mt-3">
           </form>
             </div>
           
          </div>
        </div>
       
        
                  <h3 class="text-center text-white"> Filter </h3>
                  
                <form action="superreport.php" method="post" enctype="multipart/form-data" class="form">
                  
                
              <div class="form-group">
                <small id="emailHelp" class="form-text small required">Select First Date</small>
                <input type="date" name="fdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
              </div>
              <div class="form-group">
                <small id="emailHelp" class="form-text small required">Select Second Date</small>
                  <input type="date" name="ldate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
               </div>
               
               <div class="form-group d-none">
                  <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $status; ?>">
               </div>
        
             <center> <input type="submit" name="school" value="submit" class="btn btn-primary"> </center>
             
            </form>
             
             
        
        
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
          window.location.href= 'index.html';
          </script>
        <?php
}
?>