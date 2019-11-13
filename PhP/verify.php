<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_GET['email'];
$sql = "UPDATE USER SET VERIFY = '1' WHERE EMAIL = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Your account has been registered";
} else {
    echo "error";
}
$conn->close();
?>