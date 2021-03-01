<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
  if(isset($_POST['update']))
  {
    $id=$_POST['checkuser'];
    $name=$_POST['name'];
    $email=$_POST['email'];
   
    $checkmail=$_POST['checkmail'];
   
    $string=substr($email,-4);

    $sql2=mysqli_query($conn,"SELECT * FROM principal WHERE principal_email='$email'");
    $query2=mysqli_num_rows($sql2);
    if($email == $checkmail)
    {
      $query2 = 0;
    }
    if($string == '.com')
    {
    if($query2 == 0)
    {
   
 $sql=mysqli_query($conn,"UPDATE principal SET principal_name='$name', principal_email='$email' WHERE principal_id='$id'");
    if($sql)
    {
      ?>
    <script>
    window.alert('Principal Updated');
    window.location.href= 'principalList.php';
    </script>
    <?php 
    }
    else
    {
      ?>
      <script>
      window.alert('Principal Not Updated');
      window.location.href= 'editprincipal.php?status=<?php echo $id; ?>';
      </script>
      <?php 
    }
  

  }
  else
    {
      ?>
      <script>
      window.alert('This Email Already Exist');
      window.location.href= 'editprincipal.php?status=<?php echo $id; ?>';
      </script>
      <?php 
    }

  }
  else
    {
      ?>
      <script>
      window.alert('Please Enter Valid Email');
      window.location.href= 'editprincipal.php?status=<?php echo $id; ?>';
      </script>
      <?php 
    }
}

if(isset($_POST['pass']))
  {
    $id=$_POST['checkuser'];
    $pass=md5($_POST['pass']);
    $sql=mysqli_query($conn,"UPDATE principal SET principal_password='$pass' WHERE principal_id='$id'");
    if($sql)
    {
      ?>
    <script>
    window.alert('Principal Password Updated');
    window.location.href= 'principalList.php';
    </script>
    <?php 
    }
    else
    {
      ?>
      <script>
      window.alert('Principal Password Not Updated');
      window.location.href= 'editprincipal.php?status=<?php echo $id; ?>';
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