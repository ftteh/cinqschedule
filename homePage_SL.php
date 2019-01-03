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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Cinq Scheduler</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">
  <link href="css/own.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body id="page-top" onload="showNote()">

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

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <a href="javascript:;" class="button" id="add_new">Add New Note</a>
      <div id="board"></div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; FantasticCinq 2018
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>
  <!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  <script>
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

        /* homePage Sticky Notes*/
    (function ($) {
        $.fn.autogrow = function (options) {
            return this.filter('textarea').each(function () {
                var self = this;
                var $self = $(self);
                var minHeight = $self.height();
                var noFlickerPad = $self.hasClass('autogrow-short') ? 0 : parseInt($self.css('lineHeight')) || 0;

                var shadow = $('<div></div>').css({
                    position: 'absolute',
                    top: -10000,
                    left: -10000,
                    width: $self.width(),
                    fontSize: $self.css('fontSize'),
                    fontFamily: $self.css('fontFamily'),
                    fontWeight: $self.css('fontWeight'),
                    lineHeight: $self.css('lineHeight'),
                    resize: 'none',
                    'word-wrap': 'break-word'
                }).appendTo(document.body);

                var update = function (event) {
                    var times = function (string, number) {
                        for (var i = 0, r = ''; i < number; i++) r += string;
                        return r;
                    };

                    var val = self.value.replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/&/g, '&amp;')
                        .replace(/\n$/, '<br/>&nbsp;')
                        .replace(/\n/g, '<br/>')
                        .replace(/ {2,}/g, function (space) { return times('&nbsp;', space.length - 1) + ' ' });

                    // Did enter get pressed?  Resize in this keydown event so that the flicker doesn't occur.
                    if (event && event.data && event.data.event === 'keydown' && event.keyCode === 13) {
                        val += '<br />';
                    }

                    shadow.css('width', $self.width());
                    shadow.html(val + (noFlickerPad === 0 ? '...' : '')); // Append '...' to resize pre-emptively.
                    $self.height(Math.max(shadow.height() + noFlickerPad, minHeight));
                }

                $self.change(update).keyup(update).keydown({ event: 'keydown' }, update);
                $(window).resize(update);

                update();
            });
        };
    })(jQuery);

    delDB = function () {
      temp = {
        noteID: document.getElementById("noteID").value,
      }
      url = "dnote.php"
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
          console.log('delete class,stickynote', data);
        })
        .catch(function (error) {
          console.log('delete failed', error);
        });
    }

    var noteTemp = '<div class="note">'
        + '<a href="javascript:;" class="button remove">X</a>'
        + '<div class="note_cnt">'
        + '<form action="inote.php" method="post">'
        + '<textarea class="title" name="title" id="title" placeholder="Enter note here"></textarea>'
        + '<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="userid">' 
        + '<button type="submit" class="btn btn-outline-success" ><i class="far fa-save"></i>   Save</button>'   
        + '</form>'
        + '</div> '
        + '</div>';

    var noteZindex = 1;
    function deleteNote() {
        $(this).parent('.note').hide("puff", { percent: 133 }, 250);
        delDB();
    };

    function newNote() {
        $(noteTemp).hide().appendTo("#board").show("fade", 300).draggable().on('dragstart',
            function () {
                $(this).zIndex(++noteZindex);
            });

        $('.button.remove').click(deleteNote);
        $('textarea').autogrow();

        $('.note')
        return false;
    };
    
    function showNote(){
      var xhttp = new XMLHttpRequest();
      var id = "<?php echo $_SESSION['userid']; ?>";
      xhttp.open("GET", "gnote.php?userid=" + id , false);
      xhttp.send();
      obj = JSON.parse(xhttp.responseText);
      for (x in obj) {
        $('<div class="note">'
        + '<a href="javascript:;" class="button remove">X</a>'
        + '<div class="note_cnt">'
        + '<form action="unote.php" method="post">'
        + '<textarea class="title" name="title" id="title">'+obj[x].text+'</textarea>'
        + '<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="userid">' 
        + '<input type="hidden" value="'+obj[x].noteID+'" id="noteID" name="noteID">'
        + '<button type="submit" class="btn btn-outline-dark"><i class="far fa-edit"></i>  Update</button>'
        + '</form>'
        + '</div> '
        + '</div>').hide().appendTo("#board").show("fade", 300).draggable().on('dragstart',
            function () {
                $(this).zIndex(++noteZindex);
            });

        $('.button.remove').click(deleteNote);
        $('textarea').autogrow();

        $('.note')
      }
    }

    $(document).ready(function () {

        $("#board").height($(document).height());

        $("#add_new").click(newNote);

        $('.button.remove').click(deleteNote);
        newNote();

        return false;
    });
  </script>
</body>

</html>