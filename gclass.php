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

$sql = "SELECT *
FROM timetable
INNER JOIN schedule ON timetable.subcode=schedule.subcode where acid_id='" . $_GET['userid'] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {

        $obj = '{"_id":"' . $row['t'] .
            '","title": "' . $row['title'] .' '.$row['venue'].
            '","subcode": "' . $row['subcode'] .
            '","start": "' . $row['stime'] .
            '","end": "' . $row['etime'] .
            '", "dow": [' . $row['day'] .
            ']}';

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
