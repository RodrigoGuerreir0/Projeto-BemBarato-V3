<?php
$cpf = $_POST['cpf'];
function validarLogin($cpf){
    $conexao = new PDO("mysql:host=localhost;dbname=usuarios", "root", "");

    $script = "SELECT * FROM usuario WHERE cpf ='" . $cpf;

    $resultado = $conexao->query($script);
    $lista = $resultado->fetchAll();

    if(empty($lista)){
        // echo '<h2>Você NÃO tem acesso</h2>';
        header('Location:login.php?mensagem=1');
    } else {
        // echo '<h2>Você tem acesso</h2>';
        header('Location:sistema.php');
    }
}

validarLogin($usuario, $senha);
