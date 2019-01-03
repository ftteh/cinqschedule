<html>
<HEAD><TITLE>Insert User</TITLE></HEAD>
<body>
<?PHP
    require_once('config.php');
    
//    from, to, remark
    $sdate=date("Y-m-d",strtotime($_POST['from']));
    $edate=date("Y-m-d",strtotime($_POST['to']));
    
    $sql = "insert into event(event_id, category, acid_id, lect_id,title,stime, etime, remark,venue,status,sdate,edate) " . 
            "values('','Holiday',' ',' ','$_POST[title]','','','$_POST[remark]','','','$sdate','$edate')" ; 
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New holiday is added successfully');</script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
        $conn->close();
?>

<script type="text/javascript"> 
    window.location="a_viewHoliday.php"; //remember change here
</script>

</body>
</html>