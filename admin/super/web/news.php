<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_GET['status']))
    {
        $id=$_GET['status'];
        $fetch=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news WHERE id='$id'"));
        $user=$fetch['image'];
        $sql=mysqli_query($conn,"DELETE FROM news WHERE id='$id'");
        if($sql)
        {
          $path="news/".$user;
        unlink($path);
            ?>
        <script>
            window.alert("Record Deleted");
           window.location.href= 'news.php';
            </script>
        <?php
        }
    }

    if(isset($_POST['submit']))
    {
        $title=$_POST['title'];
        $detail=$_POST['detail'];
        $allow=array("png","jpg","jpeg");
        $fold=$_FILES['image']['name'];
        $temp=explode('.',$fold);
        $ext=end($temp);
        $img=$title.'.'.$ext;

        $tmp=$_FILES['image']['tmp_name'];
        $des="news/".$img;
        $date=date("Y-m-d");
        $check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM news WHERE title='$title'"));
        if($check == 0)
        {
 if(in_array($ext,$allow))
 {
        $sql=mysqli_query($conn,"INSERT INTO news(title,detail,image,date) VALUES('$title','$detail','$img','$date')");
        if($sql)
        {
          $upload=move_uploaded_file($tmp,$des);  
            ?>
        <script>
            window.alert("News Added");
            window.location.href= 'news.php';
            </script>
        <?php
        }
        else{
          ?>
    <script>
        window.alert("News Not Added");
        window.location.href= 'news.php';
        </script>
    <?php
        }
    }
    else{
      ?>
    <script>
        window.alert("Only png,jpg & jpeg files allowed");
        //window.location.href= 'news.php';
        </script>
    <?php
    }
  }
  else{
    ?>
    <script>
        window.alert("This News Already Exist");
        window.location.href= 'news.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="../../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add News </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="post" class="form" enctype="multipart/form-data">
          
         
      <div class="form-group">
        <small id="emailHelp" class="form-text small required">Enter News Title</small>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" required>
       
      </div>


      <div class="form-group">
      <small id="emailHelp" class="form-text small required">Enter News Detail</small>
    <textarea class="form-control" name="detail" rows="3" placeholder="Detail" required></textarea>
  </div>
     
  <div class="form-group">
    <small id="emailHelp" class="form-text small required">Select News Image</small>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   
  </div>
     <center> <input type="submit" name="submit" value="submit" class="btn btn-primary"> </center>
     
    </form>
      </div>
    </div>
  </div>
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
  
    <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="w3-container">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
          <h1 class="text-center dash">Super Admin Dashboard</h1>
           </div>
           <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 mt-3">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add News
          </button>
          </div>
          </div>
        </div>
        <div class="table-responsive-xs table-responsive-sm table-responsive-md">
        <table id="tableid" class="table table-dark table-striped table-bordered table-hover table-responsive-xs table-responsive-sm">
                <thead>
                    <tr> <th colspan="7" class="text-center" scope="col">News List</th> </tr>
                    <tr>
                    <th class="text-center" scope="col">Serial</th>
                    <th class="text-center" scope="col">Title</th>
                    <th class="text-center" scope="col">Detail</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col"> Delete </th>
                    </tr>
                </thead>

               

                <tbody>
                     <?php
              $sub=0;

                $query = "SELECT * from news";
                $query_run = mysqli_query($conn,$query);
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                        $status=$row['id'];
                      $sub=$sub+1;                   
                ?>
                    <tr>
                    <td class="text-center"> <?php echo $sub; ?> </td>
                    <td class="text-center"> <?php echo $row['title']; ?> </td>
                    
                    
                    <td class="text-center">
                      <input type="button" name="view" value="News Detail" id="<?php echo $status; ?>" class="rounded-pill btn btn-success btn-xs view_data" />
                    </td>  

                    <td class="text-center"> <img class="img-fluid  mainorg rounded-pill" src="news/<?php echo $row['image']; ?>" alt="Blog Image not available" /> </td>

                    <td class="text-center"> <button onclick="{  var x = confirm('Are you sure you want to delete?'); if (x){window.location='news.php?status=<?php echo $status; ?>';} }" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
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
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        function signup() {
          document.getElementById("signup").style.display = "block";
        }
        
        function closeForm1() {
          document.getElementById("myForm").style.display = "none";
        }
        function closeForm2() {
          document.getElementById("signup").style.display = "none";
        }
        </script>
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
                <h4 class="modal-title">News Details</h4>   
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
                url:"select.php",  
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
          window.location.href= '../index.html';
          </script>
        <?php
}
?>