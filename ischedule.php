<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinqschedule";

header("Access-Control-Allow-Origin: *");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//CONVERT DAY INTO INTEGER TO BE INSERTED INTO DATABASE
$day=$_POST["day"];
if($_POST['day']=="Sun")
{
    $day=0;
}
if($_POST['day']=="Mon")
{
    $day=1;
}
if($_POST['day']=="Tues")
{
    $day=2;
}
if($_POST['day']=="Wed")
{
    $day=3;
}
if($_POST['day']=="Thurs")
{
    $day=4;
}

//CONVERT DATA ENTERED INTO UPPERCASE TO BE INSERTED INTO DATABASE
$subcode=strtoupper($_POST['subcode']);
$subname=strtoupper($_POST['subname']);
$lect_id=strtoupper($_POST["lectid"]);
$ln=strtoupper($_POST['lectname']);

$sql = "INSERT INTO schedule (s_id, subcode,subname,stime,etime,day,lect_id,lectname,venue,t)
VALUES ('', '$subcode','$subname','".$_POST['stime']."','".$_POST['etime']."',$day,'$lect_id','$ln','".$_POST['venue']."','sec')";

//TO VALIDATE NO MULTIPLE INSERTION OF THAT SUBJECT ON THE SAME DAY WITH OVERLAPPED TIME
$sql4 = "select day,stime,etime from schedule where subcode='$subcode'";
$result = $conn->query($sql4);
  if (!$result)  die("Connection failed: " . $conn->connect_error);
        while ($record = mysqli_fetch_array($result))
          {
                 $a = array(
                        'day'=> $record["day"],
                        'stime'=> $record["stime"],
                        'etime'=> $record["etime"],
                        
                         );
                 $json = json_encode($a);
                
                if($record["day"]==$day && (($_POST["stime"]>=$record["stime"] && $record["etime"]<=$_POST["etime"])||($_POST["etime"]<=$record["etime"]&&$_POST["etime"]>$record["stime"])))
                  {
                     echo "<script type='text/javascript'>
                     alert('Invalid input. Insertion of subject schedule with overlapped/ same time on the same day');
                     window.location='a_addSchedule.php';</script>";
                    return false;
                     }
          }
          $sql5 = "select day,stime,etime,venue from schedule";
          $result2 = $conn->query($sql5);
            if (!$result2)  die("Connection failed: " . $conn->connect_error);
                  while ($record2 = mysqli_fetch_array($result2))
                    {
                           $a2 = array(
                                  'day'=> $record2["day"],
                                  'stime'=> $record2["stime"],
                                  'etime'=> $record2["etime"],
                                  'venue'=> $record2["venue"],
                                   );
                           $json2 = json_encode($a2);
                          
                          if($record2["day"]==$day && (($_POST["stime"]>=$record2["stime"] && $record2["etime"]<=$_POST["etime"])||($_POST["etime"]<=$record["etime"]&&$_POST["etime"]>$record2["stime"]))&&$_POST["venue"]==$record2["venue"])
                            {
                               echo "<script type='text/javascript'>
                               alert('Invalid venue selection. The room is occupied!');
                               window.location='a_addSchedule.php';</script>";
                              return false;
                               }
                    }


if ($conn->query($sql) == TRUE && $conn->query($sql4) == TRUE&& $conn->query($sql5) == TRUE ) {
    echo "<script type='text/javascript'>
    alert('New record created successfully')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
<script type="text/javascript">
  window.location="a_viewSchedule.php";
</script>

