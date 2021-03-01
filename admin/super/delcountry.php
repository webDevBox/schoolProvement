<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    $name=$_GET['status'];
   $sql=mysqli_query($conn,"DELETE FROM country WHERE country_name='$name'");
   if($sql)
   {
        ?>
        <script>
        window.alert('<?php echo $name; ?> Country Deleted');
        window.location.href= 'country.php';
        </script>
        <?php
      
   }
   else{
    ?>
    <script>
    window.alert("<?php echo $name; ?> Country Not Deleted");
    window.location.href= 'country.php';
    </script>
    <?php 
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