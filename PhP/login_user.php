<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM USER WHERE EMAIL = '$email' AND PASSWORD = '$password' AND VERIFY ='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "success";
}else{
    echo "Failed or check your verification link on your email account";
}