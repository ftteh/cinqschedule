<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Access-Control-Allow-Origin: *");
//BUILD CONNECTION WITH DATABASE
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sub_id=$_POST['id'];
$sub_name=$_POST['sn'];
$subcode=strtoupper($_POST["subcode"]);
$subname=strtoupper($_POST["subname"]);

//UPDATE SUBJECT TABLE
$sql = "UPDATE subject SET subcode='$subcode' WHERE subcode='$sub_id'";
$sql1 = "UPDATE subject SET subname='$subname' WHERE subname='$sub_name'";

//SYNCHRONIZE UPDATE WITH SCHEDULE
$sql2="UPDATE schedule SET subname='$subname' WHERE subname='$sub_name'";
$sql3="UPDATE schedule SET subcode='$subcode' WHERE subcode='$sub_id'";

//GET FIRST 8 CHAR OF PREVIOUS SUBCODE AND UPDATED SUBCODE TO DO COMPARISON IN DATABASE TO UPDATE ALL AT 1 TIME IF USER EDITED THE FIRST 8 CHAR IN SUBCODE
$code2 = substr($subcode, 0, 8);
$code1 = substr($sub_id, 0, 8);

$sql4="UPDATE subject SET subcode=REPLACE(subcode,'$code1','$code2') WHERE subcode LIKE '$code1-%'";
$sql5="UPDATE schedule SET subcode=REPLACE(subcode,'$code1','$code2') WHERE subcode LIKE '$code1-%'";

if ($conn->query($sql) == TRUE && $conn->query($sql1) == TRUE&&$conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE&& $conn->query($sql4) == TRUE&& $conn->query($sql5) == TRUE) {
    echo "<script type='text/javascript'>
    alert('Record updated successfully')</script>";
} else {
    echo "Error updating record: ". $conn->error;

}


$conn->close();
?>
<script type="text/javascript">
  window.location="a_viewSubject.php";
 </script>

