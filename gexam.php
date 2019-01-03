<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

session_start();
$sql = "SELECT DISTINCT event.*, schedule.subname FROM `event` JOIN `schedule` ON `subcode` LIKE CONCAT(`title`, '%') 
        WHERE schedule.lect_id = '".$_SESSION['userid']."' AND sdate >= CURDATE() AND category = 'exam' ";

$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
            array_push($data, array('event_id' => $row['event_id'],
                                    'title' => $row['title'],
                                    'subname' => $row['subname'], 
                                    'date' => $row['sdate'],
                                    'stime' => $row['stime'],
                                    'etime' => $row['etime'],
                                    'venue' => $row['venue'],
                                    'remark' => $row['remark'],)
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
