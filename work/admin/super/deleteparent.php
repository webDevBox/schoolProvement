<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $id=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM parent WHERE parent_id='$id'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Parent Deleted');
        window.location.href= 'parent.php';
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        window.alert('Parent Not Deleted');
        window.location.href= 'parent.php';
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