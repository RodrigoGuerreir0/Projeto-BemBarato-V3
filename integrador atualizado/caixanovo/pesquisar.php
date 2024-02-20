<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_bembarato";

try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['codigo_barras']) && !empty($_GET['codigo_barras'])) {
        $codigo_barras = $_GET['codigo_barras'];

        $stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE codigo_barras = ?");
        $stmt->execute([$codigo_barras]);

        if ($stmt->rowCount() > 0) {

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

            header("Location: index.php?mensagem=Nenhum produto encontrado com esse código de barras.");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

$conn = null;

function PassarProduto()
{
    $codigo_barras = $_GET['codigo_barras'];
    $venda = $_GET['venda'];
    $quantidade = isset($_GET['Quantidade']) ? $_GET['Quantidade'] : 1;

    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $sql = "SELECT id FROM tb_produtos WHERE codigo_barras = '$codigo_barras'";
    $result = $conexao->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $id_produto = $row["id"];
        
        $sql_insert = "INSERT INTO tb_produtos_venda (id_venda, id_produtos, Quantidade) VALUES ($venda, $id_produto, $quantidade)";
        
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





