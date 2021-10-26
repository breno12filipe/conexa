addAppointmentTpl = `
    <div class="card" style="width: 400px;margin-left:45px;">
        <div class="card-body">
            <form id="add-appointment-form" onsubmit="return false;">
                <label for="title">Título</label><br>
                <input type="text" id="subject" class="form-control" name="appointment-title" maxlength="23"><br>

                <label for="start-date">Data de início</label><br>
                <input id="start-date-appointment" name="Appointment-start-date"type="text"><br><br>

                <label for="due-date">Data de término</label><br>
                <input id="due-date-appointment" name="Appointment-due-date" type="text"><br><br>

                <label >Descrição</label>
                <textarea style="resize: none;" class="form-control" name="appointment-description" id="appointment-description" rows="3"></textarea>

                <br>
                <center>
                    <button onclick="addAppointment(this.form)" id="add-Appointment-btn" class="btn btn-success btn-lg">Salvar</button>
                </center>

            </form>
        </div>
    </div>
`


function loadAppontmentModal(){
    $("#add-appointment-content").empty();
    $("#add-appointment-content").append(addAppointmentTpl);

    $("#start-date-appointment").datepicker();
    $("#due-date-appointment").datepicker();
}

function addAppointment(form){
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            operation: 'addAppointment',
            title: form[0].value,
            start_date: form[1].value,
            due_date: form[2].value,
            description: form[3].value
        }),
        success: function(data){
            alert(data)
            $('#add-appointment-form')[0].reset();
            location.reload();
        }
    })
}