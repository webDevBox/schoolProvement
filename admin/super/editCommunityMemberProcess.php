<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
  if(isset($_POST['update']))
  {
      $fname=$_POST['fname'];
      $status=$_POST['status'];
      $email=$_POST['email'];
      $dist=$_POST['dist'];

      $str=substr($email,-4);
      if($str=='.com')
      {
      $sql=mysqli_query($conn,"UPDATE communitymember SET communityMember_anonymous_name='$fname', communityMember_email='$email', communityMember_district='$dist' where communityMember_email='$status'");
      if($sql)
      {
        ?>
        <script>
        window.alert('Community Member Updated');
        window.location.href= 'communityMember.php';
        </script>
        <?php 
      }
      else{
        ?>
        <script>
        window.alert('Community Member Not Updated');
        window.location.href= 'editCommunityMember.php?status=<?php echo $status; ?>';
        </script>
        <?php 
      }
  }
 else{
        ?>
        <script>
        window.alert('Please enter valid email');
        window.location.href= 'editCommunityMember.php?status=<?php echo $status; ?>';
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