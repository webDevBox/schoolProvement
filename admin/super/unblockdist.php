<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $id=$_GET['status'];
    $sql=mysqli_query($conn,"UPDATE district SET block='0' WHERE dist_id='$id'");
    if($sql)
    {
        ?>
        <script>
        window.alert('District Admin unblocked');
        window.location.href= 'distblockList.php';
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        window.alert('District Admin Not Unblocked');
        window.location.href= 'distblockList.php';
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