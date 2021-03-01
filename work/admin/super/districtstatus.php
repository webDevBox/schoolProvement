<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $action=$_GET['action'];
   $name=$_GET['status']; 
    $sql=mysqli_query($conn,"UPDATE district SET dist_account='$action' WHERE dist_name='$name'");
    if($sql)
    {
        if($action == 'approved')
        {
        ?>
        <script>
        window.alert('District Approved');
        window.location.href= 'pendingdistricts.php';
        </script>
        <?php 
        }
        else if($action == 'disapproved')
        {
            ?>
        <script>
        window.alert('District Disapproved');
        window.location.href= 'pendingdistricts.php';
        </script>
        <?php 
        }
    }
    else
    {
        ?>
                <script>
              window.alert('District Not Approved');
        window.location.href= 'pendingdistricts.php';
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