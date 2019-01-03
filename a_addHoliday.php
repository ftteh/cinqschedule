<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">

<head>
	<title>Insert New Holiday</title>
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
	
	<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Insert Holiday Form</h1>
			<div class="w3layouts_main_grid">
				<form action="addHoliday.php" method="post" name="hform" class="w3_form_post" onsubmit="return checkdate()">
					<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Reason </label>
								<input type="text" name="title" placeholder="Reason of holiday" required="">
							</span>
					</div>
		
					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
						<span class="agileinfo_grid">
							<label>From Date </label>
							<div class="agileits_w3layouts_main_gridl">
								<input class="date" id="datepicker" name="from" type="text" placeholder="yyyy-mm-dd" onfocus="this.value = '';"
								 onblur="if (this.value == '') {this.value = '';}" onchange="dddd()" required="">
							</div>
							<div class="clear"> </div>
						</span>
					</div>

					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
						<span class="agileinfo_grid">
							<label>To Date </label>
							<div class="agileits_w3layouts_main_gridl">
								<input class="date" id="datepicker2" name="to" type="text" placeholder="yyyy-mm-dd" onchange="dddd()" required>
							</div>
							<div class="clear"> </div>
						</span>
					</div>


					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Total Day(s)</label>
							<input type="text" name="remark" id='remark' readonly>
						</span>
					</div>

					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Save">
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
				});
				$(function () {
        			$("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val();
				});

				
				function checkdate(){
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					today = yyyy + '-' + mm + '-' + dd;
					
					var start = $('#datepicker').val();
					var a = moment(today);
					var b = moment(start);
					var diff = b.diff(a, 'days') ;					
					if(diff <= 0)
					{
						alert("Invalid start date! \n Only upcoming holiday can be added");
						document.getElementById('datepicker').focus();
						return false;
					}

					var x = document.forms["hform"]["remark"].value;
					if (x <= 0)
					{	
						alert("Invalid date range! \n Please make sure end date MUST NOT ealier than start date");
						document.getElementById('datepicker2').focus();
						return false;
					}
				}

				function dddd() {
					var start = $('#datepicker').val();
					var end = $('#datepicker2').val();
					var a = moment(start);
					var b = moment(end);
					var diff = (b.diff(a, 'days') + 1);
					$("[name='remark']").val(diff);

				}
			</script>
			<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">
					<p>© 2018 Insert Holiday Form. All rights reserved | Design by FantasticCinq.</a></p>
				</div>
			</div>
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
</script>
</html>