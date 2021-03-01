<?php
session_start();
include "conn.php";
if(isset($_SESSION['id1']))
{
    $work=$_GET['action'];
    $date=$_GET['status'];
    $teacher_id=$_GET['teacher'];
    if($work == 1)
    {
        $sql1=mysqli_query($conn,"UPDATE reportabsence SET attendance_status='present', resolve='yes' WHERE teacher_id='$teacher_id' && reportAbsence_date='$date'");
        $query2=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id' && resolve!='yes'");
        $query1=mysqli_num_rows($query2);
        if($query1 > 0)
        {
            ?>
            <script>
            window.location.href='resolve.php?status=<?php echo $teacher_id; ?>';
            </script>
            <?php
        }
        else{
            $query5=mysqli_query($conn,"UPDATE teacher SET teacher_dispute=0 WHERE teacher_id='$teacher_id'");
            ?>
            <script>
            window.location.href='conflict.php';
            </script>
            <?php
        }
    }

    if($work == 0)
    {
        $sql1=mysqli_query($conn,"UPDATE reportabsence SET attendance_status='absent', resolve='yes' WHERE teacher_id='$teacher_id' && reportAbsence_date='$date'");
        $query2=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id' && resolve!='yes'");
        $query1=mysqli_num_rows($query2);
        if($query1 > 0)
        {
            ?>
            <script>
            window.location.href='resolve.php?status=<?php echo $teacher_id; ?>';
            </script>
            <?php
        }
        else{
            $query5=mysqli_query($conn,"UPDATE teacher SET teacher_dispute=0 WHERE teacher_id='$teacher_id'");
            ?>
            <script>
            window.location.href='conflict.php';
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