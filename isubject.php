<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Access-Control-Allow-Origin: *");
ini_set('max_execution_time', 200);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$subcode=strtoupper($_POST['subcode']);
$section=$_POST['section'];
$subname=strtoupper($_POST['subname']);
$success=0;
for($i=0;$i<$section;$i++)
{
    $subcode .="-0";
    $s=$i+1;
    $subcode .=$s;
    $sql = "INSERT INTO subject (subject_id,subcode, subname) VALUES ('','$subcode','$subname')";
    if($conn->query($sql)==TRUE)
    {
        $success=1;
    }
    $subcode=strtoupper($_POST['subcode']);
}



if ($success==1 ) {
    echo "<script type='text/javascript'>
    alert('New record created successfully')</script>";
} else {
    echo "Error inserting record";
}
$conn->close();
?>
<script type="text/javascript">
    window.location="a_viewSubject.php";
    </script>

