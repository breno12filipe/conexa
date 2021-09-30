<?php
    //receber json
    session_start();
    include('verifica_login.php');
    include('navBar.php');
    include('conexao.php');
    
    $dict=array(
        "Nome" => "Reunião",
        "Data" => "2021-12-12");
    
    $data_str = $dict["Data"];

    list($year, $month, $day) = explode("-", $data);
    $year = intval($year);
    $day = intval($day);
    $month = intval($month);

    $bool_verif = checkdate($month,$day,$year);

    $data_date = date_create($dict["Data"]);
    $nome = $dict["Nome"];

    if ($bool_verif == "True"){
        
        $sql = "INSERT INTO compromisso (ID,Calendario_ID,Nome,Dia)
        VALUES (1, 1, $nome, $data_date)";
        
    } else { 
        echo 'Dados inválidos tente novamente';
    }
?>