<?php
    // definindo constantes
    define('HOST',    'localhost');
    define('USUARIO', 'root');
    define('SENHA',   'root');
    define('DB',      'conexa');
    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar-se ao banco de dados');
?>