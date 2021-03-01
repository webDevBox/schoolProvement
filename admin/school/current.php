<?php
session_start();
include "conn.php";
if(isset($_SESSION['id1']))
{

    
       
    $sql4=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
    $query4=mysqli_fetch_assoc($sql4);
    $school_id=$query4['school_id'];

    $sql5=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
    $query5=mysqli_fetch_assoc($sql5);
    $school=$query5['school_name'];

    $total=0;
    $sql2=mysqli_query($conn,"SELECT * FROM feedback WHERE teacher_feedback_id='$teacher_id'");
    while($query2=mysqli_fetch_assoc($sql2))
    {
      $value=$query2['feedback_rating'];
      $total=$total+$value;
    }
    $counter=mysqli_num_rows($sql2);
    if($counter > 0)
    {
      $val=$total/$counter;
    $avr=round($val,2);
    }
    else{
      $avr="Not Rated";
    }
    ?>














    
}
else {
          ?>
          <script>
          window.location.href= '../index.html';
          </script>
        <?php
}
?>
    ?>