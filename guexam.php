<?php

require_once ("config.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$sql = "SELECT event.*, schedule.subname FROM `event` join `schedule` on `subcode` LIKE CONCAT(`title`, '%') WHERE event_id = '".$_GET['event_id']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $data = array('event_id' => $row['event_id'],
                      'subcode' => $row['title'], 
                      'subname' => $row['subname'], 
                      'date' => $row['sdate'],
                      'stime' => $row['stime'],
                      'etime' => $row['etime'], 
                      'venue' => $row['venue'], 
                      'remark' => $row['remark']);
        
    }
    $json = json_encode($data);
    echo $json;
} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();
?>
