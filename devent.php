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
print_r($obj);

$sql = "DELETE FROM event WHERE `title` like '%{$obj->title}%'  and `acid_id`='".$_POST['userid']."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
