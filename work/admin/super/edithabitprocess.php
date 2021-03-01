<?php
session_start();
error_reporting(0);
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['update']))
    {
    $id=$_POST['check'];
    $name=$_POST['name'];
    $info=$_POST['info'];
    $checkbox1 = $_POST['audience'];
    $chk="";  
    if (is_array($checkbox1) || is_object($checkbox1))
    {
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1." ";  
       }  
      }
       if($checkbox1)
       {
    $sql=mysqli_query($conn,"UPDATE habit SET habit_name='$name', info='$info', audience='$chk' where id='$id'");
    if($sql)
    {
        ?>
        <script>
             window.alert('Habit Updated');
        window.location.href= 'addhabit.php';
        </script>
      <?php
    }
    else
    {
        ?>
        <script>
             window.alert('Habit Not Updated');
        window.location.href= 'edithabit.php?status=<?php echo $id; ?>';
        </script>
      <?php
    }
}
else{
    ?>
        <script>
             window.alert('Please select Audience');
        window.location.href= 'edithabit.php?status=<?php echo $id; ?>';
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