<?php
error_reporting(0);
include_once("dbconnect.php");
$lorryid = $_POST['lorryid'];
$sql     = "DELETE FROM LORRY WHERE lorryid = $lorryid";
    if ($conn->query($sql) === TRUE){
        echo "success";
    }else {
        echo "failed";
    }

$conn->close();
?>