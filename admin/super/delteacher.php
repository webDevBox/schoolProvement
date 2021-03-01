<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $email=$_GET['status'];
    $user=$_GET['unlink'];
    $sql=mysqli_query($conn,"DELETE FROM teacher WHERE teacher_email='$email'");
    if($sql)
    {
        if($user)
        {
        $path="../school/teacher/".$user;
        unlink($path);
        }
        ?>
        <script>
        window.alert('Teacher Deleted');
        window.location.href= 'addteacher.php';
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        window.alert('Teacher Not Deleted');
        window.location.href= 'addteacher.php';
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