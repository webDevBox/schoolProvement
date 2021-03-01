<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['update']))
    {
    $id=$_POST['id'];
    $name=$_POST['name'];
   

    $sql=mysqli_query($conn,"UPDATE school SET school_name='$name' where school_id='$id'");
    if($sql)
    {
        ?>
        <script>
             window.alert('Record Updated');
        window.location.href= 'addschool.php';
        </script>
      <?php
    }
    else
    {
        ?>
        <script>
             window.alert('Record Not Updated');
        window.location.href= 'editschool.php?status=<?php echo $id;?>';
        </script>
      <?php
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