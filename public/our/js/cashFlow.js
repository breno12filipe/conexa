$(document).ready(function(){
    $("#cashFlowTable").DataTable();
})


addRecordTpl = `
    <div class="card" style="width: 400px;margin-left:45px;">
        <div class="card-body">

            <div class="row d-flex justify-content-center">
                <h3>Adicionar Registro</h3>
            </div>

            <form id="add-record-form" onsubmit="return false;">
                <label for="name">Nome</label><br>
                <input type="text" id="name" class="form-control" name="record-name" type="text" maxlength="23"><br>

                <label for="description">Descrição</label><br>
                <textarea class="form-control" name="description" style="resize:none"></textarea><br>

                <label for="value">Valor</label><br>
                <input class="form-control" type="text"><br>

                <center>
                    <button onclick="addRecord(this.form)" id="add-task-btn" class="btn btn-success btn-lg">Salvar</button>
                </center>
                
            </form>
        </div>
    </div> 
`

function loadCashFlowModalContent(){
    $("#add-record-content").empty();
    $("#add-record-content").append(addRecordTpl);
}

function getCurrentDate(){
    var date = new Date();
    var day = String(date.getDate()).padStart(2, '0');
    var month = String(date.getMonth() + 1).padStart(2, '0');
    var year = date.getFullYear();
    currentDate = day + '/' + month + '/' + year;

    return currentDate;
}

function addRecord(form){
    var recordName = form[0].value;
    var recordDescription = form[1].value;
    var recordValue = form[2].value;
    var recordDate = getCurrentDate();

    // TODO: do a request sending these data
    // $.ajax({
    //     url: '../controller/routes.php',
    //     type: 'POST',
    //     contentType: 'application/json',
    //     data: JSON.stringify({
    //         operation: 'addAppointment',
    //         title: form[0].value,
    //         start_date: form[1].value,
    //         due_date: form[2].value,
    //         description: form[3].value
    //     }),
    //     success: function(data){
    //         alert(data)
    //         $('#add-appointment-form')[0].reset();
    //         location.reload();
    //     }
    // })
}

function getAllRecords(){
    // var filteredObj;
    // $.ajax({
    //   url: '../controller/routes.php',
    //   type: 'POST',
    //   async: false,
    //   contentType: 'application/json',
    //   data: JSON.stringify({
    //     operation: 'listAllAppointments'
    //   }),
    //   success: function(data){
    //       data = JSON.parse(data);

    //       data.forEach(function(item){
    //         item['Appointment_ID'];
    //         item['Appointment_Description'];
    //         item['title'] = item['Title']
    //         item['end'] = item['Due_date']
    //         item['start'] = item['Start_date']
    //         // delete item['Due_date'];
    //         // delete item['Start_date'];
    //         // delete item['Title'];
    //         // item['end'] = formatDate(item["end"].split("-"));
    //         // item["start"] = formatDate(item["start"].split("-"));
    //       })
    //       filteredObj = data;
    //   }
    // })
    
    // return filteredObj
}

function renderListRecords(){
    // var listData = getAllAppointments();
    // tableBody = $("#list-appointments-table").find('tbody');
    // options = `
    //     <i style="color:orange;" class="fa fas-pencil"></i>
    //     <i style="color:red;" class="fa fas-trash"></i>
        
    //     `;

    // listData.forEach(function(listItem){
    //     item = [];
    //     item.push(listItem['Appointment_ID'], listItem['title'], listItem['Appointment_Description'], listItem['start'], listItem['end'])


    //     $(tableBody)
    //         .append($('<tr>'))
    //             .append(`<td>${listItem["title"]}</td>`)
    //                 .append(`<td>${listItem["start"]}</td>`)
    //                     .append(`<td>${listItem["end"]}</td>`)
    //                         .append(`<td>
    //                                     <button data-toggle="modal" data-target="#detail-appointment" class="btn btn-warning" onclick="editAppointment('${item}')"><i class="fas fa-edit"></i></button>
    //                                     &nbsp;
    //                                     <button class="btn btn-danger" onclick="deleteAppointment('${item[0]}')"><i class="fas fa-trash"></i></button>
    //                                 </td>`);
    // })

    // $('#list-appointments-table').DataTable();

}