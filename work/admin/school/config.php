<?php
$p=$_SESSION['id1'];
$sql=mysqli_query($conn,"SELECT * FROM principal WHERE principal_id = '$p'");
$row=mysqli_fetch_assoc($sql);
$a=$row['language'];

if (!isset($_SESSION['lang']))
if(empty($a)){$_SESSION['lang'] = "en";}
else{    $_SESSION['lang'] = $a;
}

else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == "en") {
        $_SESSION['lang'] = "en";
            $language=$_SESSION['lang'];

    } else if($_GET['lang'] == "hi") {
        $_SESSION['lang'] = "hi";
            $language=$_SESSION['lang'];

    }
    else if($_GET['lang'] == "fr"){
        $_SESSION['lang'] = "fr";
            $language=$_SESSION['lang'];

    }
    else{
        $_SESSION['lang'] = "sp";
            $language=$_SESSION['lang'];

    }
    
$p=$_SESSION['id1'];
$sql=mysqli_query($conn,"UPDATE principal SET language = '$language' WHERE principal_id = '$p'");

    
    
}
require_once 'languages/'.$_SESSION['lang'].".php";
?>