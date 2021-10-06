$( document ).ready(function() {
    $("#navbar-kanban-icon").addClass("active");
    $("#navbar-dashboard-icon").removeClass("active");
    $("#navbar-agenda-icon").removeClass("active");   
})

addCardTpl = `
    <div class="card" style="width: 400px;margin-left:45px;">
        <div class="card-body">
            <form method="POST" action="registerTask.php">
                <label for="subject">Assunto</label><br>
                <input type="text" class="form-control" name="task-subject" type="text" maxlength="23"><br><br>

                <label for="start-date">Data de início</label><br>
                <input id="start-date-datepicker" name="task-start-date" type="text"><br><br>

                <label for="due-date">Data de término</label><br>
                <input id="due-date-datepicker" name="task-due-date" type="text"><br><br>

                <div class="form-group">
                    <label for="priority">Prioridade</label>
                    <select class="form-control" id="sel1" name="task-priority">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="task-assigned-employee-id">
                        Atribuir card para um usuário
                    </label>
                    <select class="form-control" id="sel-usr" name="task-assigned-employee-id"></select>
                </div>
                
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </form>
        </div>
    </div> 
`


function loadModalContent(){

    function buildUserSelect(users){
        users.forEach(function (user){
            $("#sel-usr").append(`<option value="${user['ID']}" >${user['UserEmail']}</option>`)
        })
    }

    $("#add-card-content").empty();
    $("#add-card-content").append(addCardTpl);

    $.get( "listUsers.php", function(users) {
        users = JSON.parse(users)
        buildUserSelect(users)
    })


    $("#start-date-datepicker").datepicker();
    $("#due-date-datepicker").datepicker();

    // task_id: generate and random UUID
    // task_owner_id: use the user database ID from the current user
    // task_status: starts 'Not started' by default
    // task_completion: starts with 0 by default
    // task_parent_id: starts with 0 by default

    

}

