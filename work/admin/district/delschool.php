<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
    $id=$_GET['status'];
   $sql1=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
   $row=mysqli_fetch_assoc($sql1);
   $name=$row['school_name'];
  
   $sql3=mysqli_query($conn,"DELETE FROM principal WHERE school_id='$id'");
   if($sql3)
   {
    $sql2=mysqli_query($conn,"DELETE FROM teacher WHERE school_id='$id'");
   if($sql2)
   {
   $sql=mysqli_query($conn,"DELETE FROM school WHERE school_id='$id'");
   if($sql)
   {
    ?>
    <script>
    window.alert('<?php echo $name; ?> Deleted');
    window.location.href= 'schoollist.php';
    </script>
    <?php 
   }
   else{
    ?>
    <script>
    window.alert("<?php echo $name; ?> Not Deleted");
    window.location.href= 'schoollist.php';
    </script>
    <?php 
   }
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