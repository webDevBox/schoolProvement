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


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Principal </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="principal.php" method="post" enctype="multipart/form-data" class="form">

       <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Principal Name</small>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Principal Name" required>
     
      </div>
      <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Principal Email</small>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Principal Email" required>
       
       </div>
      
       <div class="form-group">
        <?php
        $sql2=mysqli_query($conn,"SELECT * FROM country");
         ?>
         <small id="emailHelp" class="form-text small required">Select Principal Country</small>
         <select class="form-control" name="country" id="country" required>
           <option disabled selected>Select Country</option>
           <?php
           while( $row=mysqli_fetch_assoc($sql2))
           {
           ?>
           <option value="<?php echo $row['country_name']; ?>"> <?php echo $row['country_name']; ?> </option>
          <?php
           }
          ?>
         </select>
       </div>
  
  
   <div class="form-group">
    <small id="emailHelp" class="form-text small required">Select Principal District</small>
          <select class="form-control" name="dist" id="dist" required>
            <option disabled selected>Select District</option>
          
          </select>
        </div>
  
  
        <div class="form-group">   
          <small id="emailHelp" class="form-text small required">Select Principal School</small>
           <select class="form-control" name="school" id="school" required>
             <option disabled selected>Select School</option>
            
           </select>
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
        Add Principal
    </button>
          </div>
          </div>
        </div>
        <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
            <thead>
              <tr> <th colspan="9" class="text-center" scope="col">Principals List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Name</th>
              <th class="text-center" scope="col">Email</th>
              <th class="text-center" scope="col">Joining</th>
              <th class="text-center" scope="col">Country</th>
              <th class="text-center" scope="col">District</th>
              <th class="text-center" scope="col">School</th>
              <th class="text-center" scope="col">Completed Habits</th>
              <th class="text-center" scope="col"> Delete </th>
              <th class="text-center" scope="col"> Edit </th>
             
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
          $query = "SELECT * from principal WHERE principal_account='approved'";
          $query_run = mysqli_query($conn,$query);
          if($query_run)
          {
              foreach($query_run as $row)
              {
                $sub=$sub+1;  
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['principal_name']; ?> </td>
              <td class="text-center"> <?php echo $row['principal_email']; ?> </td>
              <td class="text-center"> <?php echo $row['principal_joiningDate']; ?> </td>
              <?php
              $principal_id=$row['principal_id'];
              $school_id=$row['school_id'];
              $tumb=mysqli_query($conn,"SELECT * FROM school where school_id='$school_id;'");
              $tumb1=mysqli_fetch_assoc($tumb);
              $schoolName=$tumb1['school_name'];
              $principal="principal";
            $completed="completed";
          $com_habit=mysqli_query($conn,"SELECT * FROM habitstatus WHERE user_role='$principal' && status='$completed' && user_id='$principal_id'");
          $habit=mysqli_num_rows($com_habit);
              ?>
              <td class="text-center"> <?php echo $row['country_name']; ?> </td>
              <td class="text-center"> <?php echo $row['principal_district']; ?> </td>
              <td class="text-center"> <?php echo $schoolName; ?> </td>
              <td class="text-center"> <?php echo $habit; ?> </td>
             

              <td> <button onclick="{
  var x = confirm('Are you sure you want to delete?');
  if (x)
     window.location='delprincipal.php?status=<?php echo $principal_id; ?>';
  
}" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
              <td> <button onclick="window.location='editprincipal.php?status=<?php echo $principal_id; ?>'" type="button" class="rounded-pill btn btn-primary" > Edit </button>  </td>   
              
              
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

<script>
  $(document).ready(function()
  {
    $("#dist").change(function()
    {
      if($(this).val() !='')
      {
        var dist=$(this).val();
        $.ajax({
            url:"ajax.php",
            method:"post",
            data:{dist:dist},
            success:function(data)
            {
              $("#school").html(data);
            }
        });
      }
    });
  });
</script>
<script>
  $(document).ready(function()
  {
$("#country").change(function()
{
if($(this).val() != '')
{
  var country=$(this).val();
  $.ajax({
    url:"ajaxcountry.php",
    method:"post",
    data:{country:country},
    success:function(data)
    {
      $("#dist").html(data);
    }
  });

}
});
  });
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