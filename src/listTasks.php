<?php
    include('conexao.php');

    $query = "SELECT * FROM task;";
    $result = mysqli_query($conexao, $query);

    $tasks = array();
    $iterator = 0;
    while ($row = $result->fetch_assoc()) {
        $tasks[$iterator] = $row;
        $iterator++;
    }

    $tasks = json_encode($tasks);
    echo $tasks ;
    

?>