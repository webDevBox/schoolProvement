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
        <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover">
            <thead>
              <tr> <th colspan="6" class="text-center" scope="col">Community Member List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Username</th>
              <th class="text-center" scope="col">Email</th>
              <th class="text-center" scope="col">Country</th>
              <th class="text-center" scope="col">District</th>
              <th class="text-center" scope="col">Schools</th>
              <th class="text-center" scope="col">Completed Habit</th>
              <th class="text-center" scope="col"> Delete </th>
             <!-- <th class="text-center" scope="col"> Edit </th> -->
             
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
       $sql=mysqli_query($conn,"SELECT * FROM communitymember");
          if($sql)
          {
              foreach($sql as $row)
              {
                $sub=$sub+1; 
                $status=$row['communityMember_id']; 
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_anonymous_name']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_email']; ?> </td>
              <td class="text-center"> <?php echo $row['country_name']; ?> </td>
              <td class="text-center"> <?php echo $row['communityMember_district']; ?> </td>
              <td class="text-center"> 
<input type="button" name="view" value="Followed Schools" id="<?php echo $status; ?>" class="rounded-pill btn btn-success btn-xs view_data" />    
            </td>
            <?php
            $status=$row['communityMember_email'];
            $community="community";
            $completed="completed";
            $id=$row['communityMember_id'];
          $com_habit=mysqli_query($conn,"SELECT * FROM habitstatus WHERE user_role='$community' && status='$completed' && user_id='$id'");
          $habit=mysqli_num_rows($com_habit);
            ?>
             <td class="text-center"> <?php echo $habit; ?> </td>
              <td class="text-center"> <button onclick="{
                var x = confirm('Are you sure you want to delete?');
                if (x)
                   window.location='deleteCommunityMember.php?status=<?php echo $status; ?>';
              }" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                <h4 class="modal-title">Followed Schools</h4>   
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    
                </div>  
                <div class="modal-body" id="detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var detail_id = $(this).attr("id");  
           $.ajax({  
                url:"selectschool.php",  
                method:"post",  
                data:{detail_id:detail_id},  
                success:function(data){  
                     $('#detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>


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