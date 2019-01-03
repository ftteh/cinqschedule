<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        // $obj=json_decode($row['subcode']);
        // array_push($data,$obj);
            array_push($data, array('acid_id' => $row['acid_id'], 'lectname' => $row['name'], )
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
