<?php
    session_start();
    include('verifica_login.php');
    //include('navBar.php');
    include('conexao.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../public/third/jquery/jquery-3.6.0.js"></script>
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <script src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>
    <script src="../public/third/jquery-ui-1.12.1.custom/jquery-ui.js" ></script>
    <script src="../public/our/js/kanban/data.js"></script>
    <script src="../public/third/kanban-test/index.js"></script>
    <script src="../public/our/js/addTask.js"></script>
    <script src="../public/third/dropzone/dist/dropzone.js"></script>
    <link rel="stylesheet" href="../public/third/bootstrap-4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />
    <link rel="stylesheet" href="../public/third/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../public/third/kanban-test/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/third/dropzone/dist/dropzone.css">


    <!-- <script src="../public/our/js/renderBoard.js"></script> -->


    <title>Kanban - Conexa</title>
</head>
<body>

    <div class="demo-container" style="width: 100%">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">

                    <a style="cursor: pointer;" id="add-card-event" onclick="loadModalContent()" 
                       class="nav-link" data-toggle="modal" data-target="#add-card">
                        <i class="fas fa-plus"></i>
                        Adicionar Task
                    </a>

                </li>
            </ul>
        </nav>

        <div class="modal fade" id="add-card">
            <div class="modal-dialog">
                <div class="modal-content" id="add-card-content"></div>
            </div>
        </div>

        
        <div id="kanban"></div>
        <div id="add-card"></div>

        <div class="card bg-danger" style="width: 400px">
            <div class="card-body">
                <p style="text-align:center;color: white;"><b>Excluir task</b></p>
            </div>
        </div> 
    </div>

    <!-- 
        Nota: aparentemente o bootstrap do template 4.6.0 corrige o bug do modal
        LEMBRAR: sempre adicionar o jquery antes do boostrap.
    -->

</body>
</html>