<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$sql = "SELECT * FROM stickynote where acid_id = '".$_GET['userid']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
            array_push($data, array('text' => $row['text'], 'noteID' => $row['noteID'],)
        );
    }
    $json = json_encode($data);
    echo $json;
} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();
?>
