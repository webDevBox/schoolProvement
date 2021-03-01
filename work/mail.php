

<?php 
include "conn.php";


$name =$_POST['fname'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$contact =$_POST['contact'];
$iam =$_POST['iam'];
$message =$_POST['message'];

$to = "nickcanfieldbiz@gmail.com";
$subject="Mail Form SchoolProvement Frontend Website Contact From";
$body="Hi i am ".$name.". I am ".$iam.". My concern is ".$contact.". My Contact No is ".$phone." My Message is ".$message;
$headers = "From: $email \r\n";





$result=mail($to,$subject,$body,$headers);

if($result==1)
{?>
<script>
    
     window.location.href= 'index.php';
</script>


<?php
}else{
    ?>
    <script>
    
     window.location.href= 'index.php';
</script>


 <?php   
}
?>

<!--<script>-->
<!--    window.location('index.php');-->
<!--</script>-->






