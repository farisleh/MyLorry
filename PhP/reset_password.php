<?php
//error_reporting(0);
include_once ("dbconnect.php");
$email = $_POST['email'];
$sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    sendEmail($email);
    echo "Password reset verification link has been sent to your email account";
} else {
    echo "failed";
}
function sendEmail($useremail) {
    $to      = $useremail; 
    $subject = 'Reset Password Verification for MyLorry'; 
    $message = 'http://blazzerjet.com/mylorry/php/verifypassword.php?email='.$useremail; 
    $headers = 'From: noreply@mylorry.com.my' . "\r\n" . 
    'Reply-To: '.$useremail . "\r\n" . 
    'X-Mailer: PHP/' . phpversion(); 
    mail($to, $subject, $message, $headers); 
}
?>