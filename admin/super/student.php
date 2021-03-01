<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=md5($_POST['pass']);
        $country=$_POST['country'];
        $state=$_POST['state'];
        $dist=$_POST['dist'];
        $school=$_POST['school'];
        $user=$_POST['user'];


        $string=substr($user,0,8);
        $sql2=mysqli_query($conn,"SELECT school_id FROM school WHERE school_name='$school'");
        $id=mysqli_fetch_assoc($sql2);
        $school_id=$id['school_id'];
        if($string=='student_')
        {
        $str=substr($email,-4);
        if($str=='.com')
        {
            $query=mysqli_query($conn,"SELECT * FROM student WHERE student_email='$email' || school_userName='$user'");
            $total=mysqli_num_rows($query);
            if($total==0)
            {
                $sql=mysqli_query($conn,"INSERT INTO student(student_anonymous_name,student_email,school_userName,student_password,student_country,school_id,student_state,student_district)
                VALUES('$name','$email','$user','$pass','$country','$school_id','$state','$dist')");

                if($sql)
                {
                    ?>
                    <script>
                    window.alert('Student Added');
                    window.location.href= 'addstudent.php';
                    </script>
                    <?php 
                }
                else
                {
                    ?>
                <script>
                window.alert('Student Not Added');
                window.location.href= 'addstudent.php';
                </script>
                <?php
                }
            }
            else{
                ?>
                <script>
                window.alert('This Email or User name Already exist');
                window.location.href= 'addstudent.php';
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
            window.alert('Please Enter Valid Email');
            window.location.href= 'addstudent.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
        window.alert('User Name should start from student_');
        window.location.href= 'addstudent.php';
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