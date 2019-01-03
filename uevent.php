<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Access-Control-Allow-Origin: *");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$obj = json_decode($_POST['obj'], false);


if($obj->old!=""){
    $sql = "UPDATE `event` SET `title`='".$obj->title."' WHERE `title` = '".$obj->old."' and `acid_id`='".$_POST['userid']."'";
    echo $sql;
}
else{
    $date=explode("T",$obj->start);
    $stime=$date[1];
    $date= $date[0];
    
    $date1=explode("T",$obj->end);
    $etime=$date1[1];
    $sql = "UPDATE `event` SET `stime` = '".$stime."',`etime`='".$etime."',`sdate`='".$date."',`edate`='".$date."' WHERE `title` = '".$obj->title."' and `acid_id`='".$_POST['userid']."'";
    echo $sql;
}
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
