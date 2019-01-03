<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();
if ($_SESSION["Login"] == NULL) {
	header("Location: login.html"); //change this
}
else{
   $lect_id = $_SESSION["userid"];
     
   
}



$x =0;


$query2=$conn->query("UPDATE event SET status = 'Expired' WHERE status ='Pending' and event.lect_id='$lect_id'and sdate<CURRENT_DATE OR (sdate=CURRENT_DATE and stime<CURRENT_TIME)" );



$query1=$conn->query("select name,event.acid_id,stime,etime,remark,status,sdate,event_id from event Left Join user On event.acid_id = user.acid_id where event.lect_id= '".$lect_id."' and category='S' order by status  ");

if ($query1->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($query1)) {

        $x++;
       if ($row["status"]=="Approve"||$row["status"]=="Reject" || $row["status"]=="Expired"){     


        $obj = '{"no":"' . $x .
            '","name": "' . $row['name'] .             
            '","acid_id": "' . $row['acid_id'] .
            '","stime": "' . $row['stime'] .
            '","etime": "' . $row['etime'] .
            '","remark": "' . $row['remark'] .
            '","status": "' . $row['status'] .
            '","event_id": "' . $row['event_id'] .
            '","sdate": "' . $row['sdate'] .
            '"}';
        }
        
        else
        {
        $obj = '{"no":"' . $x .
            '","name": "' . $row['name'] .
            '","acid_id": "' . $row['acid_id'] .
            '","stime": "' . $row['stime'] .
            '","etime": "' . $row['etime'] .
            '","remark": "' . $row['remark'] .
            '","event_id": "' . $row['event_id'] .
            '","sdate": "' . $row['sdate'] .
            '"}';  

        }


        $obj = json_decode($obj);
        array_push($data, $obj);
    }
    $json = json_encode($data);
    echo $json;
} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();

?>

