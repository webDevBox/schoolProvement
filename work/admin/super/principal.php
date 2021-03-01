<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=md5(12345);
        $country=$_POST['country'];
        $dist=$_POST['dist'];
        $school=$_POST['school'];
        $date=date("Y-m-d");

        $string=substr($email,-4);

        $sql1=mysqli_query($conn,"SELECT * FROM school WHERE school_name='$school'");
        $fetch1=mysqli_fetch_assoc($sql1);
        $school_id=$fetch1['school_id'];

        $sql2=mysqli_query($conn,"SELECT * FROM principal WHERE principal_email='$email'");
        $query2=mysqli_num_rows($sql2);

        $sql4=mysqli_query($conn,"SELECT * FROM principal WHERE school_id='$school_id'");
        $query4=mysqli_num_rows($sql4);

        if($query4 == 0)
        {
        if($string == '.com')
        {
        
        if($query2 == 0)
        {
            
            $insert=mysqli_query($conn,"INSERT INTO principal(principal_name,principal_email,principal_password,country_name,principal_district,school_id,principal_joiningDate,principal_account,principal_reset_password,block)
            values('$name','$email','$pass','$country','$dist','$school_id','$date','approved',0,0)");
            if($insert)
            {
                ?>
                <script>
                window.alert('Principal Added');
                window.location.href= 'principalList.php';
                </script>
                <?php 
            }
            else
            {
                ?>
            <script>
            window.alert('Principal Not Added! \n Select all required Fields ');
            window.location.href= 'principalList.php';
            </script>
            <?php 

            }
      
        }
        else{
            ?>
    <script>
    window.alert('This Email Already Exist');
    window.location.href= 'principalList.php';
    </script>
    <?php 
        }

   

}
else{
    ?>
<script>
window.alert('Please Enter Valid Email');
window.location.href= 'principalList.php';
</script>
<?php 
}

}
else{
    ?>
<script>
window.alert('<?php echo $school; ?> School Already have Principal');
window.location.href= 'principalList.php';
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