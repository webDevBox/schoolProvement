<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
    $principal_id=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM principal WHERE principal_id='$principal_id'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Principal Deleted');
        window.location.href= 'principal.php';
        </script>
        <?php 
    }
    else
    {
        ?>
                <script>
                window.alert('Principal Not Deleted');
                window.location.href= 'principal.php';
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