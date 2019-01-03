<html>
<HEAD><TITLE>Delete User</TITLE></HEAD>
<body>
<?php
    require_once('config.php');
    $delacid=$_GET['delID'];
    $sql = "DELETE FROM user WHERE acid_id='$delacid'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User is deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>

<script type="text/javascript"> 
    
    window.location="a_viewUser.php"; //remember change here
</script>

</body>
</html>