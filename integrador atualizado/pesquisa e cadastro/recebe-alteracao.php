<?php
session_start(); // Inicia a sessão

try {
    include 'banco.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $estoque = $_POST['estoque'];
        $peso = $_POST['peso'];
        $valor = $_POST['valor'];
        $validade = $_POST['validade'];
        $fornecedor = $_POST['fornecedor'];
        $codigo_fiscal = $_POST['codigo_fiscal'];

        // Atualize os dados do produto no banco de dados
        $stmt = $conn->prepare("UPDATE tb_produtos SET nome = ?, descricao = ?, categoria = ?, estoque = ?, peso = ?, valor = ?, validade = ?, fornecedor = ?, codigo_fiscal = ? WHERE id = ?");
        $stmt->execute([$nome, $descricao, $categoria, $estoque, $peso, $valor, $validade, $fornecedor, $codigo_fiscal, $id]);

        // Verifique se a atualização foi bem-sucedida
        if ($stmt->rowCount() > 0) {
            $_SESSION['success_message'] = "Produto alterado com sucesso.";
        } else {
            $_SESSION['error_message'] = "Falha ao atualizar o produto.";
        }
    }
} catch(PDOException $e) {
    $_SESSION['error_message'] = "Erro na conexão com o banco de dados: " . $e->getMessage();
}

// Redireciona de volta para a página "Editar-Cadastrar.php"
header("Location: Editar-Cadastrar.php");
exit();
?>
