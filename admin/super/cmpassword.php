<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if($_GET)
    {
        $runpass=md5(12345);
        $reset=$_GET['status'];
        $runtime=mysqli_query($conn,"UPDATE communitymember SET communityMember_reset_password=0, communityMember_password='$runpass' WHERE communityMember_email='$reset'");
        if($runtime)
        {
            ?>
    <script>
    window.alert('Password Reset Successfully');
    window.location.href= 'cmpassword.php';
    </script>
    <?php 
        }
        else{
            ?>
            <script>
            window.alert('Password Not Reset Successfully');
            window.location.href= 'cmpassword.php';
            </script>
            <?php 
        }
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


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Community Member </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="addCommunityMember.php" method="post" enctype="multipart/form-data" class="form">
       <div class="form-group">
         <small id="emailHelp" class="form-text small required">Enter Name</small>  
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Community Member Name" required>
      </div>
       <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Email</small>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Community Member Email" required>
          </div>
        
       <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter Password</small>
    
        <input type="password" name="pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Community Member Password" required>
         </div>
 <div class="form-group">
       <small id="emailHelp" class="form-text small required">Select School District</small>
       <?php
       $sql=mysqli_query($conn,"SELECT * FROM district");
        ?>
        <select class="form-control" name="dist" required>
          <option disabled selected>Select District</option>
          <?php
          while( $row=mysqli_fetch_assoc($sql))
          {
          ?>
          <option value="<?php echo $row['dist_name']; ?>"> <?php echo $row['dist_name']; ?> </option>
         <?php
          }
         ?>
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
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
           </div>
           <!--
           <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 mt-3">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Member
    </button>
          </div> -->
          </div>
        </div>
        <div class="table-responsive">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
          <thead>
              <tr> <th colspan="10" class="text-center" scope="col">Reset Password Request Community Member List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Community Member Name</th>
              <th class="text-center" scope="col">Community Member Email</th>
              <th class="text-center" scope="col">Community Member Country</th>
              <th class="text-center" scope="col">Community Member State</th>
              <th class="text-center" scope="col">Community Member District</th>
              <th class="text-center" scope="col"> Reset Password </th>
             <!-- <th class="text-center" scope="col"> Edit </th> -->
             
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
       $sql=mysqli_query($conn,"SELECT * FROM communitymember WHERE communityMember_reset_password='1'");
          if($sql)
          {
              foreach($sql as $row)
              {
                $sub=$sub+1;  
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_anonymous_name']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_email']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_country']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_state']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_district']; ?> </td>
            <?php
            $status=$row['communityMember_email'];
            ?>
              <td> <button onclick="window.location='cmpassword.php?status=<?php echo $status; ?>'" type="button" class="rounded-pill btn btn-success" > Reset Password </button>  </td> 
            <!--  <td> <button onclick="window.location='editCommunityMember.php?status=<?php echo $row['communityMember_email']; ?>'" type="button" class="rounded-pill btn btn-primary" > Edit </button>  </td>   
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
          window.location.href= 'index.html';
          </script>
        <?php
}
?>