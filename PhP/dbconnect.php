<?php
$servername = "localhost";
$username 	= "blazzerj_faris";
$password 	= "8AUN06uQD@]T";
$dbname 	= "blazzerj_mylorry";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>