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
$s_id=$_POST['dd'];
$d=$_POST['d'];
$st=$_POST['st'];
$et=$_POST['et'];
//CONVERT DAY INTO INTEGER TO BE INSERTED INTO DATABASE

if($_POST["day"]=='Sun')
{
    $_POST["day"]=0;
}
if($_POST["day"]=="Mon")
{
    $_POST["day"]=1;
}
if($_POST["day"]=="Tues")
{
    $_POST["day"]=2;
}
if($_POST["day"]=="Wed")
{
    $_POST["day"]=3;
}
if($_POST["day"]=="Thurs")
{
    $_POST["day"]=4;
}

//CONVERT DATA INTO UPPERCASE TO BE INSERTED INTO DATABASE
$subcode=strtoupper($_POST['subcode']);
$lect_id=strtoupper($_POST['lect_id']);

//SELECT RELATED SUBNAME AND LECTNAME TO BE UPDATED INTO SCHEDULE TABLE
$sql2="SELECT subname from subject WHERE subcode='".$_POST['subcode']."'";
$subname = $conn->query($sql2);
$row2 = mysqli_fetch_assoc($subname);
$sn=strtoupper($row2['subname']);

$sql3="SELECT name from user where acid_id='".$_POST['lect_id']."'";
$lectname = $conn->query($sql3);
$row = mysqli_fetch_assoc($lectname);
$ln=strtoupper($row['name']);

//UPDATE SCHEDULE TABLE
$sql = "UPDATE schedule SET subcode='$subcode',subname='$sn',lect_id='$lect_id',lectname='$ln',stime='".$_POST['TimeStart']."',etime='".$_POST['TimeEnd']."',venue='".$_POST['location']."',day='".$_POST['day']."' WHERE subcode='$s_id'AND day='$d' AND stime='$st' AND etime='$et'";

if ($conn->query($sql) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE) {
    echo "<script type='text/javascript'>
    alert('Record updated successfully')</script>";
} else {
    echo "Error updating record: ". $conn->error;

}

$conn->close();
?>
<script type="text/javascript">
    
    window.location="a_viewSchedule.php";
    </script>

