<?php
session_start();
include "conn.php";
if(isset($_POST['signin']))
{
    
    $uname=$_POST['uname'];
    $pass=md5($_POST['pass']);
    if(strpos($uname,"OR 1=1") == true)
    {
        ?>
    <script>
    window.location.href= 'index.html';
    </script>
    <?php
    }
   
    $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM super WHERE username ='$uname'"));
    $block=$sql4['block'];
    $sum=$block+1;
    if($pass != $sql4['password'])
    {
        if($block < 3)
        {
            $update=mysqli_query($conn,"UPDATE super SET block='$sum' WHERE username='$uname'");
            ?>
            <script>
            window.alert('Wrong username or password');
            window.location.href= 'index.html';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            window.alert('Your account is blocked');
            window.location.href= 'index.html';
            </script>
            <?php
        }
    }



       $sub=mysqli_query($conn,"SELECT * FROM super WHERE username='$uname' && password='$pass'");
        $query1=mysqli_num_rows($sub);
    $id1=mysqli_fetch_assoc($sub);
    if($id1['password'] == 12345 && $block < 3)
    {
        ?>
    <script>
    window.location.href= 'superchangepassword.php?user=<?php echo $uname; ?>';
    </script>
    <?php
    }
    if($block < 3)
    {
    if($query1==1)
    {
        $update=mysqli_query($conn,"UPDATE super SET block=0 WHERE username='$uname'");
        $_SESSION['id']=$id1['id'];
        $_SESSION['username']=$uname;
        $sql2=mysqli_query($conn,"INSERT INTO logins(type)VALUES('super admin')");
         ?>
    <script>
    window.location.href= 'superdash.php';
    </script>
    <?php
    }
    else {
          ?>
          <script>
          window.alert('Wrong username or password');
          window.location.href= 'index.html';
          </script>
          <?php
}
    }
    else
    {
        ?>
        <script>
        window.alert('Your account is blocked contact to admin');
        window.location.href= 'index.html';
        </script>
        <?php
    }
  
}
?>