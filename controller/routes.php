<?php
// I think this file name (routes.php) is not adequate to its purpose
$reqBody = file_get_contents('php://input');
$reqBody = json_decode($reqBody);
$operation = $reqBody->operation;

switch ($operation) {
    case 'createUser':
        include_once('user.php');
        $email = $reqBody->email;
        $password = $reqBody->password;
        $passwordConf = $reqBody->password_confirmation;
        $currentUser = new User();
        $currentUser->createUser($email, $password, $passwordConf);
        break;

    case 'loginUser':
        include_once('user.php');
        $email = $reqBody->email;
        $password = $reqBody->password;
        $currentUser = new User();
        $currentUser->authenticate($email, $password);
        break;

    case 'getUserByID':
        include_once('user.php');
        $userId = $reqBody->userID;
        $user = new User();
        $selectedUser = $user->getUserById($userId);
        echo $selectedUser;
        break;

    case 'listAllUsers':
        include_once('user.php');
        $allUsers = new User();
        $users = $allUsers->listAllUsers();
        echo $users;
        break;

    case 'addTask':
        include_once('task.php');
        $subject = $reqBody->subject;
        $startDate = $reqBody->startDate;
        $dueDate = $reqBody->dueDate;
        $priority = $reqBody->priority;
        $status = $reqBody->status;
        $assignedEmployeeID = $reqBody->assignedEmployeeId;
        $currentTask = new Task();
        $currentTask->createTask($subject, $startDate, $dueDate, $priority, $status, $assignedEmployeeID);
        break;

    case 'updateTask':
        include_once('task.php');
        $task = new Task();

        $task_id = $reqBody->id;
        $task_subject = $reqBody->subject;
        $task_start_date = $reqBody->start_date;
        $task_due_date = $reqBody->due_date;
        $task_priority = $reqBody->priority;
        $task_status = $reqBody->status;
        $task_selected_user = $reqBody->selected_user;

        $updatedTask = $task->updateTask($task_id, $task_subject, $task_start_date, $task_due_date, $task_priority, $task_status, $task_selected_user);
        echo $updatedTask;
        break;

    case 'deleteTask':
        include_once('task.php');
        $task = new Task();
        $task_id = $reqBody->taskID;
        $deletedTask = $task->deleteTask($task_id);
        break;

    case 'listAllTasks':
        include_once('task.php');
        $allTasks = new Task();
        $tasks = $allTasks->listAllTasks();
        echo $tasks;
        break;

    case 'getTaskById':
        include_once('task.php');
        $taskId = $reqBody->taskID;
        $task = new Task();
        $selectedTask = $task->getTaskById($taskId);
        echo $selectedTask;
        break;

    case 'addAppointment':
        include_once('appointment.php');
        $title = $reqBody->title;
        $startDate = $reqBody->start_date;
        $dueDate = $reqBody->due_date;
        $description = $reqBody->description;
        $newAppointment = new Appointment();
        $newAppointment->createAppointment($title, $startDate, $dueDate, $description);
        break;

    case 'listAllAppointments':
        include_once('appointment.php');
        $allAppointments = new Appointment();
        $appointments = $allAppointments->listAllAppointments();
        echo $appointments;
        break;
    
    default:
        echo "Oops, something went wrong..."; 
        break;
}
?>