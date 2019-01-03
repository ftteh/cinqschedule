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


$obj=json_decode($_POST['obj']);
$stime=explode("T",$obj->start)[1];
$etime=explode("T",$obj->end)[1];

$stime=explode(":",$stime);
$etime=explode(":",$etime);



$stime=$stime[0].":".$stime[1];
$etime=$etime[0].":".$etime[1];
echo $stime.$etime;



// sql to delete a record
$sql = "DELETE FROM timetable WHERE `title` like '%".substr($obj->title,0,-5)."%'  and `stime`='".$stime."' and `etime`='".$etime."' and `acid_id`='".$_POST['userid']."'";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
