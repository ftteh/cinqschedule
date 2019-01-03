<html>
<HEAD><TITLE>Delete Holiday</TITLE></HEAD>
<body>
<?php
    require_once('config.php');
    $deleid=$_GET['delID'];
    $sql = "DELETE FROM event WHERE event_id='$deleid'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Holiday is deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>

<script type="text/javascript"> 
    
    window.location="a_viewHoliday.php"; //remember change here
</script>

</body>
</html>