<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_GET['email'];
$sql = "UPDATE USER SET PASSWORD = '123456' WHERE EMAIL = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Your account password has been reset.
    Your account password : 123456";
} else {
    echo "error";
}
$conn->close();
?>