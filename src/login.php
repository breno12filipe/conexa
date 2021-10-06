<?php
   session_start();
   include('conexao.php');

   // todo: fazer validação quando usuário e senhas estão errados
   
   // Verifica se o usuário mandou um usuário ou senha via post
   if (empty($_POST['email-login'] || empty($_POST['password-login']))) {
       header('Location: index.php');
       exit();
   }

   // esta função evita ataques de sql injection
   $usuario = mysqli_real_escape_string($conexao, $_POST['email-login']);
   $senha = mysqli_real_escape_string($conexao, $_POST['password-login']);

   // montando a query e executando a query e verificando quantidade de linhas que a query retornou
   $query = "SELECT UserEmail FROM login WHERE UserEmail = '{$usuario}' AND UserPassword = md5('{$senha}')";
   $result = mysqli_query($conexao, $query);
   $row = mysqli_num_rows($result);

   if($row == 1){
       $_SESSION['usuario'] = $usuario;
       header('Location: ./dashboard.php');
       exit();
   }else{
       $_SESSION['nao_autenticado'] = true;
       echo"<script language='javascript' type='text/javascript'>
               alert('Usuário e/ou senha incorreto(s)!');window.location.href='../index.php'</script>";
       exit();
   }
?>