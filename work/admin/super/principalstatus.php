<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $action=$_GET['action'];
   $id=$_GET['status']; 
    $sql=mysqli_query($conn,"UPDATE principal SET principal_account='$action' WHERE principal_id='$id'");
    if($sql)
    {
        if($action == 'approved')
        {
        ?>
        <script>
        window.alert('Principal Approved');
        window.location.href= 'pendingprincipals.php';
        </script>
        <?php 
        }
        else if($action == 'disapproved')
        {
            ?>
        <script>
        window.alert('Principal Disapproved');
        window.location.href= 'pendingprincipals.php';
        </script>
        <?php 
        }
    }
    else
    {
        ?>
                <script>
              window.alert('Principal Not Approved');
        window.location.href= 'pendingprincipals.php';
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