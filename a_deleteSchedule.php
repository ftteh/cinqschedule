<html>
<HEAD><TITLE>Delete Subject Schedule</TITLE></HEAD>
<body>
<?php
    require_once('config.php');
    $delsubcode=$_GET['subcode'];
    $delday=$_GET['day'];
    $delstime=$_GET['TimeStart'];
    $deletime=$_GET['TimeEnd'];

    $sql = "DELETE FROM schedule WHERE subcode='$delsubcode' AND day='$delday' AND stime='$delstime'AND etime='$deletime'";

    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Subject schedule deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>

<script type="text/javascript"> 
    
  window.location="a_viewSchedule.php"; //remember change here
</script>

</body>
</html>