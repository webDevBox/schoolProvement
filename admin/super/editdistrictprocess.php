<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
  if(isset($_POST['update']))
  {
    $name=$_POST['name'];
    $username=$_POST['uname'];
    $checkuser=$_POST['checkuser'];
    $check=$_POST['check'];
    

    $sql3=mysqli_query($conn,"SELECT * FROM district WHERE dist_name='$name'");
    $total=mysqli_num_rows($sql3);
    $sql4=mysqli_query($conn,"SELECT * FROM district WHERE dist_userName='$username'");
    $total1=mysqli_num_rows($sql4);
    if($name == $check)
    {
      $total=0;
    }
    if($username == $checkuser)
    {
      $total1=0;
    }

    if($total1 == 0)
    {
    if($total==0)
    {
    $sql=mysqli_query($conn,"UPDATE district SET dist_name='$name', dist_userName='$username' WHERE dist_name='$check'");
   if($sql)
   {
     $sql1=mysqli_query($conn,"UPDATE school SET school_district='$name' WHERE school_district='$check'");
     if($sql1)
     {
      $sql2=mysqli_query($conn,"UPDATE teacher SET teacher_district='$name' WHERE teacher_district='$check'");
      if($sql2)
      {
        ?>
        <script>
        window.alert('<?php echo $check; ?> District Updated');
        window.location.href= 'adddist.php';
        </script>
        <?php
      } 
     }
   }
   else{
    ?>
    <script>
    window.alert("<?php echo $check; ?> District Not Updated");
    window.location.href= 'editdist.php?status=<?php echo $check; ?>';
    </script>
    <?php 
   }
  }
  else{
    ?>
    <script>
    window.alert("<?php echo $check; ?> District Name Already Exist");
    window.location.href= 'editdist.php?status=<?php echo $check; ?>';
    </script>
    <?php 
  }
}
else{
  ?>
  <script>
  window.alert("<?php echo $username; ?> District User Name Already Exist");
  window.location.href= 'editdist.php?status=<?php echo $check; ?>';
  </script>
  <?php 
}

  }

  if(isset($_POST['upday']))
  {
    $check=$_POST['check'];
    $password4=md5($_POST['pass']);
    $sql=mysqli_query($conn,"UPDATE district SET dist_password='$password4' WHERE dist_name='$check'");
    if($sql)
    {
      ?>
      <script>
      window.alert('<?php echo $check; ?> District Password Updated');
      window.location.href= 'adddist.php';
      </script>
      <?php
    }
    else{
      ?>
      <script>
      window.alert('<?php echo $check; ?> District Password Not Updated');
      window.location.href= 'editdist.php?status=<?php echo $check; ?>';
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