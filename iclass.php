<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Access-Control-Allow-Origin: *");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$obj = json_decode($_POST['obj'], false);
$sql = "INSERT INTO timetable (id,subcode,title,stime,etime,day,acid_id,t)
        VALUES ('', '".$obj->subcode."','" . $obj->title . "','" . $obj->start . "','" . $obj->end . "','" . $obj->dow[0] . "','".$_POST['userid']."','sec')";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
