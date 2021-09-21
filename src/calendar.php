<?php
    session_start();
    include('verifica_login.php');
    include('navBar.php');
    // bug: Por algum motivo não estamos conseguindo sair na tela de calendário
?>


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../public/third/fullcalendar/lib/main.css' rel='stylesheet' />
<script src='https://github.com/mozilla-comm/ical.js/releases/download/v1.4.0/ical.js'></script>
<script src='../public/third/fullcalendar/lib/main.js'></script>
<!-- <script src='../packages/icalendar/main.global.js'></script> -->
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd ;


    var calendar = new FullCalendar.Calendar(calendarEl, {
      displayEventTime: false,
      initialDate: today,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
      events: {
        url: 'ics/feed.ics',
        format: 'ics',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block';
        }
      },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
</head>
<body>

  <div id='script-warning'>
    <code>ics/feed.ics</code> must be servable
  </div>

  <div id='loading'>loading...</div>

  <div id='calendar'></div>

</body>
</html>



