<?php
session_start();
error_reporting(0);
include "conn.php";
if(isset($_SESSION['id2']))
{
    $school=$_GET['status'];
    $run=mysqli_query($conn,"SELECT * FROM school WHERE school_name='$school'");
    $school_id1=mysqli_fetch_assoc($run);
    $school_id=$school_id1['school_id'];
    $school_dist=$school_id1['school_district'];
    $school_country=$school_id1['country_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
          <h5 class="modal-title" id="exampleModalLabel"> Add Teacher </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="teacherList.php" method="post" enctype="multipart/form-data" class="form">
       <div class="form-group">
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher First Name" required>
        <small id="emailHelp" class="form-text small required">Enter First Name</small>
      </div>
      <div class="form-group">
          <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Last Name" required>
          <small id="emailHelp" class="form-text small required">Enter Last Name</small>
       </div>
       <div class="form-group">
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Email" required>
        <small id="emailHelp" class="form-text small required">Enter Email</small>
     </div>
        
     <div class="form-group d-none">
      <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher District" value="<?php echo  $school_country; ?>" required>
            </div>
 <div class="form-group d-none">
 <input type="text" name="dist" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher District" value="<?php echo  $school_dist; ?>" required>
       </div>
      <div class="form-group d-none">   
      <input type="text" name="school" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher District" value="<?php echo  $school; ?>" required>  
          </div>
      
     <div class="form-group">
  <input name="image" type="file" title="Select School Image" class="form-control">
  <small id="emailHelp" class="form-text small">Select Teacher Image</small>
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
    Add Teacher
</button>
      </div>
      </div>
    </div>
    <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
          <thead>
              <tr> <th colspan="9" class="text-center" scope="col"><?php echo $school; ?> School Teachers List</th> </tr>
              <tr>
              <th class="text-center" scope="col">Serial</th>
              <th class="text-center" scope="col">Name</th>
              <th class="text-center" scope="col">Image</th>
              <th class="text-center" scope="col">Email</th>
              <th class="text-center" scope="col">Country</th>
              <th class="text-center" scope="col">District</th>
              <th class="text-center" scope="col">Detail</th>
              
             
              </tr>
          </thead>
<tbody>
               <?php
        $sub=0;
                
                $sql=mysqli_query($conn,"SELECT * FROM teacher WHERE school_id='$school_id'");
                if($sql)
                { 
                  foreach($sql as $row)
                  {
                    $sub=$sub+1;
          ?>
              <tr>
              <td class="text-center"> <?php echo $sub; ?> </td>
              <td class="text-center"> <?php echo $row['teacher_firstName']; echo " ";  echo $row['teacher_lastName']; ?> </td>
              <!--<td class="text-center"> <img class="img-fluid  mainorg rounded-pill" src="../school/teacher/<?php echo $row['teacher_image']; ?>" alt="Teacher Image not available" /> </td>-->
                    
              <?php
              $checkimg=$row['teacher_image'];
              if($checkimg)
              {
                ?>
              <td class="text-center"> <img class="img-fluid  mainorg rounded-pill" src="../school/teacher/<?php echo $row['teacher_image']; ?>" alt="Teacher Image not available" /> </td>
              <?php
              }
              else
              {
                ?>
                <td class="text-center"> <img class="img-fluid  mainorg rounded-pill" src="../images/teacher.png" alt="Teacher Image not" /> </td>
                <?php
              }
              ?>

              <td class="text-center"> <?php echo $row['teacher_email']; ?> </td>
              <td class="text-center"> <?php echo $row['country_name']; ?> </td>
              <td class="text-center"> <?php echo $row['teacher_district']; ?> </td>
            
              <?php $email=$row['teacher_email']; ?>
              <td class="text-center">  <a href="teacherDetail.php?status=<?php echo $email; ?>"><img src="https://img.icons8.com/color/20/000000/list.png"> <span class="mx-1 imgschool">Teachers Detail </span> </a> </td>
               </tr>
              <?php
                  }
              }
              else
              {
                  echo "No record Found";
              }
              ?>
              
          </tbody>
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
if(isset($_POST['submit']))
{
  $join=date("Y-m-d");
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pass=md5(12345);
        $dist=$_POST['dist'];
        $country=$_POST['country'];
        $school=$_POST['school'];
       $sql5=mysqli_query($conn,"SELECT * FROM school where school_name='$school'");
       $query=mysqli_fetch_assoc($sql5);
       $school_id=$query['school_id'];
       
        $string=substr($email,-4);
        if($string=='.com')
        {
        $sub1=mysqli_query($conn,"SELECT * FROM teacher where teacher_email='$email'");
            $row1=mysqli_num_rows($sub1);
            if($row1==1)
            {
                ?>
                <script>
                window.alert('A teacher with same email already exist');
                window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
                </script>
                <?php
            }
            else{
        $allow=array("png","jpg","jpeg");
        $fold=$_FILES['image']['name'];
        $temp=explode('.',$fold);
        $ext=end($temp);
        $img=$email.'.'.$ext;

        $tmp=$_FILES['image']['tmp_name'];
        $des="../school/teacher/".$img;
        $upload=move_uploaded_file($tmp,$des); 
        $size = getimagesize($des); 
        if($size[0] == 400 && $size[1] == 400 || !$fold)
        {


 if(in_array($ext,$allow) || !$fold)
    {
        if(!$fold)
        {
            $sql=mysqli_query($conn,"INSERT INTO teacher(school_id,teacher_firstName,teacher_lastName,teacher_absence,teacher_email,teacher_password,teacher_district,country_name,joining_date,teacher_account,teacher_reset_password)
        VALUES('$school_id','$fname','$lname',0,'$email','$pass','$dist','$country','$join','approved',0)");
        }
        else
        {
        $sql=mysqli_query($conn,"INSERT INTO teacher(school_id,teacher_firstName,teacher_lastName,teacher_absence,teacher_email,teacher_password,teacher_district,country_name,teacher_image,joining_date,teacher_account,teacher_reset_password)
        VALUES('$school_id','$fname','$lname',0,'$email','$pass','$dist','$country','$img','$join','approved',0)");
        }
        if($sql)
        {
            
            
                 ?>
    <script>
    window.alert('Record Saved');
    window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
    </script>
    <?php
        }
        else{
          unlink($des);
             ?>
    <script>
    window.alert('Record Not Saved');
    window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
    </script>
    <?php
      }
    }
    else{
      unlink($des);
        ?>
        <script>
        window.alert('Only png,jpg and jpeg allowed!');
        window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
        </script>
        <?php
    }
  }
  else{
      unlink($des);
      ?>
          <script>
          window.alert('Image Dimension should 400x400');
          window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
          </script>
          <?php
  }
}

   
}
    else{
        ?>
        <script>
        window.alert('Please Enter Valid Email');
        window.location.href= 'teacherList.php?status=<?php echo $school; ?>';
        </script>
        <?php
       
    }
}
?>