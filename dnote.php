<?php

require_once ("config.php");

$obj=json_decode($_POST['obj']);
print_r($obj);

// sql to delete a record
$sql = "DELETE FROM stickynote WHERE `noteID` = '{$obj->noteID}'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
