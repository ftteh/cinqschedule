<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">
<head>
<title>Make Appointment</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons 
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>-->

<script src="js/moment.js"></script>

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
  <link href="css/own.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<script>


		    getOptions = function () {
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                this.response.forEach(e => {
                    $('input#name').val(e.name );

                })

            }
        };
        xhttp.open("GET", "g_s_makeApp.php", true);
        xhttp.send();
    }


function showSubject(){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsub.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		var opt = document.createElement('option');

        opt.text = obj[x].subcode;
		opt.value = obj[x].subcode;
		document.getElementById("selection").appendChild(opt);
	}
}

function selectsub(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsub.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode){
			document.getElementById("subname").value = obj[x].subname;
			return;
		}
	}
}

function selectLecName(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "glecturer.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode){
			$('input#LecName').val(obj[x].lecName );
			document.getElementById("lect_id").value = obj[x].lect_id;
			return ;
		}
	}
}


</script>



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

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>
  <!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->


<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Make Appointment</h1>
				<div class="w3layouts_main_grid">
					<form action="s_makeApp_insert.php" method="post" class="w3_form_post" onsubmit="return confirmFunc()">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label >Name </label>
								<script>getOptions()</script>
								<input  type="text" name="name" id="name"  >								
							</span>
						</div>
						<div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileits_grid">
								<label>Subject Code </label>
								<select name="subcode" id="selection" onchange="selectsub(this);selectLecName(this)">
								<option value=" ">Select a subject</option>
							</select>

						<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Subject Name </label>
							<input type="text" name="subname" id="subname" disabled>
						</span>
					</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Lecturer's Name </label>
							<input type="text" name="lecName" id="LecName" disabled>
						</span>
					</div>

									<div class="clear"> </div>
							</span>
						</div>
						<div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">
								<label>Date / Time </label>
								<div class="agileits_w3layouts_main_gridl">
										<input class="date" id="datepicker" name="sdate" type="text" placeholder="mm/dd/yyyy" onfocus="this.value = '';"
										onblur="if (this.value == '') {this.value = '';}" required="">
								</div>
								<div class="agileits_w3layouts_main_gridr">
									<input type="time" name="stime" required="">
								</div>
									<div class="clear"> </div>
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Duration </label>
								<select name="duration">
									<option value="none" selected="">Select duration</option>
									<option value="1">1h</option>
									<option value="15">1h30m</option>
									<option value="2">2h</option>
									<option value="25">2h30m</option>
									<option value="3">3h</option>
								</select>
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Remark </label>
								<input type="text" name="remark" placeholder="Ex: project problem" required="">
								</span>
						</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
						<input type="hidden" id="lect_id" name="lect_id">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		<!-- Calendar -->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function () {
				$("#datepicker").datepicker();
			});
		</script>
		<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">
					<p>© 2018 Add Appoinment Form. All rights reserved | Design by FantasticCinq.</a></p>
				</div>
			</div>
		</div>
	</div>
<!-- //footer -->
<script>$(document).ready(function(){       var role = "<?php echo $_SESSION['userrole']; ?>";       if(role == "Lecturer"){         $("a.exam").show();         $("a.lec").show();         $("a.stu").hide();         $("a.newapp").hide();              }       else{         $("a.exam").hide();         $("a.lec").hide();         $("a.stu").show();         $("a.newapp").show();         }     });</script></body>
<script>
		function confirmFunc() {
		//		var r = confirm("Confirm To Submit?");
				// 	if (r == true) {
				// 		window.location.href("./s_makeApp.php");
				// }
		
				// else { return false; }
				 	var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					today = mm + '/' + dd + '/' + yyyy;
					var start = $('#datepicker').val();
					var a = moment(today);
					var b = moment(start);
					var diff = b.diff(a, 'days') ;					
					if(diff <= 0)
					{
						alert("Invalid start date! \n Only upcoming days can be apply");
						document.getElementById('datepicker').focus();
						return false;
					}
				

				}
		</script>





</html>