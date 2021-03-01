<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['submit']))
    {
  
    $name=$_POST['name'];
    $country=$_POST['country'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $pass=md5(12345);

    //Second Form
$session_start=$_POST['session1'];
$session_end=$_POST['session2'];
$summer_start=$_POST['summer1'];
$summer_end=$_POST['summer2'];
$winter_start=$_POST['winter1'];
$winter_end=$_POST['winter2'];

    $query=mysqli_query($conn,"SELECT * FROM district where dist_userName='$uname' || dist_name='$name'");
    $total=mysqli_num_rows($query);
    $str=substr($uname,0,9);
    $string=substr($email,-4);
    $sql1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM district where dist_email='$email'"));
    if($string == '.com')
    {
    if($sql1 == 0)
    {
    if($str=='district_')
    {
    if($total==0)
    {
    $sql=mysqli_query($conn,"INSERT INTO district(dist_name,country_name,dist_userName,dist_email,dist_password,dist_account,dist_reset_password,block) 
    VALUES('$name','$country','$uname','$email','$pass','approved',0,0)");
    if($sql)
    {

      $district=mysqli_query($conn,"SELECT * FROM district WHERE dist_name='$name'");
    $fetch_id=mysqli_fetch_assoc($district);
    $dist_id=$fetch_id['dist_id'];
    $sql2=mysqli_query($conn,"INSERT INTO schedule(dist_id,session_start,session_end,summer_start,summer_end,winter_start,winter_end) 
    VALUES('$dist_id','$session_start','$session_end','$summer_start','$summer_end','$winter_start','$winter_end')");
      if($sql2)
      {
        ?>
        <script>
        window.location.href= 'calander.php?status=<?php echo $dist_id;?>';
        </script>
      <?php
      }
      else
      {
          ?>
          <script>
          window.alert('District Not Added');
          window.location.href= 'adddist.php';
          </script>
        <?php
      }  
  }
 
}
else{
    ?>
    <script>
         window.alert('This District Already exist');
    window.location.href= 'adddist.php';
    </script>
  <?php
}
    }
    else{
        ?>
    <script>
         window.alert('District User Name should start from district_');
    window.location.href= 'adddist.php';
    </script>
  <?php
    }
  }
  else{
    ?>
<script>
     window.alert('This Email Already Exist');
window.location.href= 'adddist.php';
</script>
<?php
}
    }
    else{
      ?>
  <script>
       window.alert('Please Enter Valid Email');
  window.location.href= 'adddist.php';
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