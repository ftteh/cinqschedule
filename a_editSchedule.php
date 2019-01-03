<!--
Admin add subject schedule page
--><?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Subject Schedule Form</title>
<meta charset="utf-8">
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
	<link href="css/own.css" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<!-- <script>
function showSubject(){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "gsubject.php", false);
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
	xhttp.open("GET", "gsubject.php", false);
	xhttp.send();
	obj = JSON.parse(xhttp.responseText);
	for (x in obj) {
		if(s.value == obj[x].subcode){
			document.getElementById("subname").value = obj[x].subname;
			return;
		}
	}
}


</script> -->


<body id="page-top" 
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
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Management</a>
                        <div class="dropdown-menu shadow border-0">
							<a class="dropdown-toggle dropdown-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">User</a>
							<div class="dropdown-menu shadow border-0">
								<a class="dropdown-item js-scroll-trigger" href="./a_addUser.php">Add User</a>
							</div>
							<a class="dropdown-toggle dropdown-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Schedule</a>
							<div class="dropdown-menu shadow border-0">
								<a class="dropdown-item js-scroll-trigger" href="./a_addSchedule.php">Add Schedule</a>
								<a class="dropdown-item js-scroll-trigger" href="./a_editSchedule.php">Edit Schedule</a>
							</div>
							<a class="dropdown-toggle dropdown-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Holiday</a>
							<div class="dropdown-menu shadow border-0">
								<a class="dropdown-item js-scroll-trigger" href="./a_addHoliday.php">Add Holiday</a>
							</div>
						</div>
					</li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">View</a>
                        <div class="dropdown-menu shadow border-0">
                            <a class="dropdown-item js-scroll-trigger" href="./a_viewUser.php">User</a>
                            <a class="dropdown-item js-scroll-trigger" href="./a_viewHoliday.php">Holiday</a>
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
			<h1 class="w3layouts_head">Edit Subject Schedule Form</h1>
				<div class="w3layouts_main_grid">
					<form action="uschedule.php" method="post" class="w3_form_post" onsubmit="return confirmFunc()">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>SUBJECT CODE-SECTION </label>
								<input type="text" name="subcode" id="subcode" placeholder="SCSJ3104-01" onchange="subcodeValidate(document.getElementById('subcode'))" style="text-transform:uppercase" required="">
								<!-- <label>SUBJECT CODE SECTION </label> -->
								<!-- <select name="subcode" id="selection" onchange="selectsub(this);">
								<option value=" ">Select a subject</option>
							 -->
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>SUBJECT NAME </label>
								<input type="text" name="subname" id="subname" placeholder="APPLICATION DEVELOPMENT" onchange="isAlphabet(document.getElementById('subname'))" style="text-transform:uppercase" required="">
							</span>
						</div>
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>DAY </label>
								<select name="day" required>
									<option value="" selected="" disabled="">SELECT DAY</option>
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
								<label>Time (From/To) </label>
								<div class="agileits_w3layouts_main_gridr">
									<input type="time" name="TimeStart" placeholder=" " required="">
								</div>
								<div class="agileits_w3layouts_main_gridr">
									<input type="time" name="TimeEnd" placeholder=" " required="">
								</div>
								<div class="clear"> </div>
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>VENUE </label>
									<select name="location" required>
										<option value="" selected="" disabled="">SELECT VENUE</option>
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


		<!-- //Calendar -->
			
		</div>
	</div>
<!-- //footer -->
<div class="w3layouts_copy_right">
		<div class="container">
			<p>© 2018 Edit Subject Schedule Form. All rights reserved | Design by FantasticCinq.</a></p>
		</div>
	</div>
</body>
<script>
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

function subcodeValidate(elem)
	{
		
		var subcode = /^[a-zA-Z0-9]+\-[0-9]{2}$/;

		if(elem.value.match(subcode))
		{
			return true;
		}else
		{
			alert("Invalid Subject Code Entered - Incomplete/Wrong Format");
			elem.focus();
			return false;
		}
	}
function isAlphabet(elem)
{
	//var x = document.forms["addForm"]["subname"].value;
   var alphaExp = /^[a-zA-Z]+$/;
   if(elem.value.match(alphaExp))
   {
       return true;

   }
   else
   {  alert("Subject Name Only Accept Alphabets");
      elem.focus();
	  return false;
   }
 }


</script>
</html>