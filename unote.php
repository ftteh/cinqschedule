<?php
require_once ("config.php");

$text = $_POST["title"]; 
$userid = $_POST['userid'];
$noteID = $_POST['noteID'];

$sql = "UPDATE `stickynote` SET `text`='".$text."' WHERE `acid_id` = '".$userid."' AND `noteID` = '".$noteID."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
