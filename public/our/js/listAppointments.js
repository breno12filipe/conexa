$(document).ready( function () {
    //$('#table_test').DataTable();
    //$("#table_breno").find('tbody').append('<td>Teste1</td>').append('<td>Teste2</td>').append('<td>Teste3</td>')
    renderListAppointments()
} );

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
            item['Appointment_ID'];
            item['Appointment_Description'];
            item['title'] = item['Title']
            item['end'] = item['Due_date']
            item['start'] = item['Start_date']
            // delete item['Due_date'];
            // delete item['Start_date'];
            // delete item['Title'];
            // item['end'] = formatDate(item["end"].split("-"));
            // item["start"] = formatDate(item["start"].split("-"));
          })
          filteredObj = data;
      }
    })
    
    return filteredObj
}


function enableDisableSettings(){
    if ($("#appointment-title").attr("disabled")){
        $("#appointment-title").removeAttr("disabled");
        $("#appointment-description").removeAttr("disabled");
        $("#appointment-start-date").removeAttr("disabled");
        $("#appointment-due-date").removeAttr("disabled");
        $("#save-settings").css("display", "block");
    }else{
        $("#appointment-title").attr("disabled", "disabled");
        $("#appointment-description").attr("disabled", "disabled");
        $("#appointment-start-date").attr("disabled", "disabled");
        $("#appointment-due-date").attr("disabled", "disabled");
        $("#save-settings").css("display", "none");
    }
}

function updateAppointment(form){
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        async: false,
        contentType: 'application/json',
        data: JSON.stringify({
            operation: 'updateAppointment',
            appointment_id: form[0].value,
            appointment_title: form[1].value,
            appointment_description: form[2].value,
            appointment_start_date: form[3].value,
            appointment_due_date: form[4].value


        }),
        success: function(data){
            alert(data);
            location.reload();
        }
    })
}

function editAppointment(appointment){
    //appointment = Array.from(appointment)
    appointment = appointment.split(","); 
    
      
    appointmentdDetailsTpl = `
    <div class="card" style="width: 400px;margin-left:45px;">
		<div class="row">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>

			<div class="col sm-10 float-right">
                <i class="fas fa-cog" style="cursor:pointer;" onclick="enableDisableSettings()"></i>
			</div>

		</div>
        <div class="card-body">
            <form id="edit-appointment-form" onsubmit="return false;">

                <input type="hidden" value="${appointment[0]}">

                <label for="subject">Titulo</label><br>
                <input disabled type="text" id="appointment-title" class="form-control" name="appointment-title" type="text" maxlength="23" value="${appointment[1]}"><br>

                <label>Descrição</label>
                <textarea disabled style="resize: none;" class="form-control" name="appointment-description" id="appointment-description" rows="3">${appointment[2]}</textarea>

                <label for="start-date">Data de início</label><br>
                <input disabled class="form-control" id="appointment-start-date" disabled name="appointment-start-date" value="${appointment[3]}" type="text"><br><br>

                <label for="due-date">Data de término</label><br>
                <input disabled class="form-control" id="appointment-due-date" disabled name="appointment-due-date" value="${appointment[4]}" type="text"><br><br>
                
                <center>
                    <button onclick="updateAppointment(this.form)" style="display:none;" id="save-settings" class="btn btn-success btn-lg">Salvar</button>
                </center>
            </form>
        </div>

    </div> 
    `
    
    $("#detail-appointment-content").empty();
    $("#detail-appointment-content").append(appointmentdDetailsTpl)

    $("#appointment-start-date").datepicker();
    $("#appointment-due-date").datepicker();
    // $("#modal-content").modal('teste') 

}

function deleteAppointment(appointmentID){
    if(confirm("Deseja realmente deletar o compromisso?")){
        $.ajax({
            url: '../controller/routes.php',
            type: 'POST',
            async: false,
            contentType: 'application/json',
            data: JSON.stringify({
            operation: 'deleteAppointment',
            appointment_id: appointmentID
            }),
            success: function(data){
                alert(data);
                location.reload();
            }
        })
    }
}


function renderListAppointments(){
    var listData = getAllAppointments();
    tableBody = $("#list-appointments-table").find('tbody');
    options = `
        <i style="color:orange;" class="fa fas-pencil"></i>
        <i style="color:red;" class="fa fas-trash"></i>
        
        `;

    listData.forEach(function(listItem){
        item = [];
        item.push(listItem['Appointment_ID'], listItem['title'], listItem['Appointment_Description'], listItem['start'], listItem['end'])


        $(tableBody)
            .append($('<tr>'))
                .append(`<td>${listItem["title"]}</td>`)
                    .append(`<td>${listItem["start"]}</td>`)
                        .append(`<td>${listItem["end"]}</td>`)
                            .append(`<td>
                                        <button data-toggle="modal" data-target="#detail-appointment" class="btn btn-warning" onclick="editAppointment('${item}')">Editar</button>
                                        &nbsp;
                                        <button class="btn btn-danger" onclick="deleteAppointment('${item[0]}')">Excluir</button>
                                    </td>`);
    })

    $('#list-appointments-table').DataTable();
}
