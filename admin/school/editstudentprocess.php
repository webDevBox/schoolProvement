<?php
session_start();
include "conn.php";
if(isset($_SESSION['id1']))
{
    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $status=$_POST['status'];

        $total=0;
        $str=substr($email,-4);
        if($email != $status)
        {
        $query=mysqli_query($conn,"SELECT * FROM student WHERE student_email='$email'");
        $total=mysqli_num_rows($query);
        }
        if($total==0)
        {
            if($str=='.com')
            {
                $sql=mysqli_query($conn,"UPDATE student SET student_anonymous_name='$name', student_email='$email' WHERE student_email='$status'");
                if($sql)
                {
                 ?>
                 <script>
                 window.alert('Student Updated');
                 window.location.href= 'student.php';
                 </script>
                 <?php
                }
                else{
                 ?>
                 <script>
                 window.alert('Student Not Updated');
                 window.location.href= 'editstudent.php?status=<?php echo $status; ?>';
                 </script>
                 <?php
                }
            }
            else{
                ?>
                <script>
                window.alert('Please Enter Valid Email');
                window.location.href= 'editstudent.php?status=<?php echo $status; ?>';
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
            window.alert('This Email Already exist');
            window.location.href= 'editstudent.php?status=<?php echo $status; ?>';
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