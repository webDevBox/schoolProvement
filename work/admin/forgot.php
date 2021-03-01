<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "conn.php";
if(isset($_POST['forgot'])){

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$type=$_POST['type'];
$uname=$_POST['uname'];
$random=rand();
$pass=md5($random);
if($type=='super')
{
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM super WHERE username='$uname'"));
    $email=$sql['email'];
    $update=mysqli_query($conn,"UPDATE super SET password='$pass'");
}
if($type=='principal')
{
    $email=$_POST['uname'];
    $update=mysqli_query($conn,"UPDATE principal SET principal_password='$pass' WHERE principal_email='$email'");
   
}
if($type=='district')
{
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM district WHERE dist_userName='$uname'"));
    $email=$sql['dist_email'];
    $update=mysqli_query($conn,"UPDATE district SET dist_password='$pass' WHERE dist_userName='$uname'");
}

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'khubaibwaheed1995@gmail.com';                     // SMTP username
    $mail->Password   = 'Mergesort1994';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('khubaibwaheed1995@gmail.com', 'School Provement');
    $mail->addAddress($email);     // Add a recipient


    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forgot Password';
    $mail->Body    = "<p> Your New Password is: $random </p>" ;
  

    $mail->send();
    echo 'Message has been sent';
    ?>
    <script>
    window.alert('Password has been sent to your email');
    window.location.href= 'index.html';
    </script>
    <?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>