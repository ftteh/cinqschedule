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

$sql = "SELECT * FROM event where acid_id='" . $_GET['userid'] . "' and not category='exam' union select * from event where category='Holiday'";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        if ($row['category'] == "Holiday") {

            $obj = '{"_id":"' . $row['category'] .
                '","title": "' . $row['title'] .
                '","allDay": "' . "true" .
                '","start": "' . $row['sdate'] .
                '","end": "' . $row['edate'] .
                '"}';
        }
        else if ($row['status'] == "Approve" && $row['category'] == 'S') {
            $obj = '{"_id":"' . $row['category'] .
                '","title": "App. ' . $row['title'] .
                '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                '"}';
        }else if($row['status'] == "Pending" && $row['category'] == 'S'){
            continue;
        } 
        else{
            $obj = '{"_id":"' . $row['category'] .
                '","title": "' . $row['title'] .
                '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                '"}';
        }
        $obj = json_decode($obj);
        array_push($data, $obj);
    }

}

if ($_GET['role'] == "Student") {

    $sql = "SELECT * FROM event where category='exam' and acid_id like '%" . $_GET['userid'] . "%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $obj = '{"_id":"' . $row['category'] .
                '","title": "' . 'exam ' . $row['title'] .
                '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                '"}';

            $obj = json_decode($obj);
            array_push($data, $obj);
        }

    }
} else if ($_GET['role'] == "Lecturer") {

    // $sql = "SELECT * FROM event where lect_id='" . $_GET['userid'] . "'  union select * from event where lect_id='" . $_GET['userid'] . "' and category='exam'";
    $sql="SELECT * FROM event left JOIN user ON event.acid_id=user.acid_id
    where lect_id='" . $_GET['userid'] . "' or (category='exam' and lect_id='" . $_GET['userid'] . "') ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {

    
            if ($row['category'] == 'exam') {
                $obj = '{"_id":"' . $row['category'] .
                    '","title": "exam ' . $row['title'] .
                    '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                    '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                    '"}';
            } else if ($row['status'] == "Approve" && $row['category'] == 'S') {
                $obj = '{"_id":"' . $row['category'] .
                    '","title": "App. ('.$row['name'] .') '. $row['title'] .
                    '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                    '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                    '"}';
            }else if($row['status'] == "Pending" && $row['category'] == 'S'){
                continue;
            }
            else{
                $obj = '{"_id":"' . $row['category'] .
                    '","title": "' . $row['title'] .
                    '","start": "' . $row['sdate'] . "T" . $row['stime'] .
                    '","end": "' . $row['sdate'] . "T" . $row['etime'] .
                    '"}';  
            }
           
            $obj = json_decode($obj);
            array_push($data, $obj);
        }

    }
}

if (sizeof($data) > 0) {
    $json = json_encode($data);
    echo $json;
} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();
