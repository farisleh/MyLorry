<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM LORRY WHERE LORRYOWNER = '$email'  ORDER BY LORRYID DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["lorry"] = array();
    while ($row = $result ->fetch_assoc()){
        $lorrylist = array();
        $lorrylist[lorryid] = $row["LORRYID"];
        $lorrylist[lorrybrand] = $row["LORRYBRAND"];
        $lorrylist[lorryowner] = $row["LORRYOWNER"];
        $lorrylist[lorryprice] = $row["LORRYPRICE"];
        $lorrylist[lorrydesc] = $row["LORRYDESC"];
        $lorrylist[lorrytime] = date_format(date_create($row["LORRYTIME"]), 'd/m/Y h:i:s');
        $lorrylist[lorryimage] = $row["LORRYIMAGE"];
        $lorrylist[lorrylatitude] = $row["LATITUDE"];
        $lorrylist[lorrylongitude] = $row["LONGITUDE"];
        $lorrylist[lorryrating] = $row["RATING"];
        array_push($response["lorry"], $lorrylist);    
    }
    echo json_encode($response);
}else{
    echo "nodata";
}


?>