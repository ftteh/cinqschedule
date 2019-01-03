<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        
        if ($row['day'] == "0") {
            $dn = "Sun";
        }
        else if ($row['day'] == "1") {
            $dn = "Mon";
        }
        else if ($row['day'] == "2") {
            $dn = "Tue";
        }
        else if ($row['day'] == "3") {
            $dn = "Wed";
        }
        else if ($row['day'] == "4") {
            $dn = "Thu";
        }


        $obj = '{"_id":"' . $row['t'] .
            '","title": "' . $row['subname'] .
            '","dn": "' . $dn.
            '","start": "' . $row['stime'] .
            '","end": "' . $row['etime'] .
            '", "dow": [' . $row['day'] .
            '],"day":' . $row['day'] .
            ',"subcode":"'.$row['subcode'].
            '","lectname":"'.$row['lectname'].
            '","venue":"'.$row['venue'].
            '"}';

        $obj = json_decode($obj);
        array_push($data, $obj);
    }
    $json = json_encode($data);
    echo $json;
} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();

?>



