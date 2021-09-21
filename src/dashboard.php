<?php
    // precisamos definir o session_start() aqui para recapturar a sessão
    session_start();
    include('verifica_login.php');
    include('navBar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/third/bootstrap-4.1.3/css/bootstrap.css">
    <script src="../public/third/bootstrap-4.1.3/js/bootstrap.js"></script>
    <script src="../public/third/jquery/jquery-3.6.0.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <center>
        <img src="../public/our/img/man-at-work.jpeg" width="300px" height="300px">
    </center>

</body>
</html>