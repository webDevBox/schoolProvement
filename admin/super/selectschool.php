<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST["detail_id"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM follow WHERE communityMember_id = '".$_POST["detail_id"]."' && role='school'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <ul>';  
      while($row = mysqli_fetch_assoc($result))  
      {  
          $id=$row['toBeFollow'];
          $school=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM school WHERE school_id='$id'"));
          $schoolName=$school['school_name'];
           $output .= '  
                     <li>'.$schoolName.' </li>  
                ';  
      }  
      $output .= "</ul></div>";  
      echo $output;  
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