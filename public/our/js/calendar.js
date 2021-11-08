function formatDate(date){
  var aux = date[1];
  date[1] = date[2];
  date[2] = aux;
  return date.join('-');
}

function getAllAppointments(){

  var filteredObj;
  $.ajax({
    url: '../controller/routes.php',
    type: 'POST',
    async: false,
    contentType: 'application/json',
    data: JSON.stringify({
      operation: 'listAllAppointments'
    }),
    success: function(data){
        data = JSON.parse(data);

        data.forEach(function(item){
          delete item['Appointment_ID'];
          delete item['Appointment_Description'];
          item['title'] = item['Title'];
          item['end'] = item['Due_date'].split("/").reverse().join("-");
          item['start'] = item['Start_date'].split("/").reverse().join("-");
          delete item['Due_date'];
          delete item['Start_date'];
          delete item['Title'];
          item['end'] = formatDate(item["end"].split("-"));
          item["start"] = formatDate(item["start"].split("-"));
        })
        filteredObj = data;
    }
  })
  
  return filteredObj
}


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
      events: getAllAppointments(),
      loading: function(bool) {
        document.getElementById('loading').style.display = bool ? 'block' : 'none';
      }
    });

    calendar.render();
});
