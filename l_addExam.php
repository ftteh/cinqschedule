<?php
    // Start up your PHP Session
    session_start();

    // is the one accessing this page logged in or not?
    // If the user is not logged in send him/her to the login form
    if ($_SESSION["Login"] != "YES") {
        echo "<script type='text/javascript'>
                alert('You are NOT correctly logged in, please try again');
                window.location.href='loginPage.html';
            </script>";
    }
?>

<html lang="en">

<head>
	<title>Insert Exam</title>

	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- //custom-theme -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
	 crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	 rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/grayscale.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body id="page-top" onload="showSubject()">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">FantasticCinq</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="./homePage_SL.php">Home</a>
          </li>
          <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Appointment</a>
            <div class="dropdown-menu shadow border-0">
              <a class="dropdown-item js-scroll-trigger newapp" href="./s_makeApp.php">Add New</a>
              <a class="dropdown-item js-scroll-trigger stu" href="./s_viewHistory.php">View History</a>
              <a class="dropdown-item js-scroll-trigger lec" href="./l_viewHistory.php">View History</a>
            </div>
          </li>
          <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle exam" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Exam</a>
            <div class="dropdown-menu shadow border-0">
              <a class="dropdown-item js-scroll-trigger" href="./l_addExam.php">Add New</a>
              <a class="dropdown-item js-scroll-trigger" href="./l_viewExam.php">View History</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="./s_event.php">Planner</a>
          </li>
          <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION["userid"] ?></a>
            <div class="dropdown-menu shadow border-0">
              <a class="dropdown-item js-scroll-trigger" href="./userPro.php">Update Profile</a>
              <a class="dropdown-item js-scroll-trigger" href="./logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

	<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Insert Examination Form</h1>
			<div class="w3layouts_main_grid">
				<form action="iexam.php" method="post" class="w3_form_post">
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Subject Code </label>
							<select name="subcode" id="selection" onchange="selectsub(this)">
								<option value=" ">Select a subject</option>
							</select>
						</span>
					</div>
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Subject Name </label>
							<input type="text" name="subname" id="subname" disabled>
						</span>
					</div>
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Venue </label>
							<input type="text" name="venue" placeholder="Venue" required="" style="text-transform: capitalize;">
						</span>
					</div>
					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
						<span class="agileinfo_grid">
							<label>Date </label>
							<div class="agileits_w3layouts_main_gridl">
								<input class="date" id="datepicker" name="date" type="text" value="yy-mm-dd" onfocus="this.value = '';"
								 onblur="if (this.value == '') {this.value = '';}" required=""></div>
							<div class="clear"> </div>

						</span>
					</div>



					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
						<span class="agileinfo_grid">
							<label>Time (From / To) </label>
							<div class="agileits_w3layouts_main_gridr" style="float:left;">
								<input type="time" name="timestart" id="start" placeholder=" " required="">
							</div>
							<div class="agileits_w3layouts_main_gridr" style="float:left;">
								<input type="time" name="timeend" id="end" placeholder=" " required="">
							</div>
							<div class="clear"> </div>
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Remark (Optional)</label>
							<input type="text" name="remark" placeholder="Ex: scope" style="text-transform: capitalize;">
						</span>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit" >
						</div>
					</div>
				</form>
			</div>
			<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
			<script src="js/jquery-ui.js"></script>
			<script>
				$(function () {
        			$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
							$("#datepicker").on('change', function () {
									var selectedDate = $(this).val();
									var todaysDate = $.datepicker.formatDate('yy-mm-dd', new Date());
									if (selectedDate < todaysDate) {
											alert('Selected date must be greater than today date');
											$(this).val('');
									}
							});
							$("#end").on('change', function () {
								if ($("#end").val() < $("#start").val()) {
											alert('End time must be greater than start time');
											$("#start").val('');
											$("#end").val('');
									}
							});
				});
			</script>
			<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">
					<p>© 2018 Insert Examination Form. All rights reserved | Design by FantasticCinq.</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- //footer -->

	<!-- Bootstrap core JavaScript -->
	<!-- <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script> -->
	<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="js/grayscale.min.js"></script>
	<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui. min.js'></script> -->

<script>$(document).ready(function(){       var role = "<?php echo $_SESSION['userrole']; ?>";       if(role == "Lecturer"){         $("a.exam").show();         $("a.lec").show();         $("a.stu").hide();         $("a.newapp").hide();              }       else{         $("a.exam").hide();         $("a.lec").hide();         $("a.stu").show();         $("a.newapp").show();         }     });</script></body>
<script>
function showSubject(){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsubject.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	var arr=[];
	for (x in obj) {
		arr[x] = obj[x].subcode;
	}

	arr=arr.sort();
	var temp="";
	var narr=[];
	arr.forEach(e=>{
		n=e.split('-')[0]
		if(n!=temp){
				narr.push(n);
			temp=n;
 		}
 })
 
 narr.forEach(e=>{
		var opt = document.createElement('option');
		opt.text = e;
		opt.value = e;
		document.getElementById("selection").appendChild(opt);
 })

}

function selectsub(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsubject.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode.substr(0, 8)){
			document.getElementById("subname").value = obj[x].subname;
			return;
		}
	}
}

</script>

</html>