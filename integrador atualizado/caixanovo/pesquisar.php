<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root"; // Supondo que o usuário seja "root"
$password = ""; // Deixe a senha em branco conforme indicado
$dbname = "bd_bembarato"; // Nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configura o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se a pesquisa foi submetida
    if (isset($_GET['codigo_barras']) && !empty($_GET['codigo_barras'])) {
        $codigo_barras = $_GET['codigo_barras'];

        // Consulta SQL para pesquisar o produto pelo código de barras
        $stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE codigo_barras = ?");
        $stmt->execute([$codigo_barras]);

        if ($stmt->rowCount() > 0) {
            // Exibe os resultados em uma tabela
            echo "<table>";
            echo "<tr><th>Nome</th><th>Valor</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>R$" . $row['valor'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<button>Adicionar ao carrinho</button>";
            header("Location: caixa.php");
        } else {
            // Redireciona de volta para a página anterior com mensagem de erro
            header("Location: index.php?mensagem=Nenhum produto encontrado com esse código de barras.");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;

function PassarProduto()
{
    $codigo_barras = $_GET['codigo_barras'];
    $venda = $_GET['venda'];

    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $sql = "SELECT id FROM tb_produtos WHERE codigo_barras = '$codigo_barras'";
    $result = $conexao->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $id_produto = $row["id"];
        
        $sql_insert = "INSERT INTO tb_produtos_venda (id_venda, id_produtos) VALUES ($venda, $id_produto)";
        if ($conexao->exec($sql_insert)) {
            echo "Registro inserido com sucesso na tabela de vendas";
        } else {
            echo "Erro ao inserir registro na tabela de vendas: " . $conexao->errorInfo()[2];
        }
    } else {
        echo "Nenhum produto encontrado para o código de barras fornecido";
    }
    
    $conexao = null;
}

PassarProduto();

function InserirQuantidade()
{
    $quantidade = $_GET['num1'];

    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $sql_insert = "INSERT INTO tb_produtos_venda (Quantidade) VALUES ($quantidade)";
    if ($conexao->exec($sql_insert)) {
        echo "Quantidade inserida com sucesso na tabela de vendas";
    } else {
        echo "Erro ao inserir quantidade na tabela de vendas: " . $conexao->errorInfo()[2];
    }
    
    $conexao = null;
}

InserirQuantidade(); 


