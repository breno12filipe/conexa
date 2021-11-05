function showTaskDetails(cardID){
    //console.log(cardID)

    /* 
        No modal todos os dados do card serão mostrados com possibilidade de
        serem alterados

        Aqui basicamente teremos todos os dados já preenchidos com os campos 
        desabilitados, ou seja, só visualização e terá um icone com uma engrenagem 
        aonde habilitará esses inputs e adicionará um botão de salvar que irá 
        atualizar o card

        * O que deverá ser mostrado?
            Task_Assigned_Employee_ID (Ao inves de mostrar o id mostra o nome do usuário)
            Task_Owner_ID (Ao inves de mostrar o id mostra o nome do usuário),
            Task_Subject ,
            Task_Start_Date ,
            Task_Due_Date ,
            Task_Status ,
            Task_Priority
    */

    CardDetailsTpl = `
    <div class="card" style="width: 400px;margin-left:45px;">
		<div class="row">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col sm-10 float-right">
                <i class="fas fa-cog" onclick="enableDisableSettings()"></i>
			</div>
		</div>
        <div class="card-body">
            <form id="add-task-form" onsubmit="return false;">
                <label for="subject">Assunto</label><br>
                <input type="text" disabled id="task-subject-details" class="form-control" name="task-subject" type="text" maxlength="23"><br>

                <label for="start-date">Data de início</label><br>
                <input class="form-control" id="start-date-datepicker-details" disabled name="task-start-date" type="text"><br><br>

                <label for="due-date">Data de término</label><br>
                <input class="form-control" id="due-date-datepicker-details" disabled name="task-due-date" type="text"><br><br>

                <div class="form-group">
                    <label for="priority">Prioridade</label>
                    <select disabled class="form-control" id="task-priority-details" name="task-priority">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" disabled id="task-status-details" name="task-status">
                        <option value="Not Started">Not Started</option>
                        <option value="Need Assistance">Need Assistance</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Deferred">Deferred</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="task-assigned-employee-id">
                        Atribuir card para um usuário
                    </label>
                    <select class="form-control" disabled id="select-user-details" name="task-assigned-employee-id"></select>
                </div>
                
                <center>
                    <button onclick="editTask(this.form, '${cardID}')" style="display:none;" id="save-settings" class="btn btn-success btn-lg">Salvar</button>
                </center>
            </form>
        </div>

        <div class="row">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col sm-10 float-right">
                <div class="col sm-10 pull-right">
                    <i class="fas fa-trash" style="color:red;" onclick="removeTask('${cardID}')"></i>
                </div>
			</div>
		</div>
    </div> 
    `

    
    
    $("#list-card-content").empty();
    $("#list-card-content").append(CardDetailsTpl)
    
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'getTaskById',
            taskID: cardID
        }),
        success: function(data){
            populateDetailsCard(data);
        }
    })

    

    $("#start-date-datepicker-details").css("background-color", "#e9ecef");
    $("#due-date-datepicker-details").css("background-color", "#e9ecef");

    $("#start-date-datepicker-details").datepicker();
    $("#due-date-datepicker-details").datepicker();
}

function enableDisableSettings(){
    /*
        task-subject-details
        start-date-datepicker-details
        due-date-datepicker-details
        task-priority-details
        task-status-details
        select-user-details
    */
    if ($("#task-subject-details").attr("disabled")){
        $("#task-subject-details").removeAttr("disabled");
        $("#start-date-datepicker-details").removeAttr("disabled");
        $("#due-date-datepicker-details").removeAttr("disabled");
        $("#task-priority-details").removeAttr("disabled");
        $("#task-status-details").removeAttr("disabled");
        $("#select-user-details").removeAttr("disabled");
        $("#save-settings").css("display", "block");
        $("#start-date-datepicker-details").css("background-color", "#fff");
        $("#due-date-datepicker-details").css("background-color", "#fff");
    }else{
        $("#task-subject-details").attr("disabled", "disabled");
        $("#start-date-datepicker-details").attr("disabled", "disabled");
        $("#due-date-datepicker-details").attr("disabled", "disabled");
        $("#task-priority-details").attr("disabled", "disabled");
        $("#task-status-details").attr("disabled", "disabled");
        $("#select-user-details").attr("disabled", "disabled");
        $("#save-settings").css("display", "none");
        $("#start-date-datepicker-details").css("background-color", "#e9ecef");
        $("#due-date-datepicker-details").css("background-color", "#e9ecef");
    }

}

function populateDetailsCard(data){
    data = JSON.parse(data);

    $("#task-subject-details").val(data[0]["Task_Subject"]);
    $("#start-date-datepicker-details").val(data[0]["Task_Start_Date"]);
    $("#due-date-datepicker-details").val(data[0]["Task_Due_Date"]);
    $("#task-priority-details").val(data[0]["Task_Priority"]);
    $("#task-status-details").val(data[0]["Task_Status"]);

    // Aqui temos que fazer uma requisição para pegar o nome do usuário pelo seu ID
    // e então colocar no select
    userEmail = "";
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'getUserByID',
            userID: data[0]["Task_Assigned_Employee_ID"]
        }),
        success: function(data){
            data = JSON.parse(data);
            //console.log(data[0]["UserEmail"])
            //$("#select-user-details").val(data[0]["UserEmail"]);
            userEmail = data[0]["UserEmail"];
            
        }
    })

    // list all users
    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'listAllUsers'
        }),
        success: function(data){
            data = JSON.parse(data);
            

            data.forEach(function(dataElement, idx){
                //console.log(dataElement)
                if (dataElement['UserEmail'] == userEmail){
                    $("#select-user-details").append(`<option selected>${dataElement['UserEmail']}</option>`);
                }else{
                    $("#select-user-details").append(`<option>${dataElement['UserEmail']}</option>`);
                }
            })
        }
    })



}

