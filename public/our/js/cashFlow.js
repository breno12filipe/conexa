$(document).ready(function(){
    //$("#cashFlowTable").DataTable();
    showSummation()
    renderListRecords()
    
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
                <input id="brmoney" class="form-control" type="text"><br>

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
    $("#brmoney").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
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
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            operation: 'addRecord',
            name: form[0].value,
            description: form[1].value,
            value: form[2].value.toString().replace(",", "."),
            date: getCurrentDate()
        }),
        success: function(data){
            alert(data)
            $('#add-record-form')[0].reset();
            location.reload();
        }
    })
}

function getAllRecords(){
    var filteredObj;
    $.ajax({
      url: '../controller/routes.php',
      type: 'POST',
      async: false,
      contentType: 'application/json',
      data: JSON.stringify({
        operation: 'listAllRecords'
      }),
      success: function(data){
        data = JSON.parse(data);
           filteredObj = data;
      }
    })
    
    return filteredObj
}

function showSummation(){
    records = getAllRecords();

    summation = 0;
    records.forEach(function(recordItem, recordIdx){
        summation = summation + parseFloat(recordItem['Cash_Register_Value'])
    })
    
    $('#summation').append(`${summation}`)

}

function deleteRecord(recordID){
    if(confirm("Deseja realmente deletar o registro?")){
        $.ajax({
            url: '../controller/routes.php',
            type: 'POST',
            async: false,
            contentType: 'application/json',
            data: JSON.stringify({
            operation: 'deleteRecord',
            record_id: recordID
            }),
            success: function(data){
                alert(data);
                location.reload();
            }
        })
    }
}

function updateRecord(form){
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        async: false,
        contentType: 'application/json',
        data: JSON.stringify({
            operation: 'updateRecord',
            id: form[4].value,
            name: form[0].value,
            description: form[1].value,
            value: form[2].value,
            date: form[3].value
        }),
        success: function(data){
            alert(data);
            location.reload();
        }
    })
}


function editRecord(record){
    record = record.split(",");

    recordUpdtTpl = `
        <div class="card" style="width: 400px;margin-left:45px;">
            <div class="card-body">

                <div class="row d-flex justify-content-center">
                    <h3>Adicionar Registro</h3>
                </div>

                <form id="add-record-form" onsubmit="return false;">
                    <label for="name">Nome</label><br>
                    <input type="text" id="name" class="form-control" name="record-name" type="text" maxlength="23" value="${record[0]}"}><br>

                    <label for="description">Descrição</label><br>
                    <textarea class="form-control" name="description" style="resize:none" >${record[3]}</textarea><br>

                    <label for="value">Valor</label><br>
                    <input class="form-control" type="text" value="${record[1]}"><br>

                    <input type="hidden" name="date" value="${record[2]}">
                    <input type="hidden" name="recordId" value="${record[4]}">

                    <center>
                        <button onclick="updateRecord(this.form)" id="add-task-btn" class="btn btn-success btn-lg">Salvar</button>
                    </center>
                    
                </form>
            </div>
        </div> 
    `

    $("#add-record-content").empty();
    $("#add-record-content").append(recordUpdtTpl);
}

function renderListRecords(){
    var listData = getAllRecords();
    tableBody = $("#cashFlowTable").find('tbody');
    options = `
        <i style="color:orange;" class="fa fas-pencil"></i>
        <i style="color:red;" class="fa fas-trash"></i>
     
        `;

    listData.forEach(function(listItem){
        item = [];
        item.push(listItem['Cash_Register_Name'], listItem['Cash_Register_Value'], listItem['Registration_Entry'], listItem["Cash_Register_Description"], listItem["Cash_Register_ID"])


        $(tableBody)
            .append($('<tr>'))
                .append(`<td title="${listItem["Cash_Register_Description"]}" >${listItem["Cash_Register_Name"]}</td>`)
                    .append(`<td>${listItem["Cash_Register_Value"]}</td>`)
                        .append(`<td>${listItem["Registration_Entry"]}</td>`)
                            .append(`<td>
                                        <button data-toggle="modal" data-target="#add-record" class="btn btn-warning" onclick="editRecord('${item}')"><i class="fas fa-edit"></i></button>
                                        &nbsp;
                                        <button class="btn btn-danger" onclick="deleteRecord('${listItem["Cash_Register_ID"]}')"><i class="fas fa-trash"></i></button>
                                    </td>`);
    })

    $('#cashFlowTable').DataTable();

}