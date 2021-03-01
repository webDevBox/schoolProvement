<?php
session_start();
error_reporting(0);
include "conn.php";

if(isset($_SESSION['id']))
{
  
if(isset($_GET['status']))
{
  $id=$_GET['status'];
  $sql=mysqli_query($conn,"DELETE FROM habit WHERE id='$id'");
  if($sql)
  {
    ?>
    <script>
    window.alert("Habit Deleted");
    window.location.href= 'addhabit.php';
    </script>
  <?php
  }
  else{
    ?>
    <script>
    window.alert("Habit Not Deleted");
    window.location.href= 'addhabit.php';
    </script>
  <?php
  }
}

if(isset($_POST['submit']))
{  
    $date=date("m-d-Y");
    $name=$_POST['name'];
    $info=$_POST['info'];
   $checkbox1 = $_POST['audience'];
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1."  ";  
       } 
       if($checkbox1[0])
       {
        $checkbox1[0]='true';
       }
       if($checkbox1[1])
       {
        $checkbox1[1]='true';
       }
       if($checkbox1[2])
       {
        $checkbox1[2]='true';
       }
       if($checkbox1[3])
       {
        $checkbox1[3]='true';
       }
       if($checkbox1[4])
       {
        $checkbox1[4]='true';
       }
       if($checkbox1[5])
       {
        $checkbox1[5]='true';
       }
       if($checkbox1)
       { 
         $query=mysqli_query($conn,"INSERT INTO habit(name,info,date,Student,Parent,Teacher,Principal,CommunityMember,DistrictAdmin)
         VALUES('$name','$info','$date','$checkbox1[0]','$checkbox1[1]','$checkbox1[2]','$checkbox1[3]','$checkbox1[4]','$checkbox1[5]')");
         if($query)
         {
             ?>
          <script>
          window.alert("Habit Saved");
          window.location.href= 'addhabit.php';
          </script>
        <?php
         }
         else{
              ?>
          <script>
          window.alert("Habit Not Saved");
          window.location.href= 'addhabit.php';
          </script>
        <?php
         }

        }
        else{
            ?>
                <script>
                     window.alert('Please select Audience');
                window.location.href= 'addhabit.php';
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