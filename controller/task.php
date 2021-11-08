<?php
include('../model/daos.php');

class Task{

    // creates a new task
    public function createTask($subject, $startDate, $dueDate, $priority, $taskStatus, $assignedEmployeeID){
        session_start();
        $DAObj = new DAO();
        $taskID = uniqid();
        $taskCompletion = 0;
        $taskParentID = 0;
        $ownerID = $_SESSION['usuario'];


        $selectUser = $DAObj->select(['ID'], 'login', "UserEmail = '$ownerID'");
        // $row = mysqli_num_rows($selectUser);

        // while ($row = $selectUser->fetch_assoc()) {
        //     $ownerID = $row['ID'];
        // }

        $ownerID = $selectUser[0]['ID'];
        
        $insertTask = $DAObj->insert(
                'task',
                ['Task_ID',
                 'Task_Assigned_Employee_ID',
                 'Task_Owner_ID',
                 'Task_Subject',
                 'Task_Start_Date',
                 'Task_Due_Date',
                 'Task_Status',
                 'Task_Priority',
                 'Task_Completion',
                 'Task_Parent_ID'
                ],
                [
                $taskID,
                $assignedEmployeeID,
                $ownerID,
                $subject,
                $startDate,
                $dueDate,
                $taskStatus,
                $priority,
                $taskCompletion,
                $taskParentID
                ]);

        if($insertTask){
            echo"Task cadastrada com sucesso!";
            return True;
        }else{
            echo"Erro, task não cadastrada!";
            return False;
        }
    }

    // list all tasks
    public function listAllTasks(){
        $DAObject = new DAO();
        $selectOccurrences = $DAObject->select('*', 'task');
        return json_encode($selectOccurrences);
    }

    public function updateTask($task_id, $task_subject, $task_start_date, $task_due_date, $task_priority, $task_status, $task_selected_user){
        session_start();
        $DAObject = new DAO();

        $taskCompletion = 0;
        $taskParentID = 0;
        $ownerID = $_SESSION['usuario'];

        $selectOwner = $DAObject->select(['ID'], 'login', "UserEmail = '$ownerID'");
        $ownerID = $selectOwner[0]['ID'];

        $selectUser = $DAObject->select(['ID'], 'login', "UserEmail = '$task_selected_user'");
        $task_selected_user = $selectUser[0]['ID'];

        $updatedTask = $DAObject->update(
                                        'task', 
                                        [$task_id,
                                        $task_selected_user, 
                                        $ownerID,
                                        $task_subject,
                                        $task_start_date, 
                                        $task_due_date, 
                                        $task_status, 
                                        $task_priority, 
                                        $taskCompletion,
                                        $taskParentID],
                                        "Task_ID = '$task_id'");

        if($updatedTask){
            echo "Card atualizado com sucesso!";
        }else{
            echo "Erro, task não atualizada!";
        }


    }

    public function getTaskById($taskID){
        $DAObject = new DAO();
        $selectOccurrences = $DAObject->select('*', 'task', "Task_ID='$taskID'");
        return json_encode($selectOccurrences);
    }

    public function deleteTask($taskID){
        $DAObject = new DAO();
        echo $taskID;
        $deleteOperation = $DAObject->delete("task", "Task_ID = '$taskID'");

        if ($deleteOperation){
            echo "Card deletado com sucesso!";
        }else{
            echo "Não foi possível deletar o card";
        }

    }
}



?>