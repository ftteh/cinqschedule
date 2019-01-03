<html>
<body>
<?PHP
require_once("config.php");                           

session_start();
if ($_SESSION["Login"] == NULL) {
	header("Location: login.html"); //change this
}
else{
   $acid_id = $_SESSION["userid"];

}




    $category="S";
    $lect_id=$_POST["lect_id"];
    $stime=$_POST["stime"];    

    $duration=$_POST["duration"];
    if ($duration == "1")
    {
        $etime=date('H:i',strtotime('+1 hour',strtotime($stime)));    

    }
    else if ($duration =="15")
    {
        $etime=date('H:i',strtotime('+1 hour 30 minutes',strtotime($stime)));   
    }

    else if ($duration =="2")
    {
        $etime=date('H:i',strtotime('+2 hour',strtotime($stime)));   
    }

    else if ($duration =="25")
    {
        $etime=date('H:i',strtotime('+2 hour 30 minutes',strtotime($stime)));   
    }

    else if ($duration =="3")
    {
        $etime=date('H:i',strtotime('+3 hour',strtotime($stime)));   
    }

    $remark=$_POST["remark"];

    $date=$_POST["sdate"];
    $date=date("Y-m-d",strtotime($date));

    

    $sql = "INSERT INTO `event` (category,acid_id,lect_id,stime,etime,remark,title,sdate,edate,status)
    VALUES('$category','$acid_id','$lect_id','$stime','$etime','$remark','$remark','$date','$date','Pending')";
    // $sql= "insert into event(category,acid_id,lect_id,stime,etime,remark,sdate)"."values('$category','$acid_id','$lect_id','$stime','$etime','$remark','$date')";
    
    // $query = mysql_query( $sql );

    // if (!$query) die("SQL query error encountered: ".mysql_error() );
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: s_viewHistory.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // mysql_close($conn);  
$conn->close();


?>

<script type="text/javascript"> 
    
    window.location="s_makeApp.php"; 
</script>

</html>