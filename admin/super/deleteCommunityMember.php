<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $email=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM communitymember WHERE communityMember_email='$email'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Community Member Deleted');
        window.location.href= 'communityMember.php';
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        window.alert('Community Member Not Deleted');
        window.location.href= 'communityMember.php';
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