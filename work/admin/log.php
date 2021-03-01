<?php
session_start();
include "conn.php";
if(isset($_POST['signin']))
{
    $type=$_POST['type'];
    $uname=$_POST['uname'];
    $pass=md5($_POST['pass']);
    $checker=md5(12345);
    if(strpos($uname,"OR 1=1") == true)
    {
        ?>
    <script>
    window.location.href= 'index.html';
    </script>
    <?php
    }
    if($type=='super')
    {
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
            window.alert('Your account is blocked contact to admin');
            window.location.href= 'index.html';
            </script>
            <?php
        }
    }



       $sub=mysqli_query($conn,"SELECT * FROM super WHERE username='$uname' && password='$pass'");
        $query1=mysqli_num_rows($sub);
    $id1=mysqli_fetch_assoc($sub);
    if($id1['password'] == $checker && $block < 3)
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
    window.location.href= 'super/superdash.php';
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
    // Principal Log in
    else  if($type=='principal'){
    $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM principal WHERE principal_email ='$uname'"));
    $block=$sql4['block'];
    $sum=$block+1;
    if($pass != $sql4['principal_password'])
    {
        if($block < 8)
        {
            $update=mysqli_query($conn,"UPDATE principal SET block='$sum' WHERE principal_email='$uname'");
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
            window.alert('Your account is blocked contact to admin');
            window.location.href= 'index.html';
            </script>
            <?php
        }
    }
    $sql=mysqli_query($conn,"SELECT * FROM principal WHERE principal_email='$uname' && principal_password='$pass'");
    $query=mysqli_num_rows($sql);
    $id=mysqli_fetch_assoc($sql);
    if($id['principal_password'] == $checker && $block < 8)
    {
        ?>
    <script>
    window.location.href= 'princhangepassword.php?user=<?php echo $uname; ?>';
    </script>
    <?php
    }
    if($block < 8)
    {
    if($query==1)
    {
        $update=mysqli_query($conn,"UPDATE principal SET block=0 WHERE principal_email='$uname'");
        $_SESSION['id1']=$id['principal_id'];
        $_SESSION['username']=$uname;
        $sql2=mysqli_query($conn,"INSERT INTO logins(type)VALUES('principal')");
         ?>
    <script>
    window.location.href= 'school/principaldash.php';
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
    else{
        ?>
        <script>
        window.alert('Your account is blocked contact to admin');
        window.location.href= 'index.html';
        </script>
        <?php
    }
}
// District Log in
else  if($type=='district'){
    $sql4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM district WHERE dist_userName ='$uname'"));
    $block=$sql4['block'];
    $sum=$block+1;
    if($pass != $sql4['dist_password'])
    {
        if($block < 5)
        {
            $update=mysqli_query($conn,"UPDATE district SET block='$sum' WHERE dist_userName='$uname'");
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
            window.alert('Your account is blocked contact to admin');
            window.location.href= 'index.html';
            </script>
            <?php
        }
    }
    $sql3=mysqli_query($conn,"SELECT * FROM district where dist_userName='$uname' && dist_password='$pass'");
    $query3=mysqli_num_rows($sql3);
    $id3=mysqli_fetch_assoc($sql3);
    if($id3['dist_password'] == $checker && $block < 5)
    {
        ?>
    <script>
    window.location.href= 'distchangepassword.php?user=<?php echo $uname; ?>';
    </script>
    <?php
    }
    if($block < 5)
    {
    if($query3==1)
    {
        $update=mysqli_query($conn,"UPDATE district SET block=0 WHERE dist_userName='$uname'");
        $_SESSION['id2']=$id3['dist_id'];
        $_SESSION['username']=$uname;
        $sql2=mysqli_query($conn,"INSERT INTO logins(type)VALUES('district admin')");
         ?>
    <script>
    window.location.href= 'district/distdash.php';
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
else{
    ?>
          <script>
          window.alert('Select User Type');
          window.location.href= 'index.html';
          </script>
          <?php
}
}
?>