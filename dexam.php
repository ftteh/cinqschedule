<?php

require_once ("config.php");

$obj=json_decode($_POST['obj']);
print_r($obj);

// sql to delete a record
$sql = "DELETE FROM `event` WHERE `event_id` = '{$obj->eventid}'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
