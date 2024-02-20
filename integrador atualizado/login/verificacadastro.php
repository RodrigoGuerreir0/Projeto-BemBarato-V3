<?php
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];


    function verificarCadastro($nome, $matricula, $cpf, $email, $usuario, $senha, $telefone){
        $conexao = new PDO("mysql:host=localhost;dbname=login_caixa", "root", "");

        $scriptInserir = "INSERT INTO usuario (nome, matricula, cpf, email, usuario, senha, telefone) VALUES (:nome, :matricula, :cpf, :email, :usuario, :senha, :telefone)";
        $stmt = $conexao->prepare($scriptInserir);
    
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':telefone', $telefone);

    
        $stmt->execute();

        if(empty($lista)){
            header('Location:cadastro.php?mensagemErrada=1');
        } else {
            header('Location:cadastro.php?mensagemCerta=1');
        }
    }

    verificarCadastro($nome, $matricula, $cpf, $email, $usuario, $senha, $telefone);