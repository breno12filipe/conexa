<?php
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

    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>

    <script  src="../public/third/kanban-test/data.js"></script>
    <script src="../public/third/kanban-test/index.js"></script>
    <link rel="stylesheet" href="../public/third/kanban-test/styles.css">
    

    <title>Document</title>
</head>
<body>

    <div class="demo-container" style="width: 100%;">
        <div id="kanban"></div>
    </div>

</body>
</html>