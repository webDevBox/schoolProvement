<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if($_POST['dist'])
    {
        $output='';
        $district=$_POST['dist'];
        $sql=mysqli_query($conn,"SELECT * FROM school WHERE school_district='$district'");
        $output.=' <option value="all" selected>All School</option>';
        while($row=mysqli_fetch_assoc($sql))
        {
            $output.='<option value="'.$row['school_name'].'">'.$row['school_name'].'</option>';
        }
        if($output == '<option disabled selected> Select School </option>')
        {
            $output.='<option disabled selected> No school exist in '.$district.' district </option>';
        }
        echo $output;
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