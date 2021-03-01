<?php
session_start();
include "conn.php";
if(isset($_SESSION['id2']))
{
  $output="";
  $status="NO";
  if(isset($_GET['status']))
  {
    $status=$_GET['status'];
  }



    if($status=='dist')
    {
       $sql=mysqli_query($conn,"SELECT * FROM district ORDER BY dist_id ASC");
       if(mysqli_num_rows($sql) > 0)
       {
           $output.='
           <table class="table" border="1">
           <tr>
           <th colspan="4"> Districts </th>
           </tr>
           <tr>
           <th> Id </th>
           <th> Name </th>
           <th> Country </th>
           <th> State </th>
           </tr>
           ';
           while($row=mysqli_fetch_assoc($sql))
           {
                $output .='
                <tr>
                <td>'. $row["dist_id"] .'</td>
                <td>'. $row["dist_name"] .'</td>
                <td>'. $row["dist_country"] .'</td>
                <td>'. $row["dist_state"] .'</td>
                </tr>
                ';
           }
           $output.='</table>';
           header("Content-Type: application/xls");
           header("Content-Disposition: attachment; filename=districts.xls");
           echo $output;
       }
       else{
        ?>
        <script>
             window.alert('No District Exist');
        window.location.href= 'superdash.php';
        </script>
      <?php
    }
    }



//School Part

    if(isset($_POST['school']))
    {
      if(isset($_POST['id']))
      {
        $fdate=$_POST['fdate'];
      $ldate=$_POST['ldate'];
      $school_id=$_POST['id'];
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE school_id='$school_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="7"> Schools </th>
           </tr>
           <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
           
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            while($row=mysqli_fetch_assoc($sql))
            {
              if($row["reportAbsence_date"] >= $fdate && $row["reportAbsence_date"] <= $ldate)
                {
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
              
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
            }
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Schools.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'schoolreport.php';
            </script>
          <?php
        }
      }
    }




//All Record of School

    if(isset($_POST['fullschool']))
    {
      $school_id=$_POST['school'];
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE school_id='$school_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="7"> Schools </th>
           </tr>
           <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
          
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            while($row=mysqli_fetch_assoc($sql))
            {
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
  
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Schools.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'schoolreport.php';
            </script>
          <?php
        }
    }


    if(isset($_POST['currentschool']))
    {
      $school_id=$_POST['school'];
      
      $sqll=mysqli_query($conn,"SELECT * FROM principal WHERE school_id = '$school_id'");
      $result=mysqli_fetch_assoc($sqll);
      $dist_name= $result['principal_district'];
      $sqlll=mysqli_query($conn,"SELECT * FROM district WHERE dist_name = '$dist_name'");
      $result3=mysqli_fetch_assoc($sqlll); 
      $dist_id1 = $result3['dist_id'];
      $sqlll1=mysqli_query($conn,"SELECT * FROM schedule WHERE dist_id = '$dist_id1'");
      $result2=mysqli_fetch_assoc($sqlll1); 
      $start = $result2['session_start'];
 

      $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE school_id='$school_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="7"> Schools </th>
           </tr>
           <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
          
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            while($row=mysqli_fetch_assoc($sql))
            {
              if( $row['reportAbsence_date'] >= $result2['session_start'] )
              {
                $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
  
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';




              }
              
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Schools.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'schoolreport.php';
            </script>
          <?php
        }
    }
















//Teacher Report

    if(isset($_POST['submit']))
    {

  
      $fdate=$_POST['fdate'];
      $ldate=$_POST['ldate'];
      $email=$_POST['teacher'];
        $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
        $fetch=mysqli_fetch_assoc($sql1);
        $teacher_id=$fetch['teacher_id'];
        $teacherf=$fetch['teacher_firstName'];
        $teacherl=$fetch['teacher_lastName'];
        $teacherName=$teacherf." ".$teacherl;
        $absence=$fetch['teacher_absence'];
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
       
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
            <th colspan="4"> Report of '. $teacherName .' </th>
            <th colspan="2"> Rating = '. $avr .' </th>
           <th colspan="2"> Total Absentees = '. $absence .' </th>
          
           </tr>
            <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
            <th> Teacher School </th>
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            
            while($row=mysqli_fetch_assoc($sql))
            {
              if($row["reportAbsence_date"] >= $fdate && $row["reportAbsence_date"] <= $ldate)
            {
              $id=$row["school_id"];
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
                 <td>'. $schoolName .'</td>
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
            }
          }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Teachers.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'teacherreport.php';
            </script>
          <?php
        }
    }


    //All Record of Teacher
    if(isset($_POST['full']))
    {
        $email=$_POST['teacher'];
        $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
        $fetch=mysqli_fetch_assoc($sql1);
        $teacher_id=$fetch['teacher_id'];
        $teacherf=$fetch['teacher_firstName'];
        $teacherl=$fetch['teacher_lastName'];
        $teacherName=$teacherf." ".$teacherl;
        $absence=$fetch['teacher_absence'];
       
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
       
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
            <th colspan="4"> Report of '. $teacherName .' </th>
            <th colspan="2"> Rating = '. $avr .' </th>
            <th colspan="2"> Total Absentees = '. $absence .' </th>
          
           </tr>
            <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
            <th> Teacher School </th>
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            
            while($row=mysqli_fetch_assoc($sql))
            {
              
              $id=$row["school_id"];
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
                 <td>'. $schoolName .'</td>
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
            
          }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Teachers.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'teacherreport.php';
            </script>
          <?php
        }
    }

    if(isset($_POST['currentteachers']))
    {
        $email=$_POST['teacher'];
        $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
        $fetch=mysqli_fetch_assoc($sql1);
        $teacher_id=$fetch['teacher_id'];
        $teacherf=$fetch['teacher_firstName'];
        $teacherl=$fetch['teacher_lastName'];
        $teacherName=$teacherf." ".$teacherl;
        $absence=$fetch['teacher_absence'];
       $sid=$fetch['teacher_district'];
      
        $sqlll=mysqli_query($conn,"SELECT * FROM district WHERE dist_name = '$sid'");
        $result3=mysqli_fetch_assoc($sqlll); 
        $dist_id1 = $result3['dist_id'];
        $sqlll1=mysqli_query($conn,"SELECT * FROM schedule WHERE dist_id = '$dist_id1'");
        $result2=mysqli_fetch_assoc($sqlll1); 
        $start = $result2['session_start'];

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
       
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
            <th colspan="4"> Report of '. $teacherName .' </th>
            <th colspan="2"> Rating = '. $avr .' </th>
            <th colspan="2"> Total Absentees = '. $absence .' </th>
          
           </tr>
            <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
            <th> Teacher School </th>
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            
            while($row=mysqli_fetch_assoc($sql))
            {
              if( $row['reportAbsence_date'] >= $result2['session_start'] )
              {
              $id=$row["school_id"];
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
                 <td>'. $schoolName .'</td>
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
              }
          }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Teachers.xls");
            echo $output;
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'teacherreport.php';
            </script>
          <?php
        }
    }



    if(isset($_POST['current']))
    {
        $email=$_POST['teacher'];
        $sql1=mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_email='$email'");
        $fetch=mysqli_fetch_assoc($sql1);
        $teacher_id=$fetch['teacher_id'];
        $teacherf=$fetch['teacher_firstName'];
        $teacherl=$fetch['teacher_lastName'];
        $teacherName=$teacherf." ".$teacherl;
        $absence=$fetch['teacher_absence'];

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


        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id'");
        if(mysqli_num_rows($sql) > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="4"> Report of '. $teacherName .' </th>
           <th colspan="2"> Rating = '. $avr .' </th>
           <th colspan="2"> Total Absentees = '. $absence .' </th>
          
           </tr>
            <tr>
            <th> ReportAbsence Date </th>
            <th> ReportAbsence Shift </th>
            <th> Attendance Status </th>
            <th> Teacher Reason </th>
            <th> Teacher Claim </th>
            <th> Teacher School </th>
            <th> Positive Count </th>
            <th> Negative Count </th>
          
            </tr>
            ';
            
            while($row=mysqli_fetch_assoc($sql))
            {
              
              $id=$row["school_id"];
              $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
                 $output .='
                 <tr>
                 <td>'. $row["reportAbsence_date"] .'</td>
                 <td>'. $row["reportAbsence_shift"] .'</td>
                 <td>'. $row["attendance_status"] .'</td>
                 <td>'. $row["teacher_reason"] .'</td>
                 <td>'. $row["teacher_claim"] .'</td>
                 <td>'. $schoolName .'</td>
                 <td>'. $row["positiveCount"] .'</td>
                 <td>'. $row["negativeCount"] .'</td>
                 </tr>
                 ';
            
          }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Teachers.xls");
            echo $output;
            
        }
        else{
            ?>
            <script>
                 window.alert('No Record Exist');
            window.location.href= 'teacherreport.php';
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