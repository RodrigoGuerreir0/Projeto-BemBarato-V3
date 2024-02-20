<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Produto</title>
    <style>
        /* Estilos para ajustar o layout do formulário */
        .container form input[type="text"],
        .container form select,
        .container form input[type="date"],
        .container form input[type="file"] {
            width: calc(100% - 12px); /* Largura do input - 12px para a margem */
            margin-bottom: 10px; /* Espaçamento entre os campos */
        }

        .container form button {
            margin-top: 10px; /* Espaçamento entre o último campo e o botão */
        }

        /* Estilo para o alerta */
        .alert {
            background-color: #C8E6C9; /* Verde */
            color: #388E3C; /* Cor do texto */
            padding: 20px;
            border-radius: 5px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Editar Produto</h2>
        <?php
        session_start(); // Inicia a sessão

        try {
            include 'banco.php';
            // Verifica se o formulário foi submetido
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebe o código de barras do formulário
                $codigo_barras = $_POST["codigo_barras"];

                // Consulta o banco de dados para obter informações sobre o produto com o código de barras fornecido
                $stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE codigo_barras = :codigo_barras");
                $stmt->bindParam(':codigo_barras', $codigo_barras);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC); // Usamos fetch em vez de fetchAll

                if ($result) {
                    // Exibe os dados do produto para edição
                    echo "<form action='recebe-alteracao.php' method='post' enctype='multipart/form-data'>";
                    echo "<input type='hidden' name='id' value='" . $result["id"] . "'>";
                    echo "Nome: <input type='text' name='nome' value='" . $result["nome"] . "'><br>";
                    echo "Descrição: <input type='text' name='descricao' value='" . $result["descricao"] . "'><br>";
                    echo "Imagem: <input type='file' name='imagem'><br>"; // Espaço será adicionado com CSS
                    echo "Categoria: <select name='categoria'>";
                    echo "<option value='Bebidas'>Bebidas</option>";
                    echo "<option value='Frios'>Frios</option>";
                    echo "<option value='Açougue'>Açougue</option>";
                    // Adicione aqui outras opções de categorias
                    echo "</select><br>";
                    echo "Estoque: <input type='text' name='estoque' value='" . $result["estoque"] . "'><br>";
                    echo "Peso: <input type='text' name='peso' value='" . $result["peso"] . "'><br>";
                    echo "Valor: <input type='text' name='valor' value='" . $result["valor"] . "'><br>";
                    echo "Validade: <input type='date' name='validade' value='" . $result["validade"] . "'><br>";
                    echo "Fornecedor: <input type='text' name='fornecedor' value='" . $result["fornecedor"] . "'><br>";
                    echo "Código Fiscal: <input type='text' name='codigo_fiscal' value='" . $result["codigo_fiscal"] . "'><br>";
                    echo "<button type='submit' class='button'>Salvar</button>"; // Botão estilizado
                    echo "</form>";

            
                    
                } else {
                    echo "Produto não encontrado.";
                    echo '<br><br>';
                    echo "<a href='pesquisar_produto.php' class='button'>Voltar para a pesquisa</a>";
                }
            }
        } catch(PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
        $conn = null;
        ?>
    </div>


</body>
</html>
