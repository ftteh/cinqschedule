<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">

<head>
    <title>View Subject Schedule</title>
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
            <h1 class="w3layouts_head" style="font-family:Nunito;">Subject Schedule List</h1>
            <div class="wrapper">
                <div class="container" style="background-color:rgba(249, 231, 255, 0.75)">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <th>#</th>
                                    <th>SUBJECT CODE</th>
                                    <th>SUBJECT NAME</th>
                                    <th>LECTURER ID</th>
									<th>LECTURER NAME</th>
									<th>DAY</th>
									<th>START TIME</th>
									<th>END TIME</th>
									<th>VENUE</th>
                                     <th>EDIT</th>
									<th>DELETE</th>													 
                                </thead>
                  
                                <tbody>
                                    <?php
                                    require_once ("config.php"); //this is how you call the library file
                                    $sql = "select * from schedule";
                                    $result = $conn->query($sql);
                                    $num=1;
                                    if (!$result)  die("Connection failed: " . $conn->connect_error);
                                    while ($record = mysqli_fetch_array($result))
                                    {
                                        $a = array(
                                                
                                                'subcode' => $record["subcode"] ,
                                                'subname' => $record["subname"] ,
												'lect_id' => $record["lect_id"],
                                                'lectname' => $record["lectname"],
												'day'=> $record["day"],
                                                'stime' => $record["stime"] ,
                                                'etime' => $record["etime"] ,                                           
                                                'venue' => $record["venue"]
                                                 
                                                );
                                        $json = json_encode($a);
                                        if($record["day"]=='0')
                                        {
                                            $record["day"]='SUNDAY';
                                        }
                                        if($record["day"]=='1')
                                        {
                                            $record["day"]='MONDAY';
                                        }
                                        if($record["day"]=='2')
                                        {
                                            $record["day"]='TUESDAY';
                                        }
                                        if($record["day"]=='3')
                                        {
                                            $record["day"]='WEDNESDAY';
                                        }
                                        if($record["day"]=='4')
                                        {
                                            $record["day"]='THURSDAY';
                                        }
                                       
                                       
                                        echo "<TR>\n";
                                        echo "<TD align=left>",$num,"</TD>", 
                                             "<TD align=left>",$record["subcode"], "</TD>",
                                             "<TD>",$record["subname"], "</TD>", 
                                             "<TD>",$record["lect_id"], "</TD>", 
                                             "<TD>",$record["lectname"], "</TD>",
											  "<TD>",$record["day"], "</TD>", 
                                             "<TD>",$record["stime"], "</TD>",
											 "<TD>",$record["etime"], "</TD>",
											 "<TD>",$record["venue"], "</TD>",
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
                            <br>
                            
                            <div class="modal-body w3layouts_main_grid">
                            <form  action="uschedule.php" id="form" method="post" name="form">
                          
                            <div class="w3_agileits_main_grid w3l_main_grid">
	    	        				<span class="agileits_grid">
                                    <label>SUBJECT CODE</label>
                                    <select required name="subcode" id="subcode" value="">
                                    <option value="" selected="" required=""disabled="">SELECT SUBCODE-SECTION</option>
                                    <?php 
									
									$sql1="SELECT subcode from subject";
									$result1 = $conn->query($sql1);
									$row1=mysqli_num_rows($result1);
									while($row1=mysqli_fetch_array($result1))
									{
										$upper=strtoupper($row1['subcode']);
										echo"<option value='".$upper."'>".$upper."</option>";
									}
									?>
								</select>
	    			    		    </span>
		    			        </div>
                                
                                <div class="w3_agileits_main_grid w3l_main_grid">
	    	        				<span class="agileits_grid">
                                    <label>LECTURER ID</label>
                                    <select required name="lect_id" id="lect_id">
                                    <option value="" selected="" required="" disabled="">SELECT LECTURER ID</option>
                                   <?php
									$sql2="SELECT acid_id from user WHERE role='Lecturer'";
									$result2= $conn->query($sql2);
									$row2=mysqli_num_rows($result2);
									while($row2=mysqli_fetch_array($result2))
									{
										$upper1=strtoupper($row2['acid_id']);
										echo"<option value='".$upper1."'>".$upper1."</option>";
									}
									?>
								</select>
		    				        </span>
			    		        </div>

            					<div class="w3_agileits_main_grid w3l_main_grid">
	    	        				<span class="agileits_grid">
                                    <label>DAY</label>
								<select style="height:40px;" id="day" name="day" required>
									<option value="" selected="" disabled="" placeholder=""></option>
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
                                            <input type="time" name="TimeStart" id="stime" placeholder=" " required="">
                                        </div>
                                        <div class="agileits_w3layouts_main_gridr" style="float:left;">
                                            <input type="time" name="TimeEnd" id="etime" placeholder=" " required="">
                                        </div>
                                        <div class="clear"> </div>
                                    </span>
                                </div>





                                <!-- // <div class="w3_agileits_main_grid w3l_main_grid">
	    	        			// 	<span class="agileits_grid">
                                // <label>TIME(FROM/TO)</label>
								// 	<input type="time" style="height:40px;"id="stime" name="TimeStart" placeholder=" " required="">
								// 	<input type="time" style="height:40px;" id="etime" name="TimeStart" placeholder=" " required="">
                                //     </span>
                                // </div> -->
                                <div class="w3_agileits_main_grid w3l_main_grid">
	    	        				<span class="agileits_grid">
                                    <label>VENUE</label>
									<select name="location" style="height:40px;" id="venue" required>
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
                              <div> <input type="text" name="dd" id="dd" hidden >
                                <input type="time" name="st" id="st" hidden >
                                <input type="time" name="et" id="et" hidden >
                                <input type="text" name="d" id="d" hidden >
                                </div>
                            <div class="modal-footer ">
                                <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><i class="fas fa-check"></i> Update</button>
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
    $(function () {
       
        $("#etime").on('change', function () {
            if ($("#etime").val() < $("#stime").val()) {
                alert('End time must be greater than start time');
                $("#stime").val('');
                $("#etime").val('');
            }
        });
    });

 function edit_form(a) {
    document.getElementById("abc").style.display = "block";
    document.getElementById("subcode").value = a.subcode;
    document.getElementById("lect_id").value = a.lect_id;
    if(a.day=="0")
                                        {
                                            document.getElementById("day").value ="Sun";
                                            document.getElementById("d").value ="0";
                                        }
                                        if(a.day=='1')
                                        {
                                            document.getElementById("day").value ="Mon";
                                            document.getElementById("d").value ="1";
                                        }
                                        if(a.day=='2')
                                        {
                                            document.getElementById("day").value ="Tues";
                                            document.getElementById("d").value ="2";
                                        }
                                        if(a.day=='3')
                                        {
                                            document.getElementById("day").value ="Wed";
                                            document.getElementById("d").value ="3";
                                        }
                                        if(a.day=='4')
                                        {
                                            document.getElementById("day").value ="Thurs";
                                            document.getElementById("d").value="4";
                                        }

     document.getElementById("stime").value = a.stime;
	 document.getElementById("etime").value = a.etime;
	document.getElementById("venue").value = a.venue;
    document.getElementById("dd").value = a.subcode;
    document.getElementById("st").value = a.stime;
    document.getElementById("et").value = a.etime;
 
}

//Function to Hide Popup
function div_hide(){
    document.getElementById('abc').style.display = "none";
}

	function delete_show(a)
{
	var con=confirm("Are you sure to delete this subject schedule? \n     Subject Code: "+ a.subcode+" \n     Subject Name: " + a.subname);
    if (con)
    {        
        window.location.href="a_deleteSchedule.php?subcode="+a.subcode+"&day="+a.day+"&TimeStart="+a.stime+"&TimeEnd="+a.etime;
    }
    else
    {
        alert("Delete Cancelled!");
    }
}

</script>

</html>