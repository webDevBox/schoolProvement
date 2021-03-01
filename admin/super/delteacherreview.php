<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $status=$_GET['status'];
    $email=$_GET['email'];
    $sql=mysqli_query($conn,"DELETE FROM feedback WHERE feedback_id='$status'");
    if($sql)
    {
        ?>
        <script>
            window.alert("Review Deleted Successfully");
       window.location.href= 'teacherDetail.php?status=<?php echo $email; ?>';
        </script>
      <?php
    }
    else{
        ?>
        <script>
            window.alert("Review Not Deleted");
        window.location.href= 'teacherDetail.php?status=<?php echo $email; ?>';
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