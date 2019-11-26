<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$radius = $_POST['radius'];

$sql = "SELECT * FROM LORRY WHERE LORRYWORKER IS NULL ORDER BY LORRYID DESC";

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
        $lorrylist[km] = distance($latitude,$longitude,$row["LATITUDE"],$row["LONGITUDE"]);
        $lorrylist[lorryrating] = $row["RATING"];
        //$lorrylist[radius] = $row["LATITUDE"];
        if (distance($latitude,$longitude,$row["LATITUDE"],$row["LONGITUDE"])<$radius){
            array_push($response["lorry"], $lorrylist);    
        }
    }
    echo json_encode($response);
}else{
    echo "nodata";
}

function distance($lat1, $lon1, $lat2, $lon2) {
   $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;

    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;

    //echo '<br/>'.$km;
    return $km;
}

?>