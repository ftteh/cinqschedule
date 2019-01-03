<html>
<body>

<?php
require_once("config.php");



if(isset($_GET['event_id'])){
	$id=$_GET['event_id'];

    $query1 = $conn->query("select * from event where event_id='$id'");
    
    	
	if($rows = mysqli_fetch_array($query1))
	{

			$query2=$conn->query("update event set status='Approve' where event_id='$id'");
			
			if($query2){
				header("location:l_viewHistory.php");
            }
            else{
				echo "fail";
			}
		}
	}

	
?>
<script>$(document).ready(function(){       var role = "<?php echo $_SESSION['userrole']; ?>";       if(role == "Lecturer"){         $("a.exam").show();         $("a.lec").show();         $("a.stu").hide();         $("a.newapp").hide();              }       else{         $("a.exam").hide();         $("a.lec").hide();         $("a.stu").show();         $("a.newapp").show();         }     });</script></body>
</html>
	