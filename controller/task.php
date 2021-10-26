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
}



?>