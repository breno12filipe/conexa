<?php
    session_start();
    include('verifica_login.php');
    //include('navBar.php');
    //include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="HeadMaster">

    <title>Dashboard - Conexa</title>


   
    <!-- Bootstrap core JavaScript-->
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

    <script src="../public/third/jquery/jquery-3.6.0.js"></script>
    <script src="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <script src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>
    <script src="../public/third/jquery-ui-1.12.1.custom/jquery-ui.js" ></script>
    <script src="../public/our/js/kanban/data.js"></script>
    <script src="../public/third/kanban-test/index.js"></script>
    <script src="../public/our/js/addTask.js"></script>
    <script src="../public/our/js/detailTask.js"></script>
    <script src="../public/our/js/deleteTask.js"></script>
    <script src="../public/our/js/updateTask.js"></script>
    <script src="../public/third/dropzone/dist/dropzone.js"></script>
    <script src='https://github.com/mozilla-comm/ical.js/releases/download/v1.4.0/ical.js'></script>
    <script src='../public/third/fullcalendar/lib/main.js'></script>

        <!-- Custom fonts for this template-->
    <link href="../public/third/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/third/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

    <link href='../public/third/fullcalendar/lib/main.css' rel='stylesheet' />

    <link rel="stylesheet" href="../public/third/bootstrap-4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />
    <link rel="stylesheet" href="../public/third/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../public/third/kanban-test/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/third/dropzone/dist/dropzone.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Conexa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" id="navbar-dashboard-icon">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item" id="navbar-dashboard-icon">
                <a class="nav-link" href="cashFlow.php">
                    <i class="fas fa-cash-register"></i>
                    <span>Fluxo de caixa</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="navbar-kanban-icon">
                <a class="nav-link" href="kanban.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kanban</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Agenda</span>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="calendar.php">Ver calendário</a>
                        <a class="collapse-item" href="listAppointments.php">Listar compromissos</a>
                    </div>
                </div>
            </li>
                
            <hr class="sidebar-divider">

            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                        $parts = explode("@", $_SESSION['usuario']);
                                        $username = $parts[0];
                                        echo "<b>{$username}</b>";
                                    ?> 
                                </span>
                                <i class="fas fa-user fa-fw"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                
                <!-- Main content-->
                
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

                    <div class="modal fade" id="list-card">
                        <div class="modal-dialog">
                            <div class="modal-content" id="list-card-content"></div>
                        </div>
                    </div>
                    
                    <div id="kanban"></div>
                    <div id="add-card"></div>
            
            
                <!-- 
                    Nota: aparentemente o bootstrap do template 4.6.0 corrige o bug do modal
                    LEMBRAR: sempre adicionar o jquery antes do boostrap.
                -->

                
                

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> Você irá perder todo progresso não salvo!
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" onclick="location.href='logout.php'">Sair</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>