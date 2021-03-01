<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
  if(isset($_POST['update']))
  {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
     
     
      $id=$_POST['status'];
      $sql=mysqli_query($conn,"UPDATE teacher SET teacher_firstName='$fname', teacher_lastName='$lname', teacher_email='$email' where teacher_id='$id'");
      if($sql)
      {
        ?>
        <script>
        window.alert('Teacher Updated');
        window.location.href= 'addteacher.php';
        </script>
        <?php 
      }
      else{
        ?>
        <script>
        window.alert('Teacher Not Updated');
        //window.location.href= 'editteacher.php?status=<?php echo $id; ?>';
        </script>
        <?php 
      }
  }
  else if(isset($_POST['pass']))
  {
    $pass=md5($_POST['teachpass']);
    $id=$_POST['status'];
      $sql=mysqli_query($conn,"UPDATE teacher SET teacher_password='$pass' WHERE teacher_id='$id'");
      if($sql)
      {
        ?>
        <script>
        window.alert('Teacher Updated');
        window.location.href= 'addteacher.php';
        </script>
        <?php 
      }
      else{
        ?>
        <script>
        window.alert('Teacher Not Updated');
        window.location.href= 'editteacher.php?status=<?php echo $id; ?>';
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