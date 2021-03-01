<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
    $principal_id=$_GET['id'];
    $sql=mysqli_query($conn,"UPDATE principal SET block='0' WHERE principal_id='$principal_id'");
    if($sql)
    {
        ?>
        <script>
        window.alert('Principal Unblock');
        window.location.href= 'blocklist.php';
        </script>
        <?php 
    }
    else
    {
        ?>
                <script>
                window.alert('Principal Not Unblock');
                window.location.href= 'blocklist.php';
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