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


<!DOCTYPE html>
<html lang="en">

<head>
    
<script type='text/javascript'>  
   
.btn{
    height="3cm";
    color:"pink";
    font-size="20px";
}

</script>
    <title>User Profile</title>

    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- //for-mobile-apps -->
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
    <link href="css/own.css" rel="stylesheet">
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
  </body>
    <!-- banner -->
    <body align="center">
        <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "cinqschedule";
      
    //  header("Access-Control-Allow-Origin: *");
      
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM user WHERE acid_id='".$_SESSION['userid']."'";
    
$result = $conn->query($sql);
      $user=array(
        "acid_id"=>"",
        "name"=>"",
        "password"=>"",
        "hp"=>"",
        "email"=>"",
        "address"=>"",
      );
      
          while ($row = mysqli_fetch_array($result))
          {	
           $user=array(
                         "acid_id"=>$row['acid_id'],
                         "name"=>$row['name'],
                         "password"=>$row['password'],
                         "hp"=>$row['hp'],
                         "email"=>$row['email'],
                         "address"=>$row['address'],
                        );
          }
          
        if(isset($_POST["password"]) || isset($_POST["name"]) 
            || isset($_POST["hp"]) || isset($_POST["email"]) || isset($_POST["address"])){

            $sql2 = "UPDATE user SET name='$_POST[name]',password='$_POST[pass]'
            ,hp='$_POST[hp]'
             ,email='$_POST[email]',address='$_POST[address]'
             where acid_id='".$_SESSION['userid']."'";

$result2 = $conn->query($sql2);


if ($result2> 0) {
  echo "<script type='text/javascript'>
  alert('Your profile is updated.') </script>";
        }
else
  echo"Failed to update". $conn->error;

        }

  $sql3="SELECT photo from user where acid_id='".$_SESSION['userid']."'";
  $result3 = $conn->query($sql3);
  
 $row = mysqli_fetch_assoc($result3);
 if($row['photo']!=null)
 $imageURL='<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'" class="center" width="35%" height="35%"/>';
  else
  $imageURL='<img src="img/profilepic.png" class="center" width="35%" height="35%"/>';
$conn->close();
  ?>
            
<div class="center-container">
    <hr>
        <div class="main">
             <!-- left column -->
            <h1>Personal info</h1>
            <form action="uploadPhoto.php" method="post" class="w3_form_post" enctype="multipart/form-data" name="photoform" >
                    <div class="w3layouts_main_grid">
                    
                    <?php echo $imageURL?> 
                        <i>Upload a different photo...</i>

                        <input type="file" class="form-control" name="photo">
                        <input type="submit"  name="upload" value="Upload" >
                    </div>
                    </form>
                    <!-- edit form column -->
                    <div class="w3layouts_main_grid">
                        <form action="updateUserPro.php" method="post" class="w3_form_post" name="infoform" onsubmit="return isAlphabet(document.getElementById('name'));return emailValidate(document.getElementById('email'));return isNumeric(document.getElementById('hp'));return isAlphanumeric(document.getElementById('address'))">
                            <div class="w3_agileits_main_grid w3l_main_grid">
                                <span class="agileits_grid">
                                    <label>Name </label>
                                    <input type="text" name="name" id="name" value="<?php echo $user['name']?>" onchange="isAlphabet(document.getElementById('name'))" style="text-transform:uppercase" >
                                </span>
                            </div>

                            <div class="w3_agileits_main_grid w3l_main_grid">
                                <span class="agileits_grid">
                                    <label>Acid ID </label>
                                    <input type="text" name="acid_id" value="<?php echo $user['acid_id']?>"style="text-transform:uppercase" disabled >
                                </span>
                            </div>
                            
                            <div class="w3_agileits_main_grid w3l_main_grid">
                                <span class="agileits_grid">
                                    <label>Email </label>
                                    <input type="email" name="email" id="email" value="<?php echo $user['email']?> " onchange="emailValidate(document.getElementById('email'))">
                                </span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
                                <span class="agileits_grid">
                                    <label>Contact Number </label>
                                    <input type="text" name="hp" id="hp" minlength="9" maxlength="11" value="<?php echo $user['hp']?>" onchange="isNumeric(document.getElementById('hp'))" >
                                </span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
                                <span class="agileits_grid">
                                    <label>Address </label>
                                    <input type="text" name="address" id="address" value="<?php echo $user['address']?>" style="text-transform:uppercase" onchange="isAlphanumeric(document.getElementById('address'))">
                                </span>
                            </div>

                            <div class="w3_main_grid">
                                <div class="w3_main_grid_right">
                                    <input type="submit" value="Save Changes" >
                                    </form>
                                    
                                </div>
                             </div>
                          
               
                <div class="w3_main_grid">
                    <div class="w3_main_grid_right">  
                <button style="height:40px;width:170px;background-color:pink;font-size:13px;" data-toggle="modal" data-target="#changepassword">CHANGE PASSWORD</button>
                </div>
            </div>

        </div>
<div id="changepassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:whitesmoke">
            <div class="modal-header" style="background-color:lightgrey">
                <h4 class="modal-title" id="myModalLabel">Change password</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
            </div>
            <div class="modal-body">  
                <form id="formchangepassword" action="updatePassword.php?acid_id=$_SESSION['userid']" method="POST">

                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter Old Password" required >                    
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter New Password" required>    
                    <label for="cnewpassword">Confirm New Password</label>
                    <input type="password" class="form-control" name="cnewpassword" id="cnewpassword" placeholder="Enter Confirmed Password" required>    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" form="formchangepassword" class="btn btn-primary">Save </button>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
            <!-- //footer -->
            <div class="w3layouts_copy_right">
                <div class="container">
                    <p>© 2018 User Profile. All rights reserved | Design by FantasticCinq.</a>
                    </p>
                </div>
            </div>
    </body>

    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script> -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
    <!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui. min.js'></script> -->


<script type='text/javascript'>

    $(document).ready(function(){
      var role = "<?php echo $_SESSION['userrole']; ?>";
      if(role == "Lecturer"){
        $("a.exam").show();
        $("a.lec").show();
        $("a.stu").hide();
        $("a.newapp").hide();       
      }
      else{
        $("a.exam").hide();
        $("a.lec").hide();
        $("a.stu").show();
        $("a.newapp").show();  
      }
    });

 function isAlphabet(elem)
{
   var alphaExp = /^[a-zA-Z ]+$/;
   if(elem.value.match(alphaExp))
   {
       return true;

   }
   else
   {  alert("Please Enter Only Alphabets For Your Name");
      elem.focus();
	  return false;
   }
 }
    function emailValidate(elem)
	{
        var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9.]{2,4}$/;

		if(elem.value.match(emailExp))
		{
			return true;
		}else
		{
			alert("Invalid Email Entered. Please Enter A Valid Email.");
			elem.focus();
			return false;
		}
	}


 function isAlphanumeric(elem){
	var alphaNum = /^[a-zA-Z0-9, ]+$/;
    var invalid1=/^[0-9]+$/;
    var invalid2=/^[,]+$/;
    var invalid3=/^\,[a-zA-Z]+$/;
    var invalid4=/^\,[0-9]+$/;
	if(elem.value.match(alphaNum)){
        if(elem.value.match(invalid1)||elem.value.match(invalid2)||elem.value.match(invalid3)||elem.value.match(invalid4)){
        alert("Invalid Address Entered. Please Enter A Valid Address.");
		elem.focus();
		return false;}

        else{
        return true;
        }
	}else{
		alert("Invalid Address Entered. Please Enter A Valid Address.");
		elem.focus();
		return false;
	}
}

function isNumeric(elem){
	var numericExpression = /^[0-9]{9,11}+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert("Invalid Contact Number. Only 9-11 Digits Are Accepted.");
		elem.focus();
		return false;
	}
}
function isMatch(elem,elem2){
	
	if(elem.value.match(elem2.value)){
		return true;
	}else{
		alert("Confirm Password Does Not Match With Password. Please Try Again");
		elem2.focus();
		return false;
	}
}

   
</script>
</html>