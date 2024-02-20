<?php
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$cep = $_POST['cep'];

function validarLogin($nome, $cpf, $email, $nascimento, $telefone, $cidade, $bairro, $rua, $numero, $cep)
{
    $conexao = new PDO("mysql:host=localhost;dbname=tb_bembarato", "root", "");

    $scriptInserir = "INSERT INTO usuario (nome, cpf, email, nascimento, telefone, cidade, bairro, rua, numero, cep) VALUES (:nome, :cpf, :email, :nascimento, :telefone, :cidade, :bairro, :rua, :numero, :cep)";
    $stmt = $conexao->prepare($scriptInserir);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nascimento', $nascimento);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':cep', $cep);

    $stmt->execute();
}

validarLogin($nome, $cpf, $email, $nascimento, $telefone, $cidade, $bairro, $rua, $numero, $cep);
