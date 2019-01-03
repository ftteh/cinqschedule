<!--
Admin add subject schedule page
--><?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Subject Schedule Form</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html">

<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<script src="js/moment.js"></script>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
 rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/grayscale.min.css" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/own.css" rel="stylesheet">

</head>

<body id="page-top">
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
                        <a class="nav-link js-scroll-trigger" href="./homePage.php">Home</a>
					</li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">User</a>
                        <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item js-scroll-trigger" href="./a_addUser.php">Add User</a>
                        <a class="dropdown-item js-scroll-trigger" href="./a_viewUser.php">View User</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Holiday</a>
                        <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item js-scroll-trigger" href="./a_addHoliday.php">Add Holiday</a>
                        <a class="dropdown-item js-scroll-trigger" href="./a_viewHoliday.php">View Holiday</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Subject</a>
                        <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item js-scroll-trigger" href="./a_addSubject.php">Add Subject</a>
                        <a class="dropdown-item js-scroll-trigger" href="./a_viewSubject.php">View Subject</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Schedule</a>
                        <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item js-scroll-trigger" href="./a_addSchedule.php">Add Schedule</a>
                        <a class="dropdown-item js-scroll-trigger" href="./a_viewSchedule.php">View Schedule</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">ADMIN</a>
                        <div class="dropdown-menu shadow border-0">

                            <a class="dropdown-item js-scroll-trigger" href="./visitorPage.html">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
</nav>
  
	<!-- Bootstrap core JavaScript -->
	<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/grayscale.min.js"></script>
	<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->

  </body>

<body>
<!-- banner -->

	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Add Subject Schedule Form</h1>
				<div class="w3layouts_main_grid">
					<form action="ischedule.php" method="post" class="w3_form_post" name="addform">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>SUBJECT CODE</label>
								<select required name="subcode" onchange="select(this)">
								<option value="" selected="" required="">SELECT SUBCODE</option>
								<?php
									require_once("config.php");
									
									$sql="SELECT subcode from subject";
									$result = $conn->query($sql);
									$row=mysqli_num_rows($result);
									while($row=mysqli_fetch_array($result))
									{
										$upper=strtoupper($row['subcode']);
										echo"<option value='".$upper."'>".$upper."</option>";
									}
									?>
								</select>	
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Subject Name </label>
								<input type="text" name="subname" id="subname" readonly>
							</span>
						</div>
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>LECTURER ID </label>
								<select required name="lect_id" id="lect_id" onchange="selectlect(this)">
								<option value="" selected="" required="">SELECT LECTURER ID</option>
								<?php
									$sql1="SELECT acid_id from user WHERE role='Lecturer'";
									$result1 = $conn->query($sql1);
									$row1=mysqli_num_rows($result1);
									while($row1=mysqli_fetch_array($result1))
									{
										$upper1=strtoupper($row1['acid_id']);
										echo"<option value='".$upper1."'>".$upper1."</option>";
									}
									?>
								</select>								
								</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Lecturer Name </label>
								<input type="text" name="lectname" id="lectname" readonly>
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>DAY </label>
								<select required name="day" >
									<option value="" selected="" required="">SELECT DAY</option>
									<option value="Sun">SUNDAY</option>
									<option value="Mon">MONDAY</option>
									<option value="Tues">TUESDAY</option>
									<option value="Wed">WEDNESDAY</option>
									<option value="Thurs">THURSDAY</option>
								</select>
							</span>
						</div>

					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
                                    <span class="agileinfo_grid">
                                        <label>Time (From / To) </label>
                                        <div class="agileits_w3layouts_main_gridr" style="float:left;">
                                            <input type="time" name="stime" id="stime" placeholder=" " required="">
                                        </div>
                                        <div class="agileits_w3layouts_main_gridr" style="float:left;">
                                            <input type="time" name="etime" id="etime" placeholder=" " required="">
                                        </div>
                                        <div class="clear"> </div>
                                    </span>
                                </div>
						<div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>VENUE </label>
									<select required="" name="venue" >
										<option value="" selected="" disabled="" >SELECT VENUE</option>
										<option value="BK1">BK1</option>
										<option value="BK2">BK2</option>
										<option value="BK3">BK3</option>
										<option value="BK4">BK4</option>
										<option value="BK5">BK5</option>
										<option value="BK6">BK6</option>
										<option value="BK7">BK7</option>
										<option value="BK8">BK8</option>
										<option value="MPK1">MPK1</option>
										<option value="MPK2">MPK2</option>
										<option value="MPK3">MPK3</option>
										<option value="MPK4">MPK4</option>
										<option value="MPK5">MPK5</option>
										<option value="MPK6">MPK6</option>
										<option value="MPK7">MPK7</option>
										<option value="MPK8">MPK8</option>
										<option value="MPK9">MPK9</option>
										<option value="MPK10">MPK10</option>
									</select>
								</span>
							</div>
							<input type="text" name="lectid" id="lectid" hidden >
						<div class="clear"></div>
					
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
						$(function() {
							$( "#datepicker" ).datepicker();
						});

						
					</script>
			
		</div>
	</div>
<!-- //footer -->
<div class="w3layouts_copy_right">
	<div class="container">
		<p>© 2018 Insert Subject Schedule Form. All rights reserved | Design by FantasticCinq.</a></p>
	</div>
</div>

</body>

<script type='text/javascript'>
	$(document).ready(function () {
		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
			if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			}
			var $subMenu = $(this).next(".dropdown-menu");
			$subMenu.toggleClass('show');


			$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
			});

			return false;
		});
	});
	
	$(function () {
       
	   $("#etime").on('change', function () {
		   if ($("#etime").val() < $("#stime").val()) {
			   alert('End time must be greater than start time');
			   $("#stime").val('');
			   $("#etime").val('');
		   }
	   });
   });

   function selectsub(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsub.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode){
			document.getElementById("subname").value = obj[x].subname;
			document.getElementById("lect_id").value = obj[x].lect_id;
			document.getElementById("lectname").value = obj[x].lectname;
			document.getElementById("lectid").value = obj[x].lect_id;
			document.getElementById("lect_id").disabled=true;
		}
	}
}
function selectsn(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsubname.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode){
			document.getElementById("subname").value = obj[x].subname;
			document.getElementById("lect_id").value = "";
			document.getElementById("lectname").value = "";
			document.getElementById("lect_id").disabled=false;
		}
	}
}

function select(s)
{
	selectsn(s);
	selectsub(s);
}

   function selectlect(s){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "glectname.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].acid_id){
			document.getElementById("lectname").value = obj[x].lectname;
			document.getElementById("lectid").value = obj[x].acid_id;
		}
	}
}


</script>
</html>