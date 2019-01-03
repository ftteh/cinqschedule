<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">

<head>
    <title>View Subject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html">
    <link href="css/style(l_viewApp).css" rel="stylesheet" type="text/css" media="all" />

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

<body id="page-top" >
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
            <h1 class="w3layouts_head" style="font-family:Nunito;">Subject List</h1>
            <div class="wrapper">
                <div class="container" style="background-color:rgba(249, 231, 255, 0.75)">
                    <div class="row">
                    <div class="col-md-12 table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <th>#</th>
                                    <th>SUBJECT CODE</th>
                                    <th>SUBJECT NAME</th>
                                    <th>EDIT</th>
									<th>DELETE</th>
                                    												 
                                </thead>
                  
                                <tbody>
                                <?php
                                    require_once ("config.php"); //this is how you call the library file
                                    $sql = "select * from subject";
                                    $result = $conn->query($sql);
                                    $num=1;
                                    if (!$result)  die("Connection failed: " . $conn->connect_error);
                                    while ($record = mysqli_fetch_array($result))
                                    {
                                        $a = array(
                                                'id'=> $record["subcode"] ,
                                                'sn'=> $record["subname"] ,
                                                'subcode' => $record["subcode"] ,
                                                'subname' => $record["subname"] ,
                                                );
                                        $json = json_encode($a);
                                       
                                        echo "<TR>\n";
                                        echo "<TD align=left>",$num,"</TD>", 
                                             "<TD align=left>",$record["subcode"], "</TD>",
                                             "<TD>",$record["subname"], "</TD>", 
                                             "<TD>",'<p data-placement="top" data-toggle="tooltip" title="Edit"> 
                                             <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#abc" onclick=\'edit_form('.$json.')\'>
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
               
                <div class="modal fade" id="abc" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" >
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <div class="modal-header" >
                                <h4 class="modal-title custom_align" id="Heading">Update Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body w3layouts_main_grid">
                            <form  action="usubject.php" id="form" method="post" name="form">
                            <div class="w3_agileits_main_grid w3l_main_grid">
						     <span class="agileits_grid">
                             <label>SUBJECT CODE  </label>
                              <input type="text" name="subcode" id="subcode" placeholder="SCSJ3104-02" onchange="subcodeValidate(document.getElementById('subcode'))" style="text-transform:uppercase" required="" >
	    			         </span>
		    		        </div>
                                
            		     <div class="w3_agileits_main_grid w3l_main_grid">
						    <span class="agileits_grid">
						    <label>Subject Name </label>
						    <input type="text" name="subname" id="subname" placeholder="APPLICATION DEVELOPMENT" onchange="isAlphabet(document.getElementById('subname'))" style="text-transform:uppercase" required="" >
					    	</span>
					    </div>
                         <div>
                            <input type='text' name='id' id='id' hidden >
                            <input type='text' name='sn' id='sn' hidden >
                        </div>
                        <div class="modal-footer ">
                             <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><i class="fas fa-check"></i> Update</button>
                      </div>
                            </form>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                   

                
                
                <div class="w3layouts_copy_right">
                    <div class="container">
                        <p>© 2018 Subject Schedule Details. All rights reserved | Design by FantasticCinq.</a></p>
                    </div>
                </div>
            </div>
        
        <!-- //footer -->
</body>           
<script>
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

 function edit_form(a) {
    document.getElementById('abc').style.display = "block";
    document.getElementById("subcode").value = a.subcode;
    document.getElementById("subname").value = a.subname;
    document.getElementById("id").value = a.subcode;
    document.getElementById("sn").value = a.subname;
 }
 
function div_hide(){
    document.getElementById('abc').style.display = "none";
}

	function delete_show(a)
{
	var con=confirm("Are you sure to delete this subject ? \n     Subject Code: "+ a.subcode+" \n     Subject Name: " + a.subname);
    if (con)
    {        
        window.location.href="a_deleteSubject.php?subcode="+a.subcode;
    }
    else
    {
        alert("Delete Cancelled!");
    }
}
function subcodeValidate(elem)
	{
		var subcode = /^[a-zA-Z]{4}[0-9]{4}[-][0-9]{2}$/;

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