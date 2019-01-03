<HTML>
<HEAD><TITLE>Edit Holiday</TITLE></HEAD>
<BODY>
    <?php
        require_once("config.php");
        
        $sdate=date("Y-m-d",strtotime($_POST['start']));
        $edate=date("Y-m-d",strtotime($_POST['end']));
        
        
        $sql = "update event SET title='$_POST[title]',remark='$_POST[remark]',sdate='$sdate', edate='$edate' WHERE event_id='$_POST[event_id]'";
       
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Holiday is updated successfully!');</script>";
        }  else {
            echo "Error updating record: " . mysqli_error($conn);
        }
     

        $conn->close();
    ?>
    <script type="text/javascript"> 
        window.location.href="a_viewHoliday.php";
    </script>
</BODY>
</HTML>