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
    <title>View Exam</title>
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

<body id="page-top" onload="showExam()">
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

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="js/grayscale.min.js"></script>
    <!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->

    <!-- banner -->
    <div class="center-container">
        <div class="main">
            <h1 class="w3layouts_head" style="font-family:Nunito;">View Exam</h1>


            <div class="wrapper">
                <div class="container"  style="background-color:rgba(249, 231, 255, 0.75)">

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Venue</th>
                                        <th>Remarks</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title custom_align" id="Heading">Edit Exam Detail</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body w3layouts_main_grid">
                                <form action="uexam.php" method="post" class="w3_form_post">
                                    <div class="w3_agileits_main_grid w3l_main_grid">
                                        <span class="agileits_grid">
                                            <label>Subject Code </label>
                                            <input type="text" name="subcode" id="subcode" disabled>
                                        </span>
                                    </div>
                                    <div class="w3_agileits_main_grid w3l_main_grid">
                                        <span class="agileits_grid">
                                            <label>Subject Name </label>
                                            <input type="text" name="subname" id="subname" disabled>
                                        </span>
                                    </div>
                                    <div class="agileits_w3layouts_main_grid w3ls_main_grid">
                                        <span class="agileinfo_grid">
                                            <label>Date </label>
                                            <div class="agileits_w3layouts_main_gridl">
                                                <input class="date" id="datepicker" name="date" type="text" value="yy-mm-dd" onfocus="this.value = '';"
                                                onblur="if (this.value == '') {this.value = '';}" required=""></div>
                                            <div class="clear"> </div>

                                        </span>
                                    </div>
                                    <div class="agileits_w3layouts_main_grid w3ls_main_grid">
                                        <span class="agileinfo_grid">
                                            <label>Time (From / To) </label>
                                            <div class="agileits_w3layouts_main_gridr" style="float:left;">
                                                <input type="time" name="timestart" id="timestart" placeholder=" " required="">
                                            </div>
                                            <div class="agileits_w3layouts_main_gridr" style="float:left;">
                                                <input type="time" name="timeend" id="timeend" placeholder=" " required="">
                                            </div>
                                            <div class="clear"> </div>
                                        </span>
                                    </div>
                                    <div class="w3_agileits_main_grid w3l_main_grid">
                                        <span class="agileits_grid">
                                            <label>Venue </label>
                                            <input type="text" id="venue" name="venue" placeholder="Venue" required="" style="text-transform: capitalize;">
                                        </span>
                                    </div>
                                    <div class="w3_agileits_main_grid w3l_main_grid">
                                        <span class="agileits_grid">
                                            <label>Remark (Optional)</label>
                                            <input type="text" id="remark" name="remark" placeholder="Ex: scope" style="text-transform: capitalize;">
                                            <input type="hidden" value="" id="eventid" name="eventid">
                                        </span>
                                    </div>
				                
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



                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title custom_align" id="Heading">Delete Examination</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i>
                                    Are you sure you want to delete this Record?</div>

                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-success" id="yes" data-dismiss="modal"><i class="fas fa-check"></i> Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="w3layouts_copy_right">
                    <div class="container">
                        <p>© 2018 Exam Details. All rights reserved | Design by FantasticCinq.</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //footer -->
<script>$(document).ready(function(){       var role = "<?php echo $_SESSION['userrole']; ?>";       if(role == "Lecturer"){         $("a.exam").show();         $("a.lec").show();         $("a.stu").hide();         $("a.newapp").hide();              }       else{         $("a.exam").hide();         $("a.lec").hide();         $("a.stu").show();         $("a.newapp").show();         }     });</script></body>
<!-- Calendar -->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>

<script type="text/javascript">
    $(function () {
        $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
        $("#datepicker").on('change', function () {
            var selectedDate = $(this).val();
            var todaysDate = $.datepicker.formatDate('yy-mm-dd', new Date());
            if (selectedDate < todaysDate) {
                alert('Selected date must be greater than today date');
                $(this).val('');
            }
        });
        $("#end").on('change', function () {
            if ($("#end").val() < $("#start").val()) {
                alert('End time must be greater than start time');
                $("#start").val('');
                $("#end").val('');
            }
        });
    });
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

    function showExam(){
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "gexam.php", false);
      xhttp.send();
      obj = JSON.parse(xhttp.responseText);
      var table = $('#datatable').DataTable();
      for (x in obj) {
        table.row.add( [
            obj[x].title,
            obj[x].subname,
            obj[x].date,
            obj[x].stime,
            obj[x].etime,
            obj[x].venue,
            obj[x].remark,
            '<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="updateExam('+ obj[x].event_id +')"><i class="fas fa-pencil-alt"></i></button>',
            '<td><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"  onclick="deleteExam('+ obj[x].event_id +')"><i class="far fa-trash-alt"></i></button></p></td>'
         ] ).draw(false);
      }
    }

    function updateExam(e){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "guexam.php?event_id=" + e , false);
        xhttp.send();
        obj = JSON.parse(xhttp.responseText);
        console.log(obj);
        document.getElementById("venue").value = obj.venue;
        document.getElementById("remark").value = obj.remark;
        document.getElementById("timeend").value = obj.etime;
        document.getElementById("timestart").value = obj.stime;
        document.getElementById("datepicker").value = obj.date;
        document.getElementById("eventid").value = obj.event_id;
        document.getElementById("subcode").value = obj.subcode;
        document.getElementById("subname").value = obj.subname;
    }

    function deleteExam(e){
        if($("#yes").click(function(){
            temp = {
                eventid: e,
            }
            url = "dexam.php"
            console.log(temp, url)
            fetch(url, {
                method: 'post',
                headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                },
                mode: 'no-cors',
                body: "obj=" + JSON.stringify(temp)
            })
            .then(function (json) {
                console.log(json)
                })
            .then(function (data) {
                console.log('delete class,exam', data);
                document.location.reload();
                })
            .catch(function (error) {
                console.log('delete failed', error);
            })
        }));
    }
</script>

</html>