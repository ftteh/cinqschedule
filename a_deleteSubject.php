<html>
<HEAD><TITLE>Delete Subject</TITLE></HEAD>
<body>
<?php
    require_once('config.php');
    $delsubcode=$_GET['subcode'];
    
    $sql = "DELETE FROM subject WHERE subcode='$delsubcode'";
    $sql2 = "DELETE FROM schedule WHERE subcode='$delsubcode'";

    if ($conn->query($sql) === TRUE &&$conn->query($sql2) === TRUE) {
        echo "<script>alert('Subject deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>

<script type="text/javascript"> 
    
  window.location="a_viewSubject.php"; //remember change here
</script>

</body>
</html>