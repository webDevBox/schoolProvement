<?php
session_start();
error_reporting("0");
include "conn.php";
if(isset($_SESSION['id']))
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



//School Report

    if(isset($_POST['school']))
    {
      if(isset($_POST['id']))
      {
        $fdate=$_POST['fdate'];
      $ldate=$_POST['ldate'];
      $school_id=$_POST['id'];
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE school_id='$school_id'");

        $total=0;
        $sql2=mysqli_query($conn,"SELECT * FROM schoolfeedback WHERE school_id=' $school_id'");
        while($query2=mysqli_fetch_assoc($sql2))
        {
          $value=$query2['schoolFeedback_rating'];
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


        if(mysqli_num_rows($sql) > 0)
        {
          $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
              $schoolAbs=0;
              $absentees=mysqli_query($conn,"SELECT * FROM teacher WHERE school_id='$school_id'");
              while($pro=mysqli_fetch_assoc($absentees))
              {
                $current=$pro['teacher_absence'];
                $schoolAbs=$schoolAbs+$current;
              }
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="4"> '. $schoolName .' School  </th>
           <th colspan="2"> School Rating = '. $avr .' </th>
           <th colspan="2"> Total Absentees = '. $schoolAbs .' </th>
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
        $sql5=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
        $fetchingSchool=mysqli_fetch_assoc($sql5);
      


        $total=0;
        $sql2=mysqli_query($conn,"SELECT * FROM schoolfeedback WHERE school_id=' $school_id'");
        while($query2=mysqli_fetch_assoc($sql2))
        {
          $value=$query2['schoolFeedback_rating'];
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

        if(mysqli_num_rows($sql) > 0)
        {

          
          $school=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$school_id'");
              $fetching=mysqli_fetch_assoc($school);
              $schoolName=$fetching['school_name'];
              $schoolAbs=0;
            $absentees=mysqli_query($conn,"SELECT * FROM teacher WHERE school_id='$school_id'");
            while($pro=mysqli_fetch_assoc($absentees))
            {
              $current=$pro['teacher_absence'];
              $schoolAbs=$schoolAbs+$current;
            }
           
            $output .= '
            <table class="table" border="1">
            <tr>
            <th colspan="4"> '. $schoolName .' School </th>
            <th colspan="2"> School Rating = '. $avr .' </th>
            <th colspan="2"> Total Absentees = '. $schoolAbs .' </th>
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

       $checker='absent';
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id' & attendance_status='$checker'");
        $absence=mysqli_num_rows($sql);
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


        if($absence > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="4"> Report of '. $teacherName .' </th>
           <th colspan="2"> Total Absentees = '. $absence .' </th>
           <th colspan="2"> Teacher Rating = '. $avr .' </th>  
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
       $checker='absent';
        $sql=mysqli_query($conn,"SELECT * FROM reportabsence WHERE teacher_id='$teacher_id' & attendance_status='$checker'");
        $absence=mysqli_num_rows($sql);
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


        if($absence > 0)
        {
            $output .= '
            <table class="table" border="1">
            <tr>
           <th colspan="4"> Report of '. $teacherName .' </th>
           <th colspan="2"> Total Absentees = '. $absence .' </th>
           <th colspan="2"> Teacher Rating = '. $avr .' </th> 
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
              if($row['reportAbsence_date'] >= $result2['session_start'] || $row['reportAbsence_date'] <= $result2['session_end'] )
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


}
else {
          ?>
          <script>
          window.location.href= 'index.html';
          </script>
        <?php
}
?>