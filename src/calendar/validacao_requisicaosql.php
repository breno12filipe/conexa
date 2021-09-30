<?php
    //Envar Json
    session_start();
    include('verifica_login.php');
    include('navBar.php');

    if ($ID == $sql) {
        $nome = "Select nome from compromisso where $ID = ID";
        $data = "Select dia from compromisso where $ID = ID";

    }
?>