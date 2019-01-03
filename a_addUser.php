
<!DOCTYPE html>		
<html lang="en">

<head>
	<title>Insert User Form</title>
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
		

			<h1>Insert User Form</h1>
			<div class="w3layouts_main_grid">
				<form action="addUser.php" method="post" class="w3_form_post" onsubmit="return acidValidator(document.getElementById('acidID'), 'Not a Valid ACID ID')">
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>ACID ID </label>
							<input type="text" name="acidID" id="acidID" placeholder="ACID ID" style="text-transform:uppercase" required="" onchange="autopw()">
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Full Name </label>
							<input type="text" name="username" placeholder="Full Name" style="text-transform:uppercase" required="">
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>UTM Mail </label>
							<input type="email" name="email" placeholder="UTM MAIL" style="text-transform:uppercase" required="" readonly>
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Password </label>
							<input type="text" name="password" placeholder="Default Password: utm+acidID" style="text-transform:uppercase" readonly>
						</span>
					</div>

					<div class="content-w3ls">
						<div class="form-w3ls">
							<div class="content-wthree2">
								<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label>Please choose user role</label>
										<ul>
											<li>
												<input type="radio" id="student" name="role" value="Student">
												<label for="student">Student </label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="lecturer" name="role" value="Lecturer">
												<label for="lecturer">Lecturer</label>
												<div class="check">
													<div class="inside"></div>
												</div>
											</li>
											<li>
												<input type="radio" id="admin" name="role" value="Admin">
												<label for="admin">Admin </label>
												<div class="check"></div>
											</li>
										</ul>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<div class="w3layouts_copy_right">
		<div class="container">
			<p>© 2018 Insert User Form. All rights reserved | Design by FantasticCinq.</a></p>
		</div>
	</div>

	<script>
		function autopw() {
					var acid = $('#acidID').val();
					var pw = 'UTM'+ acid;
					var mail= 'UTM' + acid +'@LIVE.UTM.COM';
					$("[name='password']").val(pw);
					$("[name='email']").val(mail);
		}
		function acidValidator(elem, helperMsg) {		
		
		if(elem.value.length == 9){
			var first= elem.value.substring(0,1);
			var yenter = elem.value.substring(1,3);
			var fac = elem.value.substring(3,5);
			var last = elem.value.substring(5,9);
		
		
			console.log(first);
			console.log(yenter);
			console.log(fac);
			console.log(last);
			var numb = /^[0-9]+$/;
			var alp = /^[a-zA-Z]+$/;
			if(first.match(alp))
			{
				if(yenter.match(numb))
					if(fac.match(alp))
						if(last.match(numb))
							return true;
						else{
							alert(helperMsg);
							elem.focus();
							return false;
						}
					else{
						alert(helperMsg);
						elem.focus();
						return false;
					}
				else {
				alert(helperMsg);
				elem.focus();
				return false;
				}
			} 
			else {
				alert(helperMsg);
				elem.focus();
				return false;
			}	
		}
		else{
			alert("Invalid length of ACID ID");
			elem.focus();
			return false;
		}

	}

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
</body>


</html>