<?php
require_once ("config.php");

$eventid = $_POST["eventid"]; 
$date = $_POST["date"]; 
$timestart =  $_POST["timestart"];
$timeend =  $_POST["timeend"];
$venue = strtoupper($_POST["venue"]); 
$remark =  strtoupper($_POST["remark"]);


$sql = "UPDATE `event` SET `sdate`='".$date."', `stime`='".$timestart."',`etime`='".$timeend."',`venue`='".$venue."',`remark`='".$remark."' WHERE `event_id` = '".$eventid."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
