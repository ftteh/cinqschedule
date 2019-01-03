<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$sql = "SELECT * FROM `schedule` join user where schedule.lect_id=user.acid_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        // $obj=json_decode($row['subcode']);
        // array_push($data,$obj);
            array_push($data, array('subcode' => $row['subcode'], 'lecName' => $row['name'], 'lect_id' => $row['lect_id'])
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
