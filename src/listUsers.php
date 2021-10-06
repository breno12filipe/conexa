<?php
    //  deveria aplicar esta abordagem para conseguir chamar funções distintas
    // https://www.ti-enxame.com/pt/php/usando-jquery-.ajax-para-chamar-uma-funcao-php/968496371/

    include('conexao.php');

    $query = "SELECT ID, UserEmail FROM login";
    $result = mysqli_query($conexao, $query);
    
    $users = array();
    $iterator = 0;
    while ($row = $result->fetch_assoc()) {
        //$users[$iterator] = explode("@", $row['UserEmail'])[0];
        $users[$iterator] = $row;
        $iterator++;
    }
    
    $users = json_encode($users);

    // seria melhor se ao invés de dar echo, retornar o valor
    echo $users;

    

?>


