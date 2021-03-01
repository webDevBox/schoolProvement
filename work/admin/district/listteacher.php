<?php
session_start();
include "conn.php";
include "config.php";

if(isset($_SESSION['id2']))
{
    $id = $_SESSION['id2'];
    $result1 =  mysqli_query($conn, "SELECT * FROM district WHERE dist_id = '$id' ");
    $row=mysqli_fetch_assoc($result1);
    $aa = $row['dist_name'];

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


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Single Teacher </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="teacher.php" method="post" enctype="multipart/form-data" class="form">
       <div class="form-group">
       <small id="emailHelp" class="form-text small required">Enter First Name</small>
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher First Name" required>
        
      </div>
      <div class="form-group">
      <small id="emailHelp" class="form-text small required">Enter Last Name</small>
          <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Last Name" required>
        
       </div>
       <div class="form-group">
       <small id="emailHelp" class="form-text small required">Enter Email</small>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Email" required>
       
     </div>
     <div class="d-none form-group">
             <input type="type" value="<?php echo $row['country_name']; ?>" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher District" required>
             
           </div>
 <div class="d-none form-group">
        <input type="type" value="<?php echo $aa ?>" name="dist" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher District" required>
        
      </div>
      <div class="form-group">   
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM school where school_district = '$aa'");
         ?>
         <small id="emailHelp" class="form-text small required">Select School</small>
         <select class="form-control" name="school" required>
           <option disabled selected>Select School</option>
           <?php
           while( $row=mysqli_fetch_assoc($sql))
           {
           ?>
           <option value="<?php echo $row['school_name']; ?>"> <?php echo $row['school_name']; ?> </option>
          <?php
           }
          ?>
         </select>
            
          </div>
      
     <div class="form-group">
     <small id="emailHelp" class="form-text small ">Select Teacher Image</small>
  <input name="image" type="file" title="Select School Image" class="form-control">
 
</div>
     <center> <input type="submit" name="submit" value="submit" class="btn btn-primary"> </center>
     
    </form>
 </div>


<!--Bulk of Data-->

<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> Add Multiple Teachers (Excel File) </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
   <form action="teacher.php" method="post" enctype="multipart/form-data" class="form">

<div class="form-group">
<small id="emailHelp" class="form-text small required">Select Teacher Excel File</small>
<input name="excel" type="file" title="Select School Image" class="form-control" required>

</div>
<div class="row mx-auto">
<a href="report.xlsx" class="btn btn-info center-align mx-auto">Excel Format</a>
 <input type="submit" name="file" value="submit" class="btn btn-primary"> 
          </div>
</form>
</div>

    </div>
  </div>



    <header class="header ">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="distdash.php"> <img class="logo1" src="../images/logo1.png"> <img class="logo2" src="../images/logo2.png"> </a>
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
    <?php include "sidebar.php"; ?>
  
    <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                    <h1 class="text-center dash"><?php echo $lang['dd']; ?></h1>
           </div>
           <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 mt-3">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <?php echo $lang['at']; ?>
    </button>
          </div>
          </div>
        </div>
        <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover">
           <thead>
              <tr> <th colspan="10" class="text-center" scope="col">Teachers List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Name</th>
              <th class="text-center" scope="col">Email</th>
              <th class="text-center" scope="col">Image</th>
              <th class="text-center" scope="col">Joining Date</th>
              <th class="text-center" scope="col">School</th>
              <th class="text-center" scope="col"> Delete </th>
             <!-- <th class="text-center" scope="col"> Edit </th>
          -->
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
          $query = "SELECT * FROM teacher WHERE teacher_account='approved' and teacher_district = '$aa'";
          $query_run = mysqli_query($conn,$query);
          if($query_run)
          {
              foreach($query_run as $row)
              {
                $sub=$sub+1;  
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['teacher_firstName']; echo " "; echo $row['teacher_lastName']; ?> </td>
              <td class="text-center"> <?php echo $row['teacher_email']; ?> </td>
              <td class="text-center"> <img class="img-fluid  mainorg rounded-pill" src="../school/teacher/<?php echo $row['teacher_image']; ?>" alt="Teacher Image not available" /> </td>
              <td class="text-center"> <?php echo $row['joining_date']; ?> </td>
              <?php
              $email=$row['teacher_email'];
              $tumb=mysqli_query($conn,"SELECT * FROM teacher where teacher_email='$email'");
              $tumb1=mysqli_fetch_assoc($tumb);
              $school_id=$tumb1['school_id'];
              $tumb2=mysqli_query($conn,"SELECT * FROM school where school_id='$school_id'");
              $tumb3=mysqli_fetch_assoc($tumb2);
              $schoolName=$tumb3['school_name'];
              ?>
              <td class="text-center"> <?php echo $schoolName; ?> </td>

              <td class="text-center"> <button onclick="{
                var x = confirm('Are you sure you want to delete?');
                if (x)
                   window.location='delteacher.php?status=<?php echo $email; ?>';
                
              }" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
              <!-- <td> <button onclick="window.location='editteacher.php?status=<?php echo $email; ?>'" type="button" class="rounded-pill btn btn-primary" > Edit </button>  </td>   
               -->
              
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