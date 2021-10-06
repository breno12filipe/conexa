<?php
    /*
        Atualmente só podemos registrar 3 tasks por algum motivo se adicionarmos
        mais que isso o template quebra
    */
    include('conexao.php');
    session_start();

    $subject = $_POST['task-subject'];
    $startDate = $_POST['task-start-date'];
    $dueDate = $_POST['task-due-date'];
    $priority = $_POST['task-priority'];
    $assignedEmployeeID = $_POST['task-assigned-employee-id'];
    $ownerID = $_SESSION['usuario'];
    $taskID = uniqid();
    $taskStatus = "Not Started";
    $taskCompletion = 0;
    $taskParentID = 0;


    $selectUserQuery = "SELECT ID FROM login WHERE UserEmail = '$ownerID'";
    $selectUser = mysqli_query($conexao,$selectUserQuery);
    $row = mysqli_num_rows($selectUser);

    while ($row = $selectUser->fetch_assoc()) {
        $ownerID = $row['ID'];
    }
    
    $registerTaskQuery = "INSERT INTO `conexa`.`task` 
            (`Task_ID`,
            `Task_Assigned_Employee_ID`,
            `Task_Owner_ID`,
            `Task_Subject`,
            `Task_Start_Date`,
            `Task_Due_Date`,
            `Task_Status`,
            `Task_Priority`,
            `Task_Completion`,
            `Task_Parent_ID`)
            VALUES
            ('$taskID',
            $assignedEmployeeID,
            $ownerID,
            '$subject',
            '$startDate',
            '$dueDate',
            '$taskStatus',
            $priority,
            '$taskCompletion',
            $taskParentID);
            ";
    
    $insertTask = mysqli_query($conexao, $registerTaskQuery);

    if($insertTask){
        echo"<script language='javascript' type='text/javascript'>
                alert('Task cadastrada com sucesso!');window.location.href='./kanban.php'</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'>
                alert('Erro, task não cadastrada!');window.location.href='./kanban.php'</script>";
    }
?>