<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolProvement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
  
    <div style="background-color: #464644" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
        </div>
          <?php
            $id=$_GET['status'];
           $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id='$id'");
           $row=mysqli_fetch_assoc($sql1);
          ?>

<form action="editteacherprocess.php" method="post" class="form">
          
          <legend class="legend">Update Teacher</legend>
      <div class="form-group">
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['teacher_firstName']; ?>" required>
        <small id="emailHelp" class="form-text small required">Enter First Name</small>
      </div>
      <div class="form-group">
          <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['teacher_lastName']; ?>" required>
          <small id="emailHelp" class="form-text small required">Enter Last Name</small>
       </div>
        <div class="form-group">
          <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['teacher_email']; ?>" required>
          <small id="emailHelp" class="form-text small required">Enter Email</small>
       </div>
       <div class="form-group d-none">
        <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $id; ?>">
      
      </div>
       
     <center> <input type="submit" name="update" value="Update Record" class="btn btn-primary"> </center>
     
    </form>
<hr>
    <form action="editteacherprocess.php" method="post" class="form">
      <legend class="legend">Update Password</legend>
      <div class="form-group">
        <input type="password" name="teachpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New Password" required>
        <small id="emailHelp" class="form-text small required">Enter Password</small>
     </div>
       
       <div class="form-group d-none">
        <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $id; ?>">
      
      </div>


      <center> <input type="submit" name="pass" value="Update Password" class="btn btn-primary"> </center>
     
    </form>
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