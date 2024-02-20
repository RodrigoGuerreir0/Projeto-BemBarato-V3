<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caixa";

try {
    // Conectar ao banco de dados utilizando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar para que o PDO lance exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se os dados foram recebidos do formulário via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valor_compra'])) {
        // Limpar e preparar os dados para inserção no banco de dados
        $valor_compra = str_replace('.', '', $_POST['valor_compra']); // Substituir ',' por '.'
        $valor_compra = str_replace(',', '.', $valor_compra); // Substituir ',' por '.'

        // Preparar a consulta SQL para inserir os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO valorcaixa (valorCompra) VALUES (:valorCompra)");
        // Atribuir os valores aos parâmetros da consulta preparada
        $stmt->bindParam(':valorCompra', $valor_compra, PDO::PARAM_STR); // Como estamos passando um valor float, usamos PDO::PARAM_STR

        // Executar a consulta preparada
        if ($stmt->execute()) {
            echo "Compra finalizada com sucesso!";
        } else {
            echo "Erro ao finalizar a compra";
        }
    }
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

// Fechar a conexão com o banco de dados
$conn = null;
?>