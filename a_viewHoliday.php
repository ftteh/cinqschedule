<!DOCTYPE html> <?php     session_start();      if ($_SESSION["Login"] != "YES") {         echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');                 window.location.href='loginPage.html';             </script>";     } ?>
<html lang="en">

<head>
    <title>View Holiday</title>
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
            <h1 class="w3layouts_head" style="font-family:Nunito;">Upcoming Holiday List</h1>
            <div class="wrapper">
                <div class="container"  style="background-color:rgba(249, 231, 255, 0.75)">
                    <div class="row">

                        <div class="col-md-12 table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Holiday ID </th>
                                    <th>Holiday Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th> 
                                </tr>                                  
                            </thead>

                                <tbody>
                                <?php
                                    require_once ("config.php"); //this is how you call the library file
                                    echo" ";
                                    $sql = "select * from event where category='Holiday' AND sdate>= CURRENT_DATE ";
                                    $result = $conn->query($sql);
                                    $num=1;
                                    if (!$result)  die("Connection failed: " . $conn->connect_error);
                                    while ($record = mysqli_fetch_array($result))
                                    {
                                        $a = array(
                                                'event_id' => $record["event_id"] ,
                                                'title' => $record["title"] ,
                                                'sdate' => $record["sdate"] ,
                                                'edate' => $record["edate"] ,
                                                'remark' => $record["remark"]  
                                            );
                                        $json = json_encode($a);
    
                                        echo "<TR>\n";
                                        echo "<TD align=left>",$num,"</TD>", 
                                             "<TD align=left> H",$record["event_id"], "</TD>",
                                             "<TD>",$record["title"], "</TD>", 
                                             "<TD>",$record["sdate"], "</TD>", 
                                             "<TD>",$record["edate"], "</TD>", 
                                             "<TD>",'<p data-placement="top" data-toggle="tooltip" title="Edit"> 
                                             <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick=\'edit_form('.$json.')\'>
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
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title custom_align" id="Heading">Update Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <br>
                            <div class="modal-body w3layouts_main_grid">
                            <form action="a_editHoliday.php" name="hform" method="post" class="w3_form_post" onsubmit="return checkdate()">
                            <div class="w3_agileits_main_grid w3l_main_grid">
						            <span class="agileits_grid">
			    			    	    <label>Holiday ID (H)</label>
    			    			    	<input type="text" id="event_id" name="event_id" readonly>
	    			    		    </span>
		    			        </div>
                                <div class="w3_agileits_main_grid w3l_main_grid">
						            <span class="agileits_grid">
			    			    	    <label>Reason </label>
    			    			    	<input type="text" id="title" name="title" required="">
	    			    		    </span>
		    			        </div>
					
            					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
	    	        				<span class="agileinfo_grid">
		    		        			<label>Start Date </label>
			    			        	<div class="agileits_w3layouts_main_gridl">
				    		    		    <input class="date" id="datepicker" name="start" type="text" onchange="dddd()" required="">
                                            <!-- onfocus="this.value = '';" -->
					    		                	 <!-- onblur="if (this.value == '') {this.value = '';}"  -->
    						        	</div>
	    						        <div class="clear"> </div>
		    				        </span>
			    		        </div>

            					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
		            				<span class="agileinfo_grid">
			    	        			<label>End Date </label>
				    		        	<div class="agileits_w3layouts_main_gridl">
					    			        <input class="date" id="datepicker2" name="end" type="text" onchange="dddd()" required="">
						            	</div>
							            <div class="clear"> </div>
						            </span>
    				        	</div>


            					<div class="w3_agileits_main_grid w3l_main_grid">
	    	        				<span class="agileits_grid">
		    		        			<label>Total Day(s)</label>
			    			        	<input type="text" name="remark" id="remark" readonly>
				            		</span>
					            </div>

                            </DIV>
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
                        <p>© 2018 Holiday Details. All rights reserved | Design by FantasticCinq.</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //footer -->
</body>
<!-- Calendar -->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>

<script type="text/javascript">
    
    $(function () {
    	$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
	});
    
    $(function () {
        $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val();
	});

	function dddd() {
	    var start = $('#datepicker').val();
		var end = $('#datepicker2').val();
		var a = moment(start);
		var b = moment(end);
		var diff = (b.diff(a, 'days') + 1);
		$("[name='remark']").val(diff);
	}

    $(document).ready(function () {
        $('#datatable').dataTable();

        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });
    });
    
//funtion to delete
function delete_show(a)
{
    var con=confirm("Are you sure to delete this holiday? \n     Holiday ID  :  H"+ a.event_id+" \n     Reason       :  " + a.title +" \n     Total Days  :  " + a.remark + "  day(s)");
    if (con)
    {        
        window.location.href="a_deleteHoliday.php?delID=" + a.event_id;
    }
    else
    {
        alert("Delete Cancelled!");
    }
}
    function edit_form(a){
        
        document.getElementById("title").value = a.title;
        document.getElementById("remark").value = a.remark;
        document.getElementById("datepicker").value = a.sdate;
        document.getElementById("datepicker2").value = a.edate;
        document.getElementById("event_id").value = a.event_id;
    }

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

    function append(dl, dtTxt, ddTxt) {
		var dt = document.createElement("dt");
		var dd = document.createElement("dd");
		dt.textContent = dtTxt;
		dd.textContent = ddTxt;
		dl.appendChild(dt);
		dl.appendChild(dd);
	}
</script>

</html>