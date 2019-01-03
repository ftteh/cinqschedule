<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">

<head>
    <title>View User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html">
    <link href="css/style(l_viewApp).css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/pop.css" rel="stylesheet">
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    

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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/grayscale.min.js"></script>

    <!-- banner -->
    <div class="center-container">
        <div class="main">
            <br>
            <h1 class="w3layouts_head" style="font-family:Nunito;">User List</h1>
            <div class="wrapper">
                <div class="container" style="background-color:rgba(249, 231, 255, 0.75)">
                    <div class="row">
                        
                        <div class="col-md-12 table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <th>#</th>
                                    <th>ACID ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th></th>
                                    <!--more info for privacy-->
                                    <th>ROLE</th>
                                    <th>Edit</th>
                                    <th>Delete</th>                                   
                                </thead>
                  
                                <tbody>
                                    <?php
                                    require_once ("config.php"); //this is how you call the library file
                                    $sql = "select * from user";
                                    $result = $conn->query($sql);
                                    $num=1;
                                    if (!$result)  die("Connection failed: " . $conn->connect_error);
                                    while ($record = mysqli_fetch_array($result))
                                    {
                                       $p= 'data:image/png;base64,'.base64_encode( $record['photo']);
                                      
                                        $a = array(
                                                'acid_id' => $record["acid_id"] ,
                                                'name' => $record["name"] ,
                                                'email' => $record["email"] ,
                                                'password' => $record["password"] ,
                                                'role'=> $record["role"],
                                                'phone' => $record["hp"],
                                                'address' => $record["address"],
                                                'id' => $record["acid_id"],
                                                'photo' => $p
                                            );
                                        $json = json_encode($a);
    
                                        echo "<TR>\n";
                                        echo "<TD align=left>",$num,"</TD>", 
                                             "<TD align=left>",$record["acid_id"], "</TD>",
                                             "<TD>",$record["name"], "</TD>", 
                                             "<TD>",$record["email"], "</TD>", 
                                             "<TD>",'<button onclick=\'get_more('.$json.')\'>Get More</button>',"</TD>", 
                                             "<TD>",$record["role"], "</TD>",
                                             "<TD>",'<p data-placement="top" data-toggle="tooltip" title="Edit"> 
                                             <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick=\'div_show('.$json.')\'>
                                             <i class="fas fa-pencil-alt"></i></button></p>
                                             </p>',"</TD>", 
                                             "<TD>",'<p data-placement="top" data-toggle="tooltip" title="Delete"> 
                                             <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick=\'delete_show('.$json.')\'>
                                             <i class="far fa-trash-alt"></i></button></p>
                                             </p>' , "</TD>\n";
                                        echo "</TR>\n";
    
                                        $num++;
                                    }
                                    ?>
                                    
                                    <br>
                                </tbody>
                                
                            </table>
                            
                        </div>
                    </div>
                </div>
                <div id="abc">
                    <!-- Popup Div Starts Here -->
                    <div id="popupUpdate">
                    <!-- Update Form -->
                        <form action="a_editUser.php" id="form" method="post" name="form" onsubmit="return acidValidator(document.getElementById('acidID'), 'Not a Valid ACID ID')">
                        <div class="modal-header">
                                <h4 class="modal-title custom_align" id="Heading">Update User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick ="div_hide()">×</button>
                            </div>
                            
                            <label>ACID ID &nbsp;&nbsp;&nbsp;</label> 
                            <input type="text" name="acidID" id="acidID" maxlength="9" required="" onchange="autopw()" style="text-transform:uppercase">
                            <br>
                            <label>Full Name  </label>
                            <input type="text" name="username" id="name" required="" style="text-transform:uppercase">
                            <br>
                            <label>Password&nbsp;</label>
                            <input type="text" name="password" id="password" readonly>
                            <br>
                            <label>UTM Mail&nbsp;</label>
                            <input type="email" name="email" id="email" readonly>
                            <br><br>
                           <label>User role&nbsp;&nbsp;</label>
                            <input type="radio" id="student" name="role" value="Student">                            
                            <label for="student">Student </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="lecturer" name="role" value="Lecturer">
                            <label for="lecturer">Lecturer</label>    
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="admin" name="role" value="Admin">
                            <label for="admin">Admin</label>    
                                                        
                            <input type='text' name='id' id='id' hidden >
                            <br><br>
                            <input type="Submit" id="submit" value="Update">
                        </form>
                    </div>
                    <!-- Popup Div Ends Here -->
                </div>
                        
                        
                <div id="getMore" >
                    <div id="popupUpdate">
                            <form id="form" class="formtab">
                            <div class="modal-header">
                                <h4 class="modal-title custom_align" id="Heading">More Infromation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick ="close_more()">×</button>
                            </div>
                            <br>
                            <img id="pt" src=""/>
                            <br>
                            <label>ACID ID &nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            <input type="text" id="ai"  readonly>
                            <br>
                            <label>Full Name&nbsp;</label>
                            <input type="text" id="na" readonly>
                            <br>
                            <label>Password &nbsp;</label>
                            <input type="text" id="pa" readonly>
                            <br>
                            <label>Phone No &nbsp;</label>
                            <input type="text" id="ph" readonly>
                            <br>
                            <label>UTM Mail&nbsp;&nbsp;</label>
                            <input type="email" id="em" readonly>  
                            <br>
                            <label>Address &nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="ad" readonly>
                            <br>
                            <label>Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="ro" readonly>
                            <br><br>
                            <div class="modal-footer">
                                <button type="button" class="btn cancel" onclick="close_more()">Close</button>
                            </div>
                            </form>
                            
                    </div>
                </div>
            
                        
                        
                <div class="w3layouts_copy_right">
                    <div class="container">
                        <p>© 2018 User Details. All rights reserved | Design by FantasticCinq.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- //footer -->
</body>
            
            <script>
//Function To Display Popup
function div_show(a) {
    document.getElementById('abc').style.display = "block";
    document.getElementById("acidID").value = a.acid_id;
    document.getElementById("name").value = a.name;
    document.getElementById("email").value = a.email;
    document.getElementById("password").value = a.password;
    if(a.role=="Student"){
        $("#student").prop("checked", true); 
    }
    else if(a.role=="Lecturer"){    
        $("#lecturer").prop("checked", true);
    }
    else{    
        $("#admin").prop("checked", true);
    }
    document.getElementById("id").value = a.acid_id;

}

//Function to Hide Popup
function div_hide(){
    document.getElementById('abc').style.display = "none";
}

//function auto pw and mail
function autopw() {
					var acid = $('#acidID').val();
					var pw = 'UTM'+ acid;
					var mail='UTM'+ acid+'@live.utm.com';
					$("[name='password']").val(pw);
					$("[name='email']").val(mail);
		}

//funtion to delete
function delete_show(a)
{
	var con=confirm("Are you sure to delete this user? \n     Acid ID: "+ a.acid_id+" \n     Full Name: " + a.name);
    if (con)
    {        
        window.location.href="a_deleteUser.php?delID=" + a.acid_id;
    }
    else
    {
        alert("Delete Cancelled!");
    }
}

function get_more(a)
{
    document.getElementById('getMore').style.display = "block";
    document.getElementById("ai").value = a.acid_id;
    document.getElementById("na").value = a.name;
    document.getElementById("em").value = a.email;
    document.getElementById("pa").value = a.password;    
    document.getElementById("ph").value = a.phone;
    document.getElementById("ad").value = a.address;
    document.getElementById("ro").value = a.role;
    document.getElementById("id").value = a.acid_id;
    $("#pt").attr("src",a.photo);
    console.log(a.photo);
}

function close_more() {
    document.getElementById('getMore').style.display = "none";
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
        $('#datatable').dataTable();

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