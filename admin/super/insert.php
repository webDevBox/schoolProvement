<?php

//insert.php


include("conn.php");
if(isset($_POST["title"]))
{
    $title=$_POST['title'];
    $startdate=$_POST['start'];
    $day= date('D', $startdate );
    $dist_id=$_POST['dist_id'];
 //$query = ;
  $q=mysqli_query($conn,"
  INSERT INTO gazettedholidays 
  (gazetted_name, gazetted_date, gazetted_day,dist_id) 
  VALUES ('$title', '$startdate', '$day','$dist_id')");



}


?>