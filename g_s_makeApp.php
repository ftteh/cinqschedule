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
   $acid_id = $_SESSION["userid"];
    $query = $conn->query("select * from user where acid_id = '".$acid_id."'"); 
    
   
}


if ($query->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_array($query)) {

        // $obj = '{"_id":"' . $row['t'] .
        //     '","title": "' . $row['subname'] .
        //     '","title": "' . $row['subname'] .
        //     '"}';

        $obj = '{"name":"' . $row['name'].
            '"}';
          

        

        $obj = json_decode($obj);
        array_push($data, $obj);
    
    $json = json_encode($data);
    echo $json;
}} else {
    $json = "";
    echo json_encode($json);
}

$conn->close();

?>



