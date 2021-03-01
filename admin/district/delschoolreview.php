<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
    $status=$_GET['status'];
    $school=$_GET['name'];
    $sql=mysqli_query($conn,"DELETE FROM schoolfeedback WHERE school_feedback_id='$status'");
    if($sql)
    {
        ?>
        <script>
            window.alert("Review Deleted Successfully");
       window.location.href= 'schoolDetail.php?status=<?php echo $school; ?>';
        </script>
      <?php
    }
    else{
        ?>
        <script>
            window.alert("Review Not Deleted");
        window.location.href= 'schoolDetail.php?status=<?php echo $school; ?>';
        </script>
      <?php
    }
}
else {
          ?>
          <script>
          window.location.href= '../index.html';
          </script>
        <?php
}
?>