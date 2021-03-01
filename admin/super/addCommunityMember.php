<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['submit']))
    {
        $fname=$_POST['fname'];
        
        $email=$_POST['email'];
       
        $pass=md5($_POST['pass']);
        $dist=$_POST['dist'];
        $str=substr($user,0,16);
        $string=substr($email,-4);
        if($string=='.com')
        {
  if($str=='communityMember_')
  {
    $sub=mysqli_query($conn,"SELECT * FROM communitymember where communityMember_userName='$user'");
    $row=mysqli_num_rows($sub);
    if($row==1)
    {
       ?>
    <script>
    window.alert('A Community Member with same user name already exist');
    window.location.href= 'communityMember.php';
    </script>
    <?php 
    }
    else{
        $sub1=mysqli_query($conn,"SELECT * FROM communitymember where communityMember_email='$email' || communityMember_anonymous_name='$fname'");
            $row1=mysqli_num_rows($sub1);
            if($row1>0)
            {
                ?>
                <script>
                window.alert('A Community Member with same email or Name already exist');
                window.location.href= 'communityMember.php';
                </script>
                <?php
            }
            else{
     
            $sql=mysqli_query($conn,"INSERT INTO communitymember(communityMember_anonymous_name,communityMember_email,communityMember_userName,communityMember_password,communityMember_district)
        VALUES('$fname','$email','$user','$pass','$dist')");
        }

    
        if($sql)
        {
             
            
                 ?>
    <script>
    window.alert('Record Saved');
    window.location.href= 'communityMember.php';
    </script>
    <?php
        }
        else{
             ?>
    <script>
    window.alert('Record Not Saved');
    window.location.href= 'communityMember.php';
    </script>
    <?php
      }
    }
  }
else{
        ?>
  <script>
  window.alert('This Name Already Exist');
  window.location.href= 'communityMember.php';
  </script>
  <?php
    }
        ?>

        <?php
    }
    else{
        ?>
        <script>
        window.alert('Please Enter Valid Email');
        window.location.href= 'communityMember.php';
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