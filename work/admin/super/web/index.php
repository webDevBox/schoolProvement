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
    <link href="../../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
    
    <header class="header ">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../superdash.php"> <img class="logo1" src="../../images/logo1.png"> <img class="logo2" src="../../images/logo2.png"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    
                </button>
              
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="btn btn-danger" href="../logout.php"><img src="https://img.icons8.com/dotty/20/000000/export.png"> <span class="mx-1">SIGN OUT </span></a>
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
            <h2 class="text-center text-white">Web Control Panel</h2>
          </div>
         
          <?php
          $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM entities"));
          $total=$sql['school'] + $sql['teacher'] + $sql['student'] + $sql['communityMember'];
          $news=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM news"));
          $blog=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blog"));
          ?>
         
          <div class="row d-flex justify-content-center">
           
              <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
                <a href="user.php">
                <h2 class="text-center text-white h3"> Add Users </h2>
                <h3 class="text-center mt-5 text-white"> Total:  <?php echo $total; ?> </h3>
                      </a>
              </div>
  
                 
              <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
                <a href="news.php">
                <h2 class="text-center text-white h2">Add News </h2>
                <h3 class="text-center mt-5 text-white"> Total:  <?php echo $news; ?> </h3>
              </a>
        </div>
                 
  
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 bg-info text-white block">
          <a href="blog.php">
          <h2 class="text-center text-white h2">Add Blogs  </h2>
          <h3 class="text-center mt-5 text-white"> Total:  <?php echo $blog; ?> </h3>
</a>
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
          window.location.href= '../index.html';
          </script>
        <?php
}
?>