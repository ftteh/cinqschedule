<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

session_start();
if ($_SESSION["Login"] == NULL) {
	header("Location: login.html"); //change this
}
else{
   $acid_id = $_SESSION["userid"];
    
   
}






$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$x =0;

$query2=$conn->query("UPDATE event SET status = 'Expired' WHERE status ='Pending' and event.acid_id='$acid_id'and sdate<CURRENT_DATE OR (sdate=CURRENT_DATE and stime<CURRENT_TIME) " );


$sql = "SELECT * FROM `event`  Join user On event.lect_id = user.acid_id where event.acid_id='$acid_id' order by status";
$query1 = $conn->query($sql);
// $query1=$conn->query("select * from event Left Join user On event.acid_id = user.acid_id where event.acid_id='$acid_id'");

if ($query1->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($query1)) {

       $x++;

       if ($row["status"]=="Approve"){     


        $obj = '{"no":"' . $x .
            '","name": "' . $row['name'] .
            '","acid_id": "' . $row['acid_id'] .
            '","date": "' . $row['sdate'] .
            '","stime": "' . $row['stime'] .
            '","etime": "' . $row['etime'] .
            '","venue": "' . $row['address'] .
            '","remark": "' . $row['remark'] .
            '","hp": "' . $row['hp'] .
            '","status": "' . $row['status'] .
            '","event_id": "' . $row['event_id'] .
            '"}';
        }
        
        else if ($row["status"]=="Reject" || $row["status"]=="Expired" || $row["status"]=="Pending")
        { 
        $obj = '{"no":"' . $x .
            '","name": "' . $row['name'] .
            '","acid_id": "' . $row['acid_id'] .
            '","date": "' . $row['sdate'] .
            '","stime": "' . $row['stime'] .
            '","etime": "' . $row['etime'] .
            '","venue": "' . "--"          .
            '","hp": "' . "--" .
            '","status": "' . $row['status'] .  
            '","remark": "' . $row['remark'] .
            '","event_id": "' . $row['event_id'] .
            '"}';  

        }

        // else{
        //     $obj = '{"no":"' . $x .
        //         '","name": "' . $row['name'] .
        //         '","acid_id": "' . $row['acid_id'] .
        //         '","date": "' . $row['sdate'] .
        //         '","stime": "' . $row['stime'] .
        //         '","etime": "' . $row['etime'] .
        //         '","venue": "' . "--"          .
        //         '","hp": "' . "--" .
        //         '","remark": "' . $row['remark'] .
        //         '","event_id": "' . $row['event_id'] .
        //         '"}'; 

        // }


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

