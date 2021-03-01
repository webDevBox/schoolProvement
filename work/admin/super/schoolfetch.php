<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{

$query ="SELECT * FROM school where school_district LIKE '%". $_POST["school"]."%'";
$data = mysqli_query($conn,$query)




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<?php
while ($row = mysqli_fetch_assoc($data)) {
  # code...

 ?>
<option value="<?php echo $row['school_name']; ?>"> <?php echo $row['school_name']; ?> </option>
  
</body>
</html>




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