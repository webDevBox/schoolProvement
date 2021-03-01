<?php

//load.php

include("conn.php");
$data = array();

if(isset($_GET['status']))
{
    $distId=$_GET['status'];
}

$query = "SELECT * FROM gazettedholidays WHERE dist_id='$distId'";

$result = mysqli_query($conn,$query);

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["gazetted_name"],
  'start'   => $row["gazetted_date"],
  
 );
}

echo json_encode($data);
?>

 
