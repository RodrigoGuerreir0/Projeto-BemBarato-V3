<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Salvar Edição</title>

</head>
<body>
    <div class="container">
        <?php
        // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera os dados do formulário
            $id = $_POST["id"];
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

            // Conexão com o banco de dados usando PDO
            
            try {
                
                include 'banco.php';

                // Prepara a instrução SQL para atualizar o produto
                $stmt = $conn->prepare("UPDATE tb_produtos SET nome=:nome, descricao=:descricao, imagem=:imagem, categoria=:categoria, estoque=:estoque, peso=:peso, valor=:valor, validade=:validade, fornecedor=:fornecedor, codigo_fiscal=:codigo_fiscal WHERE id=:id");
                // Bind parameters
                $stmt->bindParam(':id', $id);
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

                echo "<p>Alterações salvas com sucesso.</p>";
                echo "<a href='pesquisar_produto.php' class='button'>Voltar para a pesquisa</a>";
            } catch(PDOException $e) {
                echo "Erro ao salvar as alterações: " . $e->getMessage();
            }

            // Fecha a conexão
            $conn = null;
        } else {
            echo "Acesso inválido.";
        }
        ?>
    </div>
</body>
</html>
