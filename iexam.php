<?php

require_once ("config.php");

header("Access-Control-Allow-Origin: *");

session_start();

$id = $_SESSION["userid"]; 
$subcode = $_POST["subcode"]; 
$venue = strtoupper($_POST["venue"]); 
$date = $_POST["date"]; 
$timestart =  $_POST["timestart"];
$timeend =  $_POST["timeend"];
$remark =  strtoupper($_POST["remark"]);

$sql1 = "SELECT DISTINCT * FROM `event`
        WHERE category = 'exam' AND sdate = '$date'
        AND (event.stime BETWEEN '$timestart' AND '$timeend' OR event.etime BETWEEN '$timestart' AND '$timeend')
        ";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    echo "<script>";
    echo " alert('Clashed with another subject examination. Please Choose Another Day or Time.');      
            location='l_addExam.php';</script>";
} 
else {
    $sql2 = "SELECT * FROM timetable where subcode LIKE '{$subcode}%'";
    $result2 = $conn->query($sql2);
    while ($record = mysqli_fetch_array($result2)){
        $data[] = $record['acid_id'];
    }

    $i = json_encode($data);

    $sql = "INSERT INTO event (category, acid_id, lect_id ,title, stime, etime, remark, venue, sdate,edate)
            VALUES ('exam',('$i'),'" . $id . "','" . $subcode . "','" . $timestart . "','" . $timeend . "','" . $remark . "','" . $venue . "','".$date."','".$date."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: l_viewExam.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
