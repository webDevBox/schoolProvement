<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $status=$_GET['status'];
  
    $sql=mysqli_query($conn,"DELETE FROM appfeedback WHERE id='$status'");
    if($sql)
    {
        ?>
        <script>
            window.alert("Feedback Deleted Successfully");
       window.location.href= 'appfeedback.php';
        </script>
      <?php
    }
    else{
        ?>
        <script>
            window.alert("Feedback Not Deleted");
        window.location.href= 'appfeedback.php';
        </script>
      <?php
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