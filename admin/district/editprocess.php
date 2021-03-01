<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
    if(isset($_POST['update']))
    {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $dist=$_POST['dist'];

    $sql=mysqli_query($conn,"UPDATE school SET school_name='$name', school_country='$country', school_state='$state', school_district='$dist' where school_id='$id'");
    if($sql)
    {
        ?>
        <script>
             window.alert('Record Updated');
        window.location.href= 'distdash.php';
        </script>
      <?php
    }
    else
    {
        ?>
        <script>
             window.alert('Record Not Updated');
        window.location.href= 'editschool.php';
        </script>
      <?php
    }
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