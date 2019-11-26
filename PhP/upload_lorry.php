<?php
error_reporting(0);
include_once ("dbconnect.php");
$email = $_POST['email'];
$lorrybrand = $_POST['lorrybrand'];
$lorrydesc = $_POST['lorrydesc'];
$lorryprice = $_POST['lorryprice'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$encoded_string = $_POST["encoded_string"];
$credit = $_POST['credit'];
$rating = $_POST['rating'];
$decoded_string = base64_decode($encoded_string);
$mydate =  date('dmYhis');
$imagename = $mydate.'-'.$email;

$sqlinsert = "INSERT INTO LORRY(LORRYBRAND,LORRYOWNER,LORRYDESC,LORRYPRICE,LORRYIMAGE,LATITUDE,LONGITUDE,RATING) VALUES ('$lorrybrand','$email','$lorrydesc','$lorryprice','$imagename','$latitude','$longitude','$rating')";

if ($credit>0){
    if ($conn->query($sqlinsert) === TRUE) {
        $path = '../images/'.$imagename.'.jpg';
        file_put_contents($path, $decoded_string);
        $newcredit = $credit - 1;
        $sqlcredit = "UPDATE USER SET CREDIT = '$newcredit' WHERE EMAIL = '$email'";
        $conn->query($sqlcredit);
        echo "success";
    } else {
        echo "failed";
    }
}else{
    echo "low credit";
}

?>