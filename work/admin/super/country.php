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
    <script src="../jquery.js" type="text/javascript"></script>

</head>
<body>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Student </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="#" method="post" class="form">
       <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Country Name</small>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country Name" required>
      </div>
      <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Country Code</small>
          <input type="number" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country Code" required>
       </div>
       
     <center> <input type="submit" name="submit" value="submit" class="btn btn-primary"> </center>
     
    </form>
 </div>
    </div>
  </div>
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
                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
           </div>
           <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 mt-3">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Country
    </button> 
          </div> 
          </div>
        </div>
        <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
          <thead>
              <tr> <th colspan="10" class="text-center" scope="col">Parents List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Country Name</th>
              <th class="text-center" scope="col">Country Code</th>
              <th class="text-center" scope="col"> Delete </th>
             
    
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
          $query = "SELECT * from country";
          $query_run = mysqli_query($conn,$query);
          if($query_run)
          {
              foreach($query_run as $row)
              {
                $sub=$sub+1;  
                $id=$row['country_id'];
             
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['country_name']; ?> </td>
              <td class="text-center"> <?php echo $row['country_code']; ?> </td>
              <td class="text-center"> <button onclick="{
  var x = confirm('Are you sure you want to delete?');
  if (x)
     window.location='delcountry.php?status=<?php echo $row['country_name']; ?>';
  
}" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
             
              
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

$(document).ready(function() {
    $('#tableid').DataTable();
});

</script>

</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $code=$_POST['code'];
    $query=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM country WHERE country_name='$name'"));
    $query1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM country WHERE country_code='$code'"));
    if($query1 == 0)
    {
    if($query == 0)
    {
    $sql=mysqli_query($conn,"INSERT INTO country(country_name,country_code) VALUES('$name','$code')");
    if($sql)
    {
        ?>
          <script>
              window.alert("Country Added Successfully");
          window.location.href= 'country.php';
          </script>
        <?php 
    }
    else
    {
        ?>
        <script>
            window.alert("Country Not Added");
        window.location.href= 'country.php';
        </script>
      <?php 
    }
}
else
{
    ?>
    <script>
        window.alert("Country Name Already Exist");
    window.location.href= 'country.php';
    </script>
  <?php 
}
}
else
{
    ?>
    <script>
        window.alert("This Country Code Already Exist");
    window.location.href= 'country.php';
    </script>
  <?php 
}
}
}
else {
          ?>
          <script>
          window.location.href= 'index.html';
          </script>
        <?php
}
?>