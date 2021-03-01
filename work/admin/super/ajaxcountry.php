<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if($_POST['country'])
    {
        $output='';
        $country=$_POST['country'];
        $sql=mysqli_query($conn,"SELECT * FROM district WHERE country_name='$country'");
        $output.='<option disabled selected> Select District </option>';
        while($row=mysqli_fetch_assoc($sql))
        {
            $output.='<option value="'.$row['dist_name'].'">'.$row['dist_name'].'</option>';
        }
        if($output == '<option disabled selected> Select District </option>')
        {
            $output.='<option disabled selected> No District exist in '.$country.' district </option>';
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