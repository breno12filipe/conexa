<?php
    session_start();
    if(isset($_SESSION['usuario'])){
      header('Location: dashboard.php');
      exit();
    }
?>

<html>
  <head>
    <title>Login - Conexa</title>
    <link rel="stylesheet" href="./public/third/bootstrap-4.1.3/css/bootstrap.css">
    <script src="./public/third/bootstrap-4.1.3/js/bootstrap.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  
  <body>
    <div class="jumbotron bg-info h-10 p-3">
      <h3 style="text-align: center;">CONEXA</h3>
    </div>

    <h3 style="margin-left: 30px;">Login</h3>

    <form method="POST" action="./src/login.php">
      <div class="card align-middle" style="margin-left:30px;margin-right:30px;">  
        <div class="container" style="margin-top:30px; margin-bottom:20px;">

          <div class="form-group">
            <label class="font-weight-bold">Email:</label>
            <input type="email" class="form-control" name="email-login" id="email-login" required>
          </div>
      
          <div class="form-group">
            <label class="font-weight-bold">Senha:</label>
            <input type="password" class="form-control" name="password-login" id="password-login" required>
          </div> 
            
          <div class="text-center">
            <button type="reset" class="btn btn-warning btn-lg">Limpar</button>
            <button type="submit" name="submit-login" id="submit-login" class="btn btn-success btn-lg">Login</button>
          </div>

        </div>
      </div>
    </form>

    <div class="d-flex justify-content-end" style="margin-right: 30px;">
      <a href="./src/createAccount.php">Não tem conta? Cadastre-se</a>
    </div>
    
  </body>
</html>