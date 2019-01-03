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
	<title>Add Subject Form</title>

	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

	<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Add Subject Form</h1>
			<div class="w3layouts_main_grid">
				<form action="isubject.php" method="post" class="w3_form_post" onsubmit="return subcodeValidate(document.getElementById('subcode'));return isAlphabet(document.getElementById('subname'))">
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Subject Code </label>
							<input type="text" name="subcode" id="subcode" placeholder="SCSJ3104" onchange="subcodeValidate(document.getElementById('subcode'))" style="text-transform:uppercase" required="" >
						</span>
					</div>
                    <div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Total Sections </label>
							<input type="number" name="section" id="section" placeholder="5" required="" style="height:40px;background:transparent;font-size:15px;">
						</span>
					</div>
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Subject Name </label>
							<input type="text" name="subname" id="subname" placeholder="APPLICATION DEVELOPMENT" onchange="isAlphabet(document.getElementById('subname'))" style="text-transform:uppercase" required="" >
						</span>
					</div>

					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit"  >
						</div>
					</div>
				</form>
			</div>
			<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
			<script src="js/jquery-ui.js"></script>
			
			<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">
					<p>© 2018 Add Subject Form. All rights reserved | Design by FantasticCinq.</a></p>
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
		var subcode = /^[a-zA-Z]{4}[0-9]{4}$/;

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
   var alphaExp = /^[a-zA-Z ]+$/;
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