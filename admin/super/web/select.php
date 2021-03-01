<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST["detail_id"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM news WHERE id = '".$_POST["detail_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               
               
                    
                     <td width="70%">'.$row["detail"].' </td>  
              
                ';  
      }  
      $output .= "</table></div>";  
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