<?php
    include('conexao.php');
    // following this tutorial: https://www.phpi.com.br/textos/266/1/sistema-de-cadastro-de-usuarios-e-sessao-de-login-em-php7-e-mysql-tracking-youtube

    $login = $_POST['email-create-account'];
    $senha = MD5($_POST['password-create-account']);
    $confirmacao_senha = MD5($_POST['password-create-account-confirmation']);

    // verificação de igualdade das senhas
    if($senha !== $confirmacao_senha){
        echo"<script language='javascript' type='text/javascript'>
        alert('As senhas não são iguais!');window.location.href='../pages/createAccount.html';</script>";
        die();
    }

    // consulta SQL
    $query_select = "SELECT UserEmail FROM login WHERE UserEmail = '$login'";
    $select = mysqli_query($conexao,$query_select);
    $array = mysqli_fetch_array($select);
    $logarray = isset($array['login']);

    // validações
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location.href='../pages/createAccount.html';</script>";
    
    }else{
        if($logarray == $login){
            echo"<script language='javascript' type='text/javascript'>
            alert('Esse login já existe');window.location.href='../pages/createAccount.html';</script>";
            die();
        }else{
            $query = "INSERT INTO login (UserEmail,UserPassword) VALUES ('$login','$senha')";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                echo"<script language='javascript' type='text/javascript'>
                alert('Usuário cadastrado com sucesso!');window.location.href='../index.html'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>
                alert('Não foi possível cadastrar esse usuário');window.location.href='../pages/createAccount.html'</script>";
            }
        }
    }
?>