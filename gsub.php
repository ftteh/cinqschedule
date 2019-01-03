<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$sql="SELECT subject.subcode, subject.subname, schedule.subcode, schedule.lect_id,schedule.lectname FROM subject INNER JOIN schedule ON subject.subcode=schedule.subcode";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        // $obj=json_decode($row['subcode']);
        // array_push($data,$obj);
            array_push($data, array('subcode' => $row['subcode'], 'subname' => $row['subname'],'lect_id' => $row['lect_id'], 'lectname' => $row['lectname'],)
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
