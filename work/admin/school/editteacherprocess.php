<?php
session_start();
include "conn.php";
if(isset($_SESSION['id1']))
{
  if(isset($_POST['update']))
  {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $checker=$_POST['checker'];

      $string=substr($email,-4);
    
    $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
    $query1=mysqli_num_rows($sql1);
    if($email==$checker)
    {
      $query1=0;
    }


    if($query1 == 0)
    {
      
      if($string=='.com')
      {
      $sql=mysqli_query($conn,"UPDATE teacher SET teacher_firstName='$fname', teacher_lastName='$lname', teacher_email='$email' where teacher_email='$checker'");
      if($sql)
      {
        ?>
        <script>
        window.alert('Teacher Updated');
        window.location.href= 'teacher.php';
        </script>
        <?php 
      }
      else{
        ?>
        <script>
        window.alert('Teacher Not Updated');
        window.location.href= 'editteacher.php?status=<?php echo $checker; ?>';
        </script>
        <?php 
      }
    }
    else
    {
      ?>
      <script>
      window.alert('Please Enter Valid Email');
      window.location.href= 'editteacher.php?status=<?php echo $checker; ?>';
      </script>
      <?php 
    }
 

}
else
{
  ?>
  <script>
  window.alert('This Email Already Exist');
  window.location.href= 'editteacher.php?status=<?php echo $checker; ?>';
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