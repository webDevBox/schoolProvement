<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $action=$_GET['action'];
    $email=$_GET['status']; 
    $sql=mysqli_query($conn,"UPDATE teacher SET teacher_account='$action' WHERE teacher_email='$email'");
    if($sql)
    {
        if($action == 'approved')
        {
        ?>
        <script>
        window.alert('Teacher Approved');
        window.location.href= 'pendingteachers.php';
        </script>
        <?php 
        }
        else if($action == 'disapproved')
        {
            ?>
        <script>
        window.alert('Teacher Disapproved');
        window.location.href= 'pendingteachers.php';
        </script>
        <?php 
        }
    }
    else
    {
        ?>
                <script>
              window.alert('Teacher Not Approved');
        window.location.href= 'pendingteachers.php';
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