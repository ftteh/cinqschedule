<?php

require_once ("config.php");

header("Access-Control-Allow-Origin: *");

$text = $_POST["title"]; 
$userid = $_POST['userid'];

$sql = "INSERT INTO stickynote (text, acid_id)
VALUES ('$text','$userid')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
