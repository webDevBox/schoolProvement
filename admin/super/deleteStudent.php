<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $email=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM student WHERE student_email='$email'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Student Deleted');
        window.location.href= 'addstudent.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
        window.alert('Student Not Deleted');
        window.location.href= 'addstudent.php';
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