// This is only a template and should not be used in production 
// var tasks = [{
//     "Task_ID": 1,
//     "Task_Assigned_Employee_ID": 1,
//     "Task_Owner_ID": 1,
//     "Task_Subject": "Completar Kanban",
//     "Task_Start_Date": "2015-01-01T00:00:00",
//     "Task_Due_Date": "2015-04-01T00:00:00",
//     "Task_Status": "In Progress",
//     "Task_Priority": 4,
//     "Task_Completion": 0,
//     "Task_Parent_ID": 0
// }, {
//     "Task_ID": 2,
//     "Task_Assigned_Employee_ID": 2,
//     "Task_Owner_ID": 1,
//     "Task_Subject": "Completar Agenda",
//     "Task_Start_Date": "2015-02-12T00:00:00",
//     "Task_Due_Date": "2015-05-30T00:00:00",
//     "Task_Status": "In Progress",
//     "Task_Priority": 1,
//     "Task_Completion": 0,
//     "Task_Parent_ID": 0
// }]


function getAllTasks(){

    var taskList;
    $.ajax({
        url: "listTasks.php",
        method: "get",
        async: false,
        success: function (tasks){
            taskList = tasks;
        }
    })
    
    function treatTaskJSON(taskList){
        // encontrar uma forma de percorrer o JSON
        taskList.forEach(function(taskItem, idx){
            parseInt(taskItem['TaskAssignedEmployeeId'])    
            taskItem['TaskDueDate'] = `${taskItem['TaskDueDate'].split('/').reverse().join('-')}T00:00:00`
            parseInt(taskItem['TaskOwnerID'])
            parseInt(taskItem['TaskParentID'])
            parseInt(taskItem['TaskPriority'])
            taskItem['TaskStartDate'] = `${taskItem['TaskStartDate'].split('/').reverse().join('-')}T00:00:00`

        })

    }

    return JSON.parse(taskList);
    
}

function getAllUsers(){
    var usersList;
    $.ajax({
        url: "listUsers.php",
        method: "get",
        async: false,
        success: function(users){
            usersList = JSON.parse(users)
        }
    })

    return usersList;


    function treatUserJSON(users){
        validatedUsers = {};
        users.forEach(function(userItem, idx){
            validatedUsers['ID'] = userItem['ID']
            validatedUsers['Name'] = userItem['UserEmail']
        })
        console.log(validatedUsers)
        return validatedUsers;
    }
}


var tasks = getAllTasks();

var employees = [{
    "ID": "1",
    "Name": "Breno Filipe"
},{
    "ID": "2",
    "Name": "Enzo Leite"
}]