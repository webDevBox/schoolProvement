<?php
session_start();
include "conn.php";
if(isset($_SESSION['id1']))
{
    $email=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM teacher WHERE teacher_email='$email'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Teacher Deleted');
        window.location.href= 'teacher.php';
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        window.alert('Teacher Not Deleted');
        window.location.href= 'teacher.php';
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