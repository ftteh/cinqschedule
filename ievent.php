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
$date=explode("T",$obj->start);
$stime=$date[1];
$date= $date[0];


$sql = "INSERT INTO event (event_id, category,acid_id,lect_id,title,stime,etime,remark,venue,status,sdate,edate)
        VALUES ('', 'event','".$_POST['userid']."','','" . $obj->title . "','" . $stime . "','','','','','".$date."','".$date."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
