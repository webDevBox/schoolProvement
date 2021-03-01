<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $name=$_GET['status'];
   $sql=mysqli_query($conn,"DELETE FROM district WHERE dist_name='$name'");
   if($sql)
   {
     $sql1=mysqli_query($conn,"DELETE FROM school WHERE school_district='$name'");
     if($sql1)
     {
      $sql2=mysqli_query($conn,"DELETE FROM teacher WHERE teacher_district='$name'");
      if($sql2)
      {
        ?>
        <script>
        window.alert('<?php echo $name; ?> District Deleted');
        window.location.href= 'adddist.php';
        </script>
        <?php
      } 
     }
   }
   else{
    ?>
    <script>
    window.alert("<?php echo $name; ?> District Not Deleted");
    window.location.href= 'adddist.php';
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