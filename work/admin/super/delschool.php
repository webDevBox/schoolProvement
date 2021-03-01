<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $id=$_GET['status'];
    $file=$_GET['unlink'];
   $sql1=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
   $row=mysqli_fetch_assoc($sql1);
   $name=$row['school_name'];
   $sql4=mysqli_query($conn,"DELETE FROM student WHERE school_id='$id'");
  if($sql4)
  {
   $sql3=mysqli_query($conn,"DELETE FROM principal WHERE school_id='$id'");
   if($sql3)
   {
    $sql2=mysqli_query($conn,"DELETE FROM teacher WHERE school_id='$id'");
   if($sql2)
   {
   $sql=mysqli_query($conn,"DELETE FROM school WHERE school_id='$id'");
   if($sql)
   {
    if($file)
    {
    $path="../school/image/".$file;
    unlink($path);
    }
    ?>
    <script>
    window.alert('<?php echo $name; ?> Deleted');
    window.location.href= 'addschool.php';
    </script>
    <?php 
   }
   else{
    ?>
    <script>
    window.alert("<?php echo $name; ?> Not Deleted");
    window.location.href= 'addschool.php';
    </script>
    <?php 
   }
  }
}
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