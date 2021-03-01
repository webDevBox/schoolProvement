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
      <div style="background-color: #464644" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
        </div>

        <div class="w3-container">
            <h3 class="legend">Users</h3>
          </div>
          <?php
      $sql1=mysqli_query($conn,"SELECT * FROM student");
      $query1=mysqli_num_rows($sql1);

      $sql2=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_account='approved'");
      $query2=mysqli_num_rows($sql2);

      $sql3=mysqli_query($conn,"SELECT * FROM communitymember");
      $query3=mysqli_num_rows($sql3);

      $sql4=mysqli_query($conn,"SELECT * FROM parent");
      $query4=mysqli_num_rows($sql4);

      $sql5=mysqli_query($conn,"SELECT * FROM principal WHERE principal_account='approved'");
      $query5=mysqli_num_rows($sql5);

      $sql6=mysqli_query($conn,"SELECT * FROM district WHERE dist_account='approved'");
      $query6=mysqli_num_rows($sql6);

      $sql7=mysqli_query($conn,"SELECT * FROM logins WHERE type='super admin'");
      $query7=mysqli_num_rows($sql7);
      
      $sql8=mysqli_query($conn,"SELECT * FROM logins WHERE type='district admin'");
      $query8=mysqli_num_rows($sql8);
      
      $sql9=mysqli_query($conn,"SELECT * FROM logins WHERE type='principal'");
      $query9=mysqli_num_rows($sql9);

      $query10=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appfeedback"));
      $query12=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM country"));

      $sql11=mysqli_query($conn,"SELECT * FROM district WHERE block='5'");
      $query11=mysqli_num_rows($sql11);

      ?>
         
          <div class="row d-flex justify-content-center">
           
              <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
                <a href="addstudent.php">
                <h2 class="text-center text-white h3"> Students </h2>
                      <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query1; ?> </h3>
                      </a>
              </div>
  
                 
              <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
                <a href="addteacher.php">
                <h2 class="text-center text-white h2"> Teacher </h2>
                <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query2; ?> </h3>
              </a>
        </div>
                 
  
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
          <a href="communityMember.php">
          <h2 class="text-center text-white h2"> Community </h2>
          <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query3; ?> </h3>
</a>
  </div>
  
  
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
  <a href="parent.php">
    <h2 class="text-center text-white h2"> Parents </h2>
    <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query4; ?> </h3>
  </a>
  </div>
  
  
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
  <a href="principalList.php">
    <h2 class="text-center text-white h2"> Principals </h2>
    <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query5; ?> </h3>
    </a>
  </div>
  
  
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
    <a href="districtList.php">
    <h2 class="text-center text-white h2"> Districts </h2>
    <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query6; ?> </h3>
  </a>
  </div>
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
    <a href="country.php">
    <h2 class="text-center text-white h2"> Country </h2>
    <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query12; ?> </h3>
  </a>
  </div>
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
    <a href="appfeedback.php">
      <h2 class="text-center text-white h2"> App Feedback </h2>
      <h3 class="text-center text-white mt-5"> Total:  <?php echo $query10; ?> </h3>
  </a>
  </div>
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
    <a href="distblockList.php">
    <h2 class="text-center text-white h2"> Blocked District Admin Accounts  </h2>
    <h3 class="text-center mt-5 text-white"> Total:  <?php echo $query11; ?> </h3>
  </a>
  </div>
          </div>
  <div class="row d-flex justify-content-center">
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 text-white blockdown">
    <h2 class="text-center text-white h2"> Export Data </h2>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
   <a href="superreport.php?status=dist" class="btn btn-info center-align"> District Report </a>
   </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
   <a href="schoolreport.php?status=school" class="btn btn-info center-align" name="school"> School Report </a>
    </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
   <a href="teacherreport.php" class="btn btn-info center-align" name="teacher"> Teacher Report </a>
   </div>
   </div>
  </div>
  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 blockdown">
    <h2 class="text-center text-white h2"> App Logins by User </h2>
    <h3 class="text-center text-white"> Super Admin:  <?php echo $query7; ?> </h3>
    <h3 class="text-center text-white"> District Admin:  <?php echo $query8; ?> </h3>
    <h3 class="text-center text-white"> Principal:  <?php echo $query9; ?> </h3>
    <h3 class="text-center text-white"> Total:  <?php echo $query7+$query8+$query9; ?> </h3>
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
$(document).ready(function () {
    $('.editbtn').on('click',function() {
        $('#EditData').modal('show');
        
        $tr = $(this).closest('tr');

var data = $tr.children("td").map(function() {
    return $(this).text();

}).get();

console.log(data);

$('#update_id').val(data[0]);
$('#sname').val(data[1]);
$('#simage').val(data[2]);
$('#scountry').val(data[3]);
$('#sdistrict').val(data[4]);

    });
});
</script>

<script>
$(document).ready(function () {
    $('.deletebtn').on('click',function() {
        $('#DeleteData').modal('show');
        
        $tr = $(this).closest('tr');

var data = $tr.children("td").map(function() {
    return $(this).text();

}).get();

console.log(data);

$('#delete_id').val(data[0]);


    });
});

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