<!DOCTYPE html> <?php session_start();
// $_SESSION['Login'] = "YES";
// $_SESSION['userid'] = "Adam";
if ($_SESSION["Login"] != "YES") {echo "<script type='text/javascript'>                 alert('You are NOT correctly logged in, please try again');
window.location.href='loginPage.html';             </script>";}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/fullcalendar.min.css" rel="stylesheet">
  <link href="css/fullcalendar.print.min.css" rel="stylesheet" media="print">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/fullcalendar.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.ui.touch-punch.min.js"></script>
  <script src='js/gcal.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
    body {
      margin-top: 40px;
      text-align: center;
      font-size: 14px;
      font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    }

    #sidebar-wrapper h5 {
      font-size: 16px;
      margin-top: 0;
      padding-top: 1em;
    }

    #sidebar-wrapper .fc-event {
      margin: 10px 0;
      cursor: pointer;
    }

    #sidebar-wrapper p {
      margin: 1.5em 0;
      font-size: 11px;
      color: #666;
    }

    #sidebar-wrapper p input {
      margin: 0;
      vertical-align: middle;
    }

    /* button style */
    .fc-button{
    	color:#fff;
    	background:#cd31c1;
    	border:none;
    	cursor:pointer;
    }
    .fc-button:hover{
    	background:#df49d3;
    }
  </style>
  <script>

    saveDB = function (e) {
      temp = {
        _id: e._id,
        title: e.title,
        start: e.start,
        day: e.day,
        end: e.end,
        dow: e.dow,
        subcode: e.subcode
      }
      if (temp._id == "sec") { url = "http://localhost/iclass.php" }
      else if (temp._id == "event") { url = "http://localhost/ievent.php" }
      console.log(temp, url)
      fetch(url, {
        method: 'post',
        headers: {
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        mode: 'no-cors',
        body: "obj=" + JSON.stringify(temp)+"&userid=<?php echo $_SESSION['userid']; ?>"
      })
        .then(function (json) {
          console.log(json)
        })
        .then(function (data) {
          console.log('Save DB', data);
        })
        .catch(function (error) {
          console.log('Save failed', error);
        });
    }


    delDB = function (e) {
      temp = {
        _id: e._id,
        title: e.title,
        start: e.start,
        day: e.day,
        end: e.end,
        dow: e.dow
      }
      if (temp._id == "sec") {
        url = "http://localhost/dclass.php"
      }
      if (temp._id == "event") {
        url = "http://localhost/devent.php"
      }
      console.log(temp, url)
      fetch(url, {
        method: 'post',
        headers: {
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        mode: 'no-cors',
        body: "obj=" + JSON.stringify(temp)+"&userid=<?php echo $_SESSION['userid']; ?>"
      })
        .then(function (json) {
          console.log(json)
        })
        .then(function (data) {
          console.log('delete class,timetable', data);
        })
        .catch(function (error) {
          console.log('delete failed', error);
        });
    }

    upDB = function (e) {
      temp = {
        _id: e._id,
        title: e.title,
        start: e.start,
        day: e.day,
        end: e.end,
        old: e.old
      }
      url = "http://localhost/uevent.php"
      console.log(temp, url)
      fetch(url, {
        method: 'post',
        headers: {
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        mode: 'no-cors',
        body: "obj=" + JSON.stringify(temp)+"&userid=<?php echo $_SESSION['userid']; ?>"
      })
        .then(function (json) {
          console.log(json)
        })
        .then(function (data) {
          console.log('delete class,timetable', data);
        })
        .catch(function (error) {
          console.log('delete failed', error);
        });
    }

     upTime = function (e) {
      temp = {
        _id: e._id,
        title: e.title,
        start: e.start,
        day: e.day,
        end: e.end,
        old:""
      }
      url = "http://localhost/uevent.php"
      fetch(url, {
        method: 'post',
        headers: {
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        mode: 'no-cors',
        body: "obj=" + JSON.stringify(temp)+"&userid=<?php echo $_SESSION['userid']; ?>"
      })
        .then(function (json) {
          console.log(json)
        })
        .then(function (data) {
          console.log('update event time', data);
        })
        .catch(function (error) {
          console.log('update event time failed', error);
        });
    }

    getOptions = function () {
      var xhttp = new XMLHttpRequest();
      xhttp.responseType = 'json';
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          this.response.forEach(e => {
            $('<div class="fc-event ui-draggable ui-draggable-handle">' + e.title +' '+e.subcode+' <br>'+e.lectname+' bk5'+ '</div>').insertBefore($('#sidebar-wrapper p'))
          })
          sList = this.response;
          i = 0;

          // The drop events initialize
          $('#sidebar-wrapper .fc-event').each(function () {
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
              title: $(this).text().split(' ')[0], // use the element's text as the event title
              subcode: $(this).text().split(' ')[1], // use the element's text as the event title
              color: "purple",
              stick: true, // maintain when user navigates (see docs on the renderEvent method)
              editable: false,
              _id: "sec",
              dow: sList[i++].dow
            });
            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 999,
              revert: true,      // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });

        }
      };
      xhttp.open("GET", "http://localhost/getoptions.php", true);
      xhttp.send();
    }

    function getClass() {
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "http://localhost/gclass.php?userid=<?php echo $_SESSION['userid']; ?>", false);
      xhttp.send();
      obj = JSON.parse(xhttp.responseText);
      return obj
    }
    function getEvent() {
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "http://localhost/gevent.php?userid=<?php echo $_SESSION['userid']; ?>&role=<?php echo $_SESSION['userrole']; ?>", false);
      xhttp.send();
      obj = JSON.parse(xhttp.responseText);
      return obj
    }




    $(document).ready(function () {

      getOptions();


      $('#calendar').fullCalendar({
        // makes day selectable
        selectable: true,

        dayClick: function (date, jsEvent, view, resource) {

          newName = prompt("Enter the event name");
          if (newName !== "" && newName !== null) {
            $('#calendar').fullCalendar('renderEvent', {
              title: newName,
              start: date,
              _id: "event"
              //need to more specific the time
            }
            );
            saveDB({
              _id: "event",
              title: newName,
              start: date
            })

            location.reload();
          }
          else {
            alert("Enter something!!!")
          }
        },

        // when the event clicked do something
        eventClick: function (eventObj) {
          if (eventObj.url) {
            window.open(eventObj.url);
            return false; // prevents browser from following link in current tab.
          } else {
            $('#updateEvent').modal("show");
            $('#deleteEvent').click(function () {
              $('#calendar').fullCalendar('removeEvents', function (ev) {


                if (ev.subcode == eventObj.subcode  && ev._id=="sec") {
                  console.log(ev);
                  delDB(ev)
                  location.reload();
                  return true;
                }
                else if(ev.title==eventObj.title && ev._id=="event"){
                  console.log('else',ev)
                  delDB(ev)
                  location.reload();
                  return true;
                }
         

              })
              $('#updateEvent').modal("hide");
            })


            $('#updateName').click(function () {
              newName = $('input.form-control').val();
              if (newName != "") {
                eventObj.old = eventObj.title;
                eventObj.title = newName;
                eventObj._id = "event";
                $('#calendar').fullCalendar('updateEvent', eventObj);
                upDB(eventObj)
                $('#updateEvent').modal("hide");
              }
              else {
                alert("Enter something!!!")
              }

            })
          }
        },
        eventStartEditable: true,
        defaultView: 'agendaWeek',
        eventReceive: function (event, delta, revertFunc) {


          if (event._id == "sec") {   //update time for sec
            for (let index = 0; index < sList.length; index++) {
              if (event.subcode == sList[index].subcode) {
                v = sList[index].start
                w = sList[index].end
                n = moment((new Date().toISOString().slice(0, 10)) + "T" + v);
                n.day(sList[index].day)
                event.start = n;              //change the parent to correct time** the updater
                storeObj = event;
                break;
              }
            }
            $('#calendar').fullCalendar('updateEvent', event);
            storeObj.start = v;
            storeObj.end = w;

          }
          saveDB(storeObj)

        },

        customButtons: {      /*FOR THE DRAG N DROP*/
          butt1: {
            text: 'Courses',
            click: function () {
              $("#wrapper").toggleClass("toggled");

            }
          }
        },

        height: parent,
        header: {
          left: 'butt1,prev,next,today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function () {
          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
          }
        },


        eventResizeStop: function (event, jsEvent, ui, view) {
          setTimeout(function () {
            jQuery.each($('div.fc-time '), function (index, item) {
              if ($(item).next().text() == event.title) {
                et = ($(item).attr("data-full"))
                et = et.split(' - ')[1]
                dump = event.start
                event.end = moment()
                et = moment(et, "h:mm A").format("hh:mm")
                d = event.start.format("YYYY-MM-DD")
                event.end = d + "T" + et + ":00"
                console.log(event.end)

                upTime(event)
              }
            })
          }, 0)
        },


        /* google cal--------------------------*/
        googleCalendarApiKey: 'AIzaSyB1SwK9xu6ZR8lo9L5JIyZiYWijz53f9JQ',
        eventSources: [

          { googleCalendarId: 'en.malaysia#holiday@group.v.calendar.google.com' }, {

            events: getClass()

          }
          ,
          { events: getEvent() }

        ],

      });

    });

  </script>

</head>

<body>
  <div id="wrapper">

    <div id="sidebar-wrapper" class="center-block">
      <h5>Courses</h5>
      <p>
        <input type="checkbox" id="drop-remove">
        <label for="drop-remove">remove dropped</label>
      </p>
    </div>



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

    <div id="calendar" onchange="x()">
    </div>

    <!-- update modal -->
    <div class="modal fade" id="updateEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">New name: </span>
              </div>
              <input type="text" name="newName" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              <button type="button" class="btn btn-primary" id="updateName">Update</button>
              <button type="button" class="btn btn-primary" style="margin-left: 3px" id="deleteEvent">Delete</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<script>$(document).ready(function(){       var role = "<?php echo $_SESSION['userrole']; ?>";       if(role == "Lecturer"){         $("a.exam").show();         $("a.lec").show();         $("a.stu").hide();         $("a.newapp").hide();              }       else{         $("a.exam").hide();         $("a.lec").hide();         $("a.stu").show();         $("a.newapp").show();         }     });</script></body>

</html>