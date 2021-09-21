<html>
  <head>
    <title>Criar conta - Conexa</title>
    <link rel="stylesheet" href="../public/third/bootstrap-4.1.3/css/bootstrap.css">
    <script src="../public/third/bootstrap-4.1.3/js/bootstrap.js"></script>
    <script src="../public/third/jquery/jquery-3.6.0.js"></script>
    <script src="../public/our/js/createAccout.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>

  <body>
    <div class="jumbotron bg-info h-10 p-3">
      <h3 style="text-align: center;">CONEXA</h3>
    </div>

    <h3 style="margin-left: 30px;">Criar Conta</h3>

    <form method="POST" action="./cadastro.php">
      <div class="card align-middle" style="margin-left:30px;margin-right:30px;">  
        <div class="container" style="margin-top:30px; margin-bottom:20px;">

          <div class="form-group">
            <label class="font-weight-bold">Email:</label>
            <input type="email" class="form-control" name="email-create-account" id="email-create-account" required>
          </div>
      
          <div class="form-group">
            <label class="font-weight-bold">Senha:</label>
            <input type="password" class="form-control" name="password-create-account" id="password-create-account" required>
          </div> 

          <div class="form-group">
            <label class="font-weight-bold">Confirme a sua senha:</label>
            <input type="password" class="form-control" name="password-create-account-confirmation" id="password-create-account-confirmation" required>
          </div> 
            
          <div class="text-center">
            <button type="reset" value="create-account" id="create-account" class="btn btn-warning btn-lg">Limpar</button>
            <button type="submit" class="btn btn-success btn-lg">Criar sua conta</button>
          </div>
            
        </div>
      </div>
    </form>

    <div class="d-flex justify-content-end" style="margin-right: 30px;">
      <a href="../index.php">Logar com usuário</a>
    </div>
    
  </body>
</html>
