<?php
	session_start();

	require_once ("config.php");

	//Check an existing username and password in databse
	$sql="SELECT * FROM user WHERE acid_id='".$_POST['userid']."' and `password`='".$_POST['userpass']."' ";
	$result = $conn->query($sql);

	if($result->num_rows==1){
		
		$_SESSION["Login"] = "YES";
		
		$row = mysqli_fetch_array($result);
		$_SESSION['userid'] = $row['acid_id'];
		$_SESSION['userrole'] = $row['role'];
		
		if($row['role']=="Admin")
			header("location: homePage.php");
		else
			header("location: homePage_SL.php");
	}
	else {

		$_SESSION["Login"] = "NO";
		
		echo "<script type='text/javascript'>
				alert('You are NOT correctly logged in, please try again');
				window.location.href='loginPage.html';
			</script>";
	}

	$conn->close();
?>