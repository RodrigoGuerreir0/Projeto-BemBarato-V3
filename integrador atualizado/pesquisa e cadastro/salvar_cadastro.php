<?php
try {
    include 'banco.php';

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $imagem = $_POST["imagem"];
        $categoria = $_POST["categoria"];
        $estoque = $_POST["estoque"];
        $peso = $_POST["peso"];
        $valor = $_POST["valor"];
        $validade = $_POST["validade"];
        $fornecedor = $_POST["fornecedor"];
        $codigo_fiscal = $_POST["codigo_fiscal"];

        // Prepara a instrução SQL para inserir um novo produto
        $stmt = $conn->prepare("INSERT INTO tb_produtos (nome, descricao, imagem, categoria, estoque, peso, valor, validade, fornecedor, codigo_fiscal) 
                                VALUES (:nome, :descricao, :imagem, :categoria, :estoque, :peso, :valor, :validade, :fornecedor, :codigo_fiscal)");

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':validade', $validade);
        $stmt->bindParam(':fornecedor', $fornecedor);
        $stmt->bindParam(':codigo_fiscal', $codigo_fiscal);

        // Executa a instrução SQL
        $stmt->execute();

        echo "Produto cadastrado com sucesso!";
    }
} catch(PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
