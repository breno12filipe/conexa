<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/third/bootstrap-4.1.3/css/bootstrap.css">
    <script src="../public/third/bootstrap-4.1.3/js/bootstrap.js"></script>
    <script src="../public/third/jquery/jquery-3.6.0.js"></script>
    <script src="../public/our/js/index.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-info">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Conexa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kanban.php">Kanban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calendar.php">Agenda</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <p style="text-align: center;">Bem vindo
                <?php
                $parts = explode("@", $_SESSION['usuario']);
                $username = $parts[0];
                echo "<b>{$username}</b>";
                ?>
            </p>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal" class="nav-link">Sair</a>
                </li>
            </ul>
        </div>
    </nav>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sair do sistema?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Você irá perder todo progresso não salvo!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='logout.php'">Sair</button>
                </div>
            </div>
        </div>
    </div>



</body>
</html>